<html>
<header>
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
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
            <section class="content">
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">DataTable with minimal features & hover style</h3>
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
                <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <td>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><a class="btn btn-info btn-sm" href="#">
                    <i class="fas fa-pencil-alt"></i>
                    Edit</a>
                <a class="btn btn-danger btn-sm" href="#">
                    <i class="fas fa-trash">
                    </i>
                    Delete</a>
                </td>               
              
                </tr>
            
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