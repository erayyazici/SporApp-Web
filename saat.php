<?php 
include "header.php";
if (@$_GET['durum']=="yes")
{
  for($i=1; $i<15; $i++){
    $kullanicisor=$db->prepare("SELECT * FROM kontenjan where kontenjan_date=:tarihim and hours_id=:hours");
    $kullanicisor->execute(array(
      'tarihim'=>$_SESSION['date'],
      'hours'=>$i,
    ));
    $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
    $_date=$kullanicicek['kontenjan_date'];
  }

  $kullanicisors=$db->prepare("SELECT * FROM users where users_id=:id");
  $kullanicisors->execute(array(
    'id'=>$_SESSION['users_id'],
  ));
  $kullaniciceks=$kullanicisors->fetch(PDO::FETCH_ASSOC);
  $_ad=$kullaniciceks['users_name'];
  $_branch_id=$kullaniciceks['branch_id'];
  $_users_id=$kullaniciceks['users_id'];
  $_users_image=$kullaniciceks['users_image'];
}  
?>
<body>
  <?php
  if (@$_GET['durum']=="randevuerror")
  {
    ?>
    <script type="text/javascript">
      swal({
        title:"Randevu alınamadı.",
        text:"Seçtiğiniz güne ve saate ait zaten randevunuz bulunmaktadır.",
        icon: "warning",
        button: "Tamam",
      });
    </script>
    <?php
    for($i=1; $i<15; $i++){
      $kullanicisor=$db->prepare("SELECT * FROM kontenjan where kontenjan_date=:tarihim and hours_id=:hours");
      $kullanicisor->execute(array(
        'tarihim'=>$_SESSION['date'],
        'hours'=>$i,
      ));
      $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
      $_date=$kullanicicek['kontenjan_date'];
    }

    $kullanicisors=$db->prepare("SELECT * FROM users where users_id=:id");
    $kullanicisors->execute(array(
      'id'=>$_SESSION['users_id'],
    ));
    $kullaniciceks=$kullanicisors->fetch(PDO::FETCH_ASSOC);
    $_ad=$kullaniciceks['users_name'];
    $_branch_id=$kullaniciceks['branch_id'];
    $_users_id=$kullaniciceks['users_id'];
    $_users_image=$kullaniciceks['users_image'];
  } ?>
  <header class="header-area header-sticky">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="user.php?durum=yes" class="logo"><em>𝓢𝔀𝓮𝓪𝓽 </em>𝓐𝓻𝓮𝓷𝓪</a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
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
            <a class='menu-trigger'>
              <span>Menu</span>
            </a>
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
          <div class="contact-form" style="height: 100vh;">
            <form id="contact" action="islem.php" method="POST">
              <div class="row">

                <div class="col-md-12 col-sm-12">
                  <fieldset>
                    <input name="users_tc" type="text" readonly="" value="<?php echo $_ad; ?>" >
                    <input name="users_id" type="hidden" readonly="" value="<?php echo $_users_id; ?>" >
                  </fieldset>
                </div>

                <div class="col-md-12 col-sm-12">
                  <fieldset>
                    <select type="text" name="branch_id">
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
                      echo $_branch_id; ?>"><?php echo $_branch; ?></option>
                    </select>
                  </fieldset>
                </div>

                <div class="col-md-12 col-sm-12">
                  <fieldset>
                    <input name="users_date" type="text" readonly="" value="<?php echo $_date;?>">
                  </fieldset>
                </div>

                <div class="col-md-12 col-sm-12">
                  <fieldset>
                    <select type="text" name="hours_id"required="required">
                      <?php for($i=1; $i<15; $i++){
                        $kullanicisor=$db->prepare("SELECT * FROM kontenjan where kontenjan_date=:tarihim and hours_id=:hours and kontenjan_salon=:branch");
                        $kullanicisor->execute(array(
                          'tarihim'=>$_SESSION['date'],
                          'hours'=>$i,
                          'branch'=>$_branch,
                        ));
                        $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
                        $_date=$kullanicicek['kontenjan_date'];
                        $_doluluk=$kullanicicek['kontenjan_doluluk'];
                        $_kapasite=$kullanicicek['kontenjan_kapasite'];
                        $_hours=$kullanicicek['hours_id'];
                        if($_kapasite!=$_doluluk && $_kapasite){
                          ?>
                          <option value="<?php echo $_hours; ?>"><?php 
                          if($_hours ==1){
                            echo "10:00 - 11:00\n";
                            echo $_doluluk."/".$_kapasite;   
                          }
                          else if($_hours ==2){
                            echo "11:00 - 12:00\n";
                            echo $_doluluk."/".$_kapasite;
                          }
                          else if($_hours ==3){
                            echo "12:00 - 13:00\n";
                            echo $_doluluk."/".$_kapasite;
                          }
                          else if($_hours ==4){
                            echo "13:00 - 14:00\n";
                            echo $_doluluk."/".$_kapasite;
                          }
                          else if($_hours ==5){
                            echo "14:00 - 15:00\n";
                            echo $_doluluk."/".$_kapasite;
                          }
                          else if($_hours ==6){
                            echo "15:00 - 16:00\n";
                            echo $_doluluk."/".$_kapasite;
                          }
                          else if($_hours ==7){
                            echo "16:00 - 17:00\n";
                            echo $_doluluk."/".$_kapasite;
                          }
                          else if($_hours ==8){
                            echo "17:00 - 18:00\n";
                            echo $_doluluk."/".$_kapasite;
                          }
                          else if($_hours ==9){
                            echo "18:00 - 19:00\n";
                            echo $_doluluk."/".$_kapasite;
                          }
                          else if($_hours ==10){
                            echo "19:00 - 20:00\n";
                            echo $_doluluk."/".$_kapasite;
                          }
                          else if($_hours ==11){
                            echo "20:00 - 21:00\n";
                            echo $_doluluk."/".$_kapasite;
                          }
                          else if($_hours ==12){
                            echo "21:00 - 22:00\n";
                            echo $_doluluk."/".$_kapasite;
                          }
                          else if($_hours ==13){
                            echo "22:00 - 23:00\n";
                            echo $_doluluk."/".$_kapasite;
                          }
                          else if($_hours ==14){
                            echo "23:00 - 24:00\n";
                            echo $_doluluk."/".$_kapasite;
                          }
                          else{
                            echo "Tüm saatler doludur. Lütfen başka bir güne randevu alınız.";
                          }

                          ?></option>
                          <?php
                        }
                      } ?>
                    </select>
                  </fieldset>
                </div>

                <div class="col-lg-12">
                  <fieldset>
                    <button type="submit" name="randevu_apply"  class="main-button">Seç</button>
                  </fieldset>
                </div>
              </div>
              <div class="separator">
                <p class="change_link"></p>
                <?php
                if (@$_GET['durum']=="yes")
                  {$kullanicisor=$db->prepare("SELECT * FROM users where users_id=:id");
                $kullanicisor->execute(array(
                  'id'=>$_SESSION['id'],
                ));
                $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
                $_Mail=$kullanicicek['users_mail'];
                $_Ad=$kullanicicek['users_name'];
                $_Mesaj=$kullanicicek['users_password'];
                $_TC=$kullanicicek['users_tc'];
                $_users_image=$kullaniciceks['users_image'];
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