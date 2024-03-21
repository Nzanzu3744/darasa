<?php
(empty($_SESSION)) ? session_start() : '';

if (isset($_GET['importPdf']) and isset($_GET['idCours'])) {
    include_once('../vue.param_access/form_import_lecon_pdf.php');
} elseif (isset($_GET['reg_lpdf'])) {


    $titreL = htmlspecialchars($_POST['titreLeconPdf']);
    $idCrs = htmlspecialchars($_POST['idCours']);
    $rsm = htmlspecialchars($_POST['rsmLeconPdf']);


    $valid_extensions = array('pdf', 'pptx');

    $path  = "../pdfLecon_" . $_SESSION['monEcole']['idEcole'] . "/";

    if (is_dir($path) == false) {
        mkdir($path);
    }
    $pdf = htmlspecialchars($_FILES['Pdf']['name']);
    $tmp = htmlspecialchars($_FILES['Pdf']['tmp_name']);

    // get uploaded file's extension
    $ext = strtolower(pathinfo($pdf, PATHINFO_EXTENSION));

    // can upload same image using rand function
    include_once("../control.param_access/mes_methodes.php");
    $final_image = rand(1000, 100000000) . str_remplacer($pdf);

    // check's valid format
    if (in_array($ext, $valid_extensions)) {
        $path = $path . strtolower($final_image);

        if (move_uploaded_file($tmp, $path)) {
            include_once('../model.param_access/crs_lecon_pdf.class.php');
            if (crs_lecon_pdf::ajouter($idCrs, $titreL, $path, $rsm, $_SESSION['idUtilisateur'])) {
                $leconVd = crs_lecon_pdf::rechercherLeconVidEnr($idCrs, $path, $_SESSION['idUtilisateur'])->fetch();
?>
                <object class="heightContSous_Fen" data="<?= $url['urlPdf'] ?>">
                    <iframe class="heightContSous_Fen" src="<?= $url['urlPdf'] ?>" frameborder="0" allowfullscreen>
                        <p style="text-align:center; margin-top:40%;">
                            Cet navigateur n'est pas à mesure d'affiche Ce document, telecharger les sur votre terninal </br><a class="btn btn-md btn-primary" style="margin-top: 20px;" href="<?= $url['urlPdf'] ?>">Télécharge ici</a>

                    </iframe>
                </object>
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
    echec_controleur('LECON PDF');
}
