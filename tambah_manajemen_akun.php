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

        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Tambah User</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="proses_manajemen_akun.php" method = "post" name="formbarang">
                  <div class="card-body">


                    <div class="form-group">
                      <label for="Nama">Nama</label>
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama ">
                    </div>
                    <div class="form-group">
                      <label for="Jabatan">Jabatan</label>
                      <select class="form-control" name="jabatan" id="jabatan">
                        <option value="staff">Staff</option>
                        <option value="kepagu">Kepala Gudang</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="Email">Email</label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    
                    <div class="form-group">
                      <label for="Username">Username</label>
                      <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <label for="Password">Password</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" id= "submit" name = "submit" class="btn btn-primary">Submit</button>
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