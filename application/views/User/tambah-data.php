<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="flash-data" style="display: none;" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
      <div class="flash-data-error" style="display: none;" data-flashdataerror="<?= $this->session->flashdata('error'); ?>"></div>
      <div style="display: none;"><?= $this->session->flashdata('flash'); ?></div>
      <div style="display: none;"><?= $this->session->flashdata('error'); ?></div>
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-secondary"><?= $title; ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('User'); ?>">User</a></li>
            <li class="breadcrumb-item active"><?= $title; ?></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col">
          <div class="card card-purple card-outline">
            <div class="card-body">
              <form action="<?= base_url('User/tambahData'); ?>" method="post">
                <div class="form-group row">
                  <div class="col-sm-6">
                    <label class="col-form-label-sm text-gray">Nomor KK</label>
                    <input type="text" class="form-control" id="nomor_kk" name="nomor_kk" value="<?= set_value('nomor_kk'); ?>" required autocomplete="off" autofocus>
                    <?= form_error('nomor_kk', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <div class="col-sm-6">
                    <label class="col-form-label-sm text-gray">Nomor Induk Kependudukan</label>
                    <input type="text" class="form-control" id="nik" name="nik" value="<?= set_value('nik'); ?>" required autocomplete="off">
                    <?= form_error('nik', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-form-label-sm text-gray">Nama Lengkap</label>
                  <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama'); ?>" required autocomplete="off">
                  <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group row">
                  <div class="col-sm-4 mb-3 mb-sm-0">
                    <label class="col-form-label-sm text-gray">Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                      <option value=""> --- </option>
                      <option value="Laki - Laki">Laki - Laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                  <div class="col-sm-4">
                    <label class="col-form-label-sm text-gray">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="<?= set_value('tempat_lahir'); ?>" required autocomplete="off">
                    <?= form_error('tempat_lahir', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <div class="col-sm-4">
                    <label class="col-form-label-sm text-gray">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required>
                    <?= form_error('tanggal_lahir', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-4">
                    <label class="col-form-label-sm text-gray">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" required>
                    <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <div class="col-sm-1">
                    <label class="col-form-label-sm text-gray">RT</label>
                    <input type="text" class="form-control" name="rt" id="rt" required>
                    <?= form_error('rt', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <div class="col-sm-1">
                    <label class="col-form-label-sm text-gray">RW</label>
                    <input type="text" class="form-control" name="rw" id="rw" required>
                    <?= form_error('rw', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <div class="col-sm-3 mb-3 mb-sm-0">
                    <label class="col-form-label-sm text-gray">Kelurahan</label>
                    <select class="form-control" name="kelurahan" id="kelurahan" required>
                      <option value=""> --- </option>
                      <?php foreach ($kelurahan as $row) : ?>
                        <option value="<?= $row['kelurahan']; ?>"><?= $row['kelurahan']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-sm-3 mb-3 mb-sm-0">
                    <label class="col-form-label-sm text-gray">Kecamatan</label>
                    <select class="form-control" name="kecamatan" id="kecamatan" required>
                      <option value=""> --- </option>
                      <?php foreach ($kecamatan as $row) : ?>
                        <option value="<?= $row['kecamatan']; ?>"><?= $row['kecamatan']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <button type="submit" class="btn bg-gradient-olive px-4">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->