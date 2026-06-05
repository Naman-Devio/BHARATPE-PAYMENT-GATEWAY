<?php
$methodExtras = [];
if ($methodId == 1) {
    $merchantId = htmlspecialchars($_POST["merchantId"]);
    $merchantKey = htmlspecialchars($_POST["merchantKey"]);
    $methodExtras = [
        "merchantId" => $merchantId,
        "merchantKey" => $merchantKey
    ];
}

if ($methodId == 2) {
    $merchantId = htmlspecialchars($_POST["merchantId"]);
    $methodExtras = [
        "merchantId" => $merchantId
    ];
}

if ($methodId == 3) {
    $accountNumber = htmlspecialchars($_POST["accountNumber"]);
    $alternatePassPhrase = htmlspecialchars($_POST["alternatePassPhrase"]);
    $methodExtras = [
        "accountNumber" => $accountNumber,
        "alternatePassPhrase" => $alternatePassPhrase
    ];
}

if ($methodId == 4) {
    $APIKey = htmlspecialchars($_POST["APIKey"]);
    $methodExtras = [
        "APIKey" => $APIKey
    ];
}

if ($methodId == 5) {
    $MID = htmlspecialchars($_POST["MID"]);
    $APIKey = htmlspecialchars($_POST["APIKey"]);
    $mode = htmlspecialchars($_POST["mode"]);
    $methodExtras = [
        "MID" => $MID,
        "APIKey" => $APIKey,
        "mode" => $mode
    ];
}

if ($methodId == 6) {
    $APIPublicKey = htmlspecialchars($_POST["APIPublicKey"]);
    $APISecretKey = htmlspecialchars($_POST["APISecretKey"]);
    $methodExtras = [
        "APIPublicKey" => $APIPublicKey,
        "APISecretKey" => $APISecretKey
    ];
}

if ($methodId == 7) {
    $email = filter_var($_POST["email"],FILTER_VALIDATE_EMAIL);
    $password = htmlspecialchars($_POST["password"]);
    $methodExtras = [
        "email" => $email,
        "password" => $password
    ];
}

if ($methodId == 8) {
    $email = filter_var($_POST["email"],FILTER_VALIDATE_EMAIL);
    $password = htmlspecialchars($_POST["password"]);
    $senderEmail = htmlspecialchars($_POST["senderEmail"]);
    $emailSubject = htmlspecialchars($_POST["emailSubject"]);
    $methodExtras = [
        "email" => $email,
        "password" => $password,
        "senderEmail" => $senderEmail,
        "emailSubject" => $emailSubject
    ];
}

if ($methodId == 9) {
    $email = filter_var($_POST["email"],FILTER_VALIDATE_EMAIL);
    $password = htmlspecialchars($_POST["password"]);
    $senderEmail = htmlspecialchars($_POST["senderEmail"]);
    $emailSubject = htmlspecialchars($_POST["emailSubject"]);
    $methodExtras = [
        "email" => $email,
        "password" => $password,
        "senderEmail" => $senderEmail,
        "emailSubject" => $emailSubject
    ];
}

if ($methodId == 10) {
    $APIKey = htmlspecialchars($_POST["APIKey"]);
    $authToken = htmlspecialchars($_POST["authToken"]);
    $methodExtras = [
        "APIKey" => $APIKey,
        "authToken" => $authToken
    ];
}

if ($methodId == 11) {
    $webId = htmlspecialchars($_POST["webId"]);
    $methodExtras = [
        "webId" => $webId,
    ];
}

if ($methodId == 12) {
    $partnerId = htmlspecialchars($_POST["partnerId"]);
    $privateKey = htmlspecialchars($_POST["privateKey"]);
    $methodExtras = [
        "partnerId" => $partnerId,
        "privateKey" => $privateKey
    ];
}

if ($methodId == 13) {
    $merchantKey = htmlspecialchars($_POST["merchantKey"]);
    $merchantSalt = htmlspecialchars($_POST["merchantSalt"]);
    $methodExtras = [
        "merchantKey" => $merchantKey,
        "merchantSalt" => $merchantSalt
    ];
}

if ($methodId == 14) {
    $productionAPIToken = htmlspecialchars($_POST["productionAPIToken"]);
    $productionAPISecretKey = htmlspecialchars($_POST["productionAPISecretKey"]);
    $methodExtras = [
        "productionAPIToken" => $productionAPIToken,
        "productionAPISecretKey" => $productionAPISecretKey
    ];
}

if ($methodId == 15) {
    $merchantId = htmlspecialchars($_POST["merchantId"]);
    $publicKey = htmlspecialchars($_POST["publicKey"]);
    $secretKey = htmlspecialchars($_POST["secretKey"]);
    $methodExtras = [
        "merchantId" => $merchantId,
        "publicKey" => $publicKey,
        "secretKey" => $secretKey
    ];
}

if ($methodId == 16) {
    $secretKey = htmlspecialchars($_POST["secretKey"]);
    $methodExtras = [
        "secretKey" => $secretKey
    ];
}

if ($methodId == 17) {
    $publishableKey = htmlspecialchars($_POST["publishableKey"]);
    $secretKey = htmlspecialchars($_POST["secretKey"]);
    $methodExtras = [
        "publishableKey" => $publishableKey,
        "secretKey" => $secretKey
    ];
}

if ($methodId == 18) {
    $shopId = htmlspecialchars($_POST["shopId"]);
    $secretKey = htmlspecialchars($_POST["secretKey"]);
    $methodExtras = [
        "shopId" => $shopId,
        "secretKey" => $secretKey
    ];
}

if ($methodId == 19) {
    $access_token = htmlspecialchars($_POST["access_token"]);
    $methodExtras = [
        "access_token" => $access_token
    ];
}
if ($methodId == 20 ) {
    $shopId = htmlspecialchars($_POST["sec_key"]);
    $secretKey = htmlspecialchars($_POST["apikey"]);
    $methodExtras = [
        "sec_key" => $shopId,
        "apikey" => $secretKey
    ];
}
if ($methodId == 22) {
    $merchantId = htmlspecialchars($_POST["merchantId"]);
    $token = htmlspecialchars($_POST["token"]);
    $methodExtras = [
        "merchantId" => $merchantId,
        "token" => $token
    ];
}
$methodExtras = json_encode($methodExtras);
$update = $conn->prepare("UPDATE paymentmethods SET methodExtras=:extras WHERE methodId=:id");
$update->execute([
    "extras" => $methodExtras,
    "id" => $methodId
]);

?>