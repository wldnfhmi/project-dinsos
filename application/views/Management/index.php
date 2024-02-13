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
                  <form action="<?= base_url('Management'); ?>" method="post">
                    <div class="form-group">
                      <label class="col-form-label-sm text-gray">Title Menu</label>
                      <input type="text" class="form-control" id="menu" name="menu" value="<?= set_value('menu'); ?>" required autocomplete="off" placeholder="Nama menu">
                      <?= form_error('menu', '<small class="text-danger">', '</small>'); ?>
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
                      <th>Nama Menu</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th></th>
                      <th>Nama Menu</th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php $i = 1;
                    foreach ($menu as $row) : ?>
                    <tr>
                      <td style="vertical-align: middle;"><?= $i++; ?></td>
                      <td style="vertical-align: middle;"><?= $row['menu']; ?></td>
                      <td>
                        <a href="<?= base_url('Management/hapusMenu/') . $row['id']; ?>" class="btn btn-danger btn-sm btn-del">
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