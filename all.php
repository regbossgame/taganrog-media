<?
include "init.php";

include "styles.php";

include "up.php";

$admin=$_GET['adm']*1;
$modif="str";
include "content.php";

include "javas.php";

include "down.php";

if ($admin==1){include "tiny.php";}


echo "</body>\n
</html>";

?>