<?php
/**
 * Created by PhpStorm.
 * User: EpistemicPolymath
 * Date: 2/26/2017
 * Time: 8:49 PM
 */

include_once("database.php");

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
    <h1 class="title">University Courses Manager</h1>
    <hr/>
    <h1>Add Course</h1>

    <form action="course_Insert.php" method="post">

        <label>Department: <select name="department">
                <?php foreach ($departments as $department) : ?>{

                    <option value="<?= $department['departmentID'] ?>"><?= $department['departmentName'] ?></option>

                    }
                <?php endforeach; ?>
            </select></label><br/>
        <label>Code:<input type="text" name="course_code"></label><br/>
        <label>Title:<input type="text" name="course_title"></label><br/>
        <label>Credits:<input type="text" name="course_credits"></label><br/><br/>
        <label>Description:<textarea name="course_description" rows="10" cols="30">
                Add a Description here...
            </textarea></label><br/> <br/> <br/>

        <button type="submit">Add Course</button>
    </form>
    <br/>

    <a href="index.php">View Courses List</a> <br/> <br/>

</main>
</body>
</html>
