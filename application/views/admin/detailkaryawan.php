<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?= $title ?>
            <small><?= $subtitle ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('index.php/admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><?= $title ?></li>
        </ol>
    </section>
    <?php
        date_default_timezone_set('Asia/Jayapura');
    ?>
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="box">
                    <div class="box-header">
                        <button class="btn btn-primary" onclick="history.back(-1)">
                            <div class="fa fa-arrow-left"></div> Kembali
                        </button>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <?php foreach ($user->result_array() as $row) { ?>
                                    <tr>
                                        <td colspan="3">
                                            <center><img src="<?= base_url('assets/profil/').$row['foto'] ?>" class="img-responsive" width="50%"></center>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td width="10px">:</td>
                                        <td><?= $row['username'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Lengkap</td>
                                        <td>:</td>
                                        <td><?= $row['nama'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Telp</td>
                                        <td>:</td>
                                        <td><?= $row['telp'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>:</td>
                                        <td><?= $row['email'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Level</td>
                                        <td>:</td>
                                        <td><?= $row['level'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jabatan</td>
                                        <td>:</td>
                                        <td>
                                            <?php
                                                $this->db->where('id', $row['idJabatan']);
                                                foreach ($this->db->get('tb_jabatan')->result() as $dJbtn) {
                                                    echo $dJbtn->jabatan;
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Cabang</td>
                                        <td>:</td>
                                        <td>
                                            <?php
                                                $this->db->where('id', $row['idCabang']);
                                                foreach ($this->db->get('tb_cabang')->result() as $dCbn) {
                                                    echo $dCbn->cabang;
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Terdaftar</td>
                                        <td>:</td>
                                        <td><?= date('d F Y H:i:s', strtotime($row['terdaftar'])) ?></td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title">Grafik Keterlambatan (<?= date('Y') ?>)</h4>
                    </div>
                    <div class="box-body">
                        <div class="card-body"><canvas id="karyawan" width="100%" height="40"></canvas></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title">Daftar Kategori Gaji</h4>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable">
                                <thead>
                                    <tr>
                                        <th width="10px">#</th>
                                        <th>Kriteria Gaji</th>
                                        <th>Jenis</th>
                                        <th>Nominal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach ($gaji->result_array() as $gji) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td>
                                                <?php
                                                    $this->db->where('id', $gji['idKriteria']);
                                                    foreach ($this->db->get('tb_kriteria')->result() as $dKri) {
                                                        echo $dKri->kriteria;
                                                    }
                                                ?>
                                            </td>
                                            <td><?= $dKri->jenis ?></td>
                                            <td>Rp. <?= number_format($gji['nominal'],0,',','.') ?></td>
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
                    <div class="box-header">
                        <h4 class="box-title">Riwayat Gajian</h4>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable">
                                <thead>
                                    <tr>
                                        <th width="10px">#</th>
                                        <th>Tanggal</th>
                                        <th>Alpa</th>
                                        <th>Terlambat</th>
                                        <th>Nominal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach ($gajian->result_array() as $dGajian) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= date('d F Y', strtotime($dGajian['tanggal'])) ?></td>
                                            <td>
                                                <?php
                                                    $this->db->where('idGajian', $dGajian['id']);
                                                    $this->db->where('keterangan', 'Alpa');
                                                    foreach ($this->db->get('tb_kirimgaji')->result() as $dAlpa) {
                                                        $jumlahHarialpa = $dAlpa->nominal / 50000;
                                                        echo 'Rp. ' . number_format($dAlpa->nominal,0,',','.') . ' ('.$jumlahHarialpa.' Hari)';
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    $this->db->where('idGajian', $dGajian['id']);
                                                    $this->db->where('keterangan', 'Terlambat');
                                                    foreach ($this->db->get('tb_kirimgaji')->result() as $dTerlambat) {
                                                        $jumlahHariterlambat = $dTerlambat->nominal / 5000;
                                                        echo 'Rp. ' . number_format($dTerlambat->nominal,0,',','.') . ' ('.$jumlahHariterlambat.' Hari)';
                                                    }
                                                ?>
                                            </td>
                                            <td>Rp. 
                                                <?php
                                                    foreach ($this->db->query('SELECT SUM(nominal) AS totalPenambahan FROM tb_kirimgaji WHERE idKriteria IN (SELECT id FROM tb_kriteria WHERE jenis="Penambahan") AND idGajian="'.$dGajian['id'].'" ')->result() as $tPenam) {}

                                                    foreach ($this->db->query('SELECT SUM(nominal) AS totalPotongan FROM tb_kirimgaji WHERE idKriteria IN (SELECT id FROM tb_kriteria WHERE jenis="Potongan") AND idGajian="'.$dGajian['id'].'" ')->result() as $tPot) {}

                                                    echo number_format($tPenam->totalPenambahan - $tPot->totalPotongan - $dAlpa->nominal - $dTerlambat->nominal,0,',','.')
                                                ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('index.php/admin/gajian/detail/').$dGajian['id'].'/'.$dGajian['idKaryawan'] ?>" class="btn btn-info btn-xs">
                                                    <div class="fa fa-eye"></div> Detail
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
                    <div class="box-header">
                        <h4 class="box-title">Kinerja Absen (<?= date('Y') ?>)</h4>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover" id="dataTable">
                                <thead>
                                    <tr>
                                        <th width="10px">#</th>
                                        <th>Bulan/Tahun</th>
                                        <th>Kewajiban</th>
                                        <th>Total Absen</th>
                                        <th>Alpa</th>
                                        <th>Terlambat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach ($kewajiban->result_array() as $kAbs) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= date('F/Y', strtotime($kAbs['tahun'] . '-' . $kAbs['bulan'])) ?></td>
                                            <td><?= $kAbs['jumlah'] ?></td>
                                            <td>
                                                <?php
                                                    $this->db->where('idUser', $row['id']);
                                                    $this->db->where('MONTH(tanggal)', $kAbs['bulan']);
                                                    $this->db->where('YEAR(tanggal)', $kAbs['tahun']);
                                                    $jumlahAbsen = $this->db->get('tb_absensi')->num_rows();
                                                    echo $jumlahAbsen;
                                                ?>
                                            </td>
                                            <td><?= $kAbs['jumlah'] - $jumlahAbsen ?></td>
                                            <td>
                                                <?php
                                                    $this->db->where('idUser', $row['id']);
                                                    $this->db->where('status', 'Terlambat');
                                                    $this->db->where('MONTH(tanggal)', $kAbs['bulan']);
                                                    $this->db->where('YEAR(tanggal)', $kAbs['tahun']);
                                                    $jumlahTerlambat = $this->db->get('tb_absensi')->num_rows();
                                                    echo $jumlahTerlambat;                                                    
                                                ?>
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
        <div class="box">
            <div class="box-header">
                <h4 class="box-title">Riwayat Absen (<?= $absensi->num_rows() ?>)</h4>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped dataTable">
                        <thead>
                            <tr>
                                <th width="10px">#</th>
                                <th>Shift</th>
                                <th>Tanggal</th>
                                <th>Jam Masuk</th>
                                <th>Jam Pulang</th>
                                <th>Lama Kerja</th>
                                <th>Location</th>
                                <th>Foto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                foreach ($absensi->result_array() as $dAbs) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td>
                                        <?php
                                            $this->db->where('id', $dAbs['idShift']);
                                            foreach ($this->db->get('tb_shift')->result() as $dShi) {
                                                echo $dShi->shift;
                                            }
                                        ?>
                                    </td>
                                    <td><?= date('d F Y', strtotime($dAbs['tanggal'])) ?></td>
                                    <td>
                                        <?php
                                            echo date('H:i:s', strtotime($dAbs['jamMasuk']));
                                            if($dAbs['status'] == 'Terlambat') {
                                                echo ' | <div class="label label-danger">Terlambat</div>';
                                            } else {
                                                echo ' | <div class="label label-success">On Time</div>';
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if($dAbs['jamPulang'] != '00:00:00') {
                                                echo date('H:i:s', strtotime($dAbs['jamPulang']));
                                            } else {
                                                echo '<div class="label label-danger">Belum Absen</div>';
                                            }
                                        ?>
                                    </td>
                                    <td><?= date('H:i:s', strtotime($dAbs['lama'])) ?></td>
                                    <td>
                                        <a href="<?= $dAbs['urlMasuk'] ?>" class="btn btn-primary btn-xs" target="blank">
                                            <div class="fa fa-map-marker"></div> Lokasi Masuk
                                        </a>
                                        <?php if($dAbs['jamPulang'] != '00:00:00') { ?>
                                            <a href="<?= $dAbs['urlPulang'] ?>" class="btn btn-warning btn-xs" target="blank">
                                                <div class="fa fa-map-marker"></div> Lokasi Pulang
                                            </a>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('assets/gambar/').$dAbs['fotoMasuk'] ?>" class="btn btn-success btn-xs" target="blank">
                                            <div class="fa fa-image"></div> Foto Masuk
                                        </a>
                                        <?php if($dAbs['jamPulang'] != '00:00:00') { ?>
                                            <a href="<?= base_url('assets/gambar/').$dAbs['fotoPulang'] ?>" class="btn btn-info btn-xs" target="blank">
                                                <div class="fa fa-image"></div> Foto Pulang
                                            </a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>