 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php if($aksi == "edit"){ echo "Edit";}else{ echo "Tambah"; } ?> Users
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
       <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Users</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              <form action=" <?php if($aksi == 'edit'){ echo $base_url.'Admin/update_user';}else{ echo  $base_url.'Admin/simpan_user' ; } ?>" method="post" class="form-horizontal">

            
            <div class="control-group">
              <label class="control-label">Email :</label>
              <div class="controls">
                <input type="email" class="form-control" name="email"  <?php if($aksi == "edit"){ echo "value='$users->email'"; echo "disabled";} ?> placeholder="Email" />

                <input type="hidden" class="form-control" name="id"  <?php if($aksi == "edit"){ echo "value='$users->email'";} ?> />
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Jenis Kelamin :</label>
              <div class="controls">
                <Select name="jenis_kelamin" class="form_control">
                    <option value="Laki-laki" <?php if($aksi == "edit" && $users->jenis_kelamin == "Laki-laki"){ echo "selected";} ?>>Laki-laki</option>
                    <option value="Perempuan" <?php if($aksi == "edit" && $users->jenis_kelamin == "Perempuan"){ echo "selected";} ?>>Perempuan</option>
                </Select>
              </div>
            </div>


            <div class="control-group">
              <label class="control-label">Umur :</label>
              <div class="controls">
                <input type="number" class="form-control" name="umur"  <?php if($aksi == "edit"){ echo "value='$users->umur'";} ?> placeholder="Umur" />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Berat Badan :</label>
              <div class="controls">
                <input type="number" class="form-control" name="berat_badan"  <?php if($aksi == "edit"){ echo "value='$users->berat_badan'";} ?> placeholder="Berat Badan" />
              </div>
            </div>

           <div class="control-group">
              <label class="control-label">Tinggi Badan :</label>
              <div class="controls">
                <input type="number" class="form-control" name="tinggi_badan"  <?php if($aksi == "edit"){ echo "value='$users->tinggi_badan'";} ?> placeholder="Tinggi Badan" />
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Level Aktivitas :</label>
              <div class="controls">
                <Select name="level_aktivitas" class="form_control">
                    <option value="1.2" <?php if($aksi == "edit" && $users->nilai_aktivitas == "1.2"){ echo "selected";} ?>>Tanpa Olahraga</option>
                    <option value="1.375" <?php if($aksi == "edit" && $users->nilai_aktivitas == "1.375"){ echo "selected";} ?>>Olahraga 1-3 hari/minggu</option>
                    <option value="1.55" <?php if($aksi == "edit" && $users->nilai_aktivitas == "1.55"){ echo "selected";} ?>>Olahraga 3-5 hari/minggu</option>
                    <option value="1.725" <?php if($aksi == "edit" && $users->nilai_aktivitas == "1.725"){ echo "selected";} ?>>Olahraga 6-7 hari/minggu</option>
                    <option value="1.9" <?php if($aksi == "edit" && $users->nilai_aktivitas == "1.9"){ echo "selected";} ?>>Olahraga berat dan pekerja fisik</option>
                </Select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Password :</label>
              <div class="controls">
                <input type="password" class="form-control" name="password"  <?php if($aksi == "edit"){ echo "value='$users->password'";} ?> placeholder="Kata Sandi" />
              </div>
            </div>
            <br>
            <br>
            <div class="form-actions">
              <button type="submit"  name="submit" value="Simpan" class="btn btn-success">Save</button>
        <input type="reset" name="reset" value="Reset" class="btn btn-danger"></center>
            </div>
          </form>
               
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