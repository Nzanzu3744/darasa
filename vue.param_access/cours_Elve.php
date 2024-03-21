<?php
include_once('../model.param_access/param_utilisateur.class.php');
include_once('../model.param_access/org_classe.class.php');
?>

<div id='gdpanel' class="panel panel-inverse col-sm-12">
    <header id="titre">
        <nav class="navbar navbar-default">
            <ul class="nav navbar-nav">
                <?php
                $perm = new org_classe();
                foreach ($perm->selectionnerByUtInsEcole($_SESSION['idUtilisateur'], $_SESSION['monEcole']['idEcole']) as $sel) {
                    $maClasse = $sel['section'] . ":" . $sel['unite'] . " " . $sel['promotion'] . ' ' . $sel['anneeSco'];
                ?>
                    <li class="dropdown" style="border: 1px dashed blue; font-size:11px"> <a data-toggle="dropdown" href="#" onclick="showme('#leconsgauche','#editLeco','false');  Orientation('../control.param_access/ctr_cours.php?VueCoursEleve&maClasse=<?= $maClasse ?>&idAnneeSco=<?= $sel['idAnneeSco'] ?>&idIns=<?= $sel['idInscription'] ?>&idClasse=<?= $sel['idClasse'] ?>','#editLeco','');" name="<?php echo $sel['idClasse'] ?>"><?php echo strtoupper($maClasse) ?></a></li>
                <?php
                }
                ?>
            </ul>
        </nav>
    </header>
    <section id="corps">
        <div> <i class="btn-xs glyphicon glyphicon-circle-arrow-left" role="button" style="color:blue;margin-right:30px" onclick="showme('#leconsgauche','#editLeco','false')"></i><i class="btn-xs glyphicon glyphicon-circle-arrow-right" role="button" style="color:blue;" onclick="showme('#leconsgauche','#editLeco','true')"></i></div>
        <div id="editLeco" class=" table-responsive heightSous_Fen">
            <img src="../images/bluepeopleonsite.png" class="heightContSous_Fen" />
        </div>
        <div id="leconsgauche" class="col-sm-3 heightContSous_Fen_wid_0 box-shadow-eleve" style="display: none;">
        </div>
    </section>
</div>