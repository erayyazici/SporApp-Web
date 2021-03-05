<?php 
include "header.php";

if (@$_GET['durum']=="yes")
  {$kullanicisor=$db->prepare("SELECT * FROM users where users_id=:id");
$kullanicisor->execute(array(
  'id'=>$_SESSION['id'],
));
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
$_ad=$kullanicicek['users_name'];
$_tc=$kullanicicek['users_tc'];
$_gender=$kullanicicek['users_gender'];
$_branch_id=$kullanicicek['branch_id'];
$_users_image=$kullanicicek['users_image'];
$_users_tel=$kullanicicek['users_tel'];
$_users_address=$kullanicicek['users_address'];
$_users_mail=$kullanicicek['users_mail'];

}
?>

<body>
  <?php if (@$_GET['durum']=="ok")
  {$kullanicisor=$db->prepare("SELECT * FROM users where users_id=:id");
  $kullanicisor->execute(array(
    'id'=>$_SESSION['id'],
  ));
  $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
  $_ad=$kullanicicek['users_name'];
  $_tc=$kullanicicek['users_tc'];
  $_gender=$kullanicicek['users_gender'];
  $_branch_id=$kullanicicek['branch_id'];
  $_users_image=$kullanicicek['users_image'];
  $_users_tel=$kullanicicek['users_tel'];
  $_users_address=$kullanicicek['users_address'];
  $_users_mail=$kullanicicek['users_mail'];

  ?>
  <script type="text/javascript">
    swal({
      title:"Güncelleme başarılı.",
      text:"Profil bilgileriniz başarıyla güncellenmiştir.",
      icon: "success",
      button: "Tamam",
    });
  </script>
  <?php

} ?>

<?php if (@$_GET['durum']=="no")
{$kullanicisor=$db->prepare("SELECT * FROM users where users_id=:id");
$kullanicisor->execute(array(
  'id'=>$_SESSION['id'],
));
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
$_ad=$kullanicicek['users_name'];
$_tc=$kullanicicek['users_tc'];
$_gender=$kullanicicek['users_gender'];
$_branch_id=$kullanicicek['branch_id'];
$_users_image=$kullanicicek['users_image'];
$_users_tel=$kullanicicek['users_tel'];
$_users_address=$kullanicicek['users_address'];
$_users_mail=$kullanicicek['users_mail'];

?>
<script type="text/javascript">
  swal({
    title:"Güncelleme başarısız.",
    text:"Profil bilgileriniz güncellenememiştir.",
    icon: "warning",
    button: "Tamam",
  });
</script>
<?php

} ?>

<?php if (@$_GET['durum']=="passok")
{$kullanicisor=$db->prepare("SELECT * FROM users where users_id=:id");
$kullanicisor->execute(array(
  'id'=>$_SESSION['id'],
));
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
$_ad=$kullanicicek['users_name'];
$_tc=$kullanicicek['users_tc'];
$_gender=$kullanicicek['users_gender'];
$_branch_id=$kullanicicek['branch_id'];
$_users_image=$kullanicicek['users_image'];
$_users_tel=$kullanicicek['users_tel'];
$_users_address=$kullanicicek['users_address'];
$_users_mail=$kullanicicek['users_mail'];

?>
<script type="text/javascript">
  swal({
    title:"İşlem tamamlandı.",
    text:"Şifre değiştirme işlemi tamamlandı.",
    icon: "success",
    button: "Tamam",
  });
</script>
<?php

} ?>

<?php if (@$_GET['durum']=="passno")
{$kullanicisor=$db->prepare("SELECT * FROM users where users_id=:id");
$kullanicisor->execute(array(
  'id'=>$_SESSION['id'],
));
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
$_ad=$kullanicicek['users_name'];
$_tc=$kullanicicek['users_tc'];
$_gender=$kullanicicek['users_gender'];
$_branch_id=$kullanicicek['branch_id'];
$_users_image=$kullanicicek['users_image'];
$_users_tel=$kullanicicek['users_tel'];
$_users_address=$kullanicicek['users_address'];
$_users_mail=$kullanicicek['users_mail'];

?>
<script type="text/javascript">
  swal({
    title:"Hatalı işlem.",
    text:"Şifre değiştirme işlemi tamamlanmadı.",
    icon: "error",
    button: "Tamam",
  });
</script>
<?php

} ?>

