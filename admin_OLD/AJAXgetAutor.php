<?php header("content-type:text/html;charset=ISO-8859-1")?>
<?php
$con=mysqli_connect("localhost","root","","livros");
$sql="select * from autores";

$result=mysqli_query($con,$sql);
echo '<option value="-1">Escolha...</option>';

while($dados=mysqli_fetch_array($result)){
    echo '<option value="'.$dados['autorId'].'">'.$dados['autorNome'].'</option>';
}


