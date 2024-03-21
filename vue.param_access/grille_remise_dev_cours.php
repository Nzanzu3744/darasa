<?php
include_once('../model.param_access/crs_devoirs.class.php');
include_once('../model.param_access/crs_cours.class.php');
include_once('../model.param_access/suivie_remise_devoirs.class.php');
include_once('../control.param_access/mes_methodes.php');
include_once('../model.param_access/crs_cours.class.php');
include_once('../model.param_access/org_inscription.class.php');

$idCrs01 = htmlspecialchars($_GET['idCours']);
$idClasse = htmlspecialchars($_GET['idClasse']);
$idAnneeSco = htmlspecialchars($_GET['idAnneeSco']);

?>
<div class=" heightSous_Fen">
    <div class="rubaBoutonDoc" style="width:100%">
        <span type="button" class=" btn btn-sm btn-default  glyphicon glyphicon-print" style="margin:3px" value="Imprimer" onclick="imprimer('grille_remise')"></span>
    </div>
    <div style="margin: 50px;" id="grille_remise">
        <?php
        $crs = crs_cours::rechercher($idCrs01)->fetch();
        // $etab = $_SESSION['monEcole']['nomEcole'];;
        // $logo = $_SESSION['monEcole']['logoEcole'];
        // $bp = "B.P." . $_SESSION['monEcole']['bpEcole'] . " " . $_SESSION['monEcole']['nomVilleTerritoire'];
        // $t1 = "GRILLE REMISE DE DEVOIRS   COURS  [ " . $crs['cours'] . "] ";
        // $t2 = " CLASSE :" . $_GET['maClasse'];
        // $editer = array($crs['nomUtilisateur'], $crs['postnomUtilisateur'], $crs['prenomUtilisateur']);


        // entete_doc($etab, $logo, $bp, $t1, $t2, $editer);
        ?>
        <?php
        include_once('../vue.param_access/enteteDL.php');
        ?>
        <p class="titreLecon">
            GRILLE REMISE DEVOIRS COURS <?= ' ' . $crs['cours'] ?>;
        </p>
        <table class="table-bordered  table-striped table-condensed">

            <thead style="font-size:10px">
                <tr>
                    <th style="background:WHITE" colspan="">N</th>
                    <th style="background:WHITE; color:red" colspan="3">
                        <center>IDENTITE ELEVE</center>
                    </th>
                    <?php
                    $dv = new crs_devoirs();
                    $dv = $dv->selectionnerByCoursType_1($idCrs01)->fetchAll();

                    $tourPrev = 1;
                    $TablIdDevoirs = array();
                    foreach ($dv as $seldv) {
                        array_push($TablIdDevoirs, $seldv['idDevoir']);
                    ?>

                        <th class="rotate">
                            <div>
                                <span>
                                    <?php
                                    echo strtoupper($tourPrev++ . ') ' . $seldv['indexation'] . ' [' . $seldv['idDevoir'] . '] ');
                                    $nremis = new suivie_remise_devoirs();
                                    $nremis = $nremis->remis($seldv['idDevoir'], $idCrs01, $idClasse);
                                    $nbrm = 0;

                                    foreach ($nremis as $selRm) {
                                        $nbrm++;
                                    }
                                    ?>
                                    <a onclick="orientation('../control.param_access/ctr_devoirs.php?listeRms=true&idDevoir=<?= $seldv['idDevoir'] ?>&Rmis','<?= '#Rm' . $seldv['idDevoir'] ?>','')"> Remis : <?= $nbrm ?></a>
                                </span>
                            </div>
                        </th>
                    <?php
                    }
                    ?>

                </tr>
            </thead>
            <tbody>
                <?php
                //SI IL NY A PAS DE DEVOIR A CE COUR NE CHECHER PAS
                if ($TablIdDevoirs != null) {

                    $grd_tour_remis =  org_inscription::rechercherByClAnnee($idClasse, $idAnneeSco);
                    $cpt = 0;
                    foreach ($grd_tour_remis  as $sel_grd_tour_remis) {
                        $cpt++;
                        echo '<tr style="font-size:10px"><td style="color:red">' . $cpt . '</td>';
                        echo '<td style="color:red"><img style="width:40px; height:40px" src=../images/' . $sel_grd_tour_remis['photoUtilisateur'] . '></td>';
                        echo '<td>' . $sel_grd_tour_remis['idUtilisateur'] . '</td><td style="font-size:11px">' . $sel_grd_tour_remis['nomUtilisateur'] . ' ' . $sel_grd_tour_remis['postnomUtilisateur'] . ' ' . $sel_grd_tour_remis['prenomUtilisateur'] . '</td>';
                        $aneeScoCreaCrs = new crs_cours();
                        $aneeScoCreaCrs = $aneeScoCreaCrs->rechercher($idCrs01)->fetch();
                        $grd_tour_remis_encours = new suivie_remise_devoirs();
                        //REMISE DE CETTE ELEVE DANS CETTE CLASSE CETTE ANNEE SCOLAIRE POUR CE COURS.
                        $grd_tour_remis_encours = $grd_tour_remis_encours->remiseEleve($sel_grd_tour_remis['idUtilisateur'], $aneeScoCreaCrs['idClasse'], $aneeScoCreaCrs['idAnneeSco'], $idCrs01);
                        $tourRel = 0;
                        foreach ($grd_tour_remis_encours as $sel_grd_tour_remis_encours) {
                            $key = array_search($sel_grd_tour_remis_encours['idDevoir'], $TablIdDevoirs) - $tourRel;

                            for ($i = 0; $i <= $key; $i++) {
                                //ici bleme
                                if ($i === $key) {
                                    echo '<td style="color:green; font-size:12px"><span class="glyphicon glyphicon-ok"></span></td>';
                                } else {
                                    echo '<td style="color:red; font-size:12px"><span class="glyphicon glyphicon-remove"></span></td>';
                                }
                                $tourRel++;
                            }
                        }
                        if ($tourRel < $tourPrev) {
                            $Surp = $tourPrev - $tourRel;
                            for ($u = 1; $u < $Surp; $u++) {
                                echo '<td style="color:red; font-size:12px"><span class="glyphicon glyphicon-remove"></span></td>';
                            }
                        }
                        echo '</tr>';
                    }

                    // <th class="bc-browser bc-browser-chrome"><div class="bc-head-txt-label bc-head-icon-chrome">Chrome</div><div class="bc-head-icon-symbol icon icon-chrome"></div></th>
                }
                ?>
            </tbody>
        </table>
    </div>
</div>