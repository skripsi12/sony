<?php
	ob_start();
	error_reporting(E_ALL & ~E_NOTICE);
	include("../lib/lib_func.php");
	include('../lib/phpMailer/class.phpmailer.php');
	$link=koneksi_db();
	
	///VARIABEL
	$email		 = $_POST['email'];
	
	$cekdataEmail="SELECT pengguna.`email`
					FROM pengguna
					WHERE pengguna.`email` = '$email'";
    $adaEmail=mysqli_query($link, $cekdataEmail)  or die(mysqli_error());

    $cekdataEmailSupplier="SELECT supplier.`email_supplier`
							FROM supplier
							WHERE supplier.`email_supplier` = '$email'";
    $adaEmailSupplier=mysqli_query($link, $cekdataEmailSupplier)  or die(mysqli_error());
   
	
	if(mysqli_num_rows($adaEmail)>0)
	{ 
		$query=mysqli_query($link, "SELECT pengguna.`kode_pengguna`,
								pengguna.`username`,
								pengguna.`email`
							FROM pengguna
							WHERE pengguna.`email` = '$email'");
		$data=mysqli_fetch_array($query);

		$kode_pengguna 	= $data['kode_pengguna'];
		$username    	= $data['username'];

		function acakangkahuruf($panjang) { 
			$karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'; 
			$string = ''; 
			for ($i = 0; $i < $panjang; $i++) { 
				$pos = rand(0, strlen($karakter)-1); 
				$string .= $karakter{$pos}; 
			} 

			return $string; 
		}

		$password = acakangkahuruf(6);

		mysqli_query($link, "UPDATE pengguna 
						SET password = MD5('$password')
						WHERE kode_pengguna='$kode_pengguna'");


		$mail = new PHPMailer(true);
		$mail->IsSMTP();

		try {
		  $mail->Host       = "smtp.gmail.com"; // SMTP server
		  $mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
		  $mail->SMTPAuth   = true;                  // enable SMTP authentication
		  $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
		  $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
		  $mail->Port       = 465;                   // set the SMTP port for the GMAIL server
		  $mail->Username   = "info.sisteminformasi@gmail.com";  // GMAIL username
		  $mail->Password   = "info@Satu2TIGA";            // GMAIL password
		  $webmaster_email  = "info.sisteminformasi@gmail.com"; //Reply to this email ID
		  $email_re 		= $email; // Recipients email ID
		  $mail->AddReplyTo($webmaster_email,"Supply Chain Management Kurnia Sari Bakery");
		  $mail->AddAddress($email_re,$name);
		  $mail->SetFrom($webmaster_email,"Supply Chain Management Kurnia Sari Bakery");
		  $mail->AddReplyTo($webmaster_email,"Supply Chain Management Kurnia Sari Bakery");
		  $mail->Subject = "Info Pemulihan Kata Sandi Akun Supply Chain Management Kurnia Sari Bakery";
		  $mail->Body = ("Pemulihan kata sandi untuk akun  Supply Chain Management Kurnia Sari Bakery berhasil dilakukan. Silahkan gunakan akun berikut untuk masuk ke dalam sistem. <br><br> Nama Pengguna : $username <br> Kata Sandi : $password <br><br><br>Terimakasih."); //HTML Body
		  $mail->AltBody = ("Pemulihan kata sandi untuk akun  Supply Chain Management Kurnia Sari Bakery berhasil dilakukan. Silahkan gunakan akun berikut untuk masuk ke dalam sistem. <br><br> Nama Pengguna : $username <br> Kata Sandi : $password <br><br><br>Terimakasih."); //HTML Body
		  
		  $mail->Send();
		  header("Location:lupa-kata-sandi.php?lupa_kata_sandi_sukses=true");
		} 
		catch (phpmailerException $e) {
		  echo $e->errorMessage(); //Pretty error messages from PHPMailer
		} 
		catch (Exception $e) {
		  echo $e->getMessage(); //Boring error messages from anything else!
		}


	}
	else if(mysqli_num_rows($adaEmailSupplier)>0){

		$query=mysqli_query($link, "SELECT supplier.`kode_supplier`,
								supplier.`username`,
								supplier.`email_supplier`
							FROM supplier
							WHERE supplier.`email_supplier` = '$email'");
		$data=mysqli_fetch_array($query);

		$kode_supplier 	= $data['kode_supplier'];
		$username    	= $data['username'];

		function acakangkahuruf($panjang) { 
			$karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'; 
			$string = ''; 
			for ($i = 0; $i < $panjang; $i++) { 
				$pos = rand(0, strlen($karakter)-1); 
				$string .= $karakter{$pos}; 
			} 

			return $string; 
		}

		$password = acakangkahuruf(6);

		mysqli_query($link, "UPDATE supplier 
						SET password = MD5('$password')
						WHERE kode_supplier='$kode_supplier'");


		$mail = new PHPMailer(true);
		$mail->IsSMTP();

		try {
		  $mail->Host       = "smtp.gmail.com"; // SMTP server
		  $mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
		  $mail->SMTPAuth   = true;                  // enable SMTP authentication
		  $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
		  $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
		  $mail->Port       = 465;                   // set the SMTP port for the GMAIL server
		  $mail->Username   = "info.sisteminformasi@gmail.com";  // GMAIL username
		  $mail->Password   = "info@Satu2TIGA";            // GMAIL password
		  $webmaster_email  = "info.sisteminformasi@gmail.com"; //Reply to this email ID
		  $email_re 		= $email; // Recipients email ID
		  $mail->AddReplyTo($webmaster_email,"Supply Chain Management Kurnia Sari Bakery");
		  $mail->AddAddress($email_re,$name);
		  $mail->SetFrom($webmaster_email,"Supply Chain Management Kurnia Sari Bakery");
		  $mail->AddReplyTo($webmaster_email,"Supply Chain Management Kurnia Sari Bakery");
		  $mail->Subject = "Info Pemulihan Kata Sandi Akun Supply Chain Management Kurnia Sari Bakery";
		  $mail->Body = ("Pemulihan kata sandi untuk akun  Supply Chain Management Kurnia Sari Bakery berhasil dilakukan. Silahkan gunakan akun berikut untuk masuk ke dalam sistem. <br><br> Nama Pengguna : $username <br> Kata Sandi : $password <br><br><br>Terimakasih."); //HTML Body
		  $mail->AltBody = ("Pemulihan kata sandi untuk akun  Supply Chain Management Kurnia Sari Bakery berhasil dilakukan. Silahkan gunakan akun berikut untuk masuk ke dalam sistem. <br><br> Nama Pengguna : $username <br> Kata Sandi : $password <br><br><br>Terimakasih."); //HTML Body
		  
		  $mail->Send();
		  header("Location:lupa-kata-sandi.php?lupa_kata_sandi_sukses=true");
		} 
		catch (phpmailerException $e) {
		  echo $e->errorMessage(); //Pretty error messages from PHPMailer
		} 
		catch (Exception $e) {
		  echo $e->getMessage(); //Boring error messages from anything else!
		}

	}
	else{


		header("Location:lupa-kata-sandi.php?lupa_kata_sandi_gagal=$email");
		exit;

		

	}





	
    ob_end_flush();
?>