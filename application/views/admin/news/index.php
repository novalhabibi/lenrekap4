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

       <?php if ($this->session->flashdata('successDelete')):?>
       <div class="alert alert-info alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('successDelete'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
       </div>
       <?php endif;?>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <a href="<?= site_url('admin/news/add') ?>" class="btn btn-info"><i class="fas fa-plus"></i> Add Data</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Judul</th>
                    <th>Gambar</th>
                    <th>Deskripsi</th>
                    <th>Tanggal posting</th>
                    <th>Penulis</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <!-- <tfoot>
                  <tr>
                    <th>Judul</th>
                    <th>Gambar</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                  </tr>
                </tfoot> -->
                <tbody>
                <?php foreach ($news as $new):?>
                  <tr>
                    <td><?= $new->judul ?></td>
                    <td>
                    <a href="<?= base_url() ?><?= $new->gambar ?>" data-toggle="lightbox" data-title="<?= $new->judul ?>">
                       Lihat gambar
                    </a>
                        
                    </td>
                    <td><?= substr($new->deskripsi,0,30) ?></td>
                    <td><?= $new->tgl_posting ?></td>
                    <td><?= $new->nama_admin ?></td>
                    
                    <td>
                        <a href="<?= site_url('admin/news/edit/'.$new->id) ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                        <a data-toggle="modal" onclick="deleteConfirm('<?= site_url('admin/news/hapus/'.$new->id) ?>')" href="#" class="btn btn-danger btn-sm"data-target="#deleteModal" >
                        <i class="fas fa-trash"></i>
                        Hapus</a>
                        <!-- <a href="#" data-toggle="modal" data-target="#deleteModal">Hapus</a> -->
                    </td>
                    
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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
    function deleteConfirm(url) {
        $('#btn-delete').attr('href',url);
        $('#deleteConfirm').modal();
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>

<script>
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
</script>


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
