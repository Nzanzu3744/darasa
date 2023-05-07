<?php
(empty($_SESSION))?session_start():'';

if(isset($_GET['lgdfds']) AND isset($_GET['ps'])){

    include_once("../model.param_access/param_connexion.php");
    include_once("../model.param_access/param_utilisateur.class.php");
    include_once("../model.param_access/org_affectation.class.php");

    $log = htmlspecialchars($_GET['lgdfds']);
    $pwd = htmlspecialchars($_GET['ps']);
    //UTILISATEUR IDENTIFIANTS
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

    //LISTE DES ROLE DE L'UTILISATEUR
    include_once('../model.param_access/param_role.class.php');
    $monRole = new param_role();
    $monRole = $monRole->selectionnerDerRoleUti($sel_Ut['idUtilisateur'])->fetch();
    //COMME ON A ID DU GROUPE ON PEUT DIRECTEMENT PRENDRES SES DIFFERENTES PERMISSIONS 
    include_once('../model.param_access/param_permission.class.php');
     $mesPerm = new param_permission();
     $mesPerm = $mesPerm->selectionnerByIdGroupe($monRole['idGroupe']);
     foreach($mesPerm as $selPerm){
        $_SESSION[$selPerm['nomTable'].'_afficher']=$selPerm['afficher'];
        $_SESSION[$selPerm['nomTable'].'_ajouter']=$selPerm['ajouter'];
        $_SESSION[$selPerm['nomTable'].'_modifier']=$selPerm['modifier'];
        $_SESSION[$selPerm['nomTable'].'_supprimer']=$selPerm['supprimer'];
     }
    // AFFICHAGE
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