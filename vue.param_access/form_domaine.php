<?php

include_once('../model.param_access/crs_domaine.class.php');
?>
<div class="" style="padding: 0px; margin:0px">
    <center>FORMULAIRE DOAMAINE</center>
    <div style="width:100%; height:120px">
        <label for="dmn"> DOMAINE </label>
        <input id="dmn" type="text" class="form-control" placeholder="Domaine">
        <center>
            <input id="" type="button" style="margin-top:10px; width:70px" onclick='Orientation("../control.param_access/ctr_domaine.php?ajouterdom=true&dmn="+$("#dmn").val(),"#leconsgauche");' class="btn btn-xs btn-success col-sm-6" value="Ajouter">
        </center>
    </div>

    <center> <label>Liste Domaine</label></center>
    <div style="height:1250px" class="table-responsive">
        <table class="table table-bordered table-striped table-condensed">

            <thead>

                <tr>
                    <th>N</th>
                    <th>ID</th>
                    <th>Domaine</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $dmaine = crs_domaine::selectionner();
                $n = 0;
                foreach ($dmaine as $sel) {
                    $n++;
                ?>
                    <tr>
                        <td><?= $n ?></td>
                        <td><?= strtoupper($sel['idDomaine']) ?></td>
                        <th><?= strtoupper($sel['domaine']) ?></th>
                        <td class="dropdown active pull-right">
                            <button data-toggle="dropdown" href="#">Option<b class="caret pull-right"></b></button>
                            <ul class="dropdown-menu">
                                <li><a href="#" style="color:red" onclick='Orientation("../control.param_access/ctr_domaine.php?SuprDmm=true&iddmn=<?= $sel["idDomaine"] ?>","#leconsgauche");'>Supprimer</a></li>

                            </ul>
                        </td>
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>
    </div>

</div>
<!--MA PARTIE DES SCRIPTE -->