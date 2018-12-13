<?php 
//session_start();
include 'loginHeader.php';
include 'loginSideMenu.php';
include_once 'dbConfig.php';
if (isset($_POST["dersler"])) {
	$_SESSION["ders_id"] = $_POST['ders_id'];
	$_SESSION["ders_ad"] = $_POST['ders_ad'];
	$_SESSION["soruidleri"]=array();
}

$ders_id = $_SESSION["ders_id"];
$ders_ad = $_SESSION["ders_ad"];
//soru kağıdı için

$uye_id = $_SESSION['uye_id'];



?>
<div style="float:left; margin: 20px 0 0 275px; background-color: white; width:auto; height:85%;">
	<div name="dersbaslik" style="margin: 0 0 0 55px;">
		<h2> <?php echo $ders_ad; ?></h2> <br>
	</div>
	<div name="eklenenSoruBilgileri">

		<strong>Sınav kağıdına eklenen soru sayısı : </strong>
		<?php 
		echo count($_SESSION["soruidleri"]);
		?>
	</div>	
	<table border="2">
		<tr>
			<?php

			//soruları çekiyoruz
			$query = $conn->query("SELECT * FROM sorular WHERE uye_id = $uye_id AND ders_id = $ders_id");
			//seçenekleri çekiyoruz
			$query2 = $conn->prepare("SELECT * FROM secenekler WHERE soru_id = ?");
			$senecekler = array("A","B","C","D","E");
			$sorusayisi = 1;
			$i = 0;
			$tr = "</tr><tr>";

			if($query->rowCount() > 0){
				while($row = $query->fetch()){
					$soru = $row['soru'];
					$query2->execute(array($row['soru_id']));
					$i++;
					?>
					<td>

						<div style="float: left; margin: 0 20px 15px 0;">
							<div style="float: left;"><strong><?php echo $sorusayisi++.") "; ?></strong></div>			
							<div style="float: right;">
								<form  method="post">	
									<input type="hidden" id="soru_id" name="soru_id" value="<?php echo $row['soru_id']; ?>">
									<button  type="submit" name="soruEkle" class="btn btn-link" title="Sınav kağıdına ekle!">✔</button>							  			 	
									<button  type="submit" name="soruSil" class="btn btn-link" title="Sınav kağıdından sil!">X</button>

								</form>		
							</div>	
							<div name="soru" style="width: 350px; margin: 0 0 15px 0;">
								<?php echo $soru; ?>
							</div>	
							<div name="secenekler">
								<?php 
								$j=0;
								if($query2->rowCount() > 0){
									while($row2 = $query2->fetch()){
										echo $senecekler[$j].")".$row2['secenek']."<br>";
										$j++;
									}
								}
								?>

							</div>						
						</div>
					</td>				

					<?php
					if ($i % 2 == 0) {
						echo $tr;

					}	
				}


			}else{ ?>
				<p>Bu derste soru yok !</p>
			<?php } ?>            
		</tr>
	</table>


</div>

<?php 
if (isset($_POST['soruSil'])) {

	$soruid = $_POST['soru_id'];

	$_SESSION["soruidleri"]= array_values(array_diff($_SESSION["soruidleri"], array($soruid)));

	foreach ($_SESSION["soruidleri"] as $key ) {
		echo $key;
	}
}
if (isset($_POST['soruEkle'])) {

	$soruid = $_POST['soru_id'];	
	array_push($_SESSION["soruidleri"],$soruid);

	foreach ($_SESSION["soruidleri"] as $key) {
		echo $key;
	}
}

?>

<script type="text/javascript">

	$(document).ready(function(){    
		$("#dersAdi").show();
		$("#okulAdi").show();  
	});


</script>


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


