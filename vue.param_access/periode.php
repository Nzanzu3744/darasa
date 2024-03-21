<?php
include_once('../model.param_access/org_anneesco.class.php');
?>

<div id='gdpanel' class="panel panel-default col-sm-12">
    <header id="titre">
        <nav class="navbar navbar-default">
            <ul class="nav navbar-nav">
                <?php
                $org = new org_anneesco();
                foreach ($org->selectionnerByEcole($_SESSION['monEcole']['idEcole']) as $sel) {
                    $lien = '../control.param_access/ctr_periode.php?idann=' . $sel['idAnneeSco'] . '&annee=' . $sel['anneeSco'];
                ?>
                    <li style="border: 2px dashed #337ab7;"> <a href="#" onclick="Orientation('<?= $lien . '&selectFrm' ?>','#frm_pr2');Orientation('<?= $lien . '&selectPeriod' ?>','#list_pr2')" name="<?php echo $sel['idAnneeSco'] ?>"><?php echo strtoupper($sel['anneeSco']) ?></a></li>
                <?php
                }
                ?>
            </ul>
        </nav>
    </header>
    <section class="table-responsive heightSous_Fen" id="corps">
        <div id="frm_pr2" class="form-group  col-sm-4 heightContSous_Fen_wid_0">
            <?php
            include_once('form_periode.php');
            ?>
        </div>
        <div id="list_pr2" class="form-group  col-sm-8 table-responsive heightContSous_Fen_wid_0">
            <?php
            include_once('liste_periode.php');
            ?>
        </div>
    </section>
</div>