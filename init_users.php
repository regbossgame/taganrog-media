<?

if (($_GET['pas']=='wirt')||($ok==1)){

include "conf.php";

$bd="users";

$sql = "DROP TABLE ".$bd;
   $result = @mysql_query("$sql",$db);

$sql = "CREATE TABLE ".$bd." (
	log varchar(30) not null,
	pas varchar(30) not null,
	name varchar(60) not null,
	prav int not null
)";

   $result = @mysql_query("$sql",$db);
	echo "users_rez=".$result."<br>";



$file_name="exel/$bd.csv";

include "reader.php";


}

?>