<?php
session_start();
if(isset($_GET['ajouterL']) AND isset($_POST['lcn']) AND $_GET['idlc']!="undefined"){
    include_once('../model.param_access/crs_lecon.class.php');
   $var = new crs_lecon();
   ?>
   <input disabled style="color:green" id="idlc" value='<?=$_GET['idlc']?>'/>
   <?php
   $var->modifier($_GET['idlc'],$_GET['idcrs'],$_GET['tlecon'],$_POST['lcn'],$_SESSION['idUtilisateur'] );
    include_once('../vue.param_access/form_lecon_mod.php');
    echo "UNDEF";


}else if(isset($_GET['ajouterL']) AND isset($_POST['lcn'])){
    include_once('../model.param_access/crs_lecon.class.php');
        $idLecon = new crs_lecon();
       ?>
        <input disabled style="color:red" id="idlc" value='<?=$idLecon->ajouter($_GET['idcrs'],$_GET['tlecon'],$_POST['lcn'],$_SESSION['idUtilisateur'] )?>'>
        <?php
        include_once('../vue.param_access/form_lecon_mod.php');



//AFFICHAGE PREMIER FORMULAIRE DU LECON
}else if( isset($_GET['premiF']) and isset($_GET['idcrs'])){
    include_once('../vue.param_access/form_lecon.php');

//AFFICHAGE LES LECONS RIGHT DU COURS D'UN ENSEIGNANT SPECIFIQUE
}else  if(isset($_GET['leconsgauche_ense']) and isset($_GET['idCours'])){
    include_once('../vue.param_access/lecon_cours_ense_cls.php');
//LECTURE LECON
}else  if(isset($_GET['leconsgauche_eleve']) and isset($_GET['idCours'])){
    include_once('../vue.param_access/lecon_cours_eleve_cls.php');
//LECTURE LECON
}else if(isset($_GET['LireLecon'])){
    include_once('../model.param_access/visite_lecon.class.php');
    $visite =new visite_lecon();
    $visite->ajouter($_GET['idlc'],$_SESSION['idUtilisateur']);
    ?>
        <input disabled style="color:green" id="idlc" value='<?=$_GET['idlc']?>'/>
    <?php
include_once('../vue.param_access/form_lecon_mod.php');
}else if(isset($_GET['LireLecon_eleve'])){
     include_once('../model.param_access/visite_lecon.class.php');
    $visite =new visite_lecon();
    $visite->ajouter($_GET['idlc'],$_SESSION['idUtilisateur']);
    ?>
        <labelle disabled style="color:green" id="idlc"><?=$_GET['idlc']?></labelle>
    <?php
include_once('../vue.param_access/lecon_eleve.php');
}else{
    echo "ECHEC LECON";
}





?>