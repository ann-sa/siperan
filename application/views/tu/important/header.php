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
    <a href="<?php echo base_url(); ?>index.php/TU/" class="logo">
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


<?php
	foreach ($data_user as $pengguna)
	{
    $level=$pengguna->level;
?>
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>assets/file/tu/foto_profil/<?php echo $pengguna->foto_profil ;?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">

			<p><?php echo $pengguna->Nama ;?></p>
			<p><?php echo $pengguna->NIP ;?></p>

        </div>
      </div>
<?php }?>



      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li <?php if($judul=="awal")echo"class='active'";?>>
          <a href="<?php echo base_url(); ?>index.php/TU">
            <i class="fa fa-home"></i> <span>Awal</span>
          </a>
        </li>
        <?php if($this->session->userdata('Level') == "biasa") {?>
		<li <?php if($judul=="baru")echo"class='active'";?>>
          <a href="<?php echo base_url(); ?>index.php/TU/baru/baru">
            <i class="glyphicon glyphicon-pencil"></i> <span>Surat Baru</span>
          </a>
        </li>
      <?php } ?>

		<li <?php if($judul=="surat_keluar")echo"class='active'";?>>
          <a href="<?php echo base_url(); ?>index.php/TU/surat_keluar">
            <i class="glyphicon glyphicon-envelope"></i> <span>Surat Keluar</span>
          </a>
        </li>

		<li <?php if($judul=="surat_masuk")echo"class='active'";?>>
          <a href="<?php echo base_url(); ?>index.php/TU/surat_masuk">
            <i class="glyphicon glyphicon-envelope"></i> <span>Surat Masuk</span>
          </a>
        </li>
            <li <?php if($judul=="surat_disposisi")echo"class='active'";?>>
              <a href="<?php echo base_url(); ?>index.php/TU/surat_disposisi">
                <i class="glyphicon glyphicon-envelope"></i> Surat Disposisi</a>
        </li>

		<li <?php if($judul=="lihat_arsip")echo"class='active'";?>>
          <a href="<?php echo base_url(); ?>index.php/TU/lihat_arsip">
            <i class="fa fa-folder-open"></i> <span>Arsip</span>
          </a>
        </li>

		<li <?php if($judul=="suratmahasiswa")echo"class='active'";?>>
          <a href="<?php echo base_url(); ?>index.php/TU/suratmahasiswa">
            <i class="fa fa-envelope-o"></i> <span>Surat Mahasiswa</span>
          </a>
        </li>



		<li class="treeview <?php if($judul=="pengaturan")echo"active";?>" >
          <a href="#">
            <i class="glyphicon glyphicon-cog"></i>
            <span>Pengaturan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            <li <?php if(isset($atur)) echo $atur=="akun"? "class='active'" : "";?>><a href="<?php echo base_url(); ?>index.php/TU/akun"><i class="glyphicon glyphicon-user"></i> Akun</a></li>
      <?php if($level=="super"){?>
      <li <?php if(isset($atur)) echo $atur=="infofakultas"? "class='active'" : "";?>><a href="<?php echo base_url(); ?>index.php/TU/infofakultas"><i class="glyphicon glyphicon-education"></i> Info Fakultas</a></li>
            <li <?php if(isset($atur)) echo $atur=="layout"? "class='active'" : "";?>><a href="<?php echo base_url(); ?>index.php/TU/layout"><i class="glyphicon glyphicon-list-alt"></i> Layout Surat Keluar</a></li>
      <li <?php if(isset($atur)) echo $atur=="layout_mhs"? "class='active'" : "";?>><a href="<?php echo base_url(); ?>index.php/TU/layout_mhs"><i class="glyphicon glyphicon-list-alt"></i> Layout Surat Mahasiswa</a></li>
      <li <?php if(isset($atur)) echo $atur=="atasnama"? "class='active'" : "";?>><a href="<?php echo base_url(); ?>index.php/TU/atasnama/lihat"><i class="fa fa-tag"></i> Atas Nama</a></li>
      <li <?php if(isset($atur)) echo $atur=="pegawaiTU"? "class='active'" : "";?>><a href="<?php echo base_url(); ?>index.php/TU/pegawaiTU"><i class="fa fa-group"></i> Pegawai TU</a></li>
      <li <?php if(isset($atur)) echo $atur=="lihat_log"? "class='active'" : "";?>><a href="<?php echo base_url(); ?>index.php/TU/lihat_log"><i class="glyphicon glyphicon-time"></i> Log</a></li>
    <?php } ?>
          </ul>
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
