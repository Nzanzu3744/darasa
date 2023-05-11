<?php
if(isset($_GET['NvDevoi'])){
    include_once('../vue.param_access/form_prequestion.php');
}else if(isset($_GET['PreEb2']) AND isset($_GET['nbQT']) AND isset($_GET['nbQC'])){
    (empty($_SESSION))?session_start():'';
    include_once('../model.param_access/crs_devoirs.class.php');
    $dv = new crs_devoirs();
     ?>
        <input disabled style="color:red" id="idDev" value='<?=$dv->ajouter($_GET['idCours'],$_GET['dtremise'],$_GET['idx'],$_SESSION['idUtilisateur'])?>'>
    <?php
    include_once('../vue.param_access/form_questionnaire.php');
}else if(isset($_GET['devoirsgauche_ense'])){
    include_once('../vue.param_access/devoir_cours_ense_cls.php');
//LECTURE LECON
}else if(isset($_GET['devoirsgauche_dir'])){
    include_once('../vue.param_access/devoir_cours_dir_cls.php');
//LECTURE LECON
}else  if(isset($_GET['devoirsgauche_eleve']) AND isset($_GET['idCours'])){
    include_once('../vue.param_access/devoir_cours_eleve_cls.php');
    
//LECTURE LECON
}if(isset($_GET['Liredevoirs_eleve'])){
// echo $_GET['iddv']."".$_GET['cours']."".$_GET['idcrs'];
   include_once('../vue.param_access/form_questionnaire_eleve.php');
}else if(isset($_GET['listeRms'])){
     include_once('../model.param_access/suivie_remise_devoirs.class.php');
        $rm = new suivie_remise_devoirs();
        $rm = $rm->remis($_GET['idDevoir']);
        ?>
        <ol>
        <?php
        foreach($rm as $selRm ){
         echo '<li>'.strtoupper('Id:['.$selRm['idUtilisateur'].']   '.$selRm['nomUtilisateur'].' '.$selRm['postnomUtilisateur'].'  '.$selRm['prenomUtilisateur']).'</li>';
        }
        ?>
        </ol>
        <?php
}else if(isset($_GET['rechercheGauche_ense'])){
    include_once('../vue.param_access/devoir_cours_rech_ense.php');

}else if(isset($_GET['rechercheGauche_dir'])){
    include_once('../vue.param_access/devoir_cours_rech_dir.php');

}else if(isset($_GET['RelierDevoir'])){
    include_once('../model.param_access/crs_reler_devoir.class.php');
    include_once('../model.param_access/org_anneesco.class.php');
     $rl =new crs_reler_devoir();
     $sel_A=new org_anneesco();
    $sel_A=$sel_A->selectionnerDerAn()->fetch();
    echo $rl->ajouter($_GET['idDevoir'],$_GET['idCours'],$sel_A['idAnneeSco']); 
}else if(isset($_GET['clerech_ense']) AND $_GET['clerech_ense']!=''){    
include_once('../model.param_access/crs_devoirs.class.php');
?>
 <table id="filtrer"  class="table table-bordered table-striped table-condensed">
<?php
   include_once('../model.param_access/crs_devoirs.class.php');
?>
 <table id="filtrer"  class="table table-bordered table-striped table-condensed">
<?php
     $dv = new crs_devoirs();
    $devoirs = $dv->selectionnerBytitreDev($_GET['cours'],$_GET['clerech_ense']);      
    $i=0;
    foreach($devoirs as $selDv){
        $i++;
        ?>
        <tr id="filtrer" style="margin:3px">
        <?php
         ?>
          <td style="background-color: aliceblue">  [<?=$i;?>] Code : <?=$selDv['idDevoir']?><br><center style="color:red">Devoirs de :<br><?=$_GET['cours']?><br><?=$selDv['anneeSco']?><br><a href='#' style='font-size:8px'><?=$selDv['nomUtilisateur'].'  '.$selDv['postnomUtilisateur'].' '.$selDv['prenomUtilisateur']?></a><br><?=$selDv['indexation']?><br> <mark style="color:black"><?=($selDv['actif']!=1)? "DEVOIR DESACTIVE":'ACTIVE'?></mark></center></br></td>
            <td style="height:100%;  background:#f2f2f2"> 
               <z class="dropdown">
                 <button data-toggle="dropdown" style=""><b class="caret ppull-right"></b></button>
                    <ul class="dropdown-menu pull-right">
                     <?php
                      $sel_D = new crs_devoirs();
                      $sel_D=$sel_D->selectionnerByIdCours($selDv['idCours'])->fetch();
                        ?>
                              <li ><a href="#" onclick="Orientation('../control.param_access/ctr_questionnaire.php?Liredevoirs_ense=tue&maClasse=<?=$_GET['maClasse']?>&cours=<?=$sel_D['cours']?>&idcrs=<?=$sel_D['idCours']?>&cours=<?=$sel_D['cours']?>&iddv=<?=$selDv['idDevoir']?>','#editLeco','')">Lire le devoir</a></i></li>
                              <li><a href="#" onclick="Orientation('../control.param_access/ctr_devoirs.php?RelierDevoir=true&maClasse=<?=$_GET['maClasse']?>&cours=<?=$sel_D['cours']?>&idCours=<?=$_GET['idCours']?>&&idDevoir=<?=$selDv['idDevoir']?>','#resul','')">Rapporter</a></i></li>
                              <li class="divider"></li>
                              <li>
                                 <a href="#" onclick="Encour()">Rapport Eleve</a>
                              </li>
                        </ul>
                </z>                
            </td>
        </tr>
        </table>   
            <?php
           }
}else if(isset($_GET['clerech_ense']) AND $_GET['clerech_ense']==''){    
include_once('../model.param_access/crs_devoirs.class.php');
?>
 <table id="filtrer"  class="table table-bordered table-striped table-condensed">
<?php
     $dv = new crs_devoirs();
    $devoirs = $dv->selectionnerBytitreCrs($_GET['cours']);      
    $i=0;
    foreach($devoirs as $selDv){
        $i++;
        ?>
        <tr id="filtrer" style="margin:3px">
        <?php
         ?>
          <td style="background-color: aliceblue">  [<?=$i;?>] Code : <?=$selDv['idDevoir']?><br><center style="color:red">Devoirs de :<br><?=$_GET['cours']?><br><?=$selDv['anneeSco']?><br><a href='#' style='font-size:8px'><?=$selDv['nomUtilisateur'].'  '.$selDv['postnomUtilisateur'].' '.$selDv['prenomUtilisateur']?></a><br><?=$selDv['indexation']?><br> <mark style="color:black"><?=($selDv['actif']!=1)? "DEVOIR DESACTIVE":'ACTIVE'?></mark></center></br></td>
            <td style="height:100%;  background:#f2f2f2"> 
               <z class="dropdown">
                 <button data-toggle="dropdown" style=""><b class="caret ppull-right"></b></button>
                    <ul class="dropdown-menu pull-right">
                     <?php
                      $sel_D = new crs_devoirs();
                      $sel_D=$sel_D->selectionnerByIdCours($selDv['idCours'])->fetch();
                        ?>
                              <li ><a href="#" onclick="Orientation('../control.param_access/ctr_questionnaire.php?Liredevoirs_ense=tue&maClasse=<?=$_GET['maClasse']?>&cours=<?=$sel_D['cours']?>&idcrs=<?=$sel_D['idCours']?>&cours=<?=$sel_D['cours']?>&iddv=<?=$selDv['idDevoir']?>','#editLeco','')">Lire le devoir</a></i></li>
                              <li><a href="#" onclick="Orientation('../control.param_access/ctr_devoirs.php?RelierDevoir=true&maClasse=<?=$_GET['maClasse']?>&cours=<?=$sel_D['cours']?>&idCours=<?=$_GET['idCours']?>&&idDevoir=<?=$selDv['idDevoir']?>','#resul','')">Rapporter</a></i></li>
                              <li class="divider"></li>
                              <li>
                                 <a href="#" onclick="Encour()">Rapport Eleve</a>
                              </li>
                        </ul>
                </z>                
            </td>
        </tr>
        </table>   
            <?php
           }
}elseif(isset($_GET['clerech_dir']) AND $_GET['clerech_dir']!=''){    
include_once('../model.param_access/crs_devoirs.class.php');
?>
 <table id="filtrer"  class="table table-bordered table-striped table-condensed">
<?php
    $lc = new crs_devoirs();
    $lecon;
    $lecon = $lc->selectionnerBytitreDev($_GET['cours'],$_GET['clerech_dir']);     
    $i=0;
    foreach($lecon as $selDv){
        $i++;
        ?>
        <tr id="filtrer" style="margin:3px">
        <?php
         ?>
        <td style="background-color: aliceblue">  [<?=$i;?>] Code : <?=$selDv['idDevoir']?><br><center style="color:green">Devoirs de :<br><?=$_GET['cours']?><br><?=$selDv['anneeSco']?><br><a href='#' style='font-size:8px'><?=$selDv['nomUtilisateur'].'  '.$selDv['postnomUtilisateur'].' '.$selDv['prenomUtilisateur']?></a><br><?=$selDv['indexation']?><br> <mark style="color:black"><?=($selDv['actif']!=1)? "DEVOIR DESACTIVE":'ACTIVE'?></mark></center></br></td>

            <td style="height:100%;  background:#f2f2f2"> 
               <z class="dropdown">
                 <button data-toggle="dropdown" style=""><b class="caret ppull-right"></b></button>
                    <ul class="dropdown-menu pull-right">
                     <?php
                      $sel_D = new crs_devoirs();
                      $sel_D=$sel_D->selectionnerByIdCours($selDv['idCours'])->fetch();
                        ?>
                             <li ><a href="#" onclick="Orientation('../control.param_access/ctr_questionnaire.php?Liredevoirs_ense=tue&maClasse=<?=$_GET['maClasse']?>&cours=<?=$sel_D['cours']?>&idcrs=<?=$sel_D['idCours']?>&cours=<?=$sel_D['cours']?>&iddv=<?=$selDv['idDevoir']?>','#editLeco',''); showme2('#dessoueditLeco');Orientation('../control.param_access/ctr_devoirs.php?Evalue=true&idPromotion=<?=$_GET['idPromotion']?>&maClasse=<?=$_GET['maClasse']?>&cours=<?=$sel_D['cours']?>&idCours=<?=$sel_D['idCours']?>&cours=<?=$sel_D['cours']?>&idDevoir=<?=$selDv['idDevoir']?>','#dessoueditLeco','')">Lire le devoir</a></i></li>
                              <li class="divider"></li>
                              <li>
                                 <a href="#" onclick="Encour()">Rapport Devoir</a>
                              </li>
                        </ul>
                </z>                
            </td>
        </tr>
        </table>   
            <?php
           }
}else if(isset($_GET['clerech_dir']) AND $_GET['clerech_dir']==''){    
include_once('../model.param_access/crs_devoirs.class.php');
?>
 <table id="filtrer"  class="table table-bordered table-striped table-condensed">
<?php
     $dv = new crs_devoirs();
    $devoirs = $dv->selectionnerBytitreCrsAll($_GET['cours']);      
    $i=0;
    foreach($devoirs as $selDv){
        $i++;
        ?>
        <tr id="filtrer" style="margin:3px">
        <?php
         ?>
          <td style="background-color: aliceblue">  [<?=$i;?>] Code : <?=$selDv['idDevoir']?><br><center style="color:green">Devoirs de :<br><?=$_GET['cours']?><br><?=$selDv['anneeSco']?><br><a href='#' style='font-size:8px'><?=$selDv['nomUtilisateur'].'  '.$selDv['postnomUtilisateur'].' '.$selDv['prenomUtilisateur']?></a><br><?=$selDv['indexation']?><br> <mark style="color:black"><?=($selDv['actif']!=1)? "DEVOIR DESACTIVE":'ACTIVE'?></mark></center></br></td>
            <td style="height:100%;  background:#f2f2f2"> 
               <z class="dropdown">
                 <button data-toggle="dropdown" style=""><b class="caret ppull-right"></b></button>
                    <ul class="dropdown-menu pull-right">
                     <?php
                      $sel_D = new crs_devoirs();
                      $sel_D=$sel_D->selectionnerByIdCours($selDv['idCours'])->fetch();
                        ?>
                              <li ><a href="#" onclick="Orientation('../control.param_access/ctr_questionnaire.php?Liredevoirs_ense=tue&maClasse=<?=$_GET['maClasse']?>&cours=<?=$sel_D['cours']?>&idcrs=<?=$sel_D['idCours']?>&cours=<?=$sel_D['cours']?>&iddv=<?=$selDv['idDevoir']?>','#editLeco',''); showme2('#dessoueditLeco');Orientation('../control.param_access/ctr_devoirs.php?Evalue=true&idPromotion=<?=$_GET['idPromotion']?>&maClasse=<?=$_GET['maClasse']?>&cours=<?=$sel_D['cours']?>&idCours=<?=$sel_D['idCours']?>&cours=<?=$sel_D['cours']?>&idDevoir=<?=$selDv['idDevoir']?>','#dessoueditLeco','')">Lire le devoir</a></i></li>
                              <li class="divider"></li>
                              <li>
                                 <a href="#" onclick="Encour()">Rapport Eleve</a>
                              </li>
                        </ul>
                </z>                
            </td>
        </tr>
        </table>   
            <?php
           }
}else if(isset($_GET['Evalue']) AND isset($_GET['idDevoir'])){
     include_once('../vue.param_access/form_evaluation_devoir.php');
   
}else if(isset($_GET['Subj']) AND isset($_GET['pt'])){
(empty($_SESSION))?session_start():'';
include_once('../model.param_access/dir_subjection_devoir.class.php');
include_once('../model.param_access/dir_directeur.class.php');
    $affDir = new dir_directeur();
    $affDir=$affDir->selectionnerByUtiPromActif($_SESSION['idUtilisateur'],$_GET['idPromotion'])->fetch();
    $sbj = new dir_subjection_devoir();
    $sbj = $sbj->ajouter($affDir['idDirecteur'],$_GET['idDevoir'],$_GET['Subj'],$_GET['pt']);   
     ECHO '<i style="color:green">ENREGISTREMENT REUSSI</i>';
}else if(isset($_GET['activer']) AND isset($_GET['idDevoir']) AND isset($_GET['value'])){
include_once('../model.param_access/crs_devoirs.class.php');
    $actdevoir = new crs_devoirs();
    if($_GET['value']==1){
         $actdevoir->activer($_GET['idDevoir'],0);
         ?> 
         <input id="actif" class="btn btn-lg btn-success" value="__ACTIVER__"  onclick="Orientation('../control.param_access/ctr_lecon.php?activer=true&idDevoir=<?=$_GET['idDevoir']?>&value=0','#resul','')"  type="button" >
        <?php
    }else{
          $actdevoir->activer($_GET['idDevoir'],1);
         ?> 
         <input id="actif" class="btn btn-lg btn-danger" value="DESACTIVER"  onclick="Orientation('../control.param_access/ctr_lecon.php?activer=true&idDevoir=<?=$_GET['idDevoir']?>&value=1','#resul','')"  type="button" >
        <?php

    }
      
     
}else{
    echo ".>_-_<.";
}





?>

