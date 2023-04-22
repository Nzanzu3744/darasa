
<?php

include_once('../model.param_access/org_promotion.class.php');
?>
<div class="form-inline well" style="width:100%; height:40px;padding:0px ;margin:0px;">
<labelle for="prm"  class="col-sm-2"> Promotion </labelle>
    <div class="form-group col-sm-4">
        <input id="prm" type="text" class="form-control" style="width:250px" placeholder="Promotion ici">
    </div>
     <button id="" onclick="Orientation('../control.param_access/ctr_structure.php?ajouterPm=true&Promtn='+$('#prm').val(),'#promotion01')"  class="btn btn-success pullright col-sm-3">Valider</button>
    <button onclick="Encour()"  class="btn btn-primary pullleft col-sm-3">Annuler</button>

        <div id="ec" class="alert alert-block alert-danger" style="display:none">
        <h4>Erreur !</h4>
        Le champs ne doit pas resté vide.
    </div>
    <div id="sc" class="alert alert-block alert-success" style="display:none">
        <h4>Reussite !</h4>
        Enregistrement reussi.
    </div>
</div>
<center> Liste Promotions</center>
<div class="table-responsive well" style="width:100%; height:240px; padding:0px">

<table class="table table-bordered table-striped table-condensed">
        
        <thead>
           
            <tr>
                <th>N</th>
                <th>Sel</th>
                <th>ID</th>
                <th>Promotion</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $grps = new org_promotion();
                $n=0;
                foreach( $grps->selectionner()  as $sel)
                { 
                    $n++;
            ?>
            <tr>
                <td><?=$n?></td>
                <td><input type="checkbox" onchange="Orientation('../control.param_access/ctr_structure.php?promoChk&idPromotion=<?=$sel['idPromotion']?>','#promo')"></td>
                <td><?=strtoupper($sel['idPromotion'])?></td>
                <td><?=strtoupper($sel['promotion'])?></td>               
                <td class="dropdown active pull-right" style="height:9px">
                    <button data-toggle="dropdown" href="#">Option<b class="caret pull-right"></b></button>
                    <ul class="dropdown-menu">
                        <li><a href="#" onclick="Encour()">Modifier</a></li>
                        <li class="divider"></li>
                        <li><a href="#" onclick="Encour()">Supprimer</a></li>

                    </ul>
                </td>
            </tr>
           <?php
                }
           ?>
           
        </tbody>
    </table>

</div>
<!--MA PARTIE DES SCRIPTE -->


