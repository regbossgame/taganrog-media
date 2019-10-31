<?
$cat="reklama_ot_partnerov";
/*$t8="ASC";
$t9="id";
if (rand(1,2)==1){$t8="DESC";}

if (rand(1,3)==1){$t9="mat";}
if (rand(1,3)==1){$t9="tit";}
if (rand(1,3)==1){$t9="treg";}
*/

$sql="SELECT * FROM mat WHERE cat LIKE '$cat' ORDER BY RAND() LIMIT 7";

        $result = @mysql_query($sql,$db);
        $k=@mysql_num_rows($result);

echo "<table border=0 cellspacing=0 cellpadding=0><tr>";
$rekal="";

for($i=0;$i<$k;$i++){
//$areg = @mysql_result($result, $i, "areg");
$treg = @mysql_result($result, $i, "treg");
if ($treg<=time()){
$id = @mysql_result($result, $i, "id");
$title = @mysql_result($result, $i, "tit");
$type = @mysql_result($result, $i, "type");
$mat = @mysql_result($result, $i, "mat");
$txt = @mysql_result($result, $i, "txt");
$img = @mysql_result($result, $i, "img");



$t=" onmouseout=hd2(this); onmouseover=sh2(this);";
if ($id==$_GET['id']){$t=" class='alf08'";}
//if (strpos("^".$st,$_GET['cat'])>0){$t=" style='color:#EFD377;'";}
$t2="";
//$t2="<br>от ".date('d.m.Y',$treg);
//if ($areg!=""){$t2="<br>от ".date('d.m.Y',strtotime($areg));}

echo "<td>";

if ($id!=$_GET['id']){echo "<a href='index.php?cat=".$cat."&id=$id' title='$title'>";}
echo "<div class='rmon'>";

//echo $img;
//if (rand(1,2)==1){
if (file_exists($img.".gif")){$rekal.="reklama(".$id.",'".$img."');\n";}
//}

$t12="";
if ($img==""){

include "prew.php";

echo $t12;

//include "mini.php";
}else{
echo "<br><img src='$img' width=148px height=90px title='$title' alt='$title'$t style='display:inline-block;'/>";
}


//echo "<br><img src='$img' width=148px height=90px id='imar_".$id."' title='$title' alt='$title'$t style='display:inline-block;'/>";

echo "</div>".$t2;

if ($id!=$_GET['id']){echo "</a>";}

echo "</td>";

}
}
echo "</tr></table>";

?>