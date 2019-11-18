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
              <!-- /.card-header -->
              <!-- form start -->
              <form action="proses_tambahwarna.php" method = "post" name="formwarna">
                <div class="card-body">
                  <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $ni;?>">
                  <div class="form-group">
                    <label for="nama">Nama Warna</label>
                    <?php
                    echo '<input type="text" class="form-control" id="nama" name="nama" value="'.$data['nama'].'">'
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