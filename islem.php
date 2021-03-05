<?php 
ob_start();
session_start();
include "baglan.php";

if(isset($_POST['adminsign'])){
	$kullaniciad=$_POST['kullaniciad'];
	$kullanicisifre=($_POST['kullanicisifre']);

	if($kullaniciad && $kullanicisifre){

		$kullanicisor=$db->prepare("SELECT * FROM users where users_tc=:tc and users_password=:sifre");
		$kullanicisor->execute(array(
			'tc'=>$kullaniciad,
			'sifre'=>$kullanicisifre,
		));
		$say=$kullanicisor->rowCount();
		$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
		$_users_id=$kullanicicek['users_id'];
		if($say>0){
			$_SESSION['id']= $_users_id;
			header('location:user.php?durum=yes');
		}
		else {
			$_SESSION['id']= $_users_id;
			header('location:login.php?durum=no');
		}
	}
}

if(isset($_POST['login_forget'])){
	$users_tc=$_POST['users_tc'];
	$users_mail=($_POST['users_mail']);

	if($users_mail && $users_tc){

		$kullanicisor=$db->prepare("SELECT * FROM users where users_mail=:mail and users_tc=:tc");
		$kullanicisor->execute(array(
			'tc'=>$users_tc,
			'mail'=>$users_mail,
		));

		$say=$kullanicisor->rowCount();
		if($say>0){
			$_SESSION['tc']= $users_tc;
			header('location:loginforget.php?durum=yes');
		}
		else {
			header('location:loginforget.php?durum=no');
		}
	}
}


if(isset($_POST['randevu_date'])){
	$kontenjan_date=$_POST['tarihim'];
	$users_tc=$_POST['users_tc'];

	if($kontenjan_date){
		$kullanicisor=$db->prepare("SELECT * FROM kontenjan where kontenjan_date=:tarihim");
		$kullanicisor->execute(array(
			'tarihim'=>$kontenjan_date,
		));

		$kullanicisors=$db->prepare("SELECT * FROM users where users_tc=:tc");
		$kullanicisors->execute(array(
			'tc'=>$users_tc,
		));

		$kullaniciceks=$kullanicisors->fetch(PDO::FETCH_ASSOC);
		$_users_id=$kullaniciceks['users_id'];

		$say=$kullanicisor->rowCount();
		if($say>0){
			$_SESSION['date']= $kontenjan_date;
			$_SESSION['users_id']= $_users_id;
			header('location:saat.php?durum=yes');
		}
		else {
			header("location:randevu.php?durum=no");
		}
	}
}

