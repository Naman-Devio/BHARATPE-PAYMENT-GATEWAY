<?php

$form .= '<form method="POST" action="admin/settings/paymentMethods/edit">';
$form .= '<input type="hidden" name="method_id" value="' . $method["methodId"] . '"/>';
$form .= '<div class="form-group mb-3"><label class="form-label">Method Name</label>
<input type="text"  name="method_name" class="form-control" value="' . $method["methodVisibleName"] . '"/></div>';

if (!in_array($method["methodId"], $manualMethods)) {
    $form .= '<div class="form-group mb-3"><label class="form-label">Minimum Amount</label>
<input type="number"  name="method_min" class="form-control" value="' . $method["methodMin"] . '"/></div>';

    $form .= '<div class="form-group mb-3"><label class="form-label">Maximum Amount</label>
<input type="number"  name="method_max" class="form-control" value="' . $method["methodMax"] . '"/></div>';


    $form .= '<div class="form-group mb-3"><label class="form-label">Fee Percentage</label><div class="input-group">
<input type="number" class="form-control" name="method_fee" step="0.01" value="' . $method["methodFee"] . '">
<span class="input-group-text"><i class="bi bi-percent"></i></span>
</div></div>';

    $form .= '<div class="form-group mb-3"><label class="form-label">Bonus Percentage</label><div class="input-group">
<input type="number" class="form-control" name="method_bonus" step="0.01" value="' . $method["methodBonusPercentage"] . '">
<span class="input-group-text"><i class="bi bi-percent"></i></span>
</div></div>';

    $form .= '<div class="form-group mb-3"><label class="form-label">Bonus Start Amount</label>
<input type="number"  name="method_bonus_start_amount" class="form-control" value="' . $method["methodBonusStartAmount"] . '"/></div>';
}

$form .= '<div class="form-group mb-3"><label class="form-label">Status</label><select name="method_status" class="form-select">';
$form .= '<option value="1"';
if ($method["methodStatus"] == "1") {
    $form .= ' selected';
}
$form .= '>Active</option>';

$form .= '<option value="0"';
if ($method["methodStatus"] == "0") {
    $form .= ' selected';
}
$form .= '>Inactive</option>';
$form .= '</select></div>';

$form .= '<div class="form-group mb-3"><label class="form-label">Instructions</label><div id="editor" name="method_instructions" class="extraContents">' . htmlspecialchars_decode($method["methodInstructions"]) . '</div></div>';

/* $form .= '<div id="editor">
<p>Hello World!</p>
<p>Some initial <strong>bold</strong> text</p>
<p><br></p>
</div>'; */



if ($method["methodId"] == 1) {
    $form .= '<div class="form-group mb-3"><label class="form-label">Merchant ID</label>
    <input type="text"  name="merchantId" class="form-control" value="' . $methodExtras["merchantId"] . '"/></div>';
    $form .= '<div class="form-group mb-3"><label class="form-label">Merchant Key</label>
    <input type="text"  name="merchantKey" class="form-control" value="' . $methodExtras["merchantKey"] . '"/></div>';
}

if ($method["methodId"] == 2) {
    $form .= '<div class="form-group mb-3"><label class="form-label">Merchant ID</label>
    <input type="text"  name="merchantId" class="form-control" value="' . $methodExtras["merchantId"] . '"/></div>';
}

if ($method["methodId"] == 3) {
    $form .= '<div class="form-group mb-3"><label class="form-label">USD ID</label>
    <input type="text"  name="accountNumber" class="form-control" value="' . $methodExtras["accountNumber"] . '"/></div>';
    $form .= '<div class="form-group mb-3"><label class="form-label">Alternate Pass Phrase</label>
    <input type="text"  name="alternatePassPhrase" class="form-control" value="' . $methodExtras["alternatePassPhrase"] . '"/></div>';
}

if ($method["methodId"] == 4) {
    $form .= '<div class="form-group mb-3"><label class="form-label">API Key</label>
    <input type="text"  name="APIKey" class="form-control" value="' . $methodExtras["APIKey"] . '"/></div>';
}

