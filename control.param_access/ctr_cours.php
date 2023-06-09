<?php
if(isset($_GET['annul'])){
    setcookie('classeSel',"", (time()-1));
    include("../vue.param_access/profil_Eleve.php");

}else if(isset($_GET['Valide'])){
    
    if(isset($_COOKIE['classeSel'])){
        $tbIns=array();
        $tbIns=json_decode($_COOKIE['classeSel']);
        include_once("../model.param_access/param_connexion.php");
        include_once("../model.param_access/org_inscription.class.php");
        include_once("../model.param_access/org_anneesco.class.php");
        $Ins = new org_inscription();
        $sel_A=new org_anneesco();
        $sel_A=$sel_A->selectionnerDerAn()->fetch();
            foreach($tbIns as $inscr){
                    $Ins->ajouter($inscr,$sel_A['idAnneeSco'],$_GET['idutil']);
            }
        setcookie('classeSel','', (time()-1));
        include("../vue.param_access/profil_Eleve.php");
        

    }else {
        echo '<center class="col-sm-12" style="color:red">VEUILLEZ SELECTINNER UNE CLASSE POUR L\'INSCRIPTION<center> <button class="btn btn-warning pull-right" style="height:40px; margin-top:13px;" onclick=Orientation("../control.param_access/ctr_membre.php?rtn=true&idGroupe='.$_GET['idGroupe'].'","#corps")>Returner</button>'; 
    }
}else if(isset($_GET['VueClasseAff'])){
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
        if($crs->ajouter($affect['idAffectation'],$sel_A['idAnneeSco'],$_GET['nomC'],$_GET['url'],$_GET['CmtC'])){
           include("../vue.param_access/cours_ense_cls.php");
        }else{
          echo "ECHEC D'ENREGISTREMENT COURS <><><MODEL><><><";
        }
   
    
 }else{
   echo "ECHEC LISTE CLASSE OU COURS PAR ENSEIGNANT";
}

?>

