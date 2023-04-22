<?php
include_once('../model.param_access/param_permission.class.php');
if(isset($_GET['nomT']) && isset($_GET['option']) && isset($_GET['idPermi']) ){
            $perm = new param_permission();
            $perm->rechercher($_GET['idPermi']);

            if($_GET['option']=="ajouter"){
                $perm->setajouter();
            }else if($_GET['option']=="modifier"){
                $perm->setmodifier();
            }else if($_GET['option']=="afficher"){
                $perm->setafficher();
            }else if($_GET['option']=="supprimer"){
                $perm->setsupprimer();
            }
        }
        ?>
        <table class="table table-bordered table-striped table-condensed">
        
            <thead>
                <tr>
                    <th>N</th>
                    <th>Table</th>
                    <th>Ajouter</th>
                    <th>Afficher</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $permi = new param_permission();
                    $n=0;
                    foreach( $permi->rechercheByIdGroupe($_GET['idGroupe'])  as $sel)
                    { 
                        $n++;
                ?>
                <tr>
                    <td><?=$n?></td>
                    <td><?=strtoupper($sel['nomTable'])?></td>
                    <?php
                        $lien = "../control.param_access/ctr_permission.php?idPermi=".$sel['idPermission']."& idGroupe=".$sel['idGroupe']."& nomT=".$sel['nomTable']."& option=";
                        $vue = "#corps";
                    ?>
                    <td><input type="checkbox" onchange="Orientation('<?=$lien.'ajouter'?>','<?=$vue?>')" <?=($sel['ajouter']==1)?"checked='checked'":"";?>/></td>
                    <td><input type="checkbox" onchange="Orientation('<?=$lien.'afficher'?>','<?=$vue?>')" <?=($sel['afficher']==1)?"checked='checked'":"";?>/></td>
                    <td><input type="checkbox" onchange="Orientation('<?=$lien.'modifier'?>','<?=$vue?>')" <?=($sel['modifier']==1)?"checked='checked'":"";?>/></td>
                    <td><input type="checkbox" onchange="Orientation('<?=$lien.'supprimer'?>','<?=$vue?>')" <?=($sel['supprimer']==1)?"checked='checked'":"";?>/></td>
                </tr>
               <?php
                    }
               ?>
               
            </tbody>
        </tble>
        <script src="../bootstrap/dist/js/bootstrap.min.js"></script>
       
