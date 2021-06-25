<?php
$id=intval($_GET['id']);
include_once ("includes/body.inc.php");
include_once ("common.php");
drawTop(MENUOFF);
$sql="SELECT
06hugo_livros.livroId,
06hugo_livros.livroTitulo,
06hugo_livros.livroCapaURL,
06hugo_autores.autorId,
06hugo_autores.autorNome,
06hugo_generos.generoId,
06hugo_generos.generoNome,
06hugo_livros.livroSinopse,
06hugo_livros.livroEstado
FROM
06hugo_livros
LEFT JOIN 06hugo_livroautores ON 06hugo_livroautores.livroAutorLivroId = 06hugo_livros.livroId
LEFT JOIN 06hugo_livrogeneros ON 06hugo_livrogeneros.livroGeneroLivroId = 06hugo_livros.livroId
LEFT JOIN 06hugo_autores ON 06hugo_livroautores.livroAutorAutorId = 06hugo_autores.autorId
LEFT JOIN 06hugo_generos ON 06hugo_livrogeneros.livroGeneroGeneroId = 06hugo_generos.generoId
WHERE livroId = ".$id;
$res=mysqli_query($con,$sql);
$dadosUt=mysqli_fetch_array($res);

$sql1 = "SELECT * FROM 06hugo_utilizadores
    inner join 06hugo_requisicoes ON requisicaoUtilizadorId = utilizadorId
    inner join 06hugo_livros on livroId = requisicaoLivroId where livroId=".$id." order by requisicaoDataLeva ASC";

$result1=mysqli_query($con,$sql1);

?>
<script>
    function preview_image(event)
    {
        var reader = new FileReader();
        reader.onload = function()
        {
            var output = document.getElementById('output_image');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
<section>



    <div class="col-6 mx-auto">
        <span class="display-4">Informações do livro</span>
        <div class="container-fluid">
            <form action="confirmaEditaLivro.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="titulo">Titulo</label>
                    <input readonly type="text" class="form-control" id="nome" name="titulo" placeholder="Titulo do Livro" value="<?php echo $dadosUt['livroTitulo'] ?>">
                </div>

                <div class="form-group">

                    <label for="nome">Capa</label>

                    <img id="output_image" src="../<?php echo GLOBALPATH.$dadosUt['livroCapaURL']?>" width="120">

                </div>

                <div class="form-group">
                    <label for="titulo">Autores</label>
                    <input readonly type="text" class="form-control" id="nome" name="titulo" placeholder="Titulo do Livro" value="<?php echo $dadosUt['autorNome'] ?>">
                </div>

                <div class="form-group">
                    <label for="titulo">Géneros</label>
                    <input readonly type="text" class="form-control" id="nome" name="titulo" placeholder="Titulo do Livro" value="<?php echo $dadosUt['generoNome'] ?>">
                </div>

                <div class="form-group">
                    <label for="nome">Sinopse</label>
                    <textarea readonly class="form-control" name="sinopse"><?php echo $dadosUt['livroSinopse'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="nome">Estado</label>
                    <input readonly type="text" class="form-control" id="nome" name="titulo" placeholder="Titulo do Livro" value="<?php echo $dadosUt['livroEstado'] ?>">
                </div>

                <div style="margin-top: 10px">
                    <h4 class="modal-title text-muted " align="left"><strong>Histórico de requisições:</strong></h4>
                    <div class="container-fluid">
                        <?php
                        while($pessoa = mysqli_fetch_array($result1)){

                            $data_inicio = new DateTime($pessoa['requisicaoDataLeva']);
                            $data_fim = new DateTime($pessoa['requisicaoDataTraz']);

                            // Resgata diferença entre as datas
                            $dateInterval = $data_inicio->diff($data_fim);

                            echo"<span class='align-middle -vertical, text-left'><small><strong>".$pessoa['requisicaoDataLeva'];
                            echo "</strong></small> - </span>";
                            if($pessoa){
                                echo"<small><span class='align-middle -vertical, text-left'>".$pessoa['utilizadorNome']."</span></small> ";
                            }
                            if($pessoa['requisicaoDataTraz'] <> null){
                                echo "</small> - </span>";
                                echo"<small><span class='align-middle -vertical, text-left'><strong>Já foi devolvido</strong></span></small>";
                            }else
                                if($dateInterval->days > 30){
                                    echo"<small><span class='align-middle -vertical, text-left, '>".$pessoa['livroTitulo']."</span><span class=' text-danger'> ".$dateInterval->days. ' dias'."</span></small> ";

                                }else
                                    echo"<small><span class='align-middle -vertical, text-left, '>".$pessoa['livroTitulo']."</span><span class=' text-success'> ".$dateInterval->days. ' dias'."</span></small> ";

                            echo"<br>";
                        }
                        ?>
                    </div>
                </div>

                <button type="button" style="margin-top: 20px" onclick="voltaPaginaAtras()" class="btn btn-info">Voltar</button>

            </form>
        </div>

    </div>
    </div>

</section>

<script>
    function voltaPaginaAtras(){
        window.location.href = "livros.php"
    }
</script>
</body>
</html>