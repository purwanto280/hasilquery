<?php
require_once('Enhanced_CS.php');
?>
<!DOCTYPE html>
<html>
<title>Sistem temu Kembali</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body class="w3-content" style="max-width:1300px">

<!-- First Grid: Logo & About -->
<div class="wrow">
  <div class="w3-half w3-black w3-container w3-center" style="height:700px">
    <div class="w3-padding-64">
      <h1>Hasil Kami</h1>
    </div>
    <div class="w3-padding-64">
	<a href="index.php" class="w3-button w3-black w3-block w3-hover-blue-black w3-padding-16">Home</a>
	<a href="upload.php" class="w3-button w3-black w3-block w3-hover-blue-black w3-padding-16">Upload File PDF </a>
	<a href="stem.php" class="w3-button w3-black w3-block w3-hover-blue-black w3-padding-16">Pencarian Kata Dasar</a>
	<a href="hasil_tokenisasi.php" class="w3-button w3-black w3-block w3-hover-blue-black w3-padding-16">Hasil Tokenisasi</a>
	<a href="awalquery.php" class="w3-button w3-black w3-block w3-hover-blue-black w3-padding-16">Pencarian Kata Kunci</a>
	<a href="hasilquery.php" class="w3-button w3-black w3-block w3-hover-blue-black w3-padding-16">Hasil Query</a>
	<a href="hitungbobot.php" class="w3-button w3-black w3-block w3-hover-blue-black w3-padding-16">Hasil Bobot</a>
      
    </div>
  </div>
  <div class="w3-half w3-white w3-container" style="height:700px">
    <div class="w3-padding-64 w3-center">
     <h3>PENCARIAN KATA DASAR</h3>
<form method="post" action="">
<input type="text" name="kata" id="kata" size="20" value="<?php if(isset($_POST['kata'])){ echo $_POST['kata']; }else{ echo '';}?>">
<input class="btnForm" type="submit" name="submit" value="Submit"/>
</form>
<?php
if(isset($_POST['kata'])){
	$teksAsli = $_POST['kata'];
	echo "Teks asli : ".$teksAsli.'<br/>';
	$stemming = Enhanced_CS($teksAsli);
	echo "Kata dasar : ".$stemming.'<br/>';
}
?>
    </div>
  </div>
</div>



</body>
</html>
