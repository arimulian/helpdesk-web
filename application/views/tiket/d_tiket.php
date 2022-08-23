   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <?php if (is_it()) { ?>
             <div class="content-header">
                  <div class="row">
                       <div class="col">
                            <?= $this->session->flashdata('message') ?>
                            <div class="card pt-3 ">
                                 <div class="card-header ">
                                      <h3 class="card-title ">Data Tiket Masuk</h3>
                                      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                           <a class="btn btn-primary" type="submit" href="<?= base_url('Tiket/add_tiket') ?>" data-toggle="modal" data-target="#form_tiket">Tiket Baru</a>
                                      </div>
                                 </div>
                                 <!-- /.card-header -->
                                 <div class="card-body">
                                      <table class="table table-bordered ">
                                           <thead>
                                                <tr>
                                                     <th style="width: 10px">#</th>
                                                     <th class="text-center">No Tiket</th>
                                                     <th class="text-center">Judul Tiket</th>
                                                     <th class="text-center">Keterangan</th>
                                                     <th class="text-center">Status</th>
                                                     <th class="text-center">Konfirmasi</th>
                                                     <th class="text-center">Aksi</th>
                                                </tr>
                                           </thead>
                                           <?php $i = 1;
                                             foreach ($tiket as $u) :   ?>
                                                <tbody>
                                                     <tr>
                                                          <th scope="row"><?= $i++ ?></th>
                                                          <td class="text-center"><?= $u['no_tiket'] ?> </td>
                                                          <td class="text-center"><?= $u['judul'] ?> </td>
                                                          <td class="text-center"><?= $u['deskripsi'] ?> </td>
                                                          <td class="text-center">
                                                               <?php if ($u['status_tiket'] == '0') {
                                                                      echo '<span class ="badge badge-warning">Menunggu Respon</span>';
                                                                 } elseif ($u['status_tiket'] == '1') {
                                                                      echo '<span class ="badge badge-info">Sudah Direspon</span>';
                                                                 } elseif ($u['status_tiket'] == '2') {
                                                                      echo '<span class ="badge badge-success">Sedang Diproses</span>';
                                                                 } else {
                                                                      echo '<span class ="badge badge-danger">Selesai Pengerjaan</span>';
                                                                 }
                                                                 ?>
                                                          </td>
                                                          <td class="text-center">
                                                               <?php
                                                                 if ($u['status_tiket'] == '0') {
                                                                      echo '<a href="javascript:void(0);" data-toggle="modal" data-target="#modal-tiket" id="select_tiket" data-id="' . $u['id'] . '"
                                                                 data-status_tiket="' . $u['status_tiket'] . '" class="btn btn-info btn-sm">Konfirmasi</a>';
                                                                 } elseif ($u['status_tiket'] == '1') {
                                                                      echo '<a href="javascript:void(0);" data-toggle="modal" data-target="#modal-reply" id="reply-message"
                                                                 data-id_tiket="' . $u['id'] . '"
                                                                 data-id_tiket_id="' . $u['id'] . '"
                                                                 data-judul_tiket="' . $u['judul'] . '"
                                                                 data-keterangan="' . $u['deskripsi'] . '"
                                                                 class="btn btn-warning btn-sm">
                                                                 Tanggapi Tiket
                                                                 </a>';
                                                                 } elseif ($u['status_tiket'] == '2') {
                                                                      echo '<a href="javascript:void(0);" data-toggle="modal" data-target="#modal-closetiket" id="ctiket"
                                                                 data-closetiket="' . $u['id'] . '"
                                                                 data-closestatus="' . $u['status_tiket'] . '"
                                                                 class="btn btn-danger btn-sm">
                                                                 Tiket selesai
                                                                 </a>';
                                                                 } else {
                                                                      echo '<a href="javascript:void(0);"
                                                                 class="btn btn-danger btn-sm">
                                                                 Selesai
                                                                 </a>';
                                                                 }
                                                                 ?>
                                                          </td>
                                                          <td class="text-center">
                                                               <a href="<?= base_url(); ?>Tiket/detail_tiket/<?= $u['no_tiket']; ?>" class="btn btn-info btn-sm"><i class="fas fa-fw fa-eye"></i>
                                                               </a>
                                                               <a href="<?= base_url(); ?>Tiket/delete_tiket/<?= $u['id']; ?>" onclick="return confirm ('Yakin?');" class=" btn btn-danger btn-sm">
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
                            <div class="modal fade" id="form_tiket">
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
                       </div>
                       <!-- /.modal -->
                       <!-- Modal confirm -->
                       <div class="modal fade" id="modal-tiket">
                            <div class="modal-dialog">
                                 <div class="modal-content">
                                      <div class="modal-header">
                                           <h5 class="modal-title">Apakah yakin merespon tiket ini?</h5>
                                           <button class="close" data-dismiss="modal" aria-label="close">
                                                <span aria-hidden="true">&times;</span>
                                           </button>
                                      </div>
                                      <div class="modal-body">
                                           <form method="POST" enctype="multipart/form-data" action="<?= base_url('Tiket/save_tiket_waiting') ?>">
                                                <input type="hidden" name="id" id="id" class="form-control">
                                                <input type="hidden" name="status_tiket" value="0" class="form-control">
                                                <div class="card-footer">
                                                     <button type="submit" name="save" class="btn btn-primary">Confirm</button>
                                                </div>
                                           </form>
                                      </div>
                                 </div>
                            </div>
                       </div>
                       <!-- / -->
                       <!-- modal reply -->
                       <div class="modal fade" id="modal-reply">
                            <div class="modal-dialog">
                                 <div class="modal-content">
                                      <div class="modal-header">
                                           <h5 class="modal-title">Form Tanggapan IT Support</h5>
                                           <button class="close" data-dismiss="modal" aria-label="close">
                                                <span aria-hidden="true">&times;</span>
                                           </button>
                                      </div>
                                      <div class="modal-body">
                                           <form method="POST" enctype="multipart/form-data" action="<?= base_url('Tiket/save_tanggapan') ?>">
                                                <input type="hidden" name="id" id="id_tiket_id" class="form-control">
                                                <input type="hidden" name="tiket_id" id="tiket_id" class="form-control">
                                                <div class="form-group">
                                                     <label for="keluhan">Keluhan / judul tiket</label>
                                                     <input type="text" id="judul_tiket" class="form-control" readonly>
                                                </div>
                                                <div class="form-group">
                                                     <label for="keterangan">Keterangan</label>
                                                     <textarea id="keterangan" class="form-control" readonly></textarea>
                                                </div>
                                                <div class="form-group">
                                                     <label for="tanggapan">Tanggapan</label>
                                                     <textarea name="tanggapan" class="form-control"></textarea>
                                                </div>
                                                <div class="form-group">
                                                     <label for="tanggapan">Gambar Tanggapan</label><br>
                                                     <input type="file" name="gambar_tanggapan">
                                                </div>

                                                <div class="card-footer">
                                                     <button type="submit" name="save" class="btn btn-primary">Submit</button>
                                                </div>
                                           </form>
                                      </div>
                                 </div>
                            </div>
                       </div>
                       <!-- close -->
                       <div class="modal fade" id="modal-closetiket">
                            <div class="modal-dialog">
                                 <div class="modal-content">
                                      <div class="modal-header">
                                           <h5 class="modal-title">Apakah yakin menutup tiket ini?</h5>
                                           <button class="close" data-dismiss="modal" aria-label="close">
                                                <span aria-hidden="true">&times;</span>
                                           </button>
                                      </div>
                                      <div class="modal-body">
                                           <form method="POST" enctype="multipart/form-data" action="<?= base_url('Tiket/save_close_tiket') ?>">
                                                <input type="hidden" name="id" id="closetiket" class="form-control">
                                                <input type="hidden" name="status_tiket" value="3" class="form-control">
                                                <div class="card-footer">
                                                     <button type="submit" name="save" class="btn btn-danger">Confirm</button>
                                                </div>
                                           </form>
                                      </div>
                                 </div>
                            </div>
                       </div>
                  </div>
             </div>
   </div>
   <?php } else { ?>
        <div class="content-header">
             <div class="row">
                  <div class="col">
                       <?= $this->session->flashdata('message') ?>
                       <div class="card pt-3 ">
                            <div class="card-header ">
                                 <h3 class="card-title ">Data Tiket</h3>
                                 <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                      <a class="btn btn-primary" type="submit" href="<?= base_url('Tiket/add_tiket') ?>" data-toggle="modal" data-target="#form_tiket">Tiket Baru</a>
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
                       <div class="modal fade" id="form_tiket">
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
                  </div>
                  <!-- /.modal -->
             <?php } ?>