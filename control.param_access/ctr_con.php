<?php
session_start();

if(isset($_GET['lgdfds']) AND isset($_GET['ps'])){

    include_once("../model.param_access/param_connexion.php");
    include_once("../model.param_access/param_utilisateur.class.php");
    include_once("../model.param_access/org_affectation.class.php");

    $log = htmlspecialchars($_GET['lgdfds']);
    $pwd = htmlspecialchars($_GET['ps']);
    $util= new param_utilisateur();
    $sel_Ut = $util->log($log,$pwd);
     if($sel_Ut==true){
    $_SESSION['idUtilisateur']=$sel_Ut['idUtilisateur'];
    $_SESSION['nom']=$sel_Ut['nomUtilisateur'];
    $_SESSION['postnom']=$sel_Ut['postnomUtilisateur'];
    $_SESSION['prenom']=$sel_Ut['prenomUtilisateur'];
    $_SESSION['photoUtilisateur']=$sel_Ut['photoUtilisateur'];
    $_SESSION['mailUtilisateur']=$sel_Ut['mailUtilisateur'];
   
    $_SESSION['actif']=$sel_Ut['actif'];

    $sel_Ut= new org_affectation();
    $sel_Ut=$sel_Ut->rechercherByUti(6);
    $tbAff= array();
    foreach($sel_Ut as $selU){
        array_push($tbAff,$selU['idAffectation']);
    }

    $_SESSION['affectation']=$tbAff;

    include_once('../vue.param_access/acceuille.php');
     }else{ 
    ECHO "<center class='col-sm-12 well' style='font-size: 20px; color:red; margin-top:10%'><b>ECHEC DE CONNEXION LOGIN OU MOT CLE INCORRECT</b>
    </center><center class='col-sm-12'>
    </center>";
    }
}else{
     ECHO "<center class='col-sm-12 well' style='font-size: 20px; color:red; margin-top:10%'><b>REMPLISSEZ LES CHAMP SVP</b>
    </center><center class='col-sm-12'>
    </center>";
}
?>