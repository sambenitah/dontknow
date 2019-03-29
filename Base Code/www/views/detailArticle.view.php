<?php foreach ($DetailArticle as $key => $detail):?>

<div class="row">
    <div class="col-6 center col-m-6 m-center col-l-8 l-center">
        <div class="backgroundDetailArticle">

            <article  id="<?php echo $detail->id?>" class="post">
                <div class="row">
                    <div style="width: 100%; padding: 0px;" class="col-6  col-m-6 col-l-8">
                        <div class="post-media">
                            <img id="<?php echo $detail->main_picture?>" style="width: 100%; height: 500px;" src="/public/imagesUpload/<?php echo $detail->main_picture?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 center col-m-5 m-center col-l-5 l-center">
                        <div id="divLabelSelect">
                            <label id="labelSelect" class="label">Select your picture</label>
                        </div>
                        <select class="select-css">
                            <option id="-">-</option>
                        </select>
                    </div>
                </div>

                <input id="inputHiddenPicture" value="<?php echo $detail->main_picture?>">
                <input id="inputHiddenContent" value="<?php echo $detail->content ?>">

                <div class="post-content">
                    <div class="the-content">
                        <p id="errorContent"></p>
                        <?php $this->addModal("form", $formArticle);?>
                    </div>
                </div>
            </article>
        </div>
    </div>
</div>
<?php endforeach;?>
<script>

    $(document).ready( function () {

        $.ajax({
            url : '/Pictures/setShowPictures',
            type : 'POST',
            data: {ajax : true },
            dataType: "json",
            success : function(data){

                for(i=0 ; i<data.length; i++)
                    $(".select-css").append('<option id= "'+data[i].name_id+'">' + data[i].name + '</option>')
            }
        });

        var contentTynmce = $("#inputHiddenContent").val();
        $("#textareaUpdateArticle").val(contentTynmce);
    });
    
    $(".select-css").change(function () {
        var picture = $('.select-css option:selected').attr('id');
        $("#inputHiddenPicture").val(picture)
    });


    $("#bouttonDetailArticle").click(function (e) {
        e.preventDefault();
        tinyMCE.triggerSave();
        var content = tinyMCE.get('textareaUpdateArticle').getContent();

        var id = $(".post").attr('id');
        var picturetest = $("#inputHiddenPicture").val();
        if (picturetest == '-')
            var picture = $('img').attr('id');
        else
            var picture = $("#inputHiddenPicture").val();

        $.ajax({
            url : '/Articles/updateArticle',
            data: {id : id, content : content, main_picture : picture },
            type : 'POST',
            dataType: "json",
            success : function(data){
                if (data != 'Update')
                    $("#errorContent").append(data)
                else
                window.location.reload(true);
            }
        });
    });

</script>
