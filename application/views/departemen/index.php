   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper bg-white">
     <!-- Content Header (Page header) -->
     <div class="content-header">

       <div class="container-fluid">

         <div class="row">
           <div class="col-md-6">
             <?= $this->session->flashdata('message') ?>
             <div class="card pt-3">
               <div class="card-header">
                 <h3 class="card-title">Data Departemen</h3>
                 <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                   <a class="btn btn-primary" type="submit" href="<?= base_url('departemen/add_departemen') ?>">Tambah Data</a>
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
                    foreach ($departemen as $d) { ?>
                     <tbody>
                       <tr>
                         <td><?= $no++ ?></td>
                         <td> <?= $d['departemen'] ?></td>
                         <td>
                           <a href="<?= base_url(); ?>departemen/edit_departemen/<?= $d['id_departemen']; ?>" class=" btn btn-primary btn-sm">
                             <i class="fas fa-fw fa-pen"></i></a>
                           <a href="<?= base_url(); ?>departemen/delete_departemen/<?= $d['id_departemen']; ?>" onclick="return confirm ('Yakin?');" class=" btn btn-danger btn-sm">
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