<!DOCTYPE html>
<html lang="en">
<?php 
include "header.php";
?>
<header class="header-area header-sticky">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <nav class="main-nav">
          <!-- ***** Logo Start ***** -->
          <a href="index.php" class="logo"><em>𝓢𝔀𝓮𝓪𝓽 </em>𝓐𝓻𝓮𝓷𝓪</a>
          <!-- ***** Logo End ***** -->
          <!-- ***** Menu Start ***** -->
          <ul class="nav">
            <li class="scroll-to-section"><a href="index.php">Ana Sayfa</a></li>
            <li class="scroll-to-section"><a href="index.php#features">Hakkımızda</a></li>
            <li class="scroll-to-section"><a href="index.php#our-classes">Derslerimiz</a></li>
            <li class="scroll-to-section"><a href="index.php#schedule">Eğitmenlerimiz</a></li>
            <li class="scroll-to-section"><a href="iletisim.php" class="active">Bize Ulaşın</a></li> 
            <li class="main-button"><a href="login.php">Kullanıcı Girişi</a></li>
            </ul>        
            <a class='menu-trigger'>
              <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
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