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
            $query = array("describe", "studentsView");
            $enrolledStudents=getRecords(0, $query);
            break;
        case 1:
            $query = array("select", "*", "studentsView");
            $enrolledStudents = getRecords(0, $query);
            break;
    }
    return $enrolledStudents;
}

function getRecords($argNum=0, $query, $value1=null, $value2=null, $value3=null, $value4=null, $value5=null){
    //require_once __DIR__."/../config/config.php"
    switch ($query[0]){
        case "describe":
            $nQuery=$query[0]." ".$query[1];
            break;
        case "select":
            $nQuery=$query[0]." ".$query[1]." from ".$query[2];
            break;
    }
    include __DIR__."/../config/dbConnect.php";
    print "point 4 ok";
    $stmt =$pdo->prepare($nQuery);
    print "point 5 ok....";
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

function setRecords($argNum=0, $query, $value1=null, $value2=null, $value3=null, $value4=null, $value5=null, $value6=null, $value7=null){
    //require_once __DIR__."/../config/config.php";
    switch ($query[0]){
        case "update":
            $nQuery=$query[0]." table ".$query[1]." set ".$query[2];
        case "insert":
            $nQuery=$query[0]." into ".$query[1]." ".$query[2]." ".$query[3];
    }
    include __DIR__."/../config/dbConnect.php";
    $stmt =$pdo->prepare($nQuery);
    try {
        switch ($argNum){
       
        case 0:
            $stmt->execute();
            break;
        case 1:
            $stmt->execute([$value1]);
            break;
        case 2:
            $stmt->execute([$value1, $value2]);
            break;
        case 3:
            $stmt->execute([$value1, $value2, $value3]);
            break;
        case 4:
            $stmt->execute([$value1, $value2, $value3, $value4]);
            break;
        case 5:
            $stmt->execute([$value1, $value2, $value3, $value4, $value5]);
            break;
        case 6:
            $stmt->execute([$value1, $value2, $value3, $value4, $value5, $value6]);
            break;
        case 7:
            $stmt->execute([$value1, $value2, $value3, $value4, $value5, $value6, $value7]);
            break;
    }
    }catch(PDOException $e){
        return $e->getMessage();
    }
    
}
?>