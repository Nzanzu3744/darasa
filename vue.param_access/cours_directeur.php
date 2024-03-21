<?php
(empty($_SESSION)) ? session_start() : '';
include_once('../model.param_access/param_utilisateur.class.php');
include_once('../model.param_access/org_classe.class.php');
include_once('../model.param_access/org_anneesco.class.php');
include_once('../model.param_access/dir_directeur.class.php');
?>

<div class="col-sm-12">


    <header id="titre">
        <nav class="navbar navbar-default table-responsive" style="height:56px;">
            <ul class="nav navbar-nav col-sm-11 ">
                <?php
                $ann = new org_anneesco();
                $mlasse = new org_classe();
                $dir = new dir_directeur();
                $idAnneeSco = null;
                $anneeSco = null;
                if (isset($_GET['idAnnee'])) {
                    $anne = $ann->rechercher($_GET['idAnnee'])->fetch();
                    $idAnneeSco = $anne['idAnneeSco'];
                    $anneeSco = $anne['anneeSco'];
                } else {
                    $anne = $ann->selectionnerDerAnEcode($_SESSION['monEcole']['idEcole'])->fetch();
                    if ($anne == true) {
                        $idAnneeSco = $anne['idAnneeSco'];
                        $anneeSco = $anne['anneeSco'];
                    }
                }
                foreach ($dir->selectionnerByUtiActifEcole($_SESSION['idUtilisateur'], $_SESSION['monEcole']['idEcole']) as $selDir) {
                    foreach ($mlasse->selectionnerByPromEcole($selDir['idPromotion'], $_SESSION['monEcole']['idEcole']) as $sel) {
                        $maClasse = " <z style=>" . $sel['section'] . ":" . $sel['unite'] . " " . $sel['promotion'] . ' ' . $anneeSco . "</z>";
                ?>
                        <li style="border: 1px dashed green; width:20%; height:50px; font-size:11px"> <a href="#" onclick="showme3('#dessoueditLeco');showme('#leconsgauche','#editLeco','false'); Orientation('../control.param_access/ctr_cours.php?VueCours_dir&idPromotion=<?= $sel['idPromotion'] ?>&maClasse=<?= $maClasse ?>&idAnneeSco=<?= $idAnneeSco ?>&idClasse=<?= $sel['idClasse'] ?>','#editLeco');"><?php echo strtoupper($maClasse) ?></a></li>
                <?php
                    }
                }
                ?>
            </ul>
            <select onchange="showme3('#dessoueditLeco');Orientation('../control.param_access/ctr_cours.php?VueClasseDir=true&idAnnee='+$(this).val(),'#panel');" style="border: 1px solid white; background:black; height:55px;font-size:11px; color:green;" class="pull-right col-sm-1">
                <?php

                if (isset($_GET['idAnnee'])) {
                    $annSelect = $ann->rechercher($_GET['idAnnee'])->fetch();
                ?>
                    <option style="color:white" value="<?php echo $annSelect['idAnneeSco'] ?>"><?php echo strtoupper($annSelect['anneeSco']) ?></option>
                <?php
                }
                foreach ($ann->selectionnerDescByEcole($_SESSION['monEcole']['idEcole']) as $sel) {
                ?>
                    <option value="<?php echo $sel['idAnneeSco'] ?>"><?php echo strtoupper($sel['anneeSco']) ?></option>
                <?php
                }
                ?>
            </select>
        </nav>

    </header>
    <section id="corps">
        <div style="margin:0px;padding:0px "> <i class="btn-xs glyphicon glyphicon-circle-arrow-left" role="button" style="color:green;margin-right:30px" onclick="showme('#leconsgauche','#editLeco','false')"></i><i class="btn-xs glyphicon glyphicon-circle-arrow-right" role="button" style="color:green;" onclick="showme('#leconsgauche','#editLeco','true')"></i></div>

        <div id="editLeco" class=" table-responsive heightSous_Fen">
            <img src="../images/directeur.gif" class="heightContSous_Fen" />
        </div>
        <div id="leconsgauche" class="col-sm-3 heightContSous_Fen_wid_0 box-shadow-dir " style="display: none;">
        </div>
        <div id="dessoueditLeco" class="col-sm-12 pull-right memu2" style="display: none">

        </div>
    </section>

</div>