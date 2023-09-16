da<form action="" class="form_control" style="margin:20px">
    <div class="rows" style="">
        <label for="sd" class="col-sm-5 col-xs-5 col-lg-5 ">
            <input id="sd" name="sd" type="text" class="form-control" placeholder="Sous-domaine" >
        </label>
        <input id="btn_add" name="btn_add" class="btn btn-success col-sm-1 col-xs-1 col-lg-1" type="button" onclick="Orientation('control.param_access/ctr_sous_domaine.php?ajouterSd=true&lstsous_d='+$('#sd').val(),'#lstsous_d')" value="Valider"/>
    </div>         
<!--  -->
    <div id="lstsous_d"class=" table-responsive form-group col-sm-12" style="height:250px; border: 1px solid green">
       <?php
       include_once('../vue.param_access/liste_sous_domaine.php');
       ?>
    </div> 
</form>