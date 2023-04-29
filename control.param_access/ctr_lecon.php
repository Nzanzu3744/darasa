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
}else if(isset($_GET['RelierLecon'])){
    include_once('../model.param_access/crs_reler_lecon.class.php');
    include_once('../model.param_access/org_anneesco.class.php');
     $rl =new crs_reler_lecon();
     $sel_A=new org_anneesco();
    $sel_A=$sel_A->selectionnerDerAn()->fetch();
    $rl->ajouter($_GET['idcrs'],$_GET['idlc'],$sel_A['idAnneeSco']); 
    echo "Rapportage reussi de la lecon code ".$_GET['idlc']; 
}else if(isset($_GET['LireLecon_eleve'])){
     include_once('../model.param_access/visite_lecon.class.php');
    $visite =new visite_lecon();
    $visite->ajouter($_GET['idlc'],$_SESSION['idUtilisateur']);
    echo '<labelle disabled style="color:green" id="idlc"'.$_GET['idlc'].'</labelle>';
include_once('../vue.param_access/lecon_eleve.php');
}else if(isset($_GET['rechercheGauche'])){
    include_once('../vue.param_access/lecon_cours_rech.php');

}else if(isset($_GET['clerech']) AND $_GET['clerech']!=''){    
include_once('../model.param_access/crs_lecon.class.php');
?>
 <table id="filtrer"  class="table table-bordered table-striped table-condensed">
<?php
    $lc = new crs_lecon();
    $lecon;
    $lecon = $lc->selectionnerBytitrelC($_GET['cours'],$_GET['clerech']);     
    $i=0;
    foreach($lecon as $selLc){
        $i++;
        ?>
        <tr id="filtrer" style="margin:3px">
        <?php
         ?>
          <td style="background-color: aliceblue; font-size:12px">[<?=$i;?>] Code : <?=$selLc['idLecon']?><br><center style="color:red">TITRE<br><?=$selLc['titreLecon']?><br><?=$selLc['anneeSco']?><br><a href='#' style='font-size:8px'><?=$selLc['nomUtilisateur'].'  '.$selLc['postnomUtilisateur'].' '.$selLc['prenomUtilisateur']?></a></center></br></td>
            <td style="height:100%;  background:#f2f2f2"> 
               <z class="dropdown">
                 <button data-toggle="dropdown" style=""><b class="caret ppull-right"></b></button>
                    <ul class="dropdown-menu pull-right">
                     <?php
                      $sel_C = new crs_lecon();
                      $sel_C=$sel_C->selectionnerByIdCours($selLc['idCours'])->fetch();
                        ?>
                              <li><a href="#" onclick="Orientation('../control.param_access/ctr_lecon.php?LireLecon=tue&maClasse=<?=$_GET['maClasse']?>&tlecon=<?=$selLc['titreLecon']?>&idcrs=<?=$sel_C['idCours']?>&cours=<?=$sel_C['cours']?>&idlc=<?=$selLc['idLecon']?>','#editLeco','')">Lire la leçon</a></i></li>
                              <li><a href="#" onclick="Orientation('../control.param_access/ctr_lecon.php?RelierLecon=tue&maClasse=<?=$_GET['maClasse']?>&tlecon=<?=$selLc['titreLecon']?>&idcrs=<?=$sel_C['idCours']?>&cours=<?=$sel_C['cours']?>&idlc=<?=$selLc['idLecon']?>','#resul','')">Rapporter</li>
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
}else if(isset($_GET['clerech']) AND $_GET['clerech']==''){    
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
          <td style="background-color: aliceblue; font-size:12px">[<?=$i;?>] Code : <?=$selLc['idLecon']?><br><center style="color:red">TITRE<br><?=$selLc['titreLecon']?><br><?=$selLc['anneeSco']?><br><a href='#' style='font-size:8px'><?=$selLc['nomUtilisateur'].'  '.$selLc['postnomUtilisateur'].' '.$selLc['prenomUtilisateur']?></a></center></br></td>
            <td style="height:100%;  background:#f2f2f2"> 
               <z class="dropdown">
                 <button data-toggle="dropdown" style=""><b class="caret ppull-right"></b></button>
                    <ul class="dropdown-menu pull-right">
                     <?php
                      $sel_C = new crs_lecon();
                      $sel_C=$sel_C->selectionnerByIdCours($selLc['idCours'])->fetch();
                        ?>
                              <li><a href="#" onclick="Orientation('../control.param_access/ctr_lecon.php?LireLecon=tue&maClasse=<?=$_GET['maClasse']?>&tlecon=<?=$selLc['titreLecon']?>&idcrs=<?=$sel_C['idCours']?>&cours=<?=$sel_C['cours']?>&idlc=<?=$selLc['idLecon']?>','#editLeco','')">Lire la leçon</a></i></li>
                              <li><a href="#" onclick="Orientation('../control.param_access/ctr_lecon.php?RelierLecon=tue&maClasse=<?=$_GET['maClasse']?>&tlecon=<?=$selLc['titreLecon']?>&idcrs=<?=$sel_C['idCours']?>&cours=<?=$sel_C['cours']?>&idlc=<?=$selLc['idLecon']?>','#resul','')">Rapporter</li>
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
    echo "ECHEC LECON";
}





?>