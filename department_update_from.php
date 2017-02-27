<?php
/**
 * Created by PhpStorm.
 * User: EpistemicPolymath
 * Date: 2/21/2017
 * Time: 10:41 PM
 */

#Get variables from the form POST
$departmentName = filter_input(INPUT_GET, 'department_name', FILTER_VALIDATE_INT);
$department_id = filter_input(INPUT_GET, 'department_id', FILTER_VALIDATE_INT);

?>

<!DOCTYPE html>
<html>
<!-- the header section -->
<head>
    <title>University Courses Manager</title>
    <link rel="stylesheet" type="text/css" href="styles.css"/>
</head>

<!-- the body section -->
<body>
<main>
    <h1 class="title">University Courses Manager</h1>
    <hr/>
    <h1>Update Department</h1>
    <form action="department_Update.php" method="post">
        <label><input type="text" name="departmentName" value="<?= $departmentName ?>"></label>
        <input type="hidden" name="department_id" value="<?= $department_id ?>">
        <button type="submit">Update Department</button>
    </form>
</main>
</body>
</html>

