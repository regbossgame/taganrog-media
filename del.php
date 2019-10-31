<?
include "conf.php";

$HTTP_REFERER2=$hostname;
if (isset($_SERVER['HTTP_REFERER'])){$HTTP_REFERER2=$_SERVER['HTTP_REFERER'];}
if((strpos("0".$HTTP_REFERER2,$hostname)==1)||(strpos("0".$HTTP_REFERER2,$hostname2)==1)||(strpos("0".$HTTP_REFERER2,$hostname3)==1)||(strpos("0".$HTTP_REFERER2,$hostname4)==1)){//1

$bd=$_GET['bd'];



if ($bd=='mat'){

$id=$_GET['id'];

$sql = "DELETE FROM $bd WHERE id LIKE '$id'";
$result = @mysql_query("$sql",$db);

 
}
}
//echo ($result*1)."|".$prav;
echo "<META HTTP-EQUIV=Refresh CONTENT='0; URL=".$HTTP_REFERER2."#obj".($id-10)."'/>";
?>