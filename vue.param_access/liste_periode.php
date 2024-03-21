<?php
(empty($_SESSION)) ? session_start() : '';
include_once('../model.param_access/org_periode.class.php');
include_once('../model.param_access/dir_directeur.class.php');
include_once('../model.param_access/org_anneesco.class.php');
?>


<table class="table table-bordered table-striped table-condensed">

    <thead>
        <tr>
            <th>N</th>
            <th>
                <center>PERIODE</center>
            </th>
            <th>
                <center>PROMOTION</center>
            </th>
            <th>
                <center>SECTION</center>
            </th>
            <th>
                <center>UNITE</center>
            </th>
            <th>
                <center>DATE DEBIT</center>
            </th>
            <th>
                <center>DATE FIN</center>
            </th>
            <th>
                <center>OPTIONS</center>
            </th>

        </tr>
    </thead>
    <tbody>
        <?php

        $annee = null;
        $idann = null;
        $idPro = null;
        if (isset($_GET['idProm']) and isset($_GET['idann']) and isset($_GET['annee'])) {
            $idPro = htmlspecialchars($_GET['idProm']);
            $annee = htmlspecialchars($_GET['annee']);
            $idann = htmlspecialchars($_GET['idann']);
        } elseif (!isset($_GET['idProm']) and isset($_GET['idann'])) {
            $idann = htmlspecialchars($_GET['idann']);
            $pro = new dir_directeur();
            $pro = $pro->selectionnerByUtiAnnDescLimit($_SESSION['idUtilisateur'], $idann)->fetch();
            if ($pro == true) {
                $idPro = $pro['idPromotion'];
                $annee = $pro['anneeSco'];
                $idann = $pro['idAnneeSco'];
            }
        } elseif (!isset($_GET['idProm']) and !isset($_GET['idann']) and !isset($_GET['annee'])) {

            $ann = new org_anneesco();
            $ann = $ann->selectionnerDerAnEcode($_SESSION['monEcole']['idEcole'])->fetch();
            if ($ann == true) {
                $idann = $ann['idAnneeSco'];
                $annee = $ann['anneeSco'];
            }


            $pro = new dir_directeur();
            $pro = $pro->selectionnerByUtiAnnDescLimit($_SESSION['idUtilisateur'], $idann)->fetch();
            if ($pro == true) {
                $idPro = $pro['idPromotion'];
                $annee = $pro['anneeSco'];
                $idann = $pro['idAnneeSco'];
            }
        }
        // 

        $peri02 = new org_periode();
        $n = 0;
        $peri02 = $peri02->filtreByAnneePromo($idann, $idPro);
        if ($peri02 == true) {
            foreach ($peri02  as $selperi02) {
                $n++;
                $activeColor = "background:white;color:green";
                $active = 1;
                if ($selperi02['active'] != 1) {
                    $activeColor = "background:gray";
                    $active = '';
                }
                $idperi02 = 'pr2' . $selperi02['idPeriode'];
                $iddtD = 'dtD' . $selperi02['idPeriode'];
                $iddtF = 'dtF' . $selperi02['idPeriode'];
        ?>
                <tr style=<?= $activeColor ?>>
                    <td><?= $n ?></td>
                    <td><input id="<?= $idperi02 ?>" class="form-control" value="<?= strtoupper($selperi02['periode']) ?>"></td>
                    <td><?= strtoupper($selperi02['promotion']) ?></td>
                    <td><?= strtoupper($selperi02['section']) ?></td>
                    <td><?= strtoupper($selperi02['unite']) ?></td>

                    <td><input id="<?= $iddtD ?>" type="date" class="form-control" value=<?= $selperi02['dateDebit'] ?>></td>
                    <td><input id="<?= $iddtF ?>" type="date" class="form-control" value=<?= $selperi02['dateFin'] ?>></td>
                    <td class="dropdown" style="height:9px">
                        <button style="width:100%; height:100%" data-toggle="dropdown" href="#"> Options<b class="caret pull-right"></b></button>
                        <ul class="dropdown-menu pull-right">
                            <li style="color:red"><a href="#" onclick="Orientation('../control.param_access/ctr_periode.php?ModP%reu&idPerio2=<?= $selperi02['idPeriode'] ?>&peri02='+$('<?= '#' . $idperi02 ?>').val()+'&dtD='+$('<?= '#' . $iddtD ?>').val()+'&dtF='+$('<?= '#' . $iddtF ?>').val()+'&idann=<?= $idann ?>&annee=<?= $annee ?>&idProm=<?= $idPro ?>','#list_pr2')">Valider Mod.</a></li>

                            <?php
                            if ($active == 1) {
                            ?>
                                <li><a href="#" style="color:red" onclick="Encour()">Desactivation</a></li>
                            <?php
                            } else {
                            ?>
                                <li><a href="#" style="color:green" onclick="Encour()">Activer</a></li>
                            <?php
                            }

                            ?>

                            <li class="divider"></li>
                            <li style="color:red"><a href="#" onclick="Orientation('../control.param_access/ctr_periode.php?SuprPerio2&idPerio2=<?= $selperi02['idPeriode'] ?>&idann=<?= $idann ?>&annee=<?= $annee ?>&idProm=<?= $idPro ?>','#list_pr2')">Supprimer</a></li>
                            <li class="divider"></li>


                        </ul>
                    </td>
                </tr>
        <?php
            }
        }
        ?>

    </tbody>
    <center style="color:green; font-size:20px"><label><?= $annee ?></label></center>
</table>