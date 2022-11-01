<?php

require('config.php');
require('db.php');

session_start();

require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['number'];
$amount = $_POST['price'];

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{
            $payment_id = $_POST['razorpay_payment_id'];
            $paid = 'Paid';
            
            // $email = $_POST['email'];
            // $number = $_POST['number'];
            // $amount = $_POST['price'];

            // $html = "<p>Your payment was successful</p>
            //  <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";

            $sql= "INSERT INTO razorpay_test(pay_id,name,email,phone_number,amount,pay_status) VALUES (?,?,?,?,?,?);";
					$stmt = mysqli_stmt_init($conn);
					mysqli_stmt_prepare($stmt, $sql);

					mysqli_stmt_bind_param($stmt, "ssssss",$payment_id,$name,$email,$number,$amount,$paid);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_close($stmt);
                    header("Location: success.php?success=$succ");
					exit();
             
}
else
{
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}

echo $html;
