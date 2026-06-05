<?php
if (!defined('ADDFUNDS')) {
    http_response_code(404);
    die();
}

$merchantId = $methodExtras["merchantId"];
$token = $methodExtras["token"];
$utr = htmlspecialchars(trim($_POST["utr"]));

if (empty($utr)) {
    errorExit("The Order ID cannot be empty.");
}

if (
    !countRow([
        'table' => 'payments',
        'where' => [
            'payment_extra' => $utr
        ]
    ])
) {

$fromDate = date('Y-m-d', strtotime('-2 days'));
$toDate = date('Y-m-d');    
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://payments-tesseract.bharatpe.in/api/v1/merchant/transactions?module=PAYMENT_QR&merchantId=' . $merchantId . '&sDate=' . $fromDate . '&eDate=' . $toDate,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'token: ' . $token,
    'user-agent: Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Mobile Safari/537.36',
    'Cookie: __cf_bm=xEvAGiN2CjNW8yymBjvcor0pkoS6PKGKc1DpH9mRAHo-1714638556-1.0.1.1-2JuiGlwCNFhNHqi.y7WffctXlNv4PctEXNpU9DnXFqdmwnw.Ff9A_Hy89K4scrYYZz003snDmbMXJxbm03ZUJw'
  ),
));

$response = curl_exec($curl);
curl_close($curl);
$response = json_decode($response, true);

$responseParamList = array();
foreach ($response["data"]["transactions"] as $transaction) {
    if ($transaction["bankReferenceNo"] == $utr) {
        $responseParamList[] = $transaction;
    }
}
     $responseParamList = $responseParamList[0];
    if ($responseParamList["status"] == "SUCCESS" && $responseParamList["bankReferenceNo"] == $utr && $responseParamList["amount"] == $paymentAmount ) {
        $insert = $conn->prepare(
            "INSERT INTO payments SET
                                  client_id=:client_id,
                                  payment_amount=:amount,
                                  payment_method=:method,
                                  payment_mode=:mode,
                                  payment_create_date=:date,
                                  payment_ip=:ip,
                                  payment_extra=:extra"
        );
        $insert->execute([
            "client_id" => $user["client_id"],
            "amount" => $paymentAmount,
            "method" => $methodId,
            "mode" => "Automatic",
            "date" => date("Y.m.d H:i:s"),
            "ip" => GetIP(),
            "extra" => $utr
        ]);

        $paymentId = $conn->lastInsertId();
        $paidAmount = floatval($responseParamList["amount"]);

        if ($paymentFee > 0) {
            $fee = ($paidAmount * ($paymentFee / 100));
            $paidAmount -= $fee;
        }
        if ($paymentBonusStartAmount != 0 && $paidAmount > $paymentBonusStartAmount) {
            $bonus = $paidAmount * ($paymentBonus / 100);
            $paidAmount += $bonus;
        }

        $paidAmount = from_to($currencies_array, $methodCurrency, $settings["site_base_currency"], $paidAmount);
        $update = $conn->prepare('UPDATE payments SET 
        client_balance=:balance, 
        payment_amount=:payment_amount, 
        payment_status=:status, 
        payment_delivery=:delivery WHERE payment_id=:id');
        $update->execute(
            [
                'balance' => $user['balance'],
                "payment_amount" => $paidAmount,
                'status' => 3,
                'delivery' => 2,
                'id' => $paymentId
            ]
        );
        $updateBalance = $conn->prepare("UPDATE clients SET balance=:balance WHERE client_id=:id");
        $updateBalance->execute([
            "balance" => $user["balance"] + $paidAmount,
            "id" => $user["client_id"]
        ]);
        $redirectForm .= '<script type="text/javascript">window.location.reload();</script>';

        $response["success"] = true;
        $response["message"] = "The order ID is verified and the money has been added to your account.";
        $response["content"] = $redirectForm;
    } elseif ($responseParamList["bankReferenceNo"] !== $utr) {
        errorExit("Utr verification failed, please try again later.");
    }elseif ($responseParamList["amount"] !== $paymentAmount) {
        errorExit("The amount was not matched.");
    } else {

        errorExit("Utr verification failed, please try again later.");
    }
} else {
    errorExit("This Utr is already used.");
}
