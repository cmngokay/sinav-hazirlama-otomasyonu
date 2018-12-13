<?php 

include 'dbConfig.php';

$uye_mail = $_POST['uye_mail'];
$uye_parola = $_POST['uye_parola'];
$uye_parola2 = $_POST['uye_parola2'];

if($uye_parola != $uye_parola2){
	 echo "<script>alert('Girdiğiniz Parola Doğru Eşleşmiyor !')</script>";
	 echo "<script>window.open('register.php','_self')</script>";
}else{
	 $stmt = $conn->prepare("SELECT * FROM login WHERE uye_mail = :uye_mail"); 
     $stmt->bindParam(':uye_mail',$uye_mail);    
     $stmt->execute(); 
  
     echo $stmt->rowCount();
    if($stmt->rowCount()>0)  
    {  
        echo "<script>alert('Girdiğiniz e-mail kullanılmakta ! Lütfen farklı bir e-mail ile kayıt olmayı deneyin !')</script>";    
        echo"<script>window.open('register.php','_self')</script>"; 
        die();
    }  
//insert the user into the database.  
    
      $stmt2 =  $conn->prepare("insert into login (uye_mail,uye_parola) VALUES (:uye_mail,:uye_parola)");
      $stmt2->bindParam(':uye_mail',$uye_mail);
      $stmt2->bindParam('uye_parola',md5($uye_parola));
    if($stmt2->execute())  
    {  
    	echo "<script>alert('Kayıt Başarılı! Giriş Yapabilirsiniz...')</script>";
        echo"<script>window.open('index.php','_self')</script>";  
    }  
}



 ?>