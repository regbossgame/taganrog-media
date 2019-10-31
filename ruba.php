<?
$tt="<br><a href='set_adm.php?r=1'><img src='res/tum_off.png' border=0 style='vertical-align: text-top;'>";
if ($_SESSION['adm_en']==1){$tt="<br><a href='set_adm.php?r=0'><img src='res/tum_on.png' border=0 style='vertical-align: text-top;'>";}
echo $tt."<br></a>";

?>