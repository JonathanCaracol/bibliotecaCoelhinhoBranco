<?php
include_once ("includes/body.inc.php");
drawTop(MENUOFF,AUTORES2);
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
                    <!--
                    <div class="form-group">
                        <label for="titulo">Autores</label>

                        <input type="text" class="form-control" name="autores" list="autoresNome">

                            <datalist id="autoresNome">
                                <?php
                                //   $sql="select * from 06hugo_autores";
                                //  $res=mysqli_query($con,$sql);
                                //  while($dados=mysqli_fetch_array($res)){
                                //      echo "<option value=\"".$dados['autorId']."\">".$dados['autorNome']."</option>";
                                //  }
                                ?>
                            </datalist>
                        </input>
                    </div>
                    -->
                    <div class="form-group">
                        <label for="titulo">Autores</label>
                        <div class="form-row">
                            <div class="col-5">
                                <input id="search" class="form-control" placeholder="Pesquisa" >

                            </div>
                            <div class="col-7" id="tableContent">

                            </div>
                        </div>

                    </div>


                    <div class="form-group">
                        <label for="titulo">G??neros</label>
                        <select class="form-control" name="generos" list="generoNome">
                            <option value="-1">Escolha um genero...</option>
                        <datalist id="generoNome">
                            <?php
                            $sql1="select * from 06hugo_generos";
                            $res1=mysqli_query($con,$sql1);
                            while($dados1=mysqli_fetch_array($res1)){
                                echo "<option value=\"".$dados1['generoId']."\">".$dados1['generoNome']."</option>";
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
                            <label class="form-check-label">Dispon??vel</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="tipo" name="estado" value="requisitado">
                            <label class="form-check-label">Requisitado</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="tipo" name="estado" value="inactivo">
                            <label class="form-check-label">Indispon??vel</label>
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