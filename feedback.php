<?php
$name= $_POST['name'];
$visior_email=$_POST['email'];
$messge= $_POST['message'];
$email_form ='abhinavsharma7888@gamil.com'
$email_subject = "New Form Submission";
$email_body = "User Name:   $name.\n",
                "User Email: $visior_email.\n",
                "User Message: $message.\n";
                $to  = "pankaj11366@gmail.com";
                $headers = "From: $email_form \r\n";
                $headers .= "Reply-To: $visior_email \r\n";
                mail($to,$email_subject,$email_body,$headers);
                header("Location: test.html");
?>
