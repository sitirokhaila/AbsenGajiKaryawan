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
                <tr>
                    <td width="100px">Tanggal</td>
                    <td width="10px">:</td>
                    <td>
                        <?php
                            if($tglAwal == $tglAkhir) {
                                echo date('d F Y', strtotime($tglAwal));
                            } else {
                                echo date('d F Y', strtotime($tglAwal)) . ' s/d ' . date('d F Y', strtotime($tglAkhir));;
                            }
                        ?>
                    </td>
                </tr>
            </table> <br>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="10px">#</th>
                            <th>Nama Karyawan</th>
                            <th>Tanggal</th>
                            <th>Alpa</th>
                            <th>Terlambat</th>
                            <th>Nominal</th>
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
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="<?= base_url('assets') ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script>
            window.print();
        </script>
    </body>
</html>