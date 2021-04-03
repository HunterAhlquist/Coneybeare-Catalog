<?php
// connect to db
require("include/db_setup.php");
// --------------------------------------------------------------
// Start the session
session_start();

// if the user is not logged in, then redirect
if (empty($_SESSION['un'])) {

    // store the current page in the session
    $_SESSION['page'] = "submit.php";

    // Redirect the user to login page
    header('location: login.php');
}
// --------------------------------------------------------------
// Turn on Error Reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);
include ('include/head.html');
include('include/navbar.php');

?>
<body>
<div class="container bg-light main-form border rounded align-middle">
    <div class="container text-center">
        <a href="logout.php" class="btn btn-lg text-white bg-primary">Logout</a> <!-- Could use some styling -->
    </div>
    <?php
    /**
    $name = $_POST['cname'];
    $category = $_POST['category'];
    $website = $_POST['site'];
    $email = $_POST['email'];
    $about = $_POST['about'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $geo = $_POST['geo'];
    $custName = $_POST['custName'];
    $custLastName = $_POST['custLastName'];
    $custEmail = $_POST['custEmail'];
     *
     **/

    echo "
    <div class=\"container text-center\"><br>
        <h1 class=\"display-6\">Thank you for providing your information! An email has been sent to the Coneybeare Sustainability team for review.</h1>
        <br>
        <h1>Information Submitted:</h1>
        <br>Company Name: <strong>Coneybeare Sustainability Company</strong>
        <br>Email: <strong>Vicky@ConeybeareSustainability.com</strong>
        <br>Category: <strong>Housing</strong>
        <br>Website: <strong>https://ConeybeareSustainability.com</strong>
        <br>About: <strong>Accelerating the transition to a Sustainable Economy</strong>
        <br>Geographical area: <strong>Global</strong>
        <br>Company Location: <strong>San Diego, Ca. USA</strong><hr>
        <h1>Point of Contact:</h1>
        <br>Person to contact: <strong>Vicky</strong>
        <br>Person to contact: <strong>Betancourt</strong>
        <br>Contact's Email Address: <strong>Vicky@ConeybeareSustainability.com</strong>
        </>
    </div>
  "
    ?>
</div>
<div class="d-flex justify-content-center">
    <a class="btn btn-success btn-lg" href="#" role="button">Approve</a>
    <a class="btn btn-danger btn-lg" href="#" role="button">Deny</a>
</div>

<?php
include ('include/footer.html');
?>

<script src="form_script.js"></script>
<script src="visuals.js"></script>
</body>
</html>