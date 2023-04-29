<?php
include_once('../model.param_access/param_groupe.class.php');
include_once('../model.param_access/crs_cours.class.php')
?>
<div class="form-inline well" style="width:241px; height:550px" id="utilisa">
<div class="form-group">
            <labelle for="nom" class=" col-sm-12"> Nom du Cours </labelle>
            <input style="width:100%" style="width:100%" id="nomC" type="text" class="form-control " placeholder="Nom du cours">
           
            <labelle for="photo" class=" col-sm-12">Icon</labelle>    
            <input id="url" style="width:100%" id="photo" onchange="charge_Image()" type="file" class=" form-control" ><p>
            <div id="image01" class="alert alert-block alert-success " style="display:none; width:100%; height:190px">

            </div>
            
             <labelle for="postnom" class=" col-sm-12"> Commentaire </labelle>
            <textarea style="width:100%" id="CmtC" type="textarea" class="form-control" placeholder="Commentair"></textarea>
        </div>      

    <div style="padding: 10px" >
    <button id="enrg" onclick="showme('#leconsgauche','#editLeco','true'); Orientation('../control.param_access/ctr_cours.php?ajouterC=true&maClasse=<?=$_GET['maClasse']?>&idAfft=<?=$_GET['idAfft']?>&idAnneeSco=<?=$_GET['idAnneeSco']?>&idClasse=<?=$_GET['idClasse']?>&nomC='+$('#nomC').val()+'&CmtC='+$('#CmtC').val()+'&url='+$('#url').val(),'#editLeco');Orientation('../control.param_access/ctr_lecon.php?leconsgauche_ense&idCours=<?=$_GET['idCours']?>&idAfft=<?=$_GET['idAfft']?>','#leconsgauche');"  class="btn btn-success pull-left col-sm-6">Enregistrer</button>
    <button onclick="Encour()"  class="btn btn-danger pull-right col-sm-6">Annuler</button>
</form>
<!-- <script src="../bootstrap/dist/js/bootstrap.min.js"></script>-->