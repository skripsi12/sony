<?php
include('koneksi.php');
$ni	= $_GET['ni'];

$sql 	= 'delete from warna where kode_warna="'.$ni.'"';
$query	= mysqli_query($conn,$sql);
header("Location: list_warna.php"); 
?>