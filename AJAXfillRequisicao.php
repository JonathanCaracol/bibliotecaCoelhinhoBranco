<?php
echo 'teste';
include_once("admin/includes/body.inc.php");$txt = addslashes($_POST['txt']);$sql = "select livroId,livroTitulo from 06hugo_livros where livroTitulo LIKE '%$txt%'";$res = mysqli_query($con, $sql); ?>
<ul class="list-group w-100">    <?php while ($dados = mysqli_fetch_array($res)) {
        $str = str_replace($txt, '<mark>' . $txt . '</mark>', $dados['livroTitulo']);
        echo '<li onclick="fillBook(' . $dados['livroId'] . ')" href="#" class="list-group-item" data-toggle="modal">' . $str . ' </li>';
    } ?></ul>