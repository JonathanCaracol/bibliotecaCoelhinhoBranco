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
            <span class="display-4">Edita livro</span>
            <div class="container-fluid">
                <form action="confirmaEditaLivro.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="titulo">Titulo</label>
                        <input type="text" class="form-control" id="nome" name="titulo" placeholder="Titulo do Livro" value="<?php echo $dadosUt['livroTitulo'] ?>">
                    </div>

                    <div class="form-group">

                        <label for="nome">Capa</label>

                        <img id="output_image" src="../<?php echo GLOBALPATH.$dadosUt['livroCapaURL']?>" width="120">

                    </div>

                    <div class="custom-file">

                        <input type="file" class="custom-file-input" onchange="preview_image(event)"  name="imagem">

                        <label class="custom-file-label" for="validatedCustomFile">Escolha...</label>

                    </div>
                    <div class="form-group">
                        <label for="titulo">Autores</label>
                        <select class="form-control" name="autor">
                            <option value="-1">Escolha um autor</option>
                            <?php
                            $sql="select * from 06hugo_autores";
                            $res=mysqli_query($con,$sql);
                            while($dados=mysqli_fetch_array($res)){

                                if($dadosUt['autorId']==$dados['autorId']){
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
                    </div>

                    <div class="form-group">
                        <label for="titulo">Géneros</label>
                        <select class="form-control" name="genero">
                            <option value="-1">Escolha um género</option>
                            <?php
                            $sql="select * from 06hugo_generos";
                            $res=mysqli_query($con,$sql);
                            while($dados=mysqli_fetch_array($res)){

                                if($dadosUt['generoId']==$dados['generoId']){
                                ?>
                                    <option selected value="<?php echo $dados['generoId']?>"><?php echo $dados['generoNome']?></option>
                                <?php
                                }
                                else{
                                ?>
                                    <option value="<?php echo $dados['generoId']?>"><?php echo $dados['generoNome']?></option>
                                <?php
                                }
                            }
                            ?>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nome">Sinopse</label>
                        <textarea class="form-control" name="sinopse"><?php echo $dadosUt['livroSinopse'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="nome">Estado</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="tipo" name="estado" value="disponivel"<?php echo ($dadosUt['livroEstado']=='disponivel'?' checked':'') ?>>
                            <label class="form-check-label">Disponível</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="tipo" name="estado" value="requisitado" <?php echo ($dadosUt['livroEstado']=='requisitado'?' checked':'') ?>>
                            <label class="form-check-label">Requisitado</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="tipo" name="estado" value="inactivo" <?php echo ($dadosUt['livroEstado']=='inactivo'?' checked':'') ?>>
                            <label class="form-check-label">Indisponivel</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Edita</button>
                    <button type="button" onclick="voltaPaginaAtras()" class="btn btn-danger">Cancelar</button>

                    <input type="hidden" name="id" value="<?php echo $dadosUt['livroId']?>">
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