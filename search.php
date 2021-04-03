<!--
search.php
created on 2/22/2021
by Hunter X Ahlquist
-->
<?php
//turn on error reporting (DO NOT forget this)
ini_set('display_errors', 1);
error_reporting(E_ALL);

require("include/db_setup.php");
require ('include/php_functions.php');
include("include/head.html");
?>
<body id="search-page">
<?php
    include("include/navbar.php"); //navbar
?>
<div class="container search-screen">

    <?php
    //all of these comments are mostly for my learning benefit
    //this all could use some refactoring
    $searchQ = filter_var($_GET['search'], FILTER_SANITIZE_STRING); //sanitize input and place in var.
    $searchQ = preg_replace('/\s+/', ' ', $searchQ); //use regex magic to remove extra white space between words
    $searchQ = trim($searchQ); //trim whitespace off the ends
    if ($searchQ == "debug_all") { //when searching for "debug_all", every company will be listed
        $searchQ = "";
    }


    $sqlSearch = "SELECT * FROM " . $activeTable . " WHERE concat(category, name, about) LIKE '%$searchQ%' AND public = 1 AND rejected = 0 ORDER BY category"; //cool sql stuff
    $result = mysqli_query($db, $sqlSearch); //search the database using our query. also phpstorm ALWAYS thinks this doesnt exist, ignoring my include
    if (!is_bool($result)){
        if (mysqli_num_rows($result) <= 0) { //if no results came up, kindly tell the user!
            $noResultsError = "
        <div class='container'>
            <h1>No results were found in your search.</h1>
            <h3 class='text-muted'>(Hint: You can search by company name, kind of company, and anything that might describe what you're looking for.)</h3>
        </div>
           ";
            echo $noResultsError;
        } else { //otherwise...
            $prevCategory = "";
            foreach ($result as $row) { //loop through all the rows that were returned
                $category = $row['category'];
                if ($prevCategory != $category){
                    $categoryHead= "
                <div class='search-category-header'>
                    <h1 class='display-2 search-header-label'>$category</h1>
                    <span class='cat-header-line'></span>
                </div>
                ";
                    echo $categoryHead;
                }
                echo generateResult($row);
                echo generateResult($row, true);

                $prevCategory = $category;
            }
        }
    }
    ?>
</div>
<?php
include("include/footer.html");
?>