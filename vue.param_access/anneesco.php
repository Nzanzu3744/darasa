<?php 
include_once('../model.param_access/org_anneesco.class.php');
?>

<div id='gdpanel' class="panel panel-default col-sm-12" style=" background-color: ">
    <header  id="titre">
        <nav class="navbar navbar-default">
            <ul class="nav navbar-nav">
              <?php 
                    $org = new org_anneesco();
                    foreach($org->selectionner() as $sel){
                        $lien = "control.param_access/ctr_anneesco.php?AjouteRapport&idAnneeSco=".$sel['idAnneeSco'];
                        $vue = "#corps";
                    ?>
                    <li style="border: 2px dashed #337ab7;"> <a href="#" onclick="Orientation('<?=$lien?>','<?=$vue?>')" name="<?php echo $sel['idAnneeSco']?>"><?php echo strtoupper($sel['anneeSco'])?></a></li> 
                    <?php 
                     }
                ?> 
            </ul>
        </nav>
    </header>
<section class="table-responsive" id="corps" style="height:450px">
   <?php
   include_once('form_anneesco.php');

   ?>
</section>
</div>