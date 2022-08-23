      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper bg-white">
           <!-- Content Header (Page header) -->
           <section class="content">
                <div class="row mt-2">
                     <div class="col-6">
                          <!-- general form elements -->
                          <div class="card card-primary mt-4">
                               <div class="card-header">
                                    <h3 class="card-title">Cetak Laporan</h3>
                               </div>
                               <!-- /.card-header -->
                               <!-- form start -->
                               <form method="POST" target="_blank" action="<?= base_url('laporan/print_laporan') ?>">
                                    <div class="card-body">
                                         <div class="form-group">
                                              <label>Tanggal daftar</label>
                                              <input type="date" name="tgl_awal" id="tgl_awal" value="<?= date('Y-m-d') ?>" class="form-control">
                                         </div>
                                         <div class="form-group">
                                              <label>Tanggal tanggapan</label>
                                              <input type="date" name="tgl_akhir" id="tgl_akhir" value="<?= date('Y-m-d') ?>" class="form-control">
                                         </div>
                                    </div>
                                    <div class="card-footer">
                                         <button type="submit" name="submit" class="btn btn-primary">PRINT</button>

                                    </div>
                               </form>
                          </div>
                     </div>
                </div>
           </section>