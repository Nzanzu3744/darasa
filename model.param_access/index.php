<?php
   // header('Content-Type: application/json');
   include_once("param_connexion.php");
   include_once("crs_annexecours.class.php"); 
    
    $MonObjet = new crs_annexecours();
    $resultat = array();
    $liste = $MonObjet->rechercher(3);;
       
   foreach($liste as $sel){
      $resultat[] = $sel;
   }
   
echo json_encode($resultat);
?>