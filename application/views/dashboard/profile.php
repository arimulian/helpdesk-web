      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper bg-white">
           <!-- Content Header (Page header) -->
           <div class="content-header">
                <?= $this->session->flashdata('message') ?>
                <?= validation_errors(); ?>
                <div class="container-fluid">
                     <div class="row mb-4">
                          <div class="col-sm-6">
                               <h3><?= $judul; ?></h3>
                          </div><!-- /.col -->
                     </div><!-- /.container-fluid -->
                     <div class="card md-3" style="max-width: 800px;">
                          <div class="row g-0">
                               <div class="col-md-3">
                                    <img src="<?= base_url('assets/dist/img/profile/') . $user->image_user; ?>" class="img-fluid rounded-start">
                               </div>
                               <div class="col-md">
                                    <div class="card-body mt-4">
                                         <h4><?= $user->username; ?></h4>
                                         <p class="card-text"><?= $user->email; ?></p>
                                         <p class="card-text"><b><?php if ($user->role_id == '1') {
                                                                      echo 'IT support';
                                                                 } else {
                                                                      echo '<p><strong>User</strong></p>';
                                                                 }
                                                                 ?></b></p>
                                    </div>
                               </div>
                          </div>
                          <!-- form start -->
                          <?= form_open_multipart('karyawan/update_profile'); ?>
                          <div class="card-body">
                               <div class="input-group mb-3">
                                    <input type="hidden" name="id_user" value=" <?= $user->id_user; ?>" class="form-control" placeholder="NIP">
                                    <input type="text" readonly name="nik" value="<?= $user->nik; ?>" class="form-control" placeholder="NIP">
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
                                    <input type="email" name="email" readonly value=" <?= $user->email; ?> " class=" form-control" placeholder="Email">
                                    <div class="input-group-append">
                                         <div class="input-group-text">
                                              <span class="fas fa-envelope"></span>
                                         </div>
                                    </div>
                               </div>
                               <!-- <div class="input-group mb-3">
                                                        <input type="password" name="password1" class="form-control" placeholder="Update Password">
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
                                                   </div> -->
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
                               <div class="input-group mb-3">
                                    <div class="col-sm-10">
                                         <div class="row">
                                              <div class="col-sm-3">
                                                   <img src="<?= base_url('assets/dist/img/profile/') . $user->image_user; ?>" class="img-thumbnail">
                                              </div>
                                              <div class="col-sm-9">
                                                   <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="image_user" id="image">
                                                        <label class="custom-file-label" for="image">Choose file</label>
                                                   </div>
                                              </div>
                                         </div>
                                    </div>

                               </div>

                               <button type="submit" class="btn btn-primary btn-sm ">Update</button>

                               </form>
                          </div>
                     </div>
                </div>























                <!--
                <section class="content">
                     <div class="container-fluid">
                          <div class="row">
                               <div class="col-md-4">
                                    <div class="card card-primary card-outline">
                                         <div class="card-body box-profile">
                                              <div class="text-center">
                                                   <img class="profile-user-img img-fluid img-circle" src="<?= base_url('assets/dist/img/profile/') . $this->session->image_user; ?>">
                                              </div>
                                              <h3 class="text-center p-3"><?= $this->session->username; ?></h3>
                                              <p class="text-muted text-center"> <?php if ($user->role_id == '1') {
                                                                                          echo '<p class ="text-center"><strong>IT support</strong></p>';
                                                                                     } else {
                                                                                          echo '<p><strong>User</strong></p>';
                                                                                     }
                                                                                     ?></p>
                                              <p class="text-muted text-center"> <?php if ($user->is_active == '1') {
                                                                                          echo '<span class ="badge badge-info">Aktif</span>';
                                                                                     } else {
                                                                                          echo '<span class ="badge badge-danger">Tidak Aktif</span>';
                                                                                     }
                                                                                     ?></p>

                                              <a href="<?= base_url('dashboard/update_profile') ?>" class="btn btn-primary btn btn-sm"><b>Back</b></a>
                                         </div>
                                    </div>
                               </div> -->