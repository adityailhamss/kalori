 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Kalori User
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Record</li>
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
              
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="5%">No</th>
                  <th width="20%">Email</th>
                  <th width="10%">Tanggal</th>
                  <th width="10%">Jumlah Kalori</th>
                  
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $nomor = 0;
                  foreach ($record as $row) {
                  
                  ?>
                <tr>
                  <td><?php echo $nomor=$nomor+1; ?></td>
                  <td><?php echo $row->id_user; ?></td>
                  <td><?php echo $row->tanggal; ?></td>
                  <td><?php echo $row->jumlah_kalori; ?></td>
              
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