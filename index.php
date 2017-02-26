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
$queryDepartments = "SELECT * FROM department
                      WHERE departmentID = :department_id";
$queryDepartmentName = $db->prepare($queryDepartments);
$queryDepartmentName->execute(array(
    'department_id' => $department_id
));
#Fetches from the query and places in arry department
$department = $queryDepartmentName->fetch();
#Takes the current DepartmentName from the Query and stores as an isolated variable
$department_name = $department['departmentName'];
$queryDepartmentName->closeCursor();
//print_r($department);


//Get All From Departments
#Select all from departments and store in departments array (For use of Name and ID together in ForEach
$queryAllDepartments = $db->prepare("SELECT * 
                        FROM department");
$queryAllDepartments->execute();
$departments = $queryAllDepartments->fetchall();
$queryAllDepartments->closecursor();
//print_r($departments);



// Select all Courses Depending on department_id or selected department
$queryAllCourses = $db->prepare("SELECT *
                                FROM courses
                                WHERE departmentID = :department_id");
$queryAllCourses->execute(array(
        ':department_id' => $department_id
));





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
            <ul>    <!-- Loop through fetchall of Departments and list each by ID and Name -->
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
        <!-- Department Name -->

        <h2><?php echo $department_name; ?></h2>
        <!-- Display Table of Courses for each Department -->

        <table>
            <tr>
                <th>Code</th>
                <th>Title</th>
                <th>Credits</th>
                <th>Description</th>
         <!--Delete--><th>    </th>
                <!--Update--><th>    </th>
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