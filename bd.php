<?
   $db = @mysql_connect("$sqllocal", "$databaseuser", "$databasepasswd") or die("Ведутся технические работы, зайдите позже ;(");;
   @mysql_select_db("$databasename",$db);

$rr=@mysql_set_charset("cp1251",$db);
?>