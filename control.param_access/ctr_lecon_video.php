<?php
(empty($_SESSION)) ? session_start() : '';

if (isset($_GET['importVid']) and isset($_GET['idCours'])) {
    include_once('../vue.param_access/form_import_lecon_video.php');
} elseif (isset($_GET['reg_lvid'])) {


    $titreL = htmlspecialchars($_POST['titreLeconVideo']);
    $idCrs = htmlspecialchars($_POST['idCours']);
    $rsm = htmlspecialchars($_POST['rsmLeconVideo']);


    $valid_extensions = array('mp4', 'avi');

    $path  = "../videoLecon_" . $_SESSION['monEcole']['idEcole'] . "/";

    if (is_dir($path) == false) {
        mkdir($path);
    }
    $img = htmlspecialchars($_FILES['video']['name']);
    $tmp = htmlspecialchars($_FILES['video']['tmp_name']);

    // get uploaded file's extension
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

    // can upload same image using rand function
    include_once("../control.param_access/mes_methodes.php");
    $final_image = rand(1000, 100000000) . str_remplacer($img);

    // check's valid format
    if (in_array($ext, $valid_extensions)) {
        $path = $path . strtolower($final_image);

        if (move_uploaded_file($tmp, $path)) {
            include_once('../model.param_access/crs_lecon_video.class.php');
            if (crs_lecon_video::ajouter($idCrs, $titreL, $path, $rsm, $_SESSION['idUtilisateur'])) {
                $leconVd = crs_lecon_video::rechercherLeconVidEnr($idCrs, $path, $_SESSION['idUtilisateur'])->fetch();
?>
                <iframe width="100%" height="100%" src=<?= $leconVd[' urlVideo'] ?> frameborder="0" allowfullscreen></iframe>
<?php
            } else {
                include_once('../control.param_access/mes_methodes.php');
                echec_controleur("ECHEC D'ENREGISTREMENT COURS. ");
            }
        }
    } else {
        echo 'champsVide';
    }
} else {
    include_once('../control.param_access/mes_methodes.php');
    echec_controleur('LECON VIDEO');
}
