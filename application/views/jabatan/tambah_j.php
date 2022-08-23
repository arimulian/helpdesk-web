      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <?= $this->session->flashdata('message') ?>
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tambah Data Jabatan</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="<?= base_url('jabatan/save_jabatan') ?>">
              <div class="card-body">
                <div class="form-group">
                  <input type="text" name="jabatan" class="form-control" id="exampleInputEmail1" placeholder="">
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" name="save" class="btn btn-primary">Save</button>
                <!-- <button onclick="history.back()"class="btn btn-danger">back</button> -->
              </div>
            </form>
          </div>