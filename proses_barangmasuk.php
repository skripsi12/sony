<?php
     // include database connection file
include("koneksi.php");
    // Check If form submitted, insert form data into users table.
if(isset($_POST['submit'])) {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $jumlah = $_POST['jumlah'];
    $kode_warna = $_POST['kode_warna'];
    $supplier = $_POST['supplier'];

        // Insert user data into table
    $result = mysqli_query($conn, "INSERT INTO barang(kode_barang,nama_barang,jenis,jumlah,kode_warna,kode_supplier) VALUES('$kode','$nama','$jenis','$jumlah','$kode_warna','$supplier')");
    header("Location: list_barang_masuk.php");
}

if(isset($_POST['submit_edit'])){
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $jumlah = $_POST['jumlah'];
    $kode_warna = $_POST['kode_warna'];
    $supplier = $_POST['supplier'];
    echo "x".$kode;
  include_once("koneksi.php");
    $sql  = 'update barang set kode_barang="'.$kode.'", nama_barang="'.$nama.'", jenis="'.$jenis.'", jumlah="'.$jumlah.'", kode_warna="'.$kode_warna.'" , kode_supplier="'.$supplier.'" where kode_barang ="'.$kode.'"';
    $query  = mysqli_query($conn,$sql);
    if (!mysqli_query($conn,$sql))
    {
      echo("Error description: " . mysqli_error($conn));
    }
     header("Location: tambah_barang_masuk.php");
     die();
  
  }



   ?>