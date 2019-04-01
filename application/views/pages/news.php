
  <!--==========================
    Intro Section
  ============================-->
  <section id="maintenances"  style="padding-top:200px;background: url('<?= base_url() ?>/assets/img/Rekaprima_49.jpg');" class="clearfix section-bg">
    <div class="container">

      <!-- <div class="intro-img">
        <img src="<?= base_url() ?>/assets/img/IMG_5602.jpg" alt="" class="img-fluid">
      </div> -->

      <div class="maintenances-info text-center">
          <h2>News</h2>
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
    
    <!--==========================
      Services Section
    ============================-->
    <section id="portfolio" class="section-bg">
      <div class="container">

        <header class="section-header">
          <h3 class="section-title">News</h3>
        </header>

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">

    <?php
        $data = $this->db->get("news")->result();

        foreach ($data as $news) {
          # code...
        
        ?>
          <div class="col-lg-4 col-md-6 portfolio-item *">
            <div class="portfolio-wrap">
              <img src="<?= base_url() ?><?= $news->gambar?>" class="img-fluid" alt="">
              <div class="portfolio-info">
                
                <p><?= $news->judul?></p>
                <div>
                  <a href="<?= base_url() ?><?= $news->gambar?>" data-lightbox="portfolio" data-title="<?= $news->judul?>" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
                  <a href="<?= base_url('news/') ?><?= $news->slug?>" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                </div>
              </div>
            </div>
          </div>
<?php
        }
        ?>



        </div>

      </div>
    </section><!-- #services -->

  

 