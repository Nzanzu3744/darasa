<?php
include_once('../model.param_access/org_classe.class.php');
include_once('../model.param_access/org_promotion.class.php');
include_once('../model.param_access/org_section.class.php');
include_once('../model.param_access/org_unite.class.php');

?>
<div class="col-sm-12" style="height:100%; border:1px solid #f2f2f2">

    <center><label> Liste de Classes Organisées</label></center>

    <table class="table table-bordered table-striped table-condensed col-sm-12">

        <thead>
            <tr>
                <th>N</th>
                <th>Sel</th>
                <th>ID</th>
                <th>Promotion</th>
                <th>Unite</th>
                <th>Option</th>

            </tr>
        </thead>
        <tbody>
            <?php




            $clas = new org_classe();
            $n = 0;
            foreach ($clas->selectionnerByEcole($_SESSION['monEcole']['idEcole']) as $sel) {
                $n++;
            ?>
                <tr>
                    <td><?= $n ?></td>
                    <td><input id="<?= $sel['idClasse'] ?>" name="<?= $sel['idClasse'] ?>" value="<?= $sel['idClasse'] ?>" style="width:20px; height:20px" class="form-control" type="checkbox"></td>
                    <td><?= strtoupper($sel['idClasse']) ?></td>
                    <td>
                        <?php
                        $sel_P = new org_promotion();
                        $sel_P = $sel_P->rechercher($sel['idPromotion'])->fetch(); ?>
                        <i id="<?= $sel_P['idPromotion'] ?>"><?= strtoupper($sel_P['promotion']); ?></i>
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
</div>