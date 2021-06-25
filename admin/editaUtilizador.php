<?php
$id=intval($_GET['id']);
include_once ("includes/body.inc.php");
drawTop(MENUOFF);
$sql="select * from 06hugo_utilizadores where utilizadorId=".$id;
$res=mysqli_query($con,$sql);
$dadosUt=mysqli_fetch_array($res);

?>


<style>   input[type=radio] {
        margin-top: 2%;
    }
    div.a{
        font-size: 20px;
    }</style>



<section>
    <a href="index.php" top="12px" class="btn btn-info">Voltar ao menu </a>
    <div class="row">

        <div class="col-6 mx-auto">
            <span class="display-4">Edita utilizador</span>
            <div class="container-fluid">
                <form action="confirmaEditaUtilizador.php" method="post">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do utilizador" value="<?php echo $dadosUt['utilizadorNome'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="nome">Tipo de utilizador</label>
                        <select class="form-control" name="tipo">
                            <?php
                            $sql="select * from 06hugo_utilizadortipos";
                            $res=mysqli_query($con,$sql);
                            while($dados=mysqli_fetch_array($res)){
                                echo '<option value="'.$dados['utilizadorTipoId'].'"'.($dadosUt['utilizadorUtilizadorTipoId']==$dados['utilizadorTipoId']?' selected ':'').'>'.$dados['utilizadorTipoNome'].'</option>';
                            }
                            ?>
                        </select>
                    </div >
                    <div class="a">
                        <label for="categoria">Tipo</label><br>
                        <input type="radio"  id="categoria" name="categoria" value="professor" <?php echo ($dadosUt['utilizadorCategoria']=='professor'?' checked ':'')?> > Professor<br>
                        <input type="radio"  id="categoria" name="categoria" value="funcionario" <?php echo ($dadosUt['utilizadorCategoria']=='funcionario'?' checked ':'')?> > Funcionário<br>
                        <input type="radio"  id="categoria" name="categoria" value="aluno" <?php echo ($dadosUt['utilizadorCategoria']=='aluno'?' checked ':'')?> > Aluno<br>

                    </div>
                    <button type="submit" class="btn btn-primary">Edita</button>
                    <button type="button" onclick="voltaPaginaAtras()" class="btn btn-danger" href="utilizadores.php">cancelar</button>

                    <input type="hidden" name="id" value="<?php echo $dadosUt['utilizadorId']?>">
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