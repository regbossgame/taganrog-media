<?

$f22=1;
while ($f22 == 1) {
        $id22=rand(1000000, 9999999);
//        $id=rand(1, 5);

    $f22=0;

	$sql22="SELECT id FROM mat WHERE id LIKE '$id22'";
        $result22 = @mysql_query($sql22,$db);
        $k22=@mysql_num_rows($result22);
	if ($k22>0){$f22=1;}
	}


?>