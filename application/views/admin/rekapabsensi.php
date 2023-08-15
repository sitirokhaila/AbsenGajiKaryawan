<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Rekap Absensi Karyawan</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <?php
            date_default_timezone_set('Asia/Jayapura');
        ?>
    </head>
    <body>
        <div class="container">
            <h3><center><b>REKAP ABSENSI KARYAWAN</b></center></h3>

            <table>
                <tr>
                    <td width="70px">Tanggal</td>
                    <td width="10px">:</td>
                    <td>
                        <?php
                            if($dariTanggal == $sampaiTanggal) {
                                echo date('d F Y', strtotime($dariTanggal));
                            } else {
                                echo date('d F Y', strtotime($dariTanggal)) . ' s/d ' . date('d F Y', strtotime($sampaiTanggal));
                            }
                        ?>
                    </td>
                </tr>
            </table>

            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th width="10px">#</th>
                            <th>Karyawan</th>
                            <th>Masuk</th>
                            <th>Pulang</th>
                            <th>Lama Kerja</th>
                            <th>Terlambat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            foreach ($karyawan->result_array() as $row) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td>
                                    <?php
                                        echo $this->db->query('SELECT id FROM tb_absensi WHERE tanggal BETWEEN "'.$dariTanggal.'" AND "'.$sampaiTanggal.'" AND idUser="'.$row['id'].'" ')->num_rows();
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        echo $this->db->query('SELECT id FROM tb_absensi WHERE tanggal BETWEEN "'.$dariTanggal.'" AND "'.$sampaiTanggal.'" AND idUser="'.$row['id'].'" AND jamPulang="00:00:00" ')->num_rows();
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        $lamaKerja = $this->db->query('SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(lama))) AS lamaKerjanya FROM tb_absensi WHERE tanggal BETWEEN "'.$dariTanggal.'" AND "'.$sampaiTanggal.'" AND idUser="'.$row['id'].'" ');
                                        foreach ($lamaKerja->result() as $dLma) {
                                            echo $dLma->lamaKerjanya;
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        echo $this->db->query('SELECT id FROM tb_absensi WHERE tanggal BETWEEN "'.$dariTanggal.'" AND "'.$sampaiTanggal.'" AND idUser="'.$row['id'].'" AND status="Terlambat"')->num_rows();
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <font>
                <small><i><?= date('d F Y H:i:s') . ' - ' . $this->session->userdata('nama') ?></i></small>
            </font>
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script>
            window.print();
        </script>
    </body>
</html>