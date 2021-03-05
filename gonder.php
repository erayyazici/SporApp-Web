<?php 
include "class.phpmailer.php";

if(isset($_POST['mailgonder'])){

	$_Mail=$_POST['iletisim_mail'];
	$_Ad=$_POST['iletisim_ad'];
	$_Mesaj=$_POST['iletisim_mesaj'];
	$_Konu=$_POST['iletisim_konu'];

	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 465;
	$mail->SMTPSecure = 'ssl';
	$mail->Username = 'cihaterayyazici@gmail.com';
	$mail->Password = '#';
	$mail->SetFrom($mail->Username,'İki Teker Bir Dünya:');
		$mail->AddAddress($_Mail, 'Cihat Eray');
		$mail->CharSet = 'UTF-8';
		$mail->Subject = 'Bigilendirme Maili';
		$content = 'Gönderen: '.$_Ad.'<br>'.'Konu: '.$_Konu.'<br>'.'Mesaj: '.$_Mesaj.'';

		$mail->MsgHTML($content);
		if($mail->Send()) { 
			header("location:../production/mesajlar.php?durum=okeyto");
		} else {
			echo $mail->ErrorInfo;
			header("location:../production/mesajlar.php?durum=nonono");
		}
	}
	?>