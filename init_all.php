<?
session_start();
header("Content-Type: text/html;charset=windows-1251");

$ok=0;
if ($_GET['pas']=='wirt'){

include "conf_bd.php";
include "bd.php";
$ok=1;

include "init_cat.php";

include "init_users.php";

include "init_mat.php";



}else{echo "Error!<br>";}
?>