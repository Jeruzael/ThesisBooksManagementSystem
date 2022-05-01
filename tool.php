<?php 
namespace tools {
	include_once('teamsDataCenter/connection.php');
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require 'PHPMailer-master/src/Exception.php';
	require 'PHPMailer-master/src/PHPMailer.php';
	require 'PHPMailer-master/src/SMTP.php';
	require '../teamsDataCenter/connection.php';

	session_start();

	class Gmail 
	{
		public static function sendEmail($addr, $mess)
		{

			$mail = new PHPMailer();
			$mail->isSMTP();
			$mail->Mailer = "smtp";

			$mail->SMTPDebug = 1;
			$mail->SMTPAuth = TRUE;
			$mail->SMTPSecure = "tls";
			$mail->Port = 587;
			$mail->Host = "smtp.gmail.com";
			$mail->Username = "ardums.clothing18@gmail.com";
			$mail->Password = "@rDUms_C10+ing";
			$mail->IsHTML(true);
			$mail->AddAddress($addr, "");
			$mail->SetFrom("ardums.clothing18@gmail.com", "TEAMS THESIS BOOKS COLLECTION");
			$mail->Subject = "OTP";
			$content = "<b>" . $mess . "</b>";

			$mail->MsgHTML($content);
			if(!$mail->Send())
			{
				echo "<script>alert('Email not sent');</script>";				
			}
			else
			{
				echo "<script>alert('Email sent successfuly');</script>";
				/*header("Location: otp.php");*/
			}
		}
	}

	class Otpcode 
	{
		public static function genOTP()
		{
			return random_int(100000, 999999);

		}
	}
}

?>