<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 28/04/2017
 * Time: 13:44
 */


include __DIR__."/../controller/adminDashCtl.php";
//global $myDataHead;
//global $myData;
if($_POST){
    try{
        switch ($_POST["submitButton"]) {
            case $admin_menus[0]:
                viewFunctionOne(); //createGroupsView
                break;
            case $admin_menus[1]:
                viewFunctionTwo(); //enrolStudentsView
                break;
            case $admin_menus[2]:
                viewFunctionThree(); //studentsView
                break;
            case $admin_menus[3]:
                viewFunctionFour(); //groupsView
                break;
            
            case $admin_menus[4]:
                viewFunctionFive();//groupStudentsView
                break;
            case "add records":
                addRecords();
                break;
        }
    }catch (Exception $e) {Print "Extra Menu Items have not been Accommodated";}
}

?>

<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<head>
</head>
<body>
<form name="aDash" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<header class="container">
    <?php
    include __DIR__."/../config/config.php";
    foreach ($admin_menus as $menu_Item){ print "
    <div class='col-sm-2'>
        <input type='submit' name='submitButton' class='btn btn-lg' value='$menu_Item'>
    </div>
    ";}
?>
</header>


<main>
    <div class='container' id='top_row' style='height: 20%; border: black'>
        <?php
        if(isset($GLOBALS['viewTop'])){
                print $GLOBALS['viewTop'] . $GLOBALS['viewUnder'];
                
            }
            ?>
    </div>
</main>
</form>
<footer>

</footer>
</body>
</html>

<?php


function viewFunctionOne(){ //viewCreatGroup
    print "hello";
}
function viewFunctionTwo(){ //viewEnrollStudents
    print "point 1 ok ..";
    $myDataHead =enrollStudentsCtl(0);
    $myData=enrollStudentsCtl(1);
    $GLOBALS['viewTop']=createDataInputStrip($myDataHead);
    $GLOBALS['viewUnder']=createDataTable($myDataHead, $myData);
}
function viewFunctionThree(){ //viewViewStudents
    print "students";
}
function viewFunctionFour(){ //viewViewGroups
    print "students";
}
function viewFunctionFive(){ //viewGroupStudents
    print "students";
}

function addRecords(){
    $rec= "'".sanitize_input($_POST['Name'])."', '" .sanitize_input($_POST['surname'])."', '" .sanitize_input($_POST['email'])."', '" .sanitize_input($_POST['u_type'])."', '" .sanitize_input($_POST['major'])."', '" .sanitize_input($_POST['minor'])."', '" .sanitize_input($_POST['dob'])."'";
    
    $query=array("insert","studentsView","(Name, surname, email, u_type, major, minor, dob)",$rec );
    setRecords(0, $query);
}

function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function createDataTable($myDataHead, $myData){ $dataStr="
        <div class='container'>
            <table class='table table-bordered'>
                <thead>
                    <tr>";
    foreach ($myDataHead as $row){
        $dataStr=$dataStr."<th> $row[0] </th>";
    }
    $dataStr=$dataStr. "</tr>
        </thead>
        <tbody>";
    if($myData){
        foreach ($myData as $row){
            $dataStr=$dataStr. "<tr> \n\r";
            foreach ($row as $col){
                $dataStr=$dataStr. "<td> $col </td> \n\r";
            }
            $dataStr=$dataStr. "</tr> \n\r";
        }
    }
    
    $dataStr=$dataStr. "</tbody>
            </table>
        
        </div>";
    
    return $dataStr;
    }

    function createDataInputStrip($myDataHead){
    
        $nxtRow="";
        $thisRow="";
        
        $myDataStr= "
         <div class='row'>";
        //$myDataHead=json_decode($myDataHead);
        foreach ($myDataHead as $row){
            $rStr="";
            //$rStr=" required";
            //if (mb_strtolower($row[0])=='id'){$rStr="";}
            $myDataStr=$myDataStr. "<div class='col-sm-2'>
                            <div class ='row'> $row[0] </div>
                             <div class='row'> <input type='text' name='$row[0]' $rStr> </div>
                             </div>";
        }
        $myDataStr=$myDataStr. "
                </div>
            <div class='container'>
                <fieldset>
                    <div class='col-sm-10'></div><div class='col-sm-2'> <input type='submit' name='submitButton' value='add records'></div>
                </fieldset>
            </div>
        ";
    return  $myDataStr=$myDataStr;
    
    }
?>