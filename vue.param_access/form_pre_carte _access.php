 <!--  -->
 <?php
  (empty($_SESSION)) ? session_start() : '';
  ?>
 <div class="col-sm-12" style="margin:0px; height:1000px; background:white; padding:10px" id="doc_carte" name="">
   <?php
    include_once('../control.param_access/mes_methodes.php');
    // $etab = $_SESSION['monEcole']['nomEcole'];
    // $logo = $_SESSION['monEcole']['logoEcole'];
    // $bp = "B.P." . $_SESSION['monEcole']['bpEcole'] . " " . $_SESSION['monEcole']['nomVilleTerritoire'];
    // $t1 = "RECEUIL CARTES D'ACCESS ";
    // include_once('../model.param_access/param_groupe.class.php');
    // $groupe = param_groupe::rechercher($_GET['idGroupe'])->fetch();
    // $t2 = "GROUPE : " . strtoupper($groupe['groupe']);
    // $editer = '';
    // entete_doc($etab, $logo, $bp, $t1, $t2, $editer);
    ?>

   <div class="" style=" margin:0px; background:white; padding:10px" id="monCRT" name="monCRT">


   </div>
 </div>