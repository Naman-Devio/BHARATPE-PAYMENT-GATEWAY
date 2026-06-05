<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if ($_GET["action"] == "getData") {
        $paymentMethods = $conn->prepare("SELECT methodId, methodLogo, methodVisibleName, methodMin, methodMax, methodStatus FROM paymentmethods ORDER BY methodPosition ASC");
        $paymentMethods->execute();
        $paymentMethods = $paymentMethods->fetchAll(PDO::FETCH_ASSOC);
        $methods = [];
        for ($i = 0; $i < count($paymentMethods); $i++) {
            $methods[] = [
                "id" => $paymentMethods[$i]["methodId"],
                "name" => $paymentMethods[$i]["methodVisibleName"],
                "logo" => $paymentMethods[$i]["methodLogo"],
                "min" => $paymentMethods[$i]["methodMin"],
                "max" => $paymentMethods[$i]["methodMax"],
                "status" => $paymentMethods[$i]["methodStatus"]
            ];
        }
        header("Content-Type: application/json");
        echo json_encode($methods);
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $manualMethods = [
        100,
        101,
        102,
        103,
        104,
        105,
        106,
        107,
        108,
        109
    ];

    if (route(3) == "getForm") {
        $methodId = intval($_POST["methodId"]);
        $response = [];
        $method = $conn->prepare("SELECT methodId, methodVisibleName, methodMin, methodMax, methodFee, methodBonusPercentage, methodBonusStartAmount, methodStatus, methodExtras, methodInstructions FROM paymentmethods WHERE methodId=:id");
        $method->execute([
            "id" => $methodId
        ]);

        if ($method->rowCount()) {
            $method = $method->fetch(PDO::FETCH_ASSOC);
            $methodExtras = json_decode($method["methodExtras"], 1);
            require_once("paymentMethods/getForm.php");
            $response = [
                "success" => true,
                "content" => $form
            ];

            header("Content-Type: application/json");
            echo json_encode($response);

        } else {
            errorExit("This payment method doesn't exist.");
        }

    }
    if (route(3) == "edit") {
        $response = [];
        require_once("paymentMethods/edit.php");

        echo json_encode($response);
    }

    if (route(3) == "activate") {
        $update = $conn->prepare("UPDATE paymentmethods SET methodStatus=:status WHERE methodId=:id");
        $update->execute([
            "status" => 1,
            "id" => intval($_POST["methodId"])
        ]);
    }
    if (route(3) == "deactivate") {
        $update = $conn->prepare("UPDATE paymentmethods SET methodStatus=:status WHERE methodId=:id");
        $update->execute([
            "status" => 0,
            "id" => intval($_POST["methodId"])
        ]);
    }

    if (route(3) == "sort") {
        $sortData = json_decode(base64_decode($_POST["sortData"]), 1);
        for ($i = 0; $i < count($sortData); $i++) {
            $methodPos = $i + 1;
            $methodId = intval($sortData[$i]);
            $update = $conn->prepare("UPDATE paymentmethods SET methodPosition=:position WHERE methodId=:id");
            $update->execute([
                "position" => $methodPos,
                "id" => $methodId
            ]);
        }
    }

    exit;
}