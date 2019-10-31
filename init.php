<?
include "cook_life.php";
header("Content-Type: text/html;charset=windows-1251");

if (isset($_SERVER['HTTP_REFERER'])){$_SESSION['pref']=$_SERVER['HTTP_REFERER'];}else{$_SESSION['pref']=$_SERVER['REQUEST_URI'];}

function obrez($str,$kolko){

$str=strip_tags($str);
$str=str_replace( array("\r","\n"), ' ', $str );
$str=str_replace( '  ', ' ', $str );
$str=trim($str);
$rm="";
for ($ij=0;$ij<($kolko-3);$ij++){

$rm.=$str[$ij];
}
if (strlen($str)>=$kolko){$rm.="...";}

return $rm;
}


//$ehtml=0;

//$fts=array();

//---

include "conf.php";


//echo "<h1>|".$_GET['cat']."|</h1>";



$sql="SELECT * FROM cat WHERE str LIKE 'index.php'";

if ($_GET['cat']!=""){
	
	$cat=$_GET['cat'];
	$sql="SELECT * FROM cat WHERE str LIKE '%$cat%'";
	
}
        $result = @mysql_query($sql,$db);
 //       $k=@mysql_num_rows($result);

$i=0;
//$id = @mysql_result($result, $i, "id");

$name = @mysql_result($result, $i, "name");

//$st = @mysql_result($result, $i, "str");
//$type = @mysql_result($result, $i, "type");

$tit1 = @mysql_result($result, $i, "tit");

$keys = @mysql_result($result, $i, "keywords");

//----

if ($_GET['cat']==""){$name.=" - ����� ����������!";}
//$name.=" / ";
//$tif2[1]=$keys;
//$tif2[2]
$disc="<p style='text-align: justify;'>".$tit1."</p>";
$tit1=obrez($tit1,200);


if ($_GET['id']!=""){
$id0=$_GET['id'];
$sql="SELECT * FROM mat WHERE id LIKE '$id0'";

        $result = @mysql_query($sql,$db);
 //       $k=@mysql_num_rows($result);

$i=0;
//$id = @mysql_result($result, $i, "id");
$txt = @mysql_result($result, $i, "txt");
//$st = @mysql_result($result, $i, "str");
//$type = @mysql_result($result, $i, "type");
$tit = @mysql_result($result, $i, "tit");
$keys1 = @mysql_result($result, $i, "keywords");

$name.=" / ".$tit;
if ($keys1!=""){$keys=$keys1;}
if ($txt!=""){$tit1.=obrez($tit1,80)+" ".obrez($txt,120);}



}


$tif2[0]=$comp_name." / ".$name." - ".$comp_end;
$tif2[1]=$keys;
$tif2[2]=$tit1;


$fnam=$_SERVER['REQUEST_URI'];
$modif="str";
if ($str!=1){
include "nama.php";
$tif=$fnam;
//$fnam="txt/".$fnam.".php";

$tif="txt/".$tif."";
$tif3=$tif."_config.php";
	if (file_exists($tif3)){
	$tif22=file_get_contents($tif3);
}else{$tif22="\n\n";}

$tif2=explode("\n",$tif22);
$tif2[0] = rtrim($tif2[0]);
$tif2[1] = rtrim($tif2[1]);
$tif2[2] = rtrim($tif2[2]);

//$kmen[2]="��������";
//$tmen[2]="�������� �������";
//$dmen[2]="�������� �������";


if ($tif2[0]==""){$tif2[0]=$tmen[$str];}
if ($tif2[1]==""){$tif2[1]=$kmen[$str];}
if ($tif2[2]==""){$tif2[2]=$dmen[$str];}

if ($tmen[$str]==""){$tmen[$str]=$tif2[0];}
if ($kmen[$str]==""){$kmen[$str]=$tif2[1];}
if ($dmen[$str]==""){$dmen[$str]=$tif2[2];}
}


echo "<html>
<head>
<title>".$tif2[0];
//if (($str!=1)&&($str!=2)&&($str!=8)){echo " - ".$comp_end;}
echo "</title>\n";

echo "\n<meta http-equiv=content-type content=\"text/html; charset=windows-1251\">\n";

if ($tif2[2]!=""){echo "<meta name=\"description\" content=\"".$tif2[2]."\">\n";}
if ($tif2[1]!=""){echo "<meta name=\"keywords\" content=\"".$tif2[1]."\">\n";}



echo "<link rel=\"icon\" href=\"/favicon.ico\" type=\"image/x-icon\"> 
<link rel=\"shortcut icon\" href=\"/favicon.ico\" type=\"image/x-icon\">

</head>
<body>
<!--s_links--><!--check code--><!--/s_links-->\n";
// background='res/water1.gif'
//style='background-image:url(res/bg1.jpg);background-attachment: fixed;'
//echo "|".$_SESSION['log']."|";
?>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter20159653 = new Ya.Metrika({id:20159653,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/20159653" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->