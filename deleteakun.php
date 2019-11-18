<?php
include('koneksi.php');
$ni	= $_GET['ni'];

$sql 	= 'delete from pengguna where kode_pengguna="'.$ni.'"';
$query	= mysqli_query($conn,$sql);
header("Location: manajemen_akun.php");

?>