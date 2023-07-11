<?php
 include_once('../model.param_access/crs_co_animation.class.php');

    if(isset($_GET['pre_coa'])){
    include_once("../vue.param_access/header_fenetre.php");
             include_once('../vue.param_access/form_co_animation.php');
    include_once("../vue.param_access/footer_fenetre.php");
    }elseif(isset($_GET['ajouter_coa'])){
       
        $idCrs = htmlspecialchars($_GET['idCours']);
        $idCls = htmlspecialchars($_GET['idClasse']);
        include_once('../control.param_access/mes_methodes.php');

         $listUt = deserialiser($_POST['data1']);
        $coa = new crs_co_animation();
        foreach($listUt as $selListUt){
            $coa->ajouter($selListUt,$idCrs,$idCls);
        }
         include_once('../vue.param_access/form_co_animation.php');

    }elseif(isset($_GET['sup_coa'])){
       
        // $idCrs = htmlspecialchars($_GET['idCours']);
        // $idCls = htmlspecialchars($_GET['idClasse']);
        include_once('../control.param_access/mes_methodes.php');

         $listCao = deserialiser($_POST['data1']);
        $coa = new crs_co_animation();
        foreach($listCao as $sellistCao){
            $coa->supprimer($sellistCao);
        }
         include_once('../vue.param_access/form_co_animation.php');
    }else{
        return 'ECHEC CTR CO-ANIMATION';
    }
?>