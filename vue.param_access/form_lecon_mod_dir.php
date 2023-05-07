<?php
include_once('../model.param_access/param_groupe.class.php');
include_once('../model.param_access/crs_lecon.class.php');
?>
<!--  -->
<script src="../jquery/dist/summernote/summernote-bs4.min.js"></script>
<!--  -->
  <center class="col-sm-12 titres" style="font-size:20px" >REDACTION D'UNE LECON <?=" <b>[ ".$_GET['cours']."]</b> à  ".$_GET['maClasse']?> (COTE ENSEIGNANT)</center>
<form class="form-inline" style="width:100%; height:100%" id="lecon">
<input id="" value="ENREGISTRER" type="button" class="btn btn-success pull-left  col-sm-2 " style="width:120px; padding:6px" onclick="Orientation('../control.param_access/ctr_lecon.php?maClasse=<?=$_GET['maClasse']?>&idPromotion=<?=$_GET['idPromotion']?>&tlecon='+$('#tlecon').val()+'&idlc='+$('#idlc').val()+'&cours=<?=$_GET['cours']?>&idCours=<?=$_GET['idCours']?>&idPromotion=<?=$_GET['idPromotion']?>&ajouterLViaDir=true','#editLeco','#lecon');Orientation('../control.param_access/ctr_lecon.php?leconsgauche_dir&maClasse=<?=$_GET['maClasse']?>&idCours=<?=$_GET['idCours']?>','#leconsgauche','');"  ></input>  
<input style="width:100%" id ="tlecon" type="text" class="form-control" placeholder="Titre de la lecon" value="<?=$_GET['tlecon']?>"/>     
<div class="form-group text-align: center;" style="width:100%; height:100%">    
<?php
if(isset($_GET['LireLecon_ense'])){
  $lec = new crs_lecon();
  $lec =$lec->rechercher($_GET['idlc']);
  $lec = $lec->fetch();
  ?>
  <textarea id="lcn" name="lcn" class="textarea" style="width:99%"><?=$lec['lecon']?></textarea>
<?php
}if(isset($_GET['LireLecon_dir'])){
  $lec = new crs_lecon();
  $lec =$lec->rechercher($_GET['idlc']);
  $lec = $lec->fetch();
  ?>
  <textarea id="lcn" name="lcn" class="textarea" style="width:99%"><?=$lec['lecon']?></textarea>
<?php
}else{
  ?>
  <textarea id="lcn" name="lcn" class="textarea" style="width:99%"><?=$_POST['lcn']?></textarea>
  <?php
  }

?>
       
</div> 
          
</form>      



<script>
$(function () {
$('.textarea').summernote()
})
</script>
