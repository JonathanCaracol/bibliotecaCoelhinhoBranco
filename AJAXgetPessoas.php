<?php header("content-type:text/html;charset=ISO-8859-1")?>
<?php

if(isset($_POST['pais']))
    $pais=intval($_POST['pais']);
else
    $pais=0;

if(isset($_POST['search']))
   echo $padrao=urldecode($_POST['search']);
else
    $padrao="";

$con=mysqli_connect("localhost","root","","dml21");
$sql="select * from paises  inner join pessoas on paisId=pessoaPaisId";
$sql.=" where pessoaNome Like '%".$padrao."%' ";
if($_POST['pais']!=-1)
 $sql.=" and paisId =".$pais;

$result=mysqli_query($con,$sql);

echo '<span class="label label-info">'.mysqli_affected_rows($con).'</span>';

echo '<table class="table table-striped table-hover" id="tblPeople">';
echo '<tr><th>Id</th><th>Nome</th><th>Pais</th><th width="5%"></th></tr>';
while($dados=mysqli_fetch_array($result)){

    echo '<tr>';
    echo '<td>'.$dados['pessoaId'].'</td>';
    echo '<td>'.$dados['pessoaNome'].'</td>';
    echo '<td>'.$dados['paisNome'].'</td>';
    echo "<td style=\"white-space:nowrap\"><button onclick=\"fillEdita(".$dados['pessoaId'].")\" type=\"button\" class=\"btn btn-primary btn-sm\" data-toggle=\"modal\" data-target=\"#modalEdita\">Editar</button> ";
    echo "<button onclick=\"fillForm(".$dados['pessoaId'].",'".$dados['pessoaNome']."')\" type=\"button\" class=\"btn btn-danger btn-sm\" data-toggle=\"modal\" data-target=\"#modalElimina\">Eliminar</button></td>";    echo '</tr>';
}
echo '</table>';
?>

