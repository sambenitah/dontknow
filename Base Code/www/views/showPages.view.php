<div class="row">
    <div  class="col-12 col-m-12 col-l-12">
        <p id="add-PagesTitle">Your Pages</p>
    </div>
</div>

<section id="displayYourPages">
    <div class="row">
        <div  class="col-12 center col-m-12 m-center col-l-12 l-center">
        <?php foreach ($ListPage as $key => $page):?>
            <div class="mainDivYourPages">
                <p class="titleDivAddPages"><?php echo $page->title?></p>
                <hr class="hr">
                <p class="textDivAddPages"><?php echo $page->description?></p>
                <hr class="hr">
                <p class="textDivAddPages"><?php echo date('Y-m-d', strtotime($page->date_inserted))?></p>
            </div>
        <?php endforeach;?>
        </div>
    </div>
</section>

