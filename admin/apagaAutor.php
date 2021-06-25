<?php
$id=intval($_GET['id']);
include_once ("includes/body.inc.php");
drawTop(MENUOFF);
$sql="select autorId, autorNome, ifnull(num,0) as numLivros from 
06hugo_autores left join 
(
select livroAutorAutorId as autorId, count(*) as num
from 06hugo_livroautores 
group by 1) as t
using(autorId) 
where autorId=".$id;
$res=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($res);
?>





<section>
    <div class="row">

        <div class="col-6 mx-auto">
            <span class="display-4">Elimina autor</span>
            <div class="container-fluid">
                <form action="confirmaApagaAutor.php" method="post">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" disabled value="<?php echo $dados['autorNome'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="descricao">Nº de Livros</label>
                        <input type="text" class="form-control" id="descricao" name="descricao" disabled  value="<?php echo $dados['numLivros']  ?>">
                    </div>
                    <?php
                    if($dados['numLivros']>0) {
                        ?>
                        <span class="text-danger ">Não pode apagar! Autor já com livros. </span><br>
                        <button type="submit" class="btn btn-warning">Cancelar</button>
                        <?php
                    }
                    else{
                        ?> <button type="submit" class="btn btn-danger">Apaga</button>
                        <button type="submit" class="btn btn-warning">Cancelar</button>
                    <?php
                    }
                    ?>
                    <input type="hidden" name="id" value="<?php echo $dados['autorId']?>">
                </form>
            </div>

        </div>
    </div>

</section>





</body>
</html>