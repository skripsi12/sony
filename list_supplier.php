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
           
            <h3 class="card-title">Supplier</h3>
            </div>
                        <!-- /.card-header -->
            <div class="card-body">
            <p class="card-text">
            <a class="btn btn-primary" href="tambah_supplier.php">
                    <i class="fas fa-plus"></i>
                     Tambah</a>
            

            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
              
                <th>Nama Supplier</th>
                <th>Alamat</th>
                <th>No. Telp/HP</th>
                <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                   
                    $sql="SELECT * FROM supplier";
                    $result=mysqli_query($link,$sql);

                    // Associative array
                    while($data = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                    ?>
                <tr>
              
                <td><?php echo $data["nama_supplier"]; ?></td>
                <td><?php echo $data["alamat"]; ?></td>
                <td><?php echo $data["no_telp"]; ?></td>               
                <td><a class="btn btn-info btn-sm" href="edit_supplier.php?ni=<?php echo $data['kode_supplier'];?>">
                    <i class="fas fa-pencil-alt"></i>
                    Edit</a>
                <a class="btn btn-danger btn-sm" href="delete_supplier.php?ni=<?php echo $data['kode_supplier'];?>">
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