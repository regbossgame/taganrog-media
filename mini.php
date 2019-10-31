<?


//echo $k;
if (($k<=0)||($mat=="")){
//$mat='<img src="res/pom.gif" width="640" height="480" class="alf002"/>';
$t=" class='alf002'"; $mat="<img src='res/pom.gif' width=148px height=90px title='$title' alt='$title'$t style='display:inline-block;'/>";
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

if (($j-$i)<20){$mat=str_replace("width=".$t,'width="148"',$mat);}
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
if (($j-$i)<20){$mat=str_replace("height=".$t,'height="90"',$mat);}

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
if (($j-$i)<20){$mat=str_replace("WIDTH=".$t,'WIDTH="148"',$mat);}
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
if (($j-$i)<20){$mat=str_replace("HEIGHT=".$t,'HEIGHT="90"',$mat);}

}


echo $mat;
//echo "<br><div style='height:150px;'></div>";
//echo $txt;
/*
<object height="362" width="642">
<param name="video" value="http://static.video.yandex.ru/lite/sir-govard/65frr1z2xe.5120/"></param>
<param name="allowFullScreen" value="true"></param>
<param name="scale" value="noscale"></param>
<param name="flashvars" value="is-hq=true"></param>
<embed src="http://static.video.yandex.ru/lite/sir-govard/65frr1z2xe.5120/" type="application/x-shockwave-flash" height="362" width="642" allowFullScreen="true" scale="noscale"flashvars="is-hq=true" >
</embed>
</object>
*/