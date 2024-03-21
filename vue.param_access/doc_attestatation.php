<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bootstrap/dist/css/monstyle.css" rel=stylesheet>
    <script src="../jquery/dist/jquery.min.js"></script>
    <script src="../plugins/stream/stream.js"></script>
    <script src="../plugins/stream/stream-min.js"></script>
    <script src="../jquery/dist/summernote/summernote-bs4.min.js"></script>
    <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="../moncss.css">
    <title>E-ecole</title>



</head>

<body style="font-size:11px; padding:0px" id="app">
    <?php

    include_once('../model.param_access/org_inscription.class.php');
    include_once('../model.param_access/org_anneesco.class.php');
    include_once('../model.param_access/param_ecole.class.php');
    include_once('../control.param_access/mes_methodes.php');
    include_once('../plugins/phpqrcode/genererqr.php');

    $idCls = htmlspecialchars($_GET['idC']);
    $idEle = htmlspecialchars($_GET['idE']);
    $idU = htmlspecialchars($_GET['idU']);
    $idAnn = htmlspecialchars($_GET['idA']);
    $selEleve = 0;
    $selEleve = org_inscription::rechercherByClAnneeEleve($idCls, $idAnn, $idEle)->fetch();
    $ecole = param_ecole::rechercher($selEleve['idEcole'])->fetch();

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


    ?>

    <div class="" style="width:100%; height:1875px; margin:10px;">
        <div style="font-size:14px">
            <center><label><?= strtoupper($selEleve['nomPays']) ?></label></center>
            <center><label>MINISTERE DE L’ENSEIGNEMENT PRIMAIRE, SECONDAIRE ET PROFESSIONNEL</label></center>
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
        <center style="margin-top:20PX; font-size:20px;border-bottom: 1px solid #f2f2f2; "><label>ATTESTATION DE FREQUANTATION</label></center>

        <div class="text-justify">
            <p style="line-height:25px; margin-bottom:40px">
                <span style="color:white">................</span>Nous soussignons <strong><?= strtoupper($ecole['nomEcole']) ?></strong> à l'adresse <strong><?= $selEleve['nomPays'] . '/' . $selEleve['nomProvince'] . '/' . $selEleve['nomVilleTerritoire'] ?></strong>,nous attestons par la présente que Les cordonnées scannées appartiennent à l’élève nommé <strong><?= $selEleve['nomUtilisateur'] . ' ' . $selEleve['postnomUtilisateur'] . ' ' . $selEleve['prenomUtilisateur'] ?></strong>, de sexe <strong><?= (trim($selEleve['genre']) != '') ? $selEleve['genre'] : 'AUCUN' ?></strong> date et lieu de naissance : <strong><?= strtoupper($selEleve['lieuNais'] . ' / ' . $selEleve['dateNais']) ?></strong>, résident à <strong><?= $selEleve['nomPays'] . '/' . $selEleve['nomProvince'] . ' / ' . $selEleve['nomVilleTerritoire'] . '/' . $selEleve['adresse'] ?></strong>, numero carte d'électeur : <strong><?= (trim($selEleve['nnCarteElect']) != '') ? ' ' . $selEleve['nnCarteElect'] : 'AUCUN' ?></strong> , nom du père <strong><?= (trim($selEleve['nomPere']) != '') ? ' ' . $selEleve['nomPere'] : 'AUCUN' ?></strong>, nom de la mère <strong><?= (trim($selEleve['nomMere']) != '') ? $selEleve['nomMere'] : 'AUCUN' ?></strong>.<br> Inscrit dans la (les) classes ci-après </br>
                <spam class="text-left">
                    <?php
                    $eleve = org_inscription::rechercheInscription($ecole['idEcole'], $idEle);
                    $u = 1;
                    foreach ($eleve as $sel) {
                    ?>
                        <span style="color:white">................</span><?= $u++ ?> <?= ') ' . strtoupper($sel['section']) ?> <?= (trim($sel['section']) == '1') ? ' ére ANNEE ' : ' éme ANNEE ' ?> <?= strtoupper($sel['promotion']) . ' : ' ?><?= $sel['anneeSco'] ?><br>
                    <?php
                    }
                    ?>




                    <span style="color:white">................</span>En foi de quoi, nous vous présentons ces informations pour luis servir et vouloir ce que de droit.


            </p>
        </div>

        <?php
        mini_footer_doc();
        ?>






    </div>

</body>

</html>