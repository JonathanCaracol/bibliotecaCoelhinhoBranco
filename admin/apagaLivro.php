<?php
$id=intval($_GET['id']);
include_once ("includes/body.inc.php");
drawTop(MENUOFF);
$sql="select livroId, livroTitulo, ifnull(num,0) as numLivros from 
06hugo_livros left join 
(
select requisicaoLivroId as livroId, count(*) as num
from 06hugo_requisicoes
group by 1) as t
using(livroId) 
where livroId=".$id;

$res=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($res);
?>





<section>
    <div class="row">

        <div class="col-6 mx-auto">
            <span class="display-4">Elimina livro</span>
            <div class="container-fluid">
                <form action="confirmaApagaLivro.php" method="post">
                    <div class="form-group">
                        <label for="nome">titulo</label>
                        <input type="text" class="form-control" id="nome" name="nome" disabled value="<?php echo $dados['livroTitulo'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="descricao">Nº de Livros</label>
                        <input type="text" class="form-control" id="descricao" name="descricao" disabled  value="<?php echo $dados['numLivros']  ?>">
                    </div>
                    <?php
                    if($dados['numLivros']>0) {
                        ?>
                        <span class="text-danger ">No pode apagar! Autor já com livros. </span><br>
                        <button type="submit" class="btn btn-warning">Cancelar</button>
                        <?php
                    }
                    else{
                        ?> <button type="submit" class="btn btn-danger">Apaga</button> 

                    <?php
                    }
                    ?>
                    <input type="hidden" name="id" value="<?php echo $dados['livroId']?>">
                </form>
            </div>

        </div>
    </div>

</section>





</body>
</html>