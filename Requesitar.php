<?php
$con=mysqli_connect("localhost", "root","","paphugo");
$sql="select * from Titulos";
$result=mysqli_query($con,$sql);
?>


<table width="100%" oellpadding="3" oellspacing="3">
    <input type="button" value="Voltar ao Menu" onclick="javascript: location.href='index.php';" />

    <br>
    <br>
    <br>

    <h1>Requisitar livros</h1>

    <input type="button" value="Voltar ao Menu" onclick="javascript: location.href='index.php';" />
    <form   name="f1" action="confirmaRequesitar.php" method="post">
        <br>
        <br>
        <strong>Titulo</strong>
        <input type="text"  name="Titulo">
        <strong>Autor</strong>
        <input type="text"  name="Autor">
        <strong>Ano</strong>
        <input type="text"  name="Ano">

        <input type="submit"  value="confirma">

