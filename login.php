<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Giriş Sayfası</title>
     <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

  
    <div class="col-md-4 col-md-offset-4">
    <div >
        <h3>Sınav Hazırlama Otomasyonu</h3><br>
        <h4>Kullanıcı Girişi</h4>
    </div>
   <div >
        <form name="loginForm" action="loginControl.php" method="post">
    <div class="form-group">
        <input type="email" class="form-control" name="uye_mail" required placeholder="E-Mail" style="width: 50%;">
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="uye_parola" required placeholder="Parola" style="width: 50%;">   
    </div>
    <div class="form-group"> 
        <input type="submit" class="btn btn-primary" value="Giriş" style="width: 35%;">
    </div>
</form>
   </div>
</div>




</body>
</html>