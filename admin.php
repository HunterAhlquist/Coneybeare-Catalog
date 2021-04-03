<?php
// connect to db
require("include/db_setup.php");
require("include/php_functions.php");
// --------------------------------------------------------------
// Start the session
session_start();

// if the user is not logged in, then redirect
if (empty($_SESSION['un'])) {

    // store the current page in the session
    $_SESSION['page'] = "admin.php";

    // Redirect the user to login page
    header('location: login.php');
}
// --------------------------------------------------------------
// Turn on Error Reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);
include ('include/head.html');
include('include/navbar.php');

if (!isset($_GET["findID"])){
    $sqlSearch = "SELECT * FROM " . $activeTable . " WHERE public = 0 AND rejected = 0 ORDER BY id LIMIT 1"; //load the next row in line
} else {
    $findID = $_GET["findID"];
    $sqlSearch = "SELECT * FROM " . $activeTable . " WHERE public = 0 AND rejected = 0 AND id = '$findID' ORDER BY id LIMIT 1"; //load specific entry
}

$result = mysqli_query($db, $sqlSearch);
?>
<body>

<div class="container bg-light main-form border rounded align-middle">
    <div class="container text-center">
        <a href="logout.php" class="btn btn-lg text-white bg-primary">Logout</a> <!-- Could use some styling -->
    </div>
    <?php
    if (mysqli_num_rows($result) <= 0) {
        if (!isset($_GET['findID'])){
            echo '<h1 class="text-center">All finished!</h1>
            <h3 class=\'text-muted text-center\'>Click refresh, or check back later...</h3>';
        } else {
            echo '<h1>Invalid listing!</h1>
            <h3 class=\'text-muted\'>If you see this after clicking a notification mail, it was probably already decided.</h3>';

        }

        echo '
            <div class="d-flex justify-content-center">
                <a class="btn btn-secondary btn-lg" role="button" onclick="location.reload()">Refresh</a>
            </div>
            ';

    } else {
        echo "<h1 class='display-4 text-center'>Listing Preview</h1>";
        foreach ($result as $row){
            $_SESSION["curRequest"] = $row["id"];
            echo generateResult($row);
            echo generateResult($row, true);
            $contactName = $row['privName'];
            $contactEmail = $row['privEmail'];
            $contactPhone = $row['privPhone'];
            echo "
                <div class=\"container text-center\">
                    <h1>Point of Contact</h1>
                    Person to contact: <strong>$contactName</strong>
                    <br>Contact's Email: <strong>$contactEmail</strong>
                    <br>Contact's Phone: <strong>$contactPhone</strong>
                </div>
              ";
            echo '
            <div class="d-flex justify-content-center">
                <a class="btn btn-success btn-lg" role="button" id="approve" name="approve">Approve</a>
                <a class="btn btn-danger btn-lg" role="button" id="reject" name="reject">Reject</a><br>
            </div>';
        }
    }


    ?>
</div>
<?php
include ('include/footer.html');

if (mysqli_num_rows($result) > 0) {
    echo '<script src="script/admin.js"></script>';
}
?>
<script src="script/visuals.js"></script>

</body>
</html>