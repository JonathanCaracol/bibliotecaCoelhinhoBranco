<?php header("content-type:text/html;charset=ISO-8859-1")?>
<?php

if(isset($_POST['autores']))
    $autores=intval($_POST['autores']);
else
    $autores=0;

if(isset($_POST['search']))
   echo $padrao=urldecode($_POST['search']);
else
    $padrao="";

$con=mysqli_connect("localhost","root","","livros");
$sql="select * from autores  inner join livos on autorId=livrosAutorId";
$sql.=" where livroNome Like '%".$padrao."%' ";
if($_POST['autor']!=-1)
 $sql.=" and autorId =".$autores;

$result=mysqli_query($con,$sql);

echo '<span class="label label-info">'.mysqli_affected_rows($con).'</span>';

echo '<table class="table table-striped table-hover" id="tblPeople">';
echo '<tr><th>Id</th><th>Titulo</th><th>Autor</th><th>Genero</th><th width="5%"></th></tr>';
while($dados=mysqli_fetch_array($result)){
    echo '<tr>';
    echo '<td>'.$dados['tituloId'].'</td>';
    echo '<td>'.$dados['tituloNome'].'</td>';
    echo '<td>'.$dados['autorNome'].'</td>';
    echo '<td>'.$dados['generoNome'].'</td>';

    echo "<td style=\"white-space:nowrap\"><button onclick=\"fillEdita(".$dados['tituloId'].")\" type=\"button\" class=\"btn btn-primary btn-sm\" data-toggle=\"modal\" data-target=\"#modalEdita\">Editar</button> ";
    echo "<button onclick=\"fillForm(".$dados['tituloId'].",'".$dados['tituloNome']."')\" type=\"button\" class=\"btn btn-danger btn-sm\" data-toggle=\"modal\" data-target=\"#modalElimina\">Eliminar</button></td>";
    echo '</tr>';
}
echo '</table>';
?>