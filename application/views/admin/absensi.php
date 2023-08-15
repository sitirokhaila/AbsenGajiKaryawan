<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?= $title ?>
            <small> <?= $subtitle ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('index.php/admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><?= $title ?></li>
        </ol>
    </section>
    <section class="content">
        <?php if($this->session->userdata('level') == 'Karyawan') { ?>
            <?php
                date_default_timezone_set('Asia/Jayapura');
                $this->db->where('idUser', $this->session->userdata('id'));
                $this->db->where('tanggal', date('Y-m-d'));
                $this->db->where('status !=', 'Izin');
                $hariIni = $this->db->get('tb_absensi');
                foreach ($hariIni->result() as $dAbs) { }

                $this->db->where('idUser', $this->session->userdata('id'));
                $this->db->where('tanggal', date('Y-m-d'));
                $this->db->where('status', 'Izin');
                $IzinHariini = $this->db->get('tb_absensi');
                foreach ($IzinHariini->result() as $dZn) { }
            ?>
            <div class="row">
                <?php if(empty($hariIni->num_rows()) AND empty($IzinHariini->num_rows())) { ?>
                    <div class="col-lg-6 col-xs-12">
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>
                                    Absen Izin
                                </h3>

                                <p>
                                    Belum Absen
                                </p>
                            </div>
                            <div class="icon">
                                <div class="fa fa-sign-in"></div>
                            </div>
                            <a href="#" class="small-box-footer" data-toggle="modal" data-target="#izin">
                                Absen Sekarang <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xs-12">
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>
                                    Absen Masuk
                                </h3>

                                <p>
                                    <?php if(empty($hariIni->num_rows())) { ?>
                                        Belum Absen
                                    <?php } else { ?>
                                        <?= date('d F Y H:i:s', strtotime($dAbs->tanggal . $dAbs->jamMasuk)) ?>
                                    <?php } ?>
                                </p>
                            </div>
                            <div class="icon">
                                <div class="fa fa-sign-in"></div>
                            </div>
                            <?php if(!empty($hariIni->num_rows())) { ?>
                                <a href="<?= base_url('index.php/admin/absensi/cekmasuk') ?>" class="small-box-footer">
                                    Absen Sekarang <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            <?php } else { ?>
                                <a href="#" class="small-box-footer" data-toggle="modal" data-target="#masuk">
                                    Absen Sekarang <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if(empty($hariIni->num_rows()) AND !empty($IzinHariini->num_rows())) { ?>
                    <div class="col-lg-6 col-xs-12">
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>
                                    Absen Izin
                                </h3>

                                <p>
                                    <?= date('d F Y H:i:s', strtotime($dZn->tanggal . $dZn->jamMasuk)) ?>
                                </p>
                            </div>
                            <div class="icon">
                                <div class="fa fa-sign-in"></div>
                            </div>
                            <a href="<?= base_url('index.php/admin/absensi/cekizin') ?>" class="small-box-footer">
                                Absen Sekarang <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                <?php } ?>
                <?php if(!empty($hariIni->num_rows()) AND empty($IzinHariini->num_rows())) { ?>
                    <div class="col-lg-6 col-xs-12">
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>
                                    Absen Masuk
                                </h3>

                                <p>
                                    <?php if(empty($hariIni->num_rows())) { ?>
                                        Belum Absen
                                    <?php } else { ?>
                                        <?= date('d F Y H:i:s', strtotime($dAbs->tanggal . $dAbs->jamMasuk)) ?>
                                    <?php } ?>
                                </p>
                            </div>
                            <div class="icon">
                                <div class="fa fa-sign-in"></div>
                            </div>
                            <?php if(!empty($hariIni->num_rows())) { ?>
                                <a href="<?= base_url('index.php/admin/absensi/cekmasuk') ?>" class="small-box-footer">
                                    Absen Sekarang <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            <?php } else { ?>
                                <a href="#" class="small-box-footer" data-toggle="modal" data-target="#masuk">
                                    Absen Sekarang <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if(!empty($hariIni->num_rows())) { ?>
                    <div class="col-lg-6 col-xs-12">
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3>
                                    Absen Pulang
                                </h3>

                                <p>
                                    <?php if(empty($hariIni->num_rows())) { ?>
                                        Belum Absen
                                    <?php } else { ?>
                                        <?php
                                            if($dAbs->jamPulang == '00:00:00') {
                                                echo 'Belum Absen';
                                            } else {
                                                echo date('d F Y H:i:s', strtotime($dAbs->tanggal . $dAbs->jamPulang));
                                            }
                                        ?>
                                    <?php } ?>
                                </p>
                            </div>
                            <div class="icon">
                                <div class="fa fa-sign-out"></div>
                            </div>
                            <?php
                                $this->db->where('id', $dAbs->idShift);
                                foreach ($this->db->get('tb_shift')->result() as $dShift) {
                                    if($dShift->jamPulang < date('H:i:s')) {
                            ?>
                                <?php if(empty($hariIni->num_rows())) { ?>
                                    <a href="<?= base_url('index.php/admin/absensi/cekpulang') ?>" class="small-box-footer">
                                        Absen Sekarang <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                <?php } else { ?>
                                    <?php if($dAbs->jamPulang == '00:00:00') { ?>
                                        <a href="#" class="small-box-footer" data-toggle="modal" data-target="#pulang">
                                            Absen Sekarang <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    <?php } else { ?>
                                        <a href="<?= base_url('index.php/admin/absensi/selesai') ?>" class="small-box-footer">
                                            Absen Sekarang <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    <?php } ?>
                                <?php } ?>
                            <?php } else { ?>
                                <a href="<?= base_url('index.php/admin/absensi/belumwaktunya') ?>" class="small-box-footer">
                                    Absen Sekarang <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            <?php } } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
        <div class="box">
            <?php if($this->session->userdata('level') == 'Administrator') { ?>
                <div class="box-header">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#filterData">
                        <div class="fa fa-calendar"></div> Filter Data
                    </button>
                    <button class="btn btn-success" data-toggle="modal" data-target="#rekapData">
                        <div class="fa fa-book"></div> Rekap Data
                    </button>
                </div>
            <?php } ?>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped" id="dataTable">
                        <thead>
                            <tr>
                                <th width="10px">#</th>
                                <th>Shift</th>
                                <th>Nama Karyawan</th>
                                <th>Tanggal</th>
                                <th>Jam Masuk</th>
                                <th>Jam Pulang</th>
                                <th>Lama Kerja</th>
                                <th>Location</th>
                                <th>Foto</th>
                                <?php if($this->session->userdata('level') == 'Administrator') { ?>
                                    <th>Aksi</th>
                                <?php } ?>
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
                                    <td>
                                        <?php
                                            echo date('H:i:s', strtotime($row['jamMasuk']));
                                            if($row['status'] == 'Terlambat') {
                                                echo ' | <div class="label label-danger">Terlambat</div>';
                                            } elseif($row['status'] == 'On Time'){
                                                echo ' | <div class="label label-success">On Time</div>';
                                            } else {
                                                echo ' | <div class="label label-warning">Izin</div>';
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if($row['status'] != 'Izin') {
                                                if($row['jamPulang'] != '00:00:00') {
                                                    echo date('H:i:s', strtotime($row['jamPulang']));
                                                } else {
                                                    echo '<div class="label label-danger">Belum Absen</div>';
                                                }
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if($row['status'] != 'Izin') {
                                                echo date('H:i:s', strtotime($row['lama']));
                                            }
                                        ?>
                                    <td>
                                        <?php if($row['status'] != 'Izin') { ?>
                                            <a href="<?= $row['urlMasuk'] ?>" class="btn btn-primary btn-xs" target="blank">
                                                <div class="fa fa-map-marker"></div> Lokasi Masuk
                                            </a>
                                            <?php if($row['jamPulang'] != '00:00:00') { ?>
                                                <a href="<?= $row['urlPulang'] ?>" class="btn btn-warning btn-xs" target="blank">
                                                    <div class="fa fa-map-marker"></div> Lokasi Pulang
                                                </a>
                                            <?php } ?>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('assets/gambar/').$row['fotoMasuk'] ?>" class="btn btn-success btn-xs" target="blank">
                                            <div class="fa fa-<?= ($row['status'] == 'Izin') ? 'book' : 'image' ?>"></div> <?= ($row['status'] == 'Izin') ? 'Lampiran' : 'Foto Masuk' ?>
                                        </a>
                                        <?php if($row['jamPulang'] != '00:00:00') { ?>
                                            <a href="<?= base_url('assets/gambar/').$row['fotoPulang'] ?>" class="btn btn-info btn-xs" target="blank">
                                                <div class="fa fa-image"></div> Foto Pulang
                                            </a>
                                        <?php } ?>
                                    </td>
                                    <?php if($this->session->userdata('level') == 'Administrator') { ?>
                                        <td>
                                        
                                            <a href="<?= base_url('index.php/admin/absensi/delete/').$row['id'] ?>" class="btn btn-danger btn-xs tombol-yakin" data-isidata="Ingin menghapus data absen ini?">
                                                <div class="fa fa-trash"></div> Delete
                                            </a>
                                        </td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    function getLocationConstant() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(onGeoSuccess, onGeoError);
        } else {
            alert("Your browser or device doesn't support Geolocation");
        }
    }

    // If we have a successful location update
    function onGeoSuccess(event) {
        document.getElementById("LatitudeMasuk").value = event.coords.latitude;
        document.getElementById("LongitudeMasuk").value = event.coords.longitude;
        document.getElementById("LatitudePulang").value = event.coords.latitude;
        document.getElementById("LongitudePulang").value = event.coords.longitude;
        document.getElementById("Position1").value = event.coords.latitude + ", " + event.coords.longitude;
    }
    

    // If something has gone wrong with the geolocation request
    function onGeoError(event) {
        alert("Error code " + event.code + ". " + event.message);
    }
</script>

<!-- Modal masuk -->
<div class="modal fade" id="masuk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Absen Masuk</h4>
            </div>
            <form action="<?= base_url('index.php/admin/absensi/masuk') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Shift</label>
                        <select name="idShift" class="form-control" required>
                            <option value="" disabled selected> -- Pilih Shift -- </option>
                            <?php foreach ($shift->result() as $iShi) { ?>
                                <option value="<?= $iShi->id ?>"><?= $iShi->shift . ' (' . date('H:i:s', strtotime($iShi->jamMasuk)). ' s/d '.date('H:i:s', strtotime($iShi->jamPulang)).')' . ' - ' . $iShi->status ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="foto" class="form-control-file" accept="image/*" capture="camera" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Latitude</label>
                                <input type="text" name="latitude" class="form-control" id="LatitudeMasuk" required readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Longitude</label>
                                <input type="text" name="longitude" class="form-control" id="LongitudeMasuk" required readonly>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-warning btn-xs" onclick="getLocationConstant()">
                        <div class="fa fa-map-marker"></div> Get Location
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger"><div class="fa fa-undo"></div> Reset</button>
                    <button type="submit" class="btn btn-primary"><div class="fa fa-save"></div> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Pulang -->
<div class="modal fade" id="pulang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Absen Pulang</h4>
            </div>
            <form action="<?= base_url('index.php/admin/absensi/pulang/').$dAbs->id ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="foto" class="form-control-file" accept="image/*" capture="camera" required>
                        <input type="hidden" name="jamMasuk" class="form-control" value="<?= $dAbs->jamMasuk ?>">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Latitude</label>
                                <input type="text" name="latitude" class="form-control" id="LatitudePulang" required readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Longitude</label>
                                <input type="text" name="longitude" class="form-control" id="LongitudePulang" required readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-warning btn-xs" onclick="getLocationConstant()">
                            <div class="fa fa-map-marker"></div> Get Location
                        </button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger"><div class="fa fa-undo"></div> Reset</button>
                    <button type="submit" class="btn btn-primary"><div class="fa fa-save"></div> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Izin -->
<div class="modal fade" id="izin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Absen Izin</h4>
            </div>
            <form action="<?= base_url('index.php/admin/absensi/izin') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Lampiran</label>
                        <input type="file" name="foto" class="form-control-file" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger"><div class="fa fa-undo"></div> Reset</button>
                    <button type="submit" class="btn btn-primary"><div class="fa fa-save"></div> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Filter Data -->
<div class="modal fade" id="filterData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Filter Absensi Karyawan</h4>
            </div>
            <form action="<?= base_url('index.php/admin/absensi/filter') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Karyawan</label>
                        <select name="idUser" class="select2" style="width: 100%" required>
                            <option value="" selected disabled> -- Pilih Nama Karyawan -- </option>
                            <?php foreach ($karyawan->result() as $dKrywn) { ?>
                                <option value="<?= $dKrywn->id ?>"><?= $dKrywn->username . ' - ' . $dKrywn->nama ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger">
                        <div class="fa fa-undo"></div> Reset
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <div class="fa fa-save"></div> Filter
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Rekap Data -->
<div class="modal fade" id="rekapData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Rekap Absensi Karyawan</h4>
            </div>
            <form action="<?= base_url('index.php/admin/absensi/rekap') ?>" method="POST" target="blank">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Dari Tanggal</label>
                        <input type="date" name="dariTanggal" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Sampai Tanggal</label>
                        <input type="date" name="sampaiTanggal" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger">
                        <div class="fa fa-undo"></div> Reset
                    </button>
                    <button type="submit" name="excel" class="btn btn-success">
                        <div class="fa fa-file-excel-o"></div> Export Excel
                    </button>
                    <button type="submit" name="rekap" class="btn btn-primary">
                        <div class="fa fa-book"></div> Rekap
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>