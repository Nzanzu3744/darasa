<?php
include_once('../model.param_access/param_groupe.class.php');
?>
<div class="form-inline well" style="width:241px; height:600px" id="utilisa">
<div class="form-group">
            <labelle for="nom" class=" col-sm-12"> Nom </labelle>
            <input style="width:100%" style="width:100%" id="nom" type="text" class="form-control " placeholder="Nom de l'utilisateur">
            <labelle for="postnom" class=" col-sm-12"> Post-nom </labelle>
            <input style="width:100%" id="postnom" type="text" class="form-control" placeholder="Postnom de l'utilisateur">
            <labelle class=" col-sm-12"> Prenom de l'utilisateur </labelle>
            <input style="width:100%" id="prenom" type="text" class="form-control" placeholder="Prenom de l'utilisateur">
            <labelle fo="mail" class=" col-sm-12">Mail </labelle>
            <input style="width:100%" id="mail" type="mail" class="form-control" placeholder="Mail de l'utilisateur">
            <labelle for="photo" class=" col-sm-12">Photo</labelle>    
            <input style="width:100%" id="photo" onchange="charge_Image()" type="file" class=" form-control" ><p>
            <div id="image01" class="alert alert-block alert-success " style="display:none; width:100%; height:190px">

            </div>
            
            <labelle for="groupe1">Groupe</labelle>
            <select id="groupe1" class="form-control col-sm-12">
                        <?php
                            $groupe = new param_groupe();
                            $grp = $groupe->selectionner();
                            $u=0;
                            foreach($grp as $sel){
                        ?>
                                <option value="<?=$sel['idGroupe']?>"><?=$sel['idGroupe']." : ".strtoupper($sel['groupe']);?></option>
                        <?php
                            }
                        ?>                        
            </select>
                        </div>      

    <div style="padding: 10px" >
    <button id="enrg" onclick="Orientation('../control.param_access/ctr_utilisateur.php?ajouterU=true&nom='+$('#nom').val()+'&postnom='+$('#postnom').val()+'&prenom='+$('#prenom').val()+'&mail='+$('#mail').val()+' & photo='+$('#photo').val()+'&groupe1='+$('#groupe1').val(),'#frmuti')"  class="btn btn-success pull-left col-sm-4">Valider</button>
   
    <button onclick="Encour()"  class="btn btn-danger pull-right col-sm-4">Annuler</button>
</form>
<!-- <script src="../bootstrap/dist/js/bootstrap.min.js"></script> -->

