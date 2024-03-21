           <?php
            (empty($_SESSION)) ? session_start() : '';
            include_once('../model.param_access/param_utilisateur.class.php');
            include_once('../model.param_access/param_groupe.class.php');
            ?>


           <section class="fenetre " style="height:490px;background-color: transparent;" id="content" name="content">
               <table class="table  table-striped table-condensed">


                   <?php
                    $util = new param_utilisateur();
                    $utilisateur = $util->selectionnerByIdGroupeRoleActif($_GET['idGroupe']);
                    $i = 1;
                    $tr = 0;
                    foreach ($utilisateur as $selut) {
                        $tr++;
                    ?>
                       <!--  -->

                       <?php if ($tr == 1) {
                            echo '<tr>';
                        } ?>

                       <td class="dropdown">
                           <div role="button" style="width:160px;height:160px" data-toggle="dropdown">
                               <center style="font-size: 7px;"><?= $i++ ?></center>
                               <img style=" width:100%;height:100px" id="image" src="../images/<?= $selut['photoUtilisateur'] ?>">
                               <center><label><?= strtoupper($selut['idUtilisateur']) ?></label></center>

                               <center style="font-size:8px; "><?= strtoupper($selut['nomUtilisateur'] . ' ' . $selut['postnomUtilisateur'] . ' ' . $selut['prenomUtilisateur']); ?></center>


                           </div>


                           <!--  -->



                           <ul class="dropdown-menu" style="width:160px; margin-top:-35px">
                               <center>
                                   <?php
                                    if ($_SESSION['org_inscription_afficher'] == 1) {
                                    ?>
                                       <li class="btn btn-sm btn-defaulter" style="color: blue" href="#" onclick='Orientation("../control.param_access/ctr_eleve.php?eleve&idutil=<?= $selut["idUtilisateur"] ?>","#editLeco")'><a href="#">INSCRIRE ELEVE</a></li>
                                   <?php
                                    }
                                    if ($_SESSION['org_affectation_afficher'] == 1) {
                                    ?>
                                       <li class="btn btn-sm btn-defaulter" style="color: blue" href="#" onclick=' Orientation("../control.param_access/ctr_enseignant.php?enseigna&idutil=<?= $selut["idUtilisateur"] ?>","#editLeco")'><a href="#">AFFECTER ENSEIG.</a></li>
                                   <?php
                                    }
                                    if ($_SESSION['dir_directeur_afficher'] == 1) {
                                    ?>
                                       <li class="btn btn-sm btn-defaulter" style="color: blue" href="#" onclick='Orientation("../control.param_access/ctr_directeur.php?directeur&idutil=<?= $selut["idUtilisateur"] ?>","#editLeco")'><a href="#">AFFECTER DIR.</a></li>
                                   <?php
                                    }

                                    if ($_SESSION['param_groupe_modifier'] == 1) {
                                    ?>
                                       <li class="btn btn-sm btn-defaulter" style="color: blue" href="#" onclick='Orientation("../control.param_access/ctr_groupe.php?nvgroupe&idutil=<?= $selut["idUtilisateur"] ?>","#editLeco")'><a href="#">NOUV. GROUPE</a></li>
                                   <?php
                                    }
                                    ?>


                               </center>

                           </ul>


                       </td>


                   <?php
                        if ($tr >= 8) {
                            $tr = 0;
                            echo "</tr>";
                        }
                    }
                    ?>

               </table>
           </section>
           </div>
          