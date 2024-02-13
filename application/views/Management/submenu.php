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
                    <form action="<?= base_url('Management/subMenu'); ?>" method="post">
                      <div class="form-group">
                        <label class="col-form-label-sm text-gray">Judul Sub Menu</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?= set_value('title'); ?>" required autocomplete="off" placeholder="Nama Sub menu">
                        <?= form_error('title', '<small class="text-danger">', '</small>'); ?>
                      </div>
                      <div class="form-group">
                        <label class="col-form-label-sm text-gray">Menu</label>
                        <select name="menu_id" id="menu_id" class="form-control">
                          <option value="">Select Menu</option>
                          <?php foreach ($menu as $m) : ?>
                            <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label class="col-form-label-sm text-gray">Url</label>
                        <input type="text" class="form-control" id="url" name="url" value="<?= set_value('url'); ?>" required autocomplete="off" placeholder="Url">
                        <?= form_error('url', '<small class="text-danger">', '</small>'); ?>
                      </div>
                      <div class="form-group">
                        <label class="col-form-label-sm text-gray">Icon</label>
                        <input type="text" class="form-control" id="icon" name="icon" value="<?= set_value('icon'); ?>" required autocomplete="off" placeholder="Icon">
                        <?= form_error('icon', '<small class="text-danger">', '</small>'); ?>
                      </div>
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked>
                          <label class="form-check-label" for="is_active">
                            Active?
                          </label>
                        </div>
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
                        <th>Title</th>
                        <th>Menu</th>
                        <th>Url</th>
                        <th>Icon</th>
                        <th>Active</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th></th>
                        <th>Title</th>
                        <th>Menu</th>
                        <th>Url</th>
                        <th>Icon</th>
                        <th>Active</th>
                        <th></th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php $i = 1;
                      foreach ($subMenu as $row) : ?>
                        <tr>
                          <td style="vertical-align: middle;"><?= $i++; ?></td>
                          <td style="vertical-align: middle;"><?= $row['title']; ?></td>
                          <td style="vertical-align: middle;"><?= $row['menu']; ?></td>
                          <td style="vertical-align: middle;"><?= $row['url']; ?></td>
                          <td style="vertical-align: middle;"><?= $row['icon']; ?></td>
                          <td style="vertical-align: middle;"><?= $row['is_active']; ?></td>
                          <td>
                            <a href="<?= base_url('Management/hapusSubMenu/') . $row['id']; ?>" class="btn btn-danger btn-sm btn-block btn-del">
                              <i class="fas fa-fw fa-trash"></i>
                            </a>
                            <a href="" class="btn bg-olive btn-sm btn-block" data-toggle="modal" data-target="#editModal<?= $row['id']; ?>">
                              <i class="fas fa-fw fa-pen"></i>
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
  <?php $i = 0;
  foreach ($subMenu as $sm) : $i++; ?>
    <!-- Modal Edit -->
    <div class="modal fade" id="editModal<?= $sm['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-olive" id="exampleModalLabel">Edit Menu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?= base_url('Management/proseseditSubmenu'); ?>" method="post">
            <div class="modal-body">
              <div class="form-group">
                <input type="hidden" name="id" id="id" value="<?= $sm['id']; ?>">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="title" name="title" placeholder="Submenu Title" value="<?= $sm['title']; ?>">
              </div>
              <div class="form-group">
                <select name="menu_id" id="menu_id" class="form-control">
                  <option value="">Select Menu</option>
                  <?php foreach ($menu as $m) : ?>
                    <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url" value="<?= $sm['url']; ?>">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon" value="<?= $sm['icon']; ?>">
              </div>
              <div class="form-group">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked>
                  <label class="form-check-label" for="is_active">
                    Active?
                  </label>
                </div>
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