<?

$sql="SELECT * FROM cat WHERE type<2 ORDER BY id ASC";
        $result = @mysql_query($sql,$db);
        $k=@mysql_num_rows($result);

$spis="";
for($i=0;$i<$k;$i++){
$id = @mysql_result($result, $i, "id");
$name = @mysql_result($result, $i, "name");
$st = @mysql_result($result, $i, "str");
$type = @mysql_result($result, $i, "type");
$tit = @mysql_result($result, $i, "tit");

$spis.="<option value='".end(explode("=", $st))."'>$name</option>\n";

$t=" onmouseout=hd(this); onmouseover=sh(this);";
if (strpos("^".$st,$_GET['cat'])>0){$t=" style='color:#EFD377;'";$titov=$tit;}

$tit=obrez($tit,245);

if ($st!=""){echo "<a href=\"".$st."\" title=\"".$tit."\">";}
if ($type==1){echo "<h2 class='lbt'>";}else{echo "<h2 class='lnbt'$t>";}

echo $name;

echo "</h2>";

if ($st!=""){echo "</a>";}

echo "\n";

}

?>
<br>
<br>

<!-- Yandex.Metrika informer -->
<a href="http://metrika.yandex.ru/stat/?id=20159653&amp;from=informer"
target="_blank" rel="nofollow"><img src="//bs.yandex.ru/informer/20159653/3_0_575352FF_373332FF_1_pageviews"
style="width:88px; height:31px; border:0;" alt="яндекс.ћетрика" title="яндекс.ћетрика: данные за сегодн€ (просмотры, визиты и уникальные посетители)" onclick="try{Ya.Metrika.informer({i:this,id:20159653,lang:'ru'});return false}catch(e){}"/></a>
<!-- /Yandex.Metrika informer -->

<!-- Rating@Mail.ru counter -->
<a target="_blank" href="http://top.mail.ru/jump?from=2315743">
<img src="http://d5.c5.b3.a2.top.mail.ru/counter?id=2315743;t=170"
border="0" height="15" width="88" alt="–ейтинг@Mail.ru"></a>
<!-- //Rating@Mail.ru counter -->

<a href='http://host-tracker.com/ru/' target='_blank' onMouseOver='this.href="http://host-tracker.com/ru/site-monitoring-statistics/12844882/ff/";'><img 
width='80' height='15' border='0' alt='службы мониторинга серверов' 
src="http://ext.host-tracker.com/uptime-img/?s=15&amp;t=12844882&amp;m=0.59&amp;p=Total&amp;src=ff" /></a><noscript><a href='http://host-tracker.com/ru/' target='_blank' >службы мониторинга серверов</a></noscript>
