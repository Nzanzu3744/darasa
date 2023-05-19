<?php 
include_once('../model.param_access/param_utilisateur.class.php');
include_once('../model.param_access/org_classe.class.php');
include_once('../model.param_access/org_anneesco.class.php');
include_once('../model.param_access/dir_directeur.class.php');
?>
 <?php
 (empty($_SESSION))?session_start():'';
 ?>
<div class="col-sm-12">
   
    
    <header  id="titre">
        <nav class="navbar navbar-default table-responsive" style="height:56px;"> 
            <ul class="nav navbar-nav col-sm-11 ">
                <?php 
                    $ann = new org_anneesco();
                    $Maclasse = new org_classe();                 
                    $dir = new dir_directeur();                 
                    $idAnneeSco =null;
                    $anneeSco=null;
                    if(isset($_GET['idAnnee'])){
                        $ann= $ann->rechercher($_GET['idAnnee'])->fetch();
                        $idAnneeSco =$ann['idAnneeSco'];
                        $anneeSco=$ann['anneeSco'];
                        }else{
                         $ann= $ann->selectionnerDerAn()->fetch();
                         $idAnneeSco =$ann['idAnneeSco'];
                         $anneeSco=$ann['anneeSco'];
                        }
                    foreach($dir->selectionnerByUtiActif($_SESSION['idUtilisateur']) as $selDir){
                        foreach($Maclasse->selectionnerByProm($selDir['idPromotion']) as $sel){
                         $maClasse =" <z style=>".$sel['section'].":".$sel['unite']." ".$sel['promotion'].' '.$anneeSco."</z>";
                    ?>
                    <li style="border: 1px dashed green; width:20%; height:50px; font-size:11px"> <a href="#" onclick="showme3('#dessoueditLeco');showme('#leconsgauche','#editLeco','false'); Orientation('../control.param_access/ctr_cours.php?VueCours_dir&idPromotion=<?=$sel['idPromotion']?>&maClasse=<?=$maClasse?>&idAnneeSco=<?=$idAnneeSco?>&idClasse=<?=$sel['idClasse']?>','#editLeco')" name="<?php echo $sel['idClasse']?>"><?php echo strtoupper($maClasse)?></a></li> 
                    <?php 
                     }
                    }
                ?>   
            </ul>
            <select onchange="showme3('#dessoueditLeco');Orientation('../control.param_access/ctr_cours.php?VueClasseDir=true&idAnnee='+$(this).val(),'#panel');" style="border: 1px solid white; background:black; height:55px;font-size:11px; color:green;" class="pull-right col-sm-1">
             <?php 
                    $Maclasse = new org_anneesco();
                    if(isset($_GET['idAnnee'])){
                        $annSelect = org_anneesco::rechercher($_GET['idAnnee'])->fetch();
                        ?>
                        <option style="color:white"  value="<?php echo $annSelect['idAnneeSco']?>"><?php echo strtoupper($annSelect ['anneeSco'])?></option>
                        <?php
                    }
                    foreach($Maclasse->selectionnerDesc() as $sel){
                    ?>
                    <option  value="<?php echo $sel['idAnneeSco']?>"><?php echo strtoupper($sel['anneeSco'])?></option> 
                    <?php 
                     }
                ?>   
                </select>
        </nav>
        
    </header>
<section class="" id="corps" style="height:500px">
  <div> <i class="btn-xs glyphicon glyphicon-circle-arrow-left" style="color:green" onclick="showme('#leconsgauche','#editLeco','false')"  ></i><i class="btn-xs glyphicon glyphicon-circle-arrow-right" style="color:green"  onclick="showme('#leconsgauche','#editLeco','true')" ></i></div>

    <div id="editLeco" style="padding:0px; margin:0px; height:95%; width:100% display: inline-block;" class="well table-responsive">
        <center class="titres" style="font-size:30px; padding:9%" >Bonjour Mr.(Mm) DIRECTEUR(TRICE)<?=' <b> '.$_SESSION['nom'].' '.$_SESSION['prenom'].'</b>  !'?><br> La derniere année en cours est Selectionnée par defaut.<br>Selectionner une classe pour visualiser les lecons et devoirs par cours pour les <a>évaluers</a>. </center>
    </div>
    <div id="leconsgauche" class="col-sm-2" >
    </div>
    <div id="dessoueditLeco" class="col-sm-12 pull-right memu2" style="display: none">

    </div>   
</section>

</div>

