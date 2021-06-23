<?php
include_once ("includes/body.inc.php");
drawTop(MENUOFF);
?>





<section>
    <div class="row">

        <div class="col-6 mx-auto">
            <span class="display-4">Novo livro</span>
            <div class="container-fluid">
                <form action="confirmaNovoLivro.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="titulo">Titulo</label>
                        <input type="text" class="form-control" id="nome" name="titulo" placeholder="Titulo do Livro" >
                    </div>
                    <div class="form-group">

                        <label for="nome">Capa</label>
                        <div class="custom-file">

                            <input type="file" class="custom-file-input"  name="imagem">

                            <label class="custom-file-label" for="validatedCustomFile">Escolha...</label>

                        </div>

                    </div>
                    <div class="form-group">
                        <label for="titulo">Autores</label>

                        <select class="form-control" name="autores" list="autoresNome">
                            <option value="-1">Escolha um autor...</option>
                            <datalist id="autoresNome">
                                <?php
                                $sql="select * from 06hugo_autores";
                                $res=mysqli_query($con,$sql);

                                while($dados=mysqli_fetch_array($res)){
                                    echo "<option value=\"".$dados['autorId']."\">".$dados['autorNome']."</option>";
                                }
                                ?>
                            </datalist>
                        </select>
                    </div>




                    <div class="form-group">
                        <label for="titulo">Géneros</label>
                        <select class="form-control" name="generos" list="generoNome">
                            <option value="-1">Escolha um genero...</option>
                        <datalist id="generoNome">
                            <?php
                            $sql="select * from 06hugo_generos";
                            $res=mysqli_query($con,$sql);
                            while($dados=mysqli_fetch_array($res)){
                                echo "<option value=\"".$dados['generoNome']."\">".$dados['generoNome']."</option>";
                            }
                            ?>

                        </datalist>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="nome">Sinopse</label>
                        <textarea class="form-control" name="sinopse"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="nome">Estado</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="tipo" name="estado" value="disponivel" checked>
                            <label class="form-check-label">Disponível</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="tipo" name="estado" value="requisitado">
                            <label class="form-check-label">Requisitado</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="tipo" name="estado" value="inactivo">
                            <label class="form-check-label">Indisponível</label>
                        </div>
                    </div>







                    <button type="submit" class="btn btn-primary">Adiciona</button>
                    <button type="button" onclick="voltaPaginaAtras()" class="btn btn-danger" >Cancelar</button>
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