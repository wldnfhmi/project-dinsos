<!-- Main Sidebar Container -->
<aside class="main-sidebar main-sidebar-custom sidebar-light-olive elevation-2">
    <!-- Brand Logo -->
    <a href="<?= base_url('Admin'); ?>" class="brand-link">
      <img src="<?= base_url('assets/img/silra-logo-small.png'); ?>" alt="AdminLTE Logo" class="brand-image elevation-2 img-circle" style="opacity: .8">
      <span class="brand-text" data-toggle="tooltip" data-placement="bottom" title="Sistem Informasi Layanan Rekomendasi Administrasi PBI">
        <img src="<?= base_url('assets/img/silra-logo.png'); ?>" class="img-fluid" width="100">
      </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-legacy nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php
            $role_id = $this->session->userdata('role_id');
            $queryMenu = "SELECT `user_menu`.`id`, `menu`
                          FROM `user_menu` JOIN `user_access_menu`
                          ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                          WHERE `user_access_menu`.`role_id` = $role_id
                          ORDER BY `user_access_menu`.`menu_id` ASC
                          ";
            $menu = $this->db->query($queryMenu)->result_array();
          ?>
          <!-- Looping Menu -->
          <?php foreach ($menu as $m) : ?>
          <li class="nav-header">
            <?= $m['menu']; ?>
          </li>

          <!-- Siapkan Sub-Menu -->
          <?php
            $menuId = $m['id'];
            $querySubmenu = "SELECT *
                              FROM `user_sub_menu`
                              WHERE `menu_id` = $menuId
                              AND `is_active` = 1
                              ";
            $subMenu = $this->db->query($querySubmenu)->result_array();
          ?>

          <?php foreach ($subMenu as $sm) : ?>
            <?php $url = base_url($sm['url']); ?>
            <?php $is_active = ($title == $sm['title']) ? 'active' : ''; ?>

            <li class="nav-item">
              <a href="<?= $url; ?>" class="nav-link <?= $is_active; ?>">
                <i class="nav-icon <?= $sm['icon']; ?>"></i>
                <p>
                  <?= $sm['title']; ?>
                </p>
              </a>
            </li>
          <?php endforeach; ?>
          <?php endforeach; ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    <div class="sidebar-custom text-center">
      <a href="<?= base_url('Autentifikasi/logout'); ?>" class="btn btn-link text-olive"><i class="fas fa-sign-out-alt rotate-90"></i></a>
    </div>
  </aside>