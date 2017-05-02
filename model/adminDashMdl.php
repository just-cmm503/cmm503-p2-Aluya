<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 01/05/2017
 * Time: 20:59
 */
//include __DIR__."/../config/config.php";

function enrollStudentsMdl($choice=null){
    $enrolledStudents=null;
    switch ($choice) {
        case 0:
            $query = "describe students";
            $enrolledStudents=getRecords(0, $query);
            break;
        case 1:
            $query = "select * from students";
            $enrolledStudents = getRecords(0, $query);
            break;
    }
    return $enrolledStudents;
}

function getRecords($argNum=0, $query, $value1=null, $value2=null, $value3=null, $value4=null, $value5=null){
    //require_once __DIR__."/../config/config.php";
    include __DIR__."/../config/dbConnect.php";
    $stmt =$pdo->prepare($query);
    switch ($argNum){
        case 0:
            $stmt->execute();
            break;
        case 1:
            $stmt->execute([$value1]);
            break;
        case 2:
            $stmt->execute([$value1,$value2]);
            break;
        case 3:
            $stmt->execute([$value1,$value2,$value3]);
            break;
        case 4:
            $stmt->execute([$value1,$value2,$value3,$value4]);
            break;
        case 5:
            $stmt->execute([$value1,$value2,$value3,$value4,$value5]);
            break;
    }
    
    return $stmt->fetchAll();
}

?>