

<?php foreach ($DetailArticle as $key => $detail):?>

<div class="row">
    <div class="col-6 center col-m-6 m-center col-l-8 l-center">
        <div class="projects">

            <article class="post">
                <div class="row">
                    <div style="width: 100%; padding: 0px;" class="col-6  col-m-6 col-l-8">
                        <div class="post-media">
                            <img style="width: 100%;" src="/public/imagesUpload/jenesaispas.jpg" alt="Post">
                        </div>
                    </div>
                </div>
                <div class="post-content">
                    <h2 class="title"><?php echo $detail->title?></h2>
                    <div class="the-content">
                        <?php $this->addModal("form", $test);?>
                    </div>
                </div>
            </article>

        </div>
    </div>
</div>
<?php endforeach;?>



<script>
    tinymce.init({
        selector: '#test',
        plugins: "autoresize",
        min_height: 500,
    });
</script>

