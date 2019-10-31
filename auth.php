<?
include "cook_life.php";

include "conf_bd.php";
include "bd.php";

$err="";

$HTTP_REFERER2=$hostname;
if (isset($_SERVER['HTTP_REFERER'])){$HTTP_REFERER2=$_SERVER['HTTP_REFERER'];}
if((strpos("0".$HTTP_REFERER2,$hostname)==1)||(strpos("0".$HTTP_REFERER2,$hostname2)==1)||(strpos("0".$HTTP_REFERER2,$hostname3)==1)||(strpos("0".$HTTP_REFERER2,$hostname4)>0)){//1

if ($_POST['user_name']!=""){//3
$user_name=strtoupper($_POST['user_name']);
$user_pass=strtoupper($_POST['user_pass']);


//echo $user_name."|".$user_pass;

$sql="SELECT log,name FROM users WHERE log LIKE '$user_name' AND pas LIKE '$user_pass'";
        $result = @mysql_query($sql,$db);
        $k=@mysql_num_rows($result);

	
if ($k>0){//2

//$logged_user = @mysql_result($result, 0, "log");
$name = @mysql_result($result, 0, "name");

//session_register("log");
$_SESSION["log"]=$user_name;
$_SESSION["name"]=$name;


$_SESSION['terka']="1";

}else{$_SESSION['terka']="-1";$err="Неверный логин или пароль!";}//-2
}else{$_SESSION['terka']="-1";$err="Введите логин и пароль";}//-3
}else{$_SESSION['terka']="-1";$err="Хak -> Error 04 / При повторных попытках выш IP будет заблокирован! [<b>".$ipt."</b>]";}//-1

$_SESSION['erka']=$err;

HEADER("LOCATION: ".$_SESSION['pref']);

//echo "+".$user_name."|".$_SESSION['erka'];

//$tt=1;
//echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=index.php'/>";



?>