
<?php
(empty($_SESSION))?session_start():'';
if(isset($_GET['rtn']) AND isset($_GET['idGroupe'])){
    include_once("../vue.param_access/liste_role.php");
 }else if(isset($_GET['dcxion'])){
   $_SESSION = array();
    session_destroy();
    include_once('../vue.param_access/login.php');
 }
?>