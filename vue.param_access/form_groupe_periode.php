<?php
include_once('../model.param_access/org_promotion.class.php');
?>
<div class="form-inline col-sm-3" style="height:600px" >
    <div class="form-group well" style="height:600px">              

                <label for="gr_p2" class=" col-sm-12">Libelle </label>
                <input style="width:100%" id="gr_p2" type="txt" class="form-control" placeholder="TRIMESTRE">
                <label for="fre47" class=" col-sm-12">Frequence </label>
                <input style="width:100%" id="fre47" type="mail" class="form-control" placeholder="3">


        <button id="enrg" onclick="Orientation('../control.param_access/ctr_groupe_periode.php?ajouterG=true&gr_p2='+$('#gr_p2').val()+'&fre47='+$('#fre47').val(),'#promoz_periode')"  class="btn btn-success pull-left col-sm-4">Valider</button>
        <button onclick="Encour()"  class="btn btn-danger pull-right col-sm-4">Annuler</button>
                
    </div>
    

   
</div>
<div class="col-sm-9 table-responsive well" id="promoz_periode" style="height:600px">
    <?php
    include_once('../vue.param_access/liste_groupe_periode.php');
    ?>
</div>