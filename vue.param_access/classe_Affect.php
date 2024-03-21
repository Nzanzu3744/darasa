<?php
include_once('../model.param_access/org_affectation.class.php');
include_once('../model.param_access/org_classe.class.php');
include_once('../model.param_access/org_promotion.class.php');
include_once('../model.param_access/org_section.class.php');
include_once('../model.param_access/org_unite.class.php');


?>
<div class="col-sm-12 row table-responsive " style="border: 1px solid #f2f2f2; height:320px">
    <center><label> Liste de Classes Affectées</label></center>

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




            $clas = new org_affectation();
            $n = 0;
            $idUti = htmlspecialchars($_GET['idutil']);
            $clas = $clas->filtrerByUtiEcole($idUti, $_SESSION['monEcole']['idEcole']);
            foreach ($clas as $sel98) {
                $n++;
            ?>
                <tr>
                    <td><?= $n ?></td>

                    <td><?= strtoupper($sel98['idClasse']) ?></td>
                    <td>
                        <i id="<?= $sel98['idPromotion'] ?>"> <a><?= $sel98['promotion']; ?></a></i>
                    </td>
                    <!--  -->
                    <td>
                        <i id="<?= $sel98['idSection'] ?>"> <a><?= strtoupper($sel98['section']); ?></a></i>
                    </td>
                    <!--  -->
                    <td>
                        <i id="<?= $sel98['idUnite'] ?>"> <a><?= strtoupper($sel98['unite']); ?></a></i>
                    </td>
                    <!--  -->
                    <td>
                        <i id="<?= $sel98['idAnneeSco'] ?>"> <a><?= strtoupper($sel98['anneeSco']); ?></a></i>
                    </td>
                    <!--  -->

                    <td class="dropdown" style="height:9px">
                        <button style="width:100%; height:100%" data-toggle="dropdown" href="#"> Options<b class="caret pull-right"></b></button>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="#" onclick='Orientation("../control.param_access/ctr_enseignant.php?supAff=<?= $sel98["idAffectation"] ?>&idutil=<?= $_GET["idutil"] ?>","#corps")' style="color: red">Supprimer</a></li>
                        </ul>
                    </td>
                </tr>
            <?php
            }
            ?>

        </tbody>

    </table>

</div>