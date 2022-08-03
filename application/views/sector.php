   <main id="main">

    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2><?= $sector->name ?></h2>
          <ol>
            <li><a href="<?= base_url() ?>">Beranda</a></li>
            <li>Bidang</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-12 order-2 order-lg-1 pt-4 pt-lg-0">
            <aside class="sidebar">
              <div class="px-3 mb-4">
                <h3 class="text-color-secondary text-capitalize font-weight-bold text-5 m-0 mb-3">Bidang</h3>
                <ul class="nav nav-list flex-column mb-0 p-relative right-9">
                  <?php foreach ($menu_sectors as $menu_sector) { ?>
                    <li class="nav-item"><a class="nav-link font-weight-bold text-primary text-3 border-0 my-1 p-relative" href="<?= base_url('dashboard/sector?slug=') . $menu_sector->slug ?>"><?= $menu_sector->name ?></a></li>
                  <?php } ?>
                </ul>
              </div>

              <div class="pb-1 clearfix">
                <hr class="my-2">
              </div>

            </aside>
          </div>
          <div class="col-lg-9 col-12 order-1 order-lg-2">
            <h1><?= $sector->name ?></h1>
            <?= $sector->file_content ?>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->