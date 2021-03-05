<?php
include "baglan.php";
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
            <h1>𝓢𝔀𝓮𝓪𝓽 𝓐𝓻𝓮𝓷𝓪</br></br> 𝓚𝓾𝓵𝓵𝓪𝓷𝓲𝓬𝓲 𝓖𝓲𝓻𝓲𝓼̧𝓲</h1>
            <div>
              <input type="text" name="kullaniciad" class="form-control" placeholder="Kullanıcı Adınız" required="" />
            </div>
            <div>
              <input type="password" name="kullanicisifre" class="form-control" placeholder="Şifreniz" required="" />
            </div>
            <div>
              <button class="btn btn-default" type="submit" name="adminsign" style="width: 100%;
              background-color:#418e41;
              color: white;">Giriş Yap</button>
            </div>
            <div>
              <button class="btn btn-default" onclick="window.location.href='loginforget.php';"  style="width: 40%;
              background-color:#73989C; float: right;
              color: white;">Şifremi unuttum</button>
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
                      text:"Kullanıcı adı veya şifre yanlış.",
                      icon: "error",
                      button: "Tamam",
                    });
                  </script>
                <?php }
                if (@$_GET['durum']=="forgetyes")
                {
                 {$kullanicisor=$db->prepare("SELECT * FROM users where users_tc=:tc");
                 $kullanicisor->execute(array(
                  'tc'=>$_SESSION['tc'],
                ));
                 $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
                 $_Mail=$kullanicicek['users_mail'];
                 $_Ad=$kullanicicek['users_name'];
                 $_Mesaj=$kullanicicek['users_password'];
                 $_TC=$kullanicicek['users_tc'];
               }
               ?>
                  <script type="text/javascript">
                    swal({
                      title:"Mail Gönderildi",
                      text:"Yeni şifreniz kayıtlı mail adresinize gönderildi.",
                      icon: "success",
                      button: "Tamam",
                    })
                    ;
                  </script>
                <?php } ?>  
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