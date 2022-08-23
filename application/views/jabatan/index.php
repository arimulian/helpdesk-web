   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
               <!-- Content Header (Page header) -->
               <div class="content-header">
               <div class="row">
          <div class="col-md-6">
          <?= $this->session->flashdata('message') ?>
            <div class="card pt-3">
              <div class="card-header">
                <h3 class="card-title">Data jabatan</h3>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-primary" type="submit" href="<?= base_url('jabatan/add_jabatan') ?>">Tambah Data</a>
               </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
             
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Departemen</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <?php
                         $no = 1;
                         foreach ($jabatan as $j) { ?>
                  <tbody>
                    <tr>
                    <td><?= $no++ ?></td>
                    <td> <?= $j['jabatan'] ?></td>
                      <td>
                      <a href="<?= base_url(); ?>jabatan/edit_jabatan/<?= $j['id_jabatan']; ?>" class=" btn btn-primary btn-sm">
                     <i class="fas fa-fw fa-pen"></i></a>
                     <a href="<?= base_url(); ?>jabatan/delete_jabatan/<?= $j['id_jabatan']; ?>" onclick="return confirm ('Yakin?');" class=" btn btn-danger btn-sm">
                     <i class="fas fa-fw fa-trash"></i></a>
                      </td>
                    </tr>
                  </tbody>
                  <?php } ?>
                </table>
              </div>
              </div>
          <!-- /.content-wrapper -->

          <!-- Control Sidebar -->
          <aside class="control-sidebar control-sidebar-dark">
               <!-- Control sidebar content goes here -->
          </aside>
          <!-- /.control-sidebar -->