if(isset($_POST['randevu_apply'])){
	$branch_id=$_POST['branch_id'];
	$_branch_id=$_POST['branch_id'];
	$users_id=($_POST['users_id']);
	$hours_id=($_POST['hours_id']);
	$randevu_date=($_POST['users_date']);

	$kullanicisor=$db->prepare("SELECT * FROM users where users_id=:id");
	$kullanicisor->execute(array(
		'id'=>$users_id,
	));
	if($branch_id && $users_id && $hours_id && $randevu_date){

		$kullanicisor=$db->prepare("SELECT * FROM randevu where branch_id=:branch and users_id=:users and hours_id=:hours and randevu_date=:randevu");
		$kullanicisor->execute(array(
			'branch'=>$branch_id,
			'users'=>$users_id,
			'hours'=>$hours_id,
			'randevu'=>$randevu_date,
		));

		$say=$kullanicisor->rowCount();
		if($say>0){
			$_SESSION['id']= $users_id;
			header("location:saat.php?durum=randevuerror");
		}
		else {
			if($_branch_id==1){
				$_branch_id='Fitness';
			}
			else if($_branch_id==2){
				$_branch_id='Pilates';
			}
			else if($_branch_id==3){
				$_branch_id='Kardiyo';
			}
			else if($_branch_id==4){
				$_branch_id='Dans';
			}
				$kullanicisors=$db->prepare("SELECT * FROM kontenjan where kontenjan_salon=:branch_id and hours_id=:hours and kontenjan_date=:randevu");
				$kullanicisors->execute(array(
					'branch_id'=>$_branch_id,
					'hours'=>$hours_id,
					'randevu'=>$randevu_date
				));
				$kullaniciceks=$kullanicisors->fetch(PDO::FETCH_ASSOC);
				$_doluluk=$kullaniciceks['kontenjan_doluluk'];
				$_doluluk=$_doluluk+1;
				$duzenle=$db->prepare("UPDATE kontenjan SET
					kontenjan_doluluk=:doluluk
					where kontenjan_salon=:branch_id and hours_id=:hours and kontenjan_date=:randevu");

				$update=$duzenle->execute(array(
					'doluluk' => $_doluluk,
					'branch_id'=>$_branch_id,
					'hours'=>$hours_id,
					'randevu'=>$randevu_date
				));
			   

			$randevu_save=$db->prepare("INSERT INTO randevu SET
				branch_id=:branch,
				users_id=:users,
				hours_id=:hours,
				randevu_date=:randevu");

			$kaydet=$randevu_save->execute(array(
				'branch'=> $_POST['branch_id'],
				'users'=> $_POST['users_id'],
				'hours'=> $_POST['hours_id'],
				'randevu'=> $_POST['users_date']	
			));

			if($kaydet){
				$_SESSION['id']= $users_id;
				header("location:user.php?durum=ok");
			} else{
				$_SESSION['id']= $users_id;
				header("location:user.php?durum=no");
			}
		}
	}
}



if(isset($_POST['users_update'])){
	echo $_FILES['users_image']["size"];
	if($_FILES['users_image']["size"] > 0) {

		$uploads_dir='assets/images/Kullanici';
		@$tmp_name=$_FILES['users_image']['tmp_name'];
		@$name=$_FILES['users_image']['name'];
		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizsayi3=rand(20000,32000);
		$benzersizsayi4=rand(20000,32000);
		$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
		$refimgyol=substr($uploads_dir,6)."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

		$duzenle=$db->prepare("UPDATE users SET
			users_image=:image, 
			users_tel=:tel,
			users_address=:address,
			users_mail=:mail

			where users_id={$_POST['users_id']}");

		$update=$duzenle->execute(array(
			'tel' => $_POST['users_tel'],
			'address' => $_POST['users_address'],
			'mail' => $_POST['users_mail'],
			'image'=>$refimgyol
		));
		if($update){
			header("location:profil.php?durum=imgok");
		} else{
			header("location:profil.php?durum=imgno");
		}
	}
	else{
		$duzenle=$db->prepare("UPDATE users SET
			users_tel=:tel,
			users_address=:address,
			users_mail=:mail

			where users_id={$_POST['users_id']}");

		$update=$duzenle->execute(array(
			'tel' => $_POST['users_tel'],
			'address' => $_POST['users_address'],
			'mail' => $_POST['users_mail'],
		));
		if($update){
			header("location:profil.php?durum=ok");
		} else{
			header("location:profil.php?durum=no");
		}
	}
}



if(isset($_POST['password_update'])){
	$old_password=$_POST['users_password'];
	$new_password=$_POST['users_password1'];
	$new_password1=$_POST['users_password2'];
	$users_id=$_POST['users_id'];

	$kullanicisor=$db->prepare("SELECT * FROM users where users_id=:id");
	$kullanicisor->execute(array(
		'id'=>$users_id,
	));

	$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
	$users_password=$kullanicicek['users_password'];

	if($users_password==$old_password){
		if($new_password==$new_password1){
			$duzenle=$db->prepare("UPDATE users SET
				users_password=:users_pass
				where users_id=:id");

			$update=$duzenle->execute(array(
				'users_pass' => $new_password,
				'id'=>$users_id,
			));

			if($update){
				header("location:profil.php?durum=passok");
			} else{
				header("location:profil.php?durum=passno");
			}
		}
		else{
			header("location:profil.php?durum=passnew");
		}
	}
	else{
		header("location:profil.php?durum=passold");
	}
}