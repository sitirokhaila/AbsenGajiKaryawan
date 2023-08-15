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
            <div class="col-md-4">
                <div class="box">
                    <div class="box-header">
                        <button class="btn btn-primary" onclick="history.back(-1)">
                            <div class="fa fa-arrow-left"></div> Kembali
                        </button>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <?php foreach ($user->result_array() as $row) { ?>
                                    <tr>
                                        <td>Username</td>
                                        <td width="10px">:</td>
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
                                                foreach ($this->db->get('tb_cabang')->result() as $dCbn) {
                                                    echo $dCbn->cabang;
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Terdaftar</td>
                                        <td>:</td>
                                        <td><?= date('d F Y H:i:s', strtotime($row['terdaftar'])) ?></td>
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
                        <button class="btn btn-primary" data-toggle="modal" data-target="#tambahData">
                            <div class="fa fa-plus"></div> Tambah Data
                        </button>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover" id="dataTable">
                                <thead>
                                    <tr>
                                        <th width="10px">#</th>
                                        <th>Kriteria Gaji</th>
                                        <th>Jenis</th>
                                        <th>Nominal</th>
                                        <th>Terdaftar</th>
                                        <th>Aksi</th>
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
                                            <td><?= date('d F Y H:i', strtotime($gji['terdaftar'])) ?></td>
                                            <td>
                                                <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editData<?= $gji['id'] ?>">
                                                    <div class="fa fa-edit"></div> Edit
                                                </button>
                                                <a href="<?= base_url('index.php/admin/gaji/delete/').$gji['id'].'/'.$row['id'] ?>" class="btn btn-danger btn-xs tombol-yakin" data-isidata="Ingin manghapus data ini?">
                                                    <div class="fa fa-trash"></div> Delete
                                                </a>
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
    </section>
</div>

<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Tambah <?= $title ?></h4>
            </div>
            <form action="<?= base_url('index.php/admin/gaji/insert/').$row['id'] ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kriteria Gaji</label>
                        <select name="idKriteria" class="select2" style="width: 100%" required>
                            <option value="" disabled selected> -- Pilih Kriteria Gaji -- </option>
                            <?php foreach ($kriteria->result() as $iKri) { ?>
                                <option value="<?= $iKri->id ?>"><?= $iKri->kriteria . ' - ' . $iKri->jenis ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nominal</label>
                        <input type="number" name="nominal" class="form-control" placeholder="Nominal" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger"><div class="fa fa-trash"></div> Reset</button>
                    <button type="submit" class="btn btn-primary"><div class="fa fa-save"></div> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Data -->
<?php foreach ($gaji->result() as $edit) { ?>
    <div class="modal fade" id="editData<?= $edit->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit <?= $title ?></h4>
                </div>
                <form action="<?= base_url('index.php/admin/gaji/update/').$row['id'].'/'.$edit->id ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nominal</label>
                            <input type="number" name="nominal" class="form-control" value="<?= $edit->nominal ?>" placeholder="Nominal" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger"><div class="fa fa-trash"></div> Reset</button>
                        <button type="submit" class="btn btn-primary"><div class="fa fa-save"></div> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>