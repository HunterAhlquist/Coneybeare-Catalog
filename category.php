<!-- Error Reporting -->
<?php
header("Content-type: text/html;charset=UTF-8"); //this makes sure certain characters like the ' character displays correctly
/*
 * 305/category.php
 * Aubrey Davies
 * 1/25/2021
 * *** Added footer, feature when you click on the page a new tab opens, added container and br for better positioning
 */

//turn on error reporting (DO NOT forget this)
ini_set('display_errors', 1);
error_reporting(E_ALL);

require("include/db_setup.php");
require ('include/php_functions.php');
include("include/head.html");
?>

<!-- Page Head -->
<!DOCTYPE html>
<html>
<?php
include('include/head.html');
?>
<body id="category-body">

<!-- Nav Bar -->
<?php
include('include/navbar.php');
?>

<div class="container py-5">
    <br><br>
    <?php
    if (isset($_GET['category'])){
        $category = $_GET['category'];
    }

    echo "<div class='search-category-header'>
            <h1 class='display-2 search-header-label'>$category</h1>
            <span class='cat-header-line'></span>
        </div>
    
        <form id='goto'>
        <div class='container form-group row' id='drop'>
            <div class='form-group col-6'>
                    <select id='gotoCategory' class='form-control' name='category'>
                        <option selected>Go To Category...</option>
                        <option>Agriculture</option>
                        <option>Circular Economy</option>
                        <option>Clothing</option>
                        <option>Consumer Goods</option>
                        <option>Ecology</option>
                        <option>Education</option>
                        <option>Energy</option>
                        <option>Healthcare</option>
                        <option>Housing</option>
                        <option>Lighting</option>
                        <option>Manufacturing</option>
                        <option>Transportation</option>
                    </select>
                </div>
                <div class='form-group col-1' id='dropbtn'>
                    <button class='btn btn-primary'>Go</button>
                </div>
        </div>
            
        </form>"
    ?>

    <div id="displaycategory" class="container-flex flex-nowrap">

        <?php
        $sqlSearch = "SELECT * FROM " . $activeTable . " WHERE category = '$category' AND public = 1 AND rejected = 0 ORDER BY name";
        $result = mysqli_query($db, $sqlSearch); //search the database using our query

        foreach ($result as $row) {
            echo generateResult($row);
            echo generateResult($row, true);
        }

        ?>


    </div>
</div>

<?php
include ('include/footer.html');
?>
