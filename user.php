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
<body>
    <?php 
    if (@$_GET['durum']=="ok")
    {
        $kullanicisor=$db->prepare("SELECT * FROM users where users_id=:id");
        $kullanicisor->execute(array(
            'id'=>$_SESSION['id'],
        ));
        $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
        $_ad=$kullanicicek['users_name'];
        $_users_image=$kullanicicek['users_image'];
        ?>
        <script type="text/javascript">
            swal({
              title:"İşlem tamamlandı.",
              text:"Randevunuz alındı, sağlıklı günler dileriz.",
              icon: "success",
              button: "Tamam",
          });
      </script>
  <?php } ?>
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="user.php?durum=yes" class="logo"><em>𝓢𝔀𝓮𝓪𝓽 </em>𝓐𝓻𝓮𝓷𝓪</a>
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="user.php?durum=yes" class="active">Ana Sayfa</a></li>
                        <li class="scroll-to-section"><a href="myrandevu.php?durum=yes">Randevularım</a></li>
                        <li class="scroll-to-section"><a href="randevu.php?durum=yes">Randevu Al</a></li>
                        <li class="scroll-to-section"><a href="iletisimuser.php?durum=yes">İletişim</a></li> 
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
<!-- ***** Main Banner Area Start ***** -->
<div class="main-banner" id="top">
    <video autoplay muted loop id="bg-video">
        <source src="assets/images/gym-video.mp4" type="video/mp4" />
    </video>

    <div class="video-overlay header-text">
        <div class="caption">
            <h6>Daha çok çalışma, daha çok güç</h6>
            <h2><em>Spor</em> İle çok daha kolay</h2>
        </div>
    </div>
</div>

<section class="section" id="features">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading">
                    <h2><em>Programını</em> Seç</h2>
                    <img src="assets/images/line-dec.png" alt="waves">
                    <p>MARS SPORTİF OLARAK SPOR SEKTÖRÜNDE MİSAFİRLERİMİZİN HAYALLERİNİN ÖTESİNE GEÇEN VE FARK YARATAN PROJELERLE, “EN YENİ VE EN İYİYİ” SUNAN BULUŞMA NOKTALARI YARATMAK ÜZERE YOLA ÇIKTIK.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <ul class="features-items">
                    <li class="feature-item">
                        <div class="left-icon">
                            <img src="assets/images/features-first-icon.png" alt="First One">
                        </div>
                        <div class="right-content">
                            <h4>Temel Fitness</h4>
                            <p>Please do not re-distribute this template ZIP file on any template collection website. This is not allowed.</p>
                            <a href="#" class="text-button">Discover More</a>
                        </div>
                    </li>
                    <li class="feature-item">
                        <div class="left-icon">
                            <img src="assets/images/features-first-icon.png" alt="second one">
                        </div>
                        <div class="right-content">
                            <h4>Kardiyo</h4>
                            <p>If you wish to support TemplateMo website via PayPal, please feel free to contact us. We appreciate it a lot.</p>
                            <a href="#" class="text-button">Discover More</a>
                        </div>
                    </li>
                    <li class="feature-item">
                        <div class="left-icon">
                            <img src="assets/images/features-first-icon.png" alt="third gym training">
                        </div>
                        <div class="right-content">
                            <h4>Dans</h4>
                            <p>Credit goes to <a rel="nofollow" href="https://www.pexels.com" target="_blank">Pexels website</a> for images and video background used in this HTML template.</p>
                            <a href="#" class="text-button">Discover More</a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6">
                <ul class="features-items">
                    <li class="feature-item">
                        <div class="left-icon">
                            <img src="assets/images/features-first-icon.png" alt="fourth muscle">
                        </div>
                        <div class="right-content">
                            <h4>Pilates</h4>
                            <p>You may want to browse through <a rel="nofollow" href="https://templatemo.com/tag/digital-marketing" target="_parent">Digital Marketing</a> or <a href="https://templatemo.com/tag/corporate">Corporate</a> HTML CSS templates on our website.</p>
                            <a href="#" class="text-button">Discover More</a>
                        </div>
                    </li>
                    <li class="feature-item">
                        <div class="left-icon">
                            <img src="assets/images/features-first-icon.png" alt="training fifth">
                        </div>
                        <div class="right-content">
                            <h4>Yoga</h4>
                            <p>This template is built on Bootstrap v4.3.1 framework. It is easy to adapt the columns and sections.</p>
                            <a href="#" class="text-button">Discover More</a>
                        </div>
                    </li>
                    <li class="feature-item">
                        <div class="left-icon">
                            <img src="assets/images/features-first-icon.png" alt="gym training">
                        </div>
                        <div class="right-content">
                            <h4>Vücut Geliştirme</h4>
                            <p>Suspendisse fringilla et nisi et mattis. Curabitur sed finibus nisi. Integer nibh sapien, vehicula et auctor.</p>
                            <a href="#" class="text-button">Discover More</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- ***** Our Classes End ***** -->

