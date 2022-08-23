      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper bg-white">
        <!-- Content Header (Page header) -->
        <div class="content-header">

          <!-- general form elements -->
          <div class="card card-primary">
            <?= $this->session->flashdata('message') ?>
            <?= validation_errors(); ?>
            <div class="card-header">
              <h3 class="card-title">Form tambah Data <strong>User</strong></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="<?= base_url('karyawan/save_karyawan') ?>">
              <div class="card-body">
                <div class="input-group mb-3">
                  <input type="text" name="nik" class="form-control" placeholder="NIP">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-id-card-alt"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="text" name="username" class="form-control" placeholder="Full name">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="email" name="email" value=" <?= set_value('email') ?> " class="form-control" placeholder="Email">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
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
                </div>
                <div class="input-group mb-3">
                  <select name="jabatan" class="form-control">
                    <option value=""> --pilih Jabatan-- </option>
                    <?php foreach ($jabatan as $j) { ?>
                      <option value="<?= $j['id_jabatan'] ?>"> <?= $j['jabatan'] ?> </option>
                    <?php } ?>
                  </select>
                </div>
                <div class="input-group mb-3">
                  <select name="departemen" class="form-control">
                    <option value=""> --pilih departemen-- </option>
                    <?php foreach ($departemen as $d) { ?>
                      <option value="<?= $d['id_departemen'] ?>"> <?= $d['departemen'] ?> </option>
                    <?php } ?>
                  </select>
                </div>
                <div class="card-footer">
                  <button type="submit" name="save" class="btn btn-primary ">Save</button>
                  <a href="<?= base_url('karyawan') ?>" class="btn btn-danger ">Back</a>
                </div>
            </form>
          </div>