if ($method["methodId"] == 5) {
    $form .= '<div class="form-group mb-3"><label class="form-label">MID</label>
    <input type="text"  name="MID" class="form-control" value="' . $methodExtras["MID"] . '"/></div>';
    $form .= '<div class="form-group mb-3"><label class="form-label">API Key</label>
    <input type="text"  name="APIKey" class="form-control" value="' . $methodExtras["APIKey"] . '"/></div>';

    $form .= '<div class="form-group mb-3"><label class="form-label">Mode</label><select name="mode" class="form-select">';
    $form .= '<option value="live"';
    if ($method["methodStatus"] == "live") {
        $form .= ' selected';
    }
    $form .= '>Live</option>';

    $form .= '<option value="test"';
    if ($method["methodStatus"] == "test") {
        $form .= ' selected';
    }
    $form .= '>Test</option>';
    $form .= '</select></div>';
}

if ($method["methodId"] == 6) {
    $form .= '<div class="form-group mb-3"><label class="form-label">API Public Key</label>
    <input type="text"  name="APIPublicKey" class="form-control" value="' . $methodExtras["APIPublicKey"] . '"/></div>';
    $form .= '<div class="form-group mb-3"><label class="form-label">API Secret Key</label>
    <input type="text"  name="APISecretKey" class="form-control" value="' . $methodExtras["APISecretKey"] . '"/></div>';
}

if ($method["methodId"] == 7) {
    $form .= '<div class="form-group mb-3"><label class="form-label">Gmail Address</label>
    <input type="text"  name="email" class="form-control" value="' . $methodExtras["email"] . '"/></div>';
    $form .= '<div class="form-group mb-3"><label class="form-label">App Password</label>
    <input type="text"  name="password" class="form-control" value="' . $methodExtras["password"] . '"/></div>';
}

if ($method["methodId"] == 8) {
    $form .= '<div class="form-group mb-3"><label class="form-label">Gmail Address</label>
    <input type="text"  name="email" class="form-control" value="' . $methodExtras["email"] . '"/></div>';
    $form .= '<div class="form-group mb-3"><label class="form-label">App Password</label>
    <input type="text"  name="password" class="form-control" value="' . $methodExtras["password"] . '"/></div>';
    $form .= '<div class="form-group mb-3"><label class="form-label">Sender Email</label>
    <input type="text"  name="senderEmail" class="form-control" value="' . $methodExtras["senderEmail"] . '"/></div>';
    $form .= '<div class="form-group mb-3"><label class="form-label">Email Subject</label>
    <input type="text"  name="emailSubject" class="form-control" value="' . $methodExtras["emailSubject"] . '"/></div>';
}

if ($method["methodId"] == 9) {
    $form .= '<div class="form-group mb-3"><label class="form-label">Gmail Address</label>
    <input type="text"  name="email" class="form-control" value="' . $methodExtras["email"] . '"/></div>';
    $form .= '<div class="form-group mb-3"><label class="form-label">App Password</label>
    <input type="text"  name="password" class="form-control" value="' . $methodExtras["password"] . '"/></div>';
    $form .= '<div class="form-group mb-3"><label class="form-label">Sender Email</label>
    <input type="text"  name="senderEmail" class="form-control" value="' . $methodExtras["senderEmail"] . '"/></div>';
    $form .= '<div class="form-group mb-3"><label class="form-label">Email Subject</label>
    <input type="text"  name="emailSubject" class="form-control" value="' . $methodExtras["emailSubject"] . '"/></div>';
}

if($method["methodId"] == 10) {
    $form .= '<div class="form-group mb-3"><label class="form-label">API Key</label>
    <input type="text"  name="APIKey" class="form-control" value="' . $methodExtras["APIKey"] . '"/></div>';
    $form .= '<div class="form-group mb-3"><label class="form-label">Auth Token</label>
    <input type="text"  name="authToken" class="form-control" value="' . $methodExtras["authToken"] . '"/></div>';
}

if($method["methodId"] == 11) {
    $form .= '<div class="form-group mb-3"><label class="form-label">Web ID</label>
    <input type="text"  name="webId" class="form-control" value="' . $methodExtras["webId"] . '"/></div>';
}

