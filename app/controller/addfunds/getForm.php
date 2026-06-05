<?php 
if (!defined('ADDFUNDS')) {
    http_response_code(404);
    die();
}

$amountField = '<div class="form-group">
<label class="control-label">Amount</label>
<input type="number" id="paymentAmount" class="form-control" name="payment_amount" step="0.01" required />
</div>';
$feeField = '<div id="fee_fields"></div>';
$paymentBtn = '<button type="submit" class="btn btn-block btn-primary btn-big-primary">[text]</button>';

if($selectedMethod == 1){
    $formData .= $amountField;
    $formData .= $feeField;
    $formData .= replaceText($paymentBtn,"Initiate Payment");
}

if($selectedMethod == 2){
    $formData .= '<div class="form-group">
    <label class="control-label">Order ID</label>
    <input type="text" class="form-control" name="payTMOrderId"  required />
    </div>';
    $formData .= $amountField;
    $formData .= $feeField;
    $formData .= replaceText($paymentBtn,"Verify Transaction");
}

if($selectedMethod == 3){
    $formData .= $amountField;
    $formData .= $feeField;
    $formData .= replaceText($paymentBtn,"Initiate Payment");
}

if($selectedMethod == 4){
    $formData .= $amountField;
    $formData .= $feeField;
    $formData .= replaceText($paymentBtn,"Initiate Payment");
}

if($selectedMethod == 5){
    $formData .= $amountField;
    $formData .= $feeField;
    $formData .= replaceText($paymentBtn,"Initiate Payment");
}

if($selectedMethod == 6){
    $formData .= $amountField;
    $formData .= $feeField;
    $formData .= replaceText($paymentBtn,"Initiate Payment");
}

if($selectedMethod == 7){
    $formData .= '<div class="form-group">
    <label class="control-label">Transaction ID</label>
    <input type="text" class="form-control" name="PhonePeTransactionId"  required />
    </div>';
    $formData .= $amountField;
    $formData .= $feeField;
    $formData .= replaceText($paymentBtn,"Verify Transaction");
}

if($selectedMethod == 8){
    $formData .= '<div class="form-group">
    <label class="control-label">Transaction ID</label>
    <input type="text" class="form-control" name="EasypaisaTransactionId"  required />
    </div>';
    $formData .= $amountField;
    $formData .= $feeField;
    $formData .= replaceText($paymentBtn,"Verify Transaction");
}

if($selectedMethod == 9){
    $formData .= '<div class="form-group">
    <label class="control-label">Transaction ID</label>
    <input type="text" class="form-control" name="JazzcashTransactionId"  required />
    </div>';
    $formData .= $amountField;
    $formData .= $feeField;
    $formData .= replaceText($paymentBtn,"Verify Transaction");
}

if($selectedMethod == 20){
    $formData .= '<div class="form-group">
    <label class="control-label">UTR ID ( Upi Transcription Id )</label>
    <input type="text" class="form-control" name="utr_id"  required />
    </div>';
    $formData .= $amountField;
    $formData .= $feeField;
    $formData .= replaceText($paymentBtn,"Verify Transaction");
}


if($selectedMethod == 10){
    $formData .= $amountField;
    $formData .= $feeField;
    $formData .= replaceText($paymentBtn,"Initiate Payment");
}


if($selectedMethod == 11){
    $formData .= $amountField;
    $formData .= $feeField;
    $formData .= replaceText($paymentBtn,"Initiate Payment");
}

if($selectedMethod == 12){
    $formData .= $amountField;
    $formData .= $feeField;
    $formData .= replaceText($paymentBtn,"Initiate Payment");
}

if($selectedMethod == 13){
    $formData .= $amountField;
    $formData .= $feeField;
    $formData .= replaceText($paymentBtn,"Initiate Payment");
}

if($selectedMethod == 14){
    $formData .= $amountField;
    $formData .= $feeField;
    $formData .= replaceText($paymentBtn,"Initiate Payment");
}

if($selectedMethod == 15){
    $formData .= $amountField;
    $formData .= $feeField;
    $formData .= replaceText($paymentBtn,"Initiate Payment");
}

if($selectedMethod == 16){
    $formData .= $amountField;
    $formData .= $feeField;
    $formData .= replaceText($paymentBtn,"Initiate Payment");
}

if($selectedMethod == 17){
    $formData .= $amountField;
    $formData .= $feeField;
    $formData .= replaceText($paymentBtn,"Initiate Payment");
}

if($selectedMethod == 18){
    $formData .= $amountField;
    $formData .= $feeField;
    $formData .= replaceText($paymentBtn,"Initiate Payment");
}
if($selectedMethod == 22){
    $formData .= '<div class="form-group">
    <label class="control-label">Enter Utr</label>
    <input type="text" class="form-control" name="utr"  required />
    </div>';
    $formData .= $amountField;
    $formData .= $feeField;
    $formData .= replaceText($paymentBtn,"Verify Transaction");
}
?>