<?php
include_once('../model.param_access/param_connexion.php');
include_once('../model.param_access/org_classe.class.php');

?>

<section class="col-sm-12 row thumbnail" style="padding-bottom:1px;margin-bottom:5px">

        <div id="promotion01" class="col-sm-4" style="padding:0px;margin:0px"> 
            <?php include("form_promotion.php");?>
            
        </div>
        <div id="sect" class="col-sm-4" style="padding:0px;margin:0px">
            <?php include("form_section.php");?>
        </div>
        <div id="unite01" class="col-sm-4" style="padding:0px;margin:0px">
            <?php include("form_unite.php");?>
        </div> 
        <button  style="width:50%; height:30px; margin:0px; padding:0px;;" id="enrg" onclick="Orientation('../control.param_access/ctr_structure.php?val','#panel')"  class="btn btn-default pullright col-sm-6">Valider</button>
        <button  style="width:50%; height:30px; margin:0px; padding:0px;;" id="enrg" onclick="Orientation('../control.param_access/ctr_structure.php?actu','#panel')"  class="btn btn-default pullright col-sm-6">Actualiser</button>      
</section>
 
<?php
        include("liste_classe.php");
?>

