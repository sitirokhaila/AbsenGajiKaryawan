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
                                <?php foreach ($cabang->result_array() as $row) {?>
                                    <tr>
                                        <td>Nama Cabang</td>
                                        <td>:</td>
                                        <td><?= $row['cabang'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Karyawan</td>
                                        <td>:</td>
                                        <td>
                                            <?php
                                                $this->db->where('idCabang', $row['id']);
                                                $this->db->where('level !=', 'Administrator');
                                                echo $this->db->get('tb_user')->num_rows();
                                            ?>
                                        </td>
                                    </tr>
                                        <td>Terdaftar</td>
                                        <td>:</td>
                                        <td><?= date('d M Y H:i:s', strtotime($row['terdaftar'])) ?></td>
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
                        <div class="card-body"><canvas id="cabang" width="100%" height="20"></canvas></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title">Terlambat (<?= date('F Y') . ' - ' . $terlambat->num_rows() ?> Karyawan)</h4>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable">
                                <thead>
                                    <tr>
                                        <th width="10px">#</th>
                                        <th>Nama Lengkap</th>
                                        <th>Jabatan</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach ($terlambat->result_array() as $dTlbt) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td>
                                                <?php
                                                    $this->db->where('id', $dTlbt['idUser']);
                                                    foreach ($this->db->get('tb_user')->result() as $usr) {
                                                        echo $usr->nama;
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    $this->db->where('id', $usr->idJabatan);
                                                    foreach ($this->db->get('tb_jabatan')->result() as $terJbtn) {
                                                        echo $terJbtn->jabatan;
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    $this->db->where('idUSer', $dTlbt['idUser']);
                                                    $this->db->where('status', 'Terlambat');
                                                    $this->db->where('MONTH(tanggal)', date('m'));
                                                    $this->db->where('YEAR(tanggal)', date('Y'));
                                                    echo $this->db->get('tb_absensi')->num_rows();
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
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title">Tidak Hadir (<?= date('d F Y') . ' - ' . $tidakhadir->num_rows() ?> Karyawan)</h4>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable">
                                <thead>
                                    <tr>
                                        <th width="10px">#</th>
                                        <th>Nama Lengkap</th>
                                        <th>Jabatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach ($tidakhadir->result_array() as $tHdr) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $tHdr['nama'] ?></td>
                                            <td>
                                                <?php
                                                    $this->db->where('id', $tHdr['idJabatan']);
                                                    foreach ($this->db->get('tb_jabatan')->result() as $tJbtn) {
                                                        echo $tJbtn->jabatan;
                                                    }
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
                <h4 class="box-title">Daftar Karyawan</h4>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable">
                        <thead>
                            <tr>
                                <th width="10px">#</th>
                                <th width="10px">Foto</th>
                                <th>Username</th>
                                <th>Nama Lengkap</th>
                                <th>Telp</th>
                                <th>Email</th>
                                <th>Sebagai</th>
                                <th>Jabatan</th>
                                <th>Terdaftar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                foreach ($user->result_array() as $dKryn) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><img src="<?= base_url('assets/profil/').$dKryn['foto'] ?>" class="img-responsive" width="100%"></td>
                                    <td><?= $dKryn['username'] ?></td>
                                    <td><?= $dKryn['nama'] ?></td>
                                    <td><?= $dKryn['telp'] ?></td>
                                    <td><?= $dKryn['email'] ?></td>
                                    <td><?= $dKryn['level'] ?></td>
                                    <td>
                                        <?php
                                            $this->db->where('id', $dKryn['idJabatan']);
                                            foreach ($this->db->get('tb_jabatan')->result() as $dJbtn) {
                                                echo $dJbtn->jabatan;
                                            }
                                        ?>
                                    </td>
                                    <td><?= date('d F Y H:i:s', strtotime($dKryn['terdaftar'])) ?></td>
                                    <td>
                                        <a href="<?= base_url('index.php/admin/user/detail/').$dKryn['id'] ?>" class="btn btn-info btn-xs">
                                            <div class="fa fa-history"></div> Detail
                                        </a>
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