<?php
include_once ("includes/body.inc.php");
drawTop(MENUOFF);
?>





<section>
    <div class="row">

        <div class="col-6 mx-auto">
            <span class="display-4">Novo autor</span>
            <div class="container-fluid">
                <form action="confirmaNovoAutor.php" method="post">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do autor">
                    </div>

                    <button type="submit" class="btn btn-primary">Adiciona</button>
                    <button type="button" onclick="voltaPaginaAtras()" class="btn btn-danger">cancelar</button>
                </form>
            </div>

        </div>
    </div>

</section>
<script>
    function voltaPaginaAtras(){
        window.location.href = "autores.php"
    }
</script>




</body>
</html>