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
                            Edit data service
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                <?php echo validation_errors(); ?>

                                <?php echo form_open_multipart('admin/services/update'); ?>
                                    
                                        <div class="form-group">
                                            <label>Nama service</label>
                                            <input type="hidden" name="id" value="<?= $service->id ?>">
                                            <input class="form-control" name="nama_service" value="<?= $service->nama_service ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Link</label>
                                            <input  class="form-control" disabled name="link_service" value="<?= $service->link_service ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Gambar service</label>
                                            <input type="hidden" name="gambar_lama" value="<?= $service->gambar_service ?>">
                                            <img src="<?= base_url() ?><?= $service->gambar_service ?>" alt="No Image" width="50%" height="50%">
                                        </div>
                                        <div class="form-group">
                                            <label>Ganti gambar service</label>
                                            <input type="file" accept="image/*" name="gambar_service">
                                        </div>
                                        <div class="form-group">
                                            <label>Text area</label>
                                            <textarea class="form-control" name="deskripsi" rows="3"><?= $service->deskripsi ?></textarea>
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
