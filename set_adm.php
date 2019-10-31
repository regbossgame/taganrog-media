<?
session_start();
if ($_GET['r']=='1'){$_SESSION['adm_en']=1;
}else{$_SESSION['adm_en']=0;}

	$ref=$_SERVER['HTTP_REFERER'];
	header("LOCATION: ".$ref."");  
//echo $_SESSION['adm_en'];
?>