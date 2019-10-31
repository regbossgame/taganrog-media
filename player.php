<?

//echo $k;
if (($k<=0)||($mat=="")){
$mat='<img src="res/pom.gif" width="640" height="480" class="alf002"/>';
}
//$f1=true;
//while ($f1==true)


$i=strpos($mat,"width=");
if ($i>0){

$j=$i+6;
$t="";
while ((substr($mat,$j,1)!=" ")&&(substr($mat,$j,1)!=">")&&($j<($i+30))){
$t.=substr($mat,$j,1);
$j++;
}

if (($j-$i)<20){$mat=str_replace("width=".$t,'width="646"',$mat);}
}

$i=strpos($mat,"height=");
if ($i>0){

$j=$i+7;
$t="";
while ((substr($mat,$j,1)!=" ")&&(substr($mat,$j,1)!=">")&&($j<($i+30))){
$t.=substr($mat,$j,1);
$j++;
}
//echo "|".$t."|";
if (($j-$i)<20){$mat=str_replace("height=".$t,'height="362"',$mat);}

}


///////////1111

$i=strpos($mat,"WIDTH=");
if ($i>0){

$j=$i+6;
$t="";
while ((substr($mat,$j,1)!=" ")&&(substr($mat,$j,1)!=">")&&($j<($i+30))){
$t.=substr($mat,$j,1);
$j++;
}
//echo "|".$t."|";
if (($j-$i)<20){$mat=str_replace("WIDTH=".$t,'WIDTH="646"',$mat);}
}

$i=strpos($mat,"HEIGHT=");
if ($i>0){

$j=$i+7;
$t="";
while ((substr($mat,$j,1)!=" ")&&(substr($mat,$j,1)!=">")&&($j<($i+30))){
$t.=substr($mat,$j,1);
$j++;
}
//echo "|".$t."|";
if (($j-$i)<20){$mat=str_replace("HEIGHT=".$t,'HEIGHT="362"',$mat);}

}
//file_put_contents('2.txt',$mat);
if (strpos($mat,"res/pom.gif")<=0) {$mat=substr($mat,0, strpos($mat,'</iframe>')+9);}
//file_put_contents('1.txt',$mat);
echo $mat;


$t6=((($treg[strlen($treg)-3]+$treg[strlen($treg)-4])/2+3)*1);
$stat2=$stat;

if ($_SESSION['stat_'.$id]==""){
	$_SESSION['stat_'.$id]="1";
	$sql2 = "UPDATE mat SET stat=stat+1 WHERE id LIKE '$id'";
	$result2 = @mysql_query("$sql2",$db);
	$stat2=$stat+1;
}

$t6=$stat2;//round($t6+($stat2*1.7));

echo "<br><p title='Просмотров: ".$t6." / из них рефералов: $stat2'>Просмотров: ".$t6."</p><br>";

?>