 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data User
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        
      </div>
     <div class="row">
       <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <a href="<?php echo $base_url; ?>Admin/tambah_user" class="btn btn-danger">+ Tambah User</a>
              <br>
              <br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="5%">No</th>
                  <th width="10%">Email</th>
                  <th width="30%">Berat Badan</th>
                  <th width="15%">Tinggi Badan</th>
                  <th width="15%">Tanggal Lahir</th>
                  <th width="20%">Jenis Kelamin</th>
                  <th width="15%">Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $nomor = 0;
                  foreach ($users as $row) {
                  
                  ?>
                <tr>
                  <td><?php echo $nomor=$nomor+1; ?></td>
                  <td><?php echo $row->email; ?></td>
                  <td><?php echo $row->berat_badan; ?></td>
                  <td><?php echo $row->tinggi_badan; ?></td>
                  <td><?php echo $row->tanggal_lahir; ?></td>
                  <td><?php echo $row->jenis_kelamin; ?></td>
                  <td> <?php echo "<a href=".$base_url."Admin/delete_user?id=$row->email class='btn btn-sm btn-warning'><i class='fa fa-trash'></i> Delete</a>"; ?>

                  <?php echo "<a href=".$base_url."Admin/edit_user?id=$row->email class='btn btn-sm btn-danger'><i class='fa fa-edit'></i> Edit</a>"; ?>  </td>
                    </td>
                </tr>
                <?php
                }
                ?>
                </tfoot>
              </table>
            </div>

   
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

<script type="text/javascript">
  function showDialog(string id){
    const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, cancel!',
  reverseButtons: true
}).then((result) => {
  if (result.value) {
    swalWithBootstrapButtons.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelled',
      'Your imaginary file is safe :)',
      'error'
    )
  }
})
  }
</script>