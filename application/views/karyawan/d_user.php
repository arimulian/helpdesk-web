   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper bg-white">
     <!-- Content Header (Page header) -->
     <div class="content-header">
       <div class="row">
         <div class="col">
           <?= $this->session->flashdata('message') ?>
           <div class="card pt-3">
             <div class="card-header">
               <h3 class="card-title">Data Karyawan</h3>
               <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                 <a class="btn btn-primary" type="submit" href="<?= base_url('karyawan/add_karyawan') ?>">Tambah Data</a>
               </div>
             </div>
             <!-- /.card-header -->
             <div class="card-body">

               <table class="table table-bordered">
                 <thead>
                   <tr>
                     <th style="width: 10px">#</th>
                     <th>NIP</th>
                     <th>Username</th>
                     <th>Email</th>
                     <th>Status</th>
                     <th>Action</th>
                   </tr>
                 </thead>
                 <?php
                  $no = 1;
                  foreach ($pegawai as $p) { ?>
                   <tbody>
                     <tr>
                       <td><?= $no++ ?></td>
                       <td> <?= $p['nik'] ?></td>
                       <td> <?= $p['username'] ?></td>
                       <td> <?= $p['email'] ?></td>
                       <td>
                         <?php if ($p['is_active'] == '1') {
                            echo '<span class ="badge badge-primary">Aktif</span>';
                          } else {
                            echo '<span class ="badge badge-danger">Tidak Aktif</span>';
                          }
                          ?>
                       </td>
                       <td>
                         <a href="<?= base_url(); ?>karyawan/edit_karyawan/<?= $p['id_user']; ?>" class=" btn btn-primary btn-sm">
                           <i class="fas fa-fw fa-pen"></i></a>
                         <a href="<?= base_url(); ?>karyawan/delete_karyawan/<?= $p['id_user']; ?>" onclick="return confirm ('Yakin?');" class=" btn btn-danger btn-sm">
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