
<?php
include_once('../model.param_access/org_section.class.php');
?>
<div class="form-inline well" style="width:100%; height:40px;padding:0px ;margin:0px;">
<labelle for="promo"  class="col-sm-2"> Section </labelle>
    <div class="form-group col-sm-4">
        <input id="section" type="text" class="form-control" style="width:250px" placeholder="Section ici">
    </div>
     <button id="enrg" onclick="Orientation('../control.param_access/ctr_structure.php?ajouterS=true&Sectn='+$('#section').val(),'#sect')"  class="btn btn-success pullright col-sm-3">Valider</button>
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
<center> Liste Sections</center>
<div class="table-responsive well" style="width:100%; height:240px;padding:0px">

<table class="table table-bordered table-striped table-condensed">
        
        <thead>
           
            <tr>
                <th>N</th>
                <th>Sel</th>
                <th>ID</th>
                <th>Section</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $grps = new org_section();
                $n=0;
                foreach( $grps->selectionner()  as $sel)
                { 
                    $n++;
            ?>
            <tr>
                <td><?=$n?></td>
                <td><input type="checkbox" onchange="Orientation('../control.param_access/ctr_structure.php?sectionChk&idSection=<?=$sel['idSection']?>','#promo')"></td>
                <td><?=strtoupper($sel['idSection'])?></td>
                <td><?=strtoupper($sel['section'])?></td>               
                <td class="dropdown active pull-right" style="height:9px">
                    <button class="" data-toggle="dropdown" href="#">Option<b class="caret pull-right"></b></button>
                    <ul class="dropdown-menu ">
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
