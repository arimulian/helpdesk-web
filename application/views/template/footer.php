   <!-- Main Footer -->
   <footer class="main-footer light-mode">

        <div class="float-right d-none d-sm-inline-block">
             <strong>Copyright &copy; <?= date('Y') ?> Helpdesk-Web</a>.</strong>
        </div>
   </footer>
   </div>
   <!-- ./wrapper -->

   <!-- REQUIRED SCRIPTS -->
   <!-- jQuery -->
   <script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
   <!-- create respon -->
   <script>
        $(document).ready(function() {
             $(document).on('click', '#select_tiket', function() {
                  var id = $(this).data('id');
                  var status_tiket = $(this).data('status_tiket');

                  $('#id').val(id)
                  $('#status_tiket').val(status_tiket)
             })

             $(document).on('click', '#reply-message', function() {
                  var id_tiket = $(this).data('id');
                  var id_tiket_id = $(this).data('id_tiket_id');
                  var judul_tiket = $(this).data('judul_tiket');
                  var deskripsi = $(this).data('keterangan');

                  $('#id_tiket').val(id_tiket)
                  $('#id_tiket_id').val(id_tiket_id)
                  $('#judul_tiket').val(judul_tiket)
                  $('#keterangan').val(deskripsi)
             })

             $(document).on('click', '#ctiket', function() {
                  var closetiket = $(this).data('closetiket');
                  var closestatus = $(this).data('closestatus');

                  $('#closetiket').val(closetiket)
                  $('#closestatus').val(closestatus)

             })
        })

        $('.custom-file-input').on('change', function() {
             let filename = $(this).val().split('\\').pop();
             $(this).next('.custom-file-label').addClass("selected").html(filename);
        });
   </script>
   <!-- / -->
   <!-- Bootstrap -->
   <script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
   <!-- overlayScrollbars -->
   <script src="<?= base_url('assets/'); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
   <!-- AdminLTE App -->
   <script src="<?= base_url('assets/'); ?>dist/js/adminlte.js"></script>

   <!-- PAGE PLUGINS -->
   <!-- jQuery Mapael -->
   <script src="<?= base_url('assets/'); ?>plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
   <script src="<?= base_url('assets/'); ?>plugins/raphael/raphael.min.js"></script>
   <script src="<?= base_url('assets/'); ?>plugins/jquery-mapael/jquery.mapael.min.js"></script>
   <script src="<?= base_url('assets/'); ?>lugins/jquery-mapael/maps/usa_states.min.js"></script>
   <!-- ChartJS -->
   <script src="<?= base_url('assets/'); ?>plugins/chart.js/Chart.min.js"></script>

   <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
   <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

   <!-- AdminLTE for demo purposes -->
   <!-- <script src="<?= base_url('assets/'); ?>dist/js/demo.js"></script> -->
   <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
   <!-- <script src="<?= base_url('assets/'); ?>dist/js/pages/dashboard2.js"></script> -->
   </body>

   </html>