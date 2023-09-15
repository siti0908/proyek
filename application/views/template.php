<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Informasi Manajemen Matakuliah Proyek | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/jvectormap/jquery-jvectormap.css">

  <link rel="stylesheet" href="<?= base_url(); ?>assets/datepicker/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/datepicker/bootstrap-datetimepicker.min.css">
  <script src="<?= base_url(); ?>assets/datepicker/bootstrap-datepicker.min.js"></script>
  <script src="<?= base_url(); ?>assets/datepicker/bootstrap-datetimepicker.min.js"></script>
  <script src="<?= base_url(); ?>assets/datepicker/bootstrap-datetimepicker.id.js"></script>
  <link rel="icon" href="<?php echo base_url()?>assets/dist/img/1.png" type="image/gif">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-yellow sidebar-mini">
<div class="wrapper">

  <header class="main-header bg-yellow">
    <a href="index2.html" class="logo">
      <span class="logo-mini"><b>M</b>I</span>
      <span class="logo-lg"><b>Proyek</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url()?>assets/dist/img/polpos.jpeg" class="user-image" alt="User Image">
              <span class="hidden-xs">Sistem Informasi Manajemen Matakuliah Proyek</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url()?>assets/dist/img/polpos.jpeg" class="img-circle" alt="User Image">

                <p>
                  Politeknik Pos Indonesia - Proyek
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="<?php echo site_url()?>/login/logout" class="btn btn-danger btn-flat">Logout</a>
                </div>
              </li>
            </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user Koordinator Proyek -->
      <?php if ($_SESSION['hak_akses'] == 'K'){
      ?>
      <div class="user-panel ">
        <div class="pull-left image">
          <img src="<?php echo base_url()?>assets/dist/img/polpos.jpeg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$_SESSION['nama_lengkap']?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
       <?php
         }
         ?>

  <!-- Sidebar user Kaprodi -->
      <?php if ($_SESSION['hak_akses'] == 'P'){
      ?>
      <div class="user-panel ">
        <div class="pull-left image">
          <img src="<?php echo base_url()?>assets/dist/img/polpos.jpeg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$_SESSION['nama_lengkap']?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
       <?php
       }
       ?>

      <!-- Sidebar user Mahasiswa -->
      <?php if ($_SESSION['hak_akses'] == 'M'){
      ?>
      <div class="user-panel ">
        <div class="pull-left image">
          <img src="<?php echo base_url()?>assets/dist/img/polpos.jpeg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$_SESSION['nama_lengkap']?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
       <?php
         }
         ?>

      <!-- Sidebar user Dosen -->
      <?php if ($_SESSION['hak_akses'] == 'D'){
      ?>
      <div class="user-panel ">
        <div class="pull-left image">
          <img src="<?php echo base_url()?>assets/dist/img/polpos.jpeg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$_SESSION['nama_lengkap']?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
       <?php
         }
         ?>

      <!-- Sidebar user Mahasiswa -->
      <?php if ($_SESSION['hak_akses'] == 'S'){
      ?>
      <div class="user-panel ">
        <div class="pull-left image">
          <img src="<?php echo base_url()?>assets/dist/img/polpos.jpeg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$_SESSION['nama_lengkap']?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
       <?php
         }
         ?>

      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU UTAMA</li>
        <li class="active">
          <a href="<?php echo site_url()?>/dashboard">
            <i class="glyphicon glyphicon-home"></i> <span>Dashboard</span>
          </a>
        </li>

           <!-- Menu User-->
          <?php if ($_SESSION['hak_akses'] == 'K'){
          ?>
         <li>
          <!--   <li class="active"> -->
          <a href="<?php echo site_url()?>/User">
            <i class="glyphicon glyphicon-user"></i>
            <span>Kelola User</span>
          </a>
        </li>
         <?php
         }
         ?>
        <!-- End Menu User-->

        <!-- Menu Jadwal-->
          <li>     
          <a href="<?php echo site_url()?>/Timeline">
            <i class="fa fa-calendar"></i>
            <span>Timeline</span>
          </a>
        </li>
       
           <!-- End Menu Jawal-->
        <!-- Menu Kelola Data-->
         <?php if ($_SESSION['hak_akses'] == 'K'){
        ?>
        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-list-alt"></i> <span>Kelola Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo site_url()?>/Dosen"><i class="fa fa-circle-o"></i>Dosen</a></li>
             <li class="active"><a href="<?php echo site_url()?>/Penguji"><i class="fa fa-circle-o"></i>Penguji</a></li>
            <li class="active"><a href="<?php echo site_url()?>/Mahasiswa"><i class="fa fa-circle-o"></i>Mahasiswa</a></li>
          </ul>
           <?php
        }
        ?>
           <!-- End Menu kelola data-->

         <!-- Menu Plotting Pembimbing-->
        <?php if ($_SESSION['hak_akses'] == 'K' or $_SESSION['hak_akses'] == 'M' or $_SESSION['hak_akses'] == 'D' or $_SESSION['hak_akses'] == 'P'){
        ?>
         <li>     
          <a href="<?php echo site_url()?>/Plotting_Pembimbing">
            <i class="fa fa-group"></i>
            <span>Plotting Pembimbing</span>
          </a>
        </li>
        <?php
        }
        ?>
        <!-- End Menu Plotting Pembimbing-->
        
         <!-- Menu Pembekalan-->
        <?php if ($_SESSION['hak_akses'] == 'K' or $_SESSION['hak_akses'] == 'M' or $_SESSION['hak_akses'] == 'D'){
        ?>  
         <li>
          <a href="<?php echo site_url()?>/Pembekalan">
            <i class="fa fa-newspaper-o"></i>
            <span>Pembekalan</span>
          </a>
        </li>
        <?php
        }
        ?>
        <!-- End Menu Pembekalan-->


        <!-- Menu Bimbingan2-->
        <?php if ($_SESSION['hak_akses'] == 'M' or $_SESSION['hak_akses'] == 'D'){
        ?>  
        <li>
          <a href="<?php echo site_url()?>/Bimbingan">
            <i class="fa fa-pencil-square-o"></i>
            <span>Bimbingan</span>
          </a>    
        </li>
         <?php
        }
        ?>
        <!-- End Menu Bimbingan-->
       <?php if ($_SESSION['hak_akses'] == 'K' or $_SESSION['hak_akses'] == 'M' or $_SESSION['hak_akses'] == 'D' or $_SESSION['hak_akses'] == 'P'){
        ?>
        <li>
          <a href="<?php echo site_url()?>/Sidang">
            <i class="fa fa-book"></i>
            <span>Kelola Sidang</span>
          </a>
        </li>
        <?php
        }
        ?>
       <!-- Menu pengumpulan-->  
       <?php if ($_SESSION['hak_akses'] == 'K' or $_SESSION['hak_akses'] == 'M' or $_SESSION['hak_akses'] == 'D' or $_SESSION['hak_akses'] == 'P'){
        ?>
        <li>
          <a href="<?php echo site_url()?>/Pengumpulan">
            <i class="fa fa-folder-open"></i>
            <span>Pengumpulan</span>
          </a>
        </li>
        <?php
        }
        ?>
        <!-- End Menu pengumpulan-->
       <!-- Menu Dokumen Akhir-->  

        <li>
          <a href="<?php echo site_url()?>/Dokumen_Akhir">
            <i class="glyphicon glyphicon-book"></i>
            <span>Dokumen Akhir</span>
          </a>
        </li>

        <!-- End Menu Bimbingan-->
      </ul>
        <!-- Menu Dokumen Akhir-->  

    <!--     <li>
          <a href="<?php echo site_url()?>/laporan_kelulusan">
            <i class="fa fa-book"></i>
            <span>laporan Kelulusan</span>
          </a>
        </li> 
 -->
        <!-- End Menu Bimbingan-->

    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-white">
    <!-- Content Header (Page header) -->
    <section class="content-header bg-white">

    </section>

    <!-- Main content -->
    <section class="content">
      
    <?php $this->load->view($page); ?>  

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.18
    </div>
    <strong>Copyright &copy; 2022-2023 <a href="https://ulbi.ac.id">Politeknik Pos Indonesia</a>.</strong> All rights
    reserved.
  </footer>


<!-- jQuery 3 -->
<script src="<?php echo base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url()?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url()?>assets/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url()?>assets/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url()?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url()?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url()?>assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url()?>assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url()?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<!-- <script src="<?php echo base_url()?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script> -->
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url()?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url()?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url()?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url()?>assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->

<script src="<?php echo base_url()?>assets/dist/js/demo.js"></script>
<script src="<?php echo base_url()?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
</body>
</html>
