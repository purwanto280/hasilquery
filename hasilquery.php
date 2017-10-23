 
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
 //https://dev.mysql.com/doc/refman/5.5/en/fulltext-boolean.html
 //ALTER TABLE dokumen
//ADD FULLTEXT INDEX `FullText` 
//(`token` ASC, 
 //`tokenstem` ASC);
 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbstbifix";
$katakunci="";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$hasil=@$_POST[$katakunci];
$sql = "SELECT distinct nama_file,token,tokenstem,tokenstem2 FROM `dokumen` WHERE token like '%$hasil%'";
//$sql = "SELECT distinct nama_file,token,tokenstem FROM `dokumen` WHERE MATCH (token,tokenstem) AGAINST ('$hasil' IN BOOLEAN MODE)";


echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Nama file: " . $row["nama_file"]. " - Token: " . $row["token"]. " " . $row["tokenstem"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();

///

?>
<center><a href="index.php" style="background-color:cyan">Home</center>
    </div>
  </div>
</div>



</body>
</html>
