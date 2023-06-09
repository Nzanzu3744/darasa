<!-- <script src="../bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../vue.param_access/script.js"></script> -->
<?php
if(isset($_GET['rptCours_ense'])){
     include_once("../vue.param_access/rapportcours_ense.php");
}elseif(isset($_GET['grille_remise'])){
     include_once("../vue.param_access/grille_remise_dev_cours.php");
}elseif(isset($_GET['grille_Point'])){
     include_once("../vue.param_access/grille_point_cours.php");
}elseif(isset($_GET['grille_ltr'])){
     include_once("../vue.param_access/grille_lecteur_cours.php");
}else{
    echo "Echec Rapport";
}
?>