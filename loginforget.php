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

  <title>๐ข๐๐ฎ๐ช๐ฝ ๐๐ป๐ฎ๐ท๐ช</title>

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
          <h1>๐ข๐๐ฎ๐ช๐ฝ ๐๐ป๐ฎ๐ท๐ช</br></br> ๐ขฬง๐ฒ๐ฏ๐ป๐ฎ ๐จ๐ฎ๐ท๐ฒ๐ต๐ฎ๐ถ๐ฎ</h1>
          <div>
            <input class="form-control" name="users_tc" type="text" placeholder="Kullanฤฑcฤฑ Adฤฑnฤฑzฤฑ Giriniz...*" required="">
          </div>
          <div>
            <input class="form-control" name="users_mail" type="text" pattern="[^ @]*@[^ @]*" placeholder="Mail Adresinizi Giriniz...*" required="">
          </div>
          <div class=col-lg-12>
            <button class="btn btn-default" name="login_forget" onclick="window.location.href='loginforget.php';"  style="background-color:#73989C; width: 100%; color: white;">ลifre Yenile</button>
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
                    text:"Kullanฤฑcฤฑ adฤฑ veya mail adresi yanlฤฑล.",
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
              $mail->SetFrom($mail->Username,'๐ข๐๐ฎ๐ช๐ฝ ๐๐ป๐ฎ๐ท๐ช:');
              $mail->AddAddress($_Mail, 'Cihat Eray');
              $mail->CharSet = 'UTF-8';
              $mail->Subject = 'Bigilendirme Maili';
              $content = 'Sayฤฑn '.$_Ad.'<br>'.'Kullanฤฑcฤฑ ismi '.$_TC.' olan '.'hesabฤฑnฤฑzฤฑn ลifresi "'.$_Mesaj.'" olarak tanฤฑmlanmฤฑลtฤฑr.';

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
              <h1><i class="fa fa-spinner"></i> ๐ข๐๐ฎ๐ช๐ฝ ๐๐ป๐ฎ๐ท๐ช</h1>
              <p>Cihat Eray Yazฤฑcฤฑ ยฉ Copyright 2021</p>
            </div>
          </div>
        </form>
      </section>
    </div>
  </div>
</div>
</body>
</html> 