      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
           <!-- Content Header (Page header) -->
           <div class="content-header">

                <!-- general form elements -->
                <div class="card card-primary">
                     <?= $this->session->flashdata('message') ?>
                     <?= validation_errors(); ?>
                     <div class="card-header">
                          <h3 class="card-title">Form Edit Data <strong><?= $user->username; ?></strong></h3>
                     </div>
                     <!-- /.card-header -->
                     <!-- form start -->
                     <form method="POST" action="<?= base_url('karyawan/ubah_karyawan') ?>">
                          <div class="card-body">
                               <div class="input-group mb-3">
                                    <input type="hidden" name="id_user" value=" <?= $user->id_user; ?>" class="form-control" placeholder="NIP">
                                    <input type="text" name="nik" value="<?= $user->nik; ?>" class="form-control" placeholder="NIP">
                                    <div class="input-group-append">
                                         <div class="input-group-text">
                                              <span class="fas fa-id-card-alt"></span>
                                         </div>
                                    </div>
                               </div>
                               <div class="input-group mb-3">
                                    <input type="text" name="username" value="<?= $user->username; ?>" class="form-control" placeholder="Full name">
                                    <div class="input-group-append">
                                         <div class="input-group-text">
                                              <span class="fas fa-user"></span>
                                         </div>
                                    </div>
                               </div>
                               <div class="input-group mb-3">
                                    <input type="email" name="email" value=" <?= $user->email; ?> " class=" form-control" placeholder="Email">
                                    <div class="input-group-append">
                                         <div class="input-group-text">
                                              <span class="fas fa-envelope"></span>
                                         </div>
                                    </div>
                               </div>
                               <!-- <div class="input-group mb-3">
                                    <input type="password" name="password1" class="form-control" placeholder="Password">
                                    <div class="input-group-append">
                                         <div class="input-group-text">
                                              <span class="fas fa-lock"></span>
                                         </div>
                                    </div>
                               </div>
                               <div class="input-group mb-3">
                                    <input type="password" name="password2" class="form-control" placeholder="Retype password">
                                    <div class="input-group-append">
                                         <div class="input-group-text">
                                              <span class="fas fa-lock"></span>
                                         </div>
                                    </div>
                               </div>  -->
                               <div class="input-group mb-3">
                                    <select name="jabatan" class="form-control">
                                         <option value=""> --pilih Jabatan-- </option>
                                         <?php foreach ($jabatan as $j) { ?>
                                              <option value="<?= $j['id_jabatan'] ?>" <?= $j['id_jabatan'] == $user->jabatan ? "selected" : null; ?>> <?= $j['jabatan'] ?> </option>
                                         <?php } ?>
                                    </select>
                               </div>
                               <div class=" input-group mb-3">
                                    <select name="departemen" class="form-control">
                                         <option value=""> --pilih departemen-- </option>
                                         <?php foreach ($departemen as $d) { ?>
                                              <option value="<?= $d['id_departemen'] ?>" <?= $d['id_departemen'] == $user->departemen ? "selected" : null; ?>> <?= $d['departemen'] ?> </option>
                                         <?php } ?>
                                    </select>
                               </div>
                               <div class=" input-group mb-3">
                                    <select name="is_active" class="form-control">
                                         <option value=""> Status User </option>
                                         <option value="0" <?= $user->is_active == '0' ? "selected" : ''; ?>> Tidak Aktif </option>
                                         <option value="1" <?= $user->is_active == '1' ? "selected" : ''; ?>> Aktif </option>
                                    </select>
                               </div>
                               <div class=" input-group mb-3">
                                    <select name="role_id" class="form-control">
                                         <option value=""> --Role-- </option>
                                         <option value="1" <?= $user->role_id == '1' ? "selected" : ''; ?>> IT Support </option>
                                         <option value="2" <?= $user->role_id == '2' ? "selected" : ''; ?>> User </option>
                                    </select>
                               </div>
                               <div class="card-footer">
                                    <button type="submit" name="save" class="btn btn-primary ">Save</button>
                                    <a href="<?= base_url('karyawan') ?>" class="btn btn-danger ">Back</a>
                               </div>
                     </form>
                </div>