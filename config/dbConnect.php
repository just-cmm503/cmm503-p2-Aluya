<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 08/03/2017
 * Time: 11:35
 */
include_once "config.php";
print "db point xx1xx ok";
$dsn = $GLOBALS['db_type'].":host=".$GLOBALS['db_host'].";dbname=".$GLOBALS['db_name'].";port=".$GLOBALS['db_port'].";charset=".$GLOBALS['charset'];
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $GLOBALS['db_user_name'], $GLOBALS['db_user_password'], $opt);
$stmt=$pdo->query("select * from users");
$stmt->execute();
print json_encode($stmt->fetchAll());
?>