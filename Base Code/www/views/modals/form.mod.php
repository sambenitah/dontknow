<?php $data = ($config["config"]["method"]=="POST")?$_POST:$_GET; ?>

<?php if( !empty($config["errors"])):?>
        <ul>
            <?php foreach ($config["errors"] as $errors):?>
            <li><?php echo $errors;?>
                <?php endforeach ?>
        </ul>
<?php endif ?>


<form
        action="<?php echo $config["config"]["action"];?>"
        method="<?php echo $config["config"]["method"];?>"
        class="<?php echo $config["config"]["class"];?>"
        id="<?php echo $config["config"]["id"];?>"
        <?php if ($config["config"]["enctype"] == true ):?>
        enctype="multipart/form-data"
        <?php endif;?>
>




    <?php foreach ($config["data"] as $key => $Form):?>

        <?php if($Form["type"]=="text" || $Form["type"]=="email" || $Form["type"]=="password" ):?>

            <?php if($Form["type"]=="password" ) unset($data[$key]); ?>


            <input type="<?php echo $Form["type"];?>"
                   name="<?php echo $key;?>"
                   placeholder="<?php echo  $Form["placeholder"];?>"
                <?php echo ($Form["required"])?'required="required"':'';?>
                   id="<?php echo $Form["id"];?>"
                   class="<?php echo $Form["class"];?>"
            >
            <?php elseif ($Form["type"] == null):?>
                <label class="label"><?php echo $Form["value"];?></label>
                <textarea id="<?php echo $Form["id"];?>"
                          class="<?php echo $Form["class"];?>"
                          name="<?php echo $key;?>">
            </textarea>

            <?php elseif ($Form["type"] == "file"):?>
            <label id="labelFile" class="label"><?php echo $Form["titleFile"];?></label>
            <label for="file" class="<?php echo $Form["classLabel"];?>"><?php echo $Form["value"];?></label>
            <input  type="<?php echo $Form["type"];?>"
                    id="<?php echo $Form["id"];?>"
                    class="<?php echo $Form["class"];?>"
                    name="<?php echo $key;?>"
                    accept="<?php echo $Form["accept"];?>"
            >

        <?php endif;?>

    <?php endforeach;?>





    <input type="submit" id="<?php echo $config["config"]["idSubmit"];?>" class="<?php echo $config["config"]["classSubmit"];?>" value="<?php echo $config["config"]["submit"];?>">

    <?php if ($config["config"]["cancelButton"] != false):?>

        <a href="#" class="<?php echo $config["config"]["classCancel"];?>" id="<?php echo $config["config"]["idCancel"];?>" ><?php echo $config["config"]["cancel"];?></a>

    <?php endif;?>


</form>