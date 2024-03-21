<?php
include_once('../model.param_access/crs_devoirs.class.php');
?>


<section class="heightContSous_Fen ">
   <?php
   $idC = 0;
   if (isset($_GET['idCours'])) {
      $idC = $_GET['idCours'];
   }
   ?>
   <input id="idx" placeholder="Recherche devoir par index" type="text" class="form-control" style="width:120px; padding:6px; width:100%" onkeyup="Orientation('../control.param_access/ctr_devoirs.php?maClasse=<?= $_GET['maClasse'] ?>&idCours=<?= $_GET['idCours'] ?>&idPrepaCours=<?= $_GET['idPrepaCours'] ?>&clerech_dir='+$('#idx').val(),'#filtrer','');"></input>
   <div class="table-responsive" style="height:100%">
      <table id="filtrer" class="table table-bordered table-striped table-condensed">
         <tbody>
            <?php
            $dv = new crs_devoirs();
            $devoirs = $dv->selectionnerByPrepaCoursAll($_GET['idPrepaCours']);
            $i = 0;
            foreach ($devoirs as $seldv) {
               $i++;
            ?>
               <tr>
                  <td style="background-color: aliceblue"> [<?= $i; ?>] Code : <?= $seldv['idDevoir'] ?><br>
                     <center style="color:green">Devoirs de :<br><?= $seldv['cours']  ?><br><?= $seldv['anneeSco'] ?><br><a href='#' style='font-size:8px'><?= $seldv['nomUtilisateur'] . '  ' . $seldv['postnomUtilisateur'] . ' ' . $seldv['prenomUtilisateur'] ?></a><br><?= $seldv['indexation'] ?><br> <mark style="color:black"><?= ($seldv['actif'] != 1) ? "DEVOIR DESACTIVE" : 'ACTIVE' ?></mark></center></br>
                  </td>
                  <td style="height:100%;  background:#f2f2f2">
                     <z class="dropdown">
                        <button data-toggle="dropdown"><b class="caret ppull-right"></b></button>
                        <ul class="dropdown-menu pull-right">
                           <?php

                           $sel_C = new crs_devoirs();
                           $sel_C = $sel_C->selectionnerByCours($seldv['idCours'])->fetch();
                           ?>
                           <li data-toggle="modal" href="#inscri"><a href="#" onclick="Orientation('../control.param_access/ctr_questionnaire.php?Liredevoirs_ense=tue&maClasse=<?= $_GET['maClasse'] ?>&idcrs=<?= $sel_C['idCours'] ?>&iddv=<?= $seldv['idDevoir'] ?>','#editLeco',''); showme2('#dessoueditLeco');Orientation('../control.param_access/ctr_devoirs.php?Evalue=true&maClasse=<?= $_GET['maClasse'] ?>&idCours=<?= $sel_C['idCours'] ?>&idDevoir=<?= $seldv['idDevoir'] ?>','#dessoueditLeco','')">Lire le devoirs</a></i></li>


                        </ul>
                     </z>
                  </td>

               </tr>
            <?php
            }
            ?>
         </tbody>
      </table>
   </div>

</section>