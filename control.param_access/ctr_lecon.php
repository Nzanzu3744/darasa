<?php
(empty($_SESSION)) ? session_start() : '';
include_once('../control.param_access/mes_methodes.php');

if (isset($_GET['ajouterL']) and isset($_POST['lcn']) and isset($_POST['tlecon'])) {
    include_once('../model.param_access/crs_lecon.class.php');
    $idLecon = new crs_lecon();
?>
    <input disabled style="color:red;color:redcolor:red;width:0px;height:0px;padding:0px; margin:0px;padding:0px" id="idlc" name="idlc" value='<?= $idLecon->ajouter($_GET['idCours'], $_POST['tlecon'], $_POST['lcn'], $_SESSION['idUtilisateur']) ?>'>
<?php
    include_once('../vue.param_access/form_lecon_mod_ense.php');
} elseif (isset($_GET['Modifier']) and isset($_POST['lcn']) and isset($_POST['tlecon'])) {
    include_once('../model.param_access/crs_lecon.class.php');
    $var = new crs_lecon();
?>
    <input disabled style="color:green; color:redcolor:red;width:0px;height:0px;padding:0px; margin:-20px;padding:-10px" id="idlc" name="idlc" value='<?= $_GET['idlc'] ?>' />
<?php
    $var->modifier($_GET['idlc'], $_GET['idCours'], $_POST['tlecon'], $_POST['lcn'], $_SESSION['idUtilisateur']);
    include_once('../vue.param_access/form_lecon_mod_ense.php');
} else if (isset($_GET['ajouterLViaDir']) and isset($_POST['lcn']) and $_GET['idlc'] != "undefined") {
    include_once('../model.param_access/crs_lecon.class.php');
    $var = new crs_lecon();
?>
    <input disabled style="color:green;color:redcolor:red;width:0px;height:0px;padding:0px; margin:-20px;padding:-10px" id="idlc" name="idlc" value='<?= $_GET['idlc'] ?>' />
<?php
    $var->modifier($_GET['idlc'], $_GET['idCours'], $_GET['tlecon'], $_POST['lcn'], $_SESSION['idUtilisateur']);
    include_once('../vue.param_access/form_lecon_mod_dir.php');
} else if (isset($_GET['premiF']) and isset($_GET['idCours'])) {
    include_once('../vue.param_access/form_lecon.php');
} else  if (isset($_GET['leconsgauche_ense']) and isset($_GET['idCours'])) {
    include_once('../vue.param_access/lecon_cours_ense_cls.php');
    //LECTURE LECON
} else  if (isset($_GET['leconsgauche_dir']) and isset($_GET['idCours'])) {
    include_once('../vue.param_access/lecon_cours_dir_cls.php');
    //LECTURE LECON
} else  if (isset($_GET['leconsgauche_eleve']) and isset($_GET['idCours'])) {
    include_once('../vue.param_access/lecon_cours_eleve_cls.php');
    //LECTURE LECON


} else if (isset($_GET['LireLecon_ense'])  and $_GET['type'] == 1) {
    include_once('../vue.param_access/form_lecon_mod_ense.php');
} else if (isset($_GET['LireLecon_ense'])  and $_GET['type'] == 2) {
?>
    <input disabled style="color:red;color:redcolor:red;width:0px;height:0px;padding:0px; margin:-20px;padding:-10px" id="idlc" name="idlc" value='<?= $_GET['idlc'] ?>' />
<?php
    include_once('../vue.param_access/ifram_lecon_video.php');
} else if (isset($_GET['LireLecon_ense'])  and $_GET['type'] == 3) {
?>
    <input disabled style="color:red;color:redcolor:red;width:0px;height:0px;padding:0px; margin:-20px;padding:-10px" id="idlc" name="idlc" value='<?= $_GET['idlc'] ?>' />
<?php
    include_once('../vue.param_access/ifram_lecon_pdf.php');
} else if (isset($_GET['LireLecon'])) {
?>
    <input disabled style="color:red;color:redcolor:red;width:0px;height:0px;padding:0px; margin:-20px;padding:-10px" id="idlc" name="idlc" value='<?= $_GET['idlc'] ?>' />
<?php
    include_once('../vue.param_access/form_lecon_mod_ense.php');
} else if (isset($_GET['RelierLecon']) and $_GET['type'] == 1) {
    include_once('../model.param_access/crs_reler_lecon.class.php');
    include_once('../model.param_access/org_anneesco.class.php');
    $rl = new crs_reler_lecon();
    $sel_A = new org_anneesco();
    $sel_A = $sel_A->selectionnerDerAn()->fetch();
    $rl->ajouter($_GET['idlc'], $_GET['idCours'], $sel_A['idAnneeSco']);

    echo "Rapportage reussi de la lecon code " . $_GET['idlc'];

    //
} else if (isset($_GET['RelierLecon']) and $_GET['type'] == 2) {
    include_once('../model.param_access/crs_reler_lecon_video.class.php');
    include_once('../model.param_access/org_anneesco.class.php');
    $rl = new crs_reler_lecon_video();
    $sel_A = new org_anneesco();
    $sel_A = $sel_A->selectionnerDerAn()->fetch();
    $rl->ajouter($_GET['idlc'], $_GET['idCours'], $sel_A['idAnneeSco']);

    echo "Rapportage reussi de la lecon code " . $_GET['idlc'];
} else if (isset($_GET['RelierLecon']) and $_GET['type'] == 3) {
    include_once('../model.param_access/crs_reler_lecon_pdf.class.php');
    include_once('../model.param_access/org_anneesco.class.php');
    $rl = new crs_reler_lecon_pdf();
    $sel_A = new org_anneesco();
    $sel_A = $sel_A->selectionnerDerAn()->fetch();
    $rl->ajouter($_GET['idlc'], $_GET['idCours'], $sel_A['idAnneeSco']);

    echo "Rapportage reussi de la lecon code " . $_GET['idlc'];
} else if (isset($_GET['LireLecon_eleve']) and $_GET['type'] == 1) {
    include_once('../model.param_access/visite_lecon.class.php');

    visite_lecon::ajouter($_GET['idlc'], $_GET['idCours'], $_SESSION['idUtilisateur'], $_GET['idIns']);
    // echo '<labelle disabled style="color:blue" id="idlc"  name="idlc">' . $_GET['idlc'] . '</labelle>';

    include_once('../vue.param_access/lecon_eleve.php');
} else if (isset($_GET['LireLecon_eleve']) and $_GET['type'] == 2) {
    include_once('../model.param_access/visite_lecon_video.class.php');
    visite_lecon_video::ajouter($_GET['idlc'], $_GET['idCours'], $_SESSION['idUtilisateur'], $_GET['idIns']);
    // echo '<labelle disabled style="color:blue" id="idlc"  name="idlc">' . $_GET['idlc'] . '</labelle>';
    include_once('../vue.param_access/ifram_lecon_video.php');
} else if (isset($_GET['LireLecon_eleve']) and $_GET['type'] == 3) {
    include_once('../model.param_access/visite_lecon_pdf.class.php');
    visite_lecon_pdf::ajouter($_GET['idlc'], $_GET['idCours'], $_SESSION['idUtilisateur'], $_GET['idIns']);
    // echo '<labelle disabled style="color:blue" id="idlc"  name="idlc">' . $_GET['idlc'] . '</labelle>';
    include_once('../vue.param_access/ifram_lecon_pdf.php');
} else if (isset($_GET['rechercheGauche_ense'])) {
    include_once('../vue.param_access/lecon_cours_rech_ense.php');
} else if (isset($_GET['rechercheGauche_dir'])) {
    include_once('../vue.param_access/lecon_cours_rech_dir.php');
} else if (isset($_GET['clerech_ense']) and $_GET['clerech_ense'] != '') {
    include_once('../model.param_access/crs_lecon.class.php');
    include_once('../model.param_access/crs_prepacours.class.php');

    echo  $idcrs = htmlspecialchars($_GET['idCours']);
    echo '=-=';
    echo  $rech =  htmlspecialchars($_GET['clerech_ense']);
    $prepacrs = crs_prepacours::rechercherPrepabyIdCrs($idcrs)->fetch();
    $lecon = crs_lecon::selectionnerBytlecoIdPrep($prepacrs['idPrepaCours'], $rech)->fetchAll();
    $i = 0;
    print_r($lecon);
} else if (isset($_GET['clerech_ense']) and $_GET['clerech_ense'] == '') {
    include_once('../model.param_access/crs_lecon.class.php');
?>
    <table id="filtrer" class="table table-bordered table-striped table-condensed">
        <?php
        $lc = new crs_lecon();
        $lecon;
        $idcrs = htmlspecialchars($_GET['idCours']);
        $lecon = $lc->selectionnerByCours($idcrs);
        $i = 0;
        foreach ($lecon as $_GET) {
            $i++;
        ?>
            <tr id="filtrer" style="margin:3px">
                <?php
                ?>
                <td style="background-color: aliceblue; font-size:12px">[<?= $i; ?>] Code : <?= $_GET['idLecon'] ?><br>
                    <center style="color:red">TITRE<br><?= $_GET['titreLecon'] ?><br><?= $_GET['anneeSco'] ?><br><a href='#' style='font-size:8px'><?= $_GET['nomUtilisateur'] . '  ' . $_GET['postnomUtilisateur'] . ' ' . $_GET['prenomUtilisateur'] ?></a></br> <mark style="color:black"><?= ($_GET['actif'] != 1) ? "LECON DESACTIVE" : 'ACTIVE' ?></mark></center></br>
                </td>
                <td style="height:100%;  background:#f2f2f2">
                    <z class="dropdown">
                        <button data-toggle="dropdown"><b class="caret ppull-right"></b></button>
                        <ul class="dropdown-menu pull-right">
                            <?php
                            $sel_C = new crs_lecon();
                            $sel_C = $sel_C->selectionnerByIdCours($_GET['idCours'])->fetch();
                            ?>
                            <li><a href="#" onclick='Orientation(" ../control.param_access/ctr_lecon.php?LireLecon_ense=tue&maClasse=<?= $_GET["maClasse"] ?>&tlecon=<?= $_GET["titreLecon"] ?>&idCours=<?= $sel_C["idCours"] ?>&cours=<?= $sel_C["cours"] ?>&idlc=<?= $_GET["idLecon"] ?>","#editLeco","")'>Lire la leçon</a></i></li>
                            <li><a href="#" onclick=' Orientation(" ../control.param_access/ctr_lecon.php?RelierLecon=tue&maClasse=<?= $_GET["maClasse"] ?>&tlecon=<?= $_GET["titreLecon"] ?>&idCours=<?= $_GET["idCours"] ?>&cours=<?= $sel_C["cours"] ?>&idlc=<?= $_GET["idLecon"] ?>","#resul","")'>Rapporter</li>
                        </ul>
                    </z>
                </td>
            </tr>
    </table>
<?php
        }
    } else if (isset($_GET['clerech_dir']) and $_GET['clerech_dir'] != '') {
        include_once('../model.param_access/crs_prepacours.class.php');
        include_once('../model.param_access/crs_lecon.class.php');
        $idcrs = htmlspecialchars($_GET['idCours']);
        $rech =  htmlspecialchars($_GET['clerech_ense']);
        $prepacrs = crs_prepacours::rechercherPrepabyIdCrs($idcrs)->fetch();
?>
<table id="filtrer" class="table table-bordered table-striped table-condensed">
    <?php

        $lecon = crs_lecon::selectionnerBytlecoIdPrep($prepacrs['idPrepaCours'], $_GET['clerech_dir']);
        $i = 0;
        foreach ($lecon as $_GET) {
            $i++;
    ?>
        <tr id="filtrer" style="margin:3px">
            <?php
            ?>
            <td style="background-color: aliceblue; font-size:12px">[<?= $i; ?>] Code : <?= $_GET['idLecon'] ?><br>
                <center style="color:green">TITRE<br><?= $_GET['titreLecon'] ?><br><?= $_GET['anneeSco'] ?><br><a href='#' style='font-size:8px'><?= $_GET['nomUtilisateur'] . '  ' . $_GET['postnomUtilisateur'] . ' ' . $_GET['prenomUtilisateur'] ?></a><br> <mark style="color:black"><?= ($_GET['actif'] != 1) ? "LECON DESACTIVE" : 'ACTIVE' ?></mark></center></br>
            </td>
            <td style="height:100%;  background:#f2f2f2">
                <z class="dropdown">
                    <button data-toggle="dropdown"><b class="caret ppull-right"></b></button>
                    <ul class="dropdown-menu pull-right">
                        <?php
                        $sel_C = new crs_lecon();
                        $sel_C = $sel_C->selectionnerByIdCours($_GET['idCours'])->fetch();
                        ?>
                        <li><a href='#' onclick="showme2('#dessoueditLeco'); Orientation('../control.param_access/ctr_lecon.php?LireLecon_ense=tue&idPromotion=<?= $_GET['idPromotion'] ?>&maClasse=<?= $_GET['maClasse'] ?>&tlecon=<?= $_GET['titreLecon'] ?>&idCours=<?= $_GET['idCours'] ?>&cours=<?= $sel_C['cours'] ?>&idlc=<?= $_GET['idLecon'] ?>','#editLeco',''); Orientation('../control.param_access/ctr_lecon.php?Evalue=tue&idPromotion=<?= $_GET['idPromotion'] ?>&maClasse=<?= $_GET['maClasse'] ?>&tlecon=<?= $_GET['titreLecon'] ?>&idCours=<?= $_GET['idCours'] ?>&cours=<?= $sel_C['cours'] ?>&idLecon=<?= $_GET['idLecon'] ?>','#dessoueditLeco','')">Lire la leçon</a></i></li>
                        <li><a href="#" onclick='Orientation(" ../control.param_access/ctr_lecon.php?RelierLecon=tue&maClasse=<?= $_GET["maClasse"] ?>&tlecon=<?= $_GET["titreLecon"] ?>&idCours=<?= $_GET["idCours"] ?>&cours=<?= $sel_C["cours"] ?>&idlc=<?= $_GET["idLecon"] ?>","#resul","")'>Rapporter</li>

                    </ul>
                </z>
            </td>
        </tr>
</table>
<?php
        }
    } else if (isset($_GET['clerech_dir']) and $_GET['clerech_dir'] == '') {
        include_once('../model.param_access/crs_lecon.class.php');
?>
<table id="filtrer" class="table table-bordered table-striped table-condensed">
    <?php
        $lc = new crs_lecon();
        $idcrs = htmlspecialchars($_GET['idCours']);
        $lecon = $lc->selectionnerByCours($idcrs);

        $i = 0;
        foreach ($lecon as $_GET) {
            $i++;
    ?>
        <tr id="filtrer" style="margin:3px">
            <?php
            ?>
            <td style="background-color: aliceblue; font-size:12px">[<?= $i; ?>] Code : <?= $_GET['idLecon'] ?><br>
                <center style="color:green">TITRE<br><?= $_GET['titreLecon'] ?><br><?= $_GET['anneeSco'] ?><br><a href='#' style='font-size:8px'><?= $_GET['nomUtilisateur'] . '  ' . $_GET['postnomUtilisateur'] . ' ' . $_GET['prenomUtilisateur'] ?></a><br> <mark style="color:black"><?= ($_GET['actif'] != 1) ? "LECON DESACTIVE" : 'ACTIVE' ?></mark></center></br>
            </td>
            <td style="height:100%;  background:#f2f2f2">
                <z class="dropdown">
                    <button data-toggle="dropdown"><b class="caret ppull-right"></b></button>
                    <ul class="dropdown-menu pull-right">
                        <?php
                        $sel_C = new crs_lecon();
                        $sel_C = $sel_C->selectionnerByIdCours($_GET['idCours'])->fetch();
                        ?>
                        <li><a href='#' onclick="showme2('#dessoueditLeco'); Orientation('../control.param_access/ctr_lecon.php?LireLecon_ense=tue&idPromotion=<?= $_GET['idPromotion'] ?>&maClasse=<?= $_GET['maClasse'] ?>&tlecon=<?= $_GET['titreLecon'] ?>&idCours=<?= $_GET['idCours'] ?>&cours=<?= $sel_C['cours'] ?>&idlc=<?= $_GET['idLecon'] ?>','#editLeco',''); Orientation('../control.param_access/ctr_lecon.php?Evalue=tue&idPromotion=<?= $_GET['idPromotion'] ?>&maClasse=<?= $_GET['maClasse'] ?>&tlecon=<?= $_GET['titreLecon'] ?>&idCours=<?= $_GET['idCours'] ?>&cours=<?= $sel_C['cours'] ?>&idLecon=<?= $_GET['idLecon'] ?>','#dessoueditLeco','')">Lire la leçon</a></i></li>
                        <li><a href="#" onclick='Orientation(" ../control.param_access/ctr_lecon.php?RelierLecon=tue&maClasse=<?= $_GET["maClasse"] ?>&tlecon=<?= $_GET["titreLecon"] ?>&idCours=<?= $_GET["idCours"] ?>&cours=<?= $sel_C["cours"] ?>&idlc=<?= $_GET["idLecon"] ?>","#resul","")'>Rapporter</li>

                    </ul>
                </z>
            </td>
        </tr>
</table>
<?php
        }
    } else if (isset($_GET['Evalue']) and isset($_GET['idLecon'])) {
        include_once('../vue.param_access/form_evaluation_lecon.php');
    } else if (isset($_GET['evalue']) and isset($_GET['Subj']) and isset($_GET['pt'])) {
        include_once('../model.param_access/dir_subjection_lecon.class.php');
        include_once('../model.param_access/dir_directeur.class.php');
        $affDir = new dir_directeur();
        $affDir = $affDir->selectionnerByUtiPromActif($_SESSION['idUtilisateur'], $_GET['idPromotion'])->fetch();
        $sbj = new dir_subjection_lecon();
        $sbj = $sbj->ajouter($affDir['idDirecteur'], $_GET['idLecon'], $_GET['Subj'], $_GET['pt']);
        echo '<i style="color:green">ENREGISTREMENT REUSSI</i>';
    } else if (isset($_GET['activer']) and isset($_GET['idLecon']) and isset($_GET['value'])) {

        $actLeson = '';
        if ($_GET['type'] == 1) {
            include_once('../model.param_access/crs_lecon.class.php');

            if ($_GET['value'] == 1) {
                $actLeson = crs_lecon::activer($_GET['idLecon'], 0);
?>
    <input id="actif" class="btn btn-lg btn-success  btn-xs" value="__ACTIVER__" onclick='Orientation("../control.param_access/ctr_lecon.php?activer=true&idLecon=<?= $_GET["idLecon"] ?>&value=0&type=<?= $_GET["type"] ?>","#resul","")' type="button">
<?php
            } else {
                $actLeson = crs_lecon::activer($_GET['idLecon'], 1);
?>
    <input id="actif" class="btn btn-lg btn-success  btn-xs" value="DESACTIVER" onclick='Orientation("../control.param_access/ctr_lecon.php?activer=true&idLecon=<?= $_GET["idLecon"] ?>&value=1&type=<?= $_GET["type"] ?>","#resul","")' type="button">
<?php
            }
        } elseif ($_GET['type'] == 2) {
            include_once('../model.param_access/crs_lecon_video.class.php');
            if ($_GET['value'] == 1) {
                $actLeson = crs_lecon_video::activer($_GET['idLecon'], 0);
?>
    <input id="actif" class="btn btn-lg btn-danger  btn-xs" value="__ACTIVER__" onclick='Orientation("../control.param_access/ctr_lecon.php?activer=true&idLecon=<?= $_GET["idLecon"] ?>&value=0&type=<?= $_GET["type"] ?>","#resul","")' type="button">
<?php
            } else {
                $actLeson = crs_lecon_video::activer($_GET['idLecon'], 1);
?>
    <input id="actif" class="btn btn-lg btn-danger  btn-xs" value="DESACTIVER" onclick='Orientation("../control.param_access/ctr_lecon.php?activer=true&idLecon=<?= $_GET["idLecon"] ?>&value=1&type=<?= $_GET["type"] ?>","#resul","")' type="button">
<?php
            }
        } elseif ($_GET['type'] == 3) {
            include_once('../model.param_access/crs_lecon_pdf.class.php');

            if ($_GET['value'] == 1) {
                $actLeson = crs_lecon_pdf::activer($_GET['idLecon'], 0);
?>
    <input id="actif" class="btn btn-lg btn-worning  btn-xs" value="__ACTIVER__" onclick='Orientation(" ../control.param_access/ctr_lecon.php?activer=true&idLecon=<?= $_GET["idLecon"] ?>&value=0&type=<?= $_GET["type"] ?>","#resul","")' type="button">
<?php
            } else {
                $actLeson = crs_lecon_pdf::activer($_GET['idLecon'], 1);
?>
    <input id="actif" class="btn btn-lg btn-worning  btn-xs" value="DESACTIVER" onclick='Orientation(" ../control.param_access/ctr_lecon.php?activer=true&idLecon=<?= $_GET["idLecon"] ?>&value=1&type=<?= $_GET["type"] ?>","#resul","")' type="button">
<?php
            }
        }
    } else if (isset($_GET['supLc']) and $_GET['type'] == 1) {
        include_once('../model.param_access/crs_lecon.class.php');
        $idl = htmlspecialchars($_GET['idlc']);

        crs_lecon::supprimer($idl);
        include_once('../vue.param_access/lecon_cours_ense_cls.php');
    } else if (isset($_GET['supLc']) and $_GET['type'] == 2) {
        include_once('../model.param_access/crs_lecon_video.class.php');
        $idLeconVd = htmlentities($_GET['idlc']);

        if (!crs_lecon_video::verifVisiteRele($idLeconVd)->fetch()) {
            $path  = "../videoLecon_" . $_SESSION['monEcole']['idEcole'] . "/";
            if (is_dir($path) == true) {
                $leconVd = crs_lecon_video::rechercher($idLeconVd)->fetch();
                $fichier = $leconVd['urlVideo'];
                if (file_exists($fichier)) {
                    if (@unlink($fichier) == true) {
                        if (crs_lecon_video::supprimer($idLeconVd) == true) {
                        } else {

                            echec_controleur(' DE SUPPRESSION BD');
                        }
                    } else {

                        echec_controleur('LA LECON EST A LECTURE');
                    }
                } else {

                    echec_controleur('FICHIER INEXISTANT [' . $fichier . ']');
                }
            } else {
                echec_controleur('CHEMIN D\'ACCES INTROUVSBLE');
            }
        } else {
            echec_controleur('LA LECON EST REFERENCIEE');
        }

        include_once('../vue.param_access/lecon_cours_ense_cls.php');
    } else if (isset($_GET['supLc']) and $_GET['type'] == 3) {
        include_once('../model.param_access/crs_lecon_pdf.class.php');
        $idlPdf = htmlspecialchars($_GET['idlc']);

        if (!crs_lecon_pdf::verifVisiteRele($idlPdf)->fetch()) {
            $path  = "../pdfLecon_" . $_SESSION['monEcole']['idEcole'] . "/";
            if (is_dir($path) == true) {
                $leconPdf = crs_lecon_pdf::rechercher($idlPdf)->fetch();
                $fichier = $leconPdf['urlPdf'];
                if (file_exists($fichier)) {
                    if (@unlink($fichier) == true) {
                        if (crs_lecon_pdf::supprimer($idlPdf) == true) {
                        } else {

                            echec_controleur(' DE SUPPRESSION BD');
                        }
                    } else {

                        echec_controleur('LA LECON EST A LECTURE');
                    }
                } else {
                    echec_controleur('FICHIER INEXISTANT [' . $fichier . ']');
                }
            } else {
                echec_controleur('CHEMIN D\'ACCES INTROUVSBLE');
            }
        } else {
            echec_controleur('LA LECON EST REFERENCIEE');
        }

        include_once('../vue.param_access/lecon_cours_ense_cls.php');
    } else {

        echec_controleur('LECON WEB');
    }
?>