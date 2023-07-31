
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">

  <header class="main-header"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
    
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Kalori</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
          <!-- Control Sidebar Toggle Button -->
          <li>
            
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          Kalori
        </div>
        <div class="pull-left info">
          <p>Admin</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li <?php if($page=="index"){ echo "class='active'"; } ?>>
          <a href="<?php echo $base_url; ?>Admin">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li <?php if($page=="record"){ echo "class='active'"; } ?>>
          <a href="<?php echo $base_url; ?>Admin/record">
            <i class="fa fa-university"></i> <span>Riwayat</span>
          </a>
        </li>
        <li <?php if($page=="users"){ echo "class='active'"; } ?>>
          <a href="<?php echo $base_url; ?>Admin/users">
            <i class="fa fa-user"></i> <span>User</span>
          </a>
        </li>
      
        <li>
          <a href="<?php echo $base_url; ?>Logout">
            <i class="fa fa-dashboard"></i> <span>Keluar</span>
          </a>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>