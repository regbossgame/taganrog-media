<?

include "conf_bd.php";
include "fire.php";
if ($ok==1){

$file=$_POST['file'];

//$id=$_POST['id'];

$tif=$_POST['tif'];
$keys=$_POST['keywords'];
$title=$_POST['title'];
$disc=$_POST['discriptor'];

$txt=$_POST['txt1'];

//$txt=str_replace("<img src=", "<img onmousedown=\"open_foto(this);\" style=\"cursor:pointer;\" src=", $txt);

//$txt=n12p($txt);
//$txt2=$txt;


$txt=stripslashes($txt);

//$file=mb_convert_encoding($file,"Windows-1251","UTF-8");

///$file=iconv('UTF-8', 'Windows-1251', $file);

file_put_contents($file,$txt);

if ($tif!=""){
	file_put_contents($tif,$title."\n".$keys."\n".$disc);

}


//echo $txt."|".$file;
header("LOCATION: ".$_SERVER['HTTP_REFERER']);

//echo $file;
//echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=".$_SERVER['HTTP_REFERER']."'/>";
}
/*
function n12p($str) {
	return '
 
'.preg_replace("/[\r\n|\n|\r]+/", "
 
", $str).'
 
';
}
*/
?>