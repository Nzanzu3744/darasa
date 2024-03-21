<?php
(empty($_SESSION)) ? session_start() : '';
include_once('../model.param_access/crs_cours.class.php');
include_once('../model.param_access/param_groupe.class.php');
?>


<section class="heightSous_Fen_compose_A">
    <table class="table  table-striped table-condensed">
        </thead>
        </thead>
        <tbody>
            <?php
            $crs = new crs_cours();
            $cours = $crs->selectionnerCrsEleveByCls($_GET['idClasse'], $_GET['idAnneeSco']);
            $i = 1;
            $tr = 0;
            foreach ($cours as $selCrs) {
                $tr++;
            ?>
                <!--  --->

                <?php if ($tr == 1) {
                    echo '<tr style="margin:3px;">';
                } ?>
                <!-- <?= $i++ ?> -->
                <td class="dropdown" style="width:250px;">

                    <div role="button" style="width:250px;height:160px;" data-toggle="dropdown">
                        <img style=" width:100%;height:100px" id="image" src="../images/<?= $selCrs['url'] ?>">
                        <center><label><?= strtoupper($selCrs['cours']) . ' <i>CODE:[' . $selCrs['idCours'] . ']</i>'; ?></label></center>
                        <center style="font-size:8px; "><?= strtoupper($selCrs['ponderation']) . ' POINTS LA PERIODE' ?><br><?= strtoupper($_GET['maClasse']) . '<br>' . strtoupper($selCrs['nomUtilisateur'] . ' ' . $selCrs['postnomUtilisateur'] . ' ' . $selCrs['prenomUtilisateur']); ?></center>


                    </div>
                    <ul class="dropdown-menu" style="width:250px; margin-top:-160px">
                        <li data-toggle="modal" href="#inscri"><a href="#" onclick="showme('#leconsgauche','#editLeco','true');  Orientation('../control.param_access/ctr_lecon.php?leconsgauche_eleve&maClasse=<?= $_GET['maClasse'] ?>&idIns=<?= $_GET['idIns'] ?>&idCours=<?= $selCrs['idCours'] ?>&idCls=<?= $_GET['idClasse'] ?>','#leconsgauche','');">Liste Leçons</a></i></li>
                        <li data-toggle="modal" href="#inscri"><a href="#" onclick="showme('#leconsgauche','#editLeco','true'); Orientation('../control.param_access/ctr_devoirs.php?devoirsgauche_eleve=true&idIns=<?= $_GET['idIns'] ?>&maClasse=<?= $_GET['maClasse'] ?>&idCours=<?= $selCrs['idCours'] ?>&idClasse=<?= $_GET['idClasse'] ?>','#leconsgauche','')">Liste Devoir</a></i></li>
                        <li class="divider"></li>
                        <li><a href="#" onclick="showme('#leconsgauche','#editLeco','true');Orientation('../control.param_access/ctr_blog.php?commentaire_cours&profil=eleve&maClasse=<?= $_GET['maClasse'] ?>&idCours=<?= $selCrs['idCours'] ?>&idCls=<?= $_GET['idClasse'] ?>','#leconsgauche','');">Conversation</a></i></li>
                    </ul>
                </td>
                <?php if ($tr >= 4) {
                    $tr = 0;
                    echo "</tr>";
                } ?>
            <?php

            }
            ?>
        </tbody>
    </table>
</section>
<div class="heightSous_Fen_compose_B">
    <?php
    if ($_SESSION['doc_bulletin_afficher'] == 1) {
    ?>
        <button class="btn btn-xs btn-default pull-right tailleBtn" style="margin-right:10px; border: 1px solid blue" onclick='showme("#leconsgauche","#editLeco","true"); Orientation("../control.param_access/ctr_bulletin.php?form_bulletin=true&info=bulletin01&idClasse=<?= $_GET["idClasse"] ?>&maClasse=<?= $_GET["maClasse"] ?>&idAnneeSco=<?= $_GET["idAnneeSco"] ?>&hgt=700px","#leconsgauche","");  Orientation("../control.param_access/ctr_bulletin.php?pre_bull=true&info=bulletin01&idClasse=<?= $_GET["idClasse"] ?>&maClasse=<?= $_GET["maClasse"] ?>&idAnneeSco=<?= $_GET["idAnneeSco"] ?>&hgt=700px","#editLeco","");'> BULLETINS</button>
    <?php
    }
    if ($_SESSION['doc_carte_eleve_afficher'] == 1) {
    ?>
        <button class="btn btn-xs btn-default pull-right tailleBtn" style="margin-right:10px; border: 1px solid blue" onclick='showme("#leconsgauche","#editLeco","true"); Orientation("../control.param_access/ctr_carte_membre.php?form_carte_mbr=true&idClasse=<?= $_GET["idClasse"] ?>&maClasse=<?= $_GET["maClasse"] ?>&idAnneeSco=<?= $_GET["idAnneeSco"] ?>&hgt=700px","#leconsgauche","");  Orientation("../control.param_access/ctr_carte_membre.php?pre_carte_mbr=true&idClasse=<?= $_GET["idClasse"] ?>&maClasse=<?= $_GET["maClasse"] ?>&idAnneeSco=<?= $_GET["idAnneeSco"] ?>&hgt=700px","#editLeco","");'>CARTES</button>
    <?php
    }
    if ($_SESSION['doc_liste_eleve_afficher'] == 1) {
    ?>
        <button class="btn btn-xs btn-default pull-right tailleBtn" style="margin-right:10px; border: 1px solid blue" href="#" onclick=' Orientation("../control.param_access/ctr_classe.php?liste_eleve_cls=true&idClasse=<?= $_GET["idClasse"] ?>&maClasse=<?= $_GET["maClasse"] ?>&idAnneeSco=<?= $_GET["idAnneeSco"] ?>","#editLeco")'> ELEVES</button>
    <?php
    }
    if ($_SESSION['doc_liste_ensegant_afficher'] == 1) {
    ?>
        <button class="btn btn-xs btn-default pull-right tailleBtn" style="margin-right:10px; border: 1px solid blue" href="#" onclick='Orientation("../control.param_access/ctr_enseignant.php?liste_ensei=true&idClasse=<?= $_GET["idClasse"] ?>&maClasse=<?= $_GET["maClasse"] ?>&idAnneeSco=<?= $_GET["idAnneeSco"] ?>","#editLeco")'>ENSEIGNANTS</button>
    <?php
    }
    ?>
</div>