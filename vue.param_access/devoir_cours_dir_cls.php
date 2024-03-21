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
   <table id="filtrer" class="table table-bordered table-striped table-condensed">
      <tbody>
         <?php
         $dv = new crs_devoirs();
         $devoirs = $dv->selectionnerByCours($_GET['idCours']);
         $i = 0;
         $tr = 1;
         foreach ($devoirs as $seldv) {
            $i++;
            if ($tr == 1) {
               echo '<tr style="margin:3px">';
            }
            if ($seldv['typedev'] == 1) {
         ?>
               <td style="background-color: aliceblue"> [<?= $i; ?>] Code : <?= $seldv['idDevoir'] ?><br>_ Sur <?= $seldv['ponderation'] ?> Points<br>
                  <center style="color:red">Devoirs de :<br><?= $seldv['cours'] ?><br><?= $seldv['anneeSco'] ?><br><a href='#' style='font-size:8px'><?= $seldv['nomUtilisateur'] . '  ' . $seldv['postnomUtilisateur'] . ' ' . $seldv['prenomUtilisateur'] ?></a><br><?= $seldv['indexation'] ?><br> <mark style="color:black"><?= ($seldv['actif'] != 1) ? "DEVOIR DESACTIVE" : 'ACTIVE' ?></mark></center></br>
               </td>
               <?php
               if ($tr >= 2) {
                  $tr = 0;
                  echo "</td>";
               }
               ?>
               <td style="height:100%;  background:aliceblue">
                  <z class="dropdown">
                     <button data-toggle="dropdown"><b class="caret ppull-right"></b></button>
                     <ul class="dropdown-menu pull-right">
                        <?php

                        $sel_C = new crs_devoirs();
                        $sel_C = $sel_C->selectionnerByCours($seldv['idCours'])->fetch();
                        ?>
                        <li data-toggle="modal" href="#inscri"><a href="#" onclick='Orientation("../control.param_access/ctr_questionnaire.php?Liredevoirs_ense=tue&maClasse=<?= $_GET["maClasse"] ?>&idcrs=<?= $sel_C["idCours"] ?>&iddv=<?= $seldv["idDevoir"] ?>","#editLeco")'>Lire le devoirs</a></i></li>

                        <?php
                        if ($_SESSION['crs_devoirs_supprimer'] == 1) {
                        ?>
                           <li class="divider"></li>
                           <li>
                              <a href="#" onclick='Orientation("../control.param_access/ctr_devoirs.php?supDev=true&fct=ense&idDev=<?= $seldv["idDevoir"] ?>&maClasse=<?= $_GET["maClasse"] ?>&idCours=<?= $sel_C["idCours"] ?>&idAnneeSco=<?= $_GET["idAnneeSco"] ?>&idClasse=<?= $_GET["idClasse"] ?>","#leconsgauche")' style="color: red">Supprimer</a>
                           </li>
                        <?php
                        }
                        ?>
                     </ul>
                  </z>
               </td>
            <?php
            } else {
            ?>
               <td style="background-color: #f2f2f2"> [<?= $i; ?>] Code : <?= $seldv['idDevoir'] ?><br>_ Sur <?= $seldv['ponderation'] ?> Points<br>
                  <center style="color:red">Devoirs de :<br><?= $seldv['cours'] ?><br><?= $seldv['anneeSco'] ?><br><a href='#' style='font-size:8px'><?= $seldv['nomUtilisateur'] . '  ' . $seldv['postnomUtilisateur'] . ' ' . $seldv['prenomUtilisateur'] ?></a><br><?= $seldv['indexation'] ?><br> <mark style="color:black"><?= ($seldv['actif'] != 1) ? "DEVOIR DESACTIVE" : 'ACTIVE' ?></mark></center></br>
               </td>
               <?php
               if ($tr >= 2) {
                  $tr = 0;
                  echo "</td>";
               }
               ?>
               <td style="height:100%;  background:#f2f2f2">
                  <z class="dropdown">
                     <button data-toggle="dropdown"><b class="caret ppull-right"></b></button>
                     <ul class="dropdown-menu pull-right">
                        <?php

                        $sel_C = new crs_devoirs();
                        $sel_C = $sel_C->selectionnerByCours($seldv['idCours'])->fetch();
                        ?>
                        <li><a href="#" onclick='Orientation("../control.param_access/ctr_devoirs_trad.php?TtranscriptCt_mod=tue&idClasse=<?= $_GET["idCls"] ?>&maClasse=<?= $_GET["maClasse"] ?>&idAnneeSco=<?= $_GET["idAnneeSco"] ?>&idCours=<?= $sel_C["idCours"] ?>&modifTran&idDevoir=<?= $seldv["idDevoir"] ?>","#editLeco","")'>Voir la transcription</a></i></li>

                        <?php
                        if ($_SESSION['crs_devoirs_supprimer'] == 1) {
                        ?>
                           <li class="divider"></li>
                           <li>
                              <a href="#" onclick='Orientation("../control.param_access/ctr_devoirs.php?supDev=true&fct=ense&idDev=<?= $seldv["idDevoir"] ?>&maClasse=<?= $_GET["maClasse"] ?>&idCours=<?= $sel_C["idCours"] ?>&idAnneeSco=<?= $_GET["idAnneeSco"] ?>&idClasse=<?= $_GET["idClasse"] ?>","#leconsgauche")' style="color: red">Supprimer</a>
                           </li>
                        <?php
                        }
                        ?>
                     </ul>
                  </z>
               </td>
         <?php
            }
         }
         ?>
      </tbody>
   </table>
</div>