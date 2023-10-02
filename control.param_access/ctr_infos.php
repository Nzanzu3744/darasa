<?php
if(isset($_GET['infos'])){
     include_once("../vue.param_access/infos.php");
}else{
    Echo 'Ereur Infos [Controleur infos].';
}
?>