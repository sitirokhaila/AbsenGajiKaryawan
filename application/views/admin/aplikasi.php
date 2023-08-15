<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Tentang Aplikasi
            <small>Atur aplikasi anda disini</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('index.php/admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Aplikasi</li>
        </ol>
    </section>
        <?php foreach ($aplikasi->result_array() as $row) {} ?>
    <section class="content">
        <div class="box">
            <form class="form-horizontal" action="<?= base_url('index.php/admin/aplikasi/update/').$row['id'] ?>" method="POST" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Aplikasi</label>

                  <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" value="<?= $row['nama']; ?>" placeholder="Nama Aplikasi" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" value="<?= $row['email']; ?>" placeholder="Email" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">No. Telephone</label>

                  <div class="col-sm-10">
                    <input type="number" name="telp" class="form-control" value="<?= $row['telp']; ?>" placeholder="No. Telephone" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Alamat</label>

                  <div class="col-sm-10">
                    <input type="text" name="alamat" class="form-control" value="<?= $row['alamat']; ?>" placeholder="Alamat" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Logo <font color="red">*)</font></label>

                  <div class="col-sm-10">
                    <input type="file" name="logo" class="form-control-file"> <br>
                    <?php if($row['logo'] != '') { ?>
                      <img src="<?= base_url('assets/logo/').$row['logo'] ?>" alt="Logo Kosong" class="img-responsive" width="20%">
                      <br>
                      <a href="<?= base_url('index.php/admin/aplikasi/delete_logo/').$row['id'] ?>" class="btn btn-danger btn-sm tombol-yakin" data-isidata="Ingin menghapus logo?">
                        <div class="fa fa-trash fa-sm"></div> Delete Logo
                      </a>
                    <?php } ?>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <small><b><i><font color="red">*) Kosongkan jika tidak ingin diubah <br> NB : Logo yang bisa diupload yaitu berformat PNG, JPG dan JPEG ukuran maximal 5MB</font></i></b></small>
                <div class="pull-right">
                    <button type="reset" class="btn btn-danger">
                        <div class="fa fa-trash"></div> Reset
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <div class="fa fa-save"></div> Update
                    </button>
                </div>
              </div>
            </form>
        </div>
    </section>
</div>