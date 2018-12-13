<?php 
//session_start();
include 'loginHeader.php';
include 'loginSideMenu.php';
include_once 'dbConfig.php';
?>

<div style="float:left; margin: 20px 0 0 270px;">
	<div>
		<button id="dersKayit" class="btn btn-outline-success">Yeni Ders Aç</button>		
		<div id="kayitPenceresi" style="display:none;"> 
			<form action="questionSave.php" method="post">
				<input type="text" name="ders_ad" placeholder="Ders Adını Girin..." required="required">
				<input type="submit" name="dersKaydet" class="btn btn-info btn-sm" value="Kaydet">
				<input type="button" id="kayitIptal" class="btn btn-info btn-sm" value="İptal">
			</form>
		</div>
		<div>
			<?php 
			$uye_id = $_SESSION['uye_id'];
			$query = $conn->query("SELECT * FROM dersler WHERE uye_id = $uye_id");

			if ($query->rowCount() > 0) {?>
				<form id="ders_secenekForm" method="get">

					<?php 	while ($row = $query->fetch()) {?>


						<div style="float: left;">							
							<?php echo $row['ders_ad']; ?>
							<input type="radio" name="ders" value="<?php echo $row['ders_id']; ?>"/>
						</div>


						<?php	
					}
				}
				?>
				<span>Soru Şık Sayısını Seçin :</span>
				3 <input type="radio" name="secenek" value="3"/>
				4 <input type="radio" name="secenek" value="4"/> 
				5 <input type="radio" name="secenek" value="5"/>
				<input type="button" id="onayButton" name="onayButton" class="btn btn-warning btn-sm" value="Onayla"  style="display: none;" onclick="secenekYaz()">
			</form>
		</div>
		<div>				
		</div>
	</div>

	<div id="ortaKisim">		
		<form  action="questionSave.php" method="post">			
			<center>
				<textarea name="soru" class="ckeditor" style="resize:none;" placeholder="Soruyu bu alana yaz."></textarea>       
			</center>
			<center>
				<div id="secenekler">
					<!-- seçenekler buraya sıralanacak! -->

				</div>				
			</center>			
		</form>
	</div>	
</div>
<div id="page-wrapper">
	
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<!-- jQuery -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="//cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">		



	function secenekYaz() {
		var form = document.getElementById("ders_secenekForm");
		var secenek = form.elements["secenek"].value;		
		var ders = form.elements["ders"].value;

		var html="";
		var secenekler = ["A","B","C","D","E"];
		if(secenek == "3"){

			for (var i=0;i<3;i++) {	
				html +=secenekler[i];			
				html +="<input type='radio' name='dogrusecenek' value='";
				html +=secenekler[i];
				html +="'/><textarea name='";
				html +="secenek[]";
				html +="' rows='1' cols='40' wrap='soft' style='resize:none;'></textarea></br>";
				html +="<input type='hidden' name='ders_id' value='";
				html +=ders;
				html +="'>";
			}	
			html +="<input type='submit' name='save' class='btn btn-success' value='Ekle' />";	

			document.getElementById("secenekler")
			.innerHTML = html;

		}else if(secenek == "4"){

			for (var i=0;i<4;i++) {
				html +=secenekler[i];			
				html +="<input type='radio' name='dogrusecenek' value='";
				html +=secenekler[i];
				html +="'/><textarea name='";
				html +="secenek[]";
				html +="' rows='1' cols='40' wrap='soft' style='resize:none;'></textarea></br>";
				html +="<input type='hidden' name='ders_id' value='";
				html +=ders;
				html +="'>";
			}
			html +="<input type='submit' name='save' class='btn btn-success' value='Ekle' />";
			document.getElementById("secenekler")
			.innerHTML =html;

		}else if(secenek == "5"){

			for (var i=0;i<5;i++) {
				html +=secenekler[i];			
				html +="<input type='radio' name='dogrusecenek' value='";
				html +=secenekler[i];
				html +="'/><textarea name='";
				html +="secenek[]";
				html +="' rows='1' cols='40' wrap='soft' style='resize:none;'></textarea></br>";
				html +="<input type='hidden' name='ders_id' value='";
				html +=ders;
				html +="'>";
			}
			html +="<input type='submit' name='save' class='btn btn-success' value='Ekle' />";
			document.getElementById("secenekler")
			.innerHTML =html;
		}

	}

//Soru kaydet ve iptal görünürlük--> hide/show
//Onay button görünürlük
$(document).ready(function(){
	$("#dersKayit").click(function(){
		$("#kayitPenceresi").show();
	});

	$("#kayitIptal").click(function(){
		$("#kayitPenceresi").hide();
	});

	$("input[name=ders]").on( "change", function() {		
		$("#onayButton").show();
	} );



});

</script>


</body>

</html>