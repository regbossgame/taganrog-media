<?
session_start();
//$aka=0;
$ok=0;
$HTTP_REFERER2=$hostname;
if (isset($_SERVER['HTTP_REFERER'])){$HTTP_REFERER2=$_SERVER['HTTP_REFERER'];}
if((strpos("0".$HTTP_REFERER2,$hostname)==1)||(strpos("0".$HTTP_REFERER2,$hostname2)==1)||(strpos("0".$HTTP_REFERER2,$hostname3)==1)||(strpos("0".$HTTP_REFERER2,$hostname4)==1)){//1
	$ok=1;

}
?>