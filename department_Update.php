<?php
/**
 * Created by PhpStorm.
 * User: EpistemicPolymath
 * Date: 2/26/2017
 * Time: 7:27 PM
 */

require_once("database.php");

$department_id = $_POST['department_id'];
$departmentName = $_POST['departmentName'];


$updateQuery = $db->prepare("UPDATE department
        SET departmentName =  :departmentName
              
        WHERE departmentID = :departmentID;");

$updateQuery->execute(array(
    ":departmentName" => $departmentName,
    ":departmentID " => $department_id
));
$updateQuery->closeCursor();
include("department_list.php");
header("location:department_list.php");