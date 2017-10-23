<?php
//membuat koneksi ke database
$host = 'localhost';
  $user = 'root';      
  $password = '';      
  $database = 'dbstbifix';  
    
  $konek_db = mysql_connect($host, $user, $password);    
  $find_db = mysql_select_db($database) ;
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
     <a href="upload.php" style="background-color:yellow">Upload File</a> or <a href="index.php" style="background-color:yellow">Home</a><br>
<a>Kosongkan Tabel : </a> <a href="empty.php" color="red"> KOSONGKAN </a> 

<center> 
HASIL TOKENISASI DAN STEMMING
<br>
<br>

<!-- ///////////////////////////// Script untuk membuat tabel///////////////////////////////// -->

<table  border='1' Width='700'>  
<tr>
    <th> Nama File </th>
    <th> Tokenisasi </th>
    <th> Stemming Porter </th>
    <th> Stemming Nazief Adriani</th>
    
</tr>

<?php  
// Perintah untuk menampilkan data
$queri="Select * From dokumen" ;  //menampikan SEMUA

$hasil=MySQL_query ($queri);    //fungsi untuk SQL

// perintah untuk membaca dan mengambil data dalam bentuk array
while ($data = mysql_fetch_array ($hasil)){
$id = $data['dokid'];
 echo "    
        <tr>
        <td>".$data['nama_file']."</td>
        <td>".$data['token']."</td>
        <td>".$data['tokenstem']."</td>
        <td>".$data['tokenstem2']."</td>
        
        </tr> 
        ";
        
}

?>

</table>
    </div>
  </div>
</div>



</body>
</html>
