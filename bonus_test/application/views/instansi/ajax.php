<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
        <tr>
        <th>No</th>
		<th>Kode Instansi</th>
		<th>Nama Instansi</th>
		<th>Alamat</th>
		<th>Telp</th>
		
        </tr>
        </thead>
    <tbody><?php
foreach ($instansi_data as $instansi)
{
    ?>
    <tr ondblclick="show_detail('<?php echo $instansi->inskd ?>')">
			<td width="20px"><?php echo ++$start ?></td>
			<td><?php echo $instansi->inskd ?></td>
			<td><?php echo $instansi->insnm ?></td>
			<td><?php echo $instansi->insalamat ?></td>
			<td><?php echo $instansi->instelp ?></td>
		</tr>
    <?php
}
?>
    </tbody>
</table>
</div>

  <div class="col-md-8">
    <?php echo $pagination ?>
  </div>
