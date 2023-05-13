<?php 
session_start();
include_once('../model.param_access/param_utilisateur.class.php');
include_once('../model.param_access/org_classe.class.php');
?>
 <?php
//  include_once('../vue.param_access/entete.php');
 ?>
<div id='gdpanel' class="panel panel-inverse col-sm-12">
   
    
    <header  id="titre">
        <nav class="navbar navbar-default">
            <ul class="nav navbar-nav">
                <?php 
                    $perm = new org_classe();
                    foreach($perm->selectionnerByUtIns(($_SESSION['idUtilisateur'])) as $sel){
                        $maClasse =$sel['section'].":".$sel['unite']." ".$sel['promotion'].' '.$sel['anneeSco'];
                    ?>
                    <li style="border: 1px dashed blue; font-size:11px"> <a href="#" onclick="showme('#leconsgauche','#editLeco','false'); Orientation('../control.param_access/ctr_cours.php?VueCoursEleve&maClasse=<?=$maClasse?>&idAnneeSco=<?=$sel['idAnneeSco']?>&idIns=<?=$sel['idInscription']?>&idClasse=<?=$sel['idClasse']?>','#editLeco','')" name="<?php echo $sel['idClasse']?>"><?php echo strtoupper($maClasse)?></a></li> 
                    <?php 
                     }
                ?>   
            </ul>
        </nav>
    </header>
<section class="" id="corps" style="height:450px;">
    <div id="editLeco" style="padding:0px; margin:0px; height:100%; width:80% display: inline-block;" class="well table-responsive">
        <center class="titres" style="font-size:30px; padding:10%" >Bonjour APPRENANT(E) <?=' <b> '.$_SESSION['nom'].' '.$_SESSION['prenom'].'</b>  !'?><br> Les classes dans les quelles vous vous etes inscrit du plus ancienne au plus recente.<br>Selectionner une classe pour visualiser les lecons et devoirs par cours. </center>
    </div>
    <div id="leconsgauche" class="col-sm-2" style="display:none">
    </div>
    
</section>

</div>

