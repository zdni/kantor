<main id="main">

<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Kontak Kami</h2>
      <ol>
        <li><a href="<?= base_url() ?>">Beranda</a></li>
        <li>Kontak Kami</li>
      </ol>
    </div>

  </div>
</section><!-- End Breadcrumbs Section -->

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