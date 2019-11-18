<?php
ob_start();
error_reporting(E_ALL & ~E_NOTICE);
include("../lib/lib_func.php");
$username=$_POST['username'];
$password=$_POST['password'];

$link=koneksi_db();
$sql="SELECT pengguna.`kode_pengguna`,
pengguna.`username`,
pengguna.`password`, 
pengguna.`level`, 
pengguna.`jabatan`,  
pengguna.`nama`,
pengguna.`status`
FROM pengguna
WHERE pengguna.`username`='$username' 
AND pengguna.`password`=MD5('$password')";

$res=mysqli_query($link, $sql);
	if(mysqli_num_rows($res)==1)//Apabila username dan userpass benar
	{
		$data=mysqli_fetch_array($res);
		session_start();
		$_SESSION['level']=$data['level'];//isi variabel jabatan
		if ($_SESSION['level'] == "Bagian Administrasi")
		{
			if($data['status']=='Tidak Aktif'){
				header("Location:login.php?tidak_aktif=true");
			}
			else{
				$_SESSION['administrasi']=$data['username']; //isi variabel username
				$_SESSION['nama']=$data['nama'];//isi variabel nama		
				$_SESSION['kode_pengguna']=$data['kode_pengguna'];
				$_SESSION['jabatan']=$data['jabatan'];
				$_SESSION['sudahlogin']=true;//variabel status sudah login
				header("Location:../page/Administrasi/index.php");
			}
		}
		else if ($_SESSION['level'] == "Direktur")
		{
			if($data['status']=='Tidak Aktif'){
				header("Location:login.php?tidak_aktif=true");
			}
			else{
				$_SESSION['direktur']=$data['username']; //isi variabel username
				$_SESSION['nama']=$data['nama'];//isi variabel nama		
				$_SESSION['kode_pengguna']=$data['kode_pengguna'];
				$_SESSION['jabatan']=$data['jabatan'];
				$_SESSION['sudahlogin']=true;//variabel status sudah login
				header("Location:../page/Direktur/index.php");
			}
		}
		else if ($_SESSION['level'] == "Direktur Manajer")
		{
			if($data['status']=='Tidak Aktif'){
				header("Location:login.php?tidak_aktif=true");
			}
			else{
				$_SESSION['direktur-manajer']=$data['username']; //isi variabel username
				$_SESSION['nama']=$data['nama'];//isi variabel nama		
				$_SESSION['kode_pengguna']=$data['kode_pengguna'];
				$_SESSION['jabatan']=$data['jabatan'];
				$_SESSION['sudahlogin']=true;//variabel status sudah login
				header("Location:../page/DirekturManajer/index.php");
			}
		}
		else if ($_SESSION['level'] == "Bagian Keuangan")
		{
			if($data['status']=='Tidak Aktif'){
				header("Location:login.php?tidak_aktif=true");
			}
			else{
				$_SESSION['keuangan']=$data['username']; //isi variabel username
				$_SESSION['nama']=$data['nama'];//isi variabel nama		
				$_SESSION['kode_pengguna']=$data['kode_pengguna'];
				$_SESSION['jabatan']=$data['jabatan'];
				$_SESSION['sudahlogin']=true;//variabel status sudah login
				header("Location:../page/Keuangan/index.php");
			}
		}
		else if ($_SESSION['level'] == "Kepala Bagian Gudang Bahan Baku")
		{
			if($data['status']=='Tidak Aktif'){
				header("Location:login.php?tidak_aktif=true");
			}
			else{
				$_SESSION['gudang-bahan-baku']=$data['username']; //isi variabel username
				$_SESSION['nama']=$data['nama'];//isi variabel nama		
				$_SESSION['kode_pengguna']=$data['kode_pengguna'];
				$_SESSION['jabatan']=$data['jabatan'];
				$_SESSION['sudahlogin']=true;//variabel status sudah login
				header("Location:../page/GudangBahanBaku/index.php");
			}
		}
		else if ($_SESSION['level'] == "Kepala Bagian Gudang Produk Roti")
		{
			if($data['status']=='Tidak Aktif'){
				header("Location:login.php?tidak_aktif=true");
			}
			else{
				$_SESSION['gudang-produk-roti']=$data['username']; //isi variabel username
				$_SESSION['nama']=$data['nama'];//isi variabel nama		
				$_SESSION['kode_pengguna']=$data['kode_pengguna'];
				$_SESSION['jabatan']=$data['jabatan'];
				$_SESSION['sudahlogin']=true;//variabel status sudah login
				header("Location:../page/GudangProdukRoti/index.php");
			}
		}
		else if ($_SESSION['level'] == "Kepala Bagian Gudang Produk Basi")
		{
			if($data['status']=='Tidak Aktif'){
				header("Location:login.php?tidak_aktif=true");
			}
			else{
				$_SESSION['gudang-produk-basi']=$data['username']; //isi variabel username
				$_SESSION['nama']=$data['nama'];//isi variabel nama		
				$_SESSION['kode_pengguna']=$data['kode_pengguna'];
				$_SESSION['jabatan']=$data['jabatan'];
				$_SESSION['sudahlogin']=true;//variabel status sudah login
				header("Location:../page/GudangProdukBasi/index.php");
			}
		}
		else if ($_SESSION['level'] == "Kepala Bagian Pengiriman")
		{
			if($data['status']=='Tidak Aktif'){
				header("Location:login.php?tidak_aktif=true");
			}
			else{
				$_SESSION['pengiriman']=$data['username']; //isi variabel username
				$_SESSION['nama']=$data['nama'];//isi variabel nama		
				$_SESSION['kode_pengguna']=$data['kode_pengguna'];
				$_SESSION['jabatan']=$data['jabatan'];
				$_SESSION['sudahlogin']=true;//variabel status sudah login
				header("Location:../page/Pengiriman/index.php");
			}
		}
		else if ($_SESSION['level'] == "Kepala Bagian Produksi")
		{
			if($data['status']=='Tidak Aktif'){
				header("Location:login.php?tidak_aktif=true");
			}
			else{
				$_SESSION['produksi']=$data['username']; //isi variabel username
				$_SESSION['nama']=$data['nama'];//isi variabel nama		
				$_SESSION['kode_pengguna']=$data['kode_pengguna'];
				$_SESSION['jabatan']=$data['jabatan'];
				$_SESSION['sudahlogin']=true;//variabel status sudah login
				header("Location:../page/Produksi/index.php");
			}
		}

	}

	else if(mysqli_num_rows($res)==0){
		
		
		$sql2="SELECT supplier.`kode_supplier`,
		supplier.`nama_supplier`,
		supplier.`username`,
		supplier.`status`
		FROM supplier
		WHERE supplier.`username` = '$username'
		AND supplier.`password` =MD5('$password')";
		
		$res2=mysqli_query($link, $sql2);
		if(mysqli_num_rows($res2)==1){
			
			$data2=mysqli_fetch_array($res2);
			session_start();
			
			if($data2['status']=='Tidak Aktif'){
				header("Location:login.php?tidak_aktif=true");
			}
			else{
				$_SESSION['supplier']=$data2['username']; //isi variabel username
				$_SESSION['nama_supplier']=$data2['nama_supplier'];//isi variabel nama		
				$_SESSION['kode_supplier']=$data2['kode_supplier'];
				$_SESSION['sudahlogin']=true;//variabel status sudah login

				header("Location:../page/Supplier/index.php");
			}
			
		}
		
		
		else
		{
		header("Location:login.php?gagal_login=true");//pindah ke halaman gagallogin.php
	}
}

ob_end_flush();
?>