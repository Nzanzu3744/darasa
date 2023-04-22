<?php 
include_once('../model.param_access/param_groupe.class.php');
?>
<div id="gdpanel" name="gdpanel" class="panel panel-default col-sm-12">
    <header  id="titre">
        <nav class="navbar navbar-default">
            <ul class="nav navbar-nav">
                <?php 
                    $perm = new param_groupe();
                    foreach($perm->selectionner() as $sel){

                    ?>
                    <li style="border: 2px dashed orange;"> <a href="#" onclick="Orientation('../control.param_access/ctr_role.php?idGroupe=<?=$sel['idGroupe']?>','#corps')" name="<?php echo $sel['idGroupe']?>"><?php echo strtoupper($sel['groupe'])?></a></li> 
                    <?php 
                     }
                ?>   
            </ul>
        </nav>
    </header>
<section class="table-responsive" id="corps" style="height:450px">

<center class="titres" style="font-size:30px; padding:14%" > Selectionner le groupe pour visualiser ses membres.</center>
</section>
<div class=" well " style="height:65px">
        <button id="btnutil" name="btnutil" class="btn btn-default pull-right col-sm-5" onclick="showme('#frmuti','#gdpanel','true'); Orientation('../control.param_access/ctr_utilisateur.php?formUt=','#frmuti')"> CREER UTILISATEUR</button>
        <button  id="btgrp" name="btgrp"  class="btn btn-default pull-left col-sm-5" onclick="showme('#frmuti','#gdpanel','true'); Orientation('../control.param_access/ctr_groupe.php?formGrp=','#frmuti')"> CREER UNE GROUPE</button>
</div>
</div>
<div id="frmuti" class="col-sm-1" style="display:none">
<?php
 include_once('../vue.param_access/form_groupe.php');
  ?>
</div>
<!-- <script src="../bootstrap/dist/js/bootstrap.min.js"></script> -->