<section class="section" id="schedule">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading dark-bg">
                    <h2>DERS <em>PROGRAMI</em></h2>
                    <img src="assets/images/line-dec.png" alt="">
                    <p>Nunc urna sem, laoreet ut metus id, aliquet consequat magna. Sed viverra ipsum dolor, ultricies fermentum massa consequat eu.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="filters">
                    <ul class="schedule-filter">
                        <li class="active" data-tsfilter="monday">Monday</li>
                        <li data-tsfilter="tuesday">Tuesday</li>
                        <li data-tsfilter="wednesday">Wednesday</li>
                        <li data-tsfilter="thursday">Thursday</li>
                        <li data-tsfilter="friday">Friday</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-10 offset-lg-1">
                <div class="schedule-table filtering">
                    <table>
                        <tbody>
                            <tr>
                                <td class="day-time">Fitness Class</td>
                                <td class="monday ts-item show" data-tsmeta="monday">10:00AM - 11:30AM</td>
                                <td class="tuesday ts-item" data-tsmeta="tuesday">2:00PM - 3:30PM</td>
                                <td>William G. Stewart</td>
                            </tr>
                            <tr>
                                <td class="day-time">Muscle Training</td>
                                <td class="friday ts-item" data-tsmeta="friday">10:00AM - 11:30AM</td>
                                <td class="thursday friday ts-item" data-tsmeta="thursday" data-tsmeta="friday">2:00PM - 3:30PM</td>
                                <td>Paul D. Newman</td>
                            </tr>
                            <tr>
                                <td class="day-time">Body Building</td>
                                <td class="tuesday ts-item" data-tsmeta="tuesday">10:00AM - 11:30AM</td>
                                <td class="monday ts-item show" data-tsmeta="monday">2:00PM - 3:30PM</td>
                                <td>Boyd C. Harris</td>
                            </tr>
                            <tr>
                                <td class="day-time">Yoga Training Class</td>
                                <td class="wednesday ts-item" data-tsmeta="wednesday">10:00AM - 11:30AM</td>
                                <td class="friday ts-item" data-tsmeta="friday">2:00PM - 3:30PM</td>
                                <td>Hector T. Daigle</td>
                            </tr>
                            <tr>
                                <td class="day-time">Advanced Training</td>
                                <td class="thursday ts-item" data-tsmeta="thursday">10:00AM - 11:30AM</td>
                                <td class="wednesday ts-item" data-tsmeta="wednesday">2:00PM - 3:30PM</td>
                                <td>Bret D. Bowers</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ***** Testimonials Starts ***** -->

<!-- ***** Contact Us Area Starts ***** -->
<section class="section" id="contact-uss">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div id="map">
                  <iframe src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="600px" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>
          </div>
          <div class="col-lg-6 col-md-6 col-xs-12">
            <div class="contact-forms">
                <form id="contacts" action="" method="post">
                  <div class="row">
                    <div class="col-md-6 col-sm-12">
                      <fieldset>
                        <input name="name" type="text" id="name" placeholder="Your Name*" required="">
                    </fieldset>
                </div>
                <div class="col-md-6 col-sm-12">
                  <fieldset>
                    <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email*" required="">
                </fieldset>
            </div>
            <div class="col-md-12 col-sm-12">
              <fieldset>
                <input name="subject" type="text" id="subject" placeholder="Subject">
            </fieldset>
        </div>
        <div class="col-lg-12">
          <fieldset>
            <textarea name="message" rows="6" id="message" placeholder="Message" required=""></textarea>
        </fieldset>
    </div>
    <div class="col-lg-12">
      <fieldset>
        <button type="submit" id="form-submit" class="main-button">Send Message</button>
    </fieldset>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</section>
<!-- ***** Contact Us Area Ends ***** -->

<!-- ***** Footer Start ***** -->
<footer>
    <div class="container">
        <div class="row">
            <h3><i class="fa fa-spinner"></i> 𝓢𝔀𝓮𝓪𝓽 𝓐𝓻𝓮𝓷𝓪</h3>
            
        </div>
        <h5 style="align:right;">Cihat Eray Yazıcı © Copyright 2021</h5>
    </div>
</footer>

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/mixitup.js"></script> 
    <script src="assets/js/accordions.js"></script>
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

</body>
</html>