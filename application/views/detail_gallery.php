  <main id="main">

    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2><?= $data->title ?></h2>
          <ol>
            <li><a href="<?= base_url() ?>">Beranda</a></li>
            <li><a href="<?= base_url('dashboard/gallery?slug=photos') ?>">Galeri Foto</a></li>
          </ol>
        </div>

      </div>
    </section>

    <section class="inner-page">
      <div class="container">
        <div class="row">
          <div class="col-lg-9">
            <a href="<?= base_url('dashboard/gallery?slug=photos') ?>" class="mb-5 btn btn-outline-secondary btn-sm">Kembali</a>
            <article>
              <div class="card border-0 border-radius-0 mb-5 box-shadow-1">
                <div class="card-body p-4 z-index-1">
                  <p class="text-uppercase text-1 mb-3 text-color-default"><time pubdate datetime="<?= $data->post_date ?>"><?= date('d M Y', strtotime( $data->post_date )) ?></time></p>

                  <div class="post-image pb-4">
                    <img class="card-img-top border-radius-0" src="<?= base_url('uploads/galleries/') . $data->image  ?>" alt="Foto">
                  </div>

                  <div class="card-body p-0">
                    <?= $data->description ?>
                </div>
              </div>
            </article>

          </div>
          <div class="col-lg-3">
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->