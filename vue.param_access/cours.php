<?php 
include_once('../model.param_access/param_utilisateur.class.php');
include_once('../model.param_access/org_classe.class.php');
include_once('../model.param_access/org_anneesco.class.php');
?>
 <?php
 (empty($_SESSION))?session_start():'';
 ?>
<div class="panel panel-default col-sm-12">
   
    
    <header  id="titre">
        <nav class="navbar navbar-default table-responsive" style="height:56px;"> 
            <ul class="nav navbar-nav col-sm-11 ">
                <?php 
                    $perm = new org_classe();
                    $ann = new org_anneesco();
                    $ann= $ann->selectionnerDerAnAff($_SESSION['idUtilisateur'])->fetch();
                    $idAnneeSco =0;
                    (isset($_GET['idAnnee']))?$idAnneeSco=$_GET['idAnnee']:$idAnneeSco =$ann['idAnneeSco'];


                    foreach($perm->selectionnerByUt($_SESSION['idUtilisateur'],$idAnneeSco) as $sel){
                        // .$sel['anneeSco']
                         $maClasse =" <z style=>".$sel['section'].":".$sel['unite']." ".$sel['promotion'].' '.$sel['anneeSco']."</z>";
                    ?>
                    <li style="border: 2px dashed red; width:13%; height:55px;"> <a href="#" onclick="showme('#leconsgauche','#editLeco','false'); Orientation('../control.param_access/ctr_cours.php?VueCours&maClasse=<?=$maClasse?>&idAnneeSco=<?=$sel['idAnneeSco']?>&idAfft=<?=$sel['idAffectation']?>&idClasse=<?=$sel['idClasse']?>','#editLeco')" name="<?php echo $sel['idClasse']?>"><?php echo strtoupper($maClasse)?></a></li> 
                    <?php 
                     }
                ?>   
            </ul>
            <select onchange="Orientation('../control.param_access/ctr_cours.php?VueClasseAff=true&idAnnee='+$(this).val(),'#panel');" style="border: 1px solid white; background:black; height:55px;font-size:16px; color:white;" class="pull-right col-sm-1">
             <?php 
                    $perm = new org_anneesco();
                    if(isset($_GET['idAnnee'])){
                        $annSelect = org_anneesco::rechercher($_GET['idAnnee'])->fetch();
                        ?>
                        <option style="color:green"  value="<?=$annSelect['idAnneeSco']?>"><?=$annSelect['anneeSco']?></option>
                        <?php
                    }
                    foreach($perm->selectionnerByUtAff($_SESSION['idUtilisateur']) as $sel){
                    ?>
                    
                    <option  value="<?=$sel['idAnneeSco']?>"><?=strtoupper($sel['anneeSco'])?></option> 
                    <?php 
                     }
                ?>   
                </select>
        </nav>
        
    </header>
<section class="" id="corps" style="height:580px">
    <div id="editLeco" style="padding:0px; margin:0px; height:560px; width:100% display: inline-block;" class="well table-responsive">
        <center class="titres" style="font-size:30px; padding:10%" >Bonjour Mr.(Mm) ENSEIGNANT(E) <?=' <b> '.$_SESSION['nom'].' '.$_SESSION['prenom'].'</b>  !'?><br> La derniere année en cours de votre affectation est Selectionnée par defaut.<br>Selectionner une classe pour visualiser les lecons et devoirs par cours. </center>
    </div>
    <div id="leconsgauche" class="col-sm-2">
    </div>
    
</section>

</div>

