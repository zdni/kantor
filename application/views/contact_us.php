<main id="main">

<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Tuliskan Pendapat Anda</h2>
      <ol>
        <li><a href="<?= base_url() ?>">Beranda</a></li>
        <li>Jejak Pendapat</li>
      </ol>
    </div>

  </div>
</section><!-- End Breadcrumbs Section -->

<!-- ======= Contact Section ======= -->
<section id="kontak-kami" class="contact">
  <div class="container">

    <div class="section-title">
      <h2>Jejak Pendapat</h2>
    </div>
  </div>

  <div class="container">
    <div class="row mt-5">

      <div class="col-lg-4">
        <div class="info">
          <div class="address">
            <i class="bi bi-geo-alt"></i>
            <h4>Pertanyaan?</h4>
            <p>Bagaimana pendapat anda mengenai tampilan Website BKAD Pemerintah Kabupaten Konawe Utara?</p>
          </div>

          <div class="email">
            <i class="bi bi-envelope"></i>
            <h4>Jawaban</h4>
            <p>Silahkan pilih dan isikan jawaban anda berdasarkan pilihan anda (Sangat Baik/Baik/Biasa/Kurang Menarik)</p>
          </div>

          <div class="phone">
            <i class="bi bi-phone"></i>
            <h4>Kontak Kami</h4>
            <p>Jika terdapat pertanyaan silahkan hubungi kami melalui Email atau Kontak WA/HP</p>
          </div>
    
        </div>

      </div>

      <div class="col-lg-8 mt-5 mt-lg-0">

        <form action="<?= base_url('dashboard/send_message') ?>" method="post">
          <div class="row justify-content-around">
            <div class="icon-rating" style="width: 103px; text-align: center; cursor: pointer;" data="Kurang Menarik">
              <div class="icon-box" style="color: blue; font-size: 37px; padding: 10px; border-radius: 50px; border: 1px solid blue;">
                <div class="icon"><i class="bx bx-sad"></i></div>
              </div>
              <b>Kurang Menarik</b>
            </div>
            <div class="icon-rating" style="width: 103px; text-align: center; cursor: pointer;" data="Biasa">
              <div class="icon-box" style="color: blue; font-size: 37px; padding: 10px; border-radius: 50px; border: 1px solid blue;">
                <div class="icon"><i class="bx bx-face"></i></div>
              </div>
              <b>Biasa</b>
            </div>
            <div class="icon-rating" style="width: 103px; text-align: center; cursor: pointer;" data="Baik">
              <div class="icon-box" style="color: blue; font-size: 37px; padding: 10px; border-radius: 50px; border: 1px solid blue;">
                <div class="icon"><i class="bx bx-smile"></i></div>
              </div>
              <b>Baik</b>
            </div>
            <div class="icon-rating" style="width: 103px; text-align: center; cursor: pointer;" data="Sangat Baik">
              <div class="icon-box" style="color: blue; font-size: 37px; padding: 10px; border-radius: 50px; border: 1px solid blue;">
                <div class="icon"><i class="bx bx-happy-beaming"></i></div>
              </div>
              <b>Sangat Baik</b>
            </div>
          </div>
          <input type="hidden" name="rating" id="rating" required>
          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Jika ada Pendapat lain, silahkan kolom ini diisi (*opsional)" required></textarea>
          </div>
          <div class="text-center mt-3"><button type="submit" class="btn btn-primary">Kirim Pendapat</button></div>
        </form>

      </div>

    </div>

  </div>
</section><!-- End Contact Section -->

</main><!-- End #main -->

<script>
  const ratings = document.getElementsByClassName( 'icon-rating' );
  const inputRating = document.getElementById('rating');
  
  for (let index = 0; index < ratings.length; index++) {
    const rating = ratings[index];

    rating.addEventListener('click', function() {
      setNonActiveRating();

      rating.children[0].style.color = 'white';
      rating.children[0].style.backgroundColor = 'blue';
      
      inputRating.value = '';  
      inputRating.value = rating.attributes[2].value;  
    });
  }

  function setNonActiveRating()
  {
    for (let index = 0; index < ratings.length; index++) {
     const rating = ratings[index];
      rating.children[0].style.color = 'blue';
      rating.children[0].style.backgroundColor = 'white';
    }
  }
</script>