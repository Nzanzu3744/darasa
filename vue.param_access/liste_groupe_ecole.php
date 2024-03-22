<?php
include_once('../model.param_access/param_groupe.class.php');


?>
<div class="col-sm-12" style="height:100%; border:1px solid #f2f2f2">



    <table class="table table-bordered table-striped table-condensed col-sm-12">

        <thead>
            <tr>
                <th>N</th>
                <th>Sel</th>
                <th>ID</th>
                <th>GROUPE</th>

            </tr>
        </thead>
        <tbody>
            <?php




            $clas = new param_groupe();
            $n = 0;
            foreach ($clas->selectionnerByEcole($_SESSION['monEcole']['idEcole']) as $sel) {
                $n++;
                if ($sel['idGroupe'] > 0) {


            ?>
                    <tr>
                        <td><?= $n ?></td>
                        <td>
                            <input id="<?= $sel['idGroupe'] ?>" name="<?= $sel['idGroupe'] ?>" value="<?= $sel['idGroupe'] ?>" style="width:20px; height:20px" class="form-control" type="checkbox">
                        </td>
                        <td>
                            <i id="<?= $sel['idGroupe'] ?>"><?= strtoupper($sel['idGroupe']); ?></i>
                        </td>
                        <td>
                            <i id="<?= $sel['idGroupe'] ?>"><?= strtoupper($sel['groupe']); ?></i>
                        </td>
                    </tr>
                <?php
                } elseif ($_SESSION['idUtilisateur'] <= 0) {
                ?>
                    <tr>
                        <td><?= $n ?></td>
                        <td>
                            <input id="<?= $sel['idGroupe'] ?>" name="<?= $sel['idGroupe'] ?>" value="<?= $sel['idGroupe'] ?>" style="width:20px; height:20px" class="form-control" type="checkbox">
                        </td>
                        <td>
                            <i id="<?= $sel['idGroupe'] ?>"><?= strtoupper($sel['idGroupe']); ?></i>
                        </td>
                        <td>
                            <i id="<?= $sel['idGroupe'] ?>"><?= strtoupper($sel['groupe']); ?></i>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>

        </tbody>

    </table>
</div>