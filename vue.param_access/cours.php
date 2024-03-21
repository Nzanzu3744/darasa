<?php
(empty($_SESSION)) ? session_start() : '';
include_once('../model.param_access/param_utilisateur.class.php');
include_once('../model.param_access/org_classe.class.php');
include_once('../model.param_access/org_anneesco.class.php');
?>
<div class="col-sm-12">
    <header id="titre">
        <nav class="navbar navbar-default table-responsive" style="height:56px;">
            <ul class="nav navbar-nav col-sm-11 ">
                <?php
                $perm = new org_classe();
                $ann = new org_anneesco();
                $ann = $ann->selectionnerDerAnAffCoAEcole($_SESSION['idUtilisateur'], $_SESSION['monEcole']['idEcole'])->fetch();
                $annEE = 0;
                if ($ann == true) {
                    $annEE = $ann['idAnneeSco'];
                }
                $idAnneeSco = 0;
                (isset($_GET['idAnnee'])) ? $idAnneeSco = $_GET['idAnnee'] : $idAnneeSco = $annEE;


                foreach ($perm->selectionnerByUt($_SESSION['idUtilisateur'], $idAnneeSco) as $sel) {
                    $maClasse = $sel['section'] . ":" . $sel['unite'] . " " . $sel['promotion'] . ' ' . $sel['anneeSco'];
                ?>
                    <li class="dropdown" style="border: 1px dashed red; width:20%; height:50px; font-size:11px"> <a data-toggle="dropdown" href="#" onclick="showme('#leconsgauche','#editLeco','false'); Orientation('../control.param_access/ctr_cours.php?VueCours&maClasse=<?= $maClasse ?>&idAnneeSco=<?= $sel['idAnneeSco'] ?>&idClasse=<?= $sel['idClasse'] ?>&idUtilisateur=<?= $sel['idUtilisateur'] ?>&idAffectation=<?= $sel['idAffectation'] ?>','#editLeco');" name="<?php echo $sel['idClasse'] ?>"><?php echo strtoupper($maClasse) ?></a></li>
                <?php
                }
                ?>
            </ul>
            <select onchange="Orientation('../control.param_access/ctr_cours.php?VueClasseAff=true&idAnnee='+$(this).val(),'#panel');" style="border: 1px solid white; background:black; height:55px;font-size:11px; color:red;" class="pull-right col-sm-1">
                <?php
                $perm = new org_anneesco();
                if (isset($_GET['idAnnee'])) {
                    $annSelect = org_anneesco::rechercher($_GET['idAnnee'])->fetch();
                ?>
                    <option style="color:white" value="<?= $annSelect['idAnneeSco'] ?>"><?= $annSelect['anneeSco'] ?></option>
                <?php
                }
                foreach ($perm->selectionnerAnAffCoAEcole($_SESSION['idUtilisateur'], $_SESSION['monEcole']['idEcole']) as $sel) {
                ?>

                    <option value="<?= $sel['idAnneeSco'] ?>"><?= strtoupper($sel['anneeSco']) ?></option>
                <?php
                }
                ?>
            </select>
        </nav>

    </header>
    <section class="" id="corps">
        <div style="margin:0px;padding:0px"> <i class="btn-xs glyphicon glyphicon-circle-arrow-left" role="button" style="color:red;margin-right:30px" onclick="showme('#leconsgauche','#editLeco','false')"></i><i class="btn-xs glyphicon glyphicon-circle-arrow-right" role="button" style="color:red;" onclick="showme('#leconsgauche','#editLeco','true')"></i>
        </div>
        <div id="editLeco" class="table-responsive heightSous_Fen">
            <img src="../images/enseignant21.PNG" class="heightContSous_Fen" />
        </div>
        <div id="leconsgauche" class="col-sm-3 heightContSous_Fen_wid_0 box-shadow-ense" style="display: none;">
        </div>

    </section>

</div>