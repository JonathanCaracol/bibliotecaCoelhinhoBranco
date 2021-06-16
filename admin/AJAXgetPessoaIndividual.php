<?php header("content-type:text/html;charset=ISO-8859-1")?>
<?php
$idPessoa=intval($_POST['pessoaId']);

$con=mysqli_connect("localhost","root","","livros");
$sql="select * from livros where livrosId=".$idLivros;
$result=mysqli_query($con,$sql);
$dados= mysqli_fetch_array($result);
?>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        <div class="modal-body">

            <div class="form-group">
                <form>
                    <input type='file' onchange="readURL(this);" />
                    <img id="blah" src="http://placehold.it/180" alt="your image" />

                </form>
                <form action = "" method = "get">
                <label for="novoNome">Titulo</label>
                <input type="text" class="form-control" id="novoNome" value="<?php echo $dados['tituloNome']?>" >
                <input type="hidden" class="form-control" id="idPessoa" value="<?php echo $dados['tituloId']?>" ><br>
                <label for="novoNome">Autor</label>
                <input type="text" class="form-control" id="novoAutorNome" value="<?php echo $dados['autorNome']?>" >
                <input type="hidden" class="form-control" id="idAutor" value="<?php echo $dados['autorId']?>"
                <label for="novoNome">Genero</label>
                <input type="text" class="form-control" id="novoGeneroNome" value="<?php echo $dados['generoNome']?>" >
                <input type="hidden" class="form-control" id="idGenero" value="<?php echo $dados['generoId']?>" >
            </div>

            <div class="form-group">
                <label for="novoPais">Ano</label>
                <select class="form-control" id="novoPais">
                    <?php

                    $sql="select * from paises";

                    $result=mysqli_query($con,$sql);

                    while($dadosP=mysqli_fetch_array($result)){
                        echo '<option ';
                        if($dados['pessoaPaisId']==$dadosP['paisId']) echo ' selected ';
                        echo 'value="'.$dadosP['paisId'].'">'.$dadosP['paisNome'].'</option>';
                    }
                    ?>
                </select>
            </div>


            <div class="form-group">
                <label for="novoPais">Genero</label>
                <select class="form-control" id="novoPais">
                    <?php

                    $sql="select * from generos";

                    $result=mysqli_query($con,$sql);

                    while($dadosP=mysqli_fetch_array($result)){
                        echo '<option ';
                        if($dados['pessoaPaisId']==$dadosP['paisId']) echo ' selected ';
                        echo 'value="'.$dadosP['paisId'].'">'.$dadosP['paisNome'].'</option>';
                    }
                    ?>
                </select>
            </div>




        </div>

        <div class="modal-footer">
            <button  id="edita" onclick="atualiza()" type="button" class="btn btn-danger" data-dismiss="modal">Confirmar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
    </div>
</div>

