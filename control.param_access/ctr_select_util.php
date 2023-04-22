<?php
if(isset($_GET['classeChk'])){
    $table=array();
    if(!isset($_COOKIE['classeSel'])){    
        $table=array($_GET['idClasse']);
        $tbjsonC=json_encode($table);
        setcookie('classeSel',$tbjsonC, (time()+360*10));
    }else{
        $table = json_decode($_COOKIE['classeSel']);
        array_push($table,$_GET['idClasse']);
        $tbjsonC=json_encode($table);
        setcookie('classeSel',$tbjsonC, (time()+360*10));
    }
}else{
    echo "ECHEC SELCTION <><><crt_selct_util.php";
}
?>