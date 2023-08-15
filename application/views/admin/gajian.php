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
        <div class="box">
            <?php if($this->session->userdata('level') == 'Administrator') { ?>
                <div class="box-header">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#rekapData">
                        <div class="fa fa-calendar"></div> Rekap Data
                    </button>
                </div>
            <?php } ?>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="dataTable">
                        <thead>
                            <tr>
                                <th width="10px">#</th>
                                <th>Nama Karyawan</th>
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
                                foreach ($gajian->result_array() as $row) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td>
                                        <?php
                                            $this->db->where('id', $row['idKaryawan']);
                                            foreach ($this->db->get('tb_user')->result() as $dUsr) {
                                                echo $dUsr->nama;
                                            }
                                        ?>
                                    </td>
                                    <td><?= date('d F Y', strtotime($row['tanggal'])) ?></td>
                                    <td>
                                        <?php
                                            $this->db->where('idGajian', $row['id']);
                                            $this->db->where('keterangan', 'Alpa');
                                            foreach ($this->db->get('tb_kirimgaji')->result() as $dAlpa) {
                                                $jumlahHarialpa = $dAlpa->nominal / 50000;
                                                echo 'Rp. ' . number_format($dAlpa->nominal,0,',','.') . ' ('.$jumlahHarialpa.' Hari)';
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            $this->db->where('idGajian', $row['id']);
                                            $this->db->where('keterangan', 'Terlambat');
                                            foreach ($this->db->get('tb_kirimgaji')->result() as $dTerlambat) {
                                                $jumlahHariterlambat = $dTerlambat->nominal / 5000;
                                                echo 'Rp. ' . number_format($dTerlambat->nominal,0,',','.') . ' ('.$jumlahHariterlambat.' Hari)';
                                            }
                                        ?>
                                    </td>
                                    <td>Rp. 
                                        <?php
                                            foreach ($this->db->query('SELECT SUM(nominal) AS totalPenambahan FROM tb_kirimgaji WHERE idKriteria IN (SELECT id FROM tb_kriteria WHERE jenis="Penambahan") AND idGajian="'.$row['id'].'" ')->result() as $tPenam) {}

                                            foreach ($this->db->query('SELECT SUM(nominal) AS totalPotongan FROM tb_kirimgaji WHERE idKriteria IN (SELECT id FROM tb_kriteria WHERE jenis="Potongan") AND idGajian="'.$row['id'].'" ')->result() as $tPot) {}

                                            echo number_format($tPenam->totalPenambahan - $tPot->totalPotongan - $dAlpa->nominal - $dTerlambat->nominal,0,',','.')
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('index.php/admin/gajian/cetak/').$row['id'].'/'.$row['idKaryawan'] ?>" class="btn btn-success btn-xs">
                                            <div class="fa fa-print"></div> Print
                                        </a>
                                        <a href="<?= base_url('index.php/admin/gajian/detail/').$row['id'].'/'.$row['idKaryawan'] ?>" class="btn btn-info btn-xs">
                                            <div class="fa fa-eye"></div> Detail
                                        </a>
                                        <?php if($this->session->userdata('level') == 'Administrator') { ?>
                                            <a href="<?= base_url('index.php/admin/gajian/delete/').$row['id'] ?>" class="btn btn-danger btn-xs tombol-yakin" data-isidata="Ingin menghapus data gajian ini?">
                                                <div class="fa fa-trash"></div> Delete
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

<!-- Modal Rekap Data -->
<div class="modal fade" id="rekapData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Rekap <?= $title ?></h4>
            </div>
            <form action="<?= base_url('index.php/admin/gajian/rekap') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Dari Tanggal</label>
                        <input type="date" name="dariTanggal" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Sampai Tanggal</label>
                        <input type="date" name="sampaiTanggal" class="form-control" required>
                    </div>
                    <font color="red">
                        <small><i>NB : Direkap berdasarkan tanggal gajian karyawan!</i></small>
                    </font>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger">
                        <div class="fa fa-undo"></div> Reset
                    </button>
                    <button type="submit" name="rekap" class="btn btn-primary">
                        <div class="fa fa-print"></div> Rekap
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>