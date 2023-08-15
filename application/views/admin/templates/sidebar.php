  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url('assets') ?>/profil/<?= $this->session->userdata('foto') ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $this->session->userdata('nama') ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
          <li>
            <a href="<?= base_url('index.php/admin/dashboard') ?>">
              <i class="fa fa-tachometer"></i> <span>Dashboard</span>
            </a>
          </li>
          <?php if($this->session->userdata('level') == 'Administrator') { ?>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-columns"></i> <span>Data Master</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?= base_url('index.php/admin/cabang') ?>"><i class="fa fa-circle-o"></i> Data Cabang</a></li>
                <li><a href="<?= base_url('index.php/admin/jabatan') ?>"><i class="fa fa-circle-o"></i> Data Jabatan</a></li>
                <li><a href="<?= base_url('index.php/admin/shift') ?>"><i class="fa fa-circle-o"></i> Data Shift</a></li>
                <li><a href="<?= base_url('index.php/admin/kewajiban') ?>"><i class="fa fa-circle-o"></i> Data Kewajiban Absen</a></li>
              </ul>
            </li>
          <?php } ?>
          <li>
            <a href="<?= base_url('index.php/admin/absensi') ?>">
              <i class="fa fa-edit"></i> <span>Data Absensi</span>
            </a>
          </li>
          <?php if($this->session->userdata('level') == 'Karyawan') { ?>
            <li>
              <a href="<?= base_url('index.php/admin/gajian') ?>">
                <i class="fa fa-envelope"></i> <span>Data Gaji Saya</span>
              </a>
            </li>
          <?php } ?>
          <?php if($this->session->userdata('level') == 'Administrator') { ?>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-book"></i> <span>Data Gaji</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?= base_url('index.php/admin/kriteria') ?>"><i class="fa fa-circle-o"></i> Kriteria Gaji</a></li>
                <li><a href="<?= base_url('index.php/admin/gaji') ?>"><i class="fa fa-circle-o"></i> Perhitungan Gaji</a></li>
                <li><a href="<?= base_url('index.php/admin/gajian') ?>"><i class="fa fa-circle-o"></i> Data Gajian</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-cogs"></i> <span>Pengaturan</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?= base_url('index.php/admin/user') ?>"><i class="fa fa-circle-o"></i> Manajemen User</a></li>
                <li><a href="<?= base_url('index.php/admin/aplikasi') ?>"><i class="fa fa-circle-o"></i> Tentang Aplikasi</a></li>
              </ul>
            </li>
          <?php } ?>
          <li>
            <a href="<?= base_url('index.php/admin/profil') ?>">
              <i class="fa fa-user"></i> <span>Profil</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url('index.php/home/logout') ?>" class="tombol-yakin" data-isidata="Ingin keluar dari sistem ini?">
              <i class="fa fa-sign-out"></i> <span>Sign Out</span>
            </a>
          </li>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->