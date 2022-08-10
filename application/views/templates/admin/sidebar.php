  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?= base_url() ?>" class="brand-link">
      <img src="<?= base_url('uploads/logo/') . $logo ?>" alt="Logo Kantor" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Kantor</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= $user_image ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?= base_url('profile') ?>" class="d-block"><?= $name ?></a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <?php if( $this->session->userdata('role_name') == 'admin' ): ?>
          <li class="nav-item">
            <a href="<?= base_url('admin/dashboard') ?>" class="nav-link" id="dashboard_index">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/profile') ?>" class="nav-link" id="profile_index">
              <i class="nav-icon fas fa-info-circle"></i>
              <p>
                Profil
              </p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="<?= base_url('admin/facilities') ?>" class="nav-link" id="facilities_index">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Fasilitas
              </p>
            </a>
          </li> -->
          <?php endif; ?>
          <li class="nav-item">
            <a href="<?= base_url('admin/sectors') ?>" class="nav-link" id="sectors_index">
              <i class="nav-icon fas fa-flask"></i>
              <p>
                Bidang
              </p>
            </a>
          </li>
          <li class="nav-header">Informasi</li>
          <li class="nav-item">
            <a href="<?= base_url('admin/articles') ?>" class="nav-link" id="articles_index">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Berita
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/announcements') ?>" class="nav-link" id="announcements_index">
              <i class="nav-icon fas fa-bullhorn"></i>
              <p>
                Informasi
              </p>
            </a>
          </li>
          <li class="nav-header">Galeri</li>
          <li class="nav-item">
            <a href="<?= base_url('admin/galleries') ?>" class="nav-link" id="galleries_index">
              <i class="nav-icon fas fa-image"></i>
              <p>
                Foto
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/videos') ?>" class="nav-link" id="videos_index">
              <i class="nav-icon fas fa-video"></i>
              <p>
                Video
              </p>
            </a>
          </li>
          <li class="nav-header"></li>
          <li class="nav-item">
            <a href="<?= base_url('admin/documents') ?>" class="nav-link" id="documents_index">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Regulasi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/messages') ?>" class="nav-link" id="messages_index">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Jejak Pendapat
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>