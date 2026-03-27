<?php
$servername = "localhost";
$database = "u1507004_dgsign_old";
//$database = "mazferry23_bd";
$username = "u1507004_dgsign";
$password = "Sukses23";

//$base_url = "http://localhost/koperasi/";

$conn = mysqli_connect($servername,$username,$password,$database);

if(mysqli_connect_errno()){
	echo "Koneksi database gagal".mysqli_connect_error();
}
/*if (mysql_connect($server,$user,$pass)){
	#echo ":)";
	mysql_select_db($dbname) or die("database not found");
}else{
	echo "Database Not Found";
}*/
?>