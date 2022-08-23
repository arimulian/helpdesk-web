    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
         <!-- Brand Logo -->
         <a href="#" class="brand-link">
              <ion-icon src="<?= base_url('assets/'); ?>dist/img/headset-sharp.svg"></ion-icon>

              <span class="brand-text font-weight-dark ">HELPDESK</span>
         </a>

         <!-- Sidebar -->
         <div class="sidebar">
              <!-- Sidebar user panel (optional) -->
              <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                   <div class="image">
                        <img src="<?= base_url('assets/dist/img/profile/') . $this->session->image_user; ?>" class="img-circle elevation-2">
                   </div>
                   <div class="info">
                        <a href="<?= base_url() ?>karyawan/profile/<?= $this->session->id_user; ?>" class="d-block"><?= $this->session->username ?></a>
                   </div>
              </div>
              <!-- Sidebar Menu -->
              <nav class="mt-2">
                   <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                             <a href="<?= base_url('dashboard'); ?>" class="nav-link">
                                  <i class="nav-icon fas fa-tachometer-alt"></i>
                                  <p>
                                       Dashboard

                                  </p>
                             </a>
                        </li>

                        <?php if (is_it()) { ?>
                             <li class="nav-header">DATA MASTER</li>
                             <li class="nav-item">
                                  <a href="#" class="nav-link">
                                       <i class="fas fa-solid fa-users nav-icon"></i>
                                       <p>
                                            Master Karyawan
                                            <i class="fas fa-angle-left right"></i>
                                       </p>
                                  </a>
                                  <ul class="nav nav-treeview">
                                       <li class="nav-item">
                                            <a href="<?= base_url('Karyawan') ?>" class="nav-link">
                                                 <i class="far fa-circle nav-icon"></i>
                                                 <p>Daftar User</p>
                                            </a>
                                       </li>
                                       <li class="nav-item">
                                            <a href="<?= base_url('departemen'); ?>" class="nav-link">
                                                 <i class="far fa-circle nav-icon"></i>
                                                 <p>Daftar Departemen</p>
                                            </a>
                                       </li>
                                       <li class="nav-item">
                                            <a href="<?= base_url('jabatan'); ?>" class="nav-link">
                                                 <i class="far fa-circle nav-icon"></i>
                                                 <p>Daftar Jabatan</p>
                                            </a>
                                       </li>
                                  </ul>
                             </li>
                             <li class="nav-item">
                                  <a href="<?= base_url(); ?>" class="nav-link">
                                       <i class="fas fa-ticket-alt nav-icon"></i>
                                       <p>
                                            Master Tiket
                                            <i class="fas fa-angle-left right"></i>
                                       </p>
                                  </a>
                                  <ul class="nav nav-treeview">
                                       <li class="nav-item">
                                            <a href="<?= base_url('Tiket'); ?>" class="nav-link">
                                                 <i class="far fa-circle nav-icon"></i>
                                                 <p>Tiket</p>
                                            </a>
                                       </li>
                                  </ul>
                             </li>
                             <li class="nav-header">LAPORAN TIKET</li>
                             <li class="nav-item">
                                  <a href=<?= base_url('Laporan'); ?> class="nav-link">
                                       <i class="nav-icon fas fa-file"></i>
                                       <p>Laporan</p>
                                  </a>
                             </li>
                             <li class="nav-header">MY PROFILE</li>
                             <li class="nav-item">
                                  <a href="<?= base_url('Karyawan/profile/' . $this->session->id_user); ?>" class="nav-link">
                                       <i class="fas fa-address-card nav-icon"></i>
                                       <p>Profile</p>
                                  </a>
                             </li>
                             <li class="nav-item">
                                  <a href="<?= base_url('Auth/logout'); ?>" class="nav-link">
                                       <i class="fas fa-sign-out-alt nav-icon"></i>
                                       <p>Logout</p>
                                  </a>
                             </li>
                        <?php } else { ?>
                             <li class="nav-item">
                                  <a href="<?= base_url('Tiket'); ?>" class="nav-link">
                                       <i class="fas fa-ticket-alt nav-icon"></i>
                                       <p>
                                            Data Tiket

                                       </p>
                                  </a>

                             </li>
                             <li class="nav-header">MY PROFILE</li>
                             <li class="nav-item">
                                  <a href="<?= base_url('Karyawan/profile/' . $this->session->id_user); ?>" class="nav-link">
                                       <i class="fas fa-address-card nav-icon"></i>
                                       <p>Profile</p>
                                  </a>
                             </li>
                             <li class="nav-item">
                                  <a href="<?= base_url('Auth/logout'); ?>" class="nav-link">
                                       <i class="fas fa-sign-out-alt nav-icon"></i>
                                       <p>Logout</p>
                                  </a>
                             </li>
                        <?php } ?>
                   </ul>
              </nav>
              <!-- /.sidebar-menu -->
         </div>
         <!-- /.sidebar -->
    </aside>