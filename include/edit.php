<?php
require("db_setup.php");
require("php_functions.php");

ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

if (empty($_SESSION['un']) || !isset($_POST["approve"])) {
    // store the current page in the session
    $_SESSION['page'] = "admin.php";

    // Redirect the user to login page
    header('location: /login.php');
}

$mailHeaders  = 'MIME-Version: 1.0' . "\r\n";
$mailHeaders .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$mailHeaders .= "From: admin@" . $_SERVER['SERVER_NAME'] . "\r\n";
if (!isset($_SESSION["curRequest"]))
    die;

$sqlEdit = "UPDATE " . $activeTable . " SET rejected = 1 AND public = 0 WHERE id = " . $_SESSION["curRequest"];
if ($_POST["approve"]) {
    $sqlEdit = "UPDATE " . $activeTable . " SET public = 1 AND rejected = 0 WHERE id = " . $_SESSION["curRequest"];
}

if (isset($sqlEdit)){
    $success = mysqli_query($db, $sqlEdit);

    $sqlGetChangedRow = "SELECT * FROM "  . $activeTable . " WHERE id = " . $_SESSION["curRequest"] . " LIMIT 1";
    $result = mysqli_query($db, $sqlGetChangedRow);

    unset($_SESSION["curRequest"]);
    foreach ($result as $row) {
        $mailSubject = "A decision has been made for ". $row['name'] ." on Coneybeare Sustainability.";

        if ($_POST["approve"]) {
            $mailTemplate = "
            <html>
                <body>
                    <h1>Your listing has been made public!</h1>
                    <p>Your company is now public on the Coneybeare Sustainability Catalog, congrats!</p>
                    <a href='" . addScheme($_SERVER['SERVER_NAME']) . "/search?search=". str_replace(" ", "+", $row['name']) ."'>View your listing</a>
                </body>
            </html>
            ";
        } else {
            $mailTemplate = "
            <html>
                <body>
                    <h1>Your listing has been rejected.</h1>
                    <p>Unfortunately, your listing has not been approved for Coneybeare Sustainability Catalog.</p>
                    <a href='" . addScheme($_SERVER['SERVER_NAME']) . "/form'>Start a new application</a>
                </body>
            </html>
            ";
        }
        mail($row["privEmail"], $mailSubject, wordwrap($mailTemplate, 50), $mailHeaders);

        //TEMP EMAIL FOR TINA'S UNTIMELY DAY-BEFORE REQUIREMENT
        $appID = $row['id'];
        //about company
        $companyName = $row['companyName'];
        $category = $row['category'];
        $website = $row['url'];
        $about = $row['about'];
        $areaServed = $row['scale'];
        $keywords = $row['tag_cloud'];
        //geo loc
        $streetAddress = $row['street'];
        $city = $row['city'];
        $state = $row['state'];
        $zip = $row['zip'];
        $country = $row['country'];
        $locCombined = $streetAddress . ". " . $city  . ", " . $state . ". " . $zip . ". " . $country . ".";
        //public contact
        $pubEmail = $row['email'];
        $pubPhone = $row['phone'];
        //priv contact
        $contactName = $row['privName'];
        $privEmail = $row['privEmail'];
        $privPhone = $row['privPhone'];
        //img
        $targetFile = $row['image'];

        $mailImgPreview = addScheme($_SERVER['SERVER_NAME'] . "/" . $targetFile);
        $imgTagEmail = "<img width='25%' src='$mailImgPreview'/>";
        $mailTemplate = "
        <html>
            <body>
                <h1>Company Application Approval</h1>
                <br>
                <h1>Information Submitted:</h1>
                " . $imgTagEmail . "
                <br>Company Name: <strong>$companyName</strong>
                <br>Category: <strong>$category</strong>
                <br>Website: <strong>$website</strong>
                <br>About: <strong>$about</strong>
                <br>Area Served: <strong>$areaServed</strong>
                <br>Company tags: <strong>$keywords</strong>
                <br>Location: <strong>$locCombined</strong>
                <br>Public Email: <strong>$pubEmail</strong>
                <br>Public Phone Number: <strong>$pubPhone</strong>
                <h1>Point of Contact:</h1>
                <br>Person to contact: <strong>$contactName</strong>
                <br>Contact's Email Address: <strong>$privEmail</strong>
                <br>Contact's Phone Number: <strong>$privPhone</strong>
                <br><a href='". addScheme($_SERVER['SERVER_NAME']) ."/admin.php?findID=$appID'>Login to approve or reject.</a>
            </body>
        </html>
        ";
        $mailSubject = "
        Application Review Request for: $companyName
        ";
    mail($row["privEmail"], $mailSubject, wordwrap($mailTemplate, 50), $mailHeaders);
    }

}

