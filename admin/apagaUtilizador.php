<?php
$id=intval($_GET['id']);
include_once ("includes/body.inc.php");
drawTop(MENUOFF);
$sql="select utilizadorId, utilizadorNome, ifnull(num,0) as numLivros from 
06hugo_utilizadores left join 
(
select requisicaoUtilizadorId as utilizadorId, count(*) as num
from 06hugo_requisicoes
group by 1) as t
using(utilizadorId) 
where utilizadorId=".$id;

$res=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($res);
?>





<section>
    <div class="row">

        <div class="col-6 mx-auto">
            <span class="display-4">Elimina Utilizador</span>
            <div class="container-fluid">
                <form action="confirmaApagaUtilizador.php" method="post">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" disabled value="<?php echo $dados['utilizadorNome'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="descricao">Nº Requisições</label>
                        <input type="text" class="form-control" id="descricao" name="descricao" disabled  value="<?php echo $dados['numLivros']  ?>">
                    </div>
                    <?php
                    if($dados['numLivros']>0) {
                        ?>
                        <span class="text-danger ">Não pode apagar! Utilizador já com requisições. </span><br>
                        <button type="submit" class="btn btn-warning">Cancelar</button>
                        <?php
                    }
                    else{
                        ?> <button type="submit" class="btn btn-danger">Apaga</button>
                    <?php
                    }
                    ?>
                    <input type="hidden" name="id" value="<?php echo $dados['utilizadorId']?>">
                </form>
            </div>

        </div>
    </div>

</section>





</body>
</html>