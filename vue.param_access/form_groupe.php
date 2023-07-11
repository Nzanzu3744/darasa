<?php
include_once('../model.param_access/param_groupe.class.php');
?>


<form class="form-inline well" style="width:241px; height:150px">
<labelle for="grp"> Groupe </labelle>
    <div class="form-group">
        <input id="grp" type="text" class="form-control" placeholder="Groupe ici">
    </div>
    <div style="padding: 10px" >
    <button id="enrg" onclick="Orientation('control.param_access/ctr_groupe.php?ajouterGrp=true&grp='+$('#grp').val(),'#panel')"  class="btn btn-success pullright col-sm-6">Valider</button>
    <button onclick="Encour()" class="btn btn-primary pullleft col-sm-6">Annuler</button>
    </div>
      
</form>

<div class="table-responsive well" style="width:241px; height:440px">

<table class="table table-bordered table-striped table-condensed">
        
        <thead>
            <tr>
                <th>N</th>
                <th>ID</th>
                <th>Groupe</th>
                <th>Opt.</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $grps = new param_groupe();
                $n=0;
                foreach( $grps->selectionner()  as $sel)
                { 
                    $n++;
            ?>
            <tr>
                <td><?=$n?></td>
                <td><?=strtoupper($sel['idGroupe'])?></td>
                <td><?=strtoupper($sel['groupe'])?></td>               
                <td class="dropdown active pull-right" style="height:9px">
                    <button data-toggle="dropdown" href="#">Option<b class="caret pull-right "></b></button>
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