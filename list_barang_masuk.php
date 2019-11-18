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
        <div class="row mb-2">
          
          <div class="col-sm-6">
            
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
            <section class="content">
    <div class="row">
        <div class="col-12">
        <div class="card card-primary">
        <div class="card-header">
           
            <h3 class="card-title">List Barang Masuk</h3>
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
                <th>Jumlah</th>
                <th>Supplier</th>
                <th>Tanggal Masuk</th>
                <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    
                    $sql="SELECT barang.kode_barang, barang.nama_barang, barang.jenis,barang.stok,barang_masuk.jumlah_masuk,supplier.nama_supplier
                    FROM barang_masuk
                    INNER JOIN barang ON barang.id_barang = barang_masuk.id_barang
                    INNER JOIN supplier ON supplier.kode_supplier = barang_masuk.kode_supplier";
                          
                    $result=mysqli_query($link,$sql);

                    // Associative array
                    while($data = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                    ?>
                <tr>
                <td width ='150px'><?php echo $data["kode_barang"]; ?></td>
                <td width ='150px'><?php echo $data["nama_barang"]; ?></td>
                <td width ='100px'><?php echo $data["jenis"]; ?></td>
                <td width ='150px'><?php echo $data[""]; ?></td>
                <td width ='150px'><?php echo $data["jumlah_masuk"]; ?></td>
                <td width ='150px'><?php echo $data["nama_supplier"]; ?></td>
                <td></td>
                
                
                <td width ='157px'><a class="btn btn-info btn-sm" href="edit_barang_masuk.php?ni=<?php echo $data['kode_barang'];?>">
                    <i class="fas fa-pencil-alt"></i>
                    Edit</a>
                <a class="btn btn-danger btn-sm" href="deletebarang_masuk.php?ni=<?php echo $data['kode_barang'];?>">
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

</html>
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