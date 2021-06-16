<?php
$id=intval($_GET['id']);
include_once ("includes/body.inc.php");
drawTop(MENUOFF);
$sql="select generoId, generoNome, ifnull(num,0) as numLivros from 
06hugo_generos left join 
(
select livroGeneroGeneroId as generoId, count(*) as num
from 06hugo_livrogeneros 
group by 1) as t
using(generoId) 
where generoId=".$id;
$res=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($res);
?>





<section>
    <div class="row">

        <div class="col-6 mx-auto">
            <span class="display-4">Elimina género</span>
            <div class="container-fluid">
                <form action="confirmaApagaGenero.php" method="post">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" disabled value="<?php echo $dados['generoNome'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="descricao">Nº de Livros</label>
                        <input type="text" class="form-control" id="descricao" name="descricao" disabled  value="<?php echo $dados['numLivros']  ?>">
                    </div>
                    <?php
                    if($dados['numLivros']>0) {
                        ?>
                        <span class="text-danger ">N?o pode apagar! Género já com livros associados. </span><br>
                        <button type="submit" class="btn btn-warning">Cancelar</button>
                        <?php
                    }
                    else{
                        ?> <button type="submit" class="btn btn-danger">Apaga</button>
                    <?php
                    }
                    ?>
                    <input type="hidden" name="id" value="<?php echo $dados['generoId']?>">
                </form>
            </div>

        </div>
    </div>

</section>





</body>
</html>