<link rel="stylesheet" href="<?= base_url('assets/'); ?>dist/css/adminlte.min.css">
<div class="container mt-3">
     <div class="row">
          <div class="col-sm-12">
               <h3 class="display-4 text-center">Laporan Tiket</h3>
          </div>
     </div>

     <div class="table-responsive">
          <table class="table table-borderd">
               <tr>
                    <th>#</th>
                    <th>No Tiket</th>
                    <th>Judul TIket</th>
                    <th>Keterangan</th>
                    <th>Waktu Daftar</th>
                    <th>Waktu Selesai</th>
               </tr>
               <?php
               $no = 1;
               foreach ($get_laporan as $row) { ?>
                    <tr>
                         <td><?= $no++; ?></td>
                         <td><?= $row->no_tiket ?></td>
                         <td><?= $row->judul; ?></td>
                         <td><?= $row->deskripsi; ?></td>
                         <td><?= $row->tgl_daftar; ?></td>
                         <td><?= $row->waktu_tanggapan; ?></td>

                    </tr>
               <?php   } ?>
          </table>
     </div>
</div>
<script type="text/javascript">
     window.print();
</script>