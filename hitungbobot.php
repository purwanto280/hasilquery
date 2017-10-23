
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
     <?php
$host='localhost';
$user='root';
$pass='';
$database='dbstbifix';

$conn=mysql_connect($host,$user,$pass);
mysql_select_db($database);
//hitung index
mysql_query("TRUNCATE TABLE tbindex");
$resn = mysql_query("INSERT INTO `tbindex`(`Term`, `DocId`, `Count`) SELECT `token`,`nama_file`,count(*) FROM `dokumen` group by `nama_file`,token");
	//$n = mysql_num_rows($resn);
	

//berapa jumlah DocId total?, n
	$resn = mysql_query("SELECT DISTINCT DocId FROM tbindex");
	$n = mysql_num_rows($resn);
	
	//ambil setiap record dalam tabel tbindex
	//hitung bobot untuk setiap Term dalam setiap DocId
	$resBobot = mysql_query("SELECT * FROM tbindex ORDER BY Id");
	$num_rows = mysql_num_rows($resBobot);
	print("Terdapat " . $num_rows . " Term yang diberikan bobot. <br />");

	while($rowbobot = mysql_fetch_array($resBobot)) {
		//$w = tf * log (n/N)
		$term = $rowbobot['Term'];		
		$tf = $rowbobot['Count'];
		$id = $rowbobot['Id'];
		
		//berapa jumlah dokumen yang mengandung term tersebut?, N
		$resNTerm = mysql_query("SELECT Count(*) as N FROM tbindex WHERE Term = '$term'");
		$rowNTerm = mysql_fetch_array($resNTerm);
		$NTerm = $rowNTerm['N'];
		
		$w = $tf * log($n/$NTerm);
		
		//update bobot dari term tersebut
		$resUpdateBobot = mysql_query("UPDATE tbindex SET Bobot = $w WHERE Id = $id");		
  	} //end while $rowbobot


?>
<center><a href="index.php" style="background-color:cyan">Home</center>
    </div>
  </div>
</div>



</body>
</html>
