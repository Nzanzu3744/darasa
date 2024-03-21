<?php
include_once('../model.param_access/param_connexion.php');
include_once('../model.param_access/org_classe.class.php');

?>

<section class="col-sm-12 row ">
 
        <div class="col-sm-5" style="padding:0px; margin:0px">
                  
                    <form id="frm_unite_classe" name="frm_unite_classe" style="padding:10px;margin:10px">
                    <?php include("form_unite_classe.php");?>
                    </form>
        </div>
        <div class="col-sm-2">
                    <button class="btn btn-success col-sm-12" style="height:30px; margin-top:300px" onclick='Orientation2("../control.param_access/ctr_classe.php?val=true","#panel","#frm_unite_classe")'><span class="glyphicon glyphicon-share-alt"></span></button>
                    <input class="btn btn-default col-sm-12" style="height:30px; margin-top:10%" type="button" onclick='Orientation("../control.param_access/ctr_classe.php?actu","#panel")' value="Annuler"> 
        </div>
                                        
        <div class="col-sm-5" style="padding:0px">
                    <div id="" style="padding:10px;margin:10px">
                        <?php
                        include("liste_classe.php");
                        ?>
                    </div>
        </div>
</section>













