<?
   $db = @mysql_connect("$sqllocal", "$databaseuser", "$databasepasswd") or die("������� ����������� ������, ������� ����� ;(");;
   @mysql_select_db("$databasename",$db);

$rr=@mysql_set_charset("cp1251",$db);
?>