<?php
// Orientation2("../control.param_access/ctr_bulletin.php?aff_blt=true&idClasse=42&idAnneeSco=16&maClasse=7:B EDUCATION DE BASE 2023-2024", "#monBlt", "#srlListeElve");
// (empty($_SESSION)) ? session_start() : '';
include_once('../model.param_access/crs_question.class.php');
include_once('../model.param_access/crs_devoirs.class.php');
include_once('../model.param_access/crs_assertion.class.php');
include_once('../model.param_access/crs_reponset.class.php');
include_once('../model.param_access/crs_reponsec.class.php');
include_once('../model.param_access/crs_correction.class.php');
include_once('../model.param_access/crs_cours.class.php');
include_once('../model.param_access/param_groupe_periode.class.php');
include_once('../model.param_access/org_periode.class.php');
include_once('../model.param_access/org_inscription.class.php');
include_once('../model.param_access/crs_devoirs_trad.class.php');
include_once('../model.param_access/crs_cote_devoirs_trad.class.php');
include_once('../model.param_access/suivie_remise_devoirs.class.php');
include_once('../model.param_access/crs_domaine.class.php');
include_once('../model.param_access/crs_sous_domaine.class.php');
include_once('../control.param_access/mes_methodes.php');
include_once('../plugins/phpqrcode/genererqr.php');
include_once('../model.param_access/param_ecole.class.php');
include_once("../control.param_access/mes_methodes.php");

$idCls =  $_GET['idClasse'];
$idAnn = $_GET['idAnneeSco'];
$ListeEle = array();
$cptDoc = 1;
$sommeCoteTG = 0.0;
$sommepondeTG = 0.0;
$tgeneral = 0.0;
$ttrim = 0.0;
if (isset($_POST['data1'])) {
    $ListeEle = deserialiser($_POST['data1']);
} elseif ($_GET['verifBlt']) {
    $idEl = htmlspecialchars($_GET['idE']);
    array_push($ListeEle, $idEl);
}


