<div class="row">
    <div  class="col-12 col-m-12 col-l-12">
        <p id="add-PagesTitle">Your Articles</p>
    </div>
</div>
<section id="displayYourPages">
    <div class="row">
        <div  class="col-12 center col-m-12 m-center col-l-12 l-center">

        <?php foreach ($ListPage as $key => $page):?>
        <a style="text-decoration: none; color: black;" id="<?php echo $page->id?>" class="Article" href="<?php echo "Articles/detailArticles/".$page->route?>">
            <div class="mainDivYourPages">
                <p class="titleDivAddPages"><?php echo $page->title?></p>
                <hr class="hr">
                <p class="textDivAddPages"><?php echo $page->description?></p>
                <hr class="hr">
                <p class="textDivAddPages"><?php echo date('Y-m-d', strtotime($page->date_inserted))?></p>
            </div>
        </a>
        <?php endforeach;?>
        </div>
    </div>
</section>

