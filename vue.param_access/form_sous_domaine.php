<?php

include_once('../model.param_access/crs_domaine.class.php');
?>
<div style="padding: 0px; margin:0px; width:100%; height:200px">
    <center>FORMULAIRE SOUS <br> DOMAINE</center>
    <form id="frmSdom" name="frmSdom" style="width:100%; height:120px">
        <label for="sdomaine"> DOMAINE </label>
        <?php
        include_once('../model.param_access/crs_sous_domaine.class.php');
        $dom = crs_domaine::selectionner();
        ?>
        <div class="contenaire">
            <select id="sdomaine" class="form-control" style="width:90%">
                <?php
                foreach ($dom as $seldom) {
                ?>
                    <option style="color:red; background:black" value=<?= $seldom['idDomaine'] ?>><?= $seldom['domaine'] ?></option>
                <?php
                }
                ?>

            </select>
            <input id="" type="button" style="width:10%;height:100%;" onclick='showme("#leconsgauche","#editLeco","true"); Orientation("../control.param_access/ctr_cours.php?courssgauche_dom","#leconsgauche");' class="btn btn-success" value="+">
        </div>
        <div class="contenaire pull-left" style="width: 100%;">
            <label for="chkMd"> Masque domaine </label>
            <input type="radio" style="width:20px; height:20px" id="chkMd" name="chkMd" class="form-control">
        </div>

        <label for="sDom"> Sous Domaine</label>
        <input type="text" id="sDom" class="form-control" />
        <center>
            <input id="" type="button" style="margin-top:10px; width:70px" onclick='Orientation2("../control.param_access/ctr_sous_domaine.php?ajtSousD=true&chkMd="+$("#chkMd").val()+"&idDom="+$("#sdomaine").val()+"&sDom="+$("#sDom").val(),"#leconsgauche","frmSdom");' class="btn btn-xs btn-success col-sm-6" value="Ajouter">
        </center>
</div>

<center> <label>Liste Sous Domaine</label></center>
<div style="height:1200px; width:100%" class="table-responsive">
    <table class="table table-bordered table-striped table-condensed">

        <thead>

            <tr>
                <th>N</th>
                <th>ID</th>
                <th>Domaine</th>
                <th>Sous Domaine</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $dmaine = crs_sous_domaine::selectionner();
            $n = 0;
            foreach ($dmaine as $sel) {
                $n++;
            ?>
                <tr>
                    <td><?= $n ?></td>
                    <td><?= strtoupper($sel['idDomaine']) ?></td>
                    <th><?= strtoupper($sel['domaine']) ?></th>
                    <th><?= strtoupper($sel['sousDomaine']) ?></th>
                    <td class="dropdown active pull-right">
                        <button data-toggle="dropdown" href="#">Option<b class="caret pull-right"></b></button>
                        <ul class="dropdown-menu">
                            <li><a href="#" style="color:red" onclick='Orientation("../control.param_access/ctr_sous_domaine.php?SuprS_Dmm=true&idsdmn=<?= $sel["idSousDomaine"] ?>","#leconsgauche");'>Supprimer</a></li>

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