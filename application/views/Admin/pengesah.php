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
              <li class="breadcrumb-item"><a href="<?= base_url('Admin'); ?>">Admin</a></li>
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

        <div class="card">
          <div class="card-body">
            <div class="row">
              <!-- Col Form Tambah -->
              <div class="col-md-4">
                <div class="card">
                  <div class="card-body">
                    <form action="<?= base_url('Admin/pengesah'); ?>" method="post">
                      <div class="form-group">
                        <label class="col-form-label-sm text-gray">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama'); ?>" required autocomplete="off">
                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                      </div>
                      <div class="form-group">
                        <label class="col-form-label-sm text-gray">Golongan</label>
                        <input type="text" class="form-control" id="pangkat" name="pangkat" value="<?= set_value('pangkat'); ?>" required autocomplete="off">
                        <?= form_error('pangkat', '<small class="text-danger">', '</small>'); ?>
                      </div>
                      <div class="form-group">
                        <label class="col-form-label-sm text-gray">Nip</label>
                        <input type="text" class="form-control" id="nip" name="nip" value="<?= set_value('nip'); ?>" required autocomplete="off">
                        <?= form_error('nip', '<small class="text-danger">', '</small>'); ?>
                      </div>
                      <div class="form-group">
                        <label class="col-form-label-sm text-gray">Jabatan</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= set_value('jabatan'); ?>" required autocomplete="off">
                        <?= form_error('jabatan', '<small class="text-danger">', '</small>'); ?>
                      </div>
                      <button type="submit" class="btn btn-block bg-olive mt-3">Tambah</button>
                    </form>
                  </div>
                </div>
              </div>
              <!-- End Col Form Tambah -->
              <!-- Col Datatables -->
              <div class="col-md-8">
                <div class="table-responsive">
                  <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Golongan</th>
                        <th>Nip</th>
                        <th>Jabatan</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th></th>
                        <th>Nama</th>
                        <th>Golongan</th>
                        <th>Nip</th>
                        <th>Jabatan</th>
                        <th></th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php $i = 1;
                      foreach ($pengesah as $row) : ?>
                      <tr>
                        <td style="vertical-align: middle;"><?= $i++; ?></td>
                        <td style="vertical-align: middle;"><?= $row['nama']; ?></td>
                        <td style="vertical-align: middle;"><?= $row['pangkat']; ?></td>
                        <td style="vertical-align: middle;"><?= $row['nip']; ?></td>
                        <td style="vertical-align: middle;"><?= $row['jabatan']; ?></td>
                        <td>
                          <a href="<?= base_url('Admin/hapusPengesah/') . $row['id']; ?>" class="btn btn-danger btn-block btn-sm btn-del">
                            <i class="fas fa-fw fa-trash"></i>
                          </a>
                          <a href="" class="btn bg-olive btn-block btn-sm" data-toggle="modal" data-target="#editModal<?= $row['id']; ?>">
                            <i class="fas fa-fw fa-edit"></i>
                          </a>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- End Col Datatables -->
            </div>
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <?php $i = 0;
    foreach ($pengesah as $row) : $i++;?>
    <!-- Modal Edit -->
    <div class="modal fade" id="editModal<?= $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-olive" id="exampleModalLabel">Edit Pengesah</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?= base_url('Admin/proseseditPengesah'); ?>" method="post">
            <div class="modal-body">
              <div class="form-group">
                <input type="hidden" name="id" id="id" value="<?= $row['id']; ?>">
              </div>
              <div class="form-group">
                <label class="col-form-label-sm text-gray">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama"
                  value="<?= $row['nama']; ?>">
              </div>
              <div class="form-group">
                <label class="col-form-label-sm text-gray">Golongan</label>
                <input type="text" class="form-control" id="pangkat" name="pangkat"
                  value="<?= $row['pangkat']; ?>">
              </div>
              <div class="form-group">
                <label class="col-form-label-sm text-gray">Nip</label>
                <input type="text" class="form-control" id="nip" name="nip"
                  value="<?= $row['nip']; ?>">
              </div>
              <div class="form-group">
                <label class="col-form-label-sm text-gray">Jabatan</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan"
                  value="<?= $row['jabatan']; ?>">
              </div>
            </div>
            <div class=" modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn bg-olive">Edit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php endforeach; ?>