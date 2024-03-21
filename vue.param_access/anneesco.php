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
                    $lien = "control.param_access/ctr_anneesco.php?AjouteRapport&idAnneeSco=" . $sel['idAnneeSco'];
                    $vue = "#cours";
                ?>
                    <li style="border: 1px dashed black;"> <a href="#" onclick="Orientation('<?= $lien ?>','<?= $vue ?>')" name="<?php echo $sel['idAnneeSco'] ?>"><?php echo strtoupper($sel['anneeSco']) ?></a>
                        <?php
                        if ($_SESSION['org_anneesco_supprimer'] == 1) {
                        ?>
                            <span href="#" style="color:red; margin-top:-45px; margin-right:3px; " class="glyphicon glyphicon-trash pull-right pull-top" onclick="Orientation('../control.param_access/ctr_anneesco.php?supAnnee=true&idAnneeSco=<?= $sel['idAnneeSco'] ?>','#panel')"></span>
                        <?php
                        }
                        ?>
                    </li>
                <?php

                }
                ?>
            </ul>
        </nav>
    </header>
    <section class="table-responsive" id="cours" style="height:450px">
        <?php
        if ($_SESSION['org_anneesco_ajouter'] == 1) {
            include_once('form_anneesco.php');
        } else {
            include_once('../control.param_access/mes_methodes.php');
            echec_controleur("VOUS N'EST PAS AUTORISE D'AJOUTER UNE NOUVELLE ANNEE");
        }

        ?>
    </section>
</div>