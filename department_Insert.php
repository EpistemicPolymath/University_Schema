<?php
/**
 * Created by PhpStorm.
 * User: EpistemicPolymath
 * Date: 2/26/2017
 * Time: 5:24 PM
 */

include_once('database.php');

$newDepartmentName = $_POST["newDepartmentName"];
$query = $db->prepare("INSERT INTO department (departmentName)
        VALUES
        (:newDepartmentName");
$query->execute(array(
    ":newDeparmentName" => $newDepartmentName
));
include("department_list.php");

?>