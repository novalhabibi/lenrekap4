<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("admin/_includes/head.php") ?>

<body id="page-top">

  <?php $this->load->view("admin/_includes/navbar.php") ?>

  <div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view("admin/_includes/sidebar.php") ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
       <?php $this->load->view("admin/_includes/breadcrumb.php") ?>

       <?php if ($this->session->flashdata('success')):?>
       <div class="alert alert-success" role="alert">
            <?= $this->session->flashdata('success'); ?>
       </div>
        <?php endif;?>

    
        <div class="card mb-3">
            <div class="card-header">
                <a href="<?= site_url('admin/news') ?>" class="btn btn-warning"> <i class="fas fa-arrow-left">Kembali</i>  </a>
            </div>
            <div class="card-body">
                <form action="<?= base_url('admin/news/update') ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $news->id ?>">
                    <input type="hidden" name="tgl_posting" value="<?= $news->tgl_posting ?>">
                    <div class="form-group">
                        <label for="judul">Judul </label>
                        <input type="text" class="form-control <?= form_error('judul')?'is-invalid':'' ?>" name="judul" value="<?= $news->judul ?>" >
                        <div class="invalid-feedback">
                            <?= form_error('judul') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        
                        <img src="<?= base_url() ?><?= $news->gambar ?>" alt="No img" width="50%" height="50%">
                    </div>
                    
                    <div class="form-group">
                        <label for="gambar">Ganti gambar</label>
                        <input type="hidden" name="gambar_lama" value="<?= $news->gambar ?>">
                        <input type="file" accept="image/*" class="form-control-file <?= form_error('gambar')?'is-invalid':'' ?>" name="gambar">
                        <div class="invalid-feedback">
                            <?= form_error('gambar') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control <?= form_error('deskripsi')?'is-invalid':'' ?>"><?= $news->deskripsi ?></textarea>
                        <div class="invalid-feedback">
                            <?= form_error('deskripsi') ?>
                        </div>
                    </div>
                    

                    <input type="submit" name="submit" value="Simpan" class="btn btn-success">

                </form>
            </div>

            <div class="card-footer small text-muted">
                * harus diisi
            </div>


        </div>



      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
     <?php  $this->load->view("admin/_includes/footer.php"); ?>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <?php $this->load->view("admin/_includes/scrolltop.php"); ?>

  <!-- Logout Modal-->
  <?php $this->load->view("admin/_includes/modal.php"); ?>
  <!-- Bootstrap core JavaScript-->
  <?php $this->load->view("admin/_includes/js.php"); ?>
</body>

</html>
