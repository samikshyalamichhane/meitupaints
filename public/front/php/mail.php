<?php


// Taking all values
$firstName 		= $_POST['firstName'];
$phone 		= $_POST['phone'];
$email 		= $_POST['email'];
$subjectName 	= $_POST['subjectName'];
$msg 		= $_POST['msg'];
$output 	= "First Name: ".$firstName."\n\nLast Name: ".$firstName."\n\nSubject: ".$subjectName."\n\nMessage: ".$msg;

$to 		= 'asamshahadat@gmail.com';
$headers	= 'FROM: "'.$email.'"';

$send = mail($to, $firstName, $output."\n\n***This message has been sent from Wepaint", $headers);


