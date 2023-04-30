<?php
include('../model.param_access/crs_question.class.php');
$qst = new crs_question();

if(isset($_GET['AjoutQstCh'])){
    // $_GET['modifQst'] = (isset($_GET['modifQst']))?$_GET['modifQst']:;
    if(!isset($_GET['INTERDIT'])){
        $idQest=$qst->ajouter($_GET['idDev'],$_POST['qstC'.$_GET['n']],$_GET['pond']);
        ?>
        <input disabled style="color:green" id="modifQst<?=$_GET['n']?>" value='<?=$idQest?>'/>
        <?php         
    }else{
           $idQest=$qst->modifier($_GET['modifQst'],$_GET['idDev'],$_POST['qstC'.$_GET['n']],$_GET['pond']);                
    }
    include_once('../vue.param_access/form_questionnaire_valide.php');

}else if(isset($_GET['AjoutQstTr'])){
    // $_GET['modifQst'] = (isset($_GET['modifQst']))?$_GET['modifQst']:$_GET['idQt'];
     if(!isset($_GET['INTERDIT'])){
        $idQest = $qst->ajouter($_GET['idDev'],$_POST['qstT'.$_GET['n']],$_GET['pond']);   
         ?>
            <input disabled style="color:green" id="modifQst<?=$_GET['n']?>" value='<?=$idQest?>'/>
        <?php
         
        }else{
            //idDev difficile a explique la reseau detre Ouups!
            $iddev = ($_GET['idDev']!='undefined')?$_GET['idDev']:$_GET['idvv'];
           
        echo $qst->modifier($_GET['modifQst'],$iddev ,$_POST['qstT'.$_GET['n']],$_GET['pond']);   
         ?>
            <input disabled style="color:green" id="modifQst<?=$_GET['n']?>" value='<?=$_GET['modifQst']?>'/>
        <?php
    }
    include_once('../vue.param_access/form_questionnaire_valide.php');
}else if(isset($_GET['Liredevoirs_ense'])){
        include_once('../vue.param_access/form_questionnaire_mod.php');
 }else{
    echo "ECHEC QUESTIONNAIRE";
}





?>

