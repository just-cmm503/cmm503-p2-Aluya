<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 28/04/2017
 * Time: 13:44
 */
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
</form>

<main>
    <?php
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
        }
        }catch (Exception $e) {Print "Extra Menu Items have not been Accommodated";}
    }
    function viewFunctionOne(){ //viewCreatGroup
        print "hello";
    }
    function viewFunctionTwo(){ //viewEnrollStudents
        $myData=enrollStudentCtl();
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
    ?>
</main>

<footer>

</footer>
</body>
</html>

<?php
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>