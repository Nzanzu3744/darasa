<?php
include_once('../model.param_access/crs_lecon_video.class.php');
$idLeconVd = $_GET['idlc'];

$url = crs_lecon_video::rechercher($idLeconVd)->fetch();
?>
<iframe class="heightContSous_Fen" src=<?= $url['urlVideo'] ?> frameborder="0" allowfullscreen></iframe>