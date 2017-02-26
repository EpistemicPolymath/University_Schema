<?php
/**
 * Created by PhpStorm.
 * User: EpistemicPolymath
 * Date: 2/26/2017
 * Time: 5:24 PM
 */

include_once('database.php');

$userName = $_POST["userName"];
$userPasword = $_POST["userPass"];
$userType = $_POST["userType"];
$stmt = $db->prepare("INSERT INTO UserTbl (userName,userPassword,userType)
        VALUES
        (:userName,:userPassword,:userType)");
$stmt->bindParam(':userName', $userName, PDO::PARAM_STR);
$stmt->bindParam(':userPassword', $userPasword, PDO::PARAM_STR);
$stmt->bindParam(':userType', $userType, PDO::PARAM_STR);
$stmt->execute();
include("index.php");
?>