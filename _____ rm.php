<?
$cat=$_GET['cat'];
$sql="SELECT * FROM mat WHERE (cat='$cat') AND (id<>'".$_GET['id']."') ORDER BY treg DESC";

if ($cat==""){echo "<h1>Новое видео</h1>";$sql="SELECT * FROM mat ORDER BY treg DESC LIMIT 20";}

        $result = @mysql_query($sql,$db);
        $k=@mysql_num_rows($result);

echo "<br>";

echo "<img src='res/up.png' onclick='scroll_u(1);'  onmouseout=\"this.src='res/up.png'\"; onmouseover=\"this.src='res/up_on.png'\"; style='cursor:pointer;'/>
<div style='border-width:1px;width:220px;height:600px;overflow:hidden;' id='mensc'>";

for($i=0;$i<$k;$i++){
$areg = @mysql_result($result, $i, "areg");
if (strtotime($areg)<=time()){
$id = @mysql_result($result, $i, "id");
$title = @mysql_result($result, $i, "tit");
$type = @mysql_result($result, $i, "type");
$mat = @mysql_result($result, $i, "mat");
//$cat0 = @mysql_result($result, $i, "cat");
$txt = @mysql_result($result, $i, "txt");
$img = @mysql_result($result, $i, "img");



$treg = @mysql_result($result, $i, "treg");
$catok = @mysql_result($result, $i, "cat");


$t=" onmouseout=hd2(this); onmouseover=sh2(this);";
//if ($id==$_GET['id']){$t=" class='alf08'";}
//if (strpos("^".$st,$_GET['cat'])>0){$t=" style='color:#EFD377;'";}
$t2="";
if ($treg>0){$t2="<br>от ".date('d.m.Y',$treg);}
if ($areg!=""){$t2="<br>от ".date('d.m.Y',strtotime($areg));}

//if ($id!=$_GET['id']){
echo "<a href='index.php?cat=".$catok."&id=$id' title='$title'>";
echo $title."<br>";
echo "<div class='rmon'>";
//echo $id;
//echo $catok."|".$cat."|".(strpos("^".$cat,$catok));
//echo $img;
$t12="";
if ($img==""){

$ser0="youtube.com/embed/";
$i0=strpos($mat,$ser0);
//echo "<h1>".$i0."</h1>";
if ($i0>0){

$j0=$i0+strlen($ser0);
$t0="";
while ((substr($mat,$j0,1)!=" ")&&(substr($mat,$j0,1)!=">")&&(substr($mat,$j0,1)!="?")&&($j0<($i0+40))){
$t0.=substr($mat,$j0,1);
$j0++;
}
//echo $i0."|".$j0;
if (($j0-$i0)<45){$t12="<br><img src='http://i2.ytimg.com/vi/".$t0."/default.jpg' width=148px height=90px title='$title' alt='$title'$t style='display:inline-block;'/>";}
}else{

///////222222222

$ser0="video.yandex.ru/iframe/sir-govard/";
$i0=strpos($mat,$ser0);
//echo "<h1>".$i0."</h1>";
if ($i0>0){

$j0=$i0+strlen($ser0);
$t0="";
while ((substr($mat,$j0,1)!=" ")&&(substr($mat,$j0,1)!=">")&&(substr($mat,$j0,1)!="/")&&($j0<($i0+60))){
$t0.=substr($mat,$j0,1);
$j0++;
}
//echo $i0."|".$j0."|".$t0;
if (($j0-$i0)<65){$t12="<br><img src='http://static.video.yandex.ru/get/sir-govard/".$t0."/1.120x72.jpg' width=148px height=90px title='$title' alt='$title'$t style='display:inline-block;'/>";}
}else{

$ser0="video.yandex.ru/iframe/tagan-media/";
$i0=strpos($mat,$ser0);
//echo "<h1>".$i0."</h1>";
if ($i0>0){

$j0=$i0+strlen($ser0);
$t0="";
while ((substr($mat,$j0,1)!=" ")&&(substr($mat,$j0,1)!=">")&&(substr($mat,$j0,1)!="/")&&($j0<($i0+60))){
$t0.=substr($mat,$j0,1);
$j0++;
}
//echo $i0."|".$j0."|".$t0;
if (($j0-$i0)<65){$t12="<br><img src='http://static.video.yandex.ru/get/tagan-media/".$t0."/1.120x72.jpg' width=148px height=90px title='$title' alt='$title'$t style='display:inline-block;'/>";}
}else{

///00

$ser0="video.yandex.ru/lite/tagan-media/";
$i0=strpos($mat,$ser0);
//echo "<h1>".$i0."</h1>";
if ($i0>0){

$j0=$i0+strlen($ser0);
$t0="";
while ((substr($mat,$j0,1)!=" ")&&(substr($mat,$j0,1)!=">")&&(substr($mat,$j0,1)!="/")&&($j0<($i0+60))){
$t0.=substr($mat,$j0,1);
$j0++;
}
//echo $i0."|".$j0."|".$t0;
if (($j0-$i0)<65){$t12="<br><img src='http://static.video.yandex.ru/get/tagan-media/".$t0."/1.120x72.jpg' width=148px height=90px title='$title' alt='$title'$t style='display:inline-block;'/>";}
}else{

///111

$ser0="video.yandex.ru/lite/sir-govard/";
$i0=strpos($mat,$ser0);
//echo "<h1>".$i0."</h1>";
if ($i0>0){

$j0=$i0+strlen($ser0);
$t0="";
while ((substr($mat,$j0,1)!=" ")&&(substr($mat,$j0,1)!=">")&&(substr($mat,$j0,1)!="/")&&($j0<($i0+60))){
$t0.=substr($mat,$j0,1);
$j0++;
}
//echo $i0."|".$j0."|".$t0;
if (($j0-$i0)<65){$t12="<br><img src='http://static.video.yandex.ru/get/sir-govard/".$t0."/1.120x72.jpg' width=148px height=90px title='$title' alt='$title'$t style='display:inline-block;'/>";}
}else{
$t=" class='alf002'";
$t12="<img src='res/pom.gif' width=148px height=90px title='$title' alt='$title'$t style='display:inline-block;'/>";
}

///111

}

///000

}

}

}
echo $t12;

//include "mini.php";
}else{
echo "<br><img src='$img' width=148px height=90px title='$title' alt='$title'$t style='display:inline-block;'/>";
}

echo "</div>".$t2;

//if ($id!=$_GET['id']){
echo "</a>";

echo "<br><br>";

}
}
echo "</div><br><img src='res/down.png' onclick='scroll_u(-1);'  onmouseout=\"this.src='res/down.png'\"; onmouseover=\"this.src='res/down_on.png'\"; style='cursor:pointer;'/>";
?>