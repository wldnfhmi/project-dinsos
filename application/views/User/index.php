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
        <!-- DataTales Example -->
        <div class="card mb-4 elevation-1">
          <div class="card-header py-3" style="display: flex; align-items: center;">
            <div class="input-group-prepend">
              <a class="btn btn-sm bg-gradient-olive" href="<?= base_url('User/tambahData'); ?>">
                Tambah Data
              </a>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nomor KK</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Kelurahan</th>
                    <th>Kecamatan</th>
                    <th></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th></th>
                    <th>Nomor KK</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Kelurahan</th>
                    <th>Kecamatan</th>
                    <th></th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php $i = 1;
                  foreach ($pemohon as $row) : ?>
                  <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $row['nomor_kk']; ?></td>
                    <td><?= $row['nik']; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['alamat']; ?></td>
                    <td><?= $row['kelurahan']; ?></td>
                    <td><?= $row['kecamatan']; ?></td>
                    <td style="vertical-align: middle;">
                    <div class="input-group-prepend">
                      <button type="button" class="btn btn-block btn-default" data-toggle="dropdown">
                        Aksi
                      </button>
                      <div class="dropdown-menu">
                        <!-- <a class="dropdown-item text-lightblue" href="#">
                          Detail
                        </a> -->
                        <div class="dropleft">
                          <a href="" class="dropdown-item dropleft" data-toggle="dropdown" aria-expanded="false">
                            Buat Surat
                          </a>
                          <div class="dropdown-menu">
                            <a class="btn dropdown-item" href="<?= base_url('User/buatSurat/') . $row['nik']; ?>">
                              PBI DTKS APBD
                            </a>
                            <a class="btn dropdown-item" href="<?= base_url('User/buatSuratNDTKS/') . $row['nik']; ?>">PBI Non DTKS</a>
                          </div>
                        </div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#ubahDataModal<?= $row['id']; ?>">
                          Edit Data
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger text-center btn-del" href="<?= base_url('User/hapusData/') . $row['id']; ?>">
                          Hapus Data
                        </a>
                      </div>
                    </div>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <?php foreach($pemohon as $row) : ?>
    <!-- Ubah Data Modal -->
    <div class="modal fade" id="ubahDataModal<?= $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-olive" id="exampleModalLabel">Update Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('User/ubahData'); ?>" method="post">
            <input type="hidden" name="id" id="id" value="<?= $row['id']; ?>">
            <div class="form-group row">
              <div class="col-sm-6">
                <label for="nomor_kk" class="col-form-label-sm text-gray">Nomor KK</label>
                <input type="text" class="form-control" id="nomor_kk" name="nomor_kk" value="<?= $row['nomor_kk']; ?>">
              </div>
              <div class="col-sm-6">
                <label for="nik" class="col-form-label-sm text-gray">Nomor Induk Kependudukan</label>
                <input type="text" class="form-control" id="nik" name="nik" value="<?= $row['nik']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="nama" class="col-form-label-sm text-gray">Nama Lengkap</label>
              <input type="text" class="form-control" id="nama" name="nama" value="<?= $row['nama']; ?>">
            </div>
            <div class="form-group row">
              <div class="col-sm-4 mb-3 mb-sm-0">
                <label for="jenis_kelamin" class="col-form-label-sm text-gray">Jenis Kelamin</label>
                  <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" value="<?= $row['jenis_kelamin']; ?>">
                    <option value="<?= $row['jenis_kelamin']; ?>"> <?= $row['jenis_kelamin']; ?> </option>
                    <option value="Laki - Laki">Laki - Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
              </div>
              <div class="col-sm-4">
                <label for="tempat_lahir" class="col-form-label-sm text-gray">Tempat Lahir</label>
                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="<?= $row['tempat_lahir']; ?>">
              </div>
              <div class="col-sm-4">
                <label for="tanggal_lahir" class="col-form-label-sm text-gray">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="<?= $row['tanggal_lahir']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-4 mb-3">
                <label for="alamat" class="col-form-label-sm text-gray">Alamat</label>
                <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $row['alamat']; ?>">
              </div>
              <div class="col-sm-1 mb-3">
                <label for="rt" class="col-form-label-sm text-gray">RT</label>
                <input type="text" class="form-control" name="rt" id="rt" value="<?= $row['rt']; ?>">
              </div>
              <div class="col-sm-1 mb-3">
                <label for="rw" class="col-form-label-sm text-gray">RW</label>
                <input type="text" class="form-control" name="rw" id="rw" value="<?= $row['rw']; ?>">
              </div>
              <div class="col-sm-3">
                <label for="kelurahan" class="col-form-label-sm text-gray">Kelurahan</label>
                  <select class="form-control" name="kelurahan" id="kelurahan" value="<?= $row['kelurahan']; ?>">
                    <option value="<?= $row['kelurahan']; ?>"> <?= $row['kelurahan']; ?> </option>
                    <?php foreach ($kelurahan as $kel) : ?>
                    <option value="<?= $kel['kelurahan']; ?>"><?= $kel['kelurahan']; ?></option>
                    <?php endforeach; ?>
                  </select>
              </div>
              <div class="col-sm-3">
                <label for="kecamatan" class="col-form-label-sm text-gray">Kecamatan</label>
                  <select class="form-control" name="kecamatan" id="kecamatan" value="<?= $row['kecamatan']; ?>">
                    <option value="<?= $row['kecamatan']; ?>"> <?= $row['kecamatan']; ?> </option>
                    <?php foreach ($kecamatan as $kec) : ?>
                    <option value="<?= $kec['kecamatan']; ?>"><?= $kec['kecamatan']; ?></option>
                    <?php endforeach; ?>
                  </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn text-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn bg-gradient-olive">Simpan</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    <?php endforeach; ?>