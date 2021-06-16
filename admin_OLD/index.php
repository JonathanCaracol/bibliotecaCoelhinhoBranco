<?php header("content-type:text/html; charset=ISO-8859-1")?>
<?php
include_once ('includes/body.inc.php')

?>


<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Teste</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <style>
        p.ex1 {
            margin-right: 10px;
        }
    </style>

    <script>
        var idPessoa;

        function fillForm(id,nome){
            idPessoa=id;

            $('#nomePessoa').html(nome)
        }

        function fillEdita(id) {
            $.ajax({
                url: "AJAXgetPessoaIndividual.php",
                type: "post",
                data:{
                    pessoaId:id,
                },
                success: function (response) {
                    $('#modalEdita').html(response);
                }
            });

        }

        function fillSelect()
        {
            $.ajax({
                url: "AJAXgetAutor.php",
                type: "post",
                success: function (response) {
                    $('#pais').html(response);
                }
            });
        }

        function fillTable(txt, paisId){
            $.ajax({
                url: "AJAXgetPessoas.php",
                type: "post",
                data: {
                    autor:idPessoa,
                    search:txt,
                    pais:paisId,
                } ,
                success: function (response) {
                    $('#tblPeople').html(response);
                }

            });
        }
        function atualiza(){
            $.ajax({
                url: "AJAXatualiza.php",
                type: "post",
                data: {
                    id:$('#idPessoa').val(),
                    nome:escape($('#novoNome').val()),
                    dn:$('#novaDn').val(),
                    pais:$('#novoPais').val(),
                } ,
                success: function (response) {
                    fillTable(escape($('#search').val()),$('#pais').val());
                }

            });
        }function delPessoa()
        {
            $.ajax({
                url: "AJAXdelPessoaIndividual.php",
                type: "post",
                data: {
                    pessoaId:idPessoa,
                },
                    success: function(response){
                      fillTable(escape($('#search').val()),$('#pais').val());
}
            });
        }

        function getPessoa()
        {
            $.ajax({
                url: "AJAXgetPessoaIndividual.php",
                type: "post",
                data: {
                    pessoaId:idPessoa,
                },
                success: function(response){
                    fillTable(escape($('#search').val()),$('#pais').val());
                }
            });
        }
        function getPessoaIndividual()
        {
            $.ajax({
                url: "AJAXgetPessoaIndividual.php",
                type: "post",
                data: {
                    pessoaId:idPessoa,
                },
                success: function(response){
                    fillTable(escape($('#search').val()),$('#pais').val());
                }
            });
        }

        $('document').ready(function () {
            $('#search').keyup(function (e) {
                fillTable(escape($('#search').val()),$('#pais').val());
            });
            $('#pais').change(function (e) {
                fillTable(escape($('#search').val()),$('#pais').val());
            });
            $('#delete').click(function(e) {
                delPessoa();
            });


            fillTable("",-1);
            fillSelect();
        });


    </script>
</head>
<body>
<h1>BackOffice</h1>
<form action="AJAXgetPessoas.php" method="post">
    <label>  Procura</label><br>
     Livro: <input type="text" name="search" id="search">
   Autor:  <select name="pais" id="pais">


    </select>

    <button  id="novo" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEdita">adicionar</button>
</form>
    <table class="table table-striped table-hover" id="tblPeople">

    </table>
<div id="modalElimina" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Elimina</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Deseja eliminar '<span id="nomePessoa"></span>' </p>
            </div>
            <div class="modal-footer">
                <button  id="delete"type="button" class="btn btn-danger" data-dismiss="modal">Confirmar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div id="modalEdita" class="modal" tabindex="-1" role="dialog">
</div>



</body>

</html>