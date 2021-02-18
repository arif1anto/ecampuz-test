<?php 
$string = "
<div class=\"content-wrapper\" style=\"background: #dde2e2;\">
  <section class=\"content-header\">
    <h1>
      ".$judul."
    </h1>
    
    <ol class=\"breadcrumb\">
      <li><a href=\"<?php  echo base_url() ?>\"><i class=\"fa fa-dashboard\"></i> Home</a></li>
      <li><a href=\"<?php  echo base_url() ?>".ucfirst($controller)."\">Data ".ucfirst($controller)."</a></li>
    </ol>
  </section>

  <section class=\"content\">
    <div class=\"action-container\">
      <button type=\"button\" id=\"btn_baru\" class=\"btn btn-primary btn-block\" title=\"Data Baru\" onclick=\"baru()\"><i class=\"fa fa-file fa-2x\"></i></button>
      <button type=\"button\" id=\"btn_edit\" class=\"btn btn-success btn-block\" title=\"Ubah Data\" onclick=\"edit()\"><i class=\"fa fa-pencil fa-2x\"></i></button>
      <button type=\"button\" id=\"btn_hapus\" class=\"btn btn-danger btn-block\" title=\"Hapus Data\" onclick=\"hapus()\"><i class=\"fa fa-trash-o fa-2x\"></i></button>
            <div class=\"action-devider\"></div>
      <button type=\"button\" id=\"btn_cetak\" class=\"btn btn-default btn-block\" title=\"Cetak\" onclick=\"cetak_do()\" ><i class=\"fa fa-print fa-2x\"></i></button>
      <div class=\"action-devider\"></div><div class=\"action-devider\"></div>
      <button type=\"button\" id=\"btn_simpan\" class=\"btn btn-primary btn-block\" title=\"Simpan\" onclick=\"simpan()\" disabled><i class=\"fa fa-check fa-2x\"></i></button>
      <button type=\"button\" id=\"btn_batal\" class=\"btn btn-danger btn-block\" title=\"Batal\" onclick=\"batal()\" disabled><i class=\"fa fa-times fa-2x\"></i></button>
    </div>

    <div class=\"nav-tabs-custom isi-container\">
      <ul class=\"nav nav-tabs\" role=\"tablist\">
        <li role=\"presentation\"><a href=\"#detail\" aria-controls=\"detail\" role=\"tab\" data-toggle=\"tab\">Detail ".$judul."</a></li>
        <li role=\"presentation\" class=\"active\"><a href=\"#daftar\" aria-controls=\"daftar\" role=\"tab\" data-toggle=\"tab\">Daftar ".$judul."</a></li>
      </ul>

      <div class=\"tab-content\" style=\"padding: 0\">
        <div role=\"tabpanel\" class=\"tab-pane\" id=\"detail\" style=\"min-height: 450px;\">
          
        </div>
        <div role=\"tabpanel\" class=\"tab-pane active\" id=\"daftar\" style=\"min-height: 450px;\">
        <div class=\"box box-primary\">
        <div class=\"box-header form-horizontal\" style=\"padding-bottom: 0;\">
        <div class=\"col-sm-6\">
            <div class=\"form-group\">
                <div class=\"col-sm-10\">
                    <label class=\"checkbox-inline\"><input type=\"checkbox\" name=\"ckdesc\" checked> Descending</label>
                    <label class=\"checkbox-inline\"><input type=\"checkbox\" name=\"cklimit\" checked> Maks. 20 data</label>
                </div>
            </div>
        </div>
        <div class=\"col-sm-6 pull-right\">
            <div class=\"form-group\">
              <div class=\"col-sm-6\"> 
                <select class=\"form-control input-sm\" name=\"kolom\" id=\"kolom\">";
                foreach ($all as $row) {
                    $string .= "\n\t\t<option value=".strtolower($row['column_name']).">".strtolower($row['column_name'])."</option>";
                }
    $string .="</select>
              </div>
              <div class=\"col-sm-6\">
                <div class=\"input-group input-group-sm\">
                  <?php 
                      \$q = \"\";
                      if (\$this->input->get('q')) {
                        \$q = \$this->input->get('q');
                        \$q = str_replace_first(\"_\",\"/\",\$q);
                      }
                   ?>
                  <input type=\"text\" placeholder=\"Search\" class=\"form-control\" name=\"q\" value=\"<?php echo \$q ?>\" id=\"keyword\"> 
                  <div class=\"input-group-btn\">
                    <button class=\"btn btn-danger\" type=\"button\" onclick=\"getData(0)\"><i class=\"fa fa-refresh\"></i></button>
                  </div>
                </div>
              </div>
            </div>
        </div>

        </div>
        <?php echo \$this->ajax_pagination->create_script() ?>
        <div class=\"box-body\" id=\"tbl_data\">
            <div class=\"table-responsive\" >
            <table class=\"table table-bordered\">
            <thead>
            <tr>
            <th>No</th>";

foreach ($all as $row) {
    $string .= "\n\t\t<th>" . label($row['column_name']) . "</th>";
}
$string .= "\n\t\t
            </tr>
            </thead>
            <tbody>";

$string .= "</tbody>
            </table>
            </div>
        </div>";
$string .= "\n\t</div>
        </div>
    </section>
</div>

<div class=\"modal fade bs-example-modal-sm\" id=\"modalHapus\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"konfirmHapus\">
  <div class=\"modal-dialog modal-sm\" role=\"document\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
        <h4 class=\"modal-title\" id=\"myModalLabel\"><i class=\"fa fa-trash-o\"></i> Konfirmasi Hapus</h4>
      </div>
      <div class=\"modal-body\">
        <p>Yakin hapus Data dengan nomor <strong><span id=\"hps_do\"></span></strong>?</p>
        <p class=\"text-right\">
          <button type=\"button\" class=\"btn btn-success\" data-dismiss=\"modal\">Batal</button>
          <button type=\"submit\" name=\"hapus\" id=\"btnhapus\" value=\"\" class=\"btn btn-danger\" onclick=\"hapus_ya($(this).val())\"><i class=\"fa fa-trash-o\"></i> Hapus</button>
        </p>
      </div>
    </div>
  </div>
</div>
";

$string .= "
<script type=\"text/javascript\">
  var site = \"<?php echo site_url();?>\";

  \$(document).ready(function() {
    <?php if (\$act==\"create\" && \$id_sct!=null) : ?>
    baru('<?php echo \$id_sct ?>');
    <?php else : ?>
    show_detail(\"\",false);
    <?php endif ?>

    <?php if (\$q!=\"\"): ?>
      getData(0);
    <?php endif ?>
  });";

$string .= "function valid(paren) {
    input = \$(paren).find(\"input.required, input[required], textarea.required, textarea[required]\");
    \$('.form-group').removeClass(\"has-error\");
    is_valid = true;
    for (var i = 0; i < input.length; i++) {
      label = \$(input[i]).closest('.form-group').find('label').text();
      if (\$(input[i]).val()=='') {
        showMsg(\"Peringatan\",\"Kolom \"+label+\" wajib diisi\");
        \$(input[i]).closest(\".form-group\").addClass(\"has-error\");
        \$(input[i]).focus();
        if(!\$(input[i]).is(\":visible\")){
          \$(\".isi-container a[href='#tab1']\").tab('show');
        }
        is_valid = false;
        break;
      }
      if (\$(input[i]).attr('type')==\"number\" && \$(input[i]).val()!='') {
        if (parseFloat(\$(input[i]).val())<=0) {
          showMsg(\"Peringatan\",\"Kolom \"+label+\" tidak boleh 0\");
          \$(input[i]).closest(\".form-group\").addClass(\"has-error\");
          \$(input[i]).focus();
          is_valid = false;
          break;
        }
      }
    } 
    return is_valid;
  }

  function ganti_tab(tab) {
    \$('.isi-container a[href=\"#'+tab+'\"]').tab('show');
  }

  function show_detail(".$pk." = \"\", tab = true) {
    if (tab) {
      ganti_tab(\"detail\");
    }
    \$('#btn_baru').removeAttr(\"disabled\");
    \$('#btn_edit').removeAttr(\"disabled\");
    \$('#btn_hapus').removeAttr(\"disabled\");
    \$('#btn_bk').removeAttr(\"disabled\");
    \$('#btn_cetak').removeAttr(\"disabled\");
    \$('#btn_simpan').attr(\"disabled\",true);
    \$('#btn_batal').attr(\"disabled\",true);
    \$.ajax({
      url: site+\"".strtolower($c)."/read\",
      type: \"post\",
      data: {'".$pk."':".$pk."}
    })
    .done(function (data){
      \$(\"#detail\").html(data);
    })
    .fail(function (jqXHR, textStatus, errorThrown){
      console.error(\"The following error occurred: \"+textStatus, errorThrown);
      console.log(jqXHR.responseText);
    });
  }

  function baru(id = \"\") {
    ganti_tab('detail');
    \$('#btn_baru').attr(\"disabled\",true);
    \$('#btn_edit').attr(\"disabled\",true);
    \$('#btn_hapus').attr(\"disabled\",true);
    \$('#btn_bk').attr(\"disabled\",true);
    \$('#btn_cetak').attr(\"disabled\",true);
    \$('#btn_simpan').removeAttr(\"disabled\");
    \$('#btn_batal').removeAttr(\"disabled\");
    if (id!=\"\") {id = \"/\"+id}
    \$.ajax({
      url: site+\"".strtolower($c)."/create\"+id,
      type: \"post\"
    })
    .done(function (data){
      \$(\"#detail\").html(data);
    })
    .fail(function (jqXHR, textStatus, errorThrown){
      console.error(\"The following error occurred: \"+textStatus, errorThrown);
      console.log(jqXHR.responseText);
    });
  }

  function edit() {
    ".$pk." = \$(\"#detail input#".$pk."\").val();
    if (".$pk.".trim()==\"\") {
      showMsg(\"Peringatan\",\"Silahkan pilih data dahulu\");
    } else {
      ganti_tab('detail');
      \$('#btn_baru').attr(\"disabled\",true);
      \$('#btn_edit').attr(\"disabled\",true);
      \$('#btn_hapus').attr(\"disabled\",true);
      \$('#btn_bk').attr(\"disabled\",true);
      \$('#btn_cetak').attr(\"disabled\",true);
      \$('#btn_simpan').removeAttr(\"disabled\");
      \$('#btn_batal').removeAttr(\"disabled\");
      \$.ajax({
        url: site+\"".strtolower($c)."/update\",
        type: \"post\",
        data: {'".$pk."':".$pk."}
      })
      .done(function (data){
        if (data.trim()!=\"notfound\") {
          \$(\"#detail\").html(data);
        } else {
          showMsg(\"Peringatan\",\"Data tidak ditemukan\");
        }
      })
      .fail(function (jqXHR, textStatus, errorThrown){
        console.error(\"The following error occurred: \"+textStatus, errorThrown);
        console.log(jqXHR.responseText);
      });
    }
  }

  function hapus(){
    ".$pk." = \$(\"#detail input#".$pk."\").val();
    if (".$pk.".trim()==\"\"){
      showMsg(\"Peringatan\",\"Silahkan pilih data dahulu\");
    } else {
      \$('#modalHapus #hps_do').text(".$pk.");
      \$('#modalHapus #btnhapus').val(".$pk.");
      \$('#modalHapus').modal('show');
    }
  }

  function hapus_ya(".$pk.") {
    \$.ajax({
      url: site+\"".strtolower($c)."/delete\",
      type: \"post\",
      data: {'".$pk."':".$pk."}
    })
    .done(function (data){
      \$('#modalHapus').modal('hide');
      if (data.trim()==\"OK\") {
        showMsg('Informasi','Data ".$c." <strong>'+".$pk."+'</strong> berhasil dihapus');
        show_detail();
      } else if(data.trim()==\"notfound\"){
        showMsg(\"Peringatan\",\"Data tidak ditemukan\");
        show_detail();
      }
    })
    .fail(function (jqXHR, textStatus, errorThrown){
      console.error(\"The following error occurred: \"+textStatus, errorThrown);
      console.log(jqXHR.responseText);
    });
  }

  function batal() {
    show_detail();
  }

  function simpan() {
    if(valid('#detail')){
      form = \$('#detail form');
      inp = \$(form).find('input,textarea,select');
      var post = {};
      for (var i = 0; i < inp.length; i++) {
        post[\$(inp[i]).attr('name')] = \$(inp[i]).val();
      }
      \$.ajax({
        url: site+\"".strtolower($c)."/create_action\",
        type: \"post\",
        data : post
      })
      .done(function (data){
        console.log(data);
        if (data.trim()==\"simpan\") {
          showMsg('Informasi','Data ".$judul." <strong>'+post.".$pk."+'</strong> berhasil disimpan');
          show_detail(post.".$pk.");
        } else if(data.trim()=='edit') {
          showMsg('Informasi','Data ".$judul." <strong>'+post.".$pk."+'</strong> berhasil diubah');
          show_detail(post.".$pk.");
        } else {
          showMsg(\"Peringatan\",data);
        }
        history.pushState(null, null, '<?php echo base_url() ?>".strtolower($c)."');
      })
      .fail(function (jqXHR, textStatus, errorThrown){
        console.error(\"The following error occurred: \"+textStatus, errorThrown);
        console.log(jqXHR.responseText);
      });
    }
  }
</script>";

$hasil_view_list = createFile($string, $target."views/".$c_url."/".$v_list_file);

?>