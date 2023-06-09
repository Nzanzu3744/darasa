<?php
include_once('../model.param_access/param_groupe.class.php');
include_once('../model.param_access/crs_lecon.class.php');
?>
<!--  -->
<script src="jquery/dist/summernote/summernote-bs4.min.js"></script>
<!--  -->

<div class="form-inline" style="width:100%; height:100%" id="lecon"> 
<div class="form-group text-align: center;" style="width:100%; height:100%">              
        
        <center class="col-sm-12 titres" style="font-size:20px" >LECON <?=" <b>[ ".$_GET['cours']."]</b> à  ".$_GET['maClasse']?> (COTE ELEVE)</center>
        <center class="col-sm-12 titres" style="font-size:19px" ><?=$_GET['tlecon']?></center>
    <?php
        if(isset($_GET['LireLecon_eleve'])){
  $lec = new crs_lecon();
  $lec =$lec->rechercher($_GET['idlc']);
  $lec = $lec->fetch();
  echo '<textarea id="lcn" name="lcn" class="textarea" style="width:99%">'.$lec['lecon'].'</textarea>';

}

?>
    </div> 
          
</div>      
</div>


</script>
<script>
$(function () {
$('.textarea').summernote()
})
</script>

