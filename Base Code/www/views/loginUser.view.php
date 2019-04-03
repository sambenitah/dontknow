<main>
    <section id="SectionOneLogUser">
        <h1 id="TitleAddLogUser">Log into idk.</h1>
        <p id="t1--AddLogUser">Or <a id="a1--AddLogUser" href="#">Create account</a></p>
            <?php $this->addModal("form", $form);?>
            <?php
            $user = new Users();
            if($user->logged()){
                echo "you are already connected".$_SESSION["auth"];
            }
            else {
                echo "not connected"; 
            }

            ?>
    </section>
</main>