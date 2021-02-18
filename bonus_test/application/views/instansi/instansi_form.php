<form action="<?php echo $action; ?>" method="post">
          <input type="hidden" name="btn" value="<?php echo $button; ?>" />
          <div class="box box-primary">
            <div class="box-header with-border">
	<input type="hidden" name="inskd" value="<?php echo $inskd; ?>" /> 
	</div>
              <div class="box-body form-horizontal">
              <div class="col-md-6">
	 <div class="form-group">
            <label class="col-md-3 control-label text-left">Kode Instansi</label>
            <div class="col-md-9">
              <input type="text" class="form-control required" name="inskd" id="inskd" value="<?php echo $inskd; ?>" />
            </div>
        </div>
	 <div class="form-group">
            <label class="col-md-3 control-label text-left">Nama Instansi</label>
            <div class="col-md-9">
              <input type="text" class="form-control required" name="insnm" id="insnm" value="<?php echo $insnm; ?>" />
            </div>
        </div>
	 <div class="form-group">
            <label class="col-md-3 control-label text-left">Alamat</label>
            <div class="col-md-9">
              <input type="text" class="form-control required" name="insalamat" id="insalamat" value="<?php echo $insalamat; ?>" />
            </div>
        </div>
	 <div class="form-group">
            <label class="col-md-3 control-label text-left">Telp</label>
            <div class="col-md-9">
              <input type="text" class="form-control required" name="instelp" id="instelp" value="<?php echo $instelp; ?>" />
            </div>
        </div>
	 <div class="box-footer">
	</div>
      </div>
    </form>