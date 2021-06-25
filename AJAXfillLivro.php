<?php
include_once("common.php");
include_once("admin/includes/body.inc.php");
$id = intval($_POST['livroId']);
$versao = intval($_POST['versao']);
$sql = "select * from 06hugo_livros inner join 06hugo_livroautores on livroId = livroAutorLivroId inner join 06hugo_autores on autorId = livroAutorAutorId inner join 06hugo_livrogeneros on livroId = livroGeneroLivroId inner join 06hugo_generos on generoId = livroGeneroGeneroId where livroId=" . $id;
$res = mysqli_query($con, $sql);
$dados = mysqli_fetch_array($res);
?>

<div class="modal-dialog modal-full-height modal-right" id="modalRequisitarESTE" style="overflow-y:" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title w-100"><?php echo $dados['livroTitulo'] ?></h4>
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
                            <p><strong>Numero:</strong> <?php echo $dados['livroNumero'] ?><br></p>
                            <p><strong>Autor:</strong> <?php
                                echo $dados['autorNome'];
                                while ($dados2=mysqli_fetch_array($res)){
                                    echo ', '.$dados2['autorNome'];
                                }


                                ?><br></p>

                            <strong>Género:</strong> <?php echo $dados['generoNome'] ?><br></p>
                            <p class="text-right text-<?php echo $dados['livroEstado'] == 'disponivel' ? 'success' : 'danger'; ?>"><?php echo $dados['livroEstado'] ?></p>
                            <strong>Sinopse:</strong><br>
                            <div style="overflow-y: scroll; height:400px;">
                                <p><?php echo $dados['livroSinopse'] ?></p>
                            </div>
                        </h5>
                        <?php
                    } else {
                        ?>
                        <div class="col-12 ">
                            <div class="form-group">
                                <!-- preencher com os utilizadores *************************  -->
                                <!--<select id="aa">
                                    <option value="-1">Escolha o Utilizador</option>
                                    <?php
                                    $sql = "select * from 06hugo_utilizadores order by utilizadorNome";
                                    $resultUtilizadores = mysqli_query($con, $sql);
                                    while ($dadosUtilizadores = mysqli_fetch_array($resultUtilizadores)) {
                                        ?>
                                        <option value="<?php echo $dadosUtilizadores ['utilizadorId'] ?>">
                                            <?php echo $dadosUtilizadores ['utilizadorNome'] ?>
                                        </option>
                                        <?php
                                    }
                                    ?>

                                </select>-->


                                <!-- ********************************************************* -->
                                <label for="nome">Utilizador:</label>
                                <input type="text" class="form-control" id="searchNome" list="users">
                                <input type="hidden" id="idUser">
                                <datalist id="users">
                                    <?php
                                    $query = "SELECT * FROM 06hugo_utilizadores";
                                    $resultado = mysqli_query($con, $query);
                                    while ($users = mysqli_fetch_array($resultado)) {
                                        ?>
                                        <option value="<?php echo $users["utilizadorId"]; ?>"><?php echo $users["utilizadorId"].' - '.$users['utilizadorNome'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </datalist>
                            </div>
                            <div class="row ">
                                <div class="col-12" id="resultadosPesquisa" >
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-right">
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
            <?php
            if ($dados['livroEstado'] == 'disponivel') {
                ?>
                <button onclick="requisitaLivro(<?php echo $dados['livroId'] ?>)" type="button" class="btn btn-outline-success">Requisitar</button>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<!--<script>

    $('#aa').on('change', function (e) {
        id=this.value;
        mostraRequisitados(id);

    });
</script>-->
<script>
    $("#searchNome").on('input', function () {
        var val = this.value;
        if($('#users option').filter(function(){
            return this.value.toUpperCase() === val.toUpperCase();
        }).length) {
            mostraRequisitados(val);
            $.ajax({
                url: "AJAXGetName.php",
                type: "post",
                data: {
                    id: val
                },
                success: function (result) {
                    $("#searchNome").val(result);
                    $("#idUser").val(val);
                }
            });

            /*  var id=this.value;
              $.ajax({
                  url: "AJAXGetNameBook.php",
                  type: "post",
                  data: {
                      id: id
                  },
                  success: function (result) {
                      $("#livroRequisitar").val(result);
                      $("#idLivro").val(id);

                  }
              });

             */
        }
    });
</script>

