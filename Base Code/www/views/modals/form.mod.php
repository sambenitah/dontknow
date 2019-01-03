<?php


$data = ($config["config"]["method"]=="POST")?$_POST:$_GET;


?>


<form
        action="<?php echo $config["config"]["action"];?>"
        method="<?php echo $config["config"]["method"];?>"
        class="<?php echo $config["config"]["class"];?>"
        id="<?php echo $config["config"]["id"];?>">




    <?php foreach ($config["data"] as $key => $value):?>

        <?php if($value["type"]=="text" || $value["type"]=="email" || $value["type"]=="password" ):?>

            <?php if($value["type"]=="password" ) unset($data[$key]); ?>


            <input type="<?php echo $value["type"];?>"
                   name="<?php echo $key;?>"
                   placeholder="<?php echo  $value["placeholder"];?>"
                <?php echo ($value["required"])?'required="required"':'';?>
                   id="<?php echo $value["id"];?>"
                   class="<?php echo $value["class"];?>"
                   value="<?php echo $data[$key]??''?>"
            >

        <?php endif;?>

    <?php endforeach;?>



    <input type="submit" class="<?php echo $config["config"]["classSubmit"];?>" value="<?php echo $config["config"]["submit"];?>">


</form>