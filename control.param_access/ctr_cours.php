<?php
if(isset($_GET['VueClasseAff'])){
    include("../vue.param_access/cours.php");

 }else if(isset($_GET['VueClasseIns'])){ 
    include("../vue.param_access/cours_Elve.php");

 }else if(isset($_GET['VueClasseDir'])){ 
    include("../vue.param_access/cours_directeur.php");

 }else if(isset($_GET['VueCoursEleve'])){ 
    include("../vue.param_access/cours_eleve_cls.php");

 }else if(isset($_GET['VueCoursDirecteur'])){ 
    include("../vue.param_access/cours_directeur_cls.php");

 }else if(isset($_GET['courssgauche'])){ 
    include("../vue.param_access/form_cours.php");

 }else if(isset($_GET['VueCours']) AND isset($_GET['idClasse']) AND isset($_GET['idAnneeSco'])){ 
    include("../vue.param_access/cours_ense_cls.php");
    
 }else if(isset($_GET['VueCours_dir']) AND isset($_GET['idClasse']) AND isset($_GET['idAnneeSco'])){ 
    include("../vue.param_access/cours_directeur_cls.php");
    
 }else if(isset($_GET['rtn']) AND isset($_GET['idGroupe'])){
    include_once("../vue.param_access/liste_role.php");

 }else if(isset($_GET['ajouterC']) AND isset($_GET['idClasse'])){
   (empty($_SESSION))?session_start():'';
    include_once('../model.param_access/crs_cours.class.php');
    include_once('../model.param_access/org_anneesco.class.php');
    include_once('../model.param_access/org_affectation.class.php');
   $affect = NEW org_affectation();
   $affect=$affect->rechercherByUtiCls($_SESSION['idUtilisateur'],$_GET['idClasse'])->fetch();


    $sel_A=new org_anneesco();
    $sel_A=$sel_A->selectionnerDerAn()->fetch();
     $crs=new crs_cours();
        if($crs->ajouter($affect['idAffectation'],$sel_A['idAnneeSco'],$_GET['nomC'],"../images/imgFR.png", $_GET['CmtC'])){
           include("../vue.param_access/cours_ense_cls.php");
        }else{
          echo "ECHEC D'ENREGISTREMENT COURS <><><MODEL><><><";
        }
    
 }else if($_GET['supCrs'] AND $_GET['supCrs']==true ){
   include_once('../model.param_access/crs_cours.class.php');
   $crs=new crs_cours();
   $crs->supprimer($_GET['idCrs']);
   switch ($_GET['fct']) {
      case 'dir':
      include("../vue.param_access/cours_directeur_cls.php");
      break;
      default:
         include("../vue.param_access/cours_ense_cls.php");
   }
   
 }else{
   echo "ECHEC LISTE CLASSE OU COURS PAR ENSEIGNANT";
}

?>

