
  <!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="clearfix" style="padding-top:80px">
    <div class="owl-carousel owl-theme owl-height">
      <div class="item">
        <div class="row">
            <div class="col-md-12"> 
              <img src="<?= base_url() ?>/assets/img/IMG_5602.jpg" alt="" class="" height="80%" width="100%" >            
              
              <div class="caption">
                <div class="caption-info">

                  <h1 class="animated bounce"><a href="#">Third Caption 1</a></h1>
                  <h2 class="animated bounce">We provide<br><span>solutions</span><br>for your business!</h2>
                </div>
              </div>

              <!-- <div class="intro-info">
                <h2>We provide<br><span>solutions</span><br>for your business!</h2>
                <div>
                  <a href="#about" class="btn-get-started scrollto">Get Started</a>
                  <a href="#services" class="btn-services scrollto">Our Services</a>
                </div>
              </div> -->



            </div>
        </div>
      </div>

      <div class="item">
        <div class="row">
          <div class="col-md-12">
            <img src="<?= base_url() ?>/assets/img/IMG_5717.jpg" alt="" class="" height="80%" width="100%">
            <div class="caption">
              <h1 class="animated bounce"><a href="#">Third Caption 2 dadas</a></h1>
              <h2 class="animated bounce">We provide<br><span>solutions</span><br>for your business!</h2>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section><!-- #intro -->
  

  <main id="main">
    <!--==========================
      Portfolio Section
    ============================-->
    <section id="portfolio" class="clearfix">
      <div class="container">

        <header class="section-header">
          <h3 class="section-title">Our Products</h3>
        </header>

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".maintenances">Maintenances</li>
              <li data-filter=".services">Services</li>
              <li data-filter=".trainings">Trainings</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">

        <?php
        $data = $this->db->get("maintenances")->result();

        foreach ($data as $maintenance) {
          # code...
        
        ?>
          <div class="col-lg-4 col-md-6 portfolio-item maintenances">
            <div class="portfolio-wrap">
              <img src="<?= base_url() ?><?= $maintenance->gambar_maintenance ?>" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h5><a href="#"><?= $maintenance->nama_maintenance ?></a></h5>
                <p></p>
                <div>
                  <a href="<?= base_url() ?><?= $maintenance->gambar_maintenance ?>" data-lightbox="portfolio" data-title="App 1" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
                  <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                </div>
              </div>
            </div>
          </div>
        <?php
        }
        ?>


        <?php
        $data = $this->db->get("services")->result();

        foreach ($data as $service) {
          # code...
        
        ?>
          <div class="col-lg-4 col-md-6 portfolio-item services">
            <div class="portfolio-wrap">
              <img src="<?= base_url() ?><?= $service->gambar_service ?>" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h5><a href="#"><?= $service->nama_service ?></a></h5>
                <p>App</p>
                <div>
                  <a href="<?= base_url() ?><?= $service->gambar_service ?>" data-lightbox="portfolio" data-title="App 1" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
                  <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                </div>
              </div>
            </div>
          </div>
        <?php
        }
        ?>

        <?php
        $data = $this->db->get("trainings")->result();

        foreach ($data as $training) {
          # code...
        
        ?>
          <div class="col-lg-4 col-md-6 portfolio-item trainings">
            <div class="portfolio-wrap">
              <img src="<?= base_url() ?><?= $training->gambar_training ?>" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h5><a href="#"><?= $training->nama_training ?></a></h5>
                <p>App</p>
                <div>
                  <a href="<?= base_url() ?><?= $training->gambar_training ?>" data-lightbox="portfolio" data-title="App 1" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
                  <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                </div>
              </div>
            </div>
          </div>
        <?php
        }
        ?>



        </div>

      </div>
    </section><!-- #portfolio -->

    <!--==========================
      Clients Section
    ============================-->
 
    <!--==========================
      Team Section
    ============================-->
   