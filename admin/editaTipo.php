<?php
$id=intval($_GET['id']);
include_once ("includes/body.inc.php");
drawTop(MENUOFF);
$sql="select * from 06hugo_utilizadortipos where utilizadorTipoId=".$id;
$res=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($res);
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
            <span class="display-4">Edita tipo de utilizador</span>
            <div class="container-fluid">
                <form action="confirmaEditaTipo.php" method="post">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do tipo de utilizador" value="<?php echo $dados['utilizadorTipoNome'] ?>">
                    </div>
                    <div class="form-a">
                        <label for="nome">Tipo</label><br>
                        <input type="radio" id="tipo" name="tipo" value="admin"<?php echo ($dados['utilizadorTipoClassificacao']=='admin'?' checked':'') ?>> Administrador<br>
                        <input type="radio" id="tipo" name="tipo" value="user" <?php echo ($dados['utilizadorTipoClassificacao']=='user'?' checked':'') ?>> Utilizador

                    </div>
                    <button type="submit" class="btn btn-primary">Edita</button>
                    <button type="button" onclick="voltaPaginaAtras()" class="btn btn-danger">cancelar</button>

                    <input type="hidden" name="id" value="<?php echo $dados['utilizadorTipoId']?>">
                </form>
            </div>

        </div>
    </div>

</section>

<script>
    function voltaPaginaAtras(){
        window.location.href = "tipos.php"
    }
</script>



</body>
</html>