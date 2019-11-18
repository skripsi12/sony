<?php
include('koneksi.php');
$ni	= $_GET['ni'];

$sql 	= 'delete from barang where kode_barang="'.$ni.'"';
$query	= mysqli_query($conn,$sql);
header("Location: list_barang_masuk.php");

?>