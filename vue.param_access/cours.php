<?php 
include_once('../model.param_access/param_utilisateur.class.php');
include_once('../model.param_access/org_classe.class.php');
include_once('../model.param_access/org_anneesco.class.php');
?>
 <?php
 (empty($_SESSION))?session_start():'';
 ?>
<div class="col-sm-12" style="">
   
    
    <header  id="titre">
        <nav class="navbar navbar-default table-responsive" style="height:56px;"> 
            <ul class="nav navbar-nav col-sm-11 ">
                <?php 
                    $perm = new org_classe();
                    $ann = new org_anneesco();
                    $ann= $ann->selectionnerDerAnAffCoA($_SESSION['idUtilisateur'])->fetch();
                    $annEE=0;
                    if($ann==true){
                               $annEE = $ann['idAnneeSco'];
                            }
                    $idAnneeSco =0;
                    (isset($_GET['idAnnee']))?$idAnneeSco=$_GET['idAnnee']:$idAnneeSco =$annEE;


                    foreach($perm->selectionnerByUt($_SESSION['idUtilisateur'],$idAnneeSco) as $sel){
                         $maClasse =$sel['section'].":".$sel['unite']." ".$sel['promotion'].' '.$sel['anneeSco'];
                    ?>
                    <li style="border: 1px dashed red; width:20%; height:50px; font-size:11px"> <a href="#" onclick="Orientation('control.param_access/ctr_cours.php?VueCours&maClasse=<?=$maClasse?>&idAnneeSco=<?=$sel['idAnneeSco']?>&idClasse=<?=$sel['idClasse']?>&idUtilisateur=<?=$sel['idUtilisateur']?>&idAffectation=<?=$sel['idAffectation']?>','#editLeco'); Orientation('control.param_access/ctr_classe.php?liste_eleve_cls=true&info=liste_eleve&idClasse=<?=$sel['idClasse']?>&maClasse=<?=$maClasse?>&idAnneeSco=<?=$sel['idAnneeSco']?>&hgt=500px&idAffectation=<?=$sel['idAffectation']?>','#fenetre4'); Orientation('control.param_access/ctr_bulletin.php?pre_bull=true&info=bulletin01&idClasse=<?=$sel['idClasse']?>&maClasse=<?=$maClasse?>&idAnneeSco=<?=$sel['idAnneeSco']?>&hgt=800px&idAffectation=<?=$sel['idAffectation']?>','#fenetre5'); Orientation('control.param_access/ctr_enseignant.php?liste_ensei=true&info=listeEnsi&idClasse=<?=$sel['idClasse']?>&maClasse=<?=$maClasse?>&idAnneeSco=<?=$sel['idAnneeSco']?>&hgt=500px&idAffectation=<?=$sel['idAffectation']?>','#fenetre6')" name="<?php echo $sel['idClasse']?>"><?php echo strtoupper($maClasse)?></a></li> 
                    <?php 
                     }
                ?>   
            </ul>
            <select onchange="Orientation('control.param_access/ctr_cours.php?VueClasseAff=true&idAnnee='+$(this).val(),'#panel');" style="border: 1px solid white; background:black; height:55px;font-size:11px; color:red;" class="pull-right col-sm-1">
             <?php 
                    $perm = new org_anneesco();
                    if(isset($_GET['idAnnee'])){
                        $annSelect = org_anneesco::rechercher($_GET['idAnnee'])->fetch();
                        ?>
                        <option style="color:white"  value="<?=$annSelect['idAnneeSco']?>"><?=$annSelect['anneeSco']?></option>
                        <?php
                    }
                    foreach($perm->selectionnerAnAffCoA($_SESSION['idUtilisateur']) as $sel){
                    ?>
                    
                    <option  value="<?=$sel['idAnneeSco']?>"><?=strtoupper($sel['anneeSco'])?></option> 
                    <?php 
                     }
                ?>   
                </select>
        </nav>
        
    </header>
<section class="" id="corps" style="height:500px">
    <div style="margin:0px; padding; 0px"> <i class="btn-xs glyphicon glyphicon-circle-arrow-left" style="color:red;font-size:20px" onclick="showme('#leconsgauche','#editLeco','false')"  ></i><i class="btn-xs glyphicon glyphicon-circle-arrow-right" style="color:red;font-size:20px"  onclick="showme('#leconsgauche','#editLeco','true')" ></i>
    </div>
    <div id="editLeco" style="padding:0px; margin:0px; height:95%; width:80% display: inline-block;" class="well table-responsive">
        <center class="titres" style="font-size:30px; padding:10%" >Bonjour Mr.(Mm) ENSEIGNANT(E) <?=' <b> '.$_SESSION['nom'].' '.$_SESSION['prenom'].'</b>  !'?><br> La derniere année en cours de votre affectation est Selectionnée par defaut.<br>Selectionner une classe pour visualiser les lecons et devoirs par cours. </center>
    </div>
    <div id="leconsgauche" class="col-sm-2">
    </div>
    
</section>

</div>

