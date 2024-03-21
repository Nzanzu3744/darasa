<?php
include_once('../model.param_access/crs_lecon_pdf.class.php');
$idLeconVd = $_GET['idlc'];

$url = crs_lecon_pdf::rechercher($idLeconVd)->fetch();
?>
<object class="heightContSous_Fen" data="<?= $url['urlPdf'] ?>">
    <iframe class="heightContSous_Fen" src="<?= $url['urlPdf'] ?>" frameborder="0" allowfullscreen>
        <p style="text-align:center; margin-top:40%;">
            Cet navigateur n'est pas à mesure d'affiche Ce document, telecharger les sur votre terninal </br><a class="btn btn-md btn-primary" style="margin-top: 20px;" href="<?= $url['urlPdf'] ?>">Télécharge ici</a>
        
    </iframe>
</object>