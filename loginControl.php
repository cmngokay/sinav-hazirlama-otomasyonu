<?php 

include 'dbConfig.php';

    session_start();
    $uye_mail=$_POST['uye_mail'];  
    $uye_parola=$_POST['uye_parola'];  
  
    $sql = "SELECT * FROM login WHERE uye_mail=? AND 
    uye_parola=? ";
    $query = $conn->prepare($sql);
    $query->execute(array($uye_mail,md5($uye_parola)));
    $row = $query->fetch();
    
    if($query->rowCount() >=1)  
    {  

        $_SESSION['uye_id']=$row['uye_id'];
       // $_SESSION['login_user']=$uye_mail;
        header('Location: loginUser.php');        
  
    }  
    else  
    {        
      
      echo "<script>alert('E-mail veya Parola Yanlış !')</script>";       
      header('Location: login.php');
    }  






 ?>