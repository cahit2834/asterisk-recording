define('dbhost','127.0.0.1');
define('dbpass','----');
define('dbuser','root');
define('dbname','asterisk');
define('dbnamecdr','asteriskcdrdb');
$conn =  @mysqli_connect(dbhost, dbuser, dbpass, dbname);
if (!$conn) {
	echo "Db Bağlantı Başarısız";
	$vthata=1; 
}

$GLOBALS["db"] =  @mysqli_connect(dbhost, dbuser, dbpass, dbname);
if (!$GLOBALS["db"]) {
	$vthata=1; 
}
$db = $GLOBALS['db'];

date_default_timezone_set('Europe/Istanbul');
