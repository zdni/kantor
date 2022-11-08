<main id="main">

<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2><?= $title ?></h2>
      <ol>
        <li><a href="<?= base_url() ?>">Beranda</a></li>
        <li>Galeri</li>
        <li><?= $title ?></li>
      </ol>
    </div>

  </div>
</section><!-- End Breadcrumbs Section -->

<section class="doctors">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <?php foreach ($datas as $data) { ?>
          <div class="col-lg-6">
            <div class="member d-flex align-items-start">
              <?php if( $title == 'Galeri Foto' ): ?>
                <div class="pic" style="border-radius: 0px;"><img src="<?= base_url('uploads/galleries/') . $data->image ?>" class="img-fluid" alt=""></div>
              <?php endif; ?>
              <?php if( $title == 'Galeri Video' ): ?>
                <?php $explode = explode( "v=", $data->link ); $id = $explode[1]; $source = "http://img.youtube.com/vi/" . $id . "/0.jpg" ?>
                <div class="pic" style="border-radius: 0px;"><img src="<?= $source ?>" class="img-fluid" alt=""></div>
              <?php endif; ?>
              <div class="member-info">
                <?php if( $title == 'Galeri Foto' ): ?>
                  <a href="<?= base_url('dashboard/galleries/') . $data->id ?>">
                    <h4><?= $data->title ?></h4>
                  </a>
                  <span><?= date( 'd M Y', strtotime($data->post_date) ) ?></span>
                  <p><?= $data->description ?></p>
                <?php endif; ?>
                <?php if( $title == 'Galeri Video' ): ?>
                  <h4><?= $data->title ?></h4>
                  <a href="<?= $data->link ?>" target="_blank" class="btn btn-sm btn-outline-secondary">Tonton Video</a>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>

</main><!-- End #main -->