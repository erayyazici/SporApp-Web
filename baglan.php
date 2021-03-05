<?php 
try{
	$db=new PDO("mysql:host=localhost;dbname=sporapp",'root','',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
//echo "Veri tabanı bağlantısı başarılı.";
}
catch(PDOExeption $e){
	echo $e->getMessage();
}

?>