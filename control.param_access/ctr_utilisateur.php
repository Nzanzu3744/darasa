<script src="../vue.param_access/script.js"></script>
<?php
    if(isset($_GET['formUt'])){
      include_once("../vue.param_access/form_utilisateur.php");

   }else if(isset($_GET['ajouterU'])){

    if(isset($_GET['nom']) AND !empty($_GET['nom']) AND  isset($_GET['postnom']) AND !empty($_GET['postnom']) AND isset($_GET['prenom']) AND isset($_GET['mail']) ){

        $phot="../images/img1.png";
        include_once('../model.param_access/param_utilisateur.class.php');
        $util=new param_utilisateur();
        if($util->ajouter($_GET['nom'],$_GET['postnom'],$_GET['prenom'],$_GET['mail'],$phot,$_GET['photo'])){
            $util->selectionnerDsc();
            $util->getidutilisateur();
            include_once('../model.param_access/param_role.class.php');
            $role=new param_role(); 
            if($role->ajouter($_GET['groupe1'],$util->getidutilisateur())){
                 include_once("../vue.param_access/form_utilisateur.php");
            }else{
              include_once("../vue.param_access/form_utilisateur.php");
            }
        }else{
          include_once("../vue.param_access/form_utilisateur.php");
        }
    }else {
       echo "Echec cote Utilisateur<><><><><><><crt_utl...><>>><><>";
    }
    
}else {
    echo "Echec controleur utilisateur";
  }
?>