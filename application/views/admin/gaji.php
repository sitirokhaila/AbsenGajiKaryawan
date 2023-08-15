<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?= $title ?>
            <small><?= $subtitle ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('index.php/admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
            </li>
            <li class="active"><?= $title ?></li>
        </ol>
    </section>
    <?php
        date_default_timezone_set('Asia/Jayapura');
    ?>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="dataTable">
                        <thead>
                            <tr>
                                <th width="10px">#</th>
                                <th>Nama Lengkap</th>
                                <th>Jabatan</th>
                                <th>Cabang</th>
                                <th>Penambahan</th>
                                <th>Potongan</th>
                                <th>Alpa</th>
                                <th>Terlambat</th>
                                <th>Total Terima Gaji</th>
                                <th>Gajian Terakhir</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                foreach ($user->result_array() as $row) {
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td>
                                    <?php
                                            $this->db->where('id', $row['idJabatan']);
                                            foreach ($this->db->get('tb_jabatan')->result() as $dJbtn) {
                                                echo $dJbtn->jabatan;
                                            }
                                        ?>
                                </td>
                                <td>
                                    <?php
                                            $this->db->where('id', $row['idCabang']);
                                            foreach ($this->db->get('tb_cabang')->result() as $dCbn) {
                                                echo $dCbn->cabang;
                                            }
                                        ?>
                                </td>
                                <td>Rp.
                                    <?php
                                            foreach ($this->db->query('SELECT SUM(nominal) AS totalPenambahan FROM tb_gaji WHERE idKriteria IN (SELECT id FROM tb_kriteria WHERE jenis="Penambahan") AND idKaryawan="'.$row['id'].'" ')->result() as $tPenam) {
                                                echo number_format((float)$tPenam->totalPenambahan,0,',','.');
                                            }
                                        ?>
                                </td>
                                <td>Rp.
                                    <?php
                                            foreach ($this->db->query('SELECT SUM(nominal) AS totalPotongan FROM tb_gaji WHERE idKriteria IN (SELECT id FROM tb_kriteria WHERE jenis="Potongan") AND idKaryawan="'.$row['id'].'" ')->result() as $tPot) {
                                                echo number_format((float)$tPot->totalPotongan,0,',','.');
                                            }
                                        ?>
                                </td>
                                <td>
                                    <?php
                                            $this->db->where('bulan', date('m'));
                                            $this->db->where('tahun', date('Y'));
                                            if(empty($this->db->get('tb_kewajiban')->num_rows())) {
                                                $biayaAlpa = 0;
                                                echo '<div class="label label-danger">Belum Disetting</div>';
                                            } else {
                                                $this->db->where('bulan', date('m'));
                                                $this->db->where('tahun', date('Y'));
                                                foreach ($this->db->get('tb_kewajiban')->result() as $dKjw) {
                                                    $jumlahKewajiban = $dKjw->jumlah;
                                                    $totalAbsen = $this->db->query('SELECT id FROM tb_absensi WHERE MONTH(tanggal)="'.date('m').'" AND YEAR(tanggal)="'.date('Y').'" AND idUser="'.$row['id'].'"');
                                                    $jumlahAlpa = $jumlahKewajiban - $totalAbsen->num_rows();
                                                    $biayaAlpa  = $jumlahAlpa * 25000;
                                                    echo 'Rp. ' . number_format($biayaAlpa,0,',','.') . ' (' . $jumlahAlpa . ' Hari)';
                                                }
                                            }
                                        ?>
                                </td>
                                <td>
                                    <?php
                                            $terlambat = $this->db->query('SELECT id FROM tb_absensi WHERE MONTH(tanggal)="'.date('m').'" AND YEAR(tanggal)="'.date('Y').'" AND idUser="'.$row['id'].'" AND status="Terlambat"');
                                            $biayaTerlambat = $terlambat->num_rows() * 5000;
                                            echo 'Rp. ' . number_format($biayaTerlambat,0,',','.') . ' ('.$terlambat->num_rows().' Hari)';
                                        ?>
                                </td>
                                <td>Rp.
                                    <?= number_format($tPenam->totalPenambahan - $tPot->totalPotongan - $biayaTerlambat - $biayaAlpa,0,',','.') ?>
                                </td>
                                <td>
                                    <?php
                                            $this->db->where('idKaryawan', $row['id']);
                                            $jumlahGajian   = $this->db->get('tb_gajian');
                                            if(empty($jumlahGajian->num_rows())) {
                                                echo '<div class="label label-danger">Belum Pernah Gajian</div>';
                                            } else {
                                                $this->db->where('idKaryawan', $row['id']);
                                                $this->db->order_by('id', 'DESC');
                                                $this->db->limit('1');
                                                foreach ($this->db->get('tb_gajian')->result() as $dTgl) {
                                                    echo date('d F Y', strtotime($dTgl->tanggal));
                                                }
                                            }
                                        ?>
                                </td>
                                <td>
                                    <button class="btn btn-primary btn-xs" data-toggle="modal"
                                        data-target="#kirimGaji<?= $row['id'] ?>">
                                        <div class="fa fa-send"></div> Kirim Gaji
                                    </button>
                                    <a href="<?= base_url('index.php/admin/gaji/setting/').$row['id'] ?>"
                                        class="btn btn-success btn-xs">
                                        <div class="fa fa-gear"></div> Setting
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

<!-- Modal Edit Data -->
<?php foreach ($user->result() as $kirim) { ?>
<div class="modal fade" id="kirimGaji<?= $kirim->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Kirim Gaji Karyawan</h4>
            </div>
            <form action="<?= base_url('index.php/admin/gaji/kirimgaji/').$kirim->id ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" placeholder="Tanggal" required>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th width="10px">#</th>
                                <th>Kriteria Gaji</th>
                                <th>Jenis</th>
                                <th>Nominal</th>
                                <th>Terdaftar</th>
                            </tr>
                            <?php
                                    $this->db->where('idKaryawan', $kirim->id);
                                    foreach ($this->db->get('tb_gaji')->result_array() as $kGji) {
                                ?>
                            <tr>
                                <td>
                                    <input type="checkbox" name="idGaji[]" value="<?= $kGji['id'] ?>">
                                </td>
                                <td>
                                    <?php
                                                $this->db->where('id', $kGji['idKriteria']);
                                                foreach ($this->db->get('tb_kriteria')->result() as $dKri) {
                                                    echo $dKri->kriteria;
                                                }
                                            ?>
                                </td>
                                <td><?= $dKri->jenis ?></td>
                                <td>Rp. <?= number_format($kGji['nominal'],0,',','.') ?></td>
                                <td><?= date('d F Y H:i', strtotime($kGji['terdaftar'])) ?></td>
                            </tr>
                            <?php } ?>
                        </table>
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th width="10px">#</th>
                                <th>Kriteria Gaji</th>
                                <th>Nominal</th>
                                <th>Hari</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Alpa</td>
                                <?php
                                        $this->db->where('bulan', date('m'));
                                        $this->db->where('tahun', date('Y'));
                                        if(empty($this->db->get('tb_kewajiban')->num_rows())) {
                                            $biayaAlpa = 0;
                                            echo '<div class="label label-danger">Belum Disetting</div>';
                                        } else {
                                            $this->db->where('bulan', date('m'));
                                            $this->db->where('tahun', date('Y'));
                                            foreach ($this->db->get('tb_kewajiban')->result() as $dKjw) {
                                                $jumlahKewajiban = $dKjw->jumlah;
                                                $totalAbsen = $this->db->query('SELECT id FROM tb_absensi WHERE MONTH(tanggal)="'.date('m').'" AND YEAR(tanggal)="'.date('Y').'" AND idUser="'.$kirim->id.'"');
                                                $jumlahAlpa = $jumlahKewajiban - $totalAbsen->num_rows();
                                                $biayaAlpa  = $jumlahAlpa * 25000;
                                    ?>
                                <td>Rp. <?= number_format($biayaAlpa,0,',','.') ?></td>
                                <td><?= $jumlahAlpa ?></td>
                                <?php } } ?>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Terlambat</td>
                                <?php
                                        $terlambat = $this->db->query('SELECT id FROM tb_absensi WHERE MONTH(tanggal)="'.date('m').'" AND YEAR(tanggal)="'.date('Y').'" AND idUser="'.$kirim->id.'" AND status="Terlambat"');
                                        $biayaTerlambat = $terlambat->num_rows() * 5000;
                                    ?>
                                <td>Rp. <?= number_format($biayaTerlambat,0,',','.') ?></td>
                                <td><?= $terlambat->num_rows() ?></td>
                            </tr>
                        </table>
                        <font color="red">
                            <small>NB : Alpa dan Terlambat akan dihitung otomatis berdasarkan bulan dan tahun pada
                                tanggal yang dipilih ketika klik <b>save</b>!</small>
                        </font>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger">
                        <div class="fa fa-trash"></div> Reset
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <div class="fa fa-save"></div> Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>