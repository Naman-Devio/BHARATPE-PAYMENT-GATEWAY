<?php
if (!defined('BASEPATH')) {
    die('Direct access to the script is not allowed');
}

if ($_SESSION["msmbilisim_userlogin"] != 1 || $user["client_type"] == 1) {
    header("Location:" . site_url('logout'));
}
if ($settings["email_confirmation"] == 1 && $user["email_type"] == 1) {
    header("Location:" . site_url('confirm_email'));
}

define("PAYMENT", TRUE);


$callbackSlug = route(1);
$response = [];
if (empty($callbackSlug)) {
    errorExit("Invalid payment method callback.");
}

$paymentMethod = $conn->prepare("SELECT * FROM paymentmethods WHERE methodCallback=:callbackSlug AND methodStatus=:status");
$paymentMethod->execute([
    "callbackSlug" => $callbackSlug,
    "status" => 1
]);
if ($paymentMethod->rowCount()) {
    $paymentMethod = $paymentMethod->fetch(PDO::FETCH_ASSOC);
    $methodId = $paymentMethod["methodId"];
    $methodMin = number_format($paymentMethod["methodMin"], 2, '.', '');
    $methodMax = number_format($paymentMethod["methodMax"], 2, '.', '');
    $methodCurrency = $paymentMethod["methodCurrency"];
    $methodCurrencySymbol = $currencies_array[$methodCurrency][0]["currency_symbol"] ?: $methodCurrency;
    $methodExtras = json_decode($paymentMethod["methodExtras"], 1);
    $paymentFee = $paymentMethod["methodFee"];
    $paymentBonus = $paymentMethod["methodBonusPercentage"];
    $paymentBonusStartAmount = $paymentMethod["methodBonusStartAmount"];
    if ($callbackSlug == "payTMCheckout") {
        require("payment/payTMCheckout.php");
        exit;
    }

    if ($callbackSlug == "payTMMerchant") {
        require("payment/payTMMerchant.php");
        exit;
    }

    if ($callbackSlug == "perfectMoney") {
        require("payment/perfectMoney.php");
        exit;
    }

    if ($callbackSlug == "coinbaseCommerce") {
        require("payment/coinbaseCommerce.php");
        exit;
    }

    if ($callbackSlug == "kashier") {
        require("payment/kashier.php");
        exit;
    }

    if ($callbackSlug == "razorPay") {
        require("payment/razorPay.php");
        exit;
    }

    if ($callbackSlug == "phonepe") {
        require("payment/phonepe.php");
        exit;
    }

    if ($callbackSlug == "easypaisa") {
        require("payment/easypaisa.php");
        exit;
    }

    if ($callbackSlug == "jazzcash") {
        require("payment/jazzcash.php");
        exit;
    }

    if ($callbackSlug == "instamojo") {
        require("payment/instamojo.php");
        exit;
    }

    if ($callbackSlug == "alipay") {
        require("payment/alipay.php");
        exit;
    }

    if ($callbackSlug == "payU") {
        require("payment/payU.php");
        exit;
    }

    if ($callbackSlug == "upiapi") {
        require("payment/upiapi.php");
        exit;
    }

    if ($callbackSlug == "opay") {
        require("payment/opay.php");
        exit;
    }

    if ($callbackSlug == "flutterwave") {
        require("payment/flutterwave.php");
        exit;
    }

    if ($callbackSlug == "stripe") {
        require("payment/stripe.php");
        exit;
    }

    if ($callbackSlug == "payeer") {
        require("payment/payeer.php");
        exit;
    }
    if ($callbackSlug == "bharatpe") {
        require("payment/bharatpe.php");
        exit;
    }
} else {
    errorExit("Invalid payment method callback.");
}