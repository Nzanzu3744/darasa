<?php
include_once('../model.param_access/param_groupe_periode.class.php');
?>
<div class="col-sm-12 row well" style="border: 1px solid #DDDD;">

    <table class="table table-bordered table-striped table-condensed">

        <thead>
            <tr>
                <th>N</th>
                <th>CODE</th>
                <th>LIBELLE</th>
                <th>FREQUENCE</th>
                <th>OPTIONS</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $gr_p2 = new param_groupe_periode();
            $n = 0;
            foreach ($gr_p2->selectionner() as $selgr_p2) {
                $n++;
                $actifColor = "background:white;color:green";
                $actif = 1;
                if ($selgr_p2['actif'] != 1) {
                    $actifColor = "background:gray";
                    $actif = '';
                }
            ?>
                <tr style=<?= $actifColor ?>>
                    <td><?= $n ?></td>
                    <td><?= strtoupper($selgr_p2['idGroupePeriode']) ?></td>
                    <td><?= strtoupper($selgr_p2['groupePeriode']); ?></td>
                    <td><?= strtoupper($selgr_p2['frequence']); ?></td>
                    <td class="dropdown" style="height:9px">
                        <button style="width:100%; height:100%" data-toggle="dropdown" href="#"> Options<b class="caret pull-right"></b></button>
                        <ul class="dropdown-menu pull-right">
                            <?php
                            if ($actif == 1) {
                            ?>
                                <li><a href="#" style="color:red" onclick="Encour()">DESACTIVE</a></li>
                            <?php
                            } else {
                            ?>
                                <li><a href="#" style="color:green" onclick="Encour()">ACTIVE</a></li>
                            <?php
                            }

                            ?>
                            <li><a href="#" onclick="Encour()">Modifier</a></li>
                            <li><a href="#" onclick="Orientation('../control.param_access/ctr_groupe_periode.php?sp=true&idgrp=<?= $selgr_p2['idGroupePeriode'] ?>','#promoz_periode')">Supprimer</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Rapport de Class</a></li>

                        </ul>
                    </td>
                </tr>
            <?php
            }
            ?>

        </tbody>

    </table>


</div>