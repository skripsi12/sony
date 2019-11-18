<html>
<header>
<?php include ('header.php');?>
</header>
<body>
<?php
		$link = mysqli_connect("localhost", "root", "", "mudamandiri");
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
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
            <section class="content">
    <div class="row">
        <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title">List Barang Keluar</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jenis</th>
                <th>Warna</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Pengambil</th>
                <th>Tanggal Keluar</th>
                <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                
                $sql="SELECT barang_keluar.kode_barang,barang_keluar.nama_barang,barang_keluar.jenis,barang_keluar.jumlah,barang_keluar.total_harga,barang_keluar.harga,barang_keluar.pengambil,barang_keluar.tanggal_keluar,warna.nama_warna 
                FROM barang_keluar
                INNER JOIN warna ON warna.kode_warna = barang_keluar.kode_warna";
                $result=mysqli_query($link,$sql);

                // Associative array
                while($data = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                ?>
                <tr>
                <td><?php echo $data["kode_barang"]; ?></td>
                <td><?php echo $data["nama_barang"]; ?></td>
                <td><?php echo $data["jenis"]; ?></td>
                <td><?php echo $data["nama_warna"]; ?></td>
                <td><?php echo $data["jumlah"]; ?></td>
                <td><?php echo $data["total_harga"]; ?></td>
                <td><?php echo $data["harga"]; ?></td>
                <td><?php echo $data["pengambil"]; ?></td>
                <td><?php echo $data["tanggal_keluar"]; ?></td>
                
                <td><a class="btn btn-info btn-sm" href="edit_barang_masuk.php?ni=<?php echo $data['kode_barang'];?>">
                    <i class="fas fa-pencil-alt"></i>
                    Edit</a>
                <a class="btn btn-danger btn-sm" href="deletebarang_keluar.php?ni=<?php echo $data['kode_barang'];?>">
                    <i class="fas fa-trash">
                    </i>
                    Delete</a>
                </td>               
              
                </tr>
                <?php							
                    }
                    ?>
                </tbody>
            </table>
            </div>
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
<script>
$(function () {
  
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>

</html>