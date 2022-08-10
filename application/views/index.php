  <img src="<?= base_url('uploads/heros/') . $heros[0]->image ?>" alt="" style="width: 100%; position: absolute; top: -1000px" id="image_hero">
  <!-- <section id="hero" class="d-flex align-items-center" style="background: url('<?= base_url('uploads/heros/') . $heros[0]->image ?>') top center; background-size: cover;">
  </section> -->
  <section id="hero" class="d-flex align-items-center">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" style="width: 100%;">
      <div class="carousel-inner">
        <?php $number = 1; foreach ($heros as $hero) { ?>
          <div class="carousel-item <?php if( $number == 1 ) echo 'active' ?>">
            <img src="<?= base_url('uploads/heros/') . $hero->image ?>" class="d-block w-100" alt="...">
          </div>
        <?php $number++; } ?>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next text-black" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </section>
  <main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us" style="position: relative;">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>Sambutan</h3>
              <p>
                Assalamualaikum wr wb.
              </p>
			  <p>
                Selamat Datang di Badan Keuangan dan Aset Daerah (BKAD)Pemerintah Kabupaten Konawe Utara, 
				harapan kami dengan adanya website ini agar masyarakat mendapatkan kemudahan dalam mengakses data dan informasi terkait dokumen dan produk BKAD.
					Data dan Informasi dalam web ini adalah berasal dari dokumen dan produk BKAD terkait dengan pengelolaan keuangan dan aset daerah
					yang akan kami upayakan selalu di update sehingga bermanfaat bagi masyarakat dan pihak lain guna mendukung dalam pembangunan daerah ini.
					Semoga apa yang kita kerjakan untuk kesejahteraan masyarakat akan selalu mendapatkan ridho tuhan yang maha esa, amin.
              </p>
              <div class="text-center">
                <a href="#" class="more-btn">
                    <h4>Kepala Badan Keuangan dan Aset Daerah (BKAD)</h4>
                    <p>Ir. Marten Minggu, SP.,M.Si.,IPM</p>
                    <hr></hr>
                    <h4>Sekretaris</h4>
                    <p>Adonan, SE.,M.Si</p>
                    <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4>Kasubag Umum & Kepegawaian</h4>
                    <p>Nova Riyanti Baso, SE</p>
                    <hr></hr>
                    <h4>Kasubag Perencanaan & Keuangan</h4>
                    <p>Rosnani, SE</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-cube-alt"></i>
                    <h4>Kepala Bidang Anggaran</h4>
                    <p>Rastin. S.SI.,MM</p>
                    <hr></hr>
                    <h4>Kepala Bidang Perbendaharaan</h4>
                    <p>Ir. Arni Abdul Wahid, SP</p>
                    <hr></hr>
                    <h4>Kepala Bidang Akuntansi</h4>
                    <p>Jaenuddin, SE.,MM</p>
                    <hr></hr>
                    <h4>Kepala Bidang Aset</h4>
                    <p>Rury Kurniawan, S.Sos.,MAP</p>
                    </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-images"></i>
                    <h4>Kepala Sub Bidang</h4>
                    <p>1. Ir. Kaharuddin, ST.,ME</p>
					<p>2. Asriani, SPd</p>
					<p>3. Razky Kurniawan, SE</p>
					<p>4. Ashar Harun, SE</p>
					<p>5. Dian Syastranita, SE.,ME</p>
					<p>6. Hardin, S.Kom</p>
					<p>7. Agus Ramadan Saranani, SE</p>
					<p>8. Suparman, SE.,ME</p>
					<p>9. Muh. Nur Samsir, SP</p>
					<p>10. Asrianti, S.Kom</p>
					<p>11. Cory Monalisa, SPd.,MM</p>
					<p>12. Tony Herbiansyah, SKM</p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->


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

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">
          <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative" style='background: url("<?= base_url('uploads/heros/') . $about->image ?>") center center no-repeat; background-size: cover;'>
          </div>

          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
            <h3><?= $profile->title ?></h3>
            <?= $profile->file_content ?>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <section id="counts" class="counts">
      <div class="container">
        <div class="row">
          <div class="section-title">
		  <h2>Jejak Pendapat</h2>
          <a href="<?= base_url('dashboard/contact_us') ?>">Mulai Jejak Pendapat</a> 
        </div>

        </div>
      </div>
    </section><!-- End Jejak pendapat Section -->


    <div class="container mt-5 pt-5">
      <article> 
        <iframe width="100%" height="444" src="https://www.youtube.com/embed/Bnk5fnFCxrc" title="11 TAHUN KONAWE UTARA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>	
      </article>
    </div>
        
    <section id="testimonials" class="testimonials">
      <div class="container">

        <div class="section-title">
          <h2>Berita</h2>
          <a href="<?= base_url('dashboard/articles') ?>">Berita Lainnya</a>
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

          <?php foreach ($articles as $article) { ?>
            <div class="swiper-slide" style="">
              <div class="card">
                <img src="<?= base_url('uploads/articles/thumbnails/') . $article->thumbnail ?>" class="card-img-top" alt="<?= "Gambar " . $article->title ?>">
                <div class="card-body">
                  <h5 class="card-title"><?= $article->title ?></h5>
                  <p class="card-text"><?= $article->description ?></p>
                  <a href="<?= base_url('dashboard/article?slug=') . $article->slug ?>" class="">Selengkapnya</a>
                </div>
              </div>
            </div>
          <?php } ?>

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section>

    <!-- ======= Doctors Section ======= -->
    <section id="doctors" class="doctors">
      <div class="footer-top" style="background: #ffffff !important">  
	  <div class="container">
        <div class="section-title">
		
          <h2>Foto & Video</h2>
          <a href="<?= base_url('dashboard/gallery?slug=photos') ?>">Foto Lainnya</a> 
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
		<div class="section-title">
		<a href="<?= base_url('dashboard/gallery?slug=videos') ?>">Video Lainnya</a>
		<pre></pre>
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

  </main><!-- End #main -->

  <div style="width: 100%; min-height: 100vh; position: fixed; z-index: 1000; background-color: rgba(0,0,0,0.7); display: block; top: 0; text-align: center; padding-top: 100px;" id="div-popup">
    <img src="<?= base_url('uploads/heros/') . $popup->image ?>" alt="" style="width: 80%; max-width: 600px; margin: auto">
    <i class="bx bx-x" style="font-size: 30px; color: red; position: fixed; top: 80px; cursor: pointer;" id="close-popup"></i>
  </div>
  
  <script>
    const window_width = window.screen.width;
    if( window_width < 992 ) {
      const image_hero = document.getElementById('image_hero');
      const section_hero = document.getElementById('hero');
      section_hero.style.height = image_hero.height + 'px';
      section_hero.style.marginTop = '110px';
    }

    const divPopup = document.getElementById('div-popup');
    divPopup.addEventListener('click', function() {
      divPopup.style.display = 'none';
    });
    const iconClosePopup = document.getElementById('close-popup');
    iconClosePopup.addEventListener('click', function() {
      iconClosePopup.style.display = 'none';
    });
  </script>