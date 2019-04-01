
  <!--==========================
    Intro Section
  ============================-->
  <section id="maintenances"  style="padding-top:200px;background: url('<?= base_url() ?>/assets/img/Rekaprima_49.jpg');" class="clearfix section-bg">
    <div class="container">

      <!-- <div class="intro-img">
        <img src="<?= base_url() ?>/assets/img/IMG_5602.jpg" alt="" class="img-fluid">
      </div> -->

      <div class="maintenances-info text-center">
          <h2><?= $news->judul ?></h2>
        <!-- <h2>We provide<br><span>solutions</span><br>for your business!</h2>
        <div>
          <a href="#about" class="btn-get-started scrollto">Get Started</a>
          <a href="#services" class="btn-services scrollto">Our Services</a>
        </div> -->
      </div>

    </div>
  </section><!-- #intro -->
  

  <main id="main">

    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
      <div class="container">

        <header class="section-header">
          <!-- <h3>VISI <strong>|</strong> MISI</h3> -->
          
        </header>
        <div class="row">
            <div class="col-md-4">
                <img src="<?= base_url() ?><?= $news->gambar ?>" width="100%" alt="">
            </div>
              <div class="col-md-8">
                    <p class="text-justify">
                        <?= $news->deskripsi ?>
                    </p>
              </div>
          </div>
      </div>
    </section><!-- #about -->

    <!--==========================
      Portfolio Section
    ============================-->
