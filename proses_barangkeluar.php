<?php
     // include database connection file
     include("koneksi.php");
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['submit'])) {
        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        $jenis = $_POST['jenis'];
        $jumlah = $_POST['jumlah'];
        $harga = $_POST['harga'];
        $kode_warna = $_POST['kode_warna'];
        $pengambil = $_POST['pengambil'];
        $tohar = $_POST['tohar'];

        // Insert user data into table
        $result = mysqli_query($conn, "INSERT INTO barang_keluar(kode_barang,nama_barang,jenis,jumlah,harga,kode_warna,pengambil,total_harga) VALUES('$kode','$nama','$jenis','$jumlah','$harga','$kode_warna','$pengambil','$tohar')");
        header("Location: tambah_barang_keluar.php");
    }

