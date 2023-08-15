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
    <section class="content">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box bg-green">
                    <span class="info-box-icon"><i class="fa fa-pencil"></i></span>

                    <div class="info-box-content">
                    <span class="info-box-text">Penambahan</span>
                    <span class="info-box-number">Rp. 
                        <?php
                            foreach ($this->db->query('SELECT SUM(nominal) AS totalPenambahan FROM tb_kirimgaji WHERE idKriteria IN (SELECT id FROM tb_kriteria WHERE jenis="Penambahan") AND idGajian="'.$idGajian.'" ')->result() as $tPenam) {
                                echo number_format($tPenam->totalPenambahan,0,',','.');
                            }
                        ?>
                    </span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                        <span class="progress-description">
                            
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box bg-red">
                    <span class="info-box-icon"><i class="fa fa-close"></i></span>

                    <div class="info-box-content">
                    <span class="info-box-text">Potongan</span>
                    <span class="info-box-number">Rp. 
                        <?php
                            foreach ($this->db->query('SELECT SUM(nominal) AS totalPotongan FROM tb_kirimgaji WHERE idKriteria IN (SELECT id FROM tb_kriteria WHERE jenis="Potongan") AND idGajian="'.$idGajian.'" ')->result() as $tPot) {}

                            $this->db->where('idGajian', $idGajian);
                            $this->db->where('keterangan', 'Terlambat');
                            foreach ($this->db->get('tb_kirimgaji')->result() as $dTerlambat) {
                                $potonganTerlambat = $dTerlambat->nominal;
                            }

                            $this->db->where('idGajian', $idGajian);
                            $this->db->where('keterangan', 'Alpa');
                            foreach ($this->db->get('tb_kirimgaji')->result() as $dAlpa) {
                                $potonganAlpa = $dAlpa->nominal;
                                echo number_format($tPot->totalPotongan + $potonganAlpa + $potonganTerlambat,0,',','.');
                            }
                        ?>
                    </span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                        <span class="progress-description">
                            
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box bg-teal">
                    <span class="info-box-icon"><i class="fa fa-envelope"></i></span>

                    <div class="info-box-content">
                    <span class="info-box-text">Total Terima Gaji</span>
                    <span class="info-box-number">Rp. 
                        <?= number_format($tPenam->totalPenambahan - $tPot->totalPotongan - $potonganAlpa - $potonganTerlambat,0,',','.') ?>
                    </span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                        <span class="progress-description">
                            Penambahan - Potongan
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="box">
                    <div class="box-header">
                        <button class="btn btn-primary" onclick="history.back(-1)">
                            <div class="fa fa-arrow-left"></div> Kembali
                        </button>
                        <a href="<?= base_url('index.php/admin/gajian/cetak/').$idGajian.'/'.$idKaryawan ?>" class="btn btn-success">
                            <div class="fa fa-print"></div> Print
                        </a>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <?php foreach ($user->result_array() as $row) { ?>
                                    <tr>
                                        <td>Username</td>
                                        <td>:</td>
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
                                        <td>Terdaftar</td>
                                        <td>:</td>
                                        <td><?= date('d F Y H:i', strtotime($row['terdaftar'])) ?></td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title">Rincian Gaji</h4>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable">
                                <thead>
                                    <tr>
                                        <th width="10px">#</th>
                                        <th>Potongan</th>
                                        <th>Nominal</th>
                                        <th>Hari</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach ($pengurangangaji->result_array() as $gji) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $gji['keterangan'] ?></td>
                                            <td>Rp. <?= number_format($gji['nominal'],0,',','.') ?></td>
                                            <td>
                                                <?php
                                                    if($gji['keterangan'] == 'Alpa') {
                                                        echo $gji['nominal'] / 50000;
                                                    } else {
                                                        echo $gji['nominal'] / 5000;
                                                    }
                                                ?> Hari
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table> <br>
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
                                        foreach ($kirimgaji->result_array() as $gji) {
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
        </div>
    </section>
</div>