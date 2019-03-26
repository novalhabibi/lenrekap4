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
        <?php $this->load->view("admin/_includes/breadcrumbs.php") ?>

        <!-- DataTables Example -->
<div class="card card-info">
                        <div class="card-header bg-info">
                            Tambah data training
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="<?= site_url('admin/trainings/tambah') ?>" method="post">
                                        <div class="form-group">
                                            <label>Nama Training</label>
                                            <input class="form-control" name="nama_training" placeholder="Nama training">
                                        </div>
                                        <div class="form-group">
                                            <label>Link</label>
                                            <input class="form-control" name="link_training" placeholder="link training">
                                        </div>
                                        <div class="form-group">
                                            <label>Gambar training</label>
                                            <input type="file" accept="image/*" name="gambar_training">
                                        </div>
                                        <div class="form-group">
                                            <label>Text area</label>
                                            <textarea class="form-control" name="deskripsi" rows="3"></textarea>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-info">Simpan</button>
                                        
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <br>
                    <!-- /.card -->
                </div>
        




        
      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <?php $this->load->view("admin/_includes/footer.php"); ?>


    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

<?php $this->load->view("admin/_includes/scrolltop.php"); ?>



<?php $this->load->view("admin/_includes/modal.php"); ?>
<?php $this->load->view("admin/_includes/js.php"); ?>

</body>

</html>
