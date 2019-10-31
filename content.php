<br>
<br>
<table border=0 cellspacing=0 cellpadding=0 width=100%><tr valign='top' align='center'>
<td width=230px>
<?
include "lm.php";
?>

</td><td>

<?


//$tt=0;
//for($i56=0;$i56<count($specs);$i56++){
//	if ($_GET['cat']=="Radio_TVS_101_9FM"){$tt=1;}
//}

//if ($tt==0)
//{


$sql="";
if ($_GET['id']!=""){
$id0=$_GET['id'];
$sql="SELECT * FROM mat WHERE id LIKE '$id0'";
}


if ((!isset($_GET['id']))&&(isset($_GET['cat']))){
$sql="SELECT * FROM mat WHERE cat LIKE '%".$_GET['cat']."%' ORDER BY treg DESC LIMIT 1";
}
//echo "<h1>".$_GET['cat']."|".$sql."</h1>";
if ((!isset($_GET['cat']))&&(!isset($_GET['id']))){$sql="SELECT * FROM mat ORDER BY treg DESC LIMIT 1";}


        $result = @mysql_query($sql,$db);
        $k=@mysql_num_rows($result);


//for($i=0;$i<$k;$i++){
$i=0;
$id = @mysql_result($result, $i, "id");
$cat = @mysql_result($result, $i, "cat");
$title = @mysql_result($result, $i, "tit");
$type = @mysql_result($result, $i, "type");
$mat = @mysql_result($result, $i, "mat");



$txt = @mysql_result($result, $i, "txt");
$img = @mysql_result($result, $i, "img");
$treg = @mysql_result($result, $i, "treg");
//$areg = @mysql_result($result, $i, "areg");
$keywords = @mysql_result($result, $i, "keywords");
$stat= @mysql_result($result, $i, "stat");

if ($title!=""){echo "<h1>".$title."</h1>";}
//file_put_contents('1.txt',$mat);
?>

<div>
<img src='res/tele.png' width=730px>
<div style='position:relative;top:-495px;height:10px;'>
<?

include "player.php";

?>

</div>
<?
echo "Поделиться: <input type='text' style='width:240px;' onfocus='this.select();' onmousedown='this.select();' onclick='this.select();' value='http://taganrog-media.ru/?id=$id'/>";
 echo "<p style='text-align: justify;'>".$txt;
if ($txt==""){echo $titov;}
echo "</p>";
 
 if ($_GET['cat']==""){echo $disc;}
 ?>
</div>

<?
$enadm=0;
if (($_SESSION['adm_en']=="1")&&($_SESSION['log']!="")){$enadm=1;}

if ($enadm==1){echo "<a href='del.php?bd=mat&id=$id' color=#FF0000>Удалить</a><form enctype='multipart/form-data' action='edit_mat.php' method='POST'><div style='background-color:#000000;'>";

echo "ID:$id<input type='hidden' name='id' value='$id'/><br>";

if ($cat==""){$cat=$_GET['cat'];}

if ($cat!=""){$spis=str_replace($cat."'",$cat."' selected",$spis);}
//echo "<h1>|".$cat."|</h1>";


echo "Категория видео:<select name='cat' style='width:100%'>\n".$spis."\n</select>";


echo "Заголовок видео:<input type='text' name='tit' style='width:100%;background-color:#77FF77;' value='".$title."'/>";

echo "Код видео<textarea name='mat' style='width:100%;height:80px;background-color:#FFFF54;'>$mat</textarea>";

echo "Текст под видео:<textarea name='txt' style='width:100%;height:80px;background-color:#FFD3F4;'>$txt</textarea>";
$t="";
$t2="";
if ($type==0){$t=" selected";}else{$t2=" selected";}
echo "Тип видео:<select name='type' style='width:100%'>
<option value='0'$t>справа</option>
<option value='1'$t2>вверху</option>
</select>";

//echo "<h1>".(strtotime("31-10-2012"))."</h1>";

//if ($areg==""){$areg=date('d.m.Y H:i',time());}
if ($treg==0){$treg=date('d.m.Y H:i',time());}else{$treg=date('d.m.Y H:i',$treg);}
echo "Запланировать на дату:<input type='text' name='treg' style='width:100%' value='".$treg."'/>";
echo "<input type='checkbox' name='che' value='1'/>:Использовать эту дату для новых<br>";

echo "<br>Ключевые слова:<input type='text' name='keywords' style='width:100%' value='".$keywords."'/>";
//echo "<input type='text' name='treg' style='width:100%' value='".$treg."'/>";
echo "<br><input type='file' name='userfile'><input type='text' name='img' value='$img'/>";
echo "<hr><br><input type='submit' value='Сохранить' name='btn1'/>";
echo "<input type='submit' value='Сохранить как новое' name='btn2'/>";
echo "</div></form>";
}



echo "</td><td width=230px>";
	//include "line3.php";
	include "rm.php";
?>
</td>

</tr></table>