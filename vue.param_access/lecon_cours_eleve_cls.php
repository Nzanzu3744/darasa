<?php
include_once('../model.param_access/crs_lecon.class.php');
include_once('../model.param_access/crs_lecon_video.class.php');
include_once('../model.param_access/crs_lecon_pdf.class.php');
?>

<!-- <section class="heightContSous_Fen "> -->
<?php
$idC = null;
if (isset($_GET['idCours'])) {
   $idC = $_GET['idCours'];
}
?>
<input id="" value="Actualiser" type="button" class="btn btn-default " style="width:120px; padding:6px; width:100%" onclick='Orientation("../control.param_access/ctr_lecon.php?maClasse=<?= $_GET["maClasse"] ?>&idIns=<?= $_GET["idIns"] ?>&leconsgauche_eleve&idCours=<?= $idC ?>","#leconsgauche","");'>

<div class="table-responsive" style="height:100%">
   <?php
   $lc02 = new crs_lecon();
   $lecon = $lc02->selectionnerByCoursActif($_GET['idCours']);
   $i = 0;
   $tr = 1;
   foreach ($lecon as $selLc) {
      $i++;
   ?>
      <div style="background-color: WHITE; font-size:14px; margin-top:30px;">
         <center style="background:gray; color:orange">[<?= $i ?>]</center>
         <?php
         if ($selLc['type'] == 1) {

         ?>
            <center>
               <label style="font-size:14px">
                  LECON_<?= $selLc['idLecon'] . ': ' . $selLc['titreLecon'] ?>
               </label>
            </center>
            <div class="col-sm-12">
               <img class="col-sm-12" style="height:100px; width:100%; opacity:calc(1);" src="../images/iconWeb.PNG" />
               <center>
                  <a href='#' style='font-size:8px'>
                     <?= $selLc['nomUtilisateur'] . '  ' . $selLc['postnomUtilisateur'] . ' ' . $selLc['prenomUtilisateur'] ?>
                  </a><br>
                  <?= $selLc['anneeSco'] ?><br>
                  <?= ($selLc['actif'] != 1) ? "LECON DESACTIVE" : 'ACTIVE' ?>
               </center>



            <?php
         } else if ($selLc['type'] == 2) {
            $url = crs_lecon_video::rechercher($selLc['idLecon'])->fetch();
            ?>
               <center>
                  <label style="font-size:14px">
                     LECON_<?= $selLc['idLecon'] . ': ' . $selLc['titreLecon'] ?>
                  </label>
               </center>
               <video width=100%>
                  <source src="<?= $url['urlVideo'] ?>" />
               </video>

               <p class="text-justify" style="width:100%">
                  Résume: <br>
                  <?php
                  echo html_entity_decode(html_entity_decode($url['resumeVideo']));
                  ?>
               </p>
               <center>
                  <a href='#' style='font-size:8px'>
                     <?= $selLc['nomUtilisateur'] . '  ' . $selLc['postnomUtilisateur'] . ' ' . $selLc['prenomUtilisateur'] ?>
                  </a><br>
                  <?= $selLc['anneeSco'] ?><br>
                  <?= ($selLc['actif'] != 1) ? "LECON DESACTIVE" : 'ACTIVE' ?>
               </center>

            <?php

         } else if ($selLc['type'] == 3) {
            $url = crs_lecon_pdf::rechercher($selLc['idLecon'])->fetch();
            ?>
               <center>
                  <label style="font-size:14px">
                     LECON_<?= $selLc['idLecon'] . ': ' . $selLc['titreLecon'] ?>
                  </label>
               </center>

               <img class="col-sm-12" style="height:130px; width:100%; opacity:calc(1);" src="../images/iconPdf.PNG" />


               <center>
                  <p class="text-justify" style="width:100%">
                     Résume :<br>
                     <?php
                     echo html_entity_decode(html_entity_decode($url['resumePdf']));
                     ?>
                  </p>
                  <a href='#' style='font-size:8px'>
                     <?= $selLc['nomUtilisateur'] . '  ' . $selLc['postnomUtilisateur'] . ' ' . $selLc['prenomUtilisateur'] ?>
                  </a><br>
                  <?= $selLc['anneeSco'] ?><br>
                  <?= ($selLc['actif'] != 1) ? "LECON DESACTIVE" : 'ACTIVE' ?>
               </center>
            <?php

         } else {
            echo "AUTRES";
         }
         $sel_C = new crs_lecon();
         $sel_C = $sel_C->selectionnerByIdCours($selLc['idCours'])->fetch();
            ?>
            <label class="col-sm-12" style="font-size: 15px;">
               <a href="#" onclick="Orientation('../control.param_access/ctr_lecon.php?LireLecon_eleve=tue&maClasse=<?= $_GET['maClasse'] ?>&idCours=<?= $idC ?>&idIns=<?= $_GET['idIns'] ?>&tlecon=<?= $selLc['titreLecon'] ?>&idlc=<?= $selLc['idLecon'] ?>&type=<?= $selLc['type'] ?>','#editLeco','')">Lire la leçon
               </a>
            </label>
            </div>
         <?php
      }
         ?>
      </div>


      <!-- </section> -->