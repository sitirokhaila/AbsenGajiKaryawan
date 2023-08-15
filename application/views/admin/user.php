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
                                <th width="10px">Foto</th>
                                <th>Username</th>
                                <th>Nama Lengkap</th>
                                <th>Telp</th>
                                <th>Email</th>
                                <th>Sebagai</th>
                                <th>Jabatan</th>
                                <th>Cabang</th>
                                <th>Terdaftar</th>
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
                                    <td><img src="<?= base_url('assets/profil/').$row['foto'] ?>" class="img-responsive" width="100%"></td>
                                    <td><?= $row['username'] ?></td>
                                    <td><?= $row['nama'] ?></td>
                                    <td><?= $row['telp'] ?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td><?= $row['level'] ?></td>
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
                                    <td><?= date('d F Y H:i:s', strtotime($row['terdaftar'])) ?></td>
                                    <td>
                                        <?php if($this->session->userdata('id') == $row['id']) { ?>
                                            <a href="<?= base_url('index.php/admin/profil') ?>" class="btn btn-info btn-xs">
                                                <div class="fa fa-user"></div> My Profil
                                            </a>
                                        <?php } else { ?>
                                            <a href="<?= base_url('index.php/admin/user/detail/').$row['id'] ?>" class="btn btn-info btn-xs">
                                                <div class="fa fa-history"></div> Detail
                                            </a>
                                            <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#editData<?= $row['id'] ?>">
                                                <div class="fa fa-edit"></div> Edit
                                            </button>
                                            <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#resetPassword<?= $row['id'] ?>">
                                                <div class="fa fa-lock"></div> Reset Password
                                            </button>
                                            <a href="<?= base_url('index.php/admin/user/delete/').$row['id'] ?>" class="btn btn-danger btn-xs tombol-yakin" data-isidata="Account tidak bisa dipulihkan setelah dihapus">
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Tambah User</h4>
            </div>
            <form action="<?= base_url('index.php/admin/user/insert') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
                    </div>
                    <div class="form-group">
                        <label>Telp</label>
                        <input type="number" name="telp" class="form-control" placeholder="Telp" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Username" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Sebagai</label>
                        <select name="level" class="form-control" required>
                            <option value="" disabled selected> -- Pilih Sebagai -- </option>
                            <option value="Administrator">Administrator</option>
                            <option value="Karyawan">Karyawan</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jabatan</label>
                                <select name="idJabatan" class="select2" style="width: 100%" required>
                                    <option value="" disabled selected> -- Pilih Jabatan -- </option>
                                    <?php foreach ($jabatan->result() as $iJbt) { ?>
                                        <option value="<?= $iJbt->id ?>"><?= $iJbt->jabatan ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Penempatan</label>
                                <select name="idCabang" class="select2" style="width: 100%" required>
                                    <option value="" disabled selected> -- Pilih Penempatan Cabang -- </option>
                                    <?php foreach ($cabang->result() as $iCbg) { ?>
                                        <option value="<?= $iCbg->id ?>"><?= $iCbg->cabang ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
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

<!-- Modal Reset Password -->
<?php foreach ($user->result() as $resPass) { ?>
    <div class="modal fade" id="resetPassword<?= $resPass->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Reset Password</h4>
                </div>
                <form action="<?= base_url('index.php/admin/user/resetpassword/').$resPass->id ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" name="password" class="form-control" placeholder="New Password" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger"><div class="fa fa-trash"></div> Reset</button>
                        <button type="submit" class="btn btn-primary"><div class="fa fa-lock"></div> Reset Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Modal Edit Data -->
<?php foreach ($user->result() as $edit) { ?>
    <div class="modal fade" id="editData<?= $edit->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Data User</h4>
                </div>
                <form action="<?= base_url('index.php/admin/user/update/').$edit->id ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?= $edit->nama ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Telp</label>
                            <input type="number" name="telp" class="form-control" placeholder="Telp" value="<?= $edit->telp ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email" value="<?= $edit->email ?>" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jabatan</label>
                                    <select name="idJabatan" class="select2" style="width: 100%" required>
                                        <?php
                                            $this->db->where('id', $edit->idJabatan);
                                            foreach ($this->db->get('tb_jabatan')->result() as $eJbtn) {
                                        ?>
                                            <option value="<?= $eJbtn->id ?>" selected><?= $eJbtn->jabatan ?></option>
                                        <?php } ?>
                                        <option value="" disabled> -- Pilih Jabatan Lain -- </option>
                                        <?php foreach ($jabatan->result() as $iJbt) { ?>
                                            <option value="<?= $iJbt->id ?>"><?= $iJbt->jabatan ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Penempatan</label>
                                    <select name="idCabang" class="select2" style="width: 100%" required>
                                        <?php
                                            $this->db->where('id', $edit->idCabang);
                                            foreach ($this->db->get('tb_cabang')->result() as $eCbng) {
                                        ?>
                                            <option value="<?= $eCbng->id ?>" selected><?= $eCbng->cabang ?></option>
                                        <?php } ?>
                                        <option value="" disabled> -- Pilih Penempatan Cabang Lain -- </option>
                                        <?php foreach ($cabang->result() as $iCbg) { ?>
                                            <option value="<?= $iCbg->id ?>"><?= $iCbg->cabang ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger"><div class="fa fa-trash"></div> Reset</button>
                        <button type="submit" class="btn btn-primary"><div class="fa fa-save"></div> Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

