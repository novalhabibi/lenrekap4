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
                Setting Web Frontend
            </div>
            <div class="card-body">
                <form action="<?= base_url('admin/update_setting') ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $setting->id ?>">
                    
                    <div class="form-group">
                        <label for="title">Title </label>
                        <input type="text" class="form-control" name="title" value="<?= $setting->title ?>" >
                    </div>
                    
                    <div class="form-group">
                        <label for="favicon">Favico</label>
                        <img src="<?= base_url()?><?= $setting->favicon ?>" alt="<?= $setting->favicon ?>">
                        <input type="hidden" name="favicon_lama" value="<?= $setting->favicon ?>">
                        <input type="file" accept=".ico" class="form-control-file" name="favicon">
                        
                    </div>

                    <div class="form-group">
                        <label for="logo">Logo</label>
                        <img src="<?= base_url()?><?= $setting->logo ?>" alt="<?= $setting->logo ?>">
                        <input type="hidden" name="logo_lama2" value="<?= $setting->logo ?>">
                        <input type="file" accept="image/*" class="form-control-file" name="logo">
                    </div>

                    <div class="form-group">
                        <label for="Misi">Visi</label>
                        <textarea name="visi" id="visi" cols="10" rows="5" class="form-control"><?= $setting->visi ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="misi">Misi</label>
                        <textarea name="misi" id="misi" cols="10" rows="5" class="form-control"><?= $setting->misi ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" cols="5" rows="2" class="form-control"><?= $setting->alamat ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="email">Email </label>
                        <input type="email" class="form-control" name="email" value="<?= $setting->email ?>" >
                    </div>
                    <div class="form-group">
                        <label for="no_telpon">No Telpon </label>
                        <input type="text" class="form-control" name="no_telpon" value="<?= $setting->no_telpon ?>" >
                    </div>
                    

                    <input type="submit" name="submit" value="Update" class="btn btn-success">

                </form>
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
<script>

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
</script>
<?php if($this->session->flashdata('success')==True): ?>
  <script>
  toastr.success("<?= $this->session->flashdata('success'); ?>");
  </script>

<?php endif; ?>
</body>

</html>
