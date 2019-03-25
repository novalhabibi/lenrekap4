<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("admin/_includes/head.php") ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">

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
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Trainings</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Nama Training</th>
                    <th>Gambar</th>
                    <th>Deskrpisi</th>
                    <th>Link</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                foreach ($trainings as $training) {
                ?>
                  <tr>
                    <td><?= $training->nama_training ?></td>
                    <td>
                        
                    <a href="<?= base_url() ?><?= $training->gambar_training ?>" data-toggle="lightbox" data-title="<?= $training->nama_training ?>" data-footer="<?= $training->deskripsi ?>">
                       Lihat gambar
                    </a>

                    </td>
                    <td><?= substr($training->deskripsi,0,10) ?></td>
                    <td><?= $training->link_training ?></td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="<?= site_url('admin/trainings/edit/'.$training->id) ?>">Edit</a>
                    </td>
                    <td>
                        <a data-toggle="modal" onclick="lihatGambar('<?= site_url(''.$training->gambar_training) ?>')" href="#" class="btn btn-danger btn-sm" data-target="#lihatGambar" >
                        <i class="fas fa-eyes"></i>
                        Hapus</a>
                    </td>
                  </tr>
                <?php
                }
                ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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
</body>

</html>
