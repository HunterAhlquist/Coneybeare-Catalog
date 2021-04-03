<!--
  This file contains the markup for the index webpage
  Authors: Hunter Ahlquist, Cesar Escalona, Aubrey Davies, Zahrah Alsamach
  File: index.php
  Date: 1/18/2021
-->

    <?php
        include('include/head.html');

    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    ?>
<body>
    <?php
      require ('include/php_functions.php');
      include('include/navbar.php');
    ?>

<div class="container-flex main-content">
    <!--sign in / sign up-->
    <div class="container-flex buttons-background justify-content-center" id="slideshow">
        <div class="container-sm" max-width="30%" id="tagline">
            <h1 class="display-4 text-center text-white">A searchable database and on-line marketplace for innovative solutions in sustainability; Creating visibility and accelerating speed to market</h1>
        </div>

        <div class="d-flex justify-content-center">
            <!--Sign up button -->
            <button type="button" class="btn tagline-btn btn-success btn-lg btn-block"><a class="text-decoration-none text-white" href="form.php">Sign Up</a></button>
            <!-- View Catalog button -->
            <button type="button" class="btn tagline-btn btn-success btn-lg btn-block"><a class="text-decoration-none text-white" href="#category-section">View the Catalog</a></button>
        </div>
    </div>

    <div class="container-fluid bg-light company-block about-block">
        <div id="about" class="container">
            <h2 class="display-4">Network with sustainable businesses</h2>
            <div class="row">
                <div class="col-sm">
                    <h3>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- category showcase cards -->
<div id="category-section">
    <h1 id="partners" class="display-3 text-center bg-transparent">Categories</h1>
    <div id="displaypart" class="container-flex flex-nowrap">
        <div class="row justify-content-center home-category">

            <!-- Category 1 -->
            <div class="card cat-card bg-light" style="width: 15rem;">
                <?php $link = selectLink('Agriculture'); echo "<a $link>";?>
                    <img class="card-img-top" src="images/category_icons/agriculture.svg" alt="Agriculture icon">
                    <div class="card-body">
                        <h5 class="card-title text-center">Agriculture</h5>
                        <p class="card-text text-secondary text-center"></p>
                        <p class="card-text text-primary text-center"></p>
                    </div></a>
            </div>

            <!-- Category 2 -->
            <div class="card cat-card bg-light home-category" style="width: 15rem;">
                <?php $link = selectLink('Circular Economy'); echo "<a $link>"?>
                    <img class="card-img-top" src="images/category_icons/circular-economy.svg" alt="Circular Economy icon">
                    <div class="card-body">
                        <h5 class="card-title text-center">Circular Economy</h5>
                        <p class="card-text text-secondary text-center"></p>
                        <p class="card-text text-primary text-center"></p>
                    </div></a>
            </div>

            <!-- Category 3 -->
            <div class="card cat-card bg-light home-category" id="ClothingC" style="width: 15rem;">
                <?php $link = selectLink('Clothing'); echo"<a $link>"?>
                    <img class="card-img-top" src="images/category_icons/clothing.svg" alt="Clothing icon">
                    <div class="card-body">
                        <h5 class="card-title text-center">Clothing</h5>
                        <p class="card-text text-secondary text-center"></p>
                        <p class="card-text text-primary text-center"></p>
                    </div></a>
            </div>

            <!-- Category 4 -->
            <div class="card cat-card bg-light home-category" id="ConsumerC" style="width: 15rem;">
                <?php $link = selectLink('Consumer Goods'); echo"<a $link>"?>
                    <img class="card-img-top" src="images/category_icons/consumer-goods.svg" alt="Consumer Goods icon">
                    <div class="card-body">
                        <h5 class="card-title text-center">Consumer Goods</h5>
                        <p class="card-text text-secondary text-center"></p>
                        <p class="card-text text-primary text-center"></p>
                    </div></a>
            </div>

            <!-- Category 5 -->
            <div class="card cat-card bg-light home-category" id="EcologyC" style="width: 15rem;">
                <?php $link = selectLink('Ecology'); echo"<a $link>"?>
                    <img class="card-img-top" src="images/category_icons/ecology.svg" alt="Ecology icon">
                    <div class="card-body">
                        <h5 class="card-title text-center">Ecology</h5>
                        <p class="card-text text-secondary text-center"></p>
                        <p class="card-text text-primary text-center"></p>
                    </div></a>
            </div>

            <!-- Category 6 -->
            <div class="card cat-card bg-light home-category" id="EducationC" style="width: 15rem;">
                <?php $link = selectLink('Education'); echo"<a $link>"?>
                    <img class="card-img-top" src="images/category_icons/education.svg" alt="Education icon">
                    <div class="card-body">
                        <h5 class="card-title text-center">Education</h5>
                        <p class="card-text text-secondary text-center"></p>
                        <p class="card-text text-primary text-center"></p>
                    </div></a>
            </div>

            <!-- Category 7 -->
            <div class="card cat-card bg-light home-category" id="EnergyC" style="width: 15rem;">
                <?php $link = selectLink('Energy'); echo"<a $link>"?>
                    <img class="card-img-top" src="images/category_icons/energy.svg" alt="Energy icon">
                    <div class="card-body">
                        <h5 class="card-title text-center">Energy</h5>
                        <p class="card-text text-secondary text-center"></p>
                        <p class="card-text text-primary text-center"></p>
                    </div></a>
            </div>

            <!-- Category 8 -->
            <div class="card cat-card bg-light home-category" id="HealthcareC" style="width: 15rem;">
                <?php $link = selectLink('Healthcare'); echo"<a $link>"?>
                    <img class="card-img-top" src="images/category_icons/healthcare.svg" alt="Healthcare icon">
                    <div class="card-body">
                        <h5 class="card-title text-center">Healthcare</h5>
                        <p class="card-text text-secondary text-center"></p>
                        <p class="card-text text-primary text-center"></p>
                    </div></a>
            </div>

            <!-- Category 9 -->
            <div class="card cat-card bg-light home-category" id="HousingC" style="width: 15rem;">
                <?php $link = selectLink('Housing'); echo"<a $link>"?>
                    <img class="card-img-top" src="images/category_icons/housing.svg" alt="Housing icon">
                    <div class="card-body">
                        <h5 class="card-title text-center">Housing</h5>
                        <p class="card-text text-secondary text-center"></p>
                        <p class="card-text text-primary text-center"></p>
                    </div></a>
            </div>

            <!-- Category 10 -->
            <div class="card cat-card bg-light home-category" id="LightingC" style="width: 15rem;">
                <?php $link = selectLink('Lighting'); echo"<a $link>"?>
                    <img class="card-img-top" src="images/category_icons/lighting.svg" alt="Lighting icon">
                    <div class="card-body">
                        <h5 class="card-title text-center">Lighting</h5>
                        <p class="card-text text-secondary text-center"></p>
                        <p class="card-text text-primary text-center"></p>
                    </div></a>
            </div>

            <!-- Category 11 -->
            <div class="card cat-card bg-light home-category" id="ManufacturingC" style="width: 15rem;">
                <?php $link = selectLink('Manufacturing'); echo"<a $link>"?>
                <img class="card-img-top" src="images/category_icons/manufacturing.svg" alt="Manufacturing icon">
                <div class="card-body">
                    <h5 class="card-title text-center">Manufacturing</h5>
                    <p class="card-text text-secondary text-center"></p>
                    <p class="card-text text-primary text-center"></p>
                </div></a>
            </div>

            <!-- Category 12 -->
            <div class="card cat-card bg-light home-category" id="TransportationC" style="width: 15rem;">
                <?php $link = selectLink('Transportation'); echo"<a $link>"?>
                    <img class="card-img-top" src="images/category_icons/transportation.svg" alt="Transportation icon">
                    <div class="card-body">
                        <h5 class="card-title text-center">Transportation</h5>
                        <p class="card-text text-secondary text-center"></p>
                        <p class="card-text text-primary text-center"></p>
                    </div></a>
            </div>

            <!-- Category 13 -->
            <div class="card cat-card bg-light home-category" id="WastewaterC" style="width: 15rem;">
                <?php $link = selectLink('Wastewater'); echo"<a $link>"?>
                    <img class="card-img-top" src="images/category_icons/wastewater.svg" alt="Wastewater icon">
                    <div class="card-body">
                        <h5 class="card-title text-center">Wastewater</h5>
                        <p class="card-text text-secondary text-center"></p>
                        <p class="card-text text-primary text-center"></p>
                    </div></a>
            </div>

            <!-- Category 14 -->
            <div class="card cat-card bg-light home-category" id="WaterC" style="width: 15rem;">
                <?php $link = selectLink('Water'); echo"<a $link>"?>
                    <img class="card-img-top" src="images/category_icons/water.svg" alt="Water icon">
                    <div class="card-body">
                        <h5 class="card-title text-center">Water</h5>
                        <p class="card-text text-secondary text-center"></p>
                        <p class="card-text text-primary text-center"></p>
                    </div></a>
            </div>
        </div>
    </div>
