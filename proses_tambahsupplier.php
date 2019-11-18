<?php
     // include database connection file
include("koneksi.php");
    // Check If form submitted, insert form data into users table.
if(isset($_POST['submit'])) {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
        // Insert user data into table
    $result = mysqli_query($conn, "INSERT INTO supplier(kode_supplier,nama_supplier,alamat,no_telp) VALUES('$kode','$nama','$alamat','$no_telp')");
     header("Location: list_supplier.php"); 
}

if(isset($_POST['submit_edit'])){
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $jenis = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    
    $sql	= 'update barang set kode_supplier="'.$kode.'", nama_supplier="'.$nama.'", alamat="'.$alamat.'", no_telp="'.$no_telp.'';
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