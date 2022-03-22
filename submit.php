<!--
  This file contains the markup for the form_submit webpage
  Authors: Hunter Ahlquist, Cesar Escalona, Aubrey Davies, Zahrah Alsamach
  File: form_submit.html
  Date: 1/25/2021
-->
<?php
// Turn on Error Reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);
require("include/db_setup.php");
include ('include/head.html');
include ('include/php_functions.php');
?>
<body>
<?php
include('include/navbar.php');
?>
<div class="container bg-light main-form border rounded align-middle">
    <?php
    //about company
    $companyName = $_POST['companyName'];
    $category = $_POST['category'];
    $website = $_POST['website'];
    $about = $_POST['about'];
    $areaServed = $_POST['geo'];
    $keywords = $_POST['keywords'];
    //geo loc
    $streetAddress = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $country = $_POST['country'];
    $locCombined = $streetAddress . ". " . $city  . ", " . $state . ". " . $zip . ". " . $country . ".";
        //public contact
    $pubEmail = $_POST['pubEmail'];
    $pubPhone = $_POST['pubPhone'];
    //priv contact
    $contactName = $_POST['privFName'] . " " . $_POST['privLName'];
    $privEmail = $_POST['privEmail'];
    $privPhone = $_POST['privPhone'];



    //upload image
    $targetDir = "images/user_upload/";
    $targetFile = $targetDir . basename(hash("md5", getGUID()));
    $uploadOk = true;
    $imageFileType = strtolower(pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION));
    $targetFile .= "." . $imageFileType;
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = true;
        } else {
            echo "File is not an image.";
            $uploadOk = false;
        }
    }
    if ($uploadOk) {
        // Check if file already exists
        if (file_exists($targetFile)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
    }
    if ($uploadOk){
        // Check file size
        if ($_FILES["image"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
    }
    if ($uploadOk){
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "Sorry, only JPG, JPEG, PNG files are allowed.";
            $uploadOk = 0;
        }
    }

    if (!$uploadOk) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            echo "Sorry, there was an error uploading your file. Codec call Otacon for tech-support, Snake!";
        }

        // Write to DB
        $sql = "INSERT INTO " . $activeTable . " (name, image, category, tag_cloud, about, url, street, city, state, country, scale, email, phone, privName, privEmail, privPhone)
            VALUES('$companyName', '$targetFile', '$category', '$keywords', '$about', '$website', '$streetAddress' , '$city', '$state', '$country', '$areaServed', '$pubEmail', '$pubPhone', '$contactName' , '$privEmail', '$privPhone');";
        $success = mysqli_query($db, $sql) or die(mysqli_error($db));
        $newResult = mysqli_query($db, "SELECT * FROM " . $activeTable . " ORDER BY id DESC LIMIT 1") or die(mysqli_error($db));

    }

    echo "
    <div class=\"container text-center\"><br>
        <h1 class=\"display-6\">Thank you for providing your information! An email has been sent to the Coneybeare Sustainability team for review.</h1>
        <br>
        <h1>Information Submitted:</h1>
        <img class='img-thumbnail' width='25%' src='$targetFile'/>
        <br>Company Name: <strong>$companyName</strong>
        <br>Category: <strong>$category</strong>
        <br>Website: <strong>$website</strong>
        <br>About: <strong>$about</strong>
        <br>Company hashtags: <strong>$keywords</strong>
        <br>Location: <strong>$locCombined</strong>
        <br>Public Email: <strong>$pubEmail</strong>
        <br>Public Phone Number: <strong>$pubPhone</strong>
        <h1>Point of Contact:</h1>
        <br>Person to contact: <strong>$contactName</strong>
        <br>Contact's Email Address: <strong>$privEmail</strong>
        <br>Contact's Phone Number: <strong>$privPhone</strong>
    </div>
  ";

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";


    if (isset($success)){
        foreach ($newResult as $row){
            $appID = $row['id'];
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

            mail($newEntryMailbox, $mailSubject, wordwrap($mailTemplate, 50), $headers);
        }
    }



    ?>
</div>
<!-- Footer of the Page -->
<?php
include ('include/footer.html');
?>

</body>
</html>