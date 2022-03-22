<?php
// Turn on Error Reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);
$user = posix_getpwuid(posix_getuid());
// ---------------------------------------------------------------------------------------
// think of session as a data bucket
// start the session
session_start();

// see the post array
// var_dump($_POST);

// Initialize our variable
$validLogin = true;
$un = "";

// if the form is submitted
if(!empty($_POST)) {
//echo "The form has been submitted";

// Get the form data
    $un = $_POST['adminUsername'];
    $pw = $_POST['adminPass'];

// if the form is valid
    require($user['dir'].'/login-creds.php');
    if ($un == $username && $pw == $password) {
        // Record the login in the session array
        $_SESSION['un'] = $un;

        // use this below if multiple pages.
        // $page = isset($_SESSION['page']) ?$_SESSION['page'] : "admin.php";
        // Go to the home page

        header('location: admin.php');
    }
// Invalid login
    $validLogin = false;
}
// ------------------------------------------------------------------------------------------

include ('include/head.html');
include('include/navbar.php');
?>
<body>

<div class="container bg-light main-form border rounded align-middle">
    <h1 class="text-center">Login</h1>
    <hr>
    <form action="#" method="post">
        <div class="form-group">
            <label for="adminUsername"><strong>Username</strong></label>
            <input type="text" class="form-control" id="adminUsername" aria-describedby="Enter email" placeholder="Enter username" name="adminUsername"
                   value="<?php

                   echo $un;

                   ?>">
        </div>
        <br>
        <div class="form-group">
            <label for="adminPass"><strong>Password</strong></label>
            <input type="password" class="form-control" id="adminPass" placeholder="Enter password" name="adminPass">
        </div><br>
        <?php
        if (!$validLogin) {
            echo '<p class="error">Login is incorrect</p>';
        }
        ?>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

<?php
include ('include/footer.html');
?>

<script src="script/form_script.js"></script>
</body>