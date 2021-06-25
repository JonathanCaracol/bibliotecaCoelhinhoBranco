<?php
include_once ("includes/body.inc.php");
include_once ("common.php");
$id=intval(($_GET['id']));
drawTop(MENUOFF);
$sql="select * from 06hugo_utilizadores inner join 06hugo_utilizadortipos on utilizadorUtilizadorTipoId = utilizadorTipoId where utilizadorId=".$id;
$res=mysqli_query($con,$sql);
$dadosUt=mysqli_fetch_array($res);

$sql1 = "SELECT * FROM 06hugo_utilizadores
    inner join 06hugo_requisicoes ON requisicaoUtilizadorId = utilizadorId
    inner join 06hugo_livros on livroId = requisicaoLivroId where utilizadorId=".$id." order by requisicaoDataLeva ASC";

$result1=mysqli_query($con,$sql1 );

?>


<style>   input[type=radio] {
        margin-top: 2%;
    }
    div.a{
        font-size: 20px;
    }</style>



<section>
    <div class="row">

        <div class="col-6 mx-auto">
            <span class="display-4">Informação do utilizador</span>
            <div class="container-fluid">
                <form action="confirmaEditaUtilizador.php" method="post">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input readonly type="text" class="form-control" id="nome" name="nome" placeholder="Nome do utilizador" value="<?php echo $dadosUt['utilizadorNome'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="nome">Tipo de utilizador</label>
                        <input readonly type="text" class="form-control" id="nome" name="nome" placeholder="Nome do utilizador" value="<?php echo $dadosUt['utilizadorTipoNome'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="nome">Categoria de utilizador</label>
                        <input readonly type="text" class="form-control" id="nome" name="nome" placeholder="Nome do utilizador" value="<?php echo $dadosUt['utilizadorCategoria'] ?>">
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
                                    echo"<small><span class='align-middle -vertical, text-left'>".$pessoa['livroTitulo']."</span></small> ";
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
                    <button type="button" style="margin-top: 20px" onclick="voltaPaginaAtras()" class="btn btn-info" href="utilizadores.php">Voltar</button>
                </form>
            </div>

        </div>
    </div>

</section>

<script>
    function voltaPaginaAtras(){
        window.location.href = "utilizadores.php"
    }
</script>


</body>
</html>
