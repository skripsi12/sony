 <?php
                // Check If form submitted, insert form data into users table.
 if(isset($_POST['submit'])) {

  $nama = $_POST['nama'];
  $jabatan = $_POST['jabatan'];
  $email = $_POST['email'];
  $usernames = $_POST['username'];
  $passwords = md5($_POST['password']);
  echo $passwords;
                // include database connection file
  include_once("koneksi.php");

                // Insert user data into table
  $result = mysqli_query($conn, "INSERT INTO pengguna(nama,jabatan,email,username,password) VALUES('$nama','$jabatan','$email','$usernames','$passwords')");


  header("Location: http://localhost/sony/manajemen_akun.php");
  die();
                //echo "User added successfully. <a href='index.php'>View Users</a>";
}
if(isset($_POST['submit_edit'])){
  $kode = $_POST['id'];
  $nama = $_POST['nama'];
  $jabatan = $_POST['jabatan'];
  $email = $_POST['email'];
  $usernames = $_POST['username'];
  $passwords = md5($_POST['password']);
  echo "x".$kode;
include_once("koneksi.php");
  $sql  = 'update pengguna set nama="'.$nama.'", jabatan="'.$jabatan.'", email="'.$email.'", username="'.$usernames.'", password="'.$passwords.'" where kode_pengguna="'.$kode.'"';
  $query  = mysqli_query($conn,$sql);
  if (!mysqli_query($conn,$sql))
  {
    echo("Error description: " . mysqli_error($conn));
  }

}
?>