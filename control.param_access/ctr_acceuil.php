<script src="../bootstrap/dist/js/bootstrap.min.js"></script>
<?php
if(isset($_GET['acceuil']) AND isset($_SESSION['IdUtilisateur'])){
    include_once('../vue.param_access/acceuille.php');
//Il faut renforce la securite ici
}else{ 
    ECHO "<center class='col-sm-12 well' style='font-size: 20px; color:red; margin-top:10%'><b>SESSION REJETTE</b>
    </center><center class='col-sm-12'>
    </center>";
}
?>