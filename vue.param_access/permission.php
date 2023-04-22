<?php 
include_once('../model.param_access/param_groupe.class.php');
?>

<div id='gdpanel' class="panel panel-default col-sm-12" style=" background-color: ">
    <header  id="titre">
        <nav class="navbar navbar-default">
            <ul class="nav navbar-nav">
                <?php 
                    $perm = new param_groupe();
                    foreach($perm->selectionner() as $sel){
                        $lien = "../control.param_access/ctr_permission.php?idGroupe=".$sel['idGroupe'];
                        $vue = "#corps";
                    ?>
                    <li style="border: 2px dashed #337ab7;"> <a href="#" onclick="Orientation('<?=$lien?>','<?=$vue?>')" name="<?php echo $sel['idGroupe']?>"><?php echo strtoupper($sel['groupe'])?></a></li> 
                    <?php 
                     }
                ?>   
            </ul>
        </nav>
    </header>
<section class="table-responsive" id="corps" style="height:450px">
    <center class="titres" style="font-size:30px; padding:16%" > Selectionner un groupe pour visualiser ses permissions.</center>
</section>
<div class=" well " style="height:65px">
        <button class="btn btn-default pull-right col-sm-5" onclick="showme('#form','#gdpanel','true'); Orientation('../control.param_access/ctr_groupe.php?formGrp=','#form')"> CREER GROUPE</button>
        <button class="btn btn-default pull-left col-sm-5" onclick="showme('#form','#gdpanel','true'); Orientation('../control.param_access/ctr_permission.php?formTable=','#form')"> CREER UNE TABLE</button>
</div>
</div>
<div id="form" class="col-sm-1" style="display:none">
<?php include_once('../vue.param_access/form_table.php'); ?>
</div>
<!-- <script src="../bootstrap/dist/js/bootstrap.min.js"></script> -->

