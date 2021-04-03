<?php

function selectImage($category) {

    switch ($category) {
        case "Agriculture": $img = 'agriculture.svg'; break;
        case "Circular Economy": $img = 'circular-economy.svg'; break;
        case "Clothing": $img = 'clothing.svg'; break;
        case "Consumer Goods": $img = 'consumer-goods.svg'; break;
        case "Ecology": $img = 'ecology.svg'; break;
        case "Education": $img = 'education.svg'; break;
        case "Energy": $img = 'energy.svg'; break;
        case "Healthcare": $img = 'healthcare.svg'; break;
        case "Housing": $img = 'housing.svg'; break;
        case "Lighting": $img = 'lighting.svg'; break;
        case "Manufacturing": $img = 'manufacturing.svg'; break;
        case "Transportation": $img = 'transportation.svg'; break;
        case "Wastewater": $img = 'wastewater.svg'; break;
        case "Water": $img = 'water.svg'; break;
        default: $img = 'other.svg'; break;
    }

    return $img;
}

function selectLink($category) {
    return 'href=category.php?category='. str_replace(' ', '+', $category);
}

function getGUID(){
    if (function_exists('com_create_guid')){
        return com_create_guid();
    }
    else {
        mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid = chr(123)// "{"
            .substr($charid, 0, 8).$hyphen
            .substr($charid, 8, 4).$hyphen
            .substr($charid,12, 4).$hyphen
            .substr($charid,16, 4).$hyphen
            .substr($charid,20,12)
            .chr(125);// "}"
        return $uuid;
    }
}

//dope function i found on stack exchange lol, it makes sure the url is formatted correctly.
//this could be used on the account creation form...
function addScheme($url, $scheme = 'http://')
{
    return parse_url($url, PHP_URL_SCHEME) === null ?
        $scheme . $url : $url;
}

//generate result
function generateResult($row, $mobile = false) {
//put everything into variables, and do some empty data handling
    $companyName = $row['name'];
    $companyName = trim($companyName, "*");
    if (empty($companyName))
        $companyName = "Somehow, this company is nameless";

    $about = $row['about'];

    $logoPath = $row['image'];
    if (empty($logoPath) || !file_exists($logoPath)){
        $logoPath = "images/logoGray.png";
    }

    $category = ucwords($row['category']);
    if (empty($category)){
        $category = "Other";
    }


    $catImg = selectImage($category);

    $catLink = selectLink($category);

    $website = addScheme($row['url']);
    $websiteTemplate = "
                    <div class='col-md-6 text-center' style='flex-shrink: 1;'>
                        <a $catLink class='text-center text-dark text-decoration-none' style='display: block'><img class='text-dark display-4 bi img-fluid' width='52px' src='images/category_icons/$catImg'/>
                        <br>$category</a>
                    </div>
                    <div class='col-md-6 text-center' style='flex-shrink: 1;'>
                        <a href='$website' target='_blank' rel=”noopener noreferrer” style='display: block'><img class='text-dark display-4 bi img-fluid' width='52px' src='images/category_icons/link-45deg.svg'/>
                        <br>Website</a>
                    </div>
                            ";
    if ($website == "http://") {
        $websiteTemplate = "
                    <div class='col-md-12 text-center' style='flex-shrink: 1;'>
                        <a $catLink class='text-center text-dark text-decoration-none'><img class='text-dark display-4 bi img-fluid' width='52px' src='images/category_icons/$catImg'/><br/>
                        $category</a>
                    </div>";
    }


    $location = $row['city'] . ', ' . $row['state'] . '. ' . $row['country'];
    if (empty($row['city']) || empty($row['state']) || empty($row['country']))
        $location = "(location not provided)";

    $phoneNumber = $row['phone'];
    if (empty(trim($row['phone'])))
        $phoneNumber = "(phone number not provided)";



    //slick looking result display
    $searchResultDisplay = "<div class='container border rounded result-box d-none d-lg-block bg-white'>
                <div class='row align-items-center flex-nowrap'>
                    <div class='col-2'>
                        <img class='result-logo img-fluid rounded' src='$logoPath'/>
                    </div>
                    <div class='col-7'>
                        <div class='row flex-nowrap'>
                            <div class='col-12'>
                                <h1 class='display-6'>$companyName</h1>
                                <h4 class='text-secondary'>$category</h4>
                                <h5 class='text-break'>$about</h5>
                            </div>
                        </div>
                    </div>
                    <div class='col-3 bg-light'>
                        <div class='row border-bottom flex-nowrap'>
                            " . $websiteTemplate . "
                        </div>
                        <div class='row flex-nowrap'>
                            <div class='col-11 text-center' style='padding: 1em;'>
                                <h3>Contact</h3>
                                <p>$location<br/>$phoneNumber</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";

    //mobile version
    $searchResultDisplayMobile = "
            <div class='container bg-white border rounded result-box d-lg-none'>
                <div class='row align-items-center'>
                    <div class='col-sm-2 text-center'>
                        <img class='result-logo img-fluid rounded' src='$logoPath'/>
                    </div>
                    <div class='col-sm-10 text-center'>
                        <h1 class='display-6'>$companyName</h1>
                        <h4 class='text-secondary'>$category</h4>
                        <h5 class='text-break'>$about</h5>
                    </div>
                </div>
                <div class='row bg-light' style='margin-left: 0; margin-right: 0;'>
                    <div class='col-sm-4 text-center border-top'>
                        <div class='row flex-nowrap'>
                            " . $websiteTemplate . "
                        </div>
                    </div>
                    <div class='col-sm-8 border border-right-0 border-bottom-0 text-center'>
                        <h3>Contact</h3>
                        <p>$location<br/>$phoneNumber</p>
                    </div>
                    
                </div>
            </div>
            ";

    if ($mobile) {
        return $searchResultDisplayMobile;
    }
    return $searchResultDisplay;
}
