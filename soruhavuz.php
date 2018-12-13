<?php 
//session_start();
include 'loginHeader.php';
include 'loginSideMenu.php';
include_once 'dbConfig.php';
?>
<div style="float:left; margin: 20px 0 0 275px; background-color: white; width:73%; height: 150px;">
	<div style="margin: 0 0 0 170px ;">
		<h2>DERSLER</h2>
	</div>
	<?php 
	$uye_id = $_SESSION['uye_id'];
	/*dersler tablosundaki bilgiler alınıyor. */
	$sql =$conn->query("SELECT * FROM dersler WHERE uye_id = $uye_id"); 

	if ($sql->rowCount() > 0) {
		while ($row = $sql->fetch()) { ?>
			<div style="float: left; margin :15px 15px 0 15px; ">
				<form action="questionPool.php" method="post">
					<input type="hidden" name="ders_id" value="<?php echo $row['ders_id']; ?>">
					<input type="hidden" name="ders_ad" value="<?php echo $row['ders_ad']; ?>">
					<input type="submit" class="btn btn-info" name="dersler" value="<?php echo $row['ders_ad']; ?>">
				</form>
			</div>


			<?php
		}
	}
	?>

	

</div>
<!-- jQuery -->
<script src="vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="vendor/raphael/raphael.min.js"></script>
<script src="vendor/morrisjs/morris.min.js"></script>
<script src="data/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="dist/js/sb-admin-2.js"></script>

</body>

</html>


