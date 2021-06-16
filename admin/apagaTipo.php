<?php
$id=intval($_GET['id']);
include_once ("includes/body.inc.php");
drawTop(MENUOFF);
$sql="select utilizadorTipoId, utilizadorTipoNome, ifnull(num,0) as numUtilizadores from 
06hugo_utilizadortipos left join 
(
select utilizadorUtilizadorTipoId as utilizadorTipoId, count(*) as num
from 06hugo_utilizadores 
group by 1) as t
using(utilizadorTipoId) 
where utilizadorTipoId=".$id;
$res=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($res);
?>





<section>
    <div class="row">

        <div class="col-6 mx-auto">
            <span class="display-4">Elimina tipo de utilizadores</span>
            <div class="container-fluid">
                <form action="confirmaApagaTipo.php" method="post">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" disabled value="<?php echo $dados['utilizadorTipoNome'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="descricao">Nº de utilizadores</label>
                        <input type="text" class="form-control" id="descricao" name="descricao" disabled  value="<?php echo $dados['numUtilizadores']  ?>">
                    </div>
                    <?php
                    if($dados['numUtilizadores']>0) {
                        ?>
                        <span class="text-danger ">Não pode apagar! Já existem utilizadores com esse tipo. </span><br>
                        <button type="submit" class="btn btn-warning">Cancelar</button>
                        <?php
                    }
                    else{
                        ?> <button type="submit" class="btn btn-danger">Apaga</button>
                    <?php
                    }
                    ?>
                    <input type="hidden" name="id" value="<?php echo $dados['utilizadorTipoId']?>">
                </form>
            </div>

        </div>
    </div>

</section>





</body>
</html>