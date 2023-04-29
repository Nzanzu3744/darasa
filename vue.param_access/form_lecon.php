<?php
include_once('../model.param_access/param_groupe.class.php');
?>
<!--  -->
<script src="../jquery/dist/summernote/summernote-bs4.min.js"></script>
<!--  -->
        <center class="col-sm-12 titres" style="font-size:20px" >REDACTION D'UNE LECON <?=" <b>[ ".$_GET['cours']."]</b> à  ".$_GET['maClasse']?> (COTE ENSEIGNANT)</center>

 <button class="btn btn-default pull-left col-sm-2" onclick="Orientation('../control.param_access/ctr_lecon.php?premiF&maClasse=<?=$_GET['maClasse']?>&cours=<?=$_GET['cours']?>&idcrs=<?=$_GET['idcrs']?>','#editLeco','');Orientation('../control.param_access/ctr_lecon.php?leconsgauche_ense&maClasse=<?=$_GET['maClasse']?>&idCours=<?=$_GET['idcrs']?>','#leconsgauche','');"> NOUVELLE LECON</button>
<form class="form-inline" style="width:100%; height:100%" id="lecon">
<input id="btn_enreg_lecon" value="ENREGISTRER" type="button" class="btn btn-success pull-left  col-sm-2" style="padding:6px" onclick="Orientation('../control.param_access/ctr_lecon.php?maClasse=<?=$_GET['maClasse']?>&tlecon='+$('#tlecon').val()+'&idlc='+$('#idlc').val()+'&cours=<?=$_GET['cours']?>&idcrs=<?=$_GET['idcrs']?>&ajouterL=true','#editLeco','#lecon');Orientation('../control.param_access/ctr_lecon.php?leconsgauche_ense&maClasse=<?=$_GET['maClasse']?>&idCours=<?=$_GET['idcrs']?>','#leconsgauche','');"  ></input> 
<input style="width:100%" id ="tlecon" type="text" class="form-control" placeholder="Titre de la lecon"/> 
    <div class="form-group text-align: center;" style="width:100%; height:100%">              
       
        <textarea id="lcn" name="lcn" class="textarea" style="width:9%"></textarea>
    </div>
     
          
</div>
      
</form>


<script>
$(function () {
$('.textarea').summernote()
})
</script>

