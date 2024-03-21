<?php
(empty($_SESSION)) ? session_start() : '';
include_once('../model.param_access/crs_question.class.php');
include_once('../model.param_access/crs_devoirs.class.php');
include_once('../model.param_access/crs_assertion.class.php');
include_once('../model.param_access/crs_reponset.class.php');
include_once('../model.param_access/crs_reponsec.class.php');
include_once('../model.param_access/crs_correction.class.php');
include_once('../model.param_access/crs_cours.class.php');
include_once('../model.param_access/org_inscription.class.php');
include_once('../model.param_access/org_periode.class.php');
include_once('../model.param_access/param_groupe_periode.class.php');
include_once('../model.param_access/param_groupe_periode.class.php');
include_once('../control.param_access/mes_methodes.php');
include_once('../model.param_access/suivie_remise_devoirs.class.php');
$idCls = htmlspecialchars($_GET['idClasse']);
$idCrs01 = htmlentities($_GET['idCours']);
$idAnn = htmlspecialchars($_GET['idAnneeSco']);

$pondToutDevoir = 0.0;
?>
<div class=" heightSous_Fen">
    <div class="col-sm-12 rubaBoutonDoc">
        <span type="button" class=" btn btn-sm btn-default  glyphicon glyphicon-print" style="margin:3px" value="Imprimer" onclick="imprimer('grille_point')"></span>

    </div>
    <div style="margin: 70px;" id='grille_point'>
        <!-- ENTETE BULLETIN -->
        <?php
        $crs = crs_cours::rechercher($idCrs01)->fetch();
        // $etab = $_SESSION['monEcole']['nomEcole'];;
        // $logo = $_SESSION['monEcole']['logoEcole'];
        // $bp = "B.P." . $_SESSION['monEcole']['bpEcole'] . " " . $_SESSION['monEcole']['nomVilleTerritoire'];
        // $t1 = "GRILLE DE POINTS   COURS  [ " . $crs['cours'] . "] ";
        // $t2 = " CLASSE :" . $_GET['maClasse'];
        // $editer = array($crs['nomUtilisateur'], $crs['postnomUtilisateur'], $crs['prenomUtilisateur']);
        // entete_doc($etab, $logo, $bp, $t1, $t2, $editer);
        ?>

        <?php
        include_once('../vue.param_access/enteteDL.php');
        ?>
        <p class="titreLecon">
            GRILLE DE POINTS COURS <?= '  ' . $crs['cours'] ?>
        </p>

        <table class="table-bordered  table-striped table-condensed">
            <thead style='font-size:10px'>


                <?php
                $pr2 = new org_periode();
                $pr2 = $pr2->filtreByAnneeCls($idAnn, $idCls)->fetch();
                (is_array($pr2)) ? $idGp = $pr2['idGroupePeriode'] : $idGp = 0;
                $gp2 = new param_groupe_periode();
                $gp2 = $gp2->filtrerbyId($idGp)->fetch();
                ?>

                <!-- LISTE PERIODE DE CHAQUE TRIMESTRE -->
                <tr>
                    <th colspan="4">
                        <?php
                        $pr2 = new org_periode();
                        $pr2 = $pr2->filtreByAnneeCls($idAnn, $idCls)->fetchAll();
                        $listePeriod = array();

                        $tr = 0;
                        $trTotaut = 0;
                        foreach ($pr2 as $selpr2) {
                            array_push($listePeriod, $selpr2['idPeriode']);
                            $trTotaut++;
                            $tr++;
                            $dv = new crs_devoirs();
                            $dv = $dv->selectionnerByCoursPeriode($selpr2['idPeriode'], $idCrs01)->fetchAll();
                            $nombreP = count($dv);
                            ($nombreP <= 0) ? $nombreP = 1 : $nombreP = $nombreP;
                        ?>
                    <th class="" colspan="<?= $nombreP ?>">
                        <div><span><?= $selpr2['periode'] ?></span></div>
                    </th>
                <?php
                            $nombreP = 0;
                        }
                ?>
                </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th style="background:WHITE" colspan="">N</th>
                    <th style="color:red" colspan="3">
                        <center>IDENTITE ELEVE</center>
                    </th>

                    <?php
                    $TablIdDevoirs = array();
                    $tourPrev = 1;
                    foreach ($listePeriod as $idPrd) {
                        $dv = new crs_devoirs();
                        $dv = $dv->selectionnerByCoursPeriode($idPrd, $idCrs01)->fetchAll();


                        if ($dv == true) {
                            foreach ($dv as $seldv) {
                                array_push($TablIdDevoirs, $seldv['idDevoir']);

                                $pondTotalDevResolu = 0.0;
                                $pTotal = 0.0;

                                if ($seldv['typedev'] == 1) {
                    ?>
                                    <th class="rotate">
                                        <div>
                                            <span>
                                                <?php
                                                $qstion = new crs_question();
                                                $qstion = $qstion->selectionnerByIdDevASC($seldv['idDevoir']);
                                                $pondDevoir = 0.0;
                                                foreach ($qstion as $selqstion) {
                                                    $pondToutDevoir = $pondToutDevoir + $selqstion['ponderation'];
                                                    $pondDevoir = $pondDevoir + $selqstion['ponderation'];
                                                }
                                                echo strtoupper($tourPrev++ . ') ' . $seldv['indexation'] . ' [' . $seldv['idDevoir'] . '] ');
                                                $nremis = new suivie_remise_devoirs();
                                                $nremis = $nremis->remis($seldv['idDevoir'], $idCrs01, $idCls);
                                                ?>
                                                <br>
                                                <center style="">Point:<?= $pondDevoir ?></center>

                                            </span>
                                        </div>
                                    </th>
                                <?php
                                } else {
                                    $pondDevoir = 0.0;
                                ?>

                                    <th class="rotate">
                                        <div>
                                            <span>
                                                <?php

                                                $pondToutDevoir = $pondToutDevoir + $seldv['ponderation'];
                                                $pondDevoir = $pondDevoir + $seldv['ponderation'];


                                                echo strtoupper($tourPrev++ . ') ' . $seldv['indexation'] . ' [' . $seldv['idDevoir'] . '] ');
                                                $nremis = new suivie_remise_devoirs();
                                                $nremis = $nremis->remis($seldv['idDevoir'], $idCrs01, $idCls);
                                                $nbrm = 0;
                                                ?><br>
                                                <center style="">Point:<?= $pondDevoir ?></center>
                                            </span>
                                        </div>
                                    </th>
                    <?php
                                }
                            }
                        } else {
                            echo '<td style="color:black; font-size:20px;"><center>-</center></td>';
                        }
                    }

                    ?>


                    <th colspan="2" style="font-size:10px; color:red">
                        <center>TOTAL</center>
                    </th>

                </tr>

                <?php

                $eleve = new org_inscription();
                $idCls = $_GET['idClasse'];
                $idAnn = $_GET['idAnneeSco'];
                $coteTotal = 0.0;
                $eleve = $eleve->rechercherByClAnnee($idCls, $idAnn);
                $i = 1;
                foreach ($eleve as $selEleve) {
                ?>
                    <tr>
                        <td style="color:red"><?= $i++ ?></td>
                        <td><label style="color:green"><?= $selEleve['idUtilisateur'] ?></label></td>
                        <td><img style="width:30px; height:30px" src="<?= '../images/' . $selEleve['photoUtilisateur'] ?>" /></td>
                        <td><?= $selEleve['nomUtilisateur'] . " " . $selEleve['postnomUtilisateur'] . " " . $selEleve['prenomUtilisateur'] ?></td>
                        <?php
                        $tour = 0;

                        $tourPrev = 1;
                        foreach ($listePeriod as $idPrd) {
                            $dv = new crs_devoirs();
                            $dv = $dv->selectionnerByCoursPeriode($idPrd, $idCrs01)->fetchAll();

                            if ($dv == true) {
                                foreach ($dv as $devoir) {
                                    $tour++;
                                    $remise = new suivie_remise_devoirs();
                                    $remise = $remise->remiseEleveDevoir($selEleve['idUtilisateur'], $idCls, $idAnn, $_GET['idCours'], $devoir['idDevoir'])->fetch();
                                    if ($remise == true) {
                                        //////Debut Calcul de point Obtenu
                                        $verif = new crs_devoirs();
                                        $ver = $verif->rechercherr($devoir['idDevoir'])->fetch();
                                        $coteEleDev = 0.0;
                                        $typedev = null;
                                        ($ver == true) ? $typedev = $ver['typedev'] : '';
                                        if ($typedev == 1) {
                                            $qst = new crs_question();
                                            $qst = $qst->selectionnerByIdDevASC($devoir['idDevoir']);
                                            $nbQst = 0;
                                            $nbRps = 0;
                                            foreach ($qst as $selQst) {
                                                $verif = new crs_assertion();
                                                $ver = $verif->verification($selQst['idQuestion']);
                                                $veri = $ver->fetch();
                                                $infoQRCA = '';
                                                if (empty($veri['idAssertion'])) {
                                                    $repondi = new crs_reponset();
                                                    $repondi = $repondi->selectionnerByQstUtiClass($selQst['idQuestion'], $selEleve['idUtilisateur'], $idCls);
                                                    $avoirRepo = false;
                                                    foreach ($repondi as $repondi) {
                                                        if ($repondi['idAnneeScoEval'] == $repondi['idAnneeScoRep'] and $repondi['idClasseEval'] == $idCls) {
                                                            $avoirRepo = true;
                                                            $correct = new crs_correction();
                                                            $correct = $correct->selectionnerByRep($repondi['idReponse'])->fetch();
                                                            if (is_array($correct)) {
                                                                $coteEleDev = $coteEleDev + $correct['cote'];
                                                                $coteTotal = $coteTotal + $correct['cote'];
                                                            }
                                                            $nbRps++;
                                                            $infoQRCA = 'Eval=' . $repondi['idAnneeScoEval'] . 'REp' . $repondi['idAnneeScoRep'] . 'CalssEva=' . $repondi['idClasseEval'] . 'ClasseRep=' . $idCls;
                                                        }
                                                    }
                                                    $pTotal = $pTotal + $selQst['ponderation'];
                                                    $nbQst++;
                                                } else {
                                                    $asstion = new crs_assertion();
                                                    //selectionner l'assertion choisie encore la bonne 
                                                    $Tbasstion = $asstion->selectionnerByQst($selQst['idQuestion']);
                                                    $tur = 1;
                                                    $repondi = new crs_reponsec();
                                                    $repondi = $repondi->selectionnerByQstUtiClss($selQst['idQuestion'], $selEleve['idUtilisateur'], $idCls);
                                                    $avoirRepo = false;
                                                    foreach ($repondi as $repondi) {
                                                        if ($repondi['idAnneeScoEval'] == $repondi['idAnneeScoRep'] and $repondi['idClasseEval'] == $idCls) {
                                                            $avoirRepo = true;
                                                            foreach ($Tbasstion  as $selTbasstion) {
                                                                if ($selTbasstion['idAssertion'] == $repondi['idAssertion'] and $selTbasstion['correctAssertion'] == 1) {
                                                                    $coteEleDev = $coteEleDev + $selQst['ponderation'];
                                                                    $coteTotal = $coteTotal + $selQst['ponderation'];
                                                                    $nbRps++;;
                                                                    $infoQRCA = 'Eval=' . $repondi['idAnneeScoEval'] . 'REp' . $repondi['idAnneeScoRep'] . 'CalssEva=' . $repondi['idClasseEval'] . 'ClasseRep=' . $idCls;
                                                                }
                                                            }
                                                        }
                                                    }
                                                    $pTotal = $pTotal + $selQst['ponderation'];
                                                    $nbQst++;
                                                }
                                            } //Fin For
                                        } elseif ($typedev == 0) {
                                            include_once('../model.param_access/crs_cote_devoirs_trad.class.php');
                                            $coteTra = new crs_cote_devoirs_trad();
                                            $coteTra = $coteTra->filterDevTraEleve($devoir['idDevoir'], $selEleve['idInscription'])->fetch();
                                            $coteEleDev = $coteEleDev + $coteTra['coteDevoirTrad'];
                                            $coteTotal = $coteTotal + $coteTra['coteDevoirTrad'];
                                            $pTotal = $pTotal + $coteTra['ponderation'];
                                        }


                                        $moyenCote = ($pTotal / 2);
                                        $cote = $coteEleDev . '/' . $pTotal;
                                        if ($coteEleDev >= $moyenCote and $coteEleDev <= $pTotal) {
                                            echo '<td style="color:green; font-size:12px">' . $cote . '</td>';
                                        } elseif ($coteEleDev >= 0 and $coteEleDev < $moyenCote) {
                                            echo '<td style="color:red; font-size:12px">' . $cote . '</td>';
                                        } elseif ($coteEleDev < 0) {
                                            echo '<td style="color:yellow; font-size:12px">' . $cote . '</td>';
                                        } elseif ($coteEleDev > $pTotal) {
                                            echo '<td style="color:pink; font-size:12px">' . $cote . '</td>';
                                        } else {
                                            echo '<td style="color:yellow; font-size:12px">Erreur</span></td>';
                                        }
                                    } else {
                                        echo '<td style="color:red; font-size:12px"><span class="glyphicon glyphicon-remove"></span></td>';
                                    }

                                    //    ICI TAILLE DU TABLEAU


                                    ///////Fin calcule de point obtenu


                                    $pTotal = 0.0;
                                }
                            } else {
                                echo '<td style="color:black; font-size:20px;"><center>-</center></td>';
                            }
                        }
                        if (count($TablIdDevoirs) == $tour) {
                            $pondToutDevMoyen = ($pondToutDevoir / 2);

                            if ($pondToutDevoir != 0) {
                                $coteToutDevoir = $coteTotal . '/' . $pondToutDevoir;
                                $PourcCoteToutDev = ROUND((($coteTotal * 100) / $pondToutDevoir), 2);
                            } else {
                                $coteToutDevoir = 0.0;
                                $PourcCoteToutDev = 0.0;
                            }
                            if ($coteTotal > $pondToutDevMoyen and $coteTotal <= $pondToutDevoir) {
                                echo '<td style="color:green; font-size:12px">' . $coteToutDevoir . '</span></td>';
                                echo '<td style="color:green; font-size:12px">' . $PourcCoteToutDev . '%</span></td>';
                            } elseif ($coteTotal >= 0 and $coteTotal <= $pondToutDevMoyen) {
                                echo '<td style="color:red; font-size:12px">' . $coteToutDevoir . '</span></td>';
                                echo '<td style="color:red; font-size:12px">' . $PourcCoteToutDev . '%</span></td>';
                            } elseif ($coteTotal < 0) {
                                echo '<td style="color:yellow; font-size:12px">' . $coteToutDevoir . '</span></td>';
                                echo '<td style="color:pink; font-size:12px">' . $PourcCoteToutDev . '%</span></td>';
                            } elseif ($coteTotal > $pondToutDevMoyen) {
                                echo '<td style="color:pink; font-size:12px">' . $coteToutDevoir . '</span></td>';
                                echo '<td style="color:pink; font-size:12px">' . $PourcCoteToutDev . '%</span></td>';
                            } else {
                                echo '<td style="color:yellow; font-size:12px">Erreur' . $coteTotal . '</span></td>';
                                echo '<td style="color:yellow; font-size:12px">' . $PourcCoteToutDev . '%</span></td>';
                            }
                            $tour = 0;
                        }
                        $coteTotal = 0.0;
                        $PourcCoteToutDev = 0.0;
                        ?>
                    </tr>
                <?php
                }
                ?>
                <tr>
                    <td colspan="4">
                        <center>TOTAL REMISE DEVOIR<center>
                    </td>
                    <?php
                    $totalRms = 0;
                    foreach ($listePeriod as $idPrd) {
                        $dv = crs_devoirs::selectionnerByCoursPeriode($idPrd, $idCrs01)->fetchAll();
                        if ($dv != null) {
                            foreach ($dv as $seldv2) {

                                if ($seldv2['typedev'] == 1) {
                    ?>
                                    <th>
                                        <?php
                                        $nbrms = count(suivie_remise_devoirs::remis($seldv2['idDevoir'], $idCrs01, $idCls)->fetchAll());
                                        $totalRms += $nbrms;
                                        echo $nbrms;
                                        ?>
                                    </th>
                                <?php
                                } else {

                                ?>
                                    <th>
                                        <?php
                                        $nbrms = count(suivie_remise_devoirs::remis($seldv2['idDevoir'], $idCrs01, $idCls)->fetchAll());
                                        $totalRms += $nbrms;
                                        echo $nbrms;
                                        ?>
                                    </th>
                            <?php
                                }
                            }
                            ?>

                    <?php

                        } else {
                            echo '<td style="color:black; font-size:20px;"><center>-</center></td>';
                        }
                    }
                    ?>
                    <th style="color:black; font-size:18px;" colspan='2'>
                        <!-- <?= $totalRms ?> -->
                    </th>
                </tr>
            </tbody>
        </table>

    </div>
</div>