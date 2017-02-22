<?php
/**
 * Created by PhpStorm.
 * User: EpistemicPolymath (Jenn)
 * Date: 2/21/2017
 * Time: 10:40 PM
 */

#Require the database so that we can use the $db variable to reach the database
#This is setup in database.php
require_once("database.php");

#Grabbing Necessary Components from Database

// Get Department ID for displaying particular department information
$department_id = filter_input(INPUT_GET, 'department_id', FILTER_VALIDATE_INT);
#If departmentID is null or false set it to the default value 1 which is Engineering
if ($department_id == NULL || $department_id == FALSE) {
    $department_id = 1;
}

// Get name for currently selected Department
#Query calls for all elements from department table that match the current department_id from GET
$queryDepartments = "SELECT * FROM departments
                      WHERE departmentID = :department_id";
$query1 = $db->prepare($queryDepartments);
$query1->execute(array(
    'department_id' => $department_id
));
//$query1=>bindValue(':department_id', $department_id);
//$query1->execute();
$departments = $query1->fetch();
//$department_name = $departments['departmentName'];
//$query1->closeCursor();
print_r($departments);

// Courses
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
    <h1>Courses List</h1>
    <aside>
        <!-- Display a list of Departments -->
        <h2>Departments</h2>
        <nav>
            <ul>
                <?php foreach ($departments as $department) : ?>
                    <li>
                        <a href="?department_id=<?php echo $department['departmentID']; ?>">
                            <?php echo $department['departmentName']; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </aside>

    <section>
        <!-- Display Table of Courses for each Department -->
        <h2><?php echo $category_name; ?></h2>
        <table>
            <tr>
                <th>Name</th>
                <th class="right">Price</th>
            </tr>

            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?php echo $product['instrumentName']; ?></td>
                    <td class="right"><?php echo $product['listPrice']; ?></td>
                </tr>
            <?php endforeach; ?>

            <form action="insert.php?category_id=<?php echo $category_id; ?>" method="post">
                <tr>
                    <td><input name='instrumentName' type='text'></td>
                    <td><input name='listPrice' type='text'></td>
                    <!--<td><input name="category_id" type='hidden' value="<? echo $category_id; ?>"></td> -->
                </tr>
                <tr>
                    <td colspan="2"><input name="submit" type="submit" value="Insert"></td>
                </tr>

            </form>
        </table>
    </section>
</main>

<footer>
    <!-- Empty footer -->

</footer>
</body>
</html>