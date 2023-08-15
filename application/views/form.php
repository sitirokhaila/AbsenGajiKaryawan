<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Daftar</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
            <?php foreach ($aplikasi->result_array() as $row) { ?>
                <a href="<?= base_url() ?>" class="navbar-brand"><b><?= $row['nama'] ?></b></a>
            <?php } ?>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="<?= base_url('index.php/home') ?>">
                <div class="fa fa-sign-in"></div> Login
              </a>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Konfirmasi Pembayaran
          <small>Isi sesuai form yang tersedia</small>
        </h1>
        <!-- <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Layout</a></li>
          <li class="active">Top Navigation</li>
        </ol> -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('pesan') ?>"></div>
        <div class="box box-default">
          <div class="box-header with-border">  
            <h4 class="box-title">Formulir Konfirmasi</h4>
          </div>
            <form action="<?= base_url('index.php/welcome/insert') ?>" method="POST">
                <div class="box-body">
                    <div class="form-group">
                        <label>Nama Santri</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama Santri" required>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                              <label>No. Telp</label>
                              <input type="number" name="telp" class="form-control" placeholder="No. Telp" required>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label>Kelas</label>
                              <input type="text" name="kelas" class="form-control" placeholder="Kelas" required>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label>Tanggal Transfer</label>
                              <input type="date" name="tglTf" class="form-control" required>
                          </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label>Jumlah Transfer</label>
                              <input type="number" name="jmlTf" class="form-control" placeholder="Jumlah Transfer" required>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label>Bukti</label>
                              <input type="file" name="bukti" class="form-control-file" required>
                          </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                              <label>Cicilan Biaya Awal Masuk</label>
                              <input type="number" name="awalMasuk" class="form-control" placeholder="Cicilan Biaya Awal Masuk">
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label>Biaya Syahriah/Bulanan</label>
                              <input type="number" name="bulanan" class="form-control" placeholder="Biaya Syahriah/Bulanan">
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label>Uang Jajan/Tabungan</label>
                              <input type="number" name="tabungan" class="form-control" placeholder="Uang Jajan/Tabungan">
                          </div>
                      </div>
                    </div>
                </div>
                <div class="box-footer">
                    <small><font color="red">NB : Pastikan semua data yang dimasukkan sudah benar sebelum menekan tombol konfirmasi!</font></small>
                    <button type="submit" class="btn btn-primary pull-right">
                        <div class="fa fa-send"></div> Konfirmasi
                    </button>
                </div>
            </form>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
        <div class="callout callout-danger">
          <h4>Tentang Kami!</h4>

          <p>
              <?php
                echo $row['nama'] . '<br>' . $row['telp'] . '<br>' . $row['email'] . '<br>' . $row['alamat'];
              ?>
          </p>
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
        <div class="pull-right hidden-xs">
        <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; <?= date('Y') ?> <a href="https://shopee.co.id/muhaidi7499" target="blank">Oscar Store</a>.</strong> All rights
        reserved.
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->

<!-- Sweet Alert -->
<script src="<?= base_url('assets') ?>/bower_components/sweetalert/sweetalert.min.js"></script>
<!-- jQuery 3 -->
<script src="<?= base_url('assets') ?>/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('assets') ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url('assets') ?>/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url('assets') ?>/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets') ?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets') ?>/dist/js/demo.js"></script>
<script>
  // Notifikasi
  const flashData = $('.flash-data').data('flashdata');
  if (flashData){
    swal({
      title: "Failed!",
      text: flashData,
      icon: "error",
    });
  }
</script>
</body>
</html>
