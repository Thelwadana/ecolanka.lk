<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$cus_name = $_GET['clientname'];
$cus_email = $_GET['clientemail'];
$cus_subject = $_GET['clientsubject'];
$cus_message = $_GET['clientmessage'];


$mail = new PHPMailer;
$mail->IsSMTP();
$mail->Mailer = "smtp";
$mail->SMTPDebug  = 0; 
$mail->SMTPAuth = true;       
$mail->SMTPSecure = 'tls';  
$mail->Port = 587;
$mail->Host = 'smtp.gmail.com'; 
$mail->Username = 'customermessages.ecolanka@gmail.com';           
$mail->Password = 'mzokqeoaevniqzys';  


$mail->From = "$cus_name via www.ecolanka.lk";
$mail->FromName = 'ECOLANKA';
$mail->Subject = "$cus_subject ($cus_name via ecolanka.lk)";
$mail->AddAddress('12nmbthelwadana@gmail.com', "Ecolanka official");//Provide Company email
$mail->SetFrom($cus_email, "Sent via www.echolanka.lk : "+$cus_subject);
$mail->AddReplyTo($cus_email, $cus_name);

$content = '<html>
<head>
<style type="text/css">
body table tr {
	font-family: Arial, Helvetica, sans-serif;
}
body table tr {
	font-family: Georgia, "Times New Roman", Times, serif;
}
</style>
</head>
<body>
<center><img src="img/ecolanka.png" width="100" alt="logo"><center>
<br>
<table width="657" height="78" align="center" cellpadding="10">
<tr>
  <td width="649" height="72" bgcolor="#FFF"><div align="" style="width: 100%; padding:5px; font-family: Georgia, "Times New Roman", Times, serif; font-size: 24px; color: #000;">
<p style="color: #F00; font-size: 25px;" align="center">Eco Lanka International</p>

<HR>
<p><h3>Customer Name : '.$cus_name.' </h3></p>
<p><h3>Customer Email : '.$cus_email.' </h3></p>
<p><h3>Customer Subject : '.$cus_subject.'</h3></p>
<p><h3>Message : '.$cus_message.' </h3></p>

<p>&nbsp;</p>
<p>Thank you.</p>
<p>System,</p>
<p>www.ecolanka.lk</p>
<P>'.date("Y-m-d").'</p>
<p>&nbsp;</p>
</div></td>
  </tr>
</table>

</body>
</html>';

$mail->MsgHTML($content); 
$mail->IsHTML(true);
if(!$mail->Send()) {
  echo "Error while sending Email. Please try again or Contact : 0777223310 ";
  //var_dump($mail);
} else {
  echo "Email sent successfully";
}
?>