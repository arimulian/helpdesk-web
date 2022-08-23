      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
               <!-- Content Header (Page header) -->
               <div class="content-header">
               <?= $this->session->flashdata('message') ?>
               <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Jabatan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="<?= base_url('jabatan/ubah_jabatan') ?>"  >
                <div class="card-body">
                  <div class="form-group">
                  <input type="hidden" class="form-control" id="email" name="id_jabatan" value="<?= $jbt['id_jabatan'] ?>"><label for="exampleInputEmail1">Departemen</label>
                    <input type="text" name="jabatan" value="<?= $jbt['jabatan'] ?>" class="form-control" id="exampleInputEmail1" placeholder="">
                  </div>
                  </div>   
                <div class="card-footer">
                <button type="submit" name="save" class="btn btn-primary">Save</button>
                <button onclick="history.back()"class="btn btn-danger">back</button>
                </div>
              </form>
           </div>