$pr2 = new org_periode();
$pr2 = $pr2->filtreByAnneeCls($idAnn, $idCls)->fetch();
(is_array($pr2)) ? $idGp = $pr2['idGroupePeriode'] : $idGp = 0;
$gp2 = new param_groupe_periode();
$gp2 = $gp2->filtrerbyId($idGp)->fetch();
if ($gp2) {
?>

    <div class="rubaBoutonDoc" style="width:100%">
        <span type="button" class=" btn btn-sm btn-default  glyphicon glyphicon-print" style="margin:3px" value="Imprimer" onclick="imprimer('doc_blt')"></span>

    </div>

    <div style=" margin: 0px;padding:0px;  width:100%; border: 1px solid black;" class="widthBlt" id='doc_blt'>

        <?php

        foreach ($ListeEle as $idEle) {
            $eleve = new org_inscription();
            $el = $eleve->rechercherByClAnneeEleve($idCls, $idAnn, $idEle);
            $i = 1;
            foreach ($el as $selEleve) {
                $cptDoc++;

        ?>
                <!-- ENTETE BULLETIN -->

                <div class="" style=" margin:0px; padding:0px;width:100%;height:1870px" id='bulletin<?= $cptDoc ?>'>
                    <?php
                    // echo "<center  style=''><i class='img-circle' style='color:red; font-size:15px; background-color: #DDDD'>" . $cptDoc++ . "</i>";

                    $eco = param_ecole::rechercher($selEleve['idEcole'])->fetch();

                    $idU = $selEleve['idUtilisateur'];
                    $nomU = $selEleve['nomUtilisateur'];
                    $postnomU = $selEleve['postnomUtilisateur'];
                    $prenomU = $selEleve['prenomUtilisateur'];
                    $phU = $selEleve['photoUtilisateur'];
                    $tel = $selEleve['telUtilisateur'];
                    $mail = $selEleve['mailUtilisateur'];
                    $genre = $selEleve['genre'];
                    $ecole = param_ecole::rechercher($selEleve['idEcole'])->fetch();
                    $idEco = $ecole['idEcole'];
                    $nomEco = $ecole['nomEcole'];
                    $sigleEco = $ecole['singleEcole'];
                    $bpEco = $ecole['bpEcole'];
                    $provEc = $ecole['nomProvince'];
                    $paysEc = $ecole['nomPays'];
                    $villeEc = $ecole['nomVilleTerritoire'];
                    $adresseEcoo =  $ecole['adresseEcole'];
                    $nomVT = $ecole['singleEcole'];
                    $lg = $ecole['logoEcole'];
                    $drapo =  $ecole['drapo'];
                    $armoiri = $ecole['armoiri'];

                    // mini_entete_doc($idU, $nomU, $postnomU, $prenomU, $phU, $tel, $mail, $genre, $idEco, $nomEco, $sigleEco, $bpEco, $nomVT, $lg);

                    ?>
                    <div class="contenaire grilleThMaxetTotaSup " style="height:65px;">

                        <img style="height:60px; width:10%; margin:auto" src="<?= $drapo ?>" />


                        <label style="width:80%; text-align:center">
                            <?= strtoupper($eco['nomPays']) ?><br>MINISTERE DE L’ENSEIGNEMENT PRIMAIRE, SECONDAIRE ET PROFESSIONNEL
                        </label>

                        <img style="height:60px; width:10%; margin:auto" src="<?= $armoiri ?>" />
                    </div>

                    <div class="contenaire grilleThMaxetTotaSup " style="margin: 0px; padding-top:20px; border-bottom:1px solid black">
                        <div style="margin: 0px; padding:0px;">
                            <table class="table table-bordered " style="width:100%; ">
                                <tbody>

                                    <tr class="grilleThMaxetTotaSup">
                                        <td style="border: 0px solid white; width:80px">N ID :</td>
                                        <th class="grilleThMaxetTotaSup">
                                            </td>
                                        <th class="grilleThMaxetTotaSup">
                                            </td>
                                        <th class="grilleThMaxetTotaSup">
                                            </td>
                                        <th class="grilleThMaxetTotaSup">
                                            </td>
                                        <th class="grilleThMaxetTotaSup">
                                            </td>
                                        <th class="grilleThMaxetTotaSup">
                                            </td>
                                        <th class="grilleThMaxetTotaSup">
                                            </td>
                                        <th class="grilleThMaxetTotaSup">
                                            </td>
                                        <th class="grilleThMaxetTotaSup">
                                            </td>
                                        <th class="grilleThMaxetTotaSup">
                                            </td>
                                        <th class="grilleThMaxetTotaSup">
                                            </td>
                                        <th class="grilleThMaxetTotaSup">
                                            </td>
                                        <th class="grilleThMaxetTotaSup">
                                            </td>
                                        <th class="grilleThMaxetTotaSup">
                                            </td>
                                        <th class="grilleThMaxetTotaSup">
                                            </td>
                                        <th class="grilleThMaxetTotaSup">
                                            </td>
                                        <th class="grilleThMaxetTotaSup">
                                            </td>
                                        <th class="grilleThMaxetTotaSup">
                                            </td>
                                        <th class="grilleThMaxetTotaSup">
                                            </td>
                                        <th class="grilleThMaxetTotaSup">
                                            </td>
                                        <th class="grilleThMaxetTotaSup">
                                            </td>
                                        <th class="grilleThMaxetTotaSup">
                                            </td>
                                        <th class="grilleThMaxetTotaSup">
                                            </td>
                                        <th class="grilleThMaxetTotaSup">
                                            </td>
                                        <th class="grilleThMaxetTotaSup">
                                            </td>
                                        <th class="grilleThMaxetTotaSup">
                                            </td>
                                        <th class="grilleThMaxetTotaSup">
                                            </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="contenaire grilleThMaxetTotaSup" style=" margin:0px; padding:0px; text-align: left">
                        <div class="" style="margin:10px; padding:10px; width:50%; text-align: left">
                            <div>
                                <img style="height:80px; width:130px" src="<?= $lg ?>" />
                            </div>
                            <div>
                                PROVINCE: <label><?= $provEc ?></label><br>
                                VILLE / TERRITOIRE : <label><?= $villeEc ?></label><br>
                                COMMUNE :<label><?= $adresseEcoo ?></label><br>
                                ECOLE : <label><?= $nomEco ?></label><br>

                                <table class="table table-bordered ">
                                    <tbody>

                                        <tr class="grilleThMaxetTotaSup">
                                            <td style="border: 0px solid white; width:80px">CODE :</td>
                                            <th class="grilleThMaxetTotaSup">
                                                </td>
                                            <th class="grilleThMaxetTotaSup">
                                                </td>
                                            <th class="grilleThMaxetTotaSup">
                                                </td>
                                            <th class="grilleThMaxetTotaSup">
                                                </td>
                                            <th class="grilleThMaxetTotaSup">
                                                </td>
                                            <th class="grilleThMaxetTotaSup">
                                                </td>
                                            <th class="grilleThMaxetTotaSup">
                                                </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div class="" style="margin:10px; padding:10px; width:50%;text-align: left; border-left:1px solid black">
                            <div>
                                <img style="height:80px; width:130px" src="<?= '../images/' . $selEleve['photoUtilisateur'] ?>" />
                            </div>
                            <div>
                                ELEVE : <label> <?= $nomU . '  ' . $postnomU . '  ' . $prenomU ?></label><br>
                                SEXE : <label> <?= $selEleve['genre'] ?></label><br>
                                NE(E) A :<label><?= $selEleve['lieuNais'] . ' le ' . formDate($selEleve['dateNais'])  ?></label><br>
                                CLASSE : <label><?= ($selEleve['section'] == 1) ? ' ERE ' : ' EME ' ?><?= $selEleve['section'] . ' ANNEE' ?> <?= ' ' . $selEleve['promotion'] . ' ' ?></label><br>

                                <table class="table table-bordered ">
                                    <tbody>

                                        <tr class="grilleThMaxetTotaSup">
                                            <td style="border: 0px solid white; width:85px">N PERM</td>
                                            <th class="grilleThMaxetTotaSup">
                                                </td>
                                            <th class="grilleThMaxetTotaSup">
                                                </td>
                                            <th class="grilleThMaxetTotaSup">
                                                </td>
                                            <th class="grilleThMaxetTotaSup">
                                                </td>
                                            <th class="grilleThMaxetTotaSup">
                                                </td>
                                            <th class="grilleThMaxetTotaSup">
                                                </td>
                                            <th class="grilleThMaxetTotaSup">
                                                </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                        </div>
                    </div>
                    <div class="grilleThMaxetTotaSup">
                        <center style="border: 1px solid #f2f2f2; margin:0px; padding:0px "><label>BULLETIN DE LA <?= ($selEleve['section'] == 1) ? ' ERE ' : ' EME ' ?><?= $selEleve['section'] . ' ANNEE' ?> <?= ' ' . $selEleve['promotion'] . ' ' ?><?= ' ANNEE SCOLAIRE ' . $selEleve['anneeSco'] . ' ' ?></label>
                    </div>
                    <!--  -->
                    <!-- DEBIT CORPS BULLETIN -->

                    <table class="grilleThMaxetTotaSup" style="width:100%">
                        <thead>
                            <!-- TRIMESTRE DE LA CLASSE -->
                            <tr class="grilleThMaxetTotaSup">
                                <th class="grilleThMaxetTotaSup">
                                    ---
                                </th>
                                <?php

                                for ($t = 1; $t <= $gp2['frequence']; $t++) {
                                ?>

                                    <th colspan="7" class="grilleThMaxetTotaSup">
                                        <?= (($t == 1) ? $t . ' ér ' : $t . ' éme ') . $gp2['groupePeriode'] ?>
                                    </th>
                                <?php
                                }
                                ?>
                                <th colspan="2">
                                    ---
                                </th>
                                <th class="grilleThMaxetTotaSup" style="background-color:black;border:black">
                                </th>
                                <th colspan="2">
                                    EXAMEN<br> REPECHAGE
                                </th>

                            </tr>

                            <!-- LISTE PERIODE DE CHAQUE TRIMESTRE -->
                            <tr>
                                <th class="grilleThMaxetTotaSup">
                                    BRANCHE
                                </th>

                                <?php
                                $pr2 = new org_periode();
                                $pr2 = $pr2->filtreByAnneeCls($idAnn, $idCls)->fetchAll();
                                $nombre = count($pr2);
                                $nommbreCal = $nombre - 1;
                                $TabResultat = array();
                                $TabResultatSousTot = array();
                                $TabResultatSousTotBrute = array();
                                $TabPondeResult = array();
                                $tr = 0;
                                $trTotaut = 0;
                                $mxperiode = 0;
                                $mxexam = 0;
                                $TabMaximaPer = array();
                                $tabMaxSousTo = array();
                                $TabMaximaExa = array();
                                $totalPrecedantCalPon = array();
                                // $pondTotTrimSs = 0.0;
                                foreach ($pr2 as $selpr2) {
                                    $trTotaut++;
                                    $tr++;
                                    $mxexam++;
                                    if ($mxperiode == 0) {
                                        $mxexam = 0;
                                ?>
                                        <th class="grilleThMaxetTotaSup">
                                            MAX P.
                                        </th>
                                    <?php
                                        $mxperiode++;
                                    }

                                    if ($mxexam == 2) {
                                    ?>
                                        <th class="grilleThMaxetTotaSup">
                                            MAX EX.
                                        </th>
                                    <?php

                                    }
                                    ?>
                                    <th class="grilleThMaxetTotaSup">
                                        <div><span><?= $selpr2['periode'] ?></span></div>
                                    </th>
                                    <?php
                                    if ($tr == 3) {
                                        $trTotaut++;
                                        $tr = 0;
                                        $mxperiode = 0;

                                    ?>
                                        <th colspan="2" class="grilleThMaxetTotaSup">
                                            TOTAL
                                        </th>
                                        <?php
                                        if (($trTotaut / $gp2['frequence']) == 4) {
                                        ?>
                                            <th colspan="2" class="grilleThMaxetTotaSup">
                                                <span>TOTAL GENERAL</span>
                                            </th>
                                            <th class="grilleThMaxetTotaSup" style="background-color:black;border:black">
                                            </th>
                                            <th class="grilleThMaxetTotaSup" class="grilleThMaxetTotaSup">
                                                _%_
                                            </th>
                                            <th class="grilleThMaxetTotaSup" class="grilleThMaxetTotaSup">
                                                SIGN. PROF
                                            </th>
                                <?php
                                        }
                                    }
                                }
                                ?>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //  DEB. BOUCLE COURS DE LA CLASSE L'ANNEE X POUR CE DOMAINE
                            $dom = crs_domaine::selectionnerByClass($idCls);
                            $cldom = 0;

                            foreach ($dom as $seldom) {
                                $cldom++;

                            ?>
                                <tr>
                                    <th class="grilleThMaxetTotaSup" style="text-align:center;" colspan="27">DOMAINE DE(S) <?= $seldom['domaine'] ?></th>
                                </tr>
                                <?php
                                //  DEB. BOUCLE DOMAINE
                                $sdom = crs_sous_domaine::selectionnerByDom($seldom['idDomaine']);
                                $clsdom = 0;
                                foreach ($sdom as $selsdom) {
                                    $clsdom++;
                                    $crs = crs_cours::selectionnerCrsEleveByClsAnnDom($idCls, $idAnn, $selsdom['idSousDomaine'])->fetchAll();
                                    $clef = 0;
                                    if (!empty($crs)) {

                                        if ($selsdom['masqueSousDomaine'] != 1) {
                                ?>
                                            <tr>
                                                <th class="grilleThMaxetTotaSup" style="text-align:center;" colspan="27"> SOUS DOMAINE DE (S)<?= $selsdom['sousDomaine'] ?></th>
                                            </tr>

                                        <?php
                                        }

                                        //  COTE AVANT AJOUT DE CE SOUS DOMAINE
                                        $totalPrecedantCal = array();
                                        $totalPrecedantCalBrute = array();
                                        $totalPrecedantCal = $TabResultatSousTot;
                                        $totalPrecedantCalBrute = $TabResultatSousTotBrute;
                                        $pontRealisee = 0.0;
                                        // -------------CORRECTION------
                                        $totalPrecedantCalCor = array();

                                        // -----------------------------

                                        //  DEB. BOUCLE COURS DE LA CLASSE L'ANNEE X POUR CE SOUS DOMAINE

                                        foreach ($crs as $selcrs) {
                                            $clef++;
                                            $coteCalctotal = 0;
                                            $coteCalctotalGen = 0;
                                        ?>
                                            <tr class="grilleThMaxetTotaSup">
                                                <th class="grilleThMaxetTotaSup">
                                                    <?= $selcrs['cours'] ?>
                                                    <!-- RECOLTE PERIODIQUE -->
                                                    <?php
                                                    if (array_key_exists($clef, $TabMaximaPer)) {
                                                        $calPondPeriode = $TabMaximaPer[$clef];
                                                        $TabMaximaPer[$clef] = $calPondPeriode + $selcrs['ponderation'];
                                                    } else {
                                                        array_push($TabMaximaPer, $selcrs['ponderation']);
                                                    }
                                                    // 
                                                    // BOUCLE PERIODE
                                                    $pr2 = new org_periode();
                                                    $pr2 = $pr2->filtreByAnneeCls($idAnn, $idCls);
                                                    //Total
                                                    $coteTotal = 0.0;
                                                    //Total
                                                    $pondeTotal = 0.0;

                                                    //Totaux General du cours
                                                    $coteTG = 0.0;
                                                    //Ponderation Totaux General du cours
                                                    $pondeTG = 0.0;
                                                    //Tour avant l'Affichage du total
                                                    $tr = 0;
                                                    //Tour avant l'Affichage du totaux
                                                    $trTotaut = 0;
                                                    $key = $nommbreCal + 1;
                                                    $mxperiode = 0;
                                                    $mxexam = 0;
                                                    $totPondP = 0.0;
                                                    $pondTrimBrute = 0.0;

                                                    foreach ($pr2 as $selpr2) {
                                                        $trTotaut++;
                                                        $tr++;
                                                        $mxexam++;
                                                        //Cote obtenu par periode
                                                        $CotePeriode = 0.0;
                                                        $pondePeriod = 0.0;
                                                        // initialisation proclamation
                                                        $tour = 0;
                                                        $grandKey = 0;
                                                        if ($mxperiode == 0) {
                                                            $mxexam = 0;
                                                            $totPondP = $selcrs['ponderation'];
                                                    ?>
                                                <th class="grilleThMaxetTotaSup">
                                                    <?= arrondis($selcrs['ponderation']) ?>
                                                </th>
                                            <?php
                                                            $mxperiode++;
                                                        }

                                                        if ($mxexam == 2) {
                                                            $totPondP = $selcrs['ponderation'] * 2
                                            ?>
                                                <th class="grilleThMaxetTotaSup">
                                                    <?= arrondis($totPondP) ?>
                                                </th>
                                            <?php

                                                        }
                                                        // BOUCLE SUR DEVOIR
                                                        $dv = new crs_devoirs();
                                                        $dv = $dv->selectionnerByCoursPeriode($selpr2['idPeriode'], $selcrs['idCours']);
                                                        $nbQst = 0;
                                                        $nbRps = 0;
                                                        //Cote Par Devoir
                                                        $coteEleDev = 0.0;
                                                        //DEBIT DE LA BOUCLE SUR LE DEVOIR PAR PERIODE                                      
                                                        foreach ($dv as $selDv) {
                                                            $remise = new suivie_remise_devoirs();
                                                            $remise = $remise->remiseEleveDevoir($selEleve['idUtilisateur'], $idCls, $idAnn, $selcrs['idCours'], $selDv['idDevoir'])->fetch();

                                                            if ($remise == true) {
                                                                if ($selDv['typedev'] == 1) {
                                                                    $qst = new crs_question();
                                                                    $qst = $qst->selectionnerByIdDevASC($selDv['idDevoir']);

                                                                    //DEBIT DE LA BOUCLE TOUR QUESTION PAR DEVOIR
                                                                    foreach ($qst as $selQst) {
                                                                        $verif = new crs_assertion();
                                                                        $ver = $verif->verification($selQst['idQuestion']);
                                                                        $veri = $ver->fetch();
                                                                        //NB:  La variable $infoQRCA nous tur un resume l'annee de l'evaluation laclasse et si c'est raporte l'annee initial l'annee de rapport et classe initial , classe de rapport
                                                                        $infoQRCA = '';
                                                                        //SI ET SEULEMENT SI LA QUESTION EST TRADITIONNELE
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
                                                                                        $coteEleDev += $correct['cote'];
                                                                                        $CotePeriode += $correct['cote'];
                                                                                        $coteTotal += $correct['cote'];
                                                                                        $coteTG += $correct['cote'];
                                                                                    }
                                                                                    $nbRps++;
                                                                                    $infoQRCA = 'Eval=' . $repondi['idAnneeScoEval'] . 'REp' . $repondi['idAnneeScoRep'] . 'CalssEva=' . $repondi['idClasseEval'] . 'ClasseRep=' . $idCls;
                                                                                }
                                                                            }
                                                                            $nbQst++;
                                                                            // SI EST SEULEMENT SI LA QUESTION EST A CHOIX MULTIPLE   
                                                                        } else {
                                                                            $asstion = new crs_assertion();
                                                                            //Selectionner les assertions de la question
                                                                            $Tbasstion = $asstion->selectionnerByQst($selQst['idQuestion']);
                                                                            //Selectionner la reponse ou assertion choisie
                                                                            $repondi = new crs_reponsec();
                                                                            $repondi = $repondi->selectionnerByQstUtiClss($selQst['idQuestion'], $selEleve['idUtilisateur'], $idCls);
                                                                            $avoirRepo = false;
                                                                            foreach ($repondi as $repondi) {
                                                                                if ($repondi['idAnneeScoEval'] == $repondi['idAnneeScoRep'] and $repondi['idClasseEval'] == $idCls) {
                                                                                    $avoirRepo = true;
                                                                                    foreach ($Tbasstion  as $selTbasstion) {
                                                                                        if ($selTbasstion['idAssertion'] == $repondi['idAssertion'] and $selTbasstion['correctAssertion'] == 1) {
                                                                                            $coteEleDev += $selQst['ponderation'];
                                                                                            $CotePeriode += $selQst['ponderation'];
                                                                                            $coteTotal += $selQst['ponderation'];
                                                                                            $coteTG += $selQst['ponderation'];
                                                                                            $nbRps++;
                                                                                            $infoQRCA = 'Eval=' . $repondi['idAnneeScoEval'] . 'REp' . $repondi['idAnneeScoRep'] . 'CalssEva=' . $repondi['idClasseEval'] . 'ClasseRep=' . $idCls;
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }
                                                                            $nbQst++;
                                                                        }
                                                                        $pondePeriod += $selQst['ponderation'];
                                                                        $pondeTotal += $selQst['ponderation'];
                                                                        $pondeTG += $selQst['ponderation'];
                                                                        //FIN DE LA BOUCLE TOUR QUESTION PAR DEVOIR  
                                                                    }
                                                                } elseif ($selDv['typedev'] == 0) {
                                                                    $coteTra = new crs_cote_devoirs_trad();
                                                                    $coteTra = $coteTra->filterDevTraEleve($selDv['idDevoir'], $selEleve['idInscription'])->fetch();

                                                                    $coteEleDev += $coteTra['coteDevoirTrad'];
                                                                    $CotePeriode += $coteTra['coteDevoirTrad'];
                                                                    $coteTotal += $coteTra['coteDevoirTrad'];
                                                                    $coteTG += $coteTra['coteDevoirTrad'];


                                                                    $pondePeriod += $selDv['ponderation'];
                                                                    $pondeTotal += $selDv['ponderation'];
                                                                    $pondeTG += $selDv['ponderation'];
                                                                }
                                                            } else {
                                                                $coteEleDev += 0;
                                                                $CotePeriode += 0;
                                                                $coteTotal += 0;
                                                                $coteTG += 0;


                                                                $pondePeriod += $selDv['ponderation'];
                                                                $pondeTotal += $selDv['ponderation'];
                                                                $pondeTG += $selDv['ponderation'];
                                                            }
                                                            //FIN DE LA BOUCLE TOUR DEVOIR PAR PERIODE
                                                        }

                                                        $pointCoursPrd = 0;

                                                        if ($pondePeriod > 0) {
                                                            $pointCoursPrd = ($CotePeriode / $pondePeriod) * $totPondP;
                                                        } else {
                                                            $pointCoursPrd = 0;
                                                        }


                                                        //ICI CALCUL PROCLAMATION PERIODE            
                                                        $totalCalCotePeriode = 0;
                                                        $totalCalCotePeriodeBrute = 0;
                                                        $totalCalPondPeriode = 0;

                                                        if (array_key_exists($grandKey, $TabResultat)) {

                                                            if (isset($TabResultat[$grandKey][$key])) {
                                                                $totalCalCotePeriode = $TabResultat[$grandKey][$key];
                                                                $totalCalCotePeriodeBrute = $TabResultatSousTotBrute[$grandKey][$key];
                                                                $TabResultat[$grandKey][$key] = $pointCoursPrd + $totalCalCotePeriode;
                                                                $TabResultatSousTot[$grandKey][$key] = $pointCoursPrd + $totalCalCotePeriode;
                                                                $TabResultatSousTotBrute[$grandKey][$key] = $CotePeriode + $totalCalCotePeriodeBrute;
                                                            } else {

                                                                $TabResultat[$grandKey][$key] = $pointCoursPrd + $totalCalCotePeriode;
                                                                $TabResultatSousTot[$grandKey][$key] = $pointCoursPrd + $totalCalCotePeriode;
                                                                $TabResultatSousTotBrute[$grandKey][$key] = $CotePeriode  + $totalCalCotePeriodeBrute;
                                                            }
                                                        } else {
                                                            $ResultP = array($key => $pointCoursPrd);
                                                            $ResultSoustot = array($key => $pointCoursPrd);
                                                            $ResultSoustotBrute = array($key => $CotePeriode);
                                                            array_push($TabResultat, $ResultP);
                                                            array_push($TabResultatSousTot, $ResultSoustot);
                                                            array_push($TabResultatSousTotBrute, $ResultSoustotBrute);
                                                        }

                                                        //ICI CALCUL PROCLAMATION PONDERATION PERIODE

                                                        if (array_key_exists($grandKey, $TabPondeResult)) {
                                                            if (isset($TabPondeResult[$grandKey][$key])) {
                                                                $totalCalPondPeriode = $TabPondeResult[$grandKey][$key];
                                                                $TabPondeResult[$grandKey][$key] = $pondePeriod + $totalCalPondPeriode;
                                                            } else {

                                                                $TabPondeResult[$grandKey][$key] = $pondePeriod + $totalCalPondPeriode;
                                                            }
                                                        } else {
                                                            $ResultPond = array($key => $pondePeriod);
                                                            array_push($TabPondeResult, $ResultPond);
                                                        }
                                                        $key--;
                                                        // <!-- MAX PERIODE -->

                                                        $moyenCP = $totPondP  / 2;

                                                        if ($pointCoursPrd >= $moyenCP) {
                                            ?>

                                                <td class="grilleTbPointSup">

                                                    <span class="dropdown backgroundTransp">
                                                        <span data-toggle="dropdown" role="button" href="#">
                                                            <?= arrondis($pointCoursPrd) ?>

                                                        </span>
                                                        <ul class="dropdown-menu backgroundTransp" style="width:100%; margin-top:-1px">
                                                            <li style="font-weight: 200;color:green; text-align:left">
                                                                Cote Brute :<?= $CotePeriode  ?><br>
                                                                Pond Brute :<?= $pondePeriod ?><br>
                                                            </li>
                                                        </ul>
                                                    </span>
                                                </td>
                                            <?php
                                                        } else {
                                            ?>

                                                <td class="grilleThMaxetTotaInf">
                                                    <span class="dropdown backgroundTransp">
                                                        <span data-toggle="dropdown" role="button" href="#">
                                                            <?= arrondis($pointCoursPrd) ?>

                                                        </span>
                                                        <ul class="dropdown-menu backgroundTransp" style="width:100%; margin-top:-1px">
                                                            <li style="font-weight: 100;color:green; text-align:left">
                                                                Cote Brute :<?= $CotePeriode  ?><br>
                                                                Pond Brute :<?= $pondePeriod ?><br>
                                                            </li>
                                                        </ul>
                                                    </span>
                                                <?php
                                                        }
                                                        $coteCalctotal += $pointCoursPrd;
                                                        // MAX TOTAL ET TOTAL GENERAL
                                                        if ($tr == 3) {

                                                            $moyenCP = 0.0;
                                                            $pondeTotal = $totPondP * 2;
                                                ?>
                                                <td class="grilleThMaxetTotaSup">
                                                    <?= $pondeTotal ?>
                                                </td>
                                                <!-- MAX TOTAL -->
                                                <?php
                                                            $moyenTT = $pondeTotal / 2;
                                                            $trTotaut++;
                                                            $mxperiode = 0;
                                                            $tr = 0;
                                                            // BRUTE DU TOT TRIM
                                                            // $coteTotal / $pondeTG
                                                            if ($pondeTG != 0) {
                                                                $pointCoursPrd = ($coteTotal / $pondeTG) * $totPondP;
                                                            }
                                                            $pondTotTrim = $pondeTG - $pondTrimBrute;

                                                            if ($coteCalctotal  >= $moyenTT) {
                                                ?>

                                                    <th class="grilleThMaxetTotaSup">
                                                        <?= arrondis($coteCalctotal) ?>
                                                    </th>
                                                <?php

                                                            } else {
                                                ?>
                                                    <th class="grilleThMaxetTotaInf">
                                                        <?= arrondis($coteCalctotal) ?>
                                                    </th>
                                                <?php

                                                            }
                                                            $coteCalctotalGen += $coteCalctotal;
                                                            $coteTotal = 0.0;
                                                            $pondTrimBrute = $pondeTG;
                                                            $pondePeriod = 0.0;
                                                            $pondeTotalGen = $pondeTotal * $gp2['frequence'];
                                                            $moyenTG = $pondeTotalGen / 2;
                                                ?>


                                                <!-- MAX TOTAL GENERAL -->
                                                <?php
                                                            if (($trTotaut / $gp2['frequence']) == 4) {
                                                ?>
                                                    <th class="grilleThMaxetTotaSup">
                                                        <?= $pondeTotalGen ?>
                                                    </th>
                                                    <?php

                                                                if ($coteCalctotalGen >= $moyenTG) {
                                                    ?>

                                                        <th class="grilleThMaxetTotaSup">
                                                            <?= arrondis($coteCalctotalGen) ?>
                                                        </th>

                                                    <?php
                                                                } else {
                                                    ?>

                                                        <th class="grilleThMaxetTotaInf">
                                                            <?= arrondis($coteCalctotalGen) ?>
                                                        </th>

                                        <?php
                                                                }
                                                                // Brute
                                                                $sommeCoteTG += $coteTG;
                                                                $sommepondeTG += $pondeTG;
                                                                $pontRealisee += $pondeTG;
                                                                $coteTG = 0.0;
                                                                $pondeTG = 0.0;
                                                                //Calculer
                                                                $coteCalctotalGen = 0.0;
                                                            }
                                                            $coteCalctotal = 0;
                                                        }
                                                    }

                                                    // FIN BOUCLE PERIODE
                                        ?>
                                        <th class="grilleThMaxetTotaSup" style="background-color:black;border:black">
                                        </th>
                                        <th class="grilleThMaxetTotaSup">

                                        </th>
                                        <th class="grilleThMaxetTotaSup">

                                        </th>
                                        </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>

                                        <!-- FIN COURS PAR CLASSSE ANNEE X POUR SOUS DOMAINE -->
                                        <?php

                                        // SOUS TOTAL
                                        // ------------------------------------------------------------------------------
                                        ?>
                                        <tr>
                                            <th class="grilleThMaxetTotaSup">
                                                Sous Total
                                            </th>
                                            <?php
                                            $valDegrementant = $nombre;
                                            $petiTour = 0;
                                            $sommeSsTotal = 0;
                                            $sommeSsTotalBrute = 0;
                                            $sommeSsTotalPond = 0;
                                            $somme2SommeSousTotal = 0;
                                            $somme2SommeSousTotalBrute = 0;
                                            $somme2SommeSousTotalPond = 0;
                                            $sommeTrimSemPond = 0;
                                            $somme2SommeTrimSemPond = 0;
                                            $mxperiode = 0;
                                            $mxexam = 0;
                                            $maxTrime = 0.0;
                                            $cptFreq = 0;



                                            $maxSousTot = array_sum($TabMaximaPer) - array_sum($tabMaxSousTo);

                                            $ii = 0;
                                            for ($i = 0; $i <= $nombre; $i++) {
                                                $mxexam++;
                                                if ($petiTour >= 3) {
                                                    $mxperiode = 0;
                                                    $maxTrime =  $maxSousTot * 4;
                                                    $cptFreq++;
                                            ?>
                                                    <!-- MAX TRIMESTRE -->

                                                    <th class="grilleThMaxetTotaSup">
                                                        <?=
                                                        arrondis($maxTrime)
                                                        ?>

                                                    </th>
                                                    <?php
                                                    // BRUTE
                                                    // $sommeSsTotalBrute ET $sommeSsTotalPond 
                                                    if ($sommeSsTotal >= $maxTrime / 2) {
                                                    ?>
                                                        <th class="grilleThMaxetTotaSup">
                                                            <?= arrondis($sommeSsTotal) ?>
                                                        </th>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <th class="grilleThMaxetTotaInf">
                                                            <?= arrondis($sommeSsTotal) ?>
                                                        </th>
                                                    <?php

                                                    }

                                                    ?>
                                                <?php
                                                    $somme2SommeSousTotal += $sommeSsTotal;
                                                    $somme2SommeSousTotalBrute += $sommeSsTotalBrute;
                                                    $sommeSsTotal = 0;
                                                    $sommeSsTotalBute = 0;
                                                    $sommeSsTotalPond = 0;





                                                    $petiTour = 0;
                                                }
                                                if ($mxperiode == 0 and $gp2['frequence'] != $cptFreq) {
                                                    $mxexam = 0;

                                                    $tabMaxSousTo = $TabMaximaPer;

                                                ?>
                                                    <!-- MAX PERIODE -->
                                                    <th class="grilleThMaxetTotaSup">
                                                        <?=
                                                        arrondis($maxSousTot)
                                                        ?>

                                                    </th>

                                                <?php
                                                    $mxperiode++;
                                                }

                                                if ($mxexam == 2) {
                                                ?>
                                                    <!-- MAX EXAMEN -->
                                                    <th class="grilleThMaxetTotaSup">
                                                        <?=
                                                        arrondis($maxSousTot * 2)
                                                        ?>
                                                    </th>

                                                    <?php

                                                }

                                                if ($i < $nombre) {
                                                    if ($ii == 2) {
                                                        $maxSousTotCal = $maxSousTot * 2;
                                                        $ii = -1;
                                                    } else {
                                                        $maxSousTotCal = $maxSousTot;
                                                    }

                                                    if (!empty($TabResultatSousTot)) {

                                                        if (empty($totalPrecedantCal) and empty($totalPrecedantCalPon)) {

                                                            $coteSuivante =  $TabResultatSousTot[0][$valDegrementant];
                                                            $coteSuivanteBrute =  $TabResultatSousTotBrute[0][$valDegrementant];
                                                            $pondSuivante = $TabPondeResult[0][$valDegrementant];
                                                            // BRUTE
                                                            // $coteSuivanteBrute ET $pondSuivante 
                                                            // ATTENTION A 1 LORS DE L'ADDITION
                                                            if ($pondSuivante <= 0) {
                                                                $pondSuivante = 1;
                                                            }

                                                            $sommeSsTotal += $TabResultatSousTot[0][$valDegrementant];
                                                            $sommeSsTotalBrute += $TabResultatSousTotBrute[0][$valDegrementant];
                                                            $sommeSsTotalPond += $TabPondeResult[0][$valDegrementant];


                                                            if ($coteSuivante >=   $maxSousTotCal / 2) {
                                                    ?>
                                                                <th style="background-color: white;" class="grilleThMaxetTotaSup">
                                                                    <?= arrondis($coteSuivante)  ?>
                                                                </th>
                                                            <?php

                                                            } else {
                                                            ?>
                                                                <th style="background-color: white;" class="grilleThMaxetTotaInf">
                                                                    <?= arrondis($coteSuivante) ?>
                                                                </th>
                                                            <?php

                                                            }
                                                        } else {
                                                            $coteSuivante = $TabResultatSousTot[0][$valDegrementant] - $totalPrecedantCal[0][$valDegrementant];
                                                            $coteSuivanteBrute = $TabResultatSousTotBrute[0][$valDegrementant] - $totalPrecedantCalBrute[0][$valDegrementant];
                                                            $pondSuivante = $TabPondeResult[0][$valDegrementant] - $totalPrecedantCalPon[$valDegrementant];
                                                            if ($pondSuivante <= 0) {
                                                                $pondSuivante = 1;
                                                            }
                                                            if ($coteSuivante >=  $maxSousTotCal / 2) {
                                                            ?>
                                                                <th style="background-color: white;" class="grilleThMaxetTotaSup">
                                                                    <?= arrondis($coteSuivante) ?>
                                                                </th>
                                                            <?php

                                                            } else {
                                                            ?>
                                                                <th style="background-color: white;" class="grilleThMaxetTotaInf">
                                                                    <?= arrondis($coteSuivante) ?>
                                                                </th>
                                                        <?php
                                                            }


                                                            $sommeSsTotal += $TabResultatSousTot[0][$valDegrementant] - $totalPrecedantCal[0][$valDegrementant];
                                                            $sommeSsTotalBrute += $TabResultatSousTotBrute[0][$valDegrementant] - $totalPrecedantCalBrute[0][$valDegrementant];
                                                            $sommeSsTotalPond += $TabPondeResult[0][$valDegrementant] - $totalPrecedantCalPon[$valDegrementant];
                                                        }
                                                        $ii++;
                                                    } else {
                                                        ?>
                                                        <th class="grilleThMaxetTotaInf">
                                                            0
                                                        </th>
                                                <?php
                                                    }
                                                }

                                                $petiTour++;
                                                ?>

                                            <?php

                                                $valDegrementant = $valDegrementant - 1;
                                            }


                                            ?>
                                            <th class="grilleThMaxetTotaSup">
                                                <?=
                                                $maxTrime * $gp2['frequence'];
                                                ?>
                                            </th>
                                            <?php
                                            $moyTGen =   $maxTrime * $gp2['frequence'] / 2;
                                            ?>
                                            <!-- BRUTE -->
                                            <!-- $somme2SommeSousTotalBrute ET $pontRealisee-->
                                            <?php
                                            if ($somme2SommeSousTotal >= $moyTGen) {
                                            ?>
                                                <th class="grilleThMaxetTotaSup">
                                                    <?= arrondis($somme2SommeSousTotal) ?>
                                                </th>
                                            <?php
                                            } else {
                                            ?>
                                                <th class="grilleThMaxetTotaInf">
                                                    <?= arrondis($somme2SommeSousTotal) ?>
                                                </th>
                                            <?php
                                            }
                                            ?>
                                            <th class="grilleThMaxetTotaSup" style="border:black">
                                            </th>
                                            <th colspan="2" style="border: 0px solid white; background-color:white">

                                            </th>
                                        </tr>
                                        <?php
                                        $totalPrecedantCalPon = $TabPondeResult[0];
                                        $somme2SommeSousTotal = 0.0;
                                        $somme2SommeSousTotalBrute = 0.0;
                                        $pontRealisee = 0.0;


                                        // ------------------------------------------------------------------------------

                                        ?>

                                        <!-- FIN SOUS DOMAINE  DU DOMAINE X-->
                            <?php
                                    }
                                }
                                // FIN VERIFICATION SI COURS E=EXISTE AVANT D'AFFICHER LES SOUS DOMAINE PUIS LES SOUS TOTAL
                            }
                            ?>
                            <!-- FIN DOMAINE -->
                            <?php
                            $maxP = array_sum($TabMaximaPer);
                            $texamen = $maxP * 4;

                            ?>
                            <!--Debitroclamation-->
                            <tr class="grilleThMaxetTotaSup">
                                <th colspan=<?= $nombre + 14 ?> style="background-color:black;border:black">

                                </th>
                            </tr>
                            <tr class="grilleThMaxetTotaSup">
                                <th class="grilleThMaxetTotaSup">
                                    MAXIMA_GENERAUX
                                </th>
                                <?php
                                $valDegrementant = $nombre;
                                $petiTour = 0;
                                $sommeTrimSem = 0;
                                $somme2SommeTrimSem = 0;

                                $sommeTrimSemPond = 0;
                                $somme2SommeTrimSemPond = 0;

                                $mxperiode = 0;
                                $mxexam = 0;
                                $cptFreq = 0;


                                for ($i = 0; $i <= $nombre; $i++) {
                                    $mxexam++;


                                    if ($petiTour >= 3) {
                                        $ttrim = $maxP * 4;
                                        $tgeneral += $ttrim;
                                        $mxperiode = 0;
                                        $cptFreq++;
                                ?>
                                        <th class="grilleThMaxetTotaSup">
                                            <?= arrondis($maxP * 4) ?>
                                        </th>
                                        <th class="grilleThMaxetTotaSup">
                                            <?= arrondis($maxP * 4) ?>
                                        </th>
                                    <?php
                                        $somme2SommeTrimSem = $somme2SommeTrimSem + $sommeTrimSem;
                                        $sommeTrimSem = 0;
                                        $somme2SommeTrimSemPond = $somme2SommeTrimSemPond + $sommeTrimSemPond;
                                        $sommeTrimSemPond = 0;
                                        $petiTour = 0;
                                    }

                                    if ($mxperiode == 0  and $gp2['frequence'] != $cptFreq) {
                                        $mxexam = 0;

                                    ?>
                                        <th class="grilleThMaxetTotaSup">
                                            <?= arrondis($maxP) ?>
                                        </th>
                                    <?php
                                        $mxperiode++;
                                    }
                                    if ($mxexam == 2) {
                                    ?>
                                        <th class="grilleThMaxetTotaSup">
                                            <?= arrondis($maxP * 2) ?>
                                        </th>
                                        <th class="grilleThMaxetTotaSup">
                                            <?= arrondis($maxP * 2) ?>
                                        </th>
                                        <?php

                                    }

                                    if ($i < $nombre) {
                                        if (!empty($TabResultat) and $mxexam != 2) {
                                        ?>
                                            <th class="grilleThMaxetTotaSup">
                                                <?= arrondis($maxP) ?>
                                            </th>
                                    <?php
                                        }
                                    }
                                    $petiTour++;
                                    ?>

                                <?php


                                    if ($valDegrementant != 0 and !empty($TabResultat)) {

                                        $sommeTrimSem = $sommeTrimSem + ($TabResultat[0][$valDegrementant]);
                                        $sommeTrimSemPond = $sommeTrimSemPond + ($TabPondeResult[0][$valDegrementant]);
                                    }

                                    $valDegrementant = $valDegrementant - 1;
                                }
                                // TOTAL GENERAUX
                                ?>
                                <th class="grilleThMaxetTotaSup">
                                    <?= arrondis($tgeneral) ?>
                                </th>
                                <th class="grilleThMaxetTotaSup">
                                    <?= arrondis($tgeneral) ?>
                                </th>
                                <th class="grilleThMaxetTotaSup" style="background-color:black;border:black">
                                </th>
                                <th colspan="2" style="border: 0px solid black; background-color:black">

                                </th>
                            </tr>
                            </tr>

                            <tr class="grilleThMaxetTotaSup">
                                <th class="grilleThMaxetTotaSup">
                                    TOTAUX
                                </th>
                                <?php
                                $valDegrementant = $nombre;
                                $petiTour = 0;
                                $sommeTrimSem = 0;
                                $somme2SommeTrimSem = 0;
                                $sommeTrimSemPond = 0;
                                $somme2SommeTrimSemPond = 0;
                                $mxperiode = 0;
                                $mxexam = 0;
                                $cptFreq = 0;
                                $moyTotauxPer = $maxP / 2;
                                $moyTotauxExa = $maxP;
                                $moyTotauxTri = $maxP * 2;
                                $moyenTotauxGene =  $tgeneral / 2;
                                $u = 0;
                                for ($i = 0; $i <= $nombre; $i++) {
                                    $mxexam++;
                                    if ($petiTour >= 3) {
                                        $mxperiode = 0;
                                        $cptFreq++;
                                        //  BRUTE
                                        //  $sommeTrimSemPond 
                                ?>
                                        <th style="background-color: black;border:black;">

                                        </th>
                                        <?php
                                        if ($sommeTrimSem >= $moyTotauxTri) {
                                        ?>
                                            <th style="background-color: pink;" class="grilleThMaxetTotaSup">
                                                <?= arrondis($sommeTrimSem) ?>
                                            </th>
                                        <?php
                                        } else {
                                        ?>
                                            <th style="background-color: pink;" class="grilleThMaxetTotaInf">
                                                <?= arrondis($sommeTrimSem) ?>
                                            </th>
                                        <?php
                                        }
                                        ?>
                                    <?php
                                        $somme2SommeTrimSem = $somme2SommeTrimSem + $sommeTrimSem;
                                        $sommeTrimSem = 0;
                                        $somme2SommeTrimSemPond = $somme2SommeTrimSemPond + $sommeTrimSemPond;
                                        $sommeTrimSemPond = 0;
                                        $petiTour = 0;
                                    }
                                    if ($mxperiode == 0 and $gp2['frequence'] != $cptFreq) {
                                        $mxexam = 0;
                                    ?>
                                        <th style="background-color: black;border:black;">

                                        </th>
                                    <?php
                                        $mxperiode++;
                                    }

                                    if ($mxexam == 2) {
                                    ?>
                                        <th style="background-color: black;border:black;">

                                        </th>
                                        <?php

                                    }

                                    $u++;
                                    if ($i < $nombre) {
                                        if (!empty($TabResultat)) {
                                            if ($u <= 2) {
                                                // PERIODE
                                                if ($TabResultat[0][$valDegrementant] >= $moyTotauxPer) {
                                        ?>
                                                    <th style="background-color: pink;" class="grilleThMaxetTotaSup">
                                                        <?= arrondis($TabResultat[0][$valDegrementant]) ?>
                                                    </th>
                                                <?php
                                                } else {
                                                ?>
                                                    <th style="background-color: pink;" class="grilleThMaxetTotaInf">
                                                        <?= arrondis($TabResultat[0][$valDegrementant]) ?>
                                                    </th>
                                                <?php
                                                }
                                            } else {
                                                // EXAMEN
                                                $u = 0;
                                                if ($TabResultat[0][$valDegrementant] >=  $moyTotauxExa) {
                                                ?>
                                                    <th style="background-color: pink;" class="grilleThMaxetTotaSup">
                                                        <?= arrondis($TabResultat[0][$valDegrementant]) ?>
                                                    </th>
                                                <?php
                                                } else {
                                                ?>
                                                    <th style="background-color: pink;" class="grilleThMaxetTotaInf">
                                                        <?= arrondis($TabResultat[0][$valDegrementant]) ?>
                                                    </th>
                                            <?php
                                                }
                                            }
                                        } else {
                                            ?>
                                            <th style="background-color: pink;" class="grilleThMaxetTotaSup">
                                                <span style=" text-decoration: underline ">0</span>
                                            </th>
                                <?php
                                        }
                                    }
                                    $petiTour++;
                                    if ($valDegrementant != 0 and !empty($TabResultat)) {
                                        $sommeTrimSem = $sommeTrimSem + ($TabResultat[0][$valDegrementant]);
                                        $sommeTrimSemPond = $sommeTrimSemPond + ($TabPondeResult[0][$valDegrementant]);
                                    }

                                    $valDegrementant = $valDegrementant - 1;
                                }
                                ?>
                                <th class="grilleThMaxetTotaSup" style="background-color:black;border:black">

                                </th>
                                <!-- BRUTE  -->
                                <!-- $somme2SommeTrimSemPond -->
                                <?php
                                if ($somme2SommeTrimSem >= $moyenTotauxGene) {
                                ?>
                                    <th style="background-color: pink;" class="grilleThMaxetTotaSup">
                                        <?= arrondis($somme2SommeTrimSem) ?>
                                    <?php
                                } else {
                                    ?>
                                    <th style="background-color: pink;" class="grilleThMaxetTotaInf">
                                        <?= arrondis($somme2SommeTrimSem) ?>
                                    <?php
                                }
                                    ?>
                                    </th>
                                    <th class="grilleThMaxetTotaSup" style="background-color:black;border:black">
                                    </th>
                                    <th colspan="2" style="border: 0px solid white; background-color:white">
                                        - PASSE(1)
                                    </th>
                            </tr>
                            <tr class="grilleThMaxetTotaSup">
                                <th class="grilleThMaxetTotaSup">
                                    POURCENTAGE
                                </th>
                                <?php
                                $valDegrementant = $nombre;
                                $petiTour = 0;
                                $sommeTrimSem = 0;
                                $somme2SommeTrimSem = 0;

                                $sommeTrimSemPond = 0;
                                $somme2SommeTrimSemPond = 0;

                                $mxperiode = 0;
                                $mxexam = 0;
                                $cptFreq = 0;
                                $pourcResu = 0;
                                for ($i = 0; $i <= $nombre;) {
                                    $mxexam++;
                                    if ($valDegrementant >= 0) {

                                        // POURCENTAGE TOTAL
                                        if ($petiTour >= 3) {
                                            $mxperiode = 0;
                                            $cptFreq++;
                                            $pourcResu = arrondis(fn_pourcentage($sommeTrimSem, $ttrim));
                                ?>
                                            <th style="background-color: black;border:black;">

                                            </th>
                                            <?php
                                            if ($pourcResu >= 50) {
                                            ?>
                                                <th class="grilleThMaxetTotaSup">
                                                    <?= $pourcResu . '%' ?>
                                                </th>
                                            <?php
                                            } else {
                                            ?>
                                                <th class="grilleThMaxetTotaSup">
                                                    <?= $pourcResu . '%' ?>
                                                </th>
                                            <?php

                                            }
                                            $somme2SommeTrimSem = $somme2SommeTrimSem + $sommeTrimSem;
                                            $sommeTrimSem = 0;
                                            $somme2SommeTrimSemPond = $somme2SommeTrimSemPond + $sommeTrimSemPond;
                                            $sommeTrimSemPond = 0;
                                            $petiTour = 0;
                                        }
                                        if ($mxperiode == 0  and $gp2['frequence'] != $cptFreq) {
                                            $mxexam = 0;
                                            ?>
                                            <th style="background-color: black;border:black;">

                                            </th>
                                        <?php
                                            $mxperiode++;
                                        }
                                        if ($mxexam == 2) {
                                        ?>
                                            <th style="background-color: black;border:black;">

                                            </th>

                                            <?php
                                            if ($i < $nombre) {

                                                if (!empty($TabResultat) and !empty($TabPondeResult)) {
                                                    $examen = $maxP * 2;
                                                    $pourcResu = arrondis(fn_pourcentage($TabResultat[0][$valDegrementant], $examen));
                                                    if ($pourcResu >= 50) {
                                            ?>
                                                        <th class="grilleThMaxetTotaSup">
                                                            <?= $pourcResu . '%' ?>
                                                        </th>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <th class="grilleThMaxetTotaInf">
                                                            <?= $pourcResu . '%' ?>
                                                        </th>
                                                    <?php
                                                    }
                                                    $examen = 0;
                                                } else {
                                                    ?>
                                                    <th class="grilleThMaxetTotaSup">
                                                        <span style=" text-decoration: underline ">0</span>
                                                    </th>
                                                <?php
                                                }
                                            }
                                        }
                                        if ($i < $nombre and $mxexam != 2) {
                                            $pourcResu = arrondis(fn_pourcentage($TabResultat[0][$valDegrementant], $maxP));
                                            if (!empty($TabResultat) and !empty($TabPondeResult)) {
                                                if ($pourcResu >= 50) {
                                                ?>
                                                    <th class="grilleThMaxetTotaSup">
                                                        <?= $pourcResu . '%'  ?>
                                                    </th>
                                                <?php
                                                } else {
                                                ?>
                                                    <th class="grilleThMaxetTotaInf">
                                                        <?= $pourcResu . '%'  ?>
                                                    </th>
                                                <?php
                                                }
                                            } else {
                                                ?>
                                                <th class="grilleThMaxetTotaSup">
                                                    <span style=" text-decoration: underline ">0</span>
                                                </th>
                                        <?php
                                            }
                                        }



                                        $petiTour++;
                                        ?>

                                <?php
                                    }


                                    if ($valDegrementant != 0 and !empty($TabResultat)) {

                                        $sommeTrimSem = $sommeTrimSem + ($TabResultat[0][$valDegrementant]);
                                        $sommeTrimSemPond = $sommeTrimSemPond + ($TabPondeResult[0][$valDegrementant]);
                                    }
                                    $valDegrementant = $valDegrementant - 1;

                                    $i++;
                                }

                                ?>
                                <th class="grilleThMaxetTotaSup" style="background-color:black;border:black">
                                </th>
                                <!-- POURCENTAHE TOTAL GENERAL-->
                                <?php
                                $pourcResu = arrondis(fn_pourcentage($somme2SommeTrimSem, $tgeneral));
                                if ($pourcResu >= 50) {
                                ?>
                                    <th class="grilleThMaxetTotaSup">
                                        <?= $pourcResu . '%'   ?>
                                    </th>
                                <?php
                                } else {
                                ?>
                                    <th class="grilleThMaxetTotaInf">
                                        <?= $pourcResu . '%'   ?>
                                    </th>
                                <?php
                                }
                                ?>

                                <th class="grilleThMaxetTotaSup" style="background-color:black;border:black">
                                </th>
                                <th colspan="2" style="border: 0px solid white; background-color:white">
                                    - DOUBLE(1)
                                </th>

                            </tr>
                            <tr class="grilleThMaxetTotaSup">
                                <th class="grilleThMaxetTotaSup">
                                    PLACE/NBRE ELEVES
                                </th>
                                <?php
                                $valDegrementant = $nombre;
                                $petiTour = 0;
                                $sommeTrimSem = 0;
                                $somme2SommeTrimSem = 0;

                                $sommeTrimSemPond = 0;
                                $somme2SommeTrimSemPond = 0;

                                $mxperiode = 0;
                                $mxexam = 0;
                                $cptFreq = 0;
                                for ($i = 0; $i <= $nombre;) {
                                    $mxexam++;
                                    if ($valDegrementant >= 0) {


                                        if ($petiTour >= 3) {
                                            $mxperiode = 0;
                                            $cptFreq++;
                                ?>
                                            <th style="background-color: black;border:black;">

                                            </th>
                                            <th class="grilleThMaxetTotaSup">

                                            </th>
                                        <?php
                                            $somme2SommeTrimSem = $somme2SommeTrimSem + $sommeTrimSem;
                                            $sommeTrimSem = 0;
                                            $somme2SommeTrimSemPond = $somme2SommeTrimSemPond + $sommeTrimSemPond;
                                            $sommeTrimSemPond = 0;
                                            $petiTour = 0;
                                        }
                                        if ($mxperiode == 0  and $gp2['frequence'] != $cptFreq) {
                                            $mxexam = 0;
                                        ?>
                                            <th style="background-color: black;border:black;">

                                            </th>
                                        <?php
                                            $mxperiode++;
                                        }

                                        if ($mxexam == 2) {
                                        ?>
                                            <th style="background-color: black;border:black;">

                                            </th>
                                            <?php

                                        }

                                        if ($i < $nombre) {

                                            if (!empty($TabResultat) and !empty($TabPondeResult)) {
                                            ?>
                                                <th class="grilleThMaxetTotaSup">

                                                </th>
                                            <?php
                                            } else {
                                            ?>
                                                <th class="grilleThMaxetTotaSup">

                                                </th>
                                        <?php
                                            }
                                        }
                                        $petiTour++;
                                        ?>

                                <?php
                                    }
                                    if ($valDegrementant != 0 and !empty($TabResultat)) {

                                        $sommeTrimSem = $sommeTrimSem + ($TabResultat[0][$valDegrementant]);
                                        $sommeTrimSemPond = $sommeTrimSemPond + ($TabPondeResult[0][$valDegrementant]);
                                    }
                                    $valDegrementant = $valDegrementant - 1;

                                    $i++;
                                }

                                ?>
                                <th class="grilleThMaxetTotaSup" style="background-color:black;border:black">
                                </th>
                                <th class="grilleThMaxetTotaSup">
                                </th>

                                <th class="grilleThMaxetTotaSup" style="background-color:black;border:black">
                                </th>
                                <th colspan="2" style="border: 0px solid white; background-color:white">
                                    <?php
                                    echo "- " . formDate(dateJour());
                                    ?>
                                </th>

                            </tr>
                            <tr class="grilleThMaxetTotaSup">
                                <th class="grilleThMaxetTotaSup">
                                    APPLICATION
                                </th>
                                <?php
                                $valDegrementant = $nombre;
                                $petiTour = 0;
                                $sommeTrimSem = 0;
                                $somme2SommeTrimSem = 0;

                                $sommeTrimSemPond = 0;
                                $somme2SommeTrimSemPond = 0;

                                $mxperiode = 0;
                                $mxexam = 0;
                                $cptFreq = 0;
                                for ($i = 0; $i <= $nombre;) {
                                    $mxexam++;
                                    if ($valDegrementant >= 0) {


                                        if ($petiTour >= 3) {
                                            $mxperiode = 0;
                                            $cptFreq++;
                                ?>
                                            <th style="background-color: black;border:black;">

                                            </th>
                                            <th style="background-color: black;border:black;">

                                            </th>
                                        <?php
                                            $somme2SommeTrimSem = $somme2SommeTrimSem + $sommeTrimSem;
                                            $sommeTrimSem = 0;
                                            $somme2SommeTrimSemPond = $somme2SommeTrimSemPond + $sommeTrimSemPond;
                                            $sommeTrimSemPond = 0;
                                            $petiTour = 0;
                                        }
                                        if ($mxperiode == 0  and $gp2['frequence'] != $cptFreq) {
                                            $mxexam = 0;
                                        ?>
                                            <th style="background-color: black;border:black;">

                                            </th>
                                        <?php
                                            $mxperiode++;
                                        }

                                        if ($mxexam == 2) {
                                        ?>
                                            <th style="background-color: black;border:black;">

                                            </th>
                                            <?php

                                        }

                                        if ($i < $nombre and $mxexam != 2) {

                                            if (!empty($TabResultat) and !empty($TabPondeResult)) {
                                            ?>
                                                <th class="grilleThMaxetTotaSup">

                                                </th>
                                            <?php
                                            } else {
                                            ?>
                                                <th class="grilleThMaxetTotaSup">

                                                </th>
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <th style="background-color: black;border:black;">

                                            </th>
                                        <?php
                                        }
                                        $petiTour++;
                                        ?>

                                <?php
                                    }


                                    if ($valDegrementant != 0 and !empty($TabResultat)) {

                                        $sommeTrimSem = $sommeTrimSem + ($TabResultat[0][$valDegrementant]);
                                        $sommeTrimSemPond = $sommeTrimSemPond + ($TabPondeResult[0][$valDegrementant]);
                                    }
                                    $valDegrementant = $valDegrementant - 1;

                                    $i++;
                                }

                                ?>
                                <th class="grilleThMaxetTotaSup" style="background-color:black;border:black">
                                </th>
                                <th class="grilleThMaxetTotaSup" style="background-color:black;border:black">
                                </th>
                                <th colspan="2" style="border: 0px solid white; background-color:white">

                                </th>


                            </tr>

                            <tr class="grilleThMaxetTotaSup">
                                <th class="grilleThMaxetTotaSup">
                                    CONDUITE
                                </th>
                                <?php
                                $valDegrementant = $nombre;
                                $petiTour = 0;
                                $sommeTrimSem = 0;
                                $somme2SommeTrimSem = 0;

                                $sommeTrimSemPond = 0;
                                $somme2SommeTrimSemPond = 0;

                                $mxperiode = 0;
                                $mxexam = 0;
                                $cptFreq = 0;
                                for ($i = 0; $i <= $nombre;) {
                                    $mxexam++;
                                    if ($valDegrementant >= 0) {


                                        if ($petiTour >= 3) {
                                            $mxperiode = 0;
                                            $cptFreq++;
                                ?>
                                            <th style="background-color: black;border:black;">

                                            </th>
                                            <th style="background-color: black;border:black;">

                                            </th>
                                        <?php
                                            $somme2SommeTrimSem = $somme2SommeTrimSem + $sommeTrimSem;
                                            $sommeTrimSem = 0;
                                            $somme2SommeTrimSemPond = $somme2SommeTrimSemPond + $sommeTrimSemPond;
                                            $sommeTrimSemPond = 0;
                                            $petiTour = 0;
                                        }
                                        if ($mxperiode == 0  and $gp2['frequence'] != $cptFreq) {
                                            $mxexam = 0;
                                        ?>
                                            <th style="background-color: black;border:black;">

                                            </th>
                                        <?php
                                            $mxperiode++;
                                        }

                                        if ($mxexam == 2) {
                                        ?>
                                            <th style="background-color: black;border:black;">

                                            </th>
                                            <?php

                                        }

                                        if ($i < $nombre and $mxexam != 2) {

                                            if (!empty($TabResultat) and !empty($TabPondeResult)) {
                                            ?>
                                                <th class="grilleThMaxetTotaSup">

                                                </th>
                                            <?php
                                            } else {
                                            ?>
                                                <th class="grilleThMaxetTotaSup">
                                                    <span style=" text-decoration: underline ">0</span>
                                                </th>
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <th style="background-color: black;border:black;">

                                            </th>
                                        <?php
                                        }
                                        $petiTour++;
                                        ?>

                                <?php
                                    }


                                    if ($valDegrementant != 0 and !empty($TabResultat)) {

                                        $sommeTrimSem = $sommeTrimSem + ($TabResultat[0][$valDegrementant]);
                                        $sommeTrimSemPond = $sommeTrimSemPond + ($TabPondeResult[0][$valDegrementant]);
                                    }
                                    $valDegrementant = $valDegrementant - 1;

                                    $i++;
                                }

                                ?>
                                <th class="grilleThMaxetTotaSup" style="background-color:black;border:black">
                                </th>
                                <th class="grilleThMaxetTotaSup" style="background-color:black;border:black">
                                </th>
                                <th colspan="2" style="border: 0px solid white; background-color:white">

                                </th>


                            </tr>
                            <tr class="grilleThMaxetTotaSup">
                                <th class="grilleThMaxetTotaSup">
                                    SIGNATURE
                                </th>
                                <?php
                                $valDegrementant = $nombre;
                                $petiTour = 0;
                                $sommeTrimSem = 0;
                                $somme2SommeTrimSem = 0;

                                $sommeTrimSemPond = 0;
                                $somme2SommeTrimSemPond = 0;

                                $mxperiode = 0;
                                $mxexam = 0;

                                for ($i = 0; $i <= $nombre; $i++) {

                                    $mxperiode++;

                                    if ($petiTour == 3) {
                                        $mxperiode = 0;
                                        $mxexam++;


                                ?>
                                        <th colspan="<?= ($mxexam <= 1) ? $petiTour + 5 : $petiTour + 4 ?>">

                                        </th>
                                    <?php
                                        $somme2SommeTrimSem = $somme2SommeTrimSem + $sommeTrimSem;
                                        $sommeTrimSem = 0;
                                        $somme2SommeTrimSemPond = $somme2SommeTrimSemPond + $sommeTrimSemPond;
                                        $sommeTrimSemPond = 0;
                                        $petiTour = 0;
                                    }


                                    $petiTour++;
                                    ?>

                                <?php


                                }

                                ?>
                                <th style=" background-color:white; border:white">

                                </th>

                                <th style="background-color:black; border:black">

                                </th>
                                <th colspan="2" style="border: 0px solid white; background-color:white">

                                </th>
                            </tr>
                            <!--fin proclamation-->
                        </tbody>
                    </table>

                    <div style="font-size: 10px; padding:0px; margin:0px">
                        <div style="margin-top:0px; display: flex;">
                            <div class="pull-left" style="width:50%;">
                                - L'élève ne poura passer dans la classe superieurs'il n'a subi avec succès un examen de repêchage en : . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .
                                . . . . . . . . . . . . . . . . . </br>

                                - L'élève passe dans la classe superieur (1)<?= ($pourcResu >= 50) ? '<span class="glyphicon glyphicon-ok "></span>' : ''; ?></br>
                                - L'élève double la classe (1)<?= ($pourcResu < 50) ? '<span class="glyphicon glyphicon-ok " style="color:red"></span>' : '';  ?></br>
                            </div>
                            <div style="text-align: center; width:50%; margin-left:  30px ;">
                                <span class="pull-left">Fait à ...................... <span style="margin-left: 20px;">le <?= '  ' . formDate(dateJour()); ?></span></span></br>
                            </div>
                        </div>
                        <div style="margin-top:5px; display: flex; ">
                            <div class="pull-left" style="width:50%;text-align:center; ">
                                <span style="margin-top: 20%;text-align:center">SIGNATURE DE L'ELEVE</span>
                            </div>
                            <div style="text-align: center; width:50%; margin-left:  30px ; ">
                                <span style="margin-top: 80%;">CHEF D'ETABLISSEMENT</br>
                                    NZANZU ASINGYA DIEU-MERCI</br>
                                    NOM ET SIGNATURE
                                </span>
                            </div>
                        </div>
                        <div style="text-align: center;">
                            SCEAU DE L'ECOLE
                        </div>
                        <div style=" display: flex; ">
                            <div class="pull-left" style="width:50%;  margin-top:30px">
                                (1) Buffer la mention inutile</br>
                                Note importante: Le bulletin est sans valeur s'il est raturé ou surchargé.<br />
                            </div>
                            <?php
                            if (isset($_POST['data1'])) {
                            ?>
                                <div style="width:50%; ;">
                                    <?php
                                    $message = $_SESSION['urlserver'] . '/e-ecole/control.param_access/ctr_bulletin.php?verifBlt=true&idE=' . $selEleve['idUtilisateur'] . '&idClasse=' . $idCls . '&idU=' . $_SESSION['idUtilisateur'] . '&idAnneeSco=' . $idAnn;
                                    $idqr = 'qrcarteBlt&idEl=' . $selEleve['idUtilisateur'];
                                    $ds = "../qrcartes&IdEco=" . $_SESSION['monEcole']['idEcole'] . "/";
                                    ?>
                                    <img src="<?= genererqr($idqr, $message, $ds) ?>
                        " style="width:90px; height:90px; margin-left:80%" />
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <span type="button" class=" glyphicon glyphicon-print noprint" style="margin:0px; color:gray" onclick="imprimer('bulletin<?= $cptDoc ?>')"></span>
                </div>
                <?php
                mini_footer_doc();
                ?>
                <span style="margin:0px; height:6px"></span>
                <!-- FIN LISTE BULLETIN -->
        <?php
            }
        }
        ?>

    </div>

<?php
} else {
    echec_controleur('VEUILLEZ ELABORE UN CALANDRIER SCOLAIRE POUR CETTE CLASSE!!!');
}
?>