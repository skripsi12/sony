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
           
            <h3 class="card-title">Warna</h3>
            </div>
                        <!-- /.card-header -->
            <div class="card-body">
            <a class="btn btn-primary" href="tambah_warna.php">
                    <i class="fas fa-plus"></i>
                    Tambah</a>
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                <th>Kode Warna</th>
                <th>Nama Warna</th>
                <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
													$i = 1;
													$sql="SELECT * FROM warna";
													$result=mysqli_query($link,$sql);

													// Associative array
													while($data = mysqli_fetch_array($result,MYSQLI_ASSOC)){
													?>
                <tr>
                <td><?php echo $data["kode_warna"]; ?></td>
                <td><?php echo $data["nama_warna"]; ?></td>         
                <td><a class="btn btn-info btn-sm" href="edit_warna.php?ni=<?php echo $data['kode_warna'];?>">
                    <i class="fas fa-pencil-alt"></i>
                    Edit</a>
                <a class="btn btn-danger btn-sm" href="delete_warna.php?ni=<?php echo $data['kode_warna'];?>">
                    <i class="fas fa-trash">
                    </i>
                    Delete</a>
                </td>               
              
                </tr>
                <?php
													$i++;
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