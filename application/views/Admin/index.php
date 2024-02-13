  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
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
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-indigo">
              <div class="inner">
                <h3><?= $total_pemohon; ?></h3>

                <small>Total Pemohon</small>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?= base_url('User'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-fuchsia">
              <div class="inner">
                <h3><?= $s_dtks; ?></h3>

                <small>Total PBI DTKS APBD</small>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?= base_url('Laporan'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-orange">
              <div class="inner">
                <h3><?= $s_ndtks; ?></h3>

                <small>Total PBI Non DTKS</small>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?= base_url('Laporan/laporanNonDTKS'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $pengesah; ?></h3>

                <small>Pengesah</small>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?= base_url('Admin/pengesah'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
          <div class="col">
            <div class="card elevation-1">
              <div class="card-header">
                <h5 class="card-title text-olive">Laporan Pengajuan Surat</h5>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-8">
                    <p class="text-center">
                      <span class="text-secondary">Pengajuan: 1 Jan <?= date('Y'); ?> - 31 Des <?= date('Y'); ?></span>
                    </p>
                    <div class="chart">
                      <canvas id="salesChart" height="360" style="height: 250px;"></canvas>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <p class="text-center">
                      <span class="text-secondary">Rekapitulasi Permohonan Surat</span>
                    </p>

                    <div class="progress-group">
                      Pemohon Terdaftar
                      <span class="float-right"><b></b>/2000</span>
                      <div class="progress progress-sm" data-toggle="tooltip" data-placement="top" title="<?= $total_pemohon; ?>">
                        <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" style="width: <?= $presentase_progress; ?>%;" id="progress-bar"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->

                    <div class="progress-group">
                      Permohonan Surat PBI DTKS APBD
                      <span class="float-right"><b></b>/2000</span>
                      <div class="progress progress-sm" data-toggle="tooltip" data-placement="top" title="<?= $total_dtks; ?>">
                        <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" style="width: <?= $presentase_progress_dtks; ?>%" id="progress-dtks"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Permohonan Surat PBI Non DTKS</span>
                      <span class="float-right"><b></b>/2000</span>
                      <div class="progress progress-sm" data-toggle="tooltip" data-placement="top" title="<?= $total_ndtks; ?>">
                        <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" style="width: <?= $presentase_progress_ndtks; ?>%" id="progress-ndtks"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                  </div>
                  <!-- /.col -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End main row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->