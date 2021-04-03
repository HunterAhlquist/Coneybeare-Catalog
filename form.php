<!--
  This file contains the markup for the form webpage
  Authors: Hunter Ahlquist, Cesar Escalona, Aubrey Davies, Zahrah Alsamach
  File: form.html
  Date: 1/22/2021
-->

<?php
// Turn on Error Reporting (test)
ini_set('display_errors', 1);
error_reporting(E_ALL);

include ('include/head.html');
include('include/navbar.php');
?>

<body>
<form method="post" id="infoform" action="submit" enctype="multipart/form-data" novalidate>
    <div class="container bg-light main-form border rounded align-middle">
        <div class="container form-pg0">
            <h1 class="text-center"><strong>Please Complete The Form Below To Be Featured In The Sustainability Catalog</strong></h1>
            <hr>
            <br>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="companyName"><strong>Company Name</strong></label>
                    <input type="text" class="form-control" id="companyName" name="companyName"/>
                    <span class="err" id="err-name">Please enter a company name</span>
                </div>
                <div class="form-group col-md-4">
                    <label for="category"><strong>Category</strong></label>
                    <select id="category" class="form-control" name="category">
                        <option selected>Choose...</option>
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
                        <option>Other</option>
                    </select>
                    <span class="err" id="err-category">Please select a category</span>
                </div>
                <div class="form-group col-md-4">
                    <label for="website"><strong>Company Website</strong></label>
                    <input type="url" class="form-control" id="website" value="" name="website"/>
                    <span class="err" id="err-website">Please enter a website</span>
                </div>

                <div class="form-group"><br>
                    <label for="about"><strong>About</strong></label>
                    <textarea class="form-control" id="about" maxlength="250" placeholder="(250 character limit)" rows="3" name="about"></textarea>
                    <p>(Enter a 'tagline' you wish to see in the sustainability
                        catalog, e.g. "Beauty products made from kelp and other sea vegetables")</p>
                    <span class="err" id="err-about">Please enter information about your company</span>
                </div>

                <div class="form-group col-md-6"><br>
                    <label for="image"><strong>Upload Company Logo</strong></label><br>
                    <input type="file" class="form-control" id="image" onchange="validateImage()" name="image"/>
                    <span class="err" id="err-image">Please enter an image</span><br>
                </div>

                <div class="form-group col-md-6"><br>
                    <label for="geo"><strong>Geographical Area</strong></label>
                    <select id="geo" class="form-control" name="geo">
                        <option selected>Choose...</option>
                        <option>Local/Regional</option>
                        <option>State</option>
                        <option>National</option>
                        <option>Global</option>
                    </select>
                    <span class="err" id="err-geo">Please select a geographical area</span>
                </div>
                <div class="form-group col-md-12">
                    <label for="keywords"><strong>Keywords</strong></label>
                    <input type="text" class="form-control" id="keywords" value="" data-role="tagsinput" placeholder="Add tags" name="keywords"/>
                    <p>(Enter tags that might help your company be found. Use commas to separate.)</p>
                    <span class="err" id="err-hashtag">Include at least one tag.</span>
                </div>
            </div>
            <br>
            <hr>
            <h2 class="text-center"><strong>Geo-location</strong></h2>
            <p class="text-center">(Optional, but if included, the information will be used for geo-location services.)</p>
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="address"><strong>Street Address</strong></label>
                    <input type="text" class="form-control" id="address" name="address" />
                </div>

                <div class="form-group col-md-3">
                    <label for="city"><strong>City</strong></label>
                    <input type="text" class="form-control" id="city" name="city"/>
                    <span class="err" id="err-city">Please enter a city</span>
                </div>

                <div class="form-group col-md-3">
                    <label for="state"><strong>State/Province/Territory</strong></label>
                    <input type="text" class="form-control" id="state" name="state"/>
                    <span class="err" id="err-state">Please enter a region</span>
                </div>

                <div class="form-group col-md-3">
                    <label for="zip"><strong>Zip/Postal-code</strong></label>
                    <input type="text" class="form-control" id="zip" name="zip"/>
                </div>

                <div class="form-group col-md-3">
                    <label for="country"><strong>Country</strong></label>
                    <input type="text" class="form-control" id="country" name="country"/>
                    <span class="err" id="err-country">Please enter a country</span>
                </div>
            </div> <!-- Closing Div class Row, Line 70 -->

        </div> <!-- Closing Div class Container, Line 21 -->
        <br>
        <hr>
        <h2 class="text-center"><strong>Company Contact Information</strong></h2>
        <p class="text-center">(Optional, but if it is provided, it will be included in the Sustainability Catalog.)</p>
        <div class="row">

            <div class="form-group col-md-6">
                <label for="pubEmail"><strong>Public Email</strong></label>
                <input type="email" class="form-control" id="pubEmail" placeholder="someone@domain.com" name="pubEmail"/>
            </div>

            <div class="form-group col-md-6">
                <label for="pubPhone"><strong>Public Phone Number</strong></label>
                <input type="tel" class="form-control" id="pubPhone" name="pubPhone"/>
                <p>Enter with dashes and extension e.g 253-123-4567 ext. 1234</p>
                <span class="err" id="err-phone">Please enter a valid phone number</span>
            </div>


        </div>
        <br>
        <hr>
        <h2 class="text-center"><strong>Point of Contact</strong></h2>
        <p class="text-center">(This is who we'll contact if there are any questions regarding information
            on the form. Please note that this section is required, however information entered will not be
            displayed in the Sustainability Catalog.)</p>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="privFName"><strong>First Name</strong></label>
                <input type="text" class="form-control" id="privFName" name="privFName"/>
                <span class="err" id="err-custName">Please enter your first name</span>
            </div>

            <div class="form-group col-md-6">
                <label for="privLName"><strong>Last Name</strong></label>
                <input type="text" class="form-control" id="privLName" name="privLName"/>
                <span class="err" id="err-custLastName">Please enter your last name</span>
            </div>

            <div class="form-group col-md-6">
                <label for="privEmail"><strong>Email</strong></label>
                <input type="email" class="form-control" id="privEmail" placeholder="someone@domain.com" name="privEmail"/>
                <span class="err" id="err-custEmail">Please enter your email</span>
            </div>

            <div class="form-group col-md-6">
                <label for="privPhone"><strong>Contact Phone Number</strong></label>
                <input type="tel" class="form-control" id="privPhone" name="privPhone"/>
                <p>Enter with dashes and extension e.g 253-123-4567 ext. 1234</p>
                <span class="err" id="err-contactPhone">Please enter a valid phone number</span>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>


<!-- Footer of the Page -->
<?php
include ('include/footer.html');
?>
<script src="script/tageditor.js"></script>
<script src="script/form_script.js"></script>
</body>
</html>