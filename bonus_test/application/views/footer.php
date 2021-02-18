
  <script type="text/javascript">    
    $(document).ready(function($) {
      $(".tr-click").dblclick(function() {
        window.location = $(this).data("href");
      });
    });

    $('.table-responsive').on('show.bs.dropdown', function () {
      $('.table-responsive').css( "overflow", "inherit" );
    });

    $('.table-responsive').on('hide.bs.dropdown', function () {
      $('.table-responsive').css( "overflow", "auto" );
    });

  </script>

  <style type="text/css">
    .feedback{
      position: fixed;
      bottom: 50px;
      z-index: 1049;
      right: 0;
      background: #00a65a;
      padding: 10px;
      text-decoration: none;
      font-weight: bold;
      color: #fff;
      box-shadow: 0px 2px 11px 1px #000;
    }
    .feedback:hover, .feedback:active, .feedback:focus{
      background: #009551;
      cursor: pointer;
      color: #fff;
    }
  </style>
  <script type="text/javascript">
    function show_feedback() {
      $('#modal_feedback').modal('show');
    }
  </script>

  <!-- <a href="#" class="feedback" onclick="show_feedback()"><i class="fa fa-comment-o"></i> Kotak Saran</a> -->
  <div class="modal fade" id="modal_feedback" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form enctype="multipart/form-data" action="<?php echo site_url('home/feedback') ?>" method="POST">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Kirim saran untuk perbaikan sistem ini</h4>
          </div>
          <div class="modal-body">
            <input type="hidden" name="userid" value="<?php echo $this->session->userdata('user_id') ?>">
            <!-- <input type="hidden" name="nama" value="<?php //echo $this->session->userdata('nama') ?>"> -->
            <input type="hidden" name="link" value="<?php echo base_url(uri_string()); ?>">
            <input type="hidden" name="ip" value="<?php echo $this->input->ip_address() ?>">
            <div class="form-group">
              <label>Nama :</label>
              <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Judul Pesan/Saran :</label>
              <input type="text" name="judul" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Jenis Pesan/Saran :</label>
              <select class="form-control" name="jenis" required>
                <option value="">- Pilih Jenis Kotak Saran -</option>
                <option value="error">Laporan Kesalahan Program</option>
                <option value="saran">Pesan/Saran</option>
              </select>
            </div>
            <div class="form-group">
              <label>Isi pesan / saran (Mohon isi sejelas-jelasnya) :</label>
              <textarea class="form-control" name="pesan" rows="10" required></textarea>
            </div>
            <div class="form-group">
              <label>Lampirkan Foto/Screenshoot :</label>
              <input type="file" name="foto">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Kirim Saran</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php if ($this->session->userdata('ks_msg')!=""): ?>
  <div class="modal fade" id="modal_psn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Informasi</h4>
        </div>
        <div class="modal-body">
          <?php echo $this->session->userdata('ks_msg'); ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $('#modal_psn').modal('show');
  </script>
  <?php $this->session->unset_userdata('ks_msg');
  endif ?>

  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> <?= getconfig('qversi') ?>
      </div>
      <p><strong>Copyright <span class="cl">&copy;</span> <?= date('Y') ?> <a href="#">TIM IT PT. Bangunan Jaya Mandiri (Qhomemart)</a></strong> All rights reserved. <span id="deviceid" style="display: none;"></span></p>
    </div>
  </footer>
</div>

<?php $this->load->view('notif'); ?>
<?php //$this->load->view('set_con'); ?>
</body>
</html>


