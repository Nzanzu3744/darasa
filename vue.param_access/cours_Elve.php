<?php 
session_start();
include_once('../model.param_access/param_utilisateur.class.php');
include_once('../model.param_access/org_classe.class.php');
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
                    <li style="border: 1px dashed blue; font-size:11px"> <a href="#" onclick="showme('#leconsgauche','#editLeco','false'); Orientation('control.param_access/ctr_cours.php?VueCoursEleve&maClasse=<?=$maClasse?>&idAnneeSco=<?=$sel['idAnneeSco']?>&idIns=<?=$sel['idInscription']?>&idClasse=<?=$sel['idClasse']?>','#editLeco','');; Orientation('control.param_access/ctr_classe.php?liste_eleve_cls=true&info=liste_eleve&idClasse=<?=$sel['idClasse']?>&maClasse=<?=$maClasse?>&idAnneeSco=<?=$sel['idAnneeSco']?>&hgt=800px','#fenetre4'); Orientation('control.param_access/ctr_bulletin.php?pre_bull=true&info=bulletin01&idClasse=<?=$sel['idClasse']?>&maClasse=<?=$maClasse?>&idAnneeSco=<?=$sel['idAnneeSco']?>&hgt=800px','#fenetre5'); Orientation('control.param_access/ctr_enseignant.php?liste_ensei=true&info=listeEnsi&idClasse=<?=$sel['idClasse']?>&maClasse=<?=$maClasse?>&idAnneeSco=<?=$sel['idAnneeSco']?>&hgt=800px','#fenetre6')" name="<?php echo $sel['idClasse']?>"><?php echo strtoupper($maClasse)?></a></li> 
                    <?php 
                     }
                ?>   
            </ul>
        </nav>
    </header>
<section class="" id="corps" style="height:500px;">
  <div style=""> <i class="btn-xs glyphicon glyphicon-circle-arrow-left" style="color:blue;font-size:20px" onclick="showme('#leconsgauche','#editLeco','false')"  ></i><i class="btn-xs glyphicon glyphicon-circle-arrow-right" style="color:blue;font-size:20px"  onclick="showme('#leconsgauche','#editLeco','true')" ></i></div>

    <div id="editLeco" style="padding:0px; margin:0px; height:95%; width:80% display: inline-block;" class="well table-responsive">
        <center class="titres" style="font-size:30px; padding:10%" >Bonjour APPRENANT(E) <?=' <b> '.$_SESSION['nom'].' '.$_SESSION['prenom'].'</b>  !'?><br> Les classes dans les quelles vous vous etes inscrit du plus ancienne au plus recente.<br>Selectionner une classe pour visualiser les lecons et devoirs par cours. </center>
    </div>
    <div id="leconsgauche" class="col-sm-2" style="display:none">
    </div>
    
</section>

</div>

