<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 01/05/2017
 * Time: 20:59
 */
include __DIR__."/../config/config.php";

function enrollStudentsMdl(){
    $query="select * from students";
    $enrolledStudents=getRecords($argNum=0, $query, $value1=null, $value2=null, $value3=null, $value4=null, $value5=null );
    return null;
}

function getRecords(){

}
?>