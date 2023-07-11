<?php
if(isset($_GET['idGroupe'])){
    include_once("../vue.param_access/liste_role.php");
 }else if(isset($_GET['VueRl'])){
    include_once('../vue.param_access/role.php');
}else {
    
    echo "Echec du controleur role";
}

?>