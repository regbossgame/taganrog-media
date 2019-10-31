<?

$fp = fopen($file_name, "r");
 
$columns = fgets($fp, 999);
$columns = rtrim($columns);
//$columns[strlen($columns)-1]="\0";
//echo $columns."|+<br>";

$mc=array();
$mc=explode(';',$columns);
$j=count($mc);
$re=-1;
$re2=-1;
$re3=-1;
$rt="";
for($i=0;$i<($j-1);$i++){
$rt.=$mc[$i].",";
///-------

//echo "***";
if ($mc[$i]=="txt_sys"){$re=$i;}
//echo "***".$mc[$i]."***";
/*if ($mc[$i]=="txt"){$re2=$i;}
if ($mc[$i]=="ctxt"){$re3=$i;}
*/
///-------
}
if ($mc[$j-1]=="txt_sys"){$re=$i;}

$rt.=$mc[$j-1];

$columns =$rt;
 
 while (!feof($fp))
{
$mt = fgets($fp, 999);
$mt = rtrim($mt);

//echo $mt."|<br>";



$rt="";
$ma=array();
$ma=explode(';',$mt);
for($i=0;$i<($j-1);$i++){
///-------

if ($i==$re){$ma[$i]=file_get_contents("mat/".$ma[$i]);}
/*if ($i==$re2){$ma[$i]=file_get_contents("info/".$ma[$i].".php");}
if ($i==$re3){$ma[$i]=file_get_contents("cinfo/".$ma[$i].".php");}
*/
///-------
$rt.="'".$ma[$i]."',";
}
if ($i==$re){$ma[$j-1]=file_get_contents("mat/".$ma[$j-1]);}

$rt.="'".$ma[$j-1]."'";
//echo "<h3>".$ma[0]."</h3>";
if ((strlen($mt)>3)||(($mt[0]*1)>0)){
      $sql = "INSERT INTO $bd ( $columns ) VALUES ( ".$rt." )";
	  $result = @mysql_query("$sql",$db);

	  /*
include "genid.php";
	  
 $txt="Добавлен объект из csv -> ".$file_name." | id[0] -> ".$mt[0];
 $treg=time();
 $sql = "INSERT INTO system_sob (id,log,treg,tp,txt) VALUES('$id22','','$treg','0','$txt')";
 $result = @mysql_query("$sql",$db);
*/
 //	id int not null,
//	txt text not null,
//	log varchar(50) not null,
//	com varchar(20) not null
 
if (($result*1)==0){echo "<font color='#FF6666'>\n";}
echo "<b>".($result*1)."</b>%=".$bd.": ".$rt." ( $columns )<br>";	  
if (($result*1)==0){echo "</font>\n";}
}

}
 
 fclose($fp);	


 
 
?>