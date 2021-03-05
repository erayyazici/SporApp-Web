<!DOCTYPE html>
<html lang="en">
<?php 
include "header.php";

if (@$_GET['durum']=="yes")
  {$kullanicisor=$db->prepare("SELECT * FROM users where users_id=:id");
$kullanicisor->execute(array(
  'id'=>$_SESSION['id'],
));
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
$_ad=$kullanicicek['users_name'];
$_users_image=$kullanicicek['users_image'];
}

?>
<header class="header-area header-sticky">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <nav class="main-nav">
          <!-- ***** Logo Start ***** -->
          <a href="user.php?durum=yes" class="logo"><em>𝓢𝔀𝓮𝓪𝓽 </em>𝓐𝓻𝓮𝓷𝓪</a>
          <!-- ***** Logo End ***** -->
          <!-- ***** Menu Start ***** -->
          <ul class="nav">
            <li class="scroll-to-section"><a href="user.php?durum=yes">Ana Sayfa</a></li>
            <li class="scroll-to-section"><a href="myrandevu.php?durum=yes">Randevularım</a></li>
            <li class="scroll-to-section"><a href="randevu.php?durum=yes">Randevu Al</a></li>
            <li class="scroll-to-section"><a href="iletisimuser.php?durum=yes" class="active">İletişim</a></li> 
            <div class="dropdown">
              <button disabled="disabled" class="dropbtn"><?php echo $_ad; ?></button>
              <img width="120" height="60" style="margin-left: 5px;" src="assets<?php echo $_users_image; ?>">
              <div class="dropdown-content">
                <a href="myrandevu.php?durum=yes">Randevularım</a>
                <a href="randevu.php?durum=yes">Randevu Al</a>
                <a href="profil.php?durum=yes">Profil</a>
                <a href="index.php">Çıkış Yap</a>
              </div>
            </div>
          </ul>        
        </nav>
      </div>
    </div>
  </div>
</header>

<body>
  <section class="section" id="contact-us">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
          <div class="contact-form" style="height: 100vh;">
            <form id="contact" action="" method="post">
              <div class="row">
                <div class="col-md-6 col-sm-12">
                  <fieldset>
                    <input name="name" type="text" id="name" placeholder="İsminiz*" required="">
                  </fieldset>
                </div>
                <div class="col-md-6 col-sm-12">
                  <fieldset>
                    <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="E-mail adresiniz*" required="">
                  </fieldset>
                </div>
                <div class="col-md-12 col-sm-12">
                  <fieldset>
                    <input name="subject" type="text" id="subject" placeholder="Konu">
                  </fieldset>
                </div>
                <div class="col-md-12">
                  <fieldset>
                    <textarea name="message" rows="6" id="message" placeholder="Mesaj" required=""></textarea>
                  </fieldset>
                </div>
                <div class="col-md-12">
                  <fieldset>
                    <button type="submit" id="form-submit" class="main-button">Mesajı gönder</button>
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