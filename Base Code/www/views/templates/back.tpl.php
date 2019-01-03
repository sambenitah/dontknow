<!DOCTYPE html>
<html lang="en">

    <head>
        <title>IDK.</title>
        <meta charset="utf-8">
        <meta name="description" content="Créez un blog ou un site Web haut de gamme. Assistance en direct. Commencez ! Hébergement Gratuit. Des Centaines de Designs. Live Chat & Aide Par Mail. Stats Faciles à Lire. Prêt pour le Mobile. Évolutif et Sécurisé. SEO Intégré. Aide Rapide et Conviviale.">
        <link rel="stylesheet" type="text/css" href="../public/css/Back-css/style.css">
        <link rel="stylesheet" type="text/css" href="../public/css/Grid/style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    </head>

    <body>

        <header>
            <nav class="container">
                <div id="header" class="row">
                    <div class="col col-12">
                       <a id="headerTitleBack" href="<?php echo Routing::getSlug("Pages","default");?>">Dont kn?w</a>
                    </div>
                </div>
            </nav>
        </header>

        <main>
            <section class="container">
                <div id="mainSection" class="row">

                    <div id="leftPartMainSection" class="col col-2">
                        <nav id="navAdmin">
                            <div class="adminMenu">
                                <p class="titleMenu">Administration</p>
                                <a class="a-adminMenu" href="<?php echo Routing::getSlug("Admin","yourWebSite");?>">Your website<i class="arrowNavAdmin fas fa-caret-right"></i></a>
                                <a class="a-adminMenu" href="<?php echo Routing::getSlug("Admin","statistics");?>">Statistics<i class="arrowNavAdmin fas fa-caret-right"></i></a>
                                <p class="titleMenu">Customizer</p>
                                <a class="a-adminMenu" href="<?php echo Routing::getSlug("Admin","customizer");?>">Customizer<i class="arrowNavAdmin fas fa-caret-right"></i></a>
                                <p class="titleMenu">Manage</p>
                                <a class="a-adminMenu" href="<?php echo Routing::getSlug("Admin","addPage");?>">Add page<i class="arrowNavAdmin fas fa-caret-right"></i></a>
                                <a class="a-adminMenu" href="<?php echo Routing::getSlug("Admin","addImage");?>">Add image<i class="arrowNavAdmin fas fa-caret-right"></i></a>
                                <a class="a-adminMenu" href="<?php echo Routing::getSlug("Admin","addOptions");?>">Add options<i class="arrowNavAdmin fas fa-caret-right"></i></a>
                                <a class="a-adminMenu" href="<?php echo Routing::getSlug("Admin","adjustement");?>">Adjustement<i class="arrowNavAdmin fas fa-caret-right"></i></a>
                            </div>
                        </nav>
                    </div>
                    <div id="rightPartMainSection" class="col col-10">

                        <?php include $this->v;?>

                    </div>
                </div>
            </section>
        </main>

        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src="../public/js/back.tpl.js"></script>
    </body>
</html>

