<?php
if(isset($_GET['AfficheAnnee'])){
    include_once("../vue.param_access/anneesco.php");
 }else if(isset($_GET['AjouteAnnee'])){
   
   echo "En cours de developement";

 }else{
 echo 'ECHEC ANNEE';
 }
?>