
<?php
include_once('../model.param_access/org_unite.class.php');
?>
<div class="form-inline well" style="width:100%; height:40px;padding:0px ;margin:0px;">
<labelle for="unit"  class="col-sm-2"> Unite </labelle>
    <div class="form-group col-sm-4">
        <input id="unit" type="text" class="form-control" style="width:250px" placeholder="Unite ici">
    </div>
     <button onclick="Orientation('control.param_access/ctr_structure.php?ajouterU=true&Unit='+$('#unit').val(),'#unite01')"  class="btn btn-success pullright col-sm-3">Valider</button>
    <button onclick="Encour()"  class="btn btn-primary pullleft col-sm-3">Annuler</button>
</div>
<!-- MON TABLEAU -->
<center> Liste Unites</center>
<div class="table-responsive well" style="width:100%; height:240px;padding:0px">

<table class="table table-bordered table-striped table-condensed">
        
        <thead>
           
            <tr>
                <th>N</th>
                <th>Sel</th>
                <th>ID</th>
                <th>Unite</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $grps = new org_unite();
                $n=0;
                foreach( $grps->selectionner()  as $sel)
                { 
                    $n++;
            ?>
            <tr>
                <td><?=$n?></td>
                <td><input type="checkbox" onchange="Orientation('control.param_access/ctr_structure.php?uniteChk&idUnite=<?=$sel['idUnite']?>','#promo')"></td>
                <td><?=strtoupper($sel['idUnite'])?></td>
                <td><?=strtoupper($sel['unite'])?></td>               
                <td class="dropdown active pull-right" style="height:9px">
                    <button data-toggle="dropdown" href="#"> Option<b class="caret pull-right"></b></button>
                    <ul class="dropdown-menu pull-right">
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

