<?php
/**
 * Created by PhpStorm.
 * User: EpistemicPolymath
 * Date: 2/26/2017
 * Time: 8:49 PM
 */


include_once('database.php');

#Get variable name from the form POST
$newDepartmentName = $_POST["newDepartmentName"];

#Create Database Query to Insert into department
$query = $db->prepare("INSERT INTO department (departmentName)
        VALUES
        ( :newDepartmentName );");
$query->execute(array(
    ":newDepartmentName" => $newDepartmentName
));
$query->closeCursor();
include("department_list.php");
//header("location:department_list.php");

?>

<!DOCTYPE html>
<html>
<!-- the header section -->
<head>
    <title>My University Schema</title>
    <link rel="stylesheet" type="text/css" href="styles.css"/>
</head>

<!-- the body section -->
<body>
<main>
    <h1 class="title">University Courses Manager</h1>
    <hr/>
    <h1>Add Course</h1>

<form>



</form>

</main>
</body>
</html>