if($method["methodId"] == 12) {
    $form .= '<div class="form-group mb-3"><label class="form-label">Application Partner ID</label>
    <input type="text"  name="partnerId" class="form-control" value="' . $methodExtras["partnerId"] . '"/></div>';
    $form .= '<div class="form-group mb-3"><label class="form-label">Application Private Key</label>
    <input type="text"  name="privateKey" class="form-control" value="' . $methodExtras["privateKey"] . '"/></div>';
}

if($method["methodId"] == 13) {
    $form .= '<div class="form-group mb-3"><label class="form-label">Merchant Key</label>
    <input type="text"  name="merchantKey" class="form-control" value="' . $methodExtras["merchantKey"] . '"/></div>';
    $form .= '<div class="form-group mb-3"><label class="form-label">Merchant Salt</label>
    <input type="text"  name="merchantSalt" class="form-control" value="' . $methodExtras["merchantSalt"] . '"/></div>';
}

if($method["methodId"] == 14) {
    $form .= '<div class="form-group mb-3"><label class="form-label">Production API Token</label>
    <input type="text"  name="productionAPIToken" class="form-control" value="' . $methodExtras["productionAPIToken"] . '"/></div>';
    $form .= '<div class="form-group mb-3"><label class="form-label">Production Secret Key</label>
    <input type="text"  name="productionAPISecretKey" class="form-control" value="' . $methodExtras["productionAPISecretKey"] . '"/></div>';
}

if($method["methodId"] == 15) {
    $form .= '<div class="form-group mb-3"><label class="form-label">Merchant ID</label>
    <input type="text"  name="merchantId" class="form-control" value="' . $methodExtras["merchantId"] . '"/></div>';
    $form .= '<div class="form-group mb-3"><label class="form-label">Public Key</label>
    <input type="text"  name="publicKey" class="form-control" value="' . $methodExtras["publicKey"] . '"/></div>';
    $form .= '<div class="form-group mb-3"><label class="form-label">Secret Key</label>
    <input type="text"  name="secretKey" class="form-control" value="' . $methodExtras["secretKey"] . '"/></div>';
}

if($method["methodId"] == 16) {
    $form .= '<div class="form-group mb-3"><label class="form-label">Secret Key</label>
    <input type="text"  name="secretKey" class="form-control" value="' . $methodExtras["secretKey"] . '"/></div>';
}

if($method["methodId"] == 17) {
    $form .= '<div class="form-group mb-3"><label class="form-label">Publishable Key</label>
    <input type="text"  name="publishableKey" class="form-control" value="' . $methodExtras["publishableKey"] . '"/></div>';
    $form .= '<div class="form-group mb-3"><label class="form-label">Secret Key</label>
    <input type="text"  name="secretKey" class="form-control" value="' . $methodExtras["secretKey"] . '"/></div>';
}

if($method["methodId"] == 18) {
    $form .= '<div class="form-group mb-3"><label class="form-label">Shop ID</label>
    <input type="text"  name="shopId" class="form-control" value="' . $methodExtras["shopId"] . '"/></div>';
    $form .= '<div class="form-group mb-3"><label class="form-label">Secret Key</label>
    <input type="text"  name="secretKey" class="form-control" value="' . $methodExtras["secretKey"] . '"/></div>';
}

if ($method["methodId"] == 22) {
    $form .= '<div class="form-group mb-3"><label class="form-label">Merchant ID</label>
    <input type="text"  name="merchantId" class="form-control" value="' . $methodExtras["merchantId"] . '"/></div>';
    $form .= '<div class="form-group mb-3"><label class="form-label">Token</label>
    <input type="text"  name="token" class="form-control" value="' . $methodExtras["token"] . '"/></div>';
}
if($method["methodId"] == 20) {
    $form .= '<div class="form-group mb-3"><label class="form-label">Sec Key</label>
    <input type="text"  name="sec_key" class="form-control" value="' . $methodExtras["sec_key"] . '"/></div>';
    $form .= '<div class="form-group mb-3"><label class="form-label">Apikey</label>
    <input type="text"  name="apikey" class="form-control" value="' . $methodExtras["apikey"] . '"/></div>';
}

$form .= '<div class="custom-modal-footer"><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>&nbsp;&nbsp;<button type="submit" data-loading-text="Updating..." class="btn btn-primary">Edit</button></div></form>';

?>