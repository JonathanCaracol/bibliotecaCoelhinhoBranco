<?php
include_once("common.php");
include_once("admin/includes/body.inc.php");
$id = intval($_POST['livroId']);
$versao = intval($_POST['versao']);
$sql = "select * from 06hugo_livros inner join 06hugo_livroautores on livroId = livroAutorLivroId inner join 06hugo_autores on autorId = livroAutorAutorId inner join 06hugo_livrogeneros on livroId = livroGeneroLivroId inner join 06hugo_generos on generoId = livroGeneroGeneroId where livroId=" . $id;
$res = mysqli_query($con, $sql);
$dados = mysqli_fetch_array($res);
?>

<div class="modal-dialog modal-full-height modal-right" style="overflow-y:" role="document">
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
                            <p><strong>Autor:</strong> <?php echo $dados['autorNome'] ?><br></p>
                            <strong>G�nero:</strong> <?php echo $dados['generoNome'] ?><br></p>
                            <p class="text-right text-<?php echo $dados['livroEstado'] == 'disponivel' ? 'success' : 'danger'; ?>"><?php echo $dados['livroEstado'] ?></p>
                            <strong>Sinopse:</strong><br>
                            <div style="overflow-y: scroll; height:400px;">
                                <p><?php echo $dados['livroSinopse'] ?></p>
                            </div>
                        </h5>
                        <?php
                    } else {
                        ?>
                        <div class="col-8">
                            <div class="form-group">
                                <label for="nome">Utilizador:</label>
                                <input type="text" class="form-control" id="searchNome" list="users">
                                <datalist id="users">
                                    <?php
                                    $query = "SELECT * FROM 06hugo_utilizadores";
                                    $resultado = mysqli_query($con, $query);
                                    while ($users = mysqli_fetch_array($resultado)) {
                                        ?>
                                        <option value="<?php echo $users["utilizadorId"]; ?>"><?php echo $users['utilizadorNome'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </datalist>
                            </div>
                            <div class="row w-100">
                                <div id="resultadosPesquisa" class="w-100">
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