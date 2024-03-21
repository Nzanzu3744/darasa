<?php
(empty($_SESSION)) ? session_start() : '';
include_once('../model.param_access/crs_devoirs.class.php');
include_once('../model.param_access/crs_lecon.class.php');
include_once('../model.param_access/visite_lecon.class.php');
include_once('../control.param_access/mes_methodes.php');
include_once('../model.param_access/crs_cours.class.php');
include_once('../model.param_access/org_inscription.class.php');

$idCrs01 = htmlspecialchars($_GET['idCours']);
$idClasse = htmlspecialchars($_GET['idClasse']);
$idAnneeSco = htmlspecialchars($_GET['idAnneeSco']);
?>
<div class=" heightSous_Fen">
    <div class="col-sm-12 rubaBoutonDoc">
        <span type="button" class=" btn btn-sm btn-default  glyphicon glyphicon-print" style="margin:3px" value="Imprimer" onclick="imprimer('grille_lecteur')"></span>

    </div>
    <div style="margin: 70px;" id='grille_lecteur'>
        <?php
        $crs = crs_cours::rechercher($idCrs01)->fetch();
        // $etab = $_SESSION['monEcole']['nomEcole'];;
        // $logo = $_SESSION['monEcole']['logoEcole'];
        // $bp = "B.P." . $_SESSION['monEcole']['bpEcole'] . " " . $_SESSION['monEcole']['nomVilleTerritoire'];
        // $t1 = "GRILLE DE LECTEURS   COURS  [ " . $crs['cours'] . "] ";
        // $t2 = " CLASSE :" . $_GET['maClasse'];
        // $editer = array($crs['nomUtilisateur'], $crs['postnomUtilisateur'], $crs['prenomUtilisateur']);
        // entete_doc($etab, $logo, $bp, $t1, $t2, $editer);
        ?>
        <?php
        include_once('../vue.param_access/enteteDL.php');
        ?>
        <p class="titreLecon">
            GRILLE DE LECTEURS COURS <? ' ' . $crs['cours'] ?>
        </p>
        <table class="table-bordered table-responsive  table-striped table-condensed">
            <thead>
                <tr>
                    <th style="background:WHITE" colspan="">N</th>
                    <th style="background:WHITE; color:red" colspan="3">
                        <center>IDENTITE ELEVE<center>
                    </th>
                    <?php
                    $lc = crs_lecon::selectionnerByCours($idCrs01)->fetchAll();
                    $tourPrev = 1;

                    foreach ($lc as $selLc) {

                    ?>

                        <th class="rotate">
                            <div>
                                <span>
                                    <?php
                                    echo strtoupper($tourPrev++ . ') ' . $selLc['titreLecon'] . ' [' . $selLc['idLecon'] . ']');
                                    ?>

                                </span>

                            </div>
                        </th>
                    <?php
                    }
                    ?>
                    <th>
                        <center> TOTAL PAR ELEVE </center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                //SI IL NY A PAS DE DEVOIR A CE COUR NE CHECHER PAS


                $grd_tour_vis = org_inscription::rechercherByClAnnee($idClasse, $idAnneeSco);

                $cpt = 0;
                foreach ($grd_tour_vis  as $sel_grd_tour_vis) {
                    $cpt++;
                    echo '<tr style="font-size:10px" ><td style="color:red">' . $cpt . '</td>';
                    echo '<td style="color:red"><img style="width:40px; height:40px" src=../images/' . $sel_grd_tour_vis['photoUtilisateur'] . '></td>';
                    echo '<td>' . $sel_grd_tour_vis['idUtilisateur'] . '</td><td style="font-size:11px">' . $sel_grd_tour_vis['nomUtilisateur'] . ' ' . $sel_grd_tour_vis['postnomUtilisateur'] . ' ' . $sel_grd_tour_vis['prenomUtilisateur'] . '</td>';
                    $sommeVueEleve = 0;

                    foreach ($lc as $selLc) {
                ?>

                        <td>
                            <?php

                            if (visite_lecon::vuesByIns($selLc['idLecon'], $idCrs01, $selLc['type'], $idClasse, $sel_grd_tour_vis['idInscription'])->fetchAll() != null) {
                                $sommeVueEleve += 1;
                            ?>
                                <span style="color:green; font-size:12px" class="glyphicon glyphicon-ok"></span>
                            <?php
                            } else {
                            ?>
                                <span style="color:red; font-size:12px" class="glyphicon glyphicon-remove"></span>
                            <?php
                            }
                            ?>
                        </td>
                    <?php
                    }
                    ?>
                    <th style="font-size:18px;">
                        <?php
                        echo $sommeVueEleve;
                        ?>
                    </th>
                <?php
                    //-------------------------------------
                }
                ?>
                </tr>
                <tr>

                    <th colspan="4">
                        <center>TOTAL VUES PAR LECON<center>
                    </th>
                    <?php
                    $sommeVue = 0;
                    foreach ($lc as $selLc) {

                    ?>

                        <th style="font-size:18px">
                            <?php
                            echo $vue = count(visite_lecon::vues($selLc['idLecon'], $idCrs01, $selLc['type'], $idClasse)->fetchAll());

                            $sommeVue += $vue;

                            ?>
                        </th>
                    <?php
                    }
                    ?>
                    <th style="font-size:18px">
                        <?php
                        echo $sommeVue;
                        ?>
                    </th>
                </tr>
            </tbody>
        </table>
    </div>
</div>