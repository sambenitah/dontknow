<div class="row">
    <div  class="col-12 col-m-12 col-l-12">
        <p id="add-PagesTitle">Your Pictures</p>
    </div>
</div>

<section>
    <div  style="width: 100%; padding: 0 10% 0 10%;" class="col-12 col-m-12 col-l-12">
        <div id="sectionPicture" class="col-12 col-m-12 col-l-12">

            <p>reza</p>
            <?php echo $ListPicture[0]->name?>

            <?php foreach ($ListPicture as $picture):?>
                <div style=" height: 200px; margin: 10px;" class="col-3 col-m-3 col-l-3">

                </div>
                <?php $picture->status?>
            <?php endforeach;?>




        </div>
    </div>
</section>


