<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TEST Ecampuz</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>assets/images/favicon.png"/>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome-4.3.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome-4.3.0/css/awe.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/print.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="<?=site_url()?>assets/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/pace/pace.css">
  <link href='<?php echo base_url();?>assets/dist/autocomplete/js/jquery.autocomplete.css' rel='stylesheet' />
  <link href='<?php echo base_url();?>assets/dist/autocomplete/css/default.css' rel='stylesheet' />
  <link href='<?php echo base_url();?>assets/dist/summernote.css' rel='stylesheet' />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/sweet-alert.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/spinkit/spinkit.min.css">
  <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fancybox/jquery.fancybox.min.css"> -->
  <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.4.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/jQueryUI/jquery-ui.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bootstrap/js/moment.js"></script>
  <script src="<?php echo base_url(); ?>assets/dist/summernote.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
  <script src="<?=site_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?=site_url()?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/pace/pace.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/select2/select2.full.min.js"></script>
  <!-- <script src="<?php echo base_url(); ?>assets/plugins/fancybox/jquery.fancybox.min.js"></script> -->

  <script src="<?php echo base_url(); ?>assets/dist/js/sweet-alert.min.js"></script>


  <!-- <script type="text/javascript" src='https://maps.google.com/maps/api/js?key=AIzaSyAFm7O3vR25mrr05X-TQ-N7Q4bWJAhQQAs&sensor=false&libraries=places'></script> -->
  <!-- <script src="<?php echo base_url(); ?>assets/plugins/locationpicker.jquery.min.js"></script> -->
  <!-- <script src="https://unpkg.com/location-picker/dist/location-picker.min.js"></script> -->

  <style type="text/css">
    tr:nth-child(even) {
      background-color: #f9f9f9;
    }
    input#seri {
      text-transform: uppercase;
    }
    .btnred{
      background: red;
      color: #fff;
    }
    div#print>iframe{
      display: block;
      height: 0;
      width: 0;
      border:none;
    }
    button:active {
      /*background-color: #3e8e41;*/
      box-shadow: 0 5px #666;
      transform: translateY(3px);
      box-shadow: 0 9px #999;
    }
    .datepicker-days tr {
      background: #fff !important;
    }
    #kolom_order {
      min-width: 100px;
    }
    .btn-home-refresh:active {
      background-color: initial!important;
      box-shadow: inset 0 1px -1px #666;
    }
  </style>

  <script type="text/javascript">
    var locale = "en-US";
    var site = "<?php echo site_url();?>";
    var iframe = null; var div = null;
    function cetak(url) {
      if(iframe!=null){ div.removeChild(iframe); }
      if(div!=null){ document.body.removeChild(div); }
      div = document.createElement("div");
      div.id="print";
      iframe = document.createElement("iframe");
      iframe.src = url;
      iframe.name = "frame";
      div.appendChild(iframe);
      document.body.appendChild(div);
    }

    $(function() {
      $("input.date2").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});

      $("input.date").datepicker({
       format: 'dd/mm/yyyy',
       autoclose: true,
       forceParse: true,
       Default: true,
       pickDate: true,
       todayHighlight: true,
     });
      $(".select2").select2();

      $("input.timepicker").timepicker({
        showInputs: false
      });
    });
  </script> 
  <script type="text/javascript">
    function hapus()
    {
      var x = confirm('Yakin Mau Hapus Data?');
      if(x){
        return true;
      }else{
        return false;
      }
    }

  </script>
  <script type="text/javascript">
    $(document).ajaxStart(function() { 
      Pace.restart();
    });


    function showMsg(title,pesan,calback = null) {
      const wrapper = document.createElement('div');
      wrapper.innerHTML = pesan;
      ket_p = (title=="Peringatan")?"error":"success";
      if (calback!=null) {
        swal({
          title: title,
          content: wrapper,
          icon: ket_p
        }).then((value) => {
          calback();
        });
      } else {
        swal({
          title: title,
          content: wrapper,
          icon: ket_p
        });
      }
    }

    function rp(nom) {
      nm = isNaN(parseFloat(nom))?0:parseFloat(nom);
      if (nm==0) {
        return "0";
      } else {
        nm = nm.toLocaleString(locale, {minimumFractionDigits: 2});
        ex = nm.split(".");
        if (ex[1]=="00") {
          return ex[0];
        } else {
          return nm;
        }
      }
    }


    function uppercase(){
      $('textarea,input').on('input', function(evt) {
        $(this).val(function(_, val) {
          return val.toUpperCase();
        });
      });
    }

    function valid_tgl(tgl) {
      t = tgl.split('/');
      t = t[2]+'/'+t[1]+'/'+t[0];
      return (new Date(t)!='Invalid Date');
    }


  </script>

</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav fixed">
  <!-- Modal pesan -->
  <div class="modal fade bs-example-modal-sm" id="dlg" tabindex="-1" role="dialog" aria-labelledby="dlg">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="dlg_title"></h4>
        </div>
        <div class="modal-body">
          <p id="dlg_pesan"></p>
          <p class="text-right">
            <button type="button" autofocus class="btn btn-danger" data-dismiss="modal">CLose</button>
          </p>
        </div>
      </div>
    </div>
  </div>


  <div class="wrapper">
    <header class="main-header">
      <nav class="navbar navbar-static-top">
        <div class="container" style="margin: 0; width: 100%">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-fw fa-bars"></i>Menu
            </button>
          </div>
          <div class="navbar-collapse pull-left collapse" id="navbar-collapse" aria-expanded="false">
            <ul class="nav navbar-nav">
              <li class="active"><a href="<?php echo base_url(); ?>home"><i class="fa fa-fw fa-home"></i></a></li>
              
            </ul>

          </div>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <style type="text/css">
              li.header-drp {
                border-top-left-radius: 4px;
                border-top-right-radius: 4px;
                border-bottom-right-radius: 0;
                border-bottom-left-radius: 0;
                background-color: #ffffff;
                padding: 7px 10px;
                border-bottom: 1px solid #f4f4f4;
                color: #444444;
                font-size: 14px;
              }

              ul.menu {}

              ul.menu-drp {
                position: relative !important;
                max-height: 200px;
                margin: 0;
                padding: 0;
                list-style: none;
                overflow-x: hidden;
                display: block !important;
                left: 0 !important;
              }
              .menu-drp>li>a {
                color: #444444 !important;
                overflow: hidden;
                text-overflow: ellipsis;
                padding: 10px !important;
                display: block !important;
                white-space: nowrap;
                border-bottom: 1px solid #f4f4f4;
                background: white;
              }
            </style>
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="<?php echo get_foto($this->session->userdata('user_id')); ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $this->session->userdata('nama'); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-header">
                    <img src="<?php echo get_foto($this->session->userdata('user_id')); ?>" class="img-circle" alt="User Image">

                    <p style="color: #FFF !important;">
                      <?php echo $this->session->userdata('nama'); ?> - ECampuz<br>
                     
                    </p>
                  </li>
                  <li class="user-footer text-center">
                    <div class="btn-group">
                      <a href="<?php echo base_url(); ?>user/read/<?php echo $this->session->userdata('user_id') ?>" class="btn btn-default btn-flat">Profile</a>
                      <a href="<?php echo base_url(); ?>login/logout_post" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <div id="loading" style="display:none">
      <img src="<?php echo base_url().'assets/imageupload/img/loading.gif' ?>"/>
    </div>
