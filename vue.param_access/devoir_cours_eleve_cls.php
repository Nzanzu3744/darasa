<?php
include_once('../model.param_access/crs_devoirs.class.php');
?>

<?php
$idC = 0;
if (isset($_GET['idCours'])) {
   $idC = $_GET['idCours'];
}
?>
<input id="" value="Actualiser" type="button" class="btn btn-default " style="width:120px; padding:6px; width:100%" onclick="Orientation('../control.param_access/ctr_devoirs.php?devoirssgauche&idCours=<?= $idC ?>','#devoirssgauche');" />
<div class="table-responsive" style="height:100%">
   <?php
   $dv = new crs_devoirs();

   $devoirs = $dv->selectionnerByIdCoursActiftypedev($idC);
   $i = 0;
   $tr = 1;
   foreach ($devoirs as $seldv) {
      $i++;
   ?>
      <div style="background-color: WHITE; font-size:14px;border-top: 1px solid red; margin-top:25px;">
         [<?= $i; ?>] Code : <?= $seldv['idDevoir'] ?><br>
         <div class="col-sm-12">
            <!-- <img class="col-sm-12" style="height:100px; width:300px; opacity:calc(0.1);" src="../images/iconInt.PNG" /> -->
         </div>

         <center style="">COURS :<?= $seldv['cours'] ?></br>
            <a href='#' style='font-size:8px'>
               <?= $seldv['nomUtilisateur'] . '  ' . $seldv['postnomUtilisateur'] . ' ' . $seldv['prenomUtilisateur'] ?>
            </a></br>
            <?= $seldv['anneeSco'] ?></br>
            <?= ($seldv['actif'] != 1) ? "LECON DESACTIVE" : 'ACTIVE' ?>
         </center>

         <?php
         $sel_C = new crs_devoirs();
         $sel_C = $sel_C->selectionnerByCours($seldv['idCours'])->fetch();
         ?>
         <label class="col-sm-12" style="font-size: 15px;">
            <a href="#" onclick="Orientation('../control.param_access/ctr_devoirs.php?Liredevoirs_eleve=tue&idIns=<?= $_GET['idIns'] ?>&maClasse=<?= $_GET['maClasse'] ?>&idClasse=<?= $_GET['idClasse'] ?>&idcrs=<?= $sel_C['idCours'] ?>&iddv=<?= $seldv['idDevoir'] ?>','#editLeco')">Lire le devoirs</a></i>
         </label>
      </div>
   <?php
   }
   ?>
   <div>