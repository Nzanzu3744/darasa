<?php
if(isset($_GET['NvDevoi'])){
    include_once('../vue.param_access/form_prequestion.php');
}else if(isset($_GET['PreEb2']) AND isset($_GET['nbQT']) AND isset($_GET['nbQC'])){
    include_once('../model.param_access/crs_devoirs.class.php');
    $dv = new crs_devoirs();
     ?>
        <input disabled style="color:red" id="idDev" value='<?=$dv->ajouter($_GET['idCours'],$_GET['dtremise'],$_GET['cmt'])?>'>
    <?php
    include_once('../vue.param_access/form_questionnaire.php');



}else  if(isset($_GET['devoirsgauche_ense']) AND isset($_GET['idCours'])){
    include_once('../vue.param_access/devoir_cours_ense_cls.php');
//LECTURE LECON
}else  if(isset($_GET['devoirsgauche_eleve']) AND isset($_GET['idCours'])){
    include_once('../vue.param_access/devoir_cours_eleve_cls.php');
//LECTURE LECON
}if(isset($_GET['Liredevoirs_eleve'])){
// echo $_GET['iddv']."".$_GET['cours']."".$_GET['idcrs'];
   include_once('../vue.param_access/form_questionnaire_eleve.php');
}else{
    echo "<>";
}





?>

