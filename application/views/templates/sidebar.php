  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?= base_url('Dashboard'); ?>" class="site_title"><i class="fa fa-car"></i> <font size="4"> E-Peta Kecelakaan</font></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?= base_url('assets/'); ?>images/default.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?= $user['nama']; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />
            <!-- sidebar menu -->
            <!-- Akses Menu Sesuai Level -->
            <!-- Untuk admin -->
            <?php if ($this->session->userdata('level')  == 1) { ?>
              <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                  <h3>Menu</h3>
                  <ul class="nav side-menu">
                    <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="<?= base_url('Dashboard'); ?>">Dashboard</a></li>
                      </ul>
                    </li>
                    <li><a><i class="fa fa-edit"></i> Kecamatan <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="<?= base_url('Kecamatan'); ?>">Data Kecamatan</a></li>
                        <li><a href="<?= base_url('Kecamatan/FormInput'); ?>">Input Kecamatan</a></li>
                      </ul>
                    </li>
                    <li><a><i class="fa fa-desktop"></i> Kasus <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="<?= base_url('Kasus'); ?>">Data Kasus</a></li>
                        <li><a href="<?= base_url('Kasus/FormInput');  ?>">Input Kasus</a></li>
                      </ul>
                    </li>
                    <li><a><i class="fa fa-table"></i> Rangkuman <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="<?= base_url('Rangkuman/peta');  ?>">Peta</a></li>
                        <li><a href="<?= base_url('Rangkuman/chart');  ?>">Chart</a></li>
                        <li><a href="<?= base_url('Rangkuman/batang');  ?>">Diagram Batang</a></li>
                      </ul>
                    </li>
                    <li><a><i class="fa fa-user"></i> Pengguna <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="<?= base_url('Auth/pengguna');  ?>">Data Pengguna</a></li>
                        <li><a href="<?= base_url('Auth/FormInput');  ?>">Input Pengguna</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
              <!-- Akses Petugas -->
            <?php }
            if ($this->session->userdata('level') == 2) { ?>
              <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                  <h3>Menu</h3>
                  <ul class="nav side-menu">
                    <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="<?= base_url('Dashboard'); ?>">Dashboard</a></li>
                      </ul>
                    </li>
                    <li><a><i class="fa fa-desktop"></i> Kasus <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="<?= base_url('Kasus'); ?>">Data Kasus</a></li>
                        <li><a href="<?= base_url('Kasus/FormInput');  ?>">Input Kasus</a></li>
                      </ul>
                    </li>
                    <li><a><i class="fa fa-table"></i> Rangkuman <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="<?= base_url('Rangkuman/peta');  ?>">Peta</a></li>
                        <li><a href="<?= base_url('Rangkuman/chart');  ?>">Chart</a></li>
                        <li><a href="<?= base_url('Rangkuman/batang');  ?>">Diagram Batang</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
              <!-- Akses Masyarakat -->
            <?php }
            if ($this->session->userdata('level') == 3) { ?>
              <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                  <h3>Menu</h3>
                  <ul class="nav side-menu">
                    <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="<?= base_url('Dashboard'); ?>">Dashboard</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
            <?php }; ?>

            <!-- /sidebar menu -->
          </div>
        </div>