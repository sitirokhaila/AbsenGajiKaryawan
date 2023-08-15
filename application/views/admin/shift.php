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
    <section class="content">
        <div class="box">
            <div class="box-header">
                <?php if($this->session->userdata('level') == 'Administrator') { ?>
                <button class="btn btn-primary" data-toggle="modal" data-target="#tambahData">
                    <div class="fa fa-plus"></div> Tambah Data
                </button>
                <?php } ?>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="dataTable">
                        <thead>
                            <tr>
                                <th width="10px">#</th>
                                <th>Nama Shift</th>
                                <th>Jam Kerja</th>
                                <th>Status</th>
                                <th>Terdaftar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>S
                        <tbody>
                            <?php
                                $no = 1;
                                foreach ($shift->result_array() as $row) {
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['shift'] ?></td>
                                <td><?= date('H:i:s', strtotime($row['jamMasuk'])) . ' - ' . date('H:i:s', strtotime($row['jamPulang'])) ?>
                                </td>
                                <td><?= $row['status'] ?></td>
                                <td><?= date('d F Y H:i', strtotime($row['terdaftar'])) ?></td>
                                <td>
                                    <?php if($this->session->userdata('level') == 'Administrator') { ?>
                                    <button class="btn btn-warning btn-xs" data-toggle="modal"
                                        data-target="#editData<?= $row['id'] ?>">
                                        <div class="fa fa-edit"></div> Edit
                                    </button>
                                    <a href="<?= base_url('index.php/admin/shift/delete/').$row['id'] ?>"
                                        class="btn btn-danger btn-xs tombol-yakin"
                                        data-isidata="Ingin manghapus data ini?">
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

<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Tambah <?= $title ?></h4>
            </div>
            <form action="<?= base_url('index.php/admin/shift/insert') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Shift</label>
                        <input type="text" name="shift" class="form-control" placeholder="Nama Shift" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jam Masuk</label>
                                <input type="time" name="jamMasuk" class="form-control" placeholder="Jam Masuk"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jam Pulanng</label>
                                <input type="time" name="jamPulang" class="form-control" placeholder="Jam Pulanng"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" required>
                            <option value="" disabled selected> -- Pilih Status Shift -- </option>
                            <option value="Normal">Normal</option>
                            <option value="Lembur">Lembur</option>
                        </select>
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

<!-- Modal Edit Data -->
<?php foreach ($shift->result() as $edit) { ?>
<div class="modal fade" id="editData<?= $edit->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit <?= $title ?></h4>
            </div>
            <form action="<?= base_url('index.php/admin/shift/update/').$edit->id ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Shift</label>
                        <input type="text" name="shift" class="form-control" value="<?= $edit->shift ?>"
                            placeholder="Nama Shift" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jam Masuk</label>
                                <input type="time" name="jamMasuk" class="form-control" value="<?= $edit->jamMasuk ?>"
                                    placeholder="Jam Masuk" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jam Pulanng</label>
                                <input type="time" name="jamPulang" class="form-control" value="<?= $edit->jamPulang ?>"
                                    placeholder="Jam Pulanng" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" required>
                            <option value="Normal" <?= ($edit->status == 'Normal') ? 'Selected' : '' ?>>Normal</option>
                            <option value="Lembur" <?= ($edit->status == 'Lembur') ? 'Selected' : '' ?>>Lembur</option>
                        </select>
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