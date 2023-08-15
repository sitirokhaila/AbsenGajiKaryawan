<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title><?= $title ?></title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="<?= base_url('assets') ?>/bower_components/bootstrap/dist/css/bootstrap.min.css">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            <?php
                foreach ($this->db->get('tb_aplikasi')->result() as $dApl) {
                    echo '<center><b>' . $dApl->nama . '</b><br>' . $dApl->alamat . '<br> Telp : ' . $dApl->telp . ', Email : ' . $dApl->email . '</center>';
                }
            ?> <hr>

            <table>
                <?php foreach ($user->result_array() as $row) { ?>
                    <tr>
                        <td width="150px">Nama Lengkap</td>
                        <td width="10px">:</td>
                        <td><?= $row['nama'] ?></td>
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
                                foreach ($this->db->get('tb_cabang')->result() as $dCbng) {
                                    echo $dCbng->cabang;
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal Gajian</td>
                        <td>:</td>
                        <td>
                            <?php
                                foreach ($gajian->result() as $dGjn) {
                                    echo date('d F Y', strtotime($dGjn->tanggal));
                                }
                            ?>
                        </td>
                    </tr>
                <?php } ?>
            </table> <br>

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
                </table>
            </div>
            
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
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

            <table>
                <tr>
                    <td width="200px">Penambahan</td>
                    <td width="10px">:</td>
                    <td>Rp. 
                        <?php
                            foreach ($this->db->query('SELECT SUM(nominal) AS totalPenambahan FROM tb_kirimgaji WHERE idKriteria IN (SELECT id FROM tb_kriteria WHERE jenis="Penambahan") AND idGajian="'.$idGajian.'" ')->result() as $tPenam) {
                                echo number_format($tPenam->totalPenambahan,0,',','.');
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Pengurangan</td>
                    <td>:</td>
                    <td>Rp. 
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
                    </td>
                </tr>
                <tr>
                    <td>Total Terima Gaji</td>
                    <td>:</td>
                    <td><b>Rp. <?= number_format($tPenam->totalPenambahan - $tPot->totalPotongan - $potonganAlpa - $potonganTerlambat,0,',','.') ?></b></td>
                </tr>
            </table>
        </div>
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="<?= base_url('assets') ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script>
            window.print();
        </script>
    </body>
</html>