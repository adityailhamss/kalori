 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ubah User
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">user</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
       <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
                  <?php 
                  $nomor = 0;
                  foreach ($user as $data) {
                  
                  ?>
                <form action="<?php echo $base_url; ?>User/submitedit" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Username :</label>
              <div class="controls">
                <input type="text" class="form-control" name="username" value="<?php echo $data->username; ?>" disabled placeholder="username" />
                <input type="hidden" name="username" value="<?php echo $data->username; ?>" />
                <input type="hidden" name="role" value="<?php echo $data->role; ?>" />
              </div>
            </div>
           
            <div class="control-group">
              <label class="control-label">Nama User :</label>
              <div class="controls">
                <input type="text" value="<?php echo $data->nama_user; ?>" class="form-control" name="nama" placeholder="Nama Pengguna" />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Jenis Kelamin :</label>
              <div class="controls">
                <select name="gender" class="form-control">
                  <option value="male" <?php if($data->gender == "male"){ echo 'selected';} ?>>Laki-laki</option> 
                  <option value="female" <?php if($data->gender == "female"){ echo 'selected';} ?>>Perempuan</option>
                </select>
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Alamat</label>
              <div class="controls">
                <textarea class="form-control" name="alamat" ><?php echo $data->alamat; ?></textarea>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">No Telp :</label>
              <div class="controls">
                <input type="text" value="<?php echo $data->no_telp; ?>" class="form-control" name="telp" placeholder="Ex : +6281xxxxx" />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">email :</label>
              <div class="controls">
                <input type="email" value="<?php echo $data->email; ?>" class="form-control" name="email" placeholder="Ex : your@yourmail.com" />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Password :</label>
              <div class="controls">
                <input type="Password" value="<?php echo $data->password; ?>" class="form-control" name="password" placeholder="Password" />
                <input type="hidden" value="<?php echo $data->id_user; ?>" name="id"/>

              </div>
            </div>

            <br>
            <br>
            <div class="form-actions">
              <button type="submit"  name="submit" value="Simpan" class="btn btn-success">Save</button>
        <input type="reset" name="reset" value="Reset" class="btn btn-danger"></center>
            </div>
          </form>
                <?php
                }
                ?>
              
            </div>
            <!-- /.box-body -->
          </div>
     </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->