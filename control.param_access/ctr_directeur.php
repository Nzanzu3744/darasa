<?php
if (isset($_GET['annul'])) {
    include("../vue.param_access/profil_Directeur.php");
} else if (isset($_GET['Valide'])) {
    include_once("../control.param_access/mes_methodes.php");
    $classes = deserialiser($_POST['data1']);
    if (!empty($classes)) {

        include_once("../model.param_access/org_anneesco.class.php");
        $ann = new org_anneesco();
        $ann = $ann->selectionnerDerAnEcode($_SESSION['monEcole']['idEcole'])->fetch();
        if ($ann == true) {
            include_once("../model.param_access/dir_directeur.class.php");
            foreach ($classes as $dir) {
                dir_directeur::ajouter($dir, $_GET['idutil'], $ann['idAnneeSco'], '1', $_SESSION['monEcole']['idEcole']);
            }
            include("../vue.param_access/profil_Directeur.php");
        } else {
            include_once('../control.param_access/mes_methodes.php');
            echec_controleur('AJOUTER DIRECTEUR AUCUNE ANNEE SCOLAIRE TROUVEE');
        }
    } else {
        echo '<center class="col-sm-12" style="color:red">VEUILLEZ SELECTINNER UNE CLASSE POUR L\'INSCRIPTION<center> <button class="btn btn-warning pull-right" style="height:40px; margin-top:13px;" onclick=Orientation("../control.param_access/ctr_membre.php?rtn=true&idGroupe=' . $_GET['idGroupe'] . '","#corps")>Returner</button>';
    }
} else if (isset($_GET['idutil']) and isset($_GET['directeur'])) {

    include("../vue.param_access/profil_Directeur.php");
} else if (isset($_GET['rtn']) and isset($_GET['idGroupe'])) {
    include("../vue.param_access/profil_Directeur.php");
} else if (isset($_GET['supAffDir'])) {
    $idAffectDir = htmlspecialchars($_GET['supAffDir']);
    include_once("../model.param_access/dir_directeur.class.php");
    if (dir_directeur::supprimer($idAffectDir)) {
        include("../vue.param_access/profil_Directeur.php");
    } else {
?>
        <center class="col-sm-12" style="color:red; margin-top:15%">NOUS NE POUVONS PAS SUPPRIME UNE INSCRIPTION DEJA LIEN AUX TRAVAUX<center>
                <button class="btn btn-warning pull-right" style="height:40px; margin-top:13px;" onclick="Orientation('control.param_access/dir_directeur.php?directeur&idutil=<?= $_GET['idutil'] ?>&idGroupe=<?= $_GET['idGroupe'] ?>','#corps')">Returner</button>
        <?php


    };
} else {
    include_once('../control.param_access/mes_methodes.php');
    echec_controleur('DIRECTOR');
}
        ?>