<?php 
require_once('Mail.php');
require_once('Mail/mime.php');
require_once('Net/SMTP.php');

$host = "localhost";  
$username = "hr@taconsulting.in";  
$password = "taconsulting2012";  



$name = $_REQUEST['name'] ; 
$sex = $_REQUEST['sex'] ; 
$email = $_REQUEST['email'] ; 
$number = $_REQUEST['number'] ; 
$location = $_REQUEST['location'] ; 
$relocate = $_REQUEST['relocate'] ; 
$salary = $_REQUEST['salary'] ; 
$salary2 = $_REQUEST['salary2'] ; 
$resume = $_REQUEST['resume'] ; 
$comments = $_REQUEST['comments'] ; 




$from = $email; 
$to = "hr@taconsulting.in"; 
$subject = "Enquiry"; 



$body = $body = "Name: $name \nSex: $sex \nEmail: $email \nContactNumber: $number \nLocation: $location \nRelocate: $relocate \nCurrentSalary: $salary \nExpectedSalary: $salary2 \nResume: $resume \nComments: $comments \n";


$headers = array ('From' => $from, 
'To' => $to, 
'Subject' => $subject); 
$smtp = Mail::factory('smtp', 
array ('host' => $host, 
'auth' => true, 
'username' => $username, 
'password' => $password)); 

$mail = $smtp->send($to, $headers, $body); 

if (PEAR::isError($mail)) { 
?> 
<p> <? echo $mail->getMessage();