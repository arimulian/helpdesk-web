   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper ">
        <!-- Content Header (Page header) -->
        <div class="content-header">
             <div class="row">
                  <div class="col">
                       <?= $this->session->flashdata('message') ?>
                       <section class="content">
                            <div class="container-fluid">
                                 <div class="row">
                                      <div class="col-12">
                                           <div class="callout callout-info">
                                                <h5> No tiket-<?= $tiket->no_tiket ?></h5>
                                           </div>
                                           <!-- Main content -->
                                           <div class="invoice p-3 mb-3 ">
                                                <!-- title row -->
                                                <div class="row">
                                                     <div class="col-12">
                                                          <h4>
                                                               <i class="fas fa-ticket-alt nav-icon"></i> Helpdesk
                                                               <small class="float-right"> Date <?= $tiket->tgl_daftar ?></small>
                                                          </h4>
                                                     </div>
                                                     <!-- /.col -->
                                                </div>
                                                <!-- info row -->
                                                <div class="row invoice-info">
                                                     <div class="col-sm-4 invoice-col">
                                                          From
                                                          <address>
                                                               <strong><?= $tiket->username; ?></strong><br>
                                                               NIP : <strong> <?= $tiket->nik ?></strong><br>
                                                               Departemen : <strong> <?= $tiket->departemen ?></strong><br>
                                                               Jabatan : <strong><?= $tiket->jabatan ?></strong><br>
                                                               Email : <strong><?= $tiket->email ?></strong><br>
                                                          </address>
                                                     </div>
                                                     <!-- /.col -->
                                                     <div class="col-sm-4 invoice-col">

                                                     </div>
                                                     <!-- /.col -->
                                                     <div class="col-sm-4 invoice-col">
                                                          Status Tiket :
                                                          <?php if ($tiket->status_tiket == '0') {
                                                                 echo '<span class ="badge badge-warning">Menunggu Respon</span>';
                                                            } elseif ($tiket->status_tiket == '1') {
                                                                 echo '<span class ="badge badge-info">Sudah Direspon</span>';
                                                            } elseif ($tiket->status_tiket == '2') {
                                                                 echo '<span class ="badge badge-success">Sedang Diproses</span>';
                                                            } else {
                                                                 echo '<span class ="badge badge-danger">Selesai Pengerjaan</span>';
                                                            }
                                                            ?>
                                                          <br>
                                                          <br>
                                                          <br>
                                                          No tiket : <b><?= $tiket->no_tiket ?></b>
                                                          <br>
                                                          Selesai :
                                                          <?php
                                                            if ($tiket->status_tiket == '3') {
                                                                 echo $tiket->waktu_tanggapan;
                                                            } else {
                                                                 echo "--";
                                                            }
                                                            ?>
                                                     </div>
                                                     <!-- /.col -->
                                                </div>
                                                <!-- /.row -->
                                                <br>
                                                <!-- Table row -->
                                                <div class="row">
                                                     <div class="col-6 ">
                                                          <label for="">Keluhan Karyawan</label>
                                                          <input type="text" value="<?= $tiket->judul ?>" readonly class="form-control">
                                                          <br>
                                                          <label for="">Keterangan</label>
                                                          <textarea rows="6" type="text" readonly class="form-control"><?= $tiket->deskripsi ?></textarea>
                                                     </div>
                                                     <!-- /.col -->
                                                     <div class="col-6">
                                                          <label for="">Tanggapan IT support</label>
                                                          <textarea rows="10" type="text" readonly class="form-control"><?= $tiket->tanggapan ?></textarea>
                                                     </div>
                                                </div>
                                                <!-- /.row -->
                                                <div class="row">
                                                     <!-- accepted payments column -->
                                                     <div class="col-6">
                                                          <p class="lead">Foto Keluhan :</p>
                                                          <img src="<?= base_url('assets/images/tiket/' . $tiket->gambar_tiket); ?>" width="250 px" alt="">
                                                     </div>
                                                     <!-- /.col -->
                                                     <div class="col-6">
                                                          <p class="lead">Foto Tanggapan :</p>
                                                          <img src="<?= base_url('assets/images/tanggapan/' . $tiket->gambar_tanggapan); ?>" width="250 px" alt="">

                                                     </div>
                                                     <!-- /.col -->
                                                </div>
                                                <!-- /.row -->

                                                <!-- <div class="row no-print">
                                                     <div class="col-12">
                                                          <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                                                          <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                                                               Payment
                                                          </button>
                                                          <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                                               <i class="fas fa-download"></i> Generate PDF
                                                          </button>
                                                     </div>
                                                </div> -->
                                           </div>
                                           <!-- /.invoice -->
                                      </div><!-- /.col -->
                                 </div><!-- /.row -->
                            </div><!-- /.container-fluid -->
                       </section>
                       <!-- /.content -->

                       <!-- /.content-wrapper -->

                       <!-- Control Sidebar -->
                       <aside class="control-sidebar control-sidebar-light">
                            <!-- Control sidebar content goes here -->
                       </aside>
                       <!-- /.control-sidebar -->