<?php if (@$_GET['durum']=="passnew")
{$kullanicisor=$db->prepare("SELECT * FROM users where users_id=:id");
$kullanicisor->execute(array(
  'id'=>$_SESSION['id'],
));
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
$_ad=$kullanicicek['users_name'];
$_tc=$kullanicicek['users_tc'];
$_gender=$kullanicicek['users_gender'];
$_branch_id=$kullanicicek['branch_id'];
$_users_image=$kullanicicek['users_image'];
$_users_tel=$kullanicicek['users_tel'];
$_users_address=$kullanicicek['users_address'];
$_users_mail=$kullanicicek['users_mail'];

?>
<script type="text/javascript">
  swal({
    title:"Yanlış şifre.",
    text:"Girdiğiniz şifreler birbiriyle uyuşmamaktadır.",
    icon: "error",
    button: "Tamam",
  });
</script>
<?php

} ?>

<?php if (@$_GET['durum']=="passold")
{$kullanicisor=$db->prepare("SELECT * FROM users where users_id=:id");
$kullanicisor->execute(array(
  'id'=>$_SESSION['id'],
));
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
$_ad=$kullanicicek['users_name'];
$_tc=$kullanicicek['users_tc'];
$_gender=$kullanicicek['users_gender'];
$_branch_id=$kullanicicek['branch_id'];
$_users_image=$kullanicicek['users_image'];
$_users_tel=$kullanicicek['users_tel'];
$_users_address=$kullanicicek['users_address'];
$_users_mail=$kullanicicek['users_mail'];

?>
<script type="text/javascript">
  swal({
    title:"Yanlış şifre.",
    text:"Şifreniz doğru değil lütfen tekrar deneyin.",
    icon: "error",
    button: "Tamam",
  });
</script>
<?php

} ?>

<?php if (@$_GET['durum']=="imgok")
{$kullanicisor=$db->prepare("SELECT * FROM users where users_id=:id");
$kullanicisor->execute(array(
  'id'=>$_SESSION['id'],
));
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
$_ad=$kullanicicek['users_name'];
$_tc=$kullanicicek['users_tc'];
$_gender=$kullanicicek['users_gender'];
$_branch_id=$kullanicicek['branch_id'];
$_users_image=$kullanicicek['users_image'];
$_users_tel=$kullanicicek['users_tel'];
$_users_address=$kullanicicek['users_address'];
$_users_mail=$kullanicicek['users_mail'];

?>
<script type="text/javascript">
  swal({
    title:"İşlem tamamlandı.",
    text:"Profil güncelleme işlemi tamamlandı.",
    icon: "success",
    button: "Tamam",
  });
</script>
<?php

} ?>

<header class="header-area header-sticky">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <nav class="main-nav">
          <a href="user.php?durum=yes" class="logo"><em>𝓢𝔀𝓮𝓪𝓽 </em>𝓐𝓻𝓮𝓷𝓪</a>
          <ul class="nav">
            <li class="scroll-to-section"><a href="user.php?durum=yes">Ana Sayfa</a></li>
            <li class="scroll-to-section"><a href="myrandevu.php?durum=yes">Randevularım</a></li>
            <li class="scroll-to-section"><a href="randevu.php?durum=yes">Randevu Al</a></li>
            <li class="scroll-to-section"><a href="iletisimuser.php?durum=yes">İletişim</a></li> 
            <div class="dropdown">
              <button disabled="disabled" class="dropbtn"><?php echo $_ad;?></button>
              <img width="120" height="60" style="margin-left: 5px;" src="assets<?php echo $_users_image; ?>">
              <div class="dropdown-content">
                <a href="myrandevu.php?durum=yes">Randevularım</a>
                <a href="randevu.php?durum=yes">Randevu Al</a>
                <a href="profil.php?durum=yes">Profil</a>
                <a href="index.php">Çıkış Yap</a>
              </div>
            </div>
          </ul>        
          <!-- ***** Menu End ***** -->
        </nav>
      </div>
    </div>
  </div>
</header>

