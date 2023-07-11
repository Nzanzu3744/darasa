<?php
include_once('../model.param_access/param_groupe.class.php');
include_once('../model.param_access/crs_cours.class.php')
?>
<div class="form-inline well" style="width:241px; height:475px">
    <form id="frmcrs" name="frmcrs" action="control.param_access/ctr_cours?ajouter.php" method="POST" enctype="multipart/form-data" class="form_control">
  
        <div >
                <labelle for="nomC" class=" col-sm-12"> Nom du Cours </labelle>
                <input style="width:100%" style="width:100%" id="nomC" type="text" class="form-control " placeholder="Nom du cours">
            
                <labelle for="photo" class=" col-sm-12">Icon</labelle>    
                <input id="url" style="width:100%" id="photo"  type="file" class=" form-control" ><p>
                
                    <labelle for="CmtC" class=" col-sm-12"> Commentaire </labelle>
                    <textarea style="width:100%; height:250px" id="CmtC" type="textarea" class="form-control" placeholder="Commentair"></textarea> 
        </div>
        <div style="padding-top:10px">
            <input type="submit"  class="btn btn-success pull-left col-sm-5 btn-xs" id="enrg" onclick="showme('#leconsgauche','#editLeco','true'); Orientation('control.param_access/ctr_cours.php?ajouterC=true&maClasse=<?=$_GET['maClasse']?>&idAnneeSco=<?=$_GET['idAnneeSco']?>&idClasse=<?=$_GET['idClasse']?>&nomC='+$('#nomC').val()+'&CmtC='+$('#CmtC').val()+'&url='+$('#url').val(),'#editLeco');Orientation('control.param_access/ctr_lecon.php?leconsgauche_ense&idCours=<?=$_GET['idCours']?>','#leconsgauche');" value="Enregistrer"/>
            <button onclick="Encour()"  class="btn btn-xs btn-danger pull-right col-sm-5">Annuler</button>
        </div>
    </form>
</div>
<script>

$(document).ready(function() {
    $('form').submit(function(e) {
        e.preventDefault();
        // ou return false;
    });
});
</script>