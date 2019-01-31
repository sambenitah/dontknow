<!DOCTYPE html>
<html lang="en">

<head>
    <title>IDK.</title>
    <meta charset="utf-8">
    <meta name="description"
          content="Créez un blog ou un site Web haut de gamme. Assistance en direct. Commencez ! Hébergement Gratuit. Des Centaines de Designs. Live Chat & Aide Par Mail. Stats Faciles à Lire. Prêt pour le Mobile. Évolutif et Sécurisé. SEO Intégré. Aide Rapide et Conviviale.">
    <link rel="stylesheet" type="text/css" href="../public/css/Back-css/style.css">
    <link rel="stylesheet" type="text/css" href="../public/css/Grid/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel='stylesheet' href='//fonts.googleapis.com/css?family=Montserrat:400,600,700%7CLato:400,700'
          type='text/css' media='all'/>
    <link rel="stylesheet" type="text/css" href="../../public/css/Front-css/style.css">
    <style>
        body{
            padding: 0;
        }
    </style>
</head>

<body>
<header>
    <div class="row">
        <div id="backgroundHeader" class="col-12 col-m-12 col-l-12">
            <a href="<?php echo Routing::getSlug("Users", "default"); ?>" id="headerPartMainSection">

                Dont Kn?w

            </a>
        </div>
    </div>
</header>
<section id="MainSection">

    <div class="row">
        <div id="leftPartMainSection" class="col-12 col-m-3 col-l-2">
            <nav class="center" id="navAdmin">
                <p class="titleMenu">Administration</p>
                <div class="div-nav-admin-menu">
                    <a class="a-adminMenu" href="<?php echo Routing::getSlug("Article", "yourWebSite"); ?>">Your
                        website test</a>
                    <a class="a-adminMenu" href="<?php echo Routing::getSlug("Article", "statistics"); ?>">Statistics</a>
                </div>
                <p class="titleMenu">Customizer</p>
                <div class="div-nav-admin-menu">
                    <a class="a-adminMenu" href="<?php echo Routing::getSlug("Article", "customizer"); ?>">Customizer</a>
                </div>
                <p class="titleMenu">Manage</p>
                <div class="div-nav-admin-menu">
                    <a class="a-adminMenu" href="<?php echo Routing::getSlug("Article", "addPage"); ?>">Add Article</a>
                    <a class="a-adminMenu" href="<?php echo Routing::getSlug("Article", "showPages"); ?>">Your Articles</a>
                    <a class="a-adminMenu" href="<?php echo Routing::getSlug("Pictures", "addPicture"); ?>">Add
                        picture</a>
                    <a class="a-adminMenu" href="<?php echo Routing::getSlug("Pictures", "showPictures"); ?>">Your
                        pictures</a>
                    <a class="a-adminMenu" href="<?php echo Routing::getSlug("Article", "addOptions"); ?>">Add options</a>
                    <a class="a-adminMenu"
                       href="<?php echo Routing::getSlug("Pages", "adjustement"); ?>">Adjustement</a>
                </div>
            </nav>
        </div>
        <div id="rightPartMainSection" class="col-12 col-m-9 col-l-10">

            <body class="home">
            <div id="main-content">
                <div class="mobile">
                    <div class="container">
                        <div class="menu-mobile">
                            <span class="item item-1"></span>
                            <span class="item item-2"></span>
                            <span class="item item-3"></span>
                        </div>
                        <div class="logo">
                            <a href="<?php echo Routing::getSlug("Pages", "listFrontPages"); ?>">IDK</a>
                        </div>
                    </div>
                </div>
                <div class="hide-menu"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-l-3">
                            <div class="header" style="position: fixed">
                                <div class="table">
                                    <div class="table-cell">
                                        <div class="logo">
                                            <a href="<?php echo Routing::getSlug("Pages", "listFrontPages"); ?>">IDK</a>
                                        </div>
                                        <div class="main-menu">
                                            <nav>
                                                <ul class="menu-list">
                                                    <li class="active">
                                                        <a href="<?php echo Routing::getSlug("Pages", "listFrontPages"); ?>">Home</a>
                                                    </li>
                                                    <li>
                                                        <a href="category.html">Branding</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Design</a>
                                                    </li>
                                                    <li>
                                                        <a href="about.html">Identity</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Furniture</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Blog</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Contact</a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                        <div class="socials">
                                            <a href="#" title="Behance">
                                                <i class="fab fa-behance"></i>
                                            </a>
                                            <a href="#" title="Dribbble">
                                                <i class="fab fa-dribbble"></i>
                                            </a>
                                            <a href="#" title="Facebook">
                                                <i class="fab fa-facebook"></i>
                                            </a>
                                            <a href="#" title="Google Plus">
                                                <i class="fab fa-google-plus"></i>
                                            </a>
                                            <a href="#" title="Instagram">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                            <a href="#" title="Search this site">
                                                <i class="fa fa-search"></i>
                                            </a>
                                        </div>
                                        <div class="box-search">
                                            <div class="table">
                                                <div class="table-cell">
                                                    <div class="container">
                                                        <form class="search-form" action="#" method="get">
                                                            <input type="search" name="s" class="search-field"
                                                                   placeholder="Type &amp; hit enter" value=""
                                                                   title="Search">
                                                            <div class="kd-close">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="copyright">
                                            <p>
                                                IDK @ 2018. Design by ESGI
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php include $this->v; ?>
                    </div>
                </div>
            </div>
            <footer id="footer" class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-l-9 col-l-push-3">
                            <div class="footer-inner">
                                <div class="row">
                                    <div class="col-12 col-m-12 col-l-12">
                                        <h2 class="title">About Me</h2>
                                        <p>
                                            Welcome
                                        </p>
                                    </div>
                                    <div class="col-12 col-m-12 col-l-12">
                                        <h2 class="title">Contact Me</h2>
                                        <ul>
                                            <li>
                                                Phone:
                                            </li>
                                            <li>
                                                Email:
                                            </li>
                                            <li>
                                                Location:
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <script src="../../public/js/jquery-3.3.1.min.js"></script>
            <script src="../../public/js/script.js"></script>

        </div>
    </div>

</section>

<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
<script src="../public/js/addPages.js"></script>
<script src="../public/js/admin.tpl.js"></script>
</body>
</html>
