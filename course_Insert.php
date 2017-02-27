<?php
/**
 * Created by PhpStorm.
 * User: EpistemicPolymath
 * Date: 2/26/2017
 * Time: 8:55 PM
 */

include_once('database.php');


$dep_id = $_POST['department'];
$course_code = $_POST['course_code'];
$course_title = $_POST['course_title'];
$course_credits = $_POST['course_credits'];
$course_description = $_POST['course_description'];


#Create Database Query to Insert into courses
$query = $db->prepare("INSERT INTO courses (crs_code, crs_title, crs_credits, crs_description, dep_id)
        VALUES
        ( :course_code, :course_title, :course_credits, :course_description, :dep_id );");
$query->execute(array(
    ":course_code" => $course_code,
    ":course_title" => $course_title,
    ":course_credits" => $course_credits,
    ":course_description" => $course_description,
    ":dep_id " => $dep_id
));
$query->closeCursor();
include("index.php?department_id=".$dep_id);
//header("location:department_list.php");
