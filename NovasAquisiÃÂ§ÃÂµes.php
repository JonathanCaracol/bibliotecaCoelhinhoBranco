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
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
    <tr>
        <th>Titulo</th>
        <th>Ano</th>
        <th>Autor</th>

    </tr>
    <?php
    while ($dados=mysqli_fetch_array($result)){
        ?>
        <tr>
            <td align="center"><?php echo $dados['TituloId']?></td>
            <td align="center"><?php echo $dados['AnoId']?></td>
            <td align="center"><?php echo $dados['AutorId']?></td>




        </tr>

        <?php
    }
    ?>
</table>
