<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo getconfig("nmpt"); ?> | QHOMEPRO</title>
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

    function cek_lock(periode){
      if (periode!="") {
        per = periode.split("/");
        tgl = per[2]+per[1];
        if (tgl <= <?php echo cek_periode() ?>) {
          return "0"
        }else{
          return "1"
        }
      }
    }

    function get_periode() {
      return "<?php echo cek_periode() ?>";
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

    function cek_print_device(callback) {
      $.ajax({
        url: site+"print_service/check_devices",
        type: "post",
        data: {'deviceid':window.localStorage.getItem("_DEVICEID_")}
      })
      .done(function (data){
        if (data.trim()=="Y") {
          swal({
            title: "Konfirmasi",
            text: "Komputer ini sudah ditambahkan ke printer konter, mau hapus komputer ini?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              $.ajax({
                url: site+"print_service/remove_devices",
                type: "post",
                data: {'deviceid':window.localStorage.getItem("_DEVICEID_")}
              })
              .done(function (data){
                if(data.trim()!="")
                  showMsg("Informasi",data);
              })
              .fail(function (jqXHR, textStatus, errorThrown){
                console.error("The following error occurred: "+textStatus, errorThrown);
                console.log(jqXHR.responseText);
              }); 
            } 
          });
        } else {
          callback();
        }
      })
      .fail(function (jqXHR, textStatus, errorThrown){
        console.error("The following error occurred: "+textStatus, errorThrown);
        console.log(jqXHR.responseText);
      }); 
    }

    function add_to_print_list() {
      cek_print_device(function () {
        swal({
          text: 'Nama Komputer Ini : ',
          content: "input",
          button: {
            text: "Simpan",
            closeModal: false,
          },
        })
        .then(name => {
          if(name.trim() != ""){
           $.ajax({
              url: site+"print_service/add_devices",
              type: "post",
              data: {'deviceid':window.localStorage.getItem("_DEVICEID_"),
                'comp_name':name.trim()}
            })
            .done(function (data){
              swal.stopLoading();
              swal.close();
              if(data.trim()!="")
                showMsg(data.search('sudah ada')?'Peringatan':'Informasi',data);
            })
            .fail(function (jqXHR, textStatus, errorThrown){
              console.error("The following error occurred: "+textStatus, errorThrown);
              console.log(jqXHR.responseText);
            }); 
          }
        });
      });
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


<?php if ($this->session->userdata('print_service')): ?>
<script type="text/javascript">
  auto_printsq();
  function auto_printsq() {
   $.ajax({
      url: site+"print_service/get_queue",
      type: "post",
      data: {'deviceid':window.localStorage.getItem("_DEVICEID_")}
    })
    .done(function (data){
      if(data.trim()!="")
        $('#iframe_printsq').attr('src',data);
      setTimeout(function(){ auto_printsq(); }, 5000);
    })
    .fail(function (jqXHR, textStatus, errorThrown){
      console.error("The following error occurred: "+textStatus, errorThrown);
      console.log(jqXHR.responseText);
    });  
  }
</script>
<iframe id="iframe_printsq" title="PRINT SQ" style="display: none;"></iframe>
<?php endif ?>

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
              <li class="dropdown"> 
                <?php echo cek_akses('master')?'<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <i class="fa fa-fw fa-cubes"></i>Data Master</a>':"" ?>
                <ul class="dropdown-menu">
                  <li>
                    <a href="#"><i class="fa fa-fw fa-group"></i>User <i class="fa fa-caret-right"></i></a>
                    <ul>
                      <?php echo cek_akses('mu')?'<li><a href="'.base_url().'user"><i class="fa fa-fw fa-user"></i>Data User</a></li>':"" ?>
                      <?php echo cek_akses('mug')?'<li><a href="'.base_url().'usergroup"><i class="fa fa-fw fa-user"></i>User Group</a></li>':"" ?>
                    </ul>
                  </li>
                  <li><a href="#"><i class="fa fa-fw fa-laptop"></i>Data Produk <i class="fa fa-caret-right"></i></a>
                    <ul>
                      <?php echo cek_akses('mp')?'<li><a href="'.base_url().'produk">Produk</a></li>':""?>
                      <?php echo cek_akses('mp')?'<li><a href="'.base_url().'katalog">Katalog Produk</a></li>':""?>
                      <?php echo cek_akses('mm')?'<li><a href="'.base_url().'merek">Merk</a></li>':"";?>
                      <?php echo cek_akses('mj')?'<li><a href="'.base_url().'jenis">Jenis</a></li>':"";?>
                      <?php echo cek_akses('mk')?'<li><a href="'.base_url().'kategori">Kategori</a></li>':"";?>
                      <li class="devider"></li>
                      <?php echo cek_akses('mk')?'<li><a href="'.base_url().'kategori_baru">'.getconfig('kl0').'</a></li>':"";?>
                      <?php echo cek_akses('mk')?'<li><a href="'.base_url().'kategori_baru/level/1">'.getconfig('kl1').'</a></li>':"";?>
                      <?php echo cek_akses('mk')?'<li><a href="'.base_url().'kategori_baru/level/2">'.getconfig('kl2').'</a></li>':"";?>
                      <?php echo cek_akses('mk')?'<li><a href="'.base_url().'kategori_baru/level/3">'.getconfig('kl3').'</a></li>':"";?>
                      <li class="devider"></li>
                      <?php echo cek_akses('rsh')?'<li><a href="'.base_url().'sethrg">Rencana Setting Harga</a></li>':"";?>
                      <?php echo cek_akses('sf')?'<li><a href="'.base_url().'formula">Setting Formula</a></li>':"";?>
                    </ul> 
                  </li>

                  <?php echo cek_akses('md')?'<li><a href="'.base_url().'promo"><i class="fa fa-fw fa-spinner"></i>Setting Promo Diskon</a></li>':"";?>
                  <?php echo cek_akses('mc')?'<li><a href="'.base_url().'konsumen"><i class="fa fa-fw fa-user-plus"></i>Customer</a></li>':"";?>
                  <?php echo cek_akses('ms')?'<li><a href="'.base_url().'suplier"><i class="fa fa-fw fa-external-link-square"></i>Suplier</a></li>':"";?>
                  <?php echo cek_akses('mg')?'<li><a href="'.base_url().'gudang"><i class="fa fa-fw fa-building"></i>Gudang</a></li>':"";?>
                  <?php echo cek_akses('sl')?'<li><a href="'.base_url().'sales"><i class="fa fa-fw fa-group"></i>Sales</a></li>':"";?>
                  <?php echo cek_akses('tp')?'<li><a href="'.base_url().'tagpromo"><i class="fa fa-fw fa-gift"></i>Tag Promo</a></li>':"";?>
                  <?php echo cek_akses('mb')?'<li><a href="'.base_url().'mobil"><i class="fa fa-fw fa-car"></i>Mobil</a></li>':"";?>
                  <?php echo cek_akses('msp')?'<li><a href="'.base_url().'sopir"><i class="fa fa-fw fa-user"></i>Sopir</a></li>':"";?>
                  <?php echo cek_akses('mso')?'<li><a href="'.base_url().'ongkir"><i class="fa fa-fw fa-truck"></i>Ongkos Kirim</a></li>':"";?>
                  <li>
                    <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-fw fa-barcode"></i>Pembukuan & Keuangan<i class="fa fa-caret-right"></i></a>
                    <ul>
                      <?php echo cek_akses('fp')?'<li><a href="'.base_url().'group_akun_perkiraan">Faktur Pjk Keluaran</a></li>':"";?>
                      <?php echo cek_akses('ag')?'<li><a href="'.base_url().'group_akun_perkiraan">Group Akun Perkiraan</a></li>':"";?>
                      <?php echo cek_akses('as')?'<li><a href="'.base_url().'subperkiraan">SubGroup Akun Perkiraan</a></li>':"";?>
                      <?php echo cek_akses('ap')?'<li><a href="'.base_url().'perkiraan">Akun Perkiraan</a></li>':"";?>
                      <?php echo cek_akses('at')?'<li><a href="'.base_url().'pembayaran">Tipe Pembayaran</a></li>':"";?>
                      <?php echo cek_akses('ar')?'<li><a href="'.base_url().'rekening">Rekening Bank</a></li>':"";?>
                      <?php echo cek_akses('av')?'<li><a href="'.base_url().'voucer">Voucher</a></li>':"";?>
                      <?php echo cek_akses('ad')?'<li><a href="'.base_url().'departemen">Department</a></li>':"";?>
                      <li class="devider"></li>
                      <?php echo cek_akses('sjt')?'<li><a href="'.base_url().'setjuoto"> Setting Jurnal Transaksi</a></li>':"";?>
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="dropdown">
                <?php echo cek_akses('beli')?'<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-fw fa-train"></i>Pembelian</a>':"";?>
                <ul class="dropdown-menu">
                  <?php echo cek_akses('rp')?'<li><a href="'.base_url().'rp"><i class="fa fa-fw fa-user"></i>RP (Request PO)</a></li>':"";?>
                  <?php echo cek_akses('pok')?'<li><a href="'.base_url().'po"><i class="fa fa-fw fa-user"></i>PO (Purchase Order)</a></li>':"";?>
                  <?php echo cek_akses('rp')?'<li><a href="'.base_url().'rpkonsi"><i class="fa fa-fw fa-user"></i>RP (Request PO .)</a></li>':"";?>
                  <?php echo cek_akses('pok')?'<li><a href="'.base_url().'pokonsi"><i class="fa fa-fw fa-user"></i>PO (Purchase Order .)</a></li>':"";?>
                  <?php echo cek_akses('rb')?'<li><a href="'.base_url().'rb"><i class="fa fa-fw fa-user"></i>RB (Retur Beli)</a></li>':"";?>
                  <?php echo cek_akses('rbk')?'<li><a href="'.base_url().'rbkonsi"><i class="fa fa-fw fa-user"></i>RB (Retur Beli .)</a></li>':"";?>
                  <?php echo cek_akses('poso')?'<li><a href="'.base_url().'porefso"><i class="fa fa-fw fa-user"></i>PO ref SO</a></li>':"";?>
                  <?php echo cek_akses('posok')?'<li><a href="'.base_url().'porefsokonsi"><i class="fa fa-fw fa-user"></i>PO ref SO .</a></li>':"";?>
                  <?php echo cek_akses('pshpo')?'<li><a href="'.base_url().'pemisah_porefso"><i class="fa fa-fw fa-user"></i>Pemisah PO ref SO</a></li>':"";?>
                  <?php echo cek_akses('pi')?'<li><a href="'.base_url().'pi"><i class="fa fa-fw fa-user"></i>PI (Proforma Invoice)</a></li>':"";?>
                  <?php echo cek_akses('pp')?'<li><a href="'.base_url().'pp"><i class="fa fa-fw fa-user"></i>Pengajuan Promo Produk</a></li>':"";?>
                </ul>
              </li>

              <li class="dropdown">
                <?php echo cek_akses('penj')?'<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-fw fa-paypal"></i>Penjualan</a>':"";?>
                <ul class="dropdown-menu">
                  <?php //echo cek_akses('sq')?'<li><a href="'.base_url().'draftsq"><i class="fa fa-pencil-square-o"></i>Draft SQ</a></li>':"";?>
                  <?php echo cek_akses('sq')?'<li><a href="'.base_url().'sq"><i class="fa fa-send-o"></i>SQ (Sales Quotation)</a></li>':"";?>
                  <?php echo cek_akses('so')?'<li><a href="'.base_url().'so"><i class="fa fa-fw fa-check-square"></i>SO (Sales Order)</a></li>':"";?>
                  <?php echo cek_akses('pos')?'<li><a href="'.base_url().'pos"><i class="fa fa-fw fa-check-square"></i>POS</a></li>':"";?>
                  <?php echo cek_akses('rj')?'<li><a href="'.base_url().'rj"><i class="fa fa-fw fa-check-square"></i>RJ (Retur Jual)</a></li>':"";?>
                  <?php echo cek_akses('rjr')?'<li><a href="'.base_url().'rj_tanparef"><i class="fa fa-fw fa-check-square"></i>RJ (Tanpa Ref)</a></li>':"";?>
                  <?php echo cek_akses('pn')?'<li><a href="'.base_url().'penukaran_point"><i class="fa fa-fw fa-check-square"></i>Penukaran Point</a></li>':"";?>
                  <?php echo cek_akses('py')?'<li><a href="'.base_url().'penyesuaian_point"><i class="fa fa-fw fa-check-square"></i>Penyesuaian Point</a></li>':"";?>
                </ul>
              </li>

              <li class="dropdown">
                <?php echo cek_akses('stok')?'<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-fw fa-pie-chart"></i>Stok</a>':"";?>
                <ul class="dropdown-menu">
                  <?php echo cek_akses('is')?'<li><a href="'.base_url().'stok"><i class="fa fa-fw fa-database"></i>Informasi Stok</a></li>':"";?>
                  <?php echo cek_akses('iss')?'<li><a href="'.base_url().'stok_store"><i class="fa fa-fw fa-database"></i>Informasi Stok di Store</a></li>':"";?>
                  <?php echo cek_akses('iss')?'<li><a href="'.base_url().'stok_harga"><i class="fa fa-fw fa-database"></i>Informasi Stok dan Harga</a></li>':"";?>
                  <?php echo cek_akses('bs')?'<li><a href="'.base_url().'booking"><i class="fa fa-fw fa-database"></i>Booking Stok</a></li>':"";?>
                  <?php echo cek_akses('ps')?'<li><a href="'.base_url().'perubahanseri"><i class="fa fa-fw fa-database"></i>Perubahan Seri</a></li>':"";?>
                  <?php echo cek_akses('pus')?'<li><a href="'.base_url().'penyesuaian_stok"><i class="fa fa-fw fa-database"></i>Penyesuaian Stok</a></li>':"";?>
                  <li><a href="<?php echo base_url() ?>antriansq"><i class="fa fa-fw fa-database"></i>Antrian SQ</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <?php echo cek_akses('kirim')?'<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-fw fa-cab"></i>Pengiriman</a>':"";?>
                <ul class="dropdown-menu" style="width: 330px;">
                  <?php echo cek_akses('bm')?'<li><a href="'.base_url().'bmrefpo"><i class="fa  fa-fw fa-arrow-down"></i>BM (Barang masuk - Ref.PO)</a></li>':"";?>
                  <?php echo cek_akses('bk')?'<li><a href="'.base_url().'bkrefrb"><i class="fa  fa-fw fa-arrow-circle-o-up"></i>BK (Barang Keluar - Ref.Retur Beli)</a></li>':"";?>
                  <?php echo cek_akses('do')?'<li><a href="'.base_url().'delivery"><i class="fa fa-fw fa-motorcycle"></i>DO (Delivery Order)</a></li>':"";?>
                  <?php echo cek_akses('sj')?'<li><a href="'.base_url().'surat_jalan"><i class="fa fa-fw fa-wheelchair"></i>SJ (Surat Jalan)</a></li>':"";?>
                  <?php echo cek_akses('asj')?'<li><a href="'.base_url().'aprovesj"><i class="fa fa-fw fa-check"></i>Approval SJ (Surat Jalan)</a></li>':"";?>
                  <?php echo cek_akses('mtsr')?'<li><a href="'.base_url().'mutasi_req"><i class="fa fa-fw fa-paper-plane-o"></i>Permintaan Mutasi</a></li>':"";?>
                  <?php echo cek_akses('mts')?'<li><a href="'.base_url().'mutasi"><i class="fa fa-fw fa-paper-plane-o"></i>Mutasi</a></li>':"";?>
                  <?php echo cek_akses('rmts')?'<li><a href="'.base_url().'retur_mutasi"><i class="fa fa-fw fa-paper-plane-o"></i>Retur Mutasi</a></li>':"";?>
                </ul>
              </li>
              <li class="dropdown">
                <?php echo cek_akses('keu')?'<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-fw fa-money"></i>Keuangan & Akunting</a>':"";?>
                <ul class="dropdown-menu" style="width: 279px;">
                  <li><a href="#"><i class="fa fa-fw fa-arrow-down"></i>BL / (Purchase Order) <i class="fa fa-caret-right"></i></a>
                    <ul>
                      <?php echo cek_akses('bl')?'<li><a href="'.base_url().'blrefbm"> <i class="fa fa-fw fa-arrow-down"></i>BL/(Purchase Order) ref. BM</a></li>':"";?>
                      <?php echo cek_akses('bl')?'<li><a href="'.base_url().'blrefpo"> <i class="fa fa-fw fa-arrow-down"></i>BL/(Purchase Order) ref. Performa by SO</a></li>':"";?>
                      <?php echo cek_akses('bl')?'<li><a href="'.base_url().'bl_konsi"> <i class="fa fa-fw fa-arrow-down"></i>BL/(Purchase Order) .</a></li>':"";?>
                    </ul>
                  </li>

                  <?php echo cek_akses('kb')?'<li><a href="'.base_url().'kontrabon"><i class="fa  fa-fw fa-arrow-circle-o-up"></i>KB (Kontra Bon)</a></li>':"";?>

                  <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-circle-o"></i>Giro dan Transfer <i class="fa fa-caret-right"></i></a>
                    <ul>
                      <?php echo cek_akses('gm')?'<li><a href="'.base_url().'giro_masuk"> <i class="fa  fa-circle-o"></i> Giro Masuk</a></li>':"";?>
                      <?php echo cek_akses('gk')?'<li><a href="'.base_url().'giro_keluar"> <i class="fa  fa-circle-o"></i> Giro Keluar </a></li>':"";?>
                      <?php echo cek_akses('tm')?'<li><a href="'.base_url().'transfer_masuk"> <i class="fa  fa-circle-o"></i> Transfer Masuk </a></li>':"";?>
                      <?php echo cek_akses('tk')?'<li><a href="'.base_url().'transfer_keluar"> <i class="fa  fa-circle-o"></i> Transfer Keluar </a></li>':"";?>
                      <li class="devider"></li>
                      <?php echo cek_akses('jmgm')?'<li><a href="'.base_url().'jm_giro_masuk"> <i class="fa  fa-circle-o"></i> Jurnal Manual Giro Masuk </a></li>':"";?>
                      <?php echo cek_akses('jmgk')?'<li><a href="'.base_url().'jm_giro_keluar"> <i class="fa  fa-circle-o"></i> Jurnal Manual Giro Keluar </a></li>':"";?>
                      <?php echo cek_akses('jmtm')?'<li><a href="'.base_url().'jm_transfer_masuk"> <i class="fa  fa-circle-o"></i> Jurnal Manual Transfer Masuk </a></li>':"";?>
                      <?php echo cek_akses('jmtk')?'<li><a href="'.base_url().'jm_transfer_keluar"> <i class="fa  fa-circle-o"></i> Jurnal Manual Transfer Keluar </a></li>':"";?>
                    </ul>
                  </li>

                  <?php echo cek_akses('ju')?'<li><a href="'.base_url().'jurnalumum"><i class="fa fa-circle-o"></i>Jurnal Umum</a></li>':"";?>
                  <?php echo cek_akses('jmm')?'<li><a href="'.base_url().'jurnalmanual_masuk"><i class="fa fa-circle-o"></i>Jurnal Manual Kas Masuk</a></li>':"";?>
                  <?php echo cek_akses('jmk')?'<li><a href="'.base_url().'jurnalmanual_keluar"><i class="fa fa-circle-o"></i>Jurnal Manual Kas Keluar</a></li>':"";?>
                  <?php echo cek_akses('apj')?'<li><a href="'.base_url().'aprove_jurnal"><i class="fa fa-circle-o"></i>Approve Jurnal</a></li>':"";?>
                  <li>
                    <?php echo cek_akses('pjmo')?'<li><a href="'.base_url().'posting"><i class="fa fa-circle-o"></i> Posting</a></li>':"";?>
                  </li>
                  <li>
                    <?php echo cek_akses('kms')?'<li><a href="'.base_url().'komisi"><i class="fa fa-circle-o"></i> Komisi</a></li>':"";?>
                  </li>
                  <li>
                    <?php echo cek_akses('juto')?'<li><a href="'.base_url().'jurnal"><i class="fa fa-table"></i> Jurnal Otomatis</a></li>':"";?>
                  </li>
                  <li>
                    <?php echo cek_akses('jnrc')?'<li><a href="'.base_url().'neraca"><i class="fa fa-table"></i> Jurnal Neraca</a></li>':"";?>
                  </li>
                  <li>
                    <?php echo cek_akses('ebg')?'<li><a href="'.base_url().'ebudget"><i class="fa fa-table"></i> E-Budget</a></li>':"";?>
                  </li>
                  <li>
                    <?php echo cek_akses('tt')?'<li><a href="'.base_url().'tagihan"><i class="fa fa-table"></i> Kontrabon Paperless</a></li>':"";?>
                  </li>
                  <li>
                    <?php echo cek_akses('nf')?'<li><a href="'.base_url().'notes_form"><i class="fa fa-file-text"></i> Notes Form</a></li>':"";?>
                  </li>
                </ul>
              </li>
              <li class="dropdown">
                <?php echo cek_akses('lap')?'<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-fw fa-bar-chart-o"></i>Laporan</a>':"";?>
                <ul class="dropdown-menu" style="width: 279px;">
                  <?php echo cek_akses('sb')?'<li><a href="'.base_url().'barcode"><i class="fa fa-fw fa-book"></i>Print Label Barcode</a></li>':"";?>
                  <li><a href="<?php echo base_url(); ?>laporan"><i class="fa fa-fw fa-book"></i>Laporan</a></li>
                  <?php echo cek_akses('exp')?'<li><a href="'.base_url().'export"><i class="fa fa-fw fa-book"></i>Export Excel</a></li>':"";?>
                  <?php echo cek_akses('lch')?'<li><a href="'.base_url().'chart"><i class="fa fa-fw fa-bar-chart-o"></i>Laporan Chart</a></li>':"";?>
                  <?php echo cek_akses('lps')?'<li><a href="'.base_url().'perawatan"><i class="fa fa-fw fa-gear"></i>Perawatan Sistem</a></li>':"";?>
                  <?php echo cek_akses('lhu')?'<li><a href="'.base_url().'hitung_ulang_stok"><i class="fa fa-fw fa-gear"></i>Hitung Ulang Stok</a></li>':"";?>
                </ul>
              </li>
              <li class="dropdown">
                <?php echo cek_akses('crm')?'<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa  fa-fw fa-group"></i>CRM</a>':"";?>
                <ul class="dropdown-menu" style="width: 279px;">
                  <?php echo cek_akses('ccc')?'<li><a href="'.base_url().'kontak"><i class="fa fa-fw fa-user"></i>Contact Customer</a></li>':"";?>
                  <?php echo cek_akses('cse')?' <li><a href="'.base_url().'mail"><i class="fa fa-fw fa-book"></i>Email Broadcast</a></li>':"";?>
                  <?php echo cek_akses('cse')?' <li><a href="'.base_url().'mail/ultah"><i class="fa fa-fw fa-book"></i>Email Broadcast Ulang Tahun</a></li>':"";?>
                  <?php echo cek_akses('csb')?' <li><a href="'.base_url().'sms_broadcast"><i class="fa fa-fw fa-phone"></i>SMS Broadcast</a></li>':"";?>
                </ul>
              </li>
              <li class="dropdown">
                <?php echo cek_akses('hrd')?'<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa  fa-fw fa-group"></i>HRIS</a>':"";?>
                <ul class="dropdown-menu" style="width: 279px;">
                  <?php echo cek_akses('hrk')?'<li><a href="'.base_url().'karyawan"><i class="fa fa-fw fa-user"></i>Data Karyawan</a></li>':"";?>
                  <?php echo cek_akses('hra')?' <li><a href="'.base_url().'absensi"><i class="fa fa-fw fa-book"></i>Absensi</a></li>':"";?>
                  <?php echo cek_akses('hks')?' <li><a href="'.base_url().'kasbon"><i class="fa fa-fw fa-book"></i>Kasbon</a></li>':"";?>
                  <?php echo cek_akses('hrt')?' <li><a href="'.base_url().'training"><i class="fa fa-fw fa-book"></i>Training</a></li>':"";?>
                  <?php echo cek_akses('hrc')?' <li><a href="'.base_url().'cuti"><i class="fa fa-fw fa-book"></i>Cuti</a></li>':"";?>
                </ul>
              </li>
              <li class="dropdown">
                <?php echo cek_akses('sys')?'<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-fw fa-gear"></i>System</a>':"";?>
                <ul class="dropdown-menu" style="width: 279px;">
                  <?php echo cek_akses('anls')?'<li><a href="'.base_url().'analisis"><i class="fa fa-fw fa-gear"></i>Analisis</a></li>':"";?>
                  <?php echo cek_akses('fnl')?'<li><a href="'.base_url().'finalize"><i class="fa fa-fw fa-gear"></i>Final Otomatis</a></li>':"";?>
                </ul>
              </li>

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
                      <?php echo $this->session->userdata('nama'); ?> - QHOMEPRO<br>
                      <?php
                      $db = $this->db->query("select * from traprove where UsrANo='".$this->session->userdata('user_id')."' and tanggal='".date('Ymd')."'")->row(); 
                      echo "<center style='color: #FFF !important;'>Kode Approval : <strong>".(isset($db->kode)?$db->kode:"-")."</strong></center>";
                      ?>
                    </p>
                  </li>
                  <li class="user-footer text-center">
                    <div class="btn-group">
                      <a href="<?php echo base_url(); ?>user/read/<?php echo $this->session->userdata('user_id') ?>" class="btn btn-default btn-flat">Profile</a>
                      <button type="button" class="btn <?= $this->session->userdata('print_service')?'btn-success':'btn-default' ?>" onclick="add_to_print_list()"><i class="fa fa-print fa-fw"></i>SP</button>
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
