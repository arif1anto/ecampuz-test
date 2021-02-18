
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



  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
      </div>
      <p><strong>Copyright <span class="cl">&copy;</span> <?= date('Y') ?> </strong> All rights reserved. <span id="deviceid" style="display: none;"></span></p>
    </div>
  </footer>
</div>

</body>
</html>