</div>

    <div class="row justify-content-center">
        <div class="container-fluid bg-light company-block about-block">
            <div id="staff" class="container">
                <h2>About Coneybeare Sustainability Catalog</h2>
                <div class="row">
                    <div class="col-sm">
                        <p>Coneybeare Sustainability Catalog is a full-service recruitment leader in the sustainable technology and renewable energy sectors, offering retained and exclusive contingency recruiting, direct hire and contractor placements, consulting and training services as well as reference checks.
                            Employers may hire us to connect them with great employees, independent contractors, or consultants. Our consultants also offer training in both employment and sustainability-related practices. Coneybeare Sustainability Catalog's team of recruiters, who have built a robust employer and candidate network, produces superior results and makes the process of finding and placing premier talent seamless.

                            Our team of dedicated, talented recruiters provides world-class services customized to each client’s individual needs, whether they are a start-up company or Fortune 500 corporation.

                            Headquartered in Santa Ana, Calif., the organization has offices in San Francisco and Colombia, South America.

                            Building a More Sustainable Future

                            Beyond its recruitment and consulting services, Coneybeare Sustainability Catalog is a leader in the clean technology movement. Lead by its founder Victoria Betancourt, our mission is to build a more sustainable future for the coming generations through a mix of innovation, public policy and private sector investment.

                            Ultimately, recruiting is all about connecting people. Exchanging ideas and forging relationships that serve this goal are the core values of Coneybeare Sustainability Catalog.</p>
                    </div>
                    <div class="col-md">
                        <img src="images/Vicky.png" id="vicky" class="img center rounded" alt="a picture if Vicky">
                        <p id="caption">Victoria Betancourt</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer of the Page -->
    <?php
    include ('include/footer.html');
    ?>
</body>
</html>