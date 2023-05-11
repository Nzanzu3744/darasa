
<?php
(empty($_SESSION))?session_start():'';
if(isset($_GET['rtn']) AND isset($_GET['idGroupe'])){
    include_once("../vue.param_access/liste_role.php");
 }else if(isset($_GET['dcxion'])){
   $_SESSION = array();
    session_destroy();
    include_once('../vue.param_access/login.php');
 }else if(isset($_GET['modifGroupe'])){
   include_once('../model.param_access/param_role.class.php');
   $role = new param_role();
   if(($role->desactiverPrec($_GET['idUtilisateur']))==true){
     
     $role->ajouter($_GET['idGroupe'],$_GET['idUtilisateur']);
      include_once("../vue.param_access/liste_role.php");
   }else{
      echo 'echec desactivation role pre';
   }
 }else{
   echo 'ECHEC MEMBRE';
 }
?>