  <!-- ======= Hero Section ======= -->
  <img src="<?= base_url('uploads/heros/') . $heros[0]->image ?>" alt="" style="width: 100%; position: absolute; top: -1000px" id="image_hero">
  <section id="hero" class="d-flex align-items-center" style="background: url('<?= base_url('uploads/heros/') . $heros[0]->image ?>') top center; background-size: cover;">
  </section><!-- End Hero -->
  <main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>Why Choose Medilab?</h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                Asperiores dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel necessitatibus optio ad corporis.
              </p>
              <div class="text-center">
                <a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4>Corporis voluptates sit</h4>
                    <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-cube-alt"></i>
                    <h4>Ullamco laboris ladore pan</h4>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-images"></i>
                    <h4>Labore consequatur</h4>
                    <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">
          <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative" style='background: url("<?= base_url('uploads/heros/') . $heros[1]->image ?>") center center no-repeat; background-size: cover;'>
          </div>

          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
            <h3><?= $profile->title ?></h3>
            <?= $profile->file_content ?>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">

        <div class="row">
          <?php foreach ($counts as $count) { ?>
            <div class="col-lg-3 col-md-6">
              <div class="count-box">
                <i class="<?= $count->icon ?>"></i>
                <span data-purecounter-start="0" data-purecounter-end="<?= $count->total ?>" data-purecounter-duration="1" class="purecounter"></span>
                <p><?= $count->label ?></p>
              </div>
            </div>
          <?php } ?>
        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Berita</h2>
          <a href="<?= base_url('dashboard/articles') ?>">Lihat Lainnya...</a>
        </div>

        <div class="row">
          <?php foreach ($articles as $article) { ?>
            <div class="col-12 col-md-4">
              <div class="card">
                <img src="<?= base_url('uploads/articles/thumbnails/') . $article->thumbnail ?>" class="card-img-top" alt="<?= "Gambar " . $article->title ?>">
                <div class="card-body">
                  <h5 class="card-title"><?= $article->title ?></h5>
                  <p class="card-text"><?= $article->description ?></p>
                  <a href="<?= base_url('dashboard/article?slug=') . $article->slug ?>" class="btn btn-primary">Baca Selengkapnya</a>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Doctors Section ======= -->
    <section id="doctors" class="doctors">
      <div class="container">

        <div class="section-title">
          <h2>Foto & Video</h2>
          <a href="<?= base_url('dashboard/gallery?slug=photos') ?>">Lihat Lainnya...</a>
        </div>

        <div class="row">
          <?php foreach( $galleries as $gallery ){ ?>
            <div class="col-lg-6">
              <div class="member d-flex align-items-start">
                <div class="pic"><img src="<?= base_url('uploads/galleries/') . $gallery->image ?>" class="img-fluid" alt=""></div>
                <div class="member-info">
                  <h4><?= $gallery->title ?></h4>
                  <span><?= date( 'd M Y', strtotime($gallery->post_date) ) ?></span>
                  <p><?= $gallery->description ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>

        <hr>

        <div class="row">
          <?php foreach( $videos as $video ){ ?>
            <div class="col-lg-6">
              <div class="member d-flex align-items-start">
                <?php $explode = explode( "v=", $video->link ); $id = $explode[1]; $source = "http://img.youtube.com/vi/" . $id . "/0.jpg" ?>
                <div class="pic"><img src="<?= $source ?>" class="img-fluid" alt=""></div>
                <div class="member-info">
                  <h4><?= $video->title ?></h4>
                  <a href="<?= $video->link ?>" target="_blank" class="btn btn-sm btn-outline-secondary">Tonton Video</a>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>

      </div>
    </section><!-- End Doctors Section -->

    <!-- ======= Departments Section ======= -->
    <section id="departments" class="departments">
      <div class="container">

        <div class="section-title">
          <h2>Bidang</h2>
        </div>

        <div class="row gy-4">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <?php $number = 1; foreach ($sectors as $sector) { ?>
                <li class="nav-item">
                  <a class="nav-link <?php if($number == 1) echo 'active show' ?>" data-bs-toggle="tab" href="#<?= $sector->slug ?>"><?= $sector->name ?></a>
                </li>
              <?php $number++; } ?>
            </ul>
          </div>
          <div class="col-lg-9">
            <div class="tab-content">
              <?php $number = 1; foreach ($sectors as $sector) { ?>
                <div class="tab-pane <?php if($number == 1) echo 'active show' ?>" id="<?= $sector->slug ?>">
                  <div class="row gy-4">
                    <div class="details order-2 order-lg-1">
                      <h3><?= $sector->name ?></h3>
                      <?php
                      if( file_exists( './uploads/sectors/' . $sector->file ) && $sector->file )
                      {
                          echo file_get_contents( './uploads/sectors/' . $sector->file );
                      }
                      ?>
                    </div>
                  </div>
                </div>
              <?php $number++; } ?>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Departments Section -->

  </main><!-- End #main -->

  <script>
    const window_width = window.screen.width;
    if( window_width < 992 ) {
      const image_hero = document.getElementById('image_hero');
      const section_hero = document.getElementById('hero');
      section_hero.style.height = image_hero.height + 'px';
      section_hero.style.marginTop = '110px';
    }
  </script>
  