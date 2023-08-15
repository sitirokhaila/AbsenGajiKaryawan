<?php
   header("Content-type: application/vnd-ms-excel");
   header("Content-Disposition: attachment; filename=Export Absensi Karyawan.xls");
?>

<table>
    <thead>
        <tr>
            <th width="10px">#</th>
            <th>Shift</th>
            <th>Nama Karyawan</th>
            <th>Tanggal</th>
            <th>Jam Masuk</th>
            <th>Jam Pulang</th>
            <th>Lama Kerja</th>
            <th>Pekerjaan Hari Ini</th>
            <th>Lokasi Masuk</th>
            <th>Lokasi Pulang</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $no = 1;
            foreach ($absensi->result_array() as $row) {
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td>
                    <?php
                        $this->db->where('id', $row['idShift']);
                        foreach ($this->db->get('tb_shift')->result() as $dShi) {
                            echo $dShi->shift;
                        }
                    ?>
                </td>
                <td>
                    <?php
                        $this->db->where('id', $row['idUser']);
                        foreach ($this->db->get('tb_user')->result() as $dUsr) {
                            echo $dUsr->nama;
                        }
                    ?>
                </td>
                <td><?= date('d F Y', strtotime($row['tanggal'])) ?></td>
                <td><?= date('H:i:s', strtotime($row['jamMasuk'])) ?></td>
                <td>
                    <?php
                        if($row['jamPulang'] != '00:00:00') {
                            echo date('H:i:s', strtotime($row['jamPulang']));
                        } else {
                            echo '<div class="label label-danger">Belum Absen</div>';
                        }
                    ?>
                </td>
                <td><?= date('H:i:s', strtotime($row['lama'])) ?></td>
                <td><?= $row['urlMasuk'] ?></td>
                <td>
                    <?php if($row['jamPulang'] != '00:00:00') { ?>
                        <?= $row['urlMasuk'] ?>
                    <?php } else {
                        echo 'Belum Absen Pulang';
                    } ?>
                </td>
                <td><?= $row['status'] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>