  <main id="main">

    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2><?= $download->header ?></h2>
          <ol>
            <li><a href="<?= base_url() ?>">Beranda</a></li>
            <li>Regulasi</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="services">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="col-lg-3 col-md-4 d-flex align-items-stretch">
              <?php foreach ($documents as $document) { ?>
                <div class="icon-box">
                  <div class="icon"><i class="fas fa-file"></i></div>
                    <h4><a href="<?= base_url('uploads/documents/') . $document->file ?>" target="_blank" ><?= $document->title ?></a></h4>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->