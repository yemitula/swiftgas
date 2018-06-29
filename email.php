<?php
if($_REQUEST['name'] == '' || $_REQUEST['email'] == '' ||  $_REQUEST['message'] == ''):
  return "error";
endif;
if (filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)):

  // Receiver email address
  $to = 'info@swiftgasng.com';  //Change the email address by yours
 

      // prepare header
  $header = 'From: '. $_REQUEST['name'] . ' '. $_REQUEST['email'] .''. "\r\n";
  $header .= 'Reply-To:  '. $_REQUEST['name'] . ' '. $_REQUEST['email'] .''. "\r\n";
       $header .= 'Cc:  ' . 'okoroafor.chubi@gmail.com' . "\r\n";
      // $header .= 'Bcc:  ' . 'example@domain.com' . "\r\n";
  $header .= 'X-Mailer: PHP/' . phpversion();

      // Contact subject
  
  $subject = 'Contact Form Submission from SwiftGas Website'; // Subject of your email

  $message .= 'Name: ' . $_REQUEST['name'] . "\n";
  $message .= 'Email: ' . $_REQUEST['email'] . "\n";
  $message .= 'Message: '. $_REQUEST['message'];

  // Send contact information
  $mail = mail( $to, $subject, $message, $header );

  // Autoresponse to User  -----------------------------------------------//

  $header = 'From: Swift Gas Ltd Website info@swiftgasng.com'. "\r\n";
  $header .= 'Reply-To:  Swift Gas Ltd Website info@swiftgasng.com'. "\r\n";
      // $header .= 'Cc:  ' . 'example@domain.com' . "\r\n";
      // $header .= 'Bcc:  ' . 'example@domain.com' . "\r\n";
  $header .= 'X-Mailer: PHP/' . phpversion();

  $subject = 'Your Contact Form Submission on SwiftGas Website';

  $mail = mail( $_REQUEST['email'], $subject, $message, $header );

  echo 'sent';
  else:
    return "error";
  endif; 

?>