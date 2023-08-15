<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control Panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('index.php/admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Home</li>
        </ol>
    </section>
    <?php
        date_default_timezone_set('Asia/Jayapura');
    ?>
    <section class="content">
        <?php if($this->session->userdata('level') == "Administrator") { ?>
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>
                                <?php
                                    echo $this->db->query('SELECT id FROM tb_cabang')->num_rows();
                                ?>
                            </h3>

                            <p>Total Cabang</p>
                        </div>
                        <div class="icon">
                            <div class="fa fa-calendar"></div>
                        </div>
                        <a href="<?= base_url('index.php/admin/cabang') ?>" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-blue">
                        <div class="inner">
                            <h3>
                                <?php
                                    echo $this->db->query('SELECT id FROM tb_jabatan')->num_rows();
                                ?>
                            </h3>

                            <p>Total Jabatan</p>
                        </div>
                        <div class="icon">
                            <div class="fa fa-edit"></div>
                        </div>
                        <a href="<?= base_url('index.php/admin/jabatan') ?>" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-purple">
                        <div class="inner">
                            <h3>
                                <?php
                                    echo $this->db->query('SELECT id FROM tb_shift')->num_rows();
                                ?>
                            </h3>

                            <p>Total Shift</p>
                        </div>
                        <div class="icon">
                            <div class="fa fa-android"></div>
                        </div>
                        <a href="<?= base_url('index.php/admin/shift') ?>" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-maroon">
                        <div class="inner">
                            <h3>
                                <?php
                                    echo $this->db->query('SELECT id FROM tb_kriteria')->num_rows();
                                ?>
                            </h3>

                            <p>Total Kriteria Gaji</p>
                        </div>
                        <div class="icon">
                            <div class="fa fa-book"></div>
                        </div>
                        <a href="<?= base_url('index.php/admin/kriteria') ?>" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-teal">
                        <div class="inner">
                            <h3>
                                <?php
                                    echo $this->db->query('SELECT id FROM tb_absensi')->num_rows();
                                ?>
                            </h3>

                            <p>Total Absensi</p>
                        </div>
                        <div class="icon">
                            <div class="fa fa-bookmark-o"></div>
                        </div>
                        <a href="<?= base_url('index.php/admin/absensi') ?>" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-navy">
                        <div class="inner">
                            <h3>
                                <?php
                                    echo $this->db->query('SELECT id FROM tb_absensi WHERE status="Izin"')->num_rows();
                                ?>
                            </h3>

                            <p>Total Izin</p>
                        </div>
                        <div class="icon">
                            <div class="fa fa-history"></div>
                        </div>
                        <a href="<?= base_url('index.php/admin/absensi') ?>" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>
                                <?php
                                    echo $this->db->query('SELECT id FROM tb_user WHERE level="Karyawan"')->num_rows();
                                ?>
                            </h3>

                            <p>Total Karyawan</p>
                        </div>
                        <div class="icon">
                            <div class="fa fa-user"></div>
                        </div>
                        <a href="<?= base_url('index.php/admin/user') ?>" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>
                                <?php
                                    echo $this->db->query('SELECT id FROM tb_user WHERE level="Administrator"')->num_rows();
                                ?>
                            </h3>

                            <p>Total Administrator</p>
                        </div>
                        <div class="icon">
                            <div class="fa fa-users"></div>
                        </div>
                        <a href="<?= base_url('index.php/admin/user') ?>" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Belum Absen Hari Ini</h4>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped dataTable">
                                    <thead>
                                        <th width="10px">#</th>
                                        <th>Username/ID</th>
                                        <th>Nama Karyawan</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $noBlm = 1;
                                            $belumAbsen = $this->db->query('SELECT * FROM tb_user WHERE id NOT IN (SELECT idUser FROM tb_absensi WHERE tanggal="'.date('Y-m-d').'") AND level="Karyawan" ');
                                            foreach ($belumAbsen->result() as $dBlm) {
                                        ?>
                                            <tr>
                                                <td><?= $noBlm++ ?></td>
                                                <td><?= $dBlm->username ?></td>
                                                <td><?= $dBlm->nama ?></td>
                                                <td>
                                                    <a href="<?= base_url('index.php/admin/dashboard/filterkaryawan/').$dBlm->id ?>" class="btn btn-primary btn-xs">
                                                        <div class="fa fa-eye"></div> View
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Sudah Absen Masuk Hari Ini</h4>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped dataTable">
                                    <thead>
                                        <th width="10px">#</th>
                                        <th>Username/ID</th>
                                        <th>Nama Karyawan</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $noSdh = 1;
                                            $sudahAbsen = $this->db->query('SELECT * FROM tb_user WHERE id IN (SELECT idUser FROM tb_absensi WHERE tanggal="'.date('Y-m-d').'") AND level="Karyawan" ');
                                            foreach ($sudahAbsen->result() as $dSdh) {
                                        ?>
                                            <tr>
                                                <td><?= $noSdh++ ?></td>
                                                <td><?= $dSdh->username ?></td>
                                                <td><?= $dSdh->nama ?></td>
                                                <td>
                                                    <a href="<?= base_url('index.php/admin/dashboard/filterkaryawan/').$dSdh->id ?>" class="btn btn-primary btn-xs">
                                                        <div class="fa fa-eye"></div> View
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Belum Absen Pulang Hari Ini</h4>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped dataTable">
                                    <thead>
                                        <th width="10px">#</th>
                                        <th>Username/ID</th>
                                        <th>Nama Karyawan</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $noBlmPlng = 1;
                                            $belumPulang = $this->db->query('SELECT * FROM tb_absensi WHERE jamPulang="00:00:00" AND tanggal="'.date('Y-m-d').'"');
                                            foreach ($belumPulang->result() as $blmPlng) {
                                        ?>
                                            <tr>
                                                <td><?= $noBlmPlng++ ?></td>
                                                <?php
                                                    $this->db->where('id', $blmPlng->idUser);
                                                    foreach ($this->db->get('tb_user')->result() as $dKrywn) {
                                                ?>
                                                    <td><?= $dKrywn->username ?></td>
                                                    <td><?= $dKrywn->nama ?></td>
                                                <?php } ?>
                                                <td>
                                                    <a href="<?= base_url('index.php/admin/dashboard/filterkaryawan/').$blmPlng->idUser ?>" class="btn btn-primary btn-xs">
                                                        <div class="fa fa-eye"></div> View
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="row">
                <div class="col-lg-3 col-xs-12">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>
                                <?php
                                    echo $this->db->query('SELECT id FROM tb_absensi WHERE idUser="'.$this->session->userdata('id').'"')->num_rows();
                                ?>
                            </h3>

                            <p>Total Absensi Saya</p>
                        </div>
                        <div class="icon">
                            <div class="fa fa-android"></div>
                        </div>
                        <a href="<?= base_url('index.php/admin/absensi') ?>" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                    <div class="small-box bg-blue">
                        <div class="inner">
                            <h3>
                                <?php
                                    echo $this->db->query('SELECT id FROM tb_absensi WHERE idUser="'.$this->session->userdata('id').'" AND MONTH(tanggal)="'.date('m').'" AND YEAR(tanggal)="'.date('Y').'" ')->num_rows();
                                ?>
                            </h3>

                            <p>Total Absensi Bulan Ini (<?= date('F Y') ?>)</p>
                        </div>
                        <div class="icon">
                            <div class="fa fa-book"></div>
                        </div>
                        <a href="<?= base_url('index.php/admin/absensi') ?>" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>
                                <?php
                                    echo $this->db->query('SELECT id FROM tb_absensi WHERE idUser="'.$this->session->userdata('id').'" AND MONTH(tanggal)="'.date('m').'" AND YEAR(tanggal)="'.date('Y').'" AND status="Terlambat"')->num_rows();
                                ?>
                            </h3>

                            <p>Terlambat Bulan Ini (<?= date('F Y') ?>)</p>
                        </div>
                        <div class="icon">
                            <div class="fa fa-pencil"></div>
                        </div>
                        <a href="<?= base_url('index.php/admin/absensi') ?>" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                    <div class="small-box bg-purple">
                        <div class="inner">
                            <h3>
                                <?php
                                    echo $this->db->query('SELECT id FROM tb_absensi WHERE idUser="'.$this->session->userdata('id').'" AND MONTH(tanggal)="'.date('m').'" AND YEAR(tanggal)="'.date('Y').'" AND status="Izin"')->num_rows();
                                ?>
                            </h3>

                            <p>Izin Bulan Ini (<?= date('F Y') ?>)</p>
                        </div>
                        <div class="icon">
                            <div class="fa fa-bookmark"></div>
                        </div>
                        <a href="<?= base_url('index.php/admin/absensi') ?>" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-9 col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">Grafik Keterlambatan (<?= date('Y') ?>)</h4>
                        </div>
                        <div class="box-body">
                            <div class="card-body"><canvas id="karyawan" width="100%" height="30"></canvas></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </section>
</div>