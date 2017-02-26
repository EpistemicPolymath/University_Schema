<?php
/**
 * Created by PhpStorm.
 * User: EpistemicPolymath
 * Date: 2/21/2017
 * Time: 10:40 PM
 */

#Require the database
require_once("database.php");

//Get All From Departments
#Select all from departments and store in departments array (For use of Name and ID together in ForEach
$queryAllDepartments = $db->prepare("SELECT * 
                        FROM department");
$queryAllDepartments->execute();
$departments = $queryAllDepartments->fetchall();
$queryAllDepartments->closecursor();


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
    <h1 class="title">Courses Manager</h1>
    <hr/>
    <h1>Department List</h1>

    <table>
        <tr>
            <th>Name</th>
            <!--Delete/Update-->
            <th></th>
        </tr>

        <?php foreach ($departments as $department) : ?>
            <tr>
                <td><?php echo $department['departmentName']; ?></td>
                <td>
                    <button type="button">Delete</button>
                    <button type="button">Update</button>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
    <br/>

    <form action="department_Insert.php" method="post">
        <h1>Add Department</h1>
        <label>Name: <input name='newDepartmentName' type='text'></label>
        <input type='submit' value='Add' /><br/><br/>

    </form>