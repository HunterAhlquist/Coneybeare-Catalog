<nav class="navbar smart-scroll navbar-expand-lg navbar-dark">
    <div class="navbar-brand">
        <a href="index#"><img class="img-fluid.about-block brand brand-desktop" href="index#" src="images/logoA.png" height="50px" style="margin-left: 0.5em;"></a>
        <a href="index#" class="text-white font-weight-bold text-decoration-none" style="margin-left: 0.5em;">Coneybeare<br/>Sustainability</a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse flex-row-reverse" id="main_nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link about" href="index#about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link about" href="index#partners">Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link about" href="form#">Sign Up</a>
            </li>
        </ul>
        <div class="row justify-content-center" style="width: 70%; min-width: 400px;">
            <form method="get" class="form-inline my-2 my-lg-0" action="search">
                <button class="btn bg-success search-button my-2 my-sm-0 text-white" value="Search" type="submit" style="float: right; margin: 0 !important; border-top-left-radius: 0; border-bottom-left-radius: 0; "><span class="bi bi-search"></span></button>
                <div class="form-group" style="overflow: hidden;">
                    <?php
                    $lastSearch = "";
                    if (!empty($_POST['search'])){
                        $lastSearch = filter_var($_POST['search'], FILTER_SANITIZE_STRING);
                        $lastSearch = preg_replace('/\s+/', ' ', $lastSearch);
                        $lastSearch = trim($lastSearch);
                    }
                    echo "<input class='form-control mr-sm-2 searchbar' name='search' type='search' value='$lastSearch' placeholder='Search the catalog...' aria-label='Search' oninvalid='this.setCustomValidity(\"Please enter a search term.\")' oninput='this.setCustomValidity(\"\")' required>";
                    ?>
                </div>
            </form>
        </div>
    </div>
</nav>