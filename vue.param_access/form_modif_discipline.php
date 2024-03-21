<?php
include_once('../model.param_access/prep_sous_domaine.class.php');
$sd = new prep_sous_domaine();
$sd  = $sd->selectionner();
?>
<form action="control.param_access/ctr_utilisateur.php" method="POST" enctype="multipart/form-data" class="form_control" style="margin:20px">
    <div class="rows">
        <label for="sd" class="col-sm-5 col-xs-5 col-lg-5 ">
        SOUS DOMAINE
            <select id="idSousDomaine" class="form-control">
            <?php
            foreach($sd as $selsd ){
            ?>
                <option  value=<?=$selsd['idSousDomaine']?>><?=$selsd['sousDomaine']?></option>
            <?php
            }
            ?>
            </select>
        </label>
        <label for="sd" class="col-sm-5 col-xs-5 col-lg-5 ">
        DISCIPLINE
            <input id="disc" name="disc" type="text" class="form-control" placeholder="Discipline" >
        </label>
        <br>
        <input id="btn_add" name="btn_add" class="btn btn-success col-sm-1 col-xs-1 col-lg-1" type="button" onclick="Orientation('../control.param_access/ctr_discipline.php?ajouterDs=true&idSousDomaine='+$('#idSousDomaine').val()+'&lstsous_d='+$('#disc').val(),'#lstdisc')" value="Valider"/>
    </div>         
<!--  -->
    <div id="lstdisc"class=" table-responsive form-group col-sm-12" style="height:250px; border: 1px solid green">
       <?php
       include_once('../vue.param_access/liste_discipline.php');
       ?>
    </div> 
</form>