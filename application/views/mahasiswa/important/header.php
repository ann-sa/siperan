<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="modal fade" id="keluar">
  <div class="modal-dialog modal-sm">
     <div class="modal-content">
        <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Konfirmasi Keluar</h4>
        </div>
          <div class="modal-body">
          <p>Anda yakin ingin keluar ?</p>
           <center><a href="<?php echo base_url(); ?>index.php/keluar" class="btn btn-danger"><i class="glyphicon glyphicon-ok"></i> Ya</a>
           <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
      </center>
      </div>
     </div>
  </div>
</div>
<header class="main-header">
    <!-- Logo -->
        <a href="<?php echo base_url(); ?>index.php/mahasiswa/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b><?php echo $namaweb; ?></b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><?php echo $namaweb; ?></b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
	  
	  <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>

      
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
<?php
	foreach ($data_user as $pengguna)
	{
?>
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $pengguna->LinkFoto ;?>" alt="User Image">
        </div>
        <div class="pull-left info">

			<p><?php echo $pengguna->Nama;?></p>
			<p><?php echo $pengguna->NIM ;?></p>

        </div>
      </div>
<?php }?>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li <?php if($judul=="utama")echo"class='active'";?>>
          <li <?php if($judul=="utama")echo"class='active'";?>>
            <a href="<?php echo base_url(); ?>index.php/Mahasiswa">
              <i class="fa fa-home"></i> <span>Awal</span>
            </a>
          </li>
          <li <?php if($judul=="lihatprofil")echo"class='active treeview'";elseif($judul=="editprofil")echo"class='active treeview'";elseif($judul=="gantipassword")echo"class='active treeview'";elseif($judul=="gantiemail")echo"class='active treeview'";?> class="treeview">
            <a href="#">
              <i class="glyphicon glyphicon-user"></i>
              <span>Akun</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li <?php if($judul=="lihatprofil") echo "class='active'";?>><a href="<?php echo base_url(); ?>index.php/mahasiswa/profil"><i class="glyphicon glyphicon-user"></i> Lihat Profil</a></li>
              <li <?php if($judul=="editprofil") echo "class='active'";?>><a href="<?php echo base_url(); ?>index.php/mahasiswa/editprofil"><i class="fa fa-edit"></i> Edit Profil</a></li>
              <li <?php if($judul=="gantipassword") echo "class='active'";?>><a href="<?php echo base_url(); ?>index.php/mahasiswa/gantipassword"><i class="fa fa-key"></i> Ganti Password</a></li>
            </ul>
          </li>
		  
		  
		<li <?php if($judul=="buat")echo"class='active'";?>>
          <a href="<?php echo base_url(); ?>index.php/mahasiswa/buat">
            <i class="glyphicon glyphicon-pencil"></i> <span>Buat Surat</span>
          </a>
        </li>
		
		
		<li <?php if($judul=="mysurat")echo"class='active'";?>>
          <a href="<?php echo base_url(); ?>index.php/mahasiswa/mysurat">
            <i class="glyphicon glyphicon-envelope"></i> <span>Surat Saya</span>
          </a>
        </li>
		
		
		
		
		<li <?php if($judul=="pemberitahuan")echo"class='active'";?>>
          <a href="<?php echo base_url(); ?>index.php/mahasiswa/pemberitahuan">
            <i class="fa fa-bell"></i> <span>Pemberitahuan</span>
          </a>
        </li>
		
		<li>
          <a data-toggle="modal" data-target="#keluar" href="#">
            <i class="glyphicon glyphicon-log-out"></i> <span>Keluar</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
