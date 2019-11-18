<?php
include('koneksi.php');
$ni	= $_GET['ni'];

$sql 	= 'delete from supplier where kode_supplier="'.$ni.'"';
$query	= mysqli_query($conn,$sql);
header("Location: list_supplier.php"); 
?>