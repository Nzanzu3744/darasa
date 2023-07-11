<?php
 include_once('../model.param_access/crs_devoirs_trad.class.php');
 include_once('../model.param_access/crs_cote_devoirs_trad.class.php');
 include_once('../control.param_access/mes_methodes.php');
if(isset($_GET['TranscriptCote'])){
     include_once("../vue.param_access/header_fenetre.php");
             include_once('../vue.param_access/liste_eleve_transcript.php');
    include_once("../vue.param_access/footer_fenetre.php");
}elseif(isset($_GET['ajouterDT'])){
        
        $drt = new crs_devoirs_trad();
         if($_GET['idDevaoirTrad']!='undefined'){
            $drt->modifier($_GET['idDevaoirTrad'],$_GET['idCours'],$_GET['prD'],$_GET['idAffectation'],$_GET['pond'],$_GET['idx']);
            $idDvTrad = $_GET['idDevaoirTrad'];
        }else{
            $idDvTrad = $drt->ajouter($_GET['idCours'],$_GET['prD'],$_GET['idAffectation'],$_GET['pond'],$_GET['idx']);
        }

        // print_r($_POST['data1']);
        $tab = deserialiser($_POST['data1']);
        // print_r($tab);

        $cote02 = new crs_cote_devoirs_trad();
        $bcl=0;
        
        foreach($tab as $selCt){
            $bcl++;
            ($bcl==1)?$ideleve=$selCt:'';
                
            if($bcl==2){
                    $cote02 = new crs_cote_devoirs_trad();
                    $existe = $cote02->filterDevTraEleve($idDvTrad,$ideleve)->fetch();
                    if($_GET['idDevaoirTrad']!='undefined' AND $existe == true ){
                        
                    $cote02->modifier($idDvTrad,$ideleve,$selCt);
                    
                    }else{
                    $cote02->ajouter($idDvTrad,$ideleve,$selCt);
                    }
                    $bcl=0;  
            }
        }
        include_once('../vue.param_access/transcription_cours_ense_cls.php');
    }elseif(isset($_GET['devoirsTrangauche_ense'])){
        include_once('../vue.param_access/transcription_cours_ense_cls.php');

    }elseif(isset($_GET['TtranscriptCt_mod'])){
        include_once('../vue.param_access/transcription_cours_ense_cls.php');

    }else{
        echo "ECHEC DEVOIR TRADITIONNEL";

    }

?>