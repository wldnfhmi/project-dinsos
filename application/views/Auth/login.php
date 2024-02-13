<div class="login-box">
  <div class="login-logo">
    <a href="<?= base_url('Autentifikasi'); ?>">
      <img src="<?= base_url('assets/img/silra-logo.png'); ?>" width="250" alt="" class="img-fluid">
    </a>
    <p style="font-size: 1.6rem; font-weight: 600; padding-top: 10px" class="text-secondary">Kota Tangerang Selatan</p>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="<?= base_url('Autentifikasi'); ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username" id="username" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" id="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <button type="submit" class="btn bg-gradient-olive btn-block" style="text-transform: uppercase; font-size: 14px; font-weight: 700; letter-spacing: 2px">Sign in</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->