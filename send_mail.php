<?php
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );

if (isset($_POST['submit'])) {

$name = $_POST['name'];
$number = $_POST['phone'];
$from = $_POST['email']; 

$errorEmpty = false;
$errorEmail = false;

$mailHeaders = "Name: " . $name . "\r\nMail: " . $from . "\r\nNumber: " . $number ;

$to = "hashmvhashmuhammed007@gmail.com";

$headers = "From:" . $from;

    // if($empty($name) || empty($number) || empty($from) || empty($subject)) {
    //     echo "<span class='form_error'>Fill in necessary the fields</span>";
    //     $errorEmpty = true;
    // }

    // elseif(!filter_var($from, FILTER_VALIDATE_EMAIL)) {
    //     echo "<span class='form_error'>Invalid email id</span>";
    //     $errorEmail = true;
    // }

if(mail($to, $mailHeaders, $headers)) {
    echo "<span class='form_success'>mail send</span>";
} 

}
    else {
        echo "The email message was not sent.";
    }
?>

<script>

    var errorEmpty = "<?php echo $errorEmpty; ?>"
    var errorEmail = "<?php echo $errorEmail; ?>"
    
    if(errorEmpty == true) {
        $("#mail_name, #mail_email, #mail_phone").addClass("input_error");
    }
    
    if(errorEmail == true) {
        $("#mail_email").addClass("input_error");
    }
    
    if(errorEmpty == false  && errorEmail == false) {
        
    }
    
</script>