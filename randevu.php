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
$_users_image=$kullanicicek['users_image'];
$_branch_id=$kullanicicek['branch_id'];
}  
?>
<body>
  <?php if (@$_GET['durum']=="no")
  {
    $kullanicisor=$db->prepare("SELECT * FROM users where users_id=:id");
    $kullanicisor->execute(array(
      'id'=>$_SESSION['id'],
    ));
    $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
    $_ad=$kullanicicek['users_name'];
    $_tc=$kullanicicek['users_tc'];
    $_users_image=$kullanicicek['users_image'];
    $_branch_id=$kullanicicek['branch_id'];
    ?>

    <script type="text/javascript">
      swal({
        title:"Randevu alınamadı.",
        text:"Seçtiğiniz güne ait uygun bir saat yoktur.",
        icon: "warning",
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
            <!-- ***** Logo Start ***** -->
            <a href="user.php?durum=yes" class="logo"><em>𝓢𝔀𝓮𝓪𝓽 </em>𝓐𝓻𝓮𝓷𝓪</a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="user.php?durum=yes">Ana Sayfa</a></li>
              <li class="scroll-to-section"><a href="myrandevu.php?durum=yes">Randevularım</a></li>
              <li class="scroll-to-section"><a href="randevu.php?durum=yes" class="active">Randevu Al</a></li>
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

  <section class="section" id="contact-us">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
          <div class="contact-form" style="height: 100vh;">
            <form id="contact" action="islem.php" method="POST">
              <div class="row">
                <div class="col-md-12 col-sm-12">
                  <fieldset>
                    <input name="users_ad" type="text" readonly="" value="<?php echo $_ad;?>" required="">
                  </fieldset>
                </div>

                <div class="col-md-12 col-sm-12">
                  <fieldset>
                    <input name="users_tc" type="text" readonly="" value="<?php echo $_tc; ?>" required="">
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
                    <input type="date" id="mydate" timezone="timezone" name="mydate" onchange="isChanged()" required="">
                    <label style="font-size: 10px; margin-top:-25px; margin-bottom: 20px;">Sadece 1 hafta içerisinde randevu alabilirsiniz.</label>
                    <input type="hidden" id="tarihim" name ="tarihim">
                  </fieldset>
                </div>   
                <script type="text/javascript">
                  mydate=window.document.getElementById("mydate");
                  function addZero(deger){
                    if(deger<10){
                      return "0"+deger;
                    }
                    else
                      return deger;
                  }
                  function isChanged(){
                    locale: 'TR'
                    d = new Date(mydate.value);
                    gün = d.getDate();
                    ay = d.getMonth();
                    ay++;
                    yıl = d.getFullYear();
                    var date= gün + "." + addZero(ay) + "." + yıl;
                    document.getElementById("tarihim").value=date;
                  };

                </script>
                <div class="col-lg-3">
                  <fieldset>
                    <button type="submit" name="randevu_date"  class="main-button">Seç</button>
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