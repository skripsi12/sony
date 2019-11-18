<html>
<header>
   <?
session_start();
if (!isset($_SESSION['username'])){
header("Location:./index.php");
}
?>
  <?php include ('header.php');?>
  <?php if (isset($_REQUEST['kode_warna'])) {$kode_warna = $_REQUEST['kode_warna']; } else { $kode_warna = ''; } ?>
  <?php if (isset($_REQUEST['kode_supplier'])) {$kode_supplier = $_REQUEST['kode_supplier']; } else { $kode_supplier = ''; } ?>
</header>
<body>
<?php

  require_once 'koneksi.php';

  $query = "SELECT * FROM warna Order BY kode_warna";

  $result = mysqli_query($conn, $query);

  $supplier = "SELECT * FROM supplier ORDER BY kode_supplier ASC";
  $hasil = mysqli_query($conn, $supplier);

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
        $query	= mysqli_query($conn,'select * from barang where kode_barang = "'.$ni.'"');
        $data  	= mysqli_fetch_array($query);
        // $kode = $data['kode_barang'];
        // $nama = $data['nama_barang'];
        // $warna = $data['nama_warna'];
        // $jenis = $data['jenis'];
        // $jumlah = $data['jumlah'];
        // $harga = $data['harga'];

      }

    

      ?>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Barang Masuk</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="proses_barangmasuk.php" method = "post" name="formbarang">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama">Kode Barang</label>
                    <?php
                    echo '<input type="text" class="form-control" id="kode" name="kode" value="'.$data['kode_barang'].'">'
                    ?>
                  </div>
                  <div class="form-group">
                    <label for="NamaBarang">Nama Barang</label>
                    <?php
                    echo '<input type="text" class="form-control" id="nama" name="nama" value="'.$data['nama_barang'].'">'
                    ?>
                  </div>
                 
                  <div class="form-group">
                  <label for="jenis">Jenis</label>
                  <select class="custom-select" name="jenis" id="jenis">
                      <option <?php echo ($data['jenis'] == 'PE') ? "selected": "" ?>>PE</option>
                      <option <?php echo ($data['jenis'] == 'PVDF') ? "selected": "" ?>>PVDF</option>
                      
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="NamaBarang">Jumlah</label>
                    <?php
                    echo '<input type="text" class="form-control" id="jumlah" name="jumlah" value="'.$data['jumlah'].'">'
                    ?>
                  </div>
                  <div class="form-group">
                    <label for="Jenis">Warna</label>
                    <select class="form-control" name="kode_warna" id="kode_warna">
                      <?php while($data = mysqli_fetch_assoc($result) ){?>
                      <option value="<?php echo $data['kode_warna']; ?>"><?php echo $data['nama_warna']; ?></option>
                    <?php } ?>
                    </select>

                  </div>
                
                  <div class="form-group">
                    <label for="Jenis">Supplier</label>
                    <select class="form-control" name="supplier" id="supplier">
                    <?php while($data1 = mysqli_fetch_assoc($hasil) ){?>
                      <option value="<?php echo $data1['kode_supplier']; ?>"><?php echo $data1['nama_supplier']; ?></option>
                    <?php } ?>
                    </select>
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
 
</script>
<?php include ('footer.php');?>
</body>


</html>
</body>
</html>