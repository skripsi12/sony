<html>
<header>
   <?
session_start();
if (!isset($_SESSION['username'])){
header("Location:./index.php");
}
?>
  <?php include ('header.php');?>
</header>
<body>
  <div class = "wrapper">
    <!-- navbar -->
    <?php include ("navbar.php"); ?>
    <!-- SideBar -->
    <?php include ("sidebar.php"); ?> 
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">Barang</li>
                <li class="breadcrumb-item active">Tambah User</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <?php
      include('koneksi.php');
      if(isset($_GET['ni'])){
        $ni		= $_GET['ni'];
        $query	= mysqli_query($conn,'select * from pengguna where kode_pengguna = "'.$ni.'"');
        $data  	= mysqli_fetch_array($query);
      }
      ?>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="proses_manajemen_akun.php" method = "post" name="formbarang">
                <div class="card-body">
                  <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $ni;?>">
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <?php
                    echo '<input type="text" class="form-control" id="nama" name="nama" value="'.$data['nama'].'">'
                    ?>
                  </div>
                  
                  <div class="form-group">
                    <label>Jabatan</label>
                    <select class="custom-select" id= "jabatan" name= "jabatan">
                      <?php if($data['jabatan'] == "kepagu"){?>
                      <option value="<?php echo $data['jabatan']?>">Kepala Gudang</option>
                   <?php } else {?>
                     <option value="<?php echo $data['jabatan']?>"><?php echo $data['jabatan'];?></option>
                   <?php }?>
                     <option value="staff">Staff</option>
                     <option value="kepagu">Kepala Gudang </option>
                   </select>
                 </div>
                 <div class="form-group">
                  <label for="email">Email</label>
                  <?php
                  echo '<input type="email" class="form-control" id="email" name="email" value="'.$data['email'].'">'
                  ?>
                </div>
                <div class="form-group">
                  <label for="username">Username</label>
                  <?php
                  echo '<input type="text" class="form-control" id="username" name="username" value="'.$data['username'].'">'
                  ?>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <?php
                  echo '<input type="password" class="form-control" id="password" name="password" >'
                  ?>
                </div>  
               

              </div> 
            </div>
            <div class="card-footer">
              <button type="submit" id= "submit_edit" name = "submit_edit" class="btn btn-primary">Submit</button>
            </div>
          </form>


          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </section>
    </div>
  </div>
</div>
</div>
<script>
 function totals(){
  var harga = $("#harga").val()
  var jumlah = $("#jumlah").val()
  var total = harga * jumlah
  $("#total").val(total)
}
</script>
<?php include ('footer.php');?>
</body>


</html>
</body>
</html>