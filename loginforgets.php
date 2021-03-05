<?php 
include "class.phpmailer.php";
include "header.php";
?>

<body>
  <section class="section" id="contact-us">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-3 col-xs-12">
        </div>
        <div class="col-lg-6 col-md-6 col-xs-12">
          <div class="contact-form" style="background-image: none;">
            <form id="contact" action="islem.php" method="POST">
              <div class="row">
                <div class="col-md-12 col-sm-12">
                  <fieldset>
                    <input name="users_tc" type="text" placeholder="Kullanıcı Adınızı Giriniz...*" required="">
                  </fieldset>
                </div>
                <div class="col-md-12 col-sm-12">
                  <fieldset>
                    <input name="users_mail" type="text" pattern="[^ @]*@[^ @]*" placeholder="Mail Adresinizi Giriniz...*" required="">
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <button type="submit" name="login_forget"  class="main-button">Şifreyi gönder</button>
                  </fieldset>
                </div>
              </div>
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
                  $mail->SetFrom($mail->Username,'İki Teker Bir Dünya:');
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
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

</body>
