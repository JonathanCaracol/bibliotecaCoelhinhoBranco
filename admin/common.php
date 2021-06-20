<?php
define("GLOBALPATH","");

function substrNew($texto,$num){
    $subTxt=substr($texto,0,$num);
    $pos1=0;
    $termina=false;
    do{
        $pos=$pos1;
        $pos1=@strpos($subTxt,' ',$pos+1);
    }while($pos1!==false);
    return(substr($subTxt,0,$pos));
}


function uploadFile($fileSrc, $fileDest)
{


    return move_uploaded_file($fileSrc,$fileDest);
}
?>