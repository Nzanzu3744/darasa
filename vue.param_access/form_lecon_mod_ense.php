<?php
include_once('../model.param_access/param_groupe.class.php');
include_once('../model.param_access/crs_lecon.class.php');
?>
  <center class="col-sm-12 titres" style="font-size:20px" >REDACTION D'UNE LECON <?=" <b>[ ".$_GET['cours']."]</b> à  ".$_GET['maClasse']?> (COTE ENSEIGNANT)</center>
<form class="form-inline" style="width:100%; height:100%" id="lecon">
<input value="Nouv. lecon" type="button" class="btn btn-xs btn-default pull-left col-sm-1" onclick="Orientation('control.param_access/ctr_lecon.php?premiF&maClasse=<?=$_GET['maClasse']?>&cours=<?=$_GET['cours']?>&idCours=<?=$_GET['idCours']?>','#editLeco','');Orientation('control.param_access/ctr_lecon.php?leconsgauche_ense&idCours=<?=$_GET['idCours']?>','#leconsgauche','');"/>
<input value="Enregistrer" type="button"  class="btn btn-xs btn-default pull-left  col-sm-1 " onclick="Orientation('control.param_access/ctr_lecon.php?maClasse=<?=$_GET['maClasse']?>&tlecon='+$('#tlecon').val()+'&idlc='+$('#idlc').val()+'&cours=<?=$_GET['cours']?>&idCours=<?=$_GET['idCours']?>&ajouterL=true','#editLeco','#lecon');Orientation('control.param_access/ctr_lecon.php?leconsgauche_ense&maClasse=<?=$_GET['maClasse']?>&idCours=<?=$_GET['idCours']?>','#leconsgauche','');"  /> 
<input value="Fiche d'Exploitation.." type="button" class="btn btn-xs btn-default pull-left  col-sm-1"
  onclick="
  Orientation('control.param_access/ctr_exploitation.php?sous_dmn=true&info=sous_dmn','#fenetre2');
  Orientation('control.param_access/ctr_exploitation.php?dsc=true&info=dsc','#fenetre3');
  Orientation('control.param_access/ctr_exploitation.php?FicheExp=true&maClasse=<?=$_GET['maClasse']?>&tlecon=<?=$_GET['tlecon']?>&idCours=<?=$_GET['idCours']?>&cours=<?=$_GET['cours']?>&idlc=<?=$_GET['idlc']?>','#editLeco','');"  /> 
<input value="Imprimer" type="button" class="btn btn-xs btn-default col-sm-1 " onclick="imprimer('maLc')"/>   
<input style="width:100%" id ="tlecon" type="text" class="form-control" placeholder="Titre de la lecon" value="<?=$_GET['tlecon']?>"/>     
  
<div class="form-group text-align: center;" style="width:100%; height:100%" id="maLc">    
<?php
if(isset($_GET['LireLecon_ense'])){
  $lec = new crs_lecon();
  $lec =$lec->rechercher($_GET['idlc']);
  $lec = $lec->fetch();
  ?>
  <textarea id="lcn" name="lcn" class="textarea" style="width:99%"><?=$lec['lecon']?></textarea>
<?php
}else if(isset($_GET['LireLecon_dir'])){
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
