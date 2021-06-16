<?php
include_once ("includes/body.inc.php");
drawTop(MENUOFF);
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
            <span class="display-4">Novo tipo de utilizador</span>
            <div class="container-fluid">
                <form action="confirmaNovoTipo.php" method="post">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do tipo">
                    </div >
                    <div class="a">

                      <input  type="radio"  id="tipo" name="tipo" value="admin">  Administrador<br>

                        <input type="radio"  id="tipo" name="tipo" value="user" checked> Utilizador

                    </div>



                        <button type="submit" class="btn btn-primary" style="margin-top: 5%">Adiciona</button>
                    <button type="button" onclick="voltaPaginaAtras()" class="btn btn-danger" name="cancel" value="cancel" style="margin-top: 5%">cancelar</button>
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