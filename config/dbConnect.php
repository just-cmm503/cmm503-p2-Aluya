<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 08/03/2017
 * Time: 11:35
 */
include_once "config.php";

if (strpos($_SERVER['SERVER_NAME'], 'localhost') !== false) {
    $dsn = $GLOBALS['db_type'] . ":host=" . $GLOBALS['db_host'] . ";dbname=" . $GLOBALS['db_name'] . ";port=" . $GLOBALS['db_port'] . ";charset=" . $GLOBALS['charset'];
    echo "am on local host  <br> \r\n";
    print json_encode($_SERVER['SERVER_NAME']);
    
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    
    $pdo = new PDO($dsn, $GLOBALS['db_user_name'], $GLOBALS['db_user_password'], $opt);
    
}else{
    $connectstr_dbhost = '';//$host;
    $connectstr_dbname = '';//$dbName;
    $connectstr_dbusername = '';//$uname;
    $connectstr_dbpassword = '';//$pw;
    foreach ($_SERVER as $key => $value) {
        if (strpos($key, "MYSQLCONNSTR_localdb") !== 0) {
            continue;
        }
        $connectstr_dbhost = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);
        echo $connectstr_dbhost." g1 <br> \r\n";
        $connectstr_dbname = preg_replace("/^.*Database=(.+?);.*$/", "\\1", $value);
        echo $connectstr_dbname." g2 <br> \r\n";;
        $connectstr_dbusername = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
        echo $connectstr_dbusername." g3 <br> \r\n";;
        $connectstr_dbpassword = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);
        echo $connectstr_dbpassword." g4 <br> \r\n";;
    }
    $dsn = $GLOBALS['db_type'] . ":host=" . $connectstr_dbhost . ";dbname=" . $connectstr_dbname . ";charset=" . $GLOBALS['charset'];
    
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    
    $pdo = new PDO($dsn, $connectstr_dbusername, $connectstr_dbpassword, $opt);
}

//$stmt=$pdo->query("select * from users");
//$stmt->execute();
//print json_encode($stmt->fetchAll());
?>