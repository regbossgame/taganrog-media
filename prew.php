<?




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

$t12=str_replace('"','',$t12);

?>