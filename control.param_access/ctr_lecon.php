<?php
(empty($_SESSION))?session_start():'';

if(isset($_GET['ajouterL']) AND isset($_POST['lcn']) AND $_GET['idlc']!="undefined"){
    include_once('../model.param_access/crs_lecon.class.php');
   $var = new crs_lecon();
   ?>
   <input disabled style="color:green" id="idlc"  name="idlc" value='<?=$_GET['idlc']?>'/>
   <?php
   $var->modifier($_GET['idlc'],$_GET['idCours'],$_GET['tlecon'],$_POST['lcn'],$_SESSION['idUtilisateur'] );
    include_once('../vue.param_access/form_lecon_mod_ense.php');



}else if(isset($_GET['ajouterLViaDir']) AND isset($_POST['lcn']) AND $_GET['idlc']!="undefined"){
    include_once('../model.param_access/crs_lecon.class.php');
   $var = new crs_lecon();
   ?>
   <input disabled style="color:green" id="idlc"  name="idlc" value='<?=$_GET['idlc']?>'/>
   <?php
   $var->modifier($_GET['idlc'],$_GET['idCours'],$_GET['tlecon'],$_POST['lcn'],$_SESSION['idUtilisateur'] );
    include_once('../vue.param_access/form_lecon_mod_dir.php');


}else if(isset($_GET['ajouterL']) AND isset($_POST['lcn'])){
    include_once('../model.param_access/crs_lecon.class.php');
        $idLecon = new crs_lecon();
       ?>
        <input disabled style="color:red" id="idlc"  name="idlc" value='<?=$idLecon->ajouter($_GET['idCours'],$_GET['tlecon'],$_POST['lcn'],$_SESSION['idUtilisateur'] )?>'>
        <?php
        // include_once('../vue.param_access/form_lecon_mod_ense.php');



//AFFICHAGE PREMIER FORMULAIRE DU LECON
}else if( isset($_GET['premiF']) AND isset($_GET['idCours'])){
    
    include_once('../vue.param_access/form_lecon.php');

//AFFICHAGE LES LECONS RIGHT DU COURS D'UN ENSEIGNANT SPECIFIQUE
}else  if(isset($_GET['leconsgauche_ense']) and isset($_GET['idCours'])){
    include_once('../vue.param_access/lecon_cours_ense_cls.php');
//LECTURE LECON
}else  if(isset($_GET['leconsgauche_dir']) and isset($_GET['idCours'])){
    include_once('../vue.param_access/lecon_cours_dir_cls.php');
//LECTURE LECON
}else  if(isset($_GET['leconsgauche_eleve']) and isset($_GET['idCours'])){
    include_once('../vue.param_access/lecon_cours_eleve_cls.php');
//LECTURE LECON


}else if(isset($_GET['LireLecon_ense'])){
    ?>
        <input disabled style="color:red" id="idlc"  name="idlc" value='<?=$_GET['idlc']?>'/>
    <?php
include_once('../vue.param_access/form_lecon_mod_ense.php');


}else if(isset($_GET['RelierLecon'])){
    include_once('../model.param_access/crs_reler_lecon.class.php');
    include_once('../model.param_access/org_anneesco.class.php');
     $rl =new crs_reler_lecon();
     $sel_A=new org_anneesco();
    $sel_A=$sel_A->selectionnerDerAn()->fetch();
    $rl->ajouter($_GET['idlc'],$_GET['idCours'],$sel_A['idAnneeSco']); 
    echo "Rapportage reussi de la lecon code ".$_GET['idlc']; 

//
}else if(isset($_GET['LireLecon_eleve'])){
    include_once('../model.param_access/visite_lecon.class.php');
    $visite =new visite_lecon();
    $visite->ajouter($_GET['idlc'],$_GET['idCours'],$_SESSION['idUtilisateur'],$_GET['idIns']);
    echo '<labelle disabled style="color:blue" id="idlc"  name="idlc">'.$_GET['idlc'].'</labelle>';
    echo $_GET['idIns'];
    ECHO '['.$_GET['idcrs'].']';
include_once('../vue.param_access/lecon_eleve.php');
//


}else if(isset($_GET['rechercheGauche_ense'])){
    include_once('../vue.param_access/lecon_cours_rech_ense.php');

}else if(isset($_GET['rechercheGauche_dir'])){
    include_once('../vue.param_access/lecon_cours_rech_dir.php');
    
}else if(isset($_GET['clerech_ense']) AND $_GET['clerech_ense']!=''){    
include_once('../model.param_access/crs_lecon.class.php');
?>
 <table id="filtrer"  class="table table-bordered table-striped table-condensed">
<?php
    $lc = new crs_lecon();
    $lecon;
    $lecon = $lc->selectionnerBytitrelC($_GET['cours'],$_GET['clerech_ense']);     
    $i=0;
    foreach($lecon as $selLc){
        $i++;
        ?>
        <tr id="filtrer" style="margin:3px">
        <?php
         ?>
          <td style="background-color: aliceblue; font-size:12px">[<?=$i;?>] Code : <?=$selLc['idLecon']?><br><center style="color:red">TITRE<br><?=$selLc['titreLecon']?><br><?=$selLc['anneeSco']?><br><a href='#' style='font-size:8px'><?=$selLc['nomUtilisateur'].'  '.$selLc['postnomUtilisateur'].' '.$selLc['prenomUtilisateur']?></a><br> <mark style="color:black"><?=($selLc['actif']!=1)? "LECON DESACTIVE":'ACTIVE'?></mark></center></br></td>
            <td style="height:100%;  background:#f2f2f2"> 
               <z class="dropdown">
                 <button data-toggle="dropdown" style=""><b class="caret ppull-right"></b></button>
                    <ul class="dropdown-menu pull-right">
                     <?php
                      $sel_C = new crs_lecon();
                      $sel_C=$sel_C->selectionnerByIdCours($selLc['idCours'])->fetch();
                        ?>
                              <li><a href="#" onclick="Orientation('../control.param_access/ctr_lecon.php?LireLecon_ense=tue&maClasse=<?=$_GET['maClasse']?>&tlecon=<?=$selLc['titreLecon']?>&idCours=<?=$sel_C['idCours']?>&cours=<?=$sel_C['cours']?>&idlc=<?=$selLc['idLecon']?>','#editLeco','')">Lire la leçon</a></i></li>
                              <li><a href="#" onclick="Orientation('../control.param_access/ctr_lecon.php?RelierLecon=tue&maClasse=<?=$_GET['maClasse']?>&tlecon=<?=$selLc['titreLecon']?>&idCours=<?=$_GET['idCours']?>&cours=<?=$sel_C['cours']?>&idlc=<?=$selLc['idLecon']?>','#resul','')">Rapporter</li>
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
include_once('../model.param_access/crs_lecon.class.php');
?>
 <table id="filtrer"  class="table table-bordered table-striped table-condensed">
<?php
    $lc = new crs_lecon();
    $lecon;
    $lecon = $lc->selectionnerBytitreCrs($_GET['cours']);       
    $i=0;
    foreach($lecon as $selLc){
        $i++;
        ?>
        <tr id="filtrer" style="margin:3px">
        <?php
         ?>
          <td style="background-color: aliceblue; font-size:12px">[<?=$i;?>] Code : <?=$selLc['idLecon']?><br><center style="color:red">TITRE<br><?=$selLc['titreLecon']?><br><?=$selLc['anneeSco']?><br><a href='#' style='font-size:8px'><?=$selLc['nomUtilisateur'].'  '.$selLc['postnomUtilisateur'].' '.$selLc['prenomUtilisateur']?></a><br> <mark style="color:black"><?=($selLc['actif']!=1)? "LECON DESACTIVE":'ACTIVE'?></mark></center></br></td>
            <td style="height:100%;  background:#f2f2f2"> 
               <z class="dropdown">
                 <button data-toggle="dropdown" style=""><b class="caret ppull-right"></b></button>
                    <ul class="dropdown-menu pull-right">
                     <?php
                      $sel_C = new crs_lecon();
                      $sel_C=$sel_C->selectionnerByIdCours($selLc['idCours'])->fetch();
                        ?>
                              <li><a href="#" onclick="Orientation('../control.param_access/ctr_lecon.php?LireLecon_ense=tue&maClasse=<?=$_GET['maClasse']?>&tlecon=<?=$selLc['titreLecon']?>&idCours=<?=$sel_C['idCours']?>&cours=<?=$sel_C['cours']?>&idlc=<?=$selLc['idLecon']?>','#editLeco','')">Lire la leçon</a></i></li>
                              <li><a href="#" onclick="Orientation('../control.param_access/ctr_lecon.php?RelierLecon=tue&maClasse=<?=$_GET['maClasse']?>&tlecon=<?=$selLc['titreLecon']?>&idCours=<?=$_GET['idCours']?>&cours=<?=$sel_C['cours']?>&idlc=<?=$selLc['idLecon']?>','#resul','')">Rapporter</li>
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
}else if(isset($_GET['clerech_dir']) AND $_GET['clerech_dir']!=''){    
include_once('../model.param_access/crs_lecon.class.php');
?>
 <table id="filtrer"  class="table table-bordered table-striped table-condensed">
<?php
    $lc = new crs_lecon();
    $lecon;
    $lecon = $lc->selectionnerBytitrelC($_GET['cours'],$_GET['clerech_dir']);     
    $i=0;
    foreach($lecon as $selLc){
        $i++;
        ?>
        <tr id="filtrer" style="margin:3px">
        <?php
         ?>
          <td style="background-color: aliceblue; font-size:12px">[<?=$i;?>] Code : <?=$selLc['idLecon']?><br><center style="color:green">TITRE<br><?=$selLc['titreLecon']?><br><?=$selLc['anneeSco']?><br><a href='#' style='font-size:8px'><?=$selLc['nomUtilisateur'].'  '.$selLc['postnomUtilisateur'].' '.$selLc['prenomUtilisateur']?></a><br> <mark style="color:black"><?=($selLc['actif']!=1)? "LECON DESACTIVE":'ACTIVE'?></mark></center></br></td>
            <td style="height:100%;  background:#f2f2f2"> 
               <z class="dropdown">
                 <button data-toggle="dropdown" style=""><b class="caret ppull-right"></b></button>
                    <ul class="dropdown-menu pull-right">
                     <?php
                      $sel_C = new crs_lecon();
                      $sel_C=$sel_C->selectionnerByIdCours($selLc['idCours'])->fetch();
                        ?>
                              <li><a href='#' onclick="showme2('#dessoueditLeco'); Orientation('../control.param_access/ctr_lecon.php?LireLecon_ense=tue&idPromotion=<?=$_GET['idPromotion']?>&maClasse=<?=$_GET['maClasse']?>&tlecon=<?=$selLc['titreLecon']?>&idCours=<?=$selLc['idCours']?>&cours=<?=$sel_C['cours']?>&idlc=<?=$selLc['idLecon']?>','#editLeco',''); Orientation('../control.param_access/ctr_lecon.php?Evalue=tue&idPromotion=<?=$_GET['idPromotion']?>&maClasse=<?=$_GET['maClasse']?>&tlecon=<?=$selLc['titreLecon']?>&idCours=<?=$selLc['idCours']?>&cours=<?=$sel_C['cours']?>&idLecon=<?=$selLc['idLecon']?>','#dessoueditLeco','')">Lire la leçon</a></i></li>
                              <li><a href="#" onclick="Orientation('../control.param_access/ctr_lecon.php?RelierLecon=tue&maClasse=<?=$_GET['maClasse']?>&tlecon=<?=$selLc['titreLecon']?>&idCours=<?=$_GET['idCours']?>&cours=<?=$sel_C['cours']?>&idlc=<?=$selLc['idLecon']?>','#resul','')">Rapporter</li>
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
}else if(isset($_GET['clerech_dir']) AND $_GET['clerech_dir']==''){    
include_once('../model.param_access/crs_lecon.class.php');
?>
 <table id="filtrer"  class="table table-bordered table-striped table-condensed">
<?php
    $lc = new crs_lecon();
    $lecon;
    $lecon = $lc->selectionnerBytitreCrs($_GET['cours']);       
    $i=0;
    foreach($lecon as $selLc){
        $i++;
        ?>
        <tr id="filtrer" style="margin:3px">
        <?php
         ?>
          <td style="background-color: aliceblue; font-size:12px">[<?=$i;?>] Code : <?=$selLc['idLecon']?><br><center style="color:green">TITRE<br><?=$selLc['titreLecon']?><br><?=$selLc['anneeSco']?><br><a href='#' style='font-size:8px'><?=$selLc['nomUtilisateur'].'  '.$selLc['postnomUtilisateur'].' '.$selLc['prenomUtilisateur']?></a><br> <mark style="color:black"><?=($selLc['actif']!=1)? "LECON DESACTIVE":'ACTIVE'?></mark></center></br></td>
            <td style="height:100%;  background:#f2f2f2"> 
               <z class="dropdown">
                 <button data-toggle="dropdown" style=""><b class="caret ppull-right"></b></button>
                    <ul class="dropdown-menu pull-right">
                     <?php
                      $sel_C = new crs_lecon();
                      $sel_C=$sel_C->selectionnerByIdCours($selLc['idCours'])->fetch();
                        ?>
                              <li><a href='#' onclick="showme2('#dessoueditLeco'); Orientation('../control.param_access/ctr_lecon.php?LireLecon_ense=tue&idPromotion=<?=$_GET['idPromotion']?>&maClasse=<?=$_GET['maClasse']?>&tlecon=<?=$selLc['titreLecon']?>&idCours=<?=$selLc['idCours']?>&cours=<?=$sel_C['cours']?>&idlc=<?=$selLc['idLecon']?>','#editLeco',''); Orientation('../control.param_access/ctr_lecon.php?Evalue=tue&idPromotion=<?=$_GET['idPromotion']?>&maClasse=<?=$_GET['maClasse']?>&tlecon=<?=$selLc['titreLecon']?>&idCours=<?=$selLc['idCours']?>&cours=<?=$sel_C['cours']?>&idLecon=<?=$selLc['idLecon']?>','#dessoueditLeco','')">Lire la leçon</a></i></li>
                              <li><a href="#" onclick="Orientation('../control.param_access/ctr_lecon.php?RelierLecon=tue&maClasse=<?=$_GET['maClasse']?>&tlecon=<?=$selLc['titreLecon']?>&idCours=<?=$_GET['idCours']?>&cours=<?=$sel_C['cours']?>&idlc=<?=$selLc['idLecon']?>','#resul','')">Rapporter</li>
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
}else if(isset($_GET['Evalue']) AND isset($_GET['idLecon'])){
     include_once('../vue.param_access/form_evaluation_lecon.php');
}else if(isset($_GET['evalue']) AND isset($_GET['Subj']) AND isset($_GET['pt'])){
include_once('../model.param_access/dir_subjection_lecon.class.php');
include_once('../model.param_access/dir_directeur.class.php');
    $affDir = new dir_directeur();
    $affDir=$affDir->selectionnerByUtiPromActif($_SESSION['idUtilisateur'],$_GET['idPromotion'])->fetch();
    $sbj = new dir_subjection_lecon();
    $sbj = $sbj->ajouter($affDir['idDirecteur'],$_GET['idLecon'],$_GET['Subj'],$_GET['pt'] );   
     ECHO '<i style="color:green">ENREGISTREMENT REUSSI</i>';
}else if(isset($_GET['activer']) AND isset($_GET['idLecon']) AND isset($_GET['value'])){
include_once('../model.param_access/crs_lecon.class.php');
    $actLeson = new crs_lecon();
    if($_GET['value']==1){
         $actLeson=$actLeson->activer($_GET['idLecon'],0);
         ?> 
         <input id="actif" class="btn btn-lg btn-success  btn-xs" value="__ACTIVER__"  onclick="Orientation('../control.param_access/ctr_lecon.php?activer=true&idLecon=<?=$_GET['idLecon']?>&value=0','#resul','')"  type="button" >
        <?php
    }else{
          $actLeson=$actLeson->activer($_GET['idLecon'],1);
         ?> 
         <input id="actif" class="btn btn-lg btn-danger  btn-xs" value="DESACTIVER"  onclick="Orientation('../control.param_access/ctr_lecon.php?activer=true&idLecon=<?=$_GET['idLecon']?>&value=1','#resul','')"  type="button" >
        <?php

    }
      
     
}else{
    echo "ECHEC LECON";
}





?>