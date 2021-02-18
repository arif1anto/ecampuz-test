<?php 

$string = "<div class=\"box box-primary\">
        <div class=\"box-header with-border\">
    	<input type=\"hidden\" name=\"btn\" value=\"<?php echo \$button; ?>\" />";
$string .= "\n\t</div>
        <div class=\"box-body form-horizontal\">
        <div class=\"col-md-6\">";
foreach ($all as $row) {
    if ($row["data_type"] == 'text'){
$string .= "\n\t<div class=\"form-group\">
            <label class=\"col-md-3 control-label text-left\">".label($row["column_name"])."</label>
            <div class=\"col-md-9\">
                <textarea readonly class=\"form-control\" rows=\"3\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\"><?php echo $".$row["column_name"]."; ?></textarea>
            </div>
        </div>";
    } else{
$string .= "\n\t <div class=\"form-group\">
            <label class=\"col-md-3 control-label text-left\">".label($row["column_name"])."</label>
            <div class=\"col-md-9\">
                <input readonly type=\"text\" class=\"form-control required\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" value=\"<?php echo $".$row["column_name"]."; ?>\" />
            </div>
        </div>";
    }
}
$string .= "\n\t <div class=\"box-footer\">";
$string .= "\n\t</div>
       </div>
    </div>
</div>";

$hasil_view_read = createFile($string, $target."views/".$c_url."/".$v_read_file);

?>