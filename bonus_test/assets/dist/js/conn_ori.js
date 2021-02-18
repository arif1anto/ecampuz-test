  var cl = 0;
  $('span.cl').click(function() {
    con();
  });  
  $(document).keydown(function(e) {
    if(e.ctrlKey && e.keyCode==67 && e.altKey){
      con();
    }
  });
  function con() {
    cl++;
    if (cl>=5) {
      cl=0;
      $('#clcn').modal("show");
    }
  }

  $('#save_con').click(function() {
    host = $('#clcn #host').val();
    user = $('#clcn #db_user').val();
    pass = $('#clcn #db_pass').val();
    port = $('#clcn #port').val();
    dbnm = $('#clcn #dbnm').val();
    $.ajax({
      url: site+"conn/save",
      type: "post",
      data: {'host':host, 'user':user, 'pass':pass, 'port':port, 'dbnm':dbnm},
      beforeSend: function(){
        toast('Loading ...',"<i class=\'fa fa-circle-o-notch fa-spin fa-2x\'></i>","fadein","center");
      },
      success: function(data) {
        toast(data,"<i class=\'fa fa-info-circle fa-2x\'></i>","fadeout","center");
      },
      error: function(jqXHR, exception)
      {
        console.log(jqXHR.responseText);
        if (exception!="abort") {
          toast("Error: Terjadi Kesalahan<br> Code: "+exception+" "+jqXHR.status,"<i class=\'fa fa-warning fa-2x\'></i>","fadeout","center");
        }
        $("#loading").hide();
      }
    });
  });

  $('#act').click(function() {
    stts = $('#cn_status').val();
    sts = '';
    if (stts=='N') {
      sts = 'Y';
    } else if (stts=='Y') {
      sts = 'N';
    }
    $.ajax({
      url: site+"conn/activate",
      type: "post",
      data: {'sts':sts},
      beforeSend: function(){
        toast('Loading ...',"<i class=\'fa fa-circle-o-notch fa-spin fa-2x\'></i>","fadein","center");
      },
      success: function(data) {
        toast(data,"<i class=\'fa fa-info-circle fa-2x\'></i>","fadeout","center");
        if (data.substr(0,5)!='Error') {
          $('#cn_status').val(sts);
          if (sts=='Y') {
            $('#act').text('Nonaktifkan Server Backup');
            $('#act').removeClass('btn-warning');
            $('#act').addClass('btn-danger');
          } else {
            $('#act').text('Aktifkan Server Backup');
            $('#act').removeClass('btn-danger');
            $('#act').addClass('btn-warning');
          }
        }
      },
      error: function(jqXHR, exception)
      {
        console.log(jqXHR.responseText);
        if (exception!="abort") {
          toast("Error: Terjadi Kesalahan<br> Code: "+exception+" "+jqXHR.status,"<i class=\'fa fa-warning fa-2x\'></i>","fadeout","center");
        }
        $("#loading").hide();
      }
    });
  });