<?php
if(isset($_GET['contact'])){
     include_once("../vue.param_access/contact.php");
}else{
    Echo 'Ereur Infos [Controleur Contact].';
}
?>