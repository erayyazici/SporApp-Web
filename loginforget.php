<?php
include "baglan.php";
include "class.phpmailer.php";
ob_start();
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>𝓢𝔀𝓮𝓪𝓽 𝓐𝓻𝓮𝓷𝓪</title>

  <!-- Bootstrap -->
  <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- Animate.css -->
  <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="build/css/custom.min.css" rel="stylesheet">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body class="login">
  <div>
    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
         <form action="islem.php" method="POST">
          <h1>𝓢𝔀𝓮𝓪𝓽 𝓐𝓻𝓮𝓷𝓪</br></br> 𝓢̧𝓲𝓯𝓻𝓮 𝓨𝓮𝓷𝓲𝓵𝓮𝓶𝓮</h1>
          <div>
            <input class="form-control" name="users_tc" type="text" placeholder="Kullanıcı Adınızı Giriniz...*" required="">
          </div>
          <div>
            <input class="form-control" name="users_mail" type="text" pattern="[^ @]*@[^ @]*" placeholder="Mail Adresinizi Giriniz...*" required="">
          </div>
          <div class=col-lg-12>
            <button class="btn btn-default" name="login_forget" onclick="window.location.href='loginforget.php';"  style="background-color:#73989C; width: 100%; color: white;">Şifre Yenile</button>
          </div>

          <div class="clearfix"></div>

          <div class="separator">
            <p class="change_link"></p>
            <?php 
            if (@$_GET['durum']=="no")
              {?>
                <script type="text/javascript">
                  swal({
                    title:"Hata",
                    text:"Kullanıcı adı veya mail adresi yanlış.",
                    icon: "error",
                    button: "Tamam",
                  })
                  ;
                </script>
              <?php }
              if (@$_GET['durum']=="yes")
                {$kullanicisor=$db->prepare("SELECT * FROM users where users_tc=:tc");
              $kullanicisor->execute(array(
                'tc'=>$_SESSION['tc'],
              ));
              $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
              $_Mail=$kullanicicek['users_mail'];
              $_Ad=$kullanicicek['users_name'];
              $_Mesaj=$kullanicicek['users_password'];
              $_TC=$kullanicicek['users_tc'];

              $mail = new PHPMailer();
              $mail->IsSMTP();
              $mail->SMTPAuth = true;
              $mail->SMTPSecure = 'tls';
              $mail->Host = 'smtp.gmail.com';
              $mail->Port = 587;
              $mail->Username = 'cihaterayyazici@gmail.com';
              $mail->Password = '#';
              $mail->SetFrom($mail->Username,'𝓢𝔀𝓮𝓪𝓽 𝓐𝓻𝓮𝓷𝓪:');
              $mail->AddAddress($_Mail, 'Cihat Eray');
              $mail->CharSet = 'UTF-8';
              $mail->Subject = 'Bigilendirme Maili';
              $content = 'Sayın '.$_Ad.'<br>'.'Kullanıcı ismi '.$_TC.' olan '.'hesabınızın şifresi "'.$_Mesaj.'" olarak tanımlanmıştır.';

              $mail->MsgHTML($content);
              if($mail->Send()) { 
                header('location:login.php?durum=forgetyes');
              } else {
                echo $mail->ErrorInfo;
                header("location:login.php?durum=forgetno");
              }
            }
            ?>
            <div> </br>
              <h1><i class="fa fa-spinner"></i> 𝓢𝔀𝓮𝓪𝓽 𝓐𝓻𝓮𝓷𝓪</h1>
              <p>Cihat Eray Yazıcı © Copyright 2021</p>
            </div>
          </div>
        </form>
      </section>
    </div>
  </div>
</div>
</body>
</html> 