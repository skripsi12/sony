<html>
    <header>
        <?php include ('header.php');?>
        <?php if (isset($_REQUEST['kode_warna'])) {$kode_warna = $_REQUEST['kode_warna']; } else { $kode_warna = ''; } ?>
    </header>
<body>
      <?php

      require_once 'koneksi.php';

      $query = "SELECT * FROM warna ORDER BY kode_warna ASC";

      $result = mysqli_query($conn, $query);

      ?>
  <div class = "wrapper">
        <!-- navbar -->
        <?php include ("navbar.php"); ?>
        <!-- SideBar -->
        <?php include ("sidebar.php"); ?> 
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
      
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-12">
        <!-- general form elements -->
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Supplier</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="proses_tambahsupplier.php" method = "post" name="formsupplier">
                <div class="card-body">
                  
                    <input type="hidden" class="form-control" id="kode" name="kode" placeholder="Kode Supplier">
                  
                  <div class="form-group">
                    <label for="NamaBarang">Nama Supplier</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Supplier" autocomplete="off">
                  </div>
                                    <div class="form-group">
                    <label for="Jumlah">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label for="text">No. Telp/HP</label>
                    <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="No. Telp" autocomplete="off">
                  </div>
                <div class="card-footer" bg-light>
                  <button type="submit" id= "submit" name = "submit" class="btn btn-primary">Submit</button>
                </div>
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
    <?php include ('footer.php');?>
</body>


</html>
</body>
</html>