<?php
include_once('../model.param_access/param_connexion.php');
include_once('../model.param_access/org_classe.class.php');

?>

<section class="col-sm-12 row thumbnail" style=" margin:20px; padding-bottom:1px;margin-bottom:5px">
        <div id="promotion01" class="col-sm-6" style="padding:0px;margin:0px"> 
            <?php include_once("form_promotion.php");?>
        </div>
        <div id="sect" class="col-sm-6" style="padding:0px;margin:0px">
            <?php include_once("form_section.php");?>
        </div>
        <div id="unite01" class="col-sm-12" style="padding:0px;margin:0px">
            <?php include_once("form_unite.php");?>
        </div> 
        <input type="button" style="margin-right:50px" onclick="Orientation('../control.param_access/ctr_classe.php?PrepaClasse=','#panel')" class="btn btn-xs pull-right" value="ACTUALISER">
         
</section>
 