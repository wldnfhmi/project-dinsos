  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="flash-data" style="display: none;" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
        <div style="display: none;"><?= $this->session->flashdata('flash'); ?></div>
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-secondary"><?= $title; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('Management'); ?>">Management</a></li>
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
                    <form action="<?= base_url('Management/tambahPengguna'); ?>" method="post">
                      <div class="form-group">
                        <label class="col-form-label-sm text-gray">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?= set_value('username'); ?>" required autocomplete="off">
                        <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                      </div>
                      <div class="form-group">
                        <label class="col-form-label-sm text-gray">Password</label>
                        <input type="password" class="form-control" id="password1" name="password1" value="<?= set_value('password1'); ?>" required autocomplete="off">
                        <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                      </div>
                      <div class="form-group">
                        <label class="col-form-label-sm text-gray">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="password2" name="password2" value="<?= set_value('password2'); ?>" required autocomplete="off">
                        <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                      </div>
                      <button type="submit" class="btn btn-block bg-olive">Tambah</button>
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
                        <th>Username</th>
                        <th>Role</th>
                        <th>Active</th>
                        <th>Date Created</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th></th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Active</th>
                        <th>Date Created</th>
                        <th></th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php $i = 1;
                      foreach ($pengguna as $row) : ?>
                        <tr>
                          <td style="vertical-align: middle;"><?= $i++; ?></td>
                          <td style="vertical-align: middle;"><?= $row['username']; ?></td>
                          <td style="vertical-align: middle;"><?= $row['role']; ?></td>
                          <td style="vertical-align: middle;"><?= $row['is_active']; ?></td>
                          <td style="vertical-align: middle;"><?= date('d F Y', $row['date_created']); ?></td>
                          <td>
                            <a href="<?= base_url('Management/hapusPengguna/') . $row['id']; ?>" class="btn btn-danger btn-sm btn-del btn-block">
                              <i class="fas fa-fw fa-trash"></i>
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
  </div>
  <!-- /.content-wrapper -->