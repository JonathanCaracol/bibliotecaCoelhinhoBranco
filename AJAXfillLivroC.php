<?php


include_once("../common.php");


include_once("admin/includes/body.inc.php");


$id = intval($_POST['livroId']);


$versao = intval($_POST['versao']);


$sql = "select * from 06hugo_livros inner join 06hugo_livroautores on livroId = livroAutorLivroId inner join 06hugo_autores on autorId = livroAutorAutorId inner join 06hugo_livrogeneros on livroId = livroGeneroLivroId inner join 06hugo_generos on generoId = livroGeneroGeneroId where livroId=" . $id;


$res = mysqli_query($con, $sql);


$dados = mysqli_fetch_array($res);


?>


<!-- Add class .modal-full-height and then add class .modal-right (or other classes from list above) to set a position to the modal -->


<div class="modal-dialog modal-full-height modal-right" style="overflow-y:" role="document">


    <div class="modal-content">


        <div class="modal-header">

            <h4 class="modal-title w-100" id="myModalLabel"><?php echo $dados['livroTitulo'] ?></h4>


            <button type="button" class="close" data-dismiss="modal" aria-label="Close">


                <span aria-hidden="true">&times;</span>


            </button>


        </div>


        <div class="modal-body">


            <div class="row">


                <div class="col-4">


                    <img class="card-img-top" src="<?php echo GLOBALPATH . $dados['livroCapaURL'] ?>" alt="">


                </div>


                <div class="col-8">


                    <?php if ($versao == 1) { ?>


                        <h5 class="card-body">


                            <p><strong>Autor:</strong> <?php echo $dados['autorNome'] ?><br></p>


                            <strong>Género:</strong> <?php echo $dados['generoNome'] ?><br></p>


                            <p class="text-right text-<?php echo $dados['livroEstado'] == 'disponivel' ? 'success' : 'danger'; ?>"><?php echo $dados['livroEstado'] ?></p>


                            <strong>Sinopse:</strong><br>


                            <p><?php echo $dados['livroSinopse'] ?></p>


                        </h5>


                    <?php } else {


                        ?>


                        <div class="col-8">


                            <div class="form-group row mt-2">


                                <br><label for="nome" class="col-2 col-form-label">Nome:</label>


                                <div class="col-10">


                                    <input type="text" class="form-control" id="searchNome"<?php echo $dados['utilizadorNome'] ?>>


                                </div>


                                <br><br>


                            </div>


                            <div class="row w-100">


                                <div id="resultados" class="w-100">


                                </div>


                            </div>


                        </div>


                        <?


                    }


                    ?>


                </div>


            </div>


        </div>


        <div class="modal-footer justify-content-right">


            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>

<?php
    if($dados['livroEstado'] == 'disponivel') {
        ?>
        <a onclick="confirmaRequisitaLivro(<?php echo $dados['livroId'] ?>)" type="button"  class="btn btn-outline-success" data-toggle="modal" data-dismiss="modal" data-target="#requisitaModal">Requisitar</a>
        <?php
    }
            ?>

        </div>


    </div>


</div>



