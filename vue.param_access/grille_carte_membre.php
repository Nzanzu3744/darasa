<?php
(empty($_SESSION)) ? session_start() : '';


include_once('../plugins/phpqrcode/genererqr.php');
include_once('../model.param_access/org_inscription.class.php');
include_once('../model.param_access/org_anneesco.class.php');
include_once('../control.param_access/mes_methodes.php');

$idCls = $_GET['idClasse'];
$idAnn = $_GET['idAnneeSco'];

$cptDoc = 1;
$sommeCoteTG = 0.0;
$sommepondeTG = 0.0;

$ListeEle = deserialiser($_POST['data1']);

?>
<div class=" heightSous_Fen">
    <div class="rubaBoutonDoc" style="width:100%">
        <span type="button" class=" btn btn-sm btn-default  glyphicon glyphicon-print" style="margin:3px" value="Imprimer" onclick="imprimer('carte_membre')"></span>
    </div>
    <div class="heightSous_Fen" id="carte_membre">
        <table>
            <tbody>

                <?php
                $i = 0;
                $u = 0;
                foreach ($ListeEle as $idEle) {
                    $eleve = new org_inscription();
                    $el = $eleve->rechercherByClAnneeEleve($idCls, $idAnn, $idEle);

                    $u++;
                    ($u == 1) ? '<tr style="border: 1px solid #f2f2f2;" >' : '';
                    foreach ($el as $selEleve) {
                        $i++;

                        // rgba(53, 141, 224, 0.851)


                ?>
                        <!-- ENTETE BULLETIN -->

                        <td class="" style="border: 5px solid white; width:320px; height:180px; font-size:10px; background-color:white" id='carte001'>
                            <div style="background: #f3f3f3; color:gray; height:30px;width:100%">
                                <center>
                                    <p>REPUBLIQUE DEMOCRATIQUE DU CONGO</p>
                                    <p style="font-size: 8px;margin-top:-10px"> MINISTERE DE L’ENSEIGNEMENT PRIMAIRE, SECONDAIRE ET PROFESSIONNEL</p>
                                </center>
                            </div>
                            <div class="contenaire" style="height:40px; width: 100%; margin:0px;border-top: 1px solid #f3f3f3;">
                                <div style="margin:0px;padding:0px; width:106px">
                                    <center style="margin-top:8%; font-size:12px">
                                        <x>CARTE D'ELEVE</x>
                                    </center>
                                </div>
                                <div style="margin:0px;padding:0px; width:107px">
                                    <img src="<?= $_SESSION['monEcole']['logoEcole'] ?>" style="width:100px; height:40px;padding:0px">
                                </div>
                                <div style="height:100%; width:106px;margin:0px;padding:0px; ">
                                    <div>
                                        <x>ID : <?= $_SESSION['monEcole']['idEcole'] ?> </x>
                                        <x class="pull-right">B.P. <?= $_SESSION['monEcole']['bpEcole'] . '/' . $_SESSION['monEcole']['nomVilleTerritoire'] ?></x>
                                    </div>
                                    ECOLE : <?= $_SESSION['monEcole']['nomEcole'] ?></br>
                                    SINGLE : <?= $_SESSION['monEcole']['singleEcole'] ?></br>
                                </div>
                            </div>
                            <!-- background-color:rgba(53, 141, 224, 0.851); -->
                            <div class="contenaire" style="height:100px; margin:0px; padding:0px;">
                                <div style="height:100%; width: 80px; margin:0px;padding:0px; border-top: 3px solid blue">
                                    <img src="<?= '../images/' . $selEleve['photoUtilisateur'] ?>" style="width:98%; height:98%;margin:1px">
                                </div>
                                <div style="height:100%;width:140px; font-size:9px; margin:0px;padding:0px;border-top: 3px solid red">
                                    <x>
                                        <x> ID : <?= $selEleve['idUtilisateur'] ?> </x>
                                        <x class="pull-right"> SEXE :<?= $selEleve['genre'] ?></x>
                                    </x><br>

                                    Nom : <x><?= $selEleve['nomUtilisateur'] ?></x></br>
                                    Postnom/Prenom : <x><?= $selEleve['postnomUtilisateur'] . '/' . $selEleve['prenomUtilisateur'] ?></x></br>
                                    Date /lieu de Naissance : <x><?= $selEleve['lieuNais'] . '/' . $selEleve['dateNais'] ?></x></br>
                                    Adresse : <x><?= $selEleve['codePays'] . '/' . $selEleve['nomProvince'] . '/' . $selEleve['nomVilleTerritoire'] . '/' . $selEleve['adresse'] ?></x></br>

                                    NN Carte d'électeur : <x><?= $selEleve['nnCarteElect'] ?></x></br>
                                    <?php
                                    $idAnnee = htmlspecialchars($_GET['idAnneeSco']);
                                    $anneeSco = new  org_anneesco();
                                    $anneeSco = $anneeSco->rechercher($idAnnee)->fetch();
                                    ?>


                                </div>
                                <div style="height:100%;width:80px ;margin:0px;padding:0px; border-top: 3px solid yellow">
                                    <center>
                                        <?php
                                        $message =  $_SESSION['urlserver'] . '/e-ecole/control.param_access/ctr_attestation.php?idE=' . $selEleve['idUtilisateur'] . '&idC=' . $idCls . '&idU=' . $_SESSION['idUtilisateur'] . '&idA=' . $idAnn;
                                        $idqr = 'qrcarte&idEl=' . $selEleve['idUtilisateur'];
                                        $ds = "../qrcartes&IdEco=" . $_SESSION['monEcole']['idEcole'] . "/";
                                        ?>
                                        <img src="<?= genererqr($idqr, $message, $ds) ?>" style="width:98%; height:90%;margin:1px" /><br>
                                        <?= $anneeSco['anneeSco'] ?>
                                    </center>
                                </div>
                            </div>
                            <div class="col-sm-12" style="height:30px; margin:0px;padding:0px;background: #f3f3f3; color:gray">
                                <div class="col-sm-5" style="padding:1px;">
                                    Nom du Père : <?= $selEleve['nomPere'] ?></BR>
                                    Nom de la mère : <?= $selEleve['nomMere'] ?>
                                </div>
                                <div class="col-sm-7" style="padding:1px;">
                                    Lieu de delivrance : <?= $_SESSION['monEcole']['codePays'] . '/' . $_SESSION['monEcole']['nomProvince'] . '/' . $_SESSION['monEcole']['nomVilleTerritoire'] ?></BR>
                                    Nom : <x style=" font-size:9px"> <?= strtoupper($_SESSION['nom'] . ' ' . $_SESSION['postnom'] . ' ' . $_SESSION['postnom']) ?></x>
                                </div>
                            </div>
                        </td>


                <?php


                    }
                    if ($u == 3) {
                        $u = 0;
                        echo '</tr>';
                    }
                }

                ?>
            </tbody>
        </table>
    </div>
</div>
<div><?= $i ?> CARTES GENEREES</div>