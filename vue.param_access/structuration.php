<?php
include_once('../model.param_access/param_connexion.php');
include_once('../model.param_access/org_classe.class.php');

?>
<div class="col-sm-12">
    <input type="button" class= "btn btn-xs btn-primary pull-right" style="margin:40px; " onclick='Orientation("../vue.param_access/structuration.php","#panel")' value="TOUS ACTUALISER">
</div>
<section class="col-sm-12 row thumbnail" style="padding-bottom:1px;margin-bottom:5px">
        <div id="promotion01" class="col-sm-6" style="border:1px solid red"> 
            <?php include("form_promotion.php");?>
        </div>
        <div id="sect" class="col-sm-6" style="border:1px solid yellow">
            <?php include("form_section.php");?>
        </div>
     
</section>
<div id="unite01">
    <?php include("form_unite.php");?>
</div>


