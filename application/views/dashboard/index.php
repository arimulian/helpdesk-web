<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper bg-white">
     <!-- Content Header (Page header) -->
     <div class="content-header ">
          <div class="container-fluid">
               <div class="row mb-2">
                    <div class="col-sm-6">
                         <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">

                    </div><!-- /.col -->
               </div><!-- /.row -->
          </div><!-- /.container-fluid -->
     </div>
     <!-- /.content-header -->
     <!-- Main content -->
     <section class="content">
          <?php if (is_it()) { ?>
               <div class="container-fluid">
                    <!-- Info boxes -->
                    <div class="row">
                         <div class="col-12 col-sm-6 col-md-4">
                              <div class="info-box bg-white">
                                   <span class="info-box-icon bg-warning elevation-1"> <i class="fas fa-ticket-alt nav-icon"></i></i></span>

                                   <div class="info-box-content">
                                        <span class="info-box-text">
                                             <strong>Menunggu Respon</strong>
                                        </span>
                                        <span class="info-box-number">
                                             <h3> <?= $tiket_wait; ?></h3>

                                        </span>
                                   </div>
                                   <!-- /.info-box-content -->
                              </div>
                              <!-- /.info-box -->
                         </div>
                         <!-- /.col -->
                         <div class="col-12 col-sm-6 col-md-4">
                              <div class="info-box mb-3 bg-white">
                                   <span class="info-box-icon bg-success elevation-1"> <i class="fas fa-ticket-alt nav-icon"></i></span>

                                   <div class="info-box-content">
                                        <span class="info-box-text">
                                             <strong> Proses Pengerjaan</strong>
                                        </span>
                                        <span class="info-box-number">
                                             <h3><?= $tiket_proses; ?></h3>
                                        </span>
                                   </div>
                                   <!-- /.info-box-content -->
                              </div>
                              <!-- /.info-box -->
                         </div>
                         <!-- /.col -->

                         <!-- fix for small devices only -->
                         <div class="clearfix hidden-md-up"></div>

                         <div class="col-12 col-sm-6 col-md-4">
                              <div class="info-box mb-3 bg-white">
                                   <span class="info-box-icon bg-danger elevation-1"> <i class="fas fa-ticket-alt nav-icon"></i></i></span>

                                   <div class="info-box-content">
                                        <span class="info-box-text">
                                             <strong> Tiket Selesai</strong>
                                        </span>
                                        <span class="info-box-number">
                                             <h3> <?= $tiket_close; ?></h3>
                                        </span>
                                   </div>
                                   <!-- /.info-box-content -->
                              </div>
                              <!-- /.info-box -->
                         </div>
                         <!-- /.col -->
                         <!-- <div class="col-12 col-sm-6 col-md-3">
                              <div class="info-box mb-3 bg-white">
                                   <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-users"></i></span>
                                   <div class="info-box-content">
                                        <span class="info-box-text">
                                             <strong>User</strong>
                                        </span>
                                        <span class="info-box-number">
                                             <h3><?= $user; ?></h3>
                                        </span>
                                   </div>
                              </div>
                         </div> -->
                         <!-- /.col -->
                    </div>
                    <!-- /.row -->

               <?php } else { ?>
                    <div class="content-header">
                         <div class="row">
                              <div class="col">
                                   <?= $this->session->flashdata('message') ?>
                                   <div class="card pt-3 ">
                                        <div class="card-header ">
                                             <h3 class="card-title ">Data Tiket</h3>
                                             <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                  <!-- <a class="btn btn-primary" type="submit" href="<?= base_url('Tiket/add_tiket') ?>" data-toggle="modal" data-target="#form_tiket">Tiket Baru</a> -->
                                             </div>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                             <table class="table table-bordered ">
                                                  <thead>
                                                       <tr>
                                                            <th style="width: 10px">#</th>
                                                            <th>No Tiket</th>
                                                            <th>Judul Tiket</th>
                                                            <th>Keterangan</th>
                                                            <th>Status</th>
                                                            <!-- <th>Konfirmasi</th> -->
                                                            <th>Aksi</th>
                                                       </tr>
                                                  </thead>
                                                  <?php $i = 1;
                                                  foreach ($tiket_user as $t) :   ?>
                                                       <tbody>
                                                            <tr>
                                                                 <th scope="row"><?= $i++ ?></th>
                                                                 <td><?= $t->no_tiket ?> </td>
                                                                 <td><?= $t->judul ?> </td>
                                                                 <td><?= $t->deskripsi ?> </td>
                                                                 <td>
                                                                      <?php if ($t->status_tiket == '0') {
                                                                           echo '<span class ="badge badge-warning">Menunggu Respon</span>';
                                                                      } elseif ($t->status_tiket == '1') {
                                                                           echo '<span class ="badge badge-info">Sudah Direspon</span>';
                                                                      } elseif ($t->status_tiket == '2') {
                                                                           echo '<span class ="badge badge-success">Sedang Diproses</span>';
                                                                      } else {
                                                                           echo '<span class ="badge badge-danger">Selesai Pengerjaan</span>';
                                                                      }
                                                                      ?>
                                                                 </td>

                                                                 <td>
                                                                      <a href="<?= base_url(); ?>Tiket/detail_tiket/<?= $t->no_tiket; ?>" class="btn btn-info btn-sm"><i class="fas fa-fw fa-eye"></i>
                                                                      </a>
                                                                      <a href="<?= base_url(); ?>Tiket/delete_tiket/<?= $t->id ?>" onclick="return confirm ('Yakin?');" class=" btn btn-danger btn-sm">
                                                                           <i class="fas fa-fw fa-trash"></i></a>
                                                                 </td>

                                                            </tr>
                                                       </tbody>
                                                  <?php
                                                  endforeach; ?>
                                             </table>
                                        </div>
                                   </div>
                                   <!-- /.content-wrapper -->
                                   <!-- Modal -->
                                   <!-- <div class="modal fade" id="form_tiket">
                                        <div class="modal-dialog">
                                             <div class="modal-content">
                                                  <div class="modal-header">
                                                       <h5 class="modal-title">Form Tambah Tiket</h5>
                                                       <button class="close" data-dismiss="modal" aria-label="close">
                                                            <span aria-hidden="true">&times;</span>
                                                       </button>
                                                  </div>
                                                  <div class="modal-body">
                                                       <form method="POST" enctype="multipart/form-data" action="<?= base_url('Tiket/save_tiket') ?>">

                                                            <div class="form-group">
                                                                 <label>No Tiket</label>
                                                                 <input type="text" readonly name="no_tiket" value="<?= $no_tiket; ?>" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                 <label>Judul Tiket</label>
                                                                 <input type="text" name="judul" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                 <label>Keterangan</label>
                                                                 <textarea name="deskripsi" class="form-control"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                 <label>Gambar</label><br>
                                                                 <input type="file" name="gambar_tiket">
                                                            </div>
                                                            <div class="card-footer">
                                                                 <button type="submit" name="save" class="btn btn-primary">Save</button>
                                                                 <button onclick="history.back()" class="btn btn-danger">back</button>
                                                            </div>
                                                       </form>
                                                  </div>


                                             </div>
                                        </div>
                                   </div>
                              </div> -->
                                   <!-- /.modal -->
                              <?php } ?>
                              </div>
                              <!--/. container-fluid -->
     </section>
     <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-light">
     <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->