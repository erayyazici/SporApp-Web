<?php 
include "header.php";
$kullanicisor=$db->prepare("SELECT * FROM users where users_id=:id");
$kullanicisor->execute(array(
	'id'=>$_SESSION['id'],
));
$kullaniciceks=$kullanicisor->fetch(PDO::FETCH_ASSOC);
$_ad=$kullaniciceks['users_name'];
$_users_image=$kullaniciceks['users_image'];
?>
<!-- ***** Preloader End ***** -->
<!-- ***** Header Area Start ***** -->
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
						<li class="scroll-to-section"><a href="myrandevu.php?durum=yes" class="active">Randevularım</a></li>
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
<section class="section" id="schedules">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 offset-lg-3">
				<div class="section-heading dark-bg">
					<h2><em>Randevularım</em></h2>
					<img src="assets/images/line-dec.png" alt="">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-10 offset-lg-1">
				<div class="schedule-table filtering">
					<table>

						<?php
						if (@$_GET['durum']=="yes")
						{

							$kullanicisor=$db->prepare("SELECT * FROM randevu where users_id=:id");
							$kullanicisor->execute(array(
								'id'=>$_SESSION['id'],
							));
							$say=$kullanicisor->rowCount();
							if($say==0){
								?><tr><td>Geçmiş bir randevunuz bulunmamaktadır.</td></tr><?php
							}
							else {
								?><tbody><tr><td>Randevu Branşı</td><td>Randevu Günü</td><td>Randevu Saati</td></tr><?php

								for($i = 0 ; $i<$say; $i++){
									$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
									$_hours_id=$kullanicicek['hours_id'];
									$_randevu_date=$kullanicicek['randevu_date'];
									$_branch_id=$kullanicicek['branch_id'];
									if($_branch_id==1){
										$_branch_id="Fitness";
									}
									else if($_branch_id==2){
										$_branch_id="Pilates";
									}
									else if($_branch_id==3){
										$_branch_id="Kardiyo";
									}
									else if($_branch_id==4){
										$_branch_id="Dans";
									}

									if($_hours_id ==1){
										?><tr><td><?php echo $_branch_id;?></td><td><?php echo $_randevu_date; ?></td><td><?php echo "10:00 - 11:00"; ?></td></tr><?php
									}
									else if($_hours_id ==2){
										?><tr><td><?php echo $_branch_id;?></td><td><?php echo $_randevu_date; ?></td><td><?php echo "11:00 - 12:00"; ?></td></tr><?php
									}
									else if($_hours_id ==3){
										?><tr><td><?php echo $_branch_id;?></td><td><?php echo $_randevu_date; ?></td><td><?php echo "12:00 - 13:00"; ?></td></tr><?php
									}
									else if($_hours_id ==4){
										?><tr><td><?php echo $_branch_id;?></td><td><?php echo $_randevu_date; ?></td><td><?php echo "13:00 - 14:00"; ?></td></tr><?php
									}
									else if($_hours_id ==5){
										?><tr><td><?php echo $_branch_id;?></td><td><?php echo $_randevu_date; ?></td><td><?php echo "14:00 - 15:00"; ?></td></tr><?php
									}
									else if($_hours_id ==6){
										?><tr><td><?php echo $_branch_id;?></td><td><?php echo $_randevu_date; ?></td><td><?php echo "15:00 - 16:00"; ?></td></tr><?php
									}
									else if($_hours_id ==7){
										?><tr><td><?php echo $_branch_id;?></td><td><?php echo $_randevu_date; ?></td><td><?php echo "16:00 - 17:00"; ?></td></tr><?php
									}
									else if($_hours_id ==8){
										?><tr><td><?php echo $_branch_id;?></td><td><?php echo $_randevu_date; ?></td><td><?php echo "17:00 - 18:00"; ?></td></tr><?php
									}
									else if($_hours_id ==9){
										?><tr><td><?php echo $_branch_id;?></td><td><?php echo $_randevu_date; ?></td><td><?php echo "18:00 - 19:00"; ?></td></tr><?php
									}
									else if($_hours_id ==10){
										?><tr><td><?php echo $_branch_id;?></td><td><?php echo $_randevu_date; ?></td><td><?php echo "19:00 - 20:00"; ?></td></tr><?php
									}
									else if($_hours_id ==11){
										?><tr><td><?php echo $_branch_id;?></td><td><?php echo $_randevu_date; ?></td><td><?php echo "20:00 - 21:00"; ?></td></tr><?php
									}
									else if($_hours_id ==12){
										?><tr><td><?php echo $_branch_id;?></td><td><?php echo $_randevu_date; ?></td><td><?php echo "21:00 - 22:00"; ?></td></tr><?php
									}
									else if($_hours_id ==13){
										?><tr><td><?php echo $_branch_id;?></td><td><?php echo $_randevu_date; ?></td><td><?php echo "22:00 - 23:00"; ?></td></tr><?php
									}
									else if($_hours_id ==14){
										?><tr><td><?php echo $_branch_id;?></td><td><?php echo $_randevu_date; ?></td><td><?php echo "23:00 - 24:00"; ?></td></tr><?php
									}
								}
							}
						} 
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</section>