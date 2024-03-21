<?php
(empty($_SESSION)) ? session_start() : '';
include_once('../model.param_access/org_classe.class.php');
include_once('../model.param_access/org_promotion.class.php');
include_once('../model.param_access/org_section.class.php');
include_once('../model.param_access/org_unite.class.php');
include_once('../model.param_access/org_anneesco.class.php');
include_once('../model.param_access/dir_directeur.class.php');

?>
<table class="table table-bordered table-striped table-condensed">

    <thead>
        <tr>
            <th>N</th>
            <th>Sel</th>
            <th>Id_Classe</th>
            <th>Promotion</th>
            <th>Section</th>
            <th>Unite</th>
        </tr>
    </thead>
    <tbody>
        <tr>

            <?php
            $ann = new org_anneesco();
            $ann = $ann->selectionnerDerAnEcode($_SESSION['monEcole']['idEcole'])->fetch();
            $idnn = null;
            if ($ann == true) {
                $idnn = $ann['idAnneeSco'];
            }

            if (isset($_GET['idann'])) {
                $idnn = $_GET['idann'];
            }


            $Attridir = new dir_directeur();
            $Attridir = $Attridir->selectionnerByUtiAnnDescLimit($_SESSION['idUtilisateur'], $idnn, $_SESSION['monEcole']['idEcole'])->fetch();
            $idPromot01 = 0;
            if ($Attridir == true) {
                $idPromot01 = $Attridir['idPromotion'];
            }

            if (isset($_GET['idProm'])) {
                $idPromot01 = $_GET['idProm'];
            }

            $clas = new org_classe();
            $n = 0;

            foreach ($clas->selectionnerByPromEcole($idPromot01, $_SESSION['monEcole']['idEcole']) as $sel) {
                $n++;
            ?>

                <td><?= $n ?></td>
                <td><input type="checkbox" style="width:20px; height:20px" class="form-control" onchange="Orientation('../control.param_access/ctr_periode.php?clssChk=true&idClassSel=<?= $sel['idClasse'] ?>')" ?></td>
                <td><?= strtoupper($sel['idClasse']) ?></td>
                <td>
                    <i id="<?= $sel['idPromotion'] ?>"><?= strtoupper($sel['promotion']); ?></i>
                </td>
                <td>

                    <i id="<?= $sel['idSection'] ?>"><?= strtoupper($sel['section']); ?></i>
                </td>
                <td>
                    <i id="<?= $sel['idUnite'] ?>"><?= strtoupper($sel['unite']); ?></i>
                </td>
        </tr>
    <?php
            }

    ?>

    </tbody>

</table>