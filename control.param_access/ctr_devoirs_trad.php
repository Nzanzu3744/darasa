<?php
include_once('../model.param_access/crs_devoirs_trad.class.php');
include_once('../model.param_access/crs_cote_devoirs_trad.class.php');
include_once('../control.param_access/mes_methodes.php');
if (isset($_GET['ajouterDT'])) {
    $idDevoir = htmlspecialchars($_GET['idDevoir']);
    $tab = deserialiser($_POST['data1']);
    $cote02 = new crs_cote_devoirs_trad();
    $bcl = 0;
    foreach ($tab as $selCt) {
        $bcl++;
        ($bcl == 1) ? $ideleve = $selCt : '';

        if ($bcl == 2) {
            $cote02 = new crs_cote_devoirs_trad();
            $existe = $cote02->filterDevTraEleve($idDevoir, $ideleve)->fetch();
            if ($existe == true) {

                $cote02->modifier($idDevoir, $ideleve, $selCt);
            } else {
                $cote02->ajouter($idDevoir, $ideleve, $selCt);
            }
            $bcl = 0;
        }
        include_once('../model.param_access/suivie_remise_devoirs.class.php');
        $rms = new suivie_remise_devoirs();
        $rms->ajouter($idDevoir, $_GET['idCours'], $ideleve);
    }
?>
    <center><input style="height:30px; width:50px; color:green" disabled style="color:red" id="idDevoir" value="<?= $_GET['idDevoir'] ?>"></center>
<?php
    include_once('../vue.param_access/liste_eleve_transcript.php');
} elseif (isset($_GET['TtranscriptCt_mod'])) {
    $idDevoir = htmlspecialchars($_GET['idDevoir']);
?>
    <center><input style="height:30px; width:50px; color:green" disabled style="color:red" id="idDevoir" value="<?= $_GET['idDevoir'] ?>"></center>
<?php
    include_once('../vue.param_access/liste_eleve_transcript.php');
} else {
    include_once('../control.param_access/mes_methodes.php');
    echec_controleur('DEVOIRS - TRADITIONNEL');
}

?>