<section class="section" id="contact-us">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="contact-form">
          <form id="contact" method="POST">
            <div class="row">

              <div class="col-md-3 col-sm-12">
                <fieldset>
                  <label>Kullanıcı İsmi</label>
                </fieldset>
              </div>

              <div class="col-md-8 col-sm-12">
                <fieldset>
                  <input  type="text" readonly="" value="<?php echo $_ad;?>" required="">
                </fieldset>
              </div>

              <div class="col-md-3 col-sm-12">
                <fieldset>
                  <label>Tc Kimlik Numarası</label>
                </fieldset>
              </div>

              <div class="col-md-8 col-sm-12">
                <fieldset>
                  <input type="text" readonly="" value="<?php echo $_tc; ?>" required="">
                </fieldset>
              </div>

              <div class="col-md-3 col-sm-12">
                <fieldset>
                  <label>Cinsiyet</label>
                </fieldset>
              </div>

              <div class="col-md-8 col-sm-12">
                <fieldset>
                  <input type="text" readonly="" value="<?php echo $_gender; ?>" required="">
                </fieldset>
              </div>

              <div class="col-md-3 col-sm-12">
                <fieldset>
                  <label>Spor Branşı</label>
                </fieldset>
              </div>

              <div class="col-md-8 col-sm-12">
                <fieldset>
                  <select type="text">
                    <option value=
                    "<?php
                    if ($_branch_id==1){
                      $_branch='Fitness';
                    }
                    else if ($_branch_id==2){
                      $_branch='Pilates';
                    }
                    else if ($_branch_id==3){
                      $_branch='Kardiyo';
                    }
                    else if ($_branch_id==4){
                      $_branch='Dans';
                    }
                    ?>"><?php echo $_branch; ?></option>
                  </select>
                </fieldset>
              </div>
            </div>
          </form>

          <form id="contact" action="islem.php" method="POST" enctype="multipart/form-data" style="margin-top: 20px;">
           
           <div class="row">

            <div class="col-md-3 col-sm-12">
              <fieldset>
                <label>Fotoğraf</label>
              </fieldset>
            </div>

            <div class="col-md-8 col-sm-12">
              <fieldset>
                <input type="file" name="users_image" style="height: 50px;">
              </fieldset>
            </div>

            <div class="col-md-3 col-sm-12">
              <fieldset>
                <label>Yüklü Resim</label>
              </fieldset>
            </div>

            <div class="col-md-8 col-sm-12">
              <fieldset>
                <img width="200" height="100" style="margin-bottom: 20px;" src="assets<?php echo $_users_image; ?>">
              </fieldset>
            </div>

            <div class="col-md-3 col-sm-12">
              <fieldset>
                <label>Mail</label>
              </fieldset>
            </div>

            <div class="col-md-8 col-sm-12">
              <fieldset>
                <input name="users_mail" type="text" pattern="[^ @]*@[^ @]*" value="<?php echo $_users_mail; ?>">
              </fieldset>
            </div>

            <div class="col-md-3 col-sm-12">
              <fieldset>
                <label>Telefon</label>
              </fieldset>
            </div>

            <div class="col-md-8 col-sm-12">
              <fieldset>
                <input name="users_tel" type="text" value="<?php echo $_users_tel; ?>">
              </fieldset>
            </div>

            <div class="col-md-3 col-sm-12">
              <fieldset>
                <label>Adres</label>
              </fieldset>
            </div>

            <div class="col-md-8 col-sm-12">
              <fieldset>
                <input name="users_address" type="text" value="<?php echo $_users_address; ?>">
                <input name="users_id" type="hidden" value="<?php echo $_SESSION['id']; ?>"> 
              </fieldset>
            </div>

            <div class="col-lg-9">
              <fieldset>
                <button style="background-color: #16bf00;" type="submit" name="users_update"  class="main-button">Bilgilerimi Güncelle</button>
              </fieldset>
            </div>

          </div>
        </form>


        <form id="contact" action="islem.php" method="POST" style="margin-top: 20px;">
          <div class="row">

            <div class="col-md-3 col-sm-12">
              <fieldset>
                <label>Eski Şifre</label>
              </fieldset>
            </div>

            <div class="col-md-8 col-sm-12">
              <fieldset>
                <input name="users_password" type="password" placeholder="Lütfen eski şifrenizi giriniz.">
              </fieldset>
            </div>

            <div class="col-md-3 col-sm-12">
              <fieldset>
                <label>Yeni şifre</label>
              </fieldset>
            </div>

            <div class="col-md-8 col-sm-12">
              <fieldset>
                <input name="users_password1" type="password" placeholder="Lütfen yeni şifrenizi giriniz.">
              </fieldset>
            </div>

            <div class="col-md-3 col-sm-12">
              <fieldset>
                <label>Yeni şifre</label>
              </fieldset>
            </div>

            <div class="col-md-8 col-sm-12">
              <fieldset>
                <input name="users_password2" type="password" placeholder="Lütfen yeni şifrenizi tekrar giriniz.">
                <input name="users_id" type="hidden" value="<?php echo $_SESSION['id']; ?>"> 
              </fieldset>
            </div>

            <div class="col-lg-9">
              <fieldset>
                <button style="background-color: #ea0700;" type="submit" name="password_update"  class="main-button">Şifremi Güncelle</button>
              </fieldset>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</section>
</body>