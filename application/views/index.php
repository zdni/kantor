  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="background: url('<?= base_url('uploads/heros/') . $heros[0]->image ?>') top center; background-size: cover;">
    <div class="container">
    </div>
  </section><!-- End Hero -->
  <main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container"></div>
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

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="fas fa-newspaper"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?= $total->article ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Berita</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
            <div class="count-box">
              <i class="far fa-hospital"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?= $total->sector ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Bidang</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="fas fa-flask"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?= $total->gallery ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Galeri</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="fas fa-award"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?= $total->document ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Regulasi</p>
            </div>
          </div>

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
          <a href="<?= base_url('dashboard/photos') ?>">Lihat Lainnya...</a>
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
                      if( file_exists( './uploads/sectors/' . $sector->file ) )
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

    <!-- ======= Contact Section ======= -->
    <section id="kontak-kami" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Kontak Kami</h2>
        </div>
      </div>

      <div class="container">
        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Alamat:</h4>
                <p><?= $alamat ?></p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p><?= $email ?></p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Telepon:</h4>
                <p><?= $telepon ?></p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="<?= base_url('dashboard/send_message') ?>" method="post">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-6 form-group">
                  <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone Number" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="text-center mt-3"><button type="submit" class="btn btn-primary">Kirim Pesan</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  