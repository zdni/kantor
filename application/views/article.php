  <main id="main">

    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2><?= $article->title ?></h2>
          <ol>
            <li><a href="<?= base_url() ?>">Beranda</a></li>
            <li><a href="<?= base_url('dashboard/articles') ?>">Berita</a></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
      <div class="container">
        <div class="row">
          <div class="col-lg-9">

          <article>
            <div class="card border-0 border-radius-0 mb-5 box-shadow-1">
              <div class="card-body p-4 z-index-1">
                <p class="text-uppercase text-1 mb-3 text-color-default"><time pubdate datetime="<?= $article->post_date ?>"><?= date('d M Y', strtotime( $article->post_date )) ?></time> <span class="opacity-3 d-inline-block px-2">|</span> <?= $article->username ?></p>

                <div class="post-image pb-4">
                  <img class="card-img-top border-radius-0" src="<?= base_url('uploads/articles/thumbnails/') . $article->thumbnail  ?>" alt="Thumbnail Berita">
                </div>

                <div class="card-body p-0">
                  <?= $article->file_content ?>
              </div>
            </div>
          </article>

          </div>
          <div class="col-lg-3">
            <aside class="sidebar">
              <div class="px-3 mb-4">
                <h3 class="text-color-secondary text-capitalize font-weight-bold text-5 m-0 mb-3">Berita Terkini</h3>
                <ul class="nav nav-list flex-column mb-0 p-relative right-9">
                <?php foreach ($new_articles as $new_article) { ?>
                  <a style="font-size: 12px; color: black;" href="<?= base_url('dashboard/article?slug=') . $new_article->slug ?>" class="text-uppercase mb-0 d-block text-decoration-none"><?= date('d M Y', strtotime( $new_article->post_date )) ?> <span class="opacity-3 d-inline-block px-2">|</span> <?= $new_article->username ?></a>
                  <a href="<?= base_url('dashboard/article?slug=') . $new_article->slug ?>" class="text-hover-primary font-weight-bold text-3 d-block pb-3 line-height-4"><?= $new_article->title ?></a>
                <?php } ?>
                </ul>
              </div>

              <div class="pb-1 clearfix">
                <hr class="my-2">
              </div>

            </aside>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->