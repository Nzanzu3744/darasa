<?php
(empty($_SESSION)) ? session_start() : '';

if (isset($_GET['stream']) and isset($_GET['idCours'])) {
    include_once('../vue.param_access/form_stream.php');
} else {
    include_once('../control.param_access/mes_methodes.php');
    echec_controleur('LECON STREAM');
}
