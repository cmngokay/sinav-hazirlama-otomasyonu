<?php 
include_once 'dbConfig.php';
session_start();
$uye_id = $_SESSION['uye_id'];

if (isset($_POST['save'])) {

	/*SORU VERİTABANINA KAYIT EDİLİYOR .*/
	$soru = $_POST['soru'];
	$ders_id = $_POST['ders_id'];
	$query ="INSERT INTO sorular (soru,uye_id,ders_id) VALUES(?,?,?)";

	$statement = $conn->prepare($query);
	
	$statement->execute(array($soru,$uye_id,$ders_id));

	/*---------------------------------------------*/


	/*SEÇENEKLER VERİTABANINA KAYIT EDİLİYOR .*/

	$secenekler=$_POST['secenek'];
	

	$query2 = "INSERT INTO secenekler (secenek,soru_id) VALUES (?,?)";

	$statement2 = $conn->prepare($query2);	
    $soru_id = $conn->lastInsertId(); // sorunun id'sini çekiyoruz

    foreach( $secenekler as $secenek) {
    	$statement2->execute(array($secenek,$soru_id));
    }


    header('Location: questionAdd.php');
}


/* YENİ DERS KAYITI YAPILIYOR !*/
if(isset($_POST['dersKaydet'])){
	$ders_ad = $_POST['ders_ad'];

	
	$query3 = "INSERT INTO dersler (ders_ad,uye_id) VALUES (?,?)";
	$statement3 = $conn->prepare($query3);

	if ($statement3->execute(array($ders_ad,$uye_id))) {
		$message = "Yeni Ders Kayıtı Başarılı";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}else{
		$message = "Yeni Ders Kayıtı Başarısız!! Tekrar Deneyiniz!";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}


	header('Location: questionAdd.php');
}
?>