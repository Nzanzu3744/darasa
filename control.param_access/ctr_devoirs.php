<?php
if(isset($_GET['NvDevoi'])){
    include_once('../vue.param_access/form_prequestion.php');
}else if(isset($_GET['PreEb2']) AND isset($_GET['nbQT']) AND isset($_GET['nbQC'])){
    include_once('../model.param_access/crs_devoirs.class.php');
    $dv = new crs_devoirs();
     ?>
        <input disabled style="color:red" id="idDev" value='<?=$dv->ajouter($_GET['idCours'],$_GET['dtremise'],$_GET['idx'])?>'>
    <?php
    include_once('../vue.param_access/form_questionnaire.php');
}else if(isset($_GET['devoirsgauche_ense']) AND isset($_GET['idCours'])){
    include_once('../vue.param_access/devoir_cours_ense_cls.php');
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
}else if(isset($_GET['rechercheGauche'])){
    include_once('../vue.param_access/devoir_cours_rech.php');

}else if(isset($_GET['RelierDevoir'])){
    include_once('../model.param_access/crs_reler_devoir.class.php');
    include_once('../model.param_access/org_anneesco.class.php');
     $rl =new crs_reler_devoir();
     $sel_A=new org_anneesco();
    $sel_A=$sel_A->selectionnerDerAn()->fetch();
    echo $rl->ajouter($_GET['idDevoir'],$_GET['idCours'],$sel_A['idAnneeSco']); 
}else if(isset($_GET['clerech']) AND $_GET['clerech']!=''){    
include_once('../model.param_access/crs_devoirs.class.php');
?>
 <table id="filtrer"  class="table table-bordered table-striped table-condensed">
<?php
    $lc = new crs_devoirs();
    $lecon;
    $lecon = $lc->selectionnerBytitreDev($_GET['cours'],$_GET['clerech']);     
    $i=0;
    foreach($lecon as $selDv){
        $i++;
        ?>
        <tr id="filtrer" style="margin:3px">
        <?php
         ?>
        <td style="background-color: aliceblue">  [<?=$i;?>] Code : <?=$selDv['idDevoir']?><br><center style="color:red">Devoirs de :<br><?=$_GET['cours']?><br><?=$selDv['anneeSco']?><br><a href='#' style='font-size:8px'><?=$selDv['nomUtilisateur'].'  '.$selDv['postnomUtilisateur'].' '.$selDv['prenomUtilisateur']?></a><br><?=$selDv['indexation']?></center></br></td>

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
                                 <a href="#" onclick="Encour()">Rapport Devoir</a>
                              </li>
                        </ul>
                </z>                
            </td>
        </tr>
        </table>   
            <?php
           }
}else if(isset($_GET['clerech']) AND $_GET['clerech']==''){    
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
          <td style="background-color: aliceblue">  [<?=$i;?>] Code : <?=$selDv['idDevoir']?><br><center style="color:red">Devoirs de :<br><?=$_GET['cours']?><br><?=$selDv['anneeSco']?><br><a href='#' style='font-size:8px'><?=$selDv['nomUtilisateur'].'  '.$selDv['postnomUtilisateur'].' '.$selDv['prenomUtilisateur']?></a><br><?=$selDv['indexation']?></center></br></td>
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
}else{
    echo "<>";
}





?>

