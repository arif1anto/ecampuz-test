<?php

function limit_words($string, $word_limit){
  $words = explode(" ",$string);
  return implode(" ",array_splice($words,0,$word_limit));
}

function cek_akses($akses){
  $ci = & get_instance();
  $user = $ci->session->userdata("user_id");
  $query = $ci->db->query("SELECT u.UsrANo,g.UsrGrpANo,a.UsrGrpAkses AS akses FROM msuserid u 
     LEFT JOIN msusergroup g ON u.UsrGrpANo=g.UsrGrpANo
     LEFT JOIN msuserakses a ON a.UsrGrpANo=g.UsrGrpANo
     WHERE u.UsrANo='$user' AND a.UsrGrpAkses='".$akses."'");
  return ($query->num_rows()>0);
}

function cek_print($tbl, $klmp, $klm, $ref) {
    $ci = & get_instance();
    $query = $ci->db->query("SELECT $klmp print FROM $tbl WHERE $klm='$ref'")->row();
    return (isset($query->print)?$query->print:0);
}

function acak($panjang){
  $kata = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  $string = "";
  for ($i=0; $i < $panjang; $i++) { 
     $pos = rand(0, strlen($kata)-1);
     $string .= $kata[$pos];
 }
 return $string;
}
//replace first karakter only
function str_replace_first($from, $to, $subject)
{
  $from = '/'.preg_quote($from, '/').'/';
  return preg_replace($from, $to, $subject, 1);
}


function convert_rupiah($rp) {
  $newrp = str_replace(",", "", $rp);
  if ($newrp=="") {
     $newrp = 0;
 }
 return $newrp;
}	

function coma($rp) {
  $newrp = str_replace(",", ".", $rp);
  return $newrp;
}	

function redirect_java($url)
{
  ?>
  <script type="text/javascript">
     window.location = "<?php echo $url ?>";
 </script>
 <?php
}

function rupiah($value)
{
  $val = number_format($value,0,".",",");
  return (doubleval($value)!=0?$val:0);
}

function format_ribuan($num) {

  if($num>1000) {

    $x = round($num);
    $x_number_format = number_format($x);
    $x_array = explode(',', $x_number_format);
    $x_parts = array('rb', 'jt', 'mil', 'trl');
    $x_count_parts = count($x_array) - 1;
    $x_display = $x;
    $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
    $x_display .= $x_parts[$x_count_parts - 1];

    return $x_display;

}

return $num;
}

function rp($value)
{
	if ($value==null) {
		return 0;	
	} else {
		$val = number_format($value,2,".",",");
		if (substr($val,-3)==".00") {
			return number_format($value,0,".",",");
		}else{
			return number_format($value,2,".",",");
		}
	}
}
function rp_dua($value)
{
  if ($value==null) {
     return 0;	
 } else {
     $val = number_format($value,2,".",",");
     return (doubleval($value)!=0?$val:0);
 }
}

function usd_currency($uang,$mata_uang="USD")
{
  $currency = 12000 ; 
  if ( $mata_uang == "IDR" )
  {
     /*convert ke rupiah dulu*/
     $uang = $uang * $currency;
     $value = number_format($uang,0,"",",");
     $x =  "<span class='currency' style='color:#B4B4B4'>IDR</span> <span class='value'>".$value."</span>";
     return $x ; 
 }
 else if  ( $mata_uang == "USD" )
 {
     $uang = number_format($uang, 2); 
     $x =  "<span class='currency' style='color:#B4B4B4'>USD</span> <span class='value'>".$uang."</span>";
     return $x ; 
 }
}

function tgl($tanggal)
{
  if ($tanggal!="") {
     $tgl = substr($tanggal, 6,2).'/'.substr($tanggal, 4,2).'/'.substr($tanggal,0,4);
     return $tgl; 
 } else {
     return "";
 }
}
//170320 1026
function last_tgl($tanggal)
{
  if ($tanggal!="") {
     $tgl = substr($tanggal, 4,2).'/'.substr($tanggal, 2,2).'/20'.substr($tanggal,0,2)
     .' '.substr($tanggal,6,2).':'.substr($tanggal,8,2);
     return $tgl; 
 } else {
     return "";
 }
}


function tgl_convert($tgl)
{
  if ($tgl!="") {
     $ex = explode('/', $tgl);
     $tgl_conv = $ex[2].$ex[1].$ex[0];
     return $tgl_conv; 
 } else {
     return "";
 }
}

function alpha($str)
{
  return ( ! preg_match("/^([a-z])+$/i", $str)) ? FALSE : TRUE;
}


function alpha_numeric($str)
{
  return ( ! preg_match("/^([a-z0-9])+$/i", $str)) ? FALSE : TRUE;
}

function alpha_dash($str)
{
  return ( ! preg_match("/^([-a-z0-9_-])+$/i", $str)) ? FALSE : TRUE;
}

function is_natural($str)
{   
  return (bool)preg_match( '/^[0-9]+$/', $str);
}

//================================ PAGINATION SECURITY 
// ============================ FOR SECURITY FILTERING INTPUT ===========================
function pagination_alpha($str)
{
  return ( ! preg_match("/^([a-z])+$/i", $str)) ? "" : $str;
}

function pagination_alpha_numeric($str)
{
  return ( ! preg_match("/^([a-z0-9])+$/i", $str)) ? "" : $str;
}


function pagination_alpha_dash($str)
{
  return ( ! preg_match("/^([-a-z0-9_-])+$/i", $str)) ? "" : $str;
}

function pagination_alpha_all($str)
{
//	if ( $str != "" & isset($str))
//	{
//		return ( ! preg_match("/^([-a-z0-9_-])+$/i", $str)) ? die("$str not autorize") : $str;
//	}
  return $str;
}

function cek_session(){
    $ci = & get_instance();
    // if(!$ci->input->is_ajax_request())
    // {
    $ci->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
    $ci->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
    $ci->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
    $ci->output->set_header('Pragma: no-cache');
    $ci->output->set_header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
    // } else {
    //     $ci->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
    //     $ci->output->set_header("cache-Control: no-store, no-cache, must-revalidate");
    //     $ci->output->set_header("cache-Control: post-check=0, pre-check=0", false);
    //     $ci->output->set_header("Pragma: no-cache");
    //     $ci->output->set_header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
    // }

    $user = $ci->session->userdata("user_id");
    $loged_in = $ci->session->userdata("logged_in");

    if ($loged_in!='TRUE' || $user=='') {
        redirect("login/logout_post"); 
    }
}

function style_yn($a){
  if ($a=="Y" || $a=="y") {
     return "<span class='badge label-success'>Ya</span>";
 } elseif($a=="N" || $a=="n") {
     return "<span class='badge label-danger'>Tidak</span>";
 } else {
     return "";
 }
}

function style_lock($a){
    if ($a=="Y" || $a=="y") {
        return "<span class='label label-danger'><i class='fa fa-lock'></i> Locked</span>";
    } else {
        return "";
    }
}

function rp_neraca($value)
{
  if ($value==null) {
     return 0;	
 } else {
     $val = number_format($value,0,".",",");
     return (doubleval($value)!=0?$val:0);
 }
}

function kurung_rp($dk='D',$nilai)
{
  $n = str_replace(",", "", $nilai);
  $n = floatval($n);
  if ($dk=='K') {
     $n = $n*(-1);
 }
 if ($n<0) {
     return "(".rp_neraca(abs($n)).")";
 } else {
     return rp_neraca(abs($n));
 }
}


function get_foto($UsrANo)
{
  $ci =& get_instance();
  $ci->load->database();
  $dt = $ci->db->select('foto')
  ->get_where('msuserid',array('UsrANo' => $UsrANo))
  ->row();
  if (isset($dt->foto) && substr($dt->foto,0,10)=='data:image') {
     return $dt->foto;
 } else {
     return site_url('assets/images/no_photo.jpg');
 }
}

function getconfig($name='')
{
  if ($name!='') {
     $ci =& get_instance();
     $ci->load->database();
     $q = $ci->db->get_where('mssetprog',array('setano' => $name));
     $dt = $q->row();
     return isset($dt->setchar) ? $dt->setchar : "";
 } else {
     return "0";
 }
}

function cek_periode()
{
  $ci =& get_instance();
  $ci->load->database();
  $q = $ci->db->get_where('mssetprog',array('setano' => 'lock'));
  $dt = $q->row();
  return isset($dt->setchar) ? $dt->setchar : "";
}


function get_accjuoto($kode='')
{
  if ($kode!='') {
     $ci =& get_instance();
     $ci->load->database();
     $q = $ci->db->get_where('mssetjuoto',array('sjotrans' => $kode));
     $dt = $q->row();
     return isset($dt->AcPKd) ? $dt->AcPKd : "";
 } else {
     return "";
 }
}

//mencari harga asli dari diskon-diskon
function hrg_asli($net=0, $ps1=0, $ps2=0, $ps3=0, $rp = 0)
{
  $hrp = $net + $rp;
  $hps3 = ($hrp * 100) / (100 - $ps3);
  $hps2 = ($hps3 * 100) / (100 - $ps2);
  $hps1 = ($hps2 * 100) / (100 - $ps1);
  return $hps1;
}

function hrg_diskon($pl=0, $ps1=0, $ps2=0, $ps3=0, $rp = 0)
{
	$hrg = $pl - ($pl*$ps1/100);
	$hrg = $hrg - ($hrg*$ps2/100);
	$hrg = $hrg - ($hrg*$ps3/100);
	$hrg = $hrg - $rp;
	return $hrg;
}

function hrg_diskon_print($pl=0, $ps1=0, $ps2=0, $ps3=0, $rp = 0)
{
    if ($pl=="") {
        $hrg = "";
    } else {
        $hrg = rp($pl);
    }
    if (trim($ps1)!="0") {
        $hrg .= " - ".rp($ps1)."%";
    }
    if (trim($ps2)!="0") {
        $hrg .= " - ".rp($ps2)."%";
    }
    if (trim($ps3)!="0") {
        $hrg .= " - ".rp($ps3)."%";
    }
    if (trim($rp)!="0") {
        $hrg .= " - Rp ".rp($rp);
    }
    return $hrg;
}

function tipe_diskon($val='')
{
    switch ($val) {
        case 'A':
        return "Promo Member Akumulatif";
        break;
        case 'B':
        return "Utamakan Promo Member";
        break;
        case 'C':
        return "Utamakan Promo Umum";
        break;
        case 'U':
        return "Promo Umum";
        break;
    }
}

function image_to_base64($path)
{
    if (trim($path)!='') {
    	$data = @file_get_contents($path);
    	if($data === FALSE) {
    		return "";
    	} else {
    		$type = pathinfo($path, PATHINFO_EXTENSION);
    		$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    		return $base64;
    	}
    } else {
        return '';
    }
}

function base64_to_image($base64_string, $output_file) {
	// split the string on commas
    // $data[ 0 ] == "data:image/png;base64"
    // $data[ 1 ] == <actual base64 string>
    $data = explode( ',', $base64_string );
    if (trim($base64_string)!="" && count($data)>1) {
       $image = base64_decode($data[ 1 ]);
       $mime = explode(";", $data[0]);
       $mime = explode(":", $mime[0]);
       $mime = $mime[1];

	    // open the output file for writing
       $output = $output_file.".".mime2ext($mime);
       $ifp = fopen( $output, 'wb' ); 

       fwrite( $ifp, $image);
	    // clean up the file resource
       fclose($ifp); 

       return $output; 
   } else {
       return "";
   }
}

function mime2ext($mime) {
    $mime_map = array(
        'video/3gpp2'                                                               => '3g2',
        'video/3gp'                                                                 => '3gp',
        'video/3gpp'                                                                => '3gp',
        'application/x-compressed'                                                  => '7zip',
        'audio/x-acc'                                                               => 'aac',
        'audio/ac3'                                                                 => 'ac3',
        'application/postscript'                                                    => 'ai',
        'audio/x-aiff'                                                              => 'aif',
        'audio/aiff'                                                                => 'aif',
        'audio/x-au'                                                                => 'au',
        'video/x-msvideo'                                                           => 'avi',
        'video/msvideo'                                                             => 'avi',
        'video/avi'                                                                 => 'avi',
        'application/x-troff-msvideo'                                               => 'avi',
        'application/macbinary'                                                     => 'bin',
        'application/mac-binary'                                                    => 'bin',
        'application/x-binary'                                                      => 'bin',
        'application/x-macbinary'                                                   => 'bin',
        'image/bmp'                                                                 => 'bmp',
        'image/x-bmp'                                                               => 'bmp',
        'image/x-bitmap'                                                            => 'bmp',
        'image/x-xbitmap'                                                           => 'bmp',
        'image/x-win-bitmap'                                                        => 'bmp',
        'image/x-windows-bmp'                                                       => 'bmp',
        'image/ms-bmp'                                                              => 'bmp',
        'image/x-ms-bmp'                                                            => 'bmp',
        'application/bmp'                                                           => 'bmp',
        'application/x-bmp'                                                         => 'bmp',
        'application/x-win-bitmap'                                                  => 'bmp',
        'application/cdr'                                                           => 'cdr',
        'application/coreldraw'                                                     => 'cdr',
        'application/x-cdr'                                                         => 'cdr',
        'application/x-coreldraw'                                                   => 'cdr',
        'image/cdr'                                                                 => 'cdr',
        'image/x-cdr'                                                               => 'cdr',
        'zz-application/zz-winassoc-cdr'                                            => 'cdr',
        'application/mac-compactpro'                                                => 'cpt',
        'application/pkix-crl'                                                      => 'crl',
        'application/pkcs-crl'                                                      => 'crl',
        'application/x-x509-ca-cert'                                                => 'crt',
        'application/pkix-cert'                                                     => 'crt',
        'text/css'                                                                  => 'css',
        'text/x-comma-separated-values'                                             => 'csv',
        'text/comma-separated-values'                                               => 'csv',
        'application/vnd.msexcel'                                                   => 'csv',
        'application/x-director'                                                    => 'dcr',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document'   => 'docx',
        'application/x-dvi'                                                         => 'dvi',
        'message/rfc822'                                                            => 'eml',
        'application/x-msdownload'                                                  => 'exe',
        'video/x-f4v'                                                               => 'f4v',
        'audio/x-flac'                                                              => 'flac',
        'video/x-flv'                                                               => 'flv',
        'image/gif'                                                                 => 'gif',
        'application/gpg-keys'                                                      => 'gpg',
        'application/x-gtar'                                                        => 'gtar',
        'application/x-gzip'                                                        => 'gzip',
        'application/mac-binhex40'                                                  => 'hqx',
        'application/mac-binhex'                                                    => 'hqx',
        'application/x-binhex40'                                                    => 'hqx',
        'application/x-mac-binhex40'                                                => 'hqx',
        'text/html'                                                                 => 'html',
        'image/x-icon'                                                              => 'ico',
        'image/x-ico'                                                               => 'ico',
        'image/vnd.microsoft.icon'                                                  => 'ico',
        'text/calendar'                                                             => 'ics',
        'application/java-archive'                                                  => 'jar',
        'application/x-java-application'                                            => 'jar',
        'application/x-jar'                                                         => 'jar',
        'image/jp2'                                                                 => 'jp2',
        'video/mj2'                                                                 => 'jp2',
        'image/jpx'                                                                 => 'jp2',
        'image/jpm'                                                                 => 'jp2',
        'image/jpeg'                                                                => 'jpeg',
        'image/pjpeg'                                                               => 'jpeg',
        'application/x-javascript'                                                  => 'js',
        'application/json'                                                          => 'json',
        'text/json'                                                                 => 'json',
        'application/vnd.google-earth.kml+xml'                                      => 'kml',
        'application/vnd.google-earth.kmz'                                          => 'kmz',
        'text/x-log'                                                                => 'log',
        'audio/x-m4a'                                                               => 'm4a',
        'application/vnd.mpegurl'                                                   => 'm4u',
        'audio/midi'                                                                => 'mid',
        'application/vnd.mif'                                                       => 'mif',
        'video/quicktime'                                                           => 'mov',
        'video/x-sgi-movie'                                                         => 'movie',
        'audio/mpeg'                                                                => 'mp3',
        'audio/mpg'                                                                 => 'mp3',
        'audio/mpeg3'                                                               => 'mp3',
        'audio/mp3'                                                                 => 'mp3',
        'video/mp4'                                                                 => 'mp4',
        'video/mpeg'                                                                => 'mpeg',
        'application/oda'                                                           => 'oda',
        'audio/ogg'                                                                 => 'ogg',
        'video/ogg'                                                                 => 'ogg',
        'application/ogg'                                                           => 'ogg',
        'application/x-pkcs10'                                                      => 'p10',
        'application/pkcs10'                                                        => 'p10',
        'application/x-pkcs12'                                                      => 'p12',
        'application/x-pkcs7-signature'                                             => 'p7a',
        'application/pkcs7-mime'                                                    => 'p7c',
        'application/x-pkcs7-mime'                                                  => 'p7c',
        'application/x-pkcs7-certreqresp'                                           => 'p7r',
        'application/pkcs7-signature'                                               => 'p7s',
        'application/pdf'                                                           => 'pdf',
        'application/octet-stream'                                                  => 'pdf',
        'application/x-x509-user-cert'                                              => 'pem',
        'application/x-pem-file'                                                    => 'pem',
        'application/pgp'                                                           => 'pgp',
        'application/x-httpd-php'                                                   => 'php',
        'application/php'                                                           => 'php',
        'application/x-php'                                                         => 'php',
        'text/php'                                                                  => 'php',
        'text/x-php'                                                                => 'php',
        'application/x-httpd-php-source'                                            => 'php',
        'image/png'                                                                 => 'png',
        'image/x-png'                                                               => 'png',
        'application/powerpoint'                                                    => 'ppt',
        'application/vnd.ms-powerpoint'                                             => 'ppt',
        'application/vnd.ms-office'                                                 => 'ppt',
        'application/msword'                                                        => 'ppt',
        'application/vnd.openxmlformats-officedocument.presentationml.presentation' => 'pptx',
        'application/x-photoshop'                                                   => 'psd',
        'image/vnd.adobe.photoshop'                                                 => 'psd',
        'audio/x-realaudio'                                                         => 'ra',
        'audio/x-pn-realaudio'                                                      => 'ram',
        'application/x-rar'                                                         => 'rar',
        'application/rar'                                                           => 'rar',
        'application/x-rar-compressed'                                              => 'rar',
        'audio/x-pn-realaudio-plugin'                                               => 'rpm',
        'application/x-pkcs7'                                                       => 'rsa',
        'text/rtf'                                                                  => 'rtf',
        'text/richtext'                                                             => 'rtx',
        'video/vnd.rn-realvideo'                                                    => 'rv',
        'application/x-stuffit'                                                     => 'sit',
        'application/smil'                                                          => 'smil',
        'text/srt'                                                                  => 'srt',
        'image/svg+xml'                                                             => 'svg',
        'application/x-shockwave-flash'                                             => 'swf',
        'application/x-tar'                                                         => 'tar',
        'application/x-gzip-compressed'                                             => 'tgz',
        'image/tiff'                                                                => 'tiff',
        'text/plain'                                                                => 'txt',
        'text/x-vcard'                                                              => 'vcf',
        'application/videolan'                                                      => 'vlc',
        'text/vtt'                                                                  => 'vtt',
        'audio/x-wav'                                                               => 'wav',
        'audio/wave'                                                                => 'wav',
        'audio/wav'                                                                 => 'wav',
        'application/wbxml'                                                         => 'wbxml',
        'video/webm'                                                                => 'webm',
        'audio/x-ms-wma'                                                            => 'wma',
        'application/wmlc'                                                          => 'wmlc',
        'video/x-ms-wmv'                                                            => 'wmv',
        'video/x-ms-asf'                                                            => 'wmv',
        'application/xhtml+xml'                                                     => 'xhtml',
        'application/excel'                                                         => 'xl',
        'application/msexcel'                                                       => 'xls',
        'application/x-msexcel'                                                     => 'xls',
        'application/x-ms-excel'                                                    => 'xls',
        'application/x-excel'                                                       => 'xls',
        'application/x-dos_ms_excel'                                                => 'xls',
        'application/xls'                                                           => 'xls',
        'application/x-xls'                                                         => 'xls',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'         => 'xlsx',
        'application/vnd.ms-excel'                                                  => 'xlsx',
        'application/xml'                                                           => 'xml',
        'text/xml'                                                                  => 'xml',
        'text/xsl'                                                                  => 'xsl',
        'application/xspf+xml'                                                      => 'xspf',
        'application/x-compress'                                                    => 'z',
        'application/x-zip'                                                         => 'zip',
        'application/zip'                                                           => 'zip',
        'application/x-zip-compressed'                                              => 'zip',
        'application/s-compressed'                                                  => 'zip',
        'multipart/x-zip'                                                           => 'zip',
        'text/x-scriptzsh'                                                          => 'zsh',
        'image/'                                                                    => 'jpg',
    );

return isset($mime_map[$mime]) === true ? $mime_map[$mime] : false;
}

function hirarki_ktg($ktg='')
{
    if (substr(trim($ktg), 0 , 1) == ">") {
        $ktg = substr(trim($ktg), 2 , strlen(trim($ktg)));
    }
    if (substr(trim($ktg), 0 , 1) == ">") {
        $ktg = substr(trim($ktg), 2 , strlen(trim($ktg)));
    }
    return str_replace(">", "<i class='fa fa-chevron-right'></i>", $ktg);
}

function margin($hpp=0, $jual=0, $prs="%")
{
    return $hpp!=0?round(($jual-$hpp)/($hpp)*100,2).$prs:"0".$prs;
}

if (!function_exists('tgl_indo_short'))
{
    function tgl_indo_short($tgl)
    {
        if($tgl!="") {
            $tanggal = substr($tgl, 6,2);
            $bulan   = bulan_short(substr($tgl, 4,2));
            $tahun   = substr($tgl,2,2);
            return $tanggal.'-'.$bulan.'-'.$tahun;
        } else {
            return "";
        }

    }
}

if (!function_exists('bulan_short'))
{
    function bulan_short($bln)
    {
        switch ($bln)
        {
            case 1: return "Jan"; break;
            case 2: return "Feb"; break;
            case 3: return "Mar"; break;
            case 4: return "Apr"; break;
            case 5: return "Mei"; break;
            case 6: return "Jun"; break;
            case 7: return "Jul"; break;
            case 8: return "Agu"; break;
            case 9: return "Sep"; break;
            case 10: return "Okt"; break;
            case 11: return "Nov"; break;
            case 12: return "Des"; break;
        }
    }
}


function get_token()
{
    $curl = curl_init();
    $username = "qhomepro";
    $password = "suksesmandiri96";

    curl_setopt_array($curl, array(
      CURLOPT_URL => "http://api.qhome.id/oauth_jwt",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_USERPWD => $username . ":" . $password,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_HTTPHEADER => array(
        "X-QH: wX0EtKTEbA3nR85MUzdOc0CqdlF1ORS1DRqICHIG3Ny2t-TwuwPD4942tb5U0f-RD58FiGOFIbIfPmA8jXSwipip7Z_zx-_450efUNVPl7KPZx3hZ5_LNw~~"
        ),
  ));

    $response = curl_exec($curl);

    curl_close($curl);
    return $response;
}

function get_api($url,$param,$token,$method = "GET")
{
    $param = http_build_query($param);
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "$url".($method=="GET"?"?$param":""),
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => $method,
      CURLOPT_HTTPHEADER => array(
        "X-QH: wX0EtKTEbA3nR85MUzdOc0CqdlF1ORS1DRqICHIG3Ny2t-TwuwPD4942tb5U0f-RD58FiGOFIbIfPmA8jXSwipip7Z_zx-_450efUNVPl7KPZx3hZ5_LNw~~",
        "Authorization: Bearer $token",
        "Content-Type: application/x-www-form-urlencoded"
        ),
    ));

    if ($method=="POST") {
        curl_setopt($curl, CURLOPT_POSTFIELDS, $param);
    }

    $response = curl_exec($curl);

    curl_close($curl);
    return $response;
}

?>