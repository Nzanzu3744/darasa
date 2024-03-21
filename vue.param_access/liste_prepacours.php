<div style="width: 98%;">
    <div class="rubaBoutonDoc">
        <span type="button" class=" btn btn-sm btn-default  glyphicon glyphicon-print" style="margin:3px" value="Imprimer" onclick="imprimer('crs_org')"></span>

    </div>
    <div id="crs_org">

        <?php
        include_once("../vue.param_access/enteteDL.php");
        ?>
        <p class="titreLecon">
            LISTE COURS ORGANISES
        </p>
        <div style="padding-top:10px; border-top: 1px solid black">
            <table class="table table-bordered table-striped table-condensed">

                <thead>
                    <tr>
                        <th>N</th>
                        <th>DOMAINE</th>
                        <th>SOUS DOMAINE</th>
                        <th>BRANCHE</th>
                        <th>DATE D'ENREGISTREMENT</th>
                        <?php
                        if ($_SESSION['crs_prepacours_supprimer'] == 1) {
                        ?>
                            <th>
                                <center>SUPPRIMER</center>
                            </th>
                        <?php
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    include_once('../model.param_access/crs_prepacours.class.php');
                    $prepacrs = new crs_prepacours();
                    $prepacrs = $prepacrs->selectionner();
                    $i = 1;
                    foreach ($prepacrs as $selPrepacrs) {
                    ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $selPrepacrs['domaine'] ?></td>
                            <td><?= $selPrepacrs['sousDomaine'] ?></td>
                            <td><?= $selPrepacrs['cours'] ?></td>
                            <td><?= $selPrepacrs['dateCreation'] ?></td>

                            <?php
                            if ($_SESSION['crs_prepacours_supprimer'] == 1) {
                            ?>
                                <td>
                                    <span href="#" style="color:red; margin-top:0px; margin-right:3px; " class="glyphicon glyphicon-trash pull-right pull-top" onclick="Orientation('../control.param_access/ctr_cours.php?supPrepacors=true&idPrepaCours=<?= $selPrepacrs['idPrepaCours'] ?>','#editLeco')"></span>
                                </td>
                            <?php
                            }
                            ?>

                        </tr>
                    <?php

                    }
                    ?>


                </tbody>
            </table>
        </div>
    </div>
</div>