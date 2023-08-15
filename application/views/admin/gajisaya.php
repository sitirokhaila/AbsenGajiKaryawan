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
                            foreach ($this->db->query('SELECT SUM(nominal) AS totalPenambahan FROM tb_gaji WHERE idKriteria IN (SELECT id FROM tb_kriteria WHERE jenis="Penambahan") AND idKaryawan="'.$this->session->userdata('id').'" ')->result() as $tPenam) {
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
                            foreach ($this->db->query('SELECT SUM(nominal) AS totalPotongan FROM tb_gaji WHERE idKriteria IN (SELECT id FROM tb_kriteria WHERE jenis="Potongan") AND idKaryawan="'.$this->session->userdata('id').'" ')->result() as $tPot) {
                                echo number_format($tPot->totalPotongan,0,',','.');
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
                        <?= number_format($tPenam->totalPenambahan - $tPot->totalPotongan,0,',','.') ?>
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
        <div class="box">
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="dataTable">
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
    </section>
</div>