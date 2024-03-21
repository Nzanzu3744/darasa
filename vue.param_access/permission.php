<?php
include_once('../model.param_access/param_groupe.class.php');
?>

<div id='gdpanel' class=" col-sm-12">
    <header id="titre">
        <nav class="navbar navbar-default">
            <ul class="nav navbar-nav">
                <?php
                $perm = new param_groupe();

                foreach ($perm->selectionnerByEcole($_SESSION['monEcole']['idEcole']) as $sel) {
                    $lien = "../control.param_access/ctr_permission.php?idGroupe=" . $sel['idGroupe'];
                    $vue = "#corps";
                    if ($sel['idGroupe'] > 0) {
                ?>
                        <li class="dropdown " style="border: 1px dashed blue; width:200px; height:50px; font-size:12px" onclick="Orientation('<?= $lien ?>','<?= $vue ?>')" name="<?php echo $sel['idGroupe'] ?>">
                            <a data-toggle="dropdown"><?php echo strtoupper($sel['groupe']) ?></a>
                            <?php
                            if ($_SESSION['param_groupe_supprimer'] == 1) {
                            ?>
                                <span href="#" style="color:red; margin-top:-45px; margin-right:3px; " class="glyphicon glyphicon-trash pull-right pull-top" onclick="Orientation('../control.param_access/ctr_groupe.php?SupprGroupe=true&idGp=<?= $sel['idGroupe'] ?>','#panel')"></span>
                            <?php
                            }
                            ?>
                        </li>
                        <?php
                    } else {
                        if ($_SESSION['idUtilisateur'] <= 0) {
                        ?>
                            <li class="dropdown " style="border: 1px dashed red; width:200px; height:50px; font-size:12px" onclick="Orientation('<?= $lien ?>','<?= $vue ?>')" name="<?php echo $sel['idGroupe'] ?>">
                                <a data-toggle="dropdown"><?php echo strtoupper($sel['groupe']) ?></a>
                                <?php
                                if ($_SESSION['param_groupe_supprimer'] == 1) {
                                ?>
                                    <span href="#" style="color:red; margin-top:-45px; margin-right:3px; " class="glyphicon glyphicon-trash pull-right pull-top" onclick="Orientation('../control.param_access/ctr_groupe.php?SupprGroupe=true&idGp=<?= $sel['idGroupe'] ?>','#panel')"></span>
                                <?php
                                }
                                ?>
                            </li>
                <?php
                        }
                    }
                }
                ?>
            </ul>
        </nav>
    </header>
    <section class="table-responsive heightSous_Fen" id="corps">
        <center class="heightContSous_Fen" style="font-size:30px; padding:16%"> Selectionner un groupe pour visualiser ses permissions.</center>
    </section>
    <div class="  " style="height:65px">
        <?php
        if ($_SESSION['param_table_ajouter'] == 1) {
        ?>
            <button class="btn btn-default pull-right col-sm-5" onclick="showme('#form','#gdpanel','true'); Orientation('../control.param_access/ctr_groupe.php?formGrp=','#form')"> CREER GROUPE</button>
        <?php
        }
        if ($_SESSION['param_groupe_ajouter'] == 1 and $_SESSION['idUtilisateur'] <= 0) {
        ?>
            <button class="btn btn-default pull-left col-sm-5" onclick="showme('#form','#gdpanel','true'); Orientation('../control.param_access/ctr_permission.php?formTable=','#form')"> CREER UNE TABLE</button>
        <?php
        }
        ?>
    </div>
</div>
<div id="form" class="col-sm-1" style="display:none">
    <?php include_once('../vue.param_access/form_table.php'); ?>
</div>