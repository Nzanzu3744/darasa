<?php
if(isset($_GET['idlc']) AND isset($_GET['Lvit'])){
    include_once('../model.param_access/visite_lecon.class.php');
    $vt = new visite_lecon();
    $vt=$vt->vues($_GET['idlc']);
    ?>
        <ol>
    <?php
    foreach($vt as $selVt){
    ?>
        <li><?=$selVt['nomUtilisateur'].' '.$selVt['postnomUtilisateur'].' '.$selVt['prenomUtilisateur']?></li>
    <?php   
    }
    ?>
        </ol>
    <?php


}

?>