<?php
include_once ("includes/body.inc.php");
include_once ("../common.php");
$txt=addslashes($_POST['txt']);
$id=intval($_POST['id']);
?>
<select class="form-control" name="autor">

    <?php
    $sql="select * from 06hugo_autores where autorNome like '%".$txt."%'";
    $res=mysqli_query($con,$sql);
    while($dados=mysqli_fetch_array($res)){

        if($id==$dados['autorId']){
            ?>
            <option selected value="<?php echo $dados['autorId']?>"><?php echo $dados['autorNome']?></option>
            <?php
        }
        else{
            ?>
            <option value="<?php echo $dados['autorId']?>"><?php echo $dados['autorNome']?></option>
            <?php
        }
    }
    ?>

</select>