<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
 $response = [];
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "helpdesk@theecca.com";
    $email_subject = 'ECCA INQUIRY';

    $name = $_POST['name']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['Phone']; // not required
    $comments = $_POST['Message']; // required
 
  
    $email_message = "Form details below.\n\n";
 
    $email_message .= "Name: ".$name."\n";
    $email_message .= "Email: ".$email_from."\n";
    $email_message .= "Telephone: ".$telephone."\n";
    $email_message .= "Comments: ".$comments."\n";
 
// create email headers
  $headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$headers .= "From:".$email_from."\r\n";
//$headers = 'From: '.$email_to."\r\n".'Reply-To: '.$email_from."\r\n" .'X-Mailer: PHP/' . phpversion();
if(@mail($email_to, $email_subject, $email_message, $headers)){
   $response['message'] = 'Thank You For Contact us we will contact you soon';
   }else{
  $response['message'] = 'Sorry Message has not send please try again';
   }
exit(json_encode($response));
?>


