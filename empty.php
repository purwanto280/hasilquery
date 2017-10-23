<?php
$host = 'localhost';
  $user = 'root';      
  $password = '';      
  $database = 'dbstbifix';  
    
  $konek_db = mysql_connect($host, $user, $password);    
  $find_db = mysql_select_db($database) ;

$query1 = "DELETE FROM `dokumen` WHERE 1";
 $query2 = "DELETE FROM `upload` WHERE 1";
$hasil1 = mysql_query ($query1);
$hasil2 = mysql_query ($query2);
 
echo "Data telah dihapus.";
?>
<br>
<a> Kembali ke tabel ? </a> <a href="hasil_tokenisasi.php"> YA </a>