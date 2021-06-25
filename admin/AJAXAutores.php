<?php
include_once ("includes/body.inc.php");
include_once ("../common.php");
$txt=addslashes($_POST['txt']);
?>
<select  class="form-control" name="autores" list="autoresNome">
    <!-- <option value="-1">Escolha um autor...</option> -->
    <datalist id="autoresNome">
        <?php
        $sql="select * from 06hugo_autores where autorNome like '%".$txt."%'";
        $res=mysqli_query($con,$sql);
        while($dados=mysqli_fetch_array($res)){
            echo "<option value=\"".$dados['autorId']."\">".$dados['autorNome']."</option>";
        }
        ?>
    </datalist>
</select>