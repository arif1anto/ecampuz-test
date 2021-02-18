<html>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>assets/images/favicon.png"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome-4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/square/blue.css">

<title>ECampuz Test</title>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="#">ECampuz Test</a>
    </div>
    <div class="login-box-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <?php echo form_open("login/login_aksi"); ?>
      <div class="form-group has-feedback">
        <input name="username" type="text" class="form-control" placeholder="Username" required autocomplete="off">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="password" type="password" class="form-control" placeholder="Password" required autocomplete="off">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <input type="hidden" name="deviceid" id="deviceid" value="">
      </div>
      <button type="submit" class="btn btn-danger btn-block" style="margin:20px 0;">Masuk</button>
      <?php echo form_close() ; ?>
      <div class="text-center hidden-xs">
        <b>Version</b> <?= getconfig('qversi') ?>
      </div>
    </div>
    <div class="login-box-footer">
      <p class="text-center no-margin"><strong>Copyright <span class="cl">&copy;</span> <?= date('Y') ?></p>
      <p class="text-center">All rights reserved.<span id="deviceid" style="display: none;"></span></p>
    </div>

  </body>
  </html>

  <script type="text/javascript">
  uuid=function(){
    var u = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g,
      function(c) {
      var r = Math.random() * 16 | 0,
      v = c == 'x' ? r : (r & 0x3 | 0x8);
      return v.toString(16);
      });
    return u;
  }

  getDeviceId = function(){
    var current = window.localStorage.getItem("_DEVICEID_")
    if (current) return current;
    var id = uuid();
    window.localStorage.setItem("_DEVICEID_",id);   
    return id;
  }

  document.getElementById("deviceid").value=getDeviceId();
</script>