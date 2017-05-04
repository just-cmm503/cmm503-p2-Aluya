<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 01/05/2017
 * Time: 20:41
 */
require_once  __DIR__."/../config/config.php";
//$pdo = new PDO($dsn, $db_user_name, $db_user_password, $opt);
include __DIR__."/../model/adminDashMdl.php";
function enrollStudentsCtl($choice =null){
    print "point 2 ok ...";
    $result=enrollStudentsMdl ($choice);
    return $result;
}
?>