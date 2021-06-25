<?php
include_once ("includes/body.inc.php");
include_once ("common.php");
$id=intval(($_GET['id']));
drawTop(MENUOFF);
$sql="select * from 06hugo_utilizadores inner join 06hugo_utilizadortipos on utilizadorUtilizadorTipoId = utilizadorTipoId where utilizadorId=".$id;
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
                    <button type="button" onclick="voltaPaginaAtras()" class="btn btn-info" href="utilizadores.php">Voltar</button>
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
