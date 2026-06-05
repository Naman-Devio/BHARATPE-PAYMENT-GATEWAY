<?php

$automaticMethods = [
    1,
    2,
    3,
    4,
    5,
    6,
    7,
    8,
    9,
    10,
    11,
    12,
    13,
    14,
    15,
    16,
    17,
    18,
    22
];

$allMethods = array_merge($automaticMethods, $manualMethods);

$methodId = intval($_POST["method_id"]);
$methodVisibleName = htmlspecialchars($_POST["method_name"]);
$methodMin = intval($_POST["method_min"]);
$methodMax = intval($_POST["method_max"]);
$methodFee = floatval($_POST["method_fee"]);
$methodBonusPercentage = floatval($_POST["method_bonus"]);
$methodBonusStartAmount = intval($_POST["method_bonus_start_amount"]);
$methodStatus = in_array($_POST["method_status"], [0, 1]) ? $_POST["method_status"] : 1;
$methodInstructions = htmlspecialchars($_POST["method_instructions"]);
$methodInstructions = str_replace("&lt;p&gt;&lt;br&gt;&lt;/p&gt;","",$methodInstructions);

if (!in_array($methodId, $allMethods)) {
    errorExit("Invalid payment method");
}

if (in_array($methodId, $automaticMethods)) {
    $update = $conn->prepare("UPDATE paymentmethods SET 
                          methodVisibleName=:name,
                          methodMin=:min,
                          methodMax=:max,
                          methodFee=:fee,
                          methodBonusPercentage=:bonus,
                          methodBonusStartAmount=:bonus_start_amount,
                          methodStatus=:status,
                          methodInstructions=:instructions
                        WHERE methodId=:id");
    $update->execute([
        "name" => $methodVisibleName,
        "min" => $methodMin,
        "max" => $methodMax,
        "fee" => $methodFee,
        "bonus" => $methodBonusPercentage,
        "bonus_start_amount" => $methodBonusStartAmount,
        "status" => $methodStatus,
        "instructions" => $methodInstructions,
        "id" => $methodId
    ]);

    $response = [
        "success" => true,
        "message" => "Payment method updated successfully."
    ];

    require_once("editMethodExtras.php");

} else {
    $update = $conn->prepare("UPDATE paymentmethods SET 
                          methodVisibleName=:name,
                          methodStatus=:status,
                          methodInstructions=:instructions
                        WHERE methodId=:id");
    $update->execute([
        "name" => $methodVisibleName,
        "status" => $methodStatus,
        "instructions" => $methodInstructions,
        "id" => $methodId
    ]);

    $response = [
        "success" => true,
        "message" => "Payment method updated successfully."
    ];
}
?>