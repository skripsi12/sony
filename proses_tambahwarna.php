<?php
     // include database connection file
include("koneksi.php");
    // Check If form submitted, insert form data into users table.
if(isset($_POST['submit'])) {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
        // Insert user data into table
    $result = mysqli_query($conn, "INSERT INTO warna(kode_warna,nama_warna) VALUES('$kode','$nama')");
     header("Location: list_warna.php"); 
}

if(isset($_POST['submit_edit'])){
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $sql	= 'update barang set kode_warna="'.$kode.'", nama_warna="';
    $query	= mysqli_query($conn,$sql);


}

if(isset($_GET['jenis']) || isset($_GET['warna'] )){
    if(!isset($_GET['warna'])){
        $jenis = $_GET['jenis'];
        $query = "SELECT warna FROM jenis where jenis = '".$jenis."'";
        $i = 0;
        $result = mysqli_query($conn, $query);
        while($datas = mysqli_fetch_assoc($result) ){
           $data[$i] = $datas;
           $i++;
       }
       echo json_encode($data);
   } elseif (isset($_GET['jenis']) && isset($_GET['warna'] )) {
       $jenis = $_GET['jenis'];
       $warna = $_GET['warna'];
       $query = "SELECT harga FROM jenis where jenis = '".$jenis."' and warna = '".$warna."'";
       $i = 0;
       $result = mysqli_query($conn, $query);
       echo json_encode(mysqli_fetch_assoc($result));
   }
}




   ?>