<style>
  .bdg-det { float: right; margin-top: 2px; }
</style>

<script src="<?php echo site_url('assets/plugins/chartjs/dist/Chart.min.js') ?>"></script>
<script src="<?php echo site_url('assets/plugins/chartjs/samples/utils.js') ?>"></script>
<script> var ax = {} </script>

<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <b>PT. BANGUNAN JAYA MANDIRI</b>
    </h1>
  </section>

  <section class="content">
    <div class="box box-info">
      <div class="box-header">
      </div>
      <div class="box-body" style="padding: 30px;">
        <?php if (cek_akses('db')): ?>
          <div class="row">
            <?php if(cek_akses('dbob')) { ?>
              <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                  <div class="inner">
                    <h3><?php echo isset($jmltr)?$jmltr:'0' ?></h3>
                    <p>Order Baru Hari Ini</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
            <?php } ?>

            <?php if(cek_akses('dbpmh')) { ?>
              <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                  <div class="inner">
                    <h3><?php echo isset($totbyr_hariini)?rp($totbyr_hariini):'0' ?></h3>
                    <p>Pembayaran Masuk Hari Ini (Include)</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
            <?php } ?>

            <?php if(cek_akses('dbpmk')) { ?>
              <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                  <div class="inner">
                    <h3><?php echo isset($totbyr_kemarin)?rp($totbyr_kemarin):'0' ?></h3>
                    <p>Pembayaran Masuk Kemarin (Include)</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
            <?php } ?>

            <?php if(cek_akses('dbmb')) { ?>
              <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                  <div class="inner">
                    <h3><?php echo $newmember ?></h3>
                    <p>Member Baru</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
                  </div>
                  <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
            <?php } ?>
          </div>
        <?php endif ?>

        <div class="row">
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-green">
                <i class="ion ion-ios-cart-outline"></i>
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Terlaris Hari Ini</span>
                <span class="info-box-number"><?php echo $larisjml ?> Produk</span>
                <span><?php echo substr($laris,0,29) ?></span>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua">
                <i class="ion ion-ios-cart-outline"></i>
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Terlaris Kemarin</span>
                <span class="info-box-number"><?php echo $larisjmlkmrn ?> Produk</span>
                <span class="progress-description"> <?php echo $lariskmrn ?> </span>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Penjualan Members</span>
                <span class="info-box-text">Hari Ini</span>
                <span class="info-box-number"><?php echo $member ?> Transaksi</span>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Penjualan Umum</span>
                <span class="info-box-text">Hari Ini</span>
                <span class="info-box-number"><?php echo $umum ?> Transaksi</span>
              </div>
            </div>
          </div>
        </div>
      </div> 
    </div>

    <?php if(cek_akses('owner1')) { ?>
      <?php $this->load->view('dashboard/expandable', ['akses'=>'owner1', 'header'=>'Laporan Laba/Rugi']); ?>
    <?php } ?>

    <?php if(cek_akses('owner2')) { ?>
      <?php $this->load->view('dashboard/expandable', ['akses'=>'owner2', 'header'=>'Laporan Neraca']); ?>
    <?php } ?>

    <?php if(cek_akses('owner3')) { ?>
      <div class="row" style="padding: 0 12px;">
        <?php if(cek_akses('owner3')) { ?>
          <?php $this->load->view('dashboard/saldo'); ?>
        <?php } ?>
      </div>
    <?php } ?>

    <?php if(cek_akses('dbmd1') || cek_akses('dbmd2') || cek_akses('dbmd3') || cek_akses('dbmd4') || cek_akses('dbmd5')) { ?>
      <?php $this->load->view('dashboard/top_five', array('akses'=>'md', 'header'=>'MD')); ?>
    <?php } ?>

    <?php if(cek_akses('dbfin1') || cek_akses('dbfin2') || cek_akses('dbfin3') || cek_akses('dbfin4') || cek_akses('dbfin5')) { ?>
      <?php $this->load->view('dashboard/top_five_fin', array('akses'=>'fin', 'header'=>'Finance')); ?>
    <?php } ?>

    <?php if(cek_akses('dbacc1') || cek_akses('dbacc2') || cek_akses('dbacc3') || cek_akses('dbacc4') || cek_akses('dbacc5') || cek_akses('dbacc6') || cek_akses('dbacc7') || cek_akses('dbacc8') || cek_akses('dbacc9')) { ?>
      <?php $this->load->view('dashboard/top_five_acc', array('akses'=>'acc', 'header'=>'Accounting')); ?>
    <?php } ?>

    <?php if(cek_akses('dbar1') || cek_akses('dbar2') || cek_akses('dbar3') || cek_akses('dbar4') || cek_akses('dbar5')) { ?>
      <?php $this->load->view('dashboard/top_five', array('akses'=>'ar', 'header'=>'Account Receivable')); ?>
    <?php } ?>

    <?php if(cek_akses('dbtax1') || cek_akses('dbtax2') || cek_akses('dbtax3') || cek_akses('dbtax4') || cek_akses('dbtax5')) { ?>
      <?php $this->load->view('dashboard/top_five', array('akses'=>'tax', 'header'=>'Tax')); ?>
    <?php } ?>

    <?php if(cek_akses('dbsal1')) { ?>
      <?php $this->load->view('dashboard/pdf', array('akses'=>'sales1', 'header'=>'Sales 1')); ?>
    <?php } ?>

    <?php if(cek_akses('dbsal2')) { ?>
      <?php $this->load->view('dashboard/ongkir', array('akses'=>'sales3', 'header'=>'Sales 2')); ?>
    <?php } ?>

    <div class="box box-success" style="margin-top: 15px; display: none">
      <!-- <?php if(cek_akses('db')) { ?> <div class="box-header">Omzet Harian</div> <?php } ?> -->
      <div class="box-body" style="padding: 30px;">
        <div class="row" style="display: none">
          <div class="col-sm-12">
            <canvas id="chart_budget_tahunan"></canvas>
          </div>
        </div>

        <?php if(cek_akses('db')) { ?>
          <div class="row">
            <div class="col-sm-10">
              <div id="barchart" class=".img-responsive" style="padding: 10px; padding-top: 30px; background: #fff; min-height: 550px; box-shadow: 0px 0px 10px -1px #000"></div>
            </div>
            <div class="col-sm-2">
              <select class="form-control" name="year" style="display: none">
                <?php for ($i=date('Y'); $i > 2009; $i--): ?>
                  <option value="<?php echo $i ?>">Tahun <?php echo $i ?></option>
                <?php endfor ?>
              </select>
              <div class="input-group">
                <input type="text" name="cari_ktg" id="ktg" class="form-control" placeholder="Cari Kategori" onkeyup="cari()">
                <div class="input-group-btn">
                  <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                </div>
              </div>
              <div class="well well-sm" style="height: 400px;overflow-y: scroll; margin-bottom: 5px; background: #fff;">
                <?php foreach($ktg as $row) { ?>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="ktg[]" value="<?php echo $row->KtgANo ?>"><?php echo $row->KtgNm ?>
                    </label>
                  </div>
                <?php } ?>
              </div>
              <button type="button" class="btn btn-success btn-block" onclick="drawCurveTypes(0)"><i class="fa fa-line-chart fa-fw"></i> Tampilkan Chart</button>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>
</div>

<div id="img_box"></div>
<script src="<?= site_url("assets/dist/js") ?>/loader.js"></script>
<script src="<?= site_url("assets") ?>/plugins/flot/jquery.flot.min.js"></script>
<script src="<?= site_url("assets") ?>/plugins/flot/jquery.flot.resize.min.js"></script>
<script src="<?= site_url("assets") ?>/plugins/flot/jquery.flot.pie.min.js"></script>
<script src="<?= site_url("assets") ?>/plugins/flot/jquery.flot.categories.min.js"></script>
<script src="<?php echo site_url("assets/dist/js/img_box.js") ?>"></script>
<script>
  load_imgbox()
  $(function() {
    $('.list-group').html('<div class="sk-circle-fade spinn"><div class="sk-circle-fade-dot"></div><div class="sk-circle-fade-dot"></div><div class="sk-circle-fade-dot"></div><div class="sk-circle-fade-dot"></div><div class="sk-circle-fade-dot"></div><div class="sk-circle-fade-dot"></div><div class="sk-circle-fade-dot"></div><div class="sk-circle-fade-dot"></div><div class="sk-circle-fade-dot"></div><div class="sk-circle-fade-dot"></div><div class="sk-circle-fade-dot"></div><div class="sk-circle-fade-dot"></div></div>')
    // show_chart()
    // prepareChart()
  })

    // google.charts.load('current', {
    //   callback: drawCurveTypes,
    //   packages: ['bar', 'corechart']
    // })

    // function cari() {
    //   mr = $('#ktg').val().toLowerCase()
    //   merk = $("input[name='ktg[]']")
    //   for(i=0; i<merk.length; i++){
    //     lb = $(merk[i]).closest('label').text().trim().toLowerCase()
    //     ck = $(merk[i]).closest('div.checkbox')
    //     if (mr=='') {
    //       $(ck).show()
    //     } else if (lb.search(mr)>=0) {
    //       $(ck).show()
    //     } else {
    //       $(ck).hide()
    //       $(merk[i]).removeAttr('checked')
    //     }
    //   }
    // }

    // function drawCurveTypes(init=1) {
    //   ckmerk = $("input[name='ktg[]']");
    //   ktgs = []; ktg_nama = []; j = 0;
    //   for (var i = 0; i < ckmerk.length; i++) {
    //     if ($(ckmerk[i]).is(":checked")) {
    //       ktgs[j] = $(ckmerk[i]).val()
    //       ktg_nama[j] = $(ckmerk[i]).closest('label').text().trim()
    //       j++;
    //     }
    //   }

    //   if(init==0 && ktgs.length<1) {
    //     showMsg("Peringatan","Pilih minimal 1 kategori");
    //   } else if(ktgs.length>15) {
    //     alert("Maksimal 15 kategori")
    //   } else {
    //     $.ajax({
    //       method: "POST",
    //       url: "<?php echo base_url(); ?>home/data_ktg/"+init,
    //       data: {ktg:ktgs},
    //       beforeSend: function() { //$("#loading").show()
    //     },
    //     success: function(data) {
    //       data = JSON.parse(data)

    //       if(data['ktgnm'].length>0) {
    //         ktg_nama = data['ktgnm']
    //         ktgano = data['ktgano']
    //         for (var i = 0; i < ktgano.length; i++) {
    //           $('input[type=checkbox][value='+ktgano[i]+']').prop('checked', true)
    //         }
    //       } 

    //       var dt = new google.visualization.DataTable()
    //       dt.addColumn('string', 'X')
    //       for (var i = 0; i < ktg_nama.length; i++) {
    //         dt.addColumn('number', ktg_nama[i])
    //       }

    //       var chart_data = data['data']
    //       dt.addRows(chart_data)

    //       var options = {
    //         height: 500,
    //         hAxis: {
    //           title: 'Tanggal'
    //         },
    //         vAxis: {
    //           title: 'Penjualan',
    //           format:'decimal', 
    //         }
    //       }

    //       var chart = new google.charts.Bar(document.getElementById('barchart'))
    //       chart.draw(dt, google.charts.Bar.convertOptions(options))

    //       // $("#loading").hide()
    //     },
    //     error: function(jqXHR, exception) {
    //       // $("#loading").hide()
    //       console.log(jqXHR.responseText)
    //     }
    //   });

    //   }
    // }

    var chart_budget_tahunan
  // function show_chart() {
  //   $.ajax({
  //     url: site+"home/get_budget_tahunan",
  //     type: "post",
  //   })
  //   .done(function (data){
  //     var dt = JSON.parse(data);
  //     if (chart_budget_tahunan==undefined) {
  //       var config = {
  //         type: 'bar',
  //         data: dt,
  //         options: {
  //           aspectRatio:2,
  //           responsive: true,
  //           title: {
  //             display: true,
  //             text: 'Prosentase Penggunaan Budget <?php echo date('Y') ?>'
  //           },
  //           tooltips: {
  //             mode: 'index',
  //             intersect: false,
  //           },
  //           hover: {
  //             mode: 'nearest',
  //             intersect: true
  //           },
  //         }
  //       };
  //       var ctx = document.getElementById('chart_budget_tahunan').getContext('2d');
  //       chart_budget_tahunan = new Chart(ctx, config);
  //     } else {
  //       chart_budget_tahunan.data = dt;
  //       chart_budget_tahunan.update();
  //     }
  //   })
  //   .fail(function (jqXHR, textStatus, errorThrown){
  //     console.error("The following error occurred: "+textStatus, errorThrown);
  //     console.log(jqXHR.responseText);
  //   });
  // }

  <?php if(cek_akses('owner1') || cek_akses('owner2') || cek_akses('owner3')) { ?>
    function buka(akses, scroll=true) {
      $('#body-'+akses).slideDown('fast')
      $('#bt-close-'+akses).fadeIn('fast')
      $('#bt-open-'+akses).hide()
      resizeIframe(document.getElementById("aifrem-"+akses))

      if(scroll) { 
        $('html, body').animate({ scrollTop: $('#body-'+akses).offset().top -12 }, 800) 
      }

      if(akses=='owner3') { 
        $('#div-owner3b').slideDown('fast')
        resizeIframe(document.getElementById("aifrem-owner3b"))
      }
    }

    function tutup(akses) {
      $('#body-'+akses).slideUp('fast')
      $('#bt-open-'+akses).fadeIn('fast')
      $('#bt-close-'+akses).hide()

      if(akses=='owner3') { 
        $('#div-owner3b').slideUp('fast')
      }
    }

    async function isi_data(akses, title) {
      var x = await ajaxx('mini_report', {akses:akses})
      if(x!='x') { 
        $('#body-'+akses).html('<iframe id="aifrem-'+akses+'" src="'+x+'" frameborder="0" scrolling="no" style="position: relative; width: 100%;" oanload="resizeIframe(this)"/>')
      } else {
        $('#bt-open-'+akses).attr('onclick', 'swal_noreport("'+title+'")')
      }
      $('#bt-open-'+akses).removeAttr('disabled')
      $('#bt-open-'+akses).html('BUKA')
      $('#body-'+akses).css('display', 'none')
    }
    
    function swal_noreport(title) {
      showMsg('Peringatan', title+' belum tersedia')
    }

    function resizeIframe(obj) { obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + 'px' }
  <?php } ?>

  async function get_tf(tipe, akses, e=false, f=false) {
    if(e) { 
      setTimeout(function() { 
        $('#data-'+tipe+'-'+akses).html('') 
        $('#det-'+tipe+'-'+akses).remove()
      }, 800)
    } else {
      var result = await ajaxx('get_top_five', {kode: akses, type: tipe})
      var r = JSON.parse(result)
      switch(tipe) {
        case 'title':
        d = r[1]
        r = r[0]
        for (i = 0; i <= r.length; i++) {
          $('#pt-'+i+'-'+akses).html(r[i])
          if(d[i]=='') {
            $('#det-'+(i+1)+'-'+akses).remove()
          } else {
            $('#det-'+(i+1)+'-'+akses).attr('href', d[i])
          }
        }
        break

        default:
        var i
        if(r.length>1) {
          $('#det-'+tipe+'-'+akses).show()
          $('#data-'+tipe+'-'+akses).attr('stylex', $('#data-'+tipe+'-'+akses).attr('style'))
          $('#data-'+tipe+'-'+akses).removeAttr('style')
          $('#data-'+tipe+'-'+akses).html('')
        } else {
          $('#data-'+tipe+'-'+akses).html('<font class="spinn" style="left: 45%">Belum ada data</font>')
        }
        for (i = 0; i < r.length; i++) {
          var bdg = r[i]['bdg']==0 ? "not" : ""
          if(tipe=='1') {
            $('#data-1-'+akses).append('<font class="list-group-item" style="font-size: 13px">'+r[i]['a']+' \
              <span class="'+bdg+'badge">'+r[i]['b']+'</span></font>')
          } else {        
            $('#data-'+tipe+'-'+akses).append('<font class="list-group-item">'+r[i]['a']+' <span class="'+bdg+'badge">'+r[i]['b']+'</span></font>')
          }
        }
        break

        if(f) {
          console.log(ax[akses])
          let index = ax[akses].indexOf(tipe)
          if(index > -1) {
            ax[akses].splice(index, 1)
          }
          if(ax[akses].length <1) {
            $('#btr-'+akses).removeAttr('disabled')
          }
        }
      }
    }
  }

  function refresh(akses, is_acc=false) {
    // $('#btr-'+akses).attr('disabled', true)
    for(var i = ax[akses].length - 1; i>=0; i--) {
      $('#data-'+ax[akses][i]+'-'+akses).attr('style', $('#data-'+ax[akses][i]+'-'+akses).attr('stylex'))
      $('#data-'+ax[akses][i]+'-'+akses).removeAttr('stylex')
      $('#data-'+ax[akses][i]+'-'+akses).html('<div class="sk-circle-fade spinn"><div class="sk-circle-fade-dot"></div><div class="sk-circle-fade-dot"></div><div class="sk-circle-fade-dot"></div><div class="sk-circle-fade-dot"></div><div class="sk-circle-fade-dot"></div><div class="sk-circle-fade-dot"></div><div class="sk-circle-fade-dot"></div><div class="sk-circle-fade-dot"></div><div class="sk-circle-fade-dot"></div><div class="sk-circle-fade-dot"></div><div class="sk-circle-fade-dot"></div><div class="sk-circle-fade-dot"></div></div>')
      if(is_acc) {
        get_tf_acc(ax[akses][i], akses, false, true)
      } else {
        get_tf(ax[akses][i], akses, false, true)
      }
    }
  }

  async function ajaxx(url, data={}) {
    try {
      let result = await $.ajax({
        url: site+"home/"+url,
        type: "post",
        data: data
      })
      return result
    } catch(error) { console.error(error) }
  }

</script>