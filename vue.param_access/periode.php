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
                        $lien ='control.param_access/ctr_periode.php?idann='.$sel['idAnneeSco'].'&annee='.$sel['anneeSco'];
                    ?>
                    <li style="border: 2px dashed #337ab7;"> <a href="#" onclick="Orientation('<?=$lien.'&selectFrm'?>','#frm_pr2');Orientation('<?=$lien.'&selectPeriod'?>','#list_pr2')" name="<?php echo $sel['idAnneeSco']?>"><?php echo strtoupper($sel['anneeSco'])?></a></li> 
                    <?php 
                     }
                ?> 
            </ul>
        </nav>
    </header>
<section class="table-responsive" id="corps" style="height:600px">
 <div id="frm_pr2" class="form-group well col-sm-4" style="height:580px;">
   <?php
   include_once('form_periode.php');
   ?>
   </div>
<div id="list_pr2" class="form-group well col-sm-8 table-responsive" style="height:580px;">
    <?php
   include_once('liste_periode.php');
   ?>
</div>
</section>
</div>