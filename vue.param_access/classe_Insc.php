<?php

include_once('../model.param_access/org_inscription.class.php');
include_once('../model.param_access/org_classe.class.php');
include_once('../model.param_access/org_promotion.class.php');
include_once('../model.param_access/org_section.class.php');
include_once('../model.param_access/org_unite.class.php');

$idUtile = htmlspecialchars($_GET['idutil']);
$idEcole = $_SESSION['monEcole']['idEcole'];
?>
<div class="col-sm-12 row table-responsive " style="border: 1px solid #f2f2f2; height:320px">
    <center><label> Liste de Classes Inscrit</label></center>

    <table class="table table-bordered table-striped table-condensed">

        <thead>
            <tr>
                <th>N</th>
                <th>ID</th>
                <th>Promotion</th>
                <th>Section</th>
                <th>Unite</th>
                <th>ANNEE SCOLAIRE</th>
                <th>OPTIONS</th>
            </tr>
        </thead>
        <tbody>
            <?php




            $clas = new org_inscription();
            $n = 0;

            foreach ($clas->rechercheInscription($idEcole, $idUtile) as $sel) {
                $n++;
            ?>
                <tr>
                    <td><?= $n ?></td>
                    <td><?= strtoupper($sel['idClasse']) ?></td>
                    <td>

                        <i id="<?= $sel['idPromotion'] ?>"> <a><?= strtoupper($sel['promotion']); ?></a></i>
                    </td>
                    <!--  -->
                    <td>
                        <i id="<?= $sel['idSection'] ?>"> <a><?= strtoupper($sel['section']); ?></a></i>
                    </td>
                    <!--  -->
                    <td>
                        <i id="<?= $sel['idUnite'] ?>"> <a><?= strtoupper($sel['unite']); ?></a></i>
                    </td>
                    <td>
                        <i id="<?= $sel['idAnneeSco'] ?>"> <a><?= strtoupper($sel['anneeSco']); ?></a></i>
                    </td>
                    <!--  -->

                    <td class="dropdown" style="height:9px">
                        <button style="width:100%; height:100%" data-toggle="dropdown" href="#"> Options<b class="caret pull-right"></b></button>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="#" onclick='Orientation("../control.param_access/ctr_eleve.php?supIns=<?= $sel["idInscription"] ?>&idutil=<?= $_GET["idutil"] ?>","#editLeco")' style="color: red">Supprimer</a></li>
                        </ul>
                        </ul>
                    </td>
                </tr>
            <?php
            }
            ?>

        </tbody>

    </table>

</div>