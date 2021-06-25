<?php
$id=intval($_GET['id']);
include_once ("includes/body.inc.php");
drawTop(MENUOFF);
$sql="select * from 06hugo_generos where generoId=".$id;
$res=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($res);
?>





<section>
    <a href="index.php" top="12px" class="btn btn-info">Voltar ao menu </a>
    <div class="row">

        <div class="col-6 mx-auto">
            <span class="display-4">Edita género</span>
            <div class="container-fluid">
                <form action="confirmaEditaGenero.php" method="post">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do género" value="<?php echo $dados['generoNome'] ?>">
                    </div>

                    <button type="submit" class="btn btn-primary">Edita</button>
                    <button type="button" onclick="voltaPaginaAtras()" class="btn btn-danger">cancelar</button>

                    <input type="hidden" name="id" value="<?php echo $dados['generoId']?>">
                </form>
            </div>

        </div>
    </div>

</section>

<script>
    function voltaPaginaAtras(){
        window.location.href = "generos.php"
    }
</script>



</body>
</html>