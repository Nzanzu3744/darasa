<?php
(empty($_SESSION)) ? session_start() : '';
include_once('../model.param_access/crs_cours.class.php');
include_once('../model.param_access/param_groupe.class.php');
?>


<section class="heightSous_Fen_compose_A">
    <div id='test09' name='test09'></div>
    <table class="table  table-striped table-condensed">
        </thead>
        </thead>
        <tbody>
            <?php
            $crs = new crs_cours();
            $cours = $crs->selectionnerCrsByClsAnn($_GET['idClasse'], $_GET['idAnneeSco']);
            $i = 1;
            $tr = 0;
            $idcours = 0;
            foreach ($cours as $selCrs) {
                $tr++;
            ?>
                <?php if ($tr == 1) {
                    echo '<tr style="margin:3px;">';
                } ?>
                <!-- <?= $i++ ?> -->
                <td class="dropdown" style="width:250px;">
                    <div role="button" style="width:250px;height:160px" data-toggle="dropdown" onclick="Orientation('../control.param_access/ctr_co_animateur.php?pre_coa&info=coanimation&idClasse=<?= $_GET['idClasse'] ?>&idCours=<?= $selCrs['idCours'] ?>','#fenetre3')">
                        <img style=" width:100%;height:100px" id="image" src="../images/<?= $selCrs['url'] ?>">
                        <center><label><?= strtoupper($selCrs['cours']) . ' <i>CODE:[' . $selCrs['idCours'] . ']</i>'; ?></label></center>
                        <center style="font-size:8px "><?= strtoupper($_GET['maClasse']) . '<br>' . strtoupper($selCrs['nomUtilisateur'] . ' ' . $selCrs['postnomUtilisateur'] . ' ' . $selCrs['prenomUtilisateur']); ?></center>
                    </div>
                    <ul class="dropdown-menu" style="width:250px; margin-top:-160px">
                        <li class=" dropdown-submenu">
                            <a tabindex="-1" href="#">Lecon<span class="glyphicon glyphiconlist-alt"></span> </a>
                            <ul class="XYT">
                                <li><a href="#" onclick="showme('#leconsgauche','#editLeco','true'); Orientation('../control.param_access/ctr_lecon.php?leconsgauche_dir&idPromotion=<?= $_GET['idPromotion'] ?>&maClasse=<?= $_GET['maClasse'] ?>&idCours=<?= $selCrs['idCours'] ?>&idCls=<?= $_GET['idClasse'] ?>&idAnneeSco=<?= $_GET['idAnneeSco'] ?>','#leconsgauche','');">Liste Leçons</a></i></li>
                                <li><a href="#" onclick="showme('#leconsgauche','#editLeco','true'); Orientation('../control.param_access/ctr_lecon.php?rechercheGauche_dir&idPromotion=<?= $_GET['idPromotion'] ?>&maClasse=<?= $_GET['maClasse'] ?>&idPrepaCours=<?= $selCrs['idPrepaCours'] ?>&idCours=<?= $selCrs['idCours'] ?>&idCls=<?= $_GET['idClasse'] ?>','#leconsgauche','')">Recherche autres lecons</a></i></li>
                        </li>
                    </ul>
                    </li>
                    <li class=" dropdown-submenu">
                        <a tabindex="-1" href="#">Devoir<span class="glyphicon glyphiconlist-alt"></span> </a>
                        <ul class="XYT">
                            <li><a href="#" onclick="showme('#leconsgauche','#editLeco','true'); Orientation('../control.param_access/ctr_devoirs.php?devoirsgauche_dir=true&idPromotion=<?= $_GET['idPromotion'] ?>&maClasse=<?= $_GET['maClasse'] ?>&idCours=<?= $selCrs['idCours'] ?>&idCls=<?= $_GET['idClasse'] ?>&idAnneeSco=<?= $_GET['idAnneeSco'] ?>','#leconsgauche','')">Liste Devoir</a></i></li>
                            <li><a href="#" onclick="showme('#leconsgauche','#editLeco','true'); Orientation('../control.param_access/ctr_devoirs.php?rechercheGauche_dir&idPromotion=<?= $_GET['idPromotion'] ?>&maClasse=<?= $_GET['maClasse'] ?>&idPrepaCours=<?= $selCrs['idPrepaCours'] ?>&idCours=<?= $selCrs['idCours'] ?>&idCls=<?= $_GET['idClasse'] ?>','#leconsgauche','')">Recherche autres Devoirs</a></i></li>
                        </ul>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#" onclick="showme('#leconsgauche','#editLeco','true');Orientation('../control.param_access/ctr_blog.php?commentaire_cours&profil=direct&maClasse=<?= $_GET['maClasse'] ?>&idCours=<?= $selCrs['idCours'] ?>&idCls=<?= $_GET['idClasse'] ?>','#leconsgauche','');">Conversation</a></i>
                    </li>
                    <li class="divider"></li>
                    <li class=" dropdown-submenu">
                        <a tabindex="-1" href="#">Rapports<span class="glyphicon glyphiconlist-alt"></span> </a>
                        <ul class="XYT">
                            <li> <a id="charge" href="#" onmousedown="Orientation('../control.param_access/ctr_rapport.php?grille_remise=true&maClasse=<?= $_GET['maClasse'] ?>&idClasse=<?= $_GET['idClasse'] ?>&idCours=<?= $selCrs['idCours'] ?>&idAnneeSco=<?= $_GET['idAnneeSco'] ?>&idCls=<?= $_GET['idClasse'] ?>','#editLeco','')" data-toggle="modal" href="#infos"> Grille Remise </a></li>
                            <li> <a id="charge" href="#" onmousedown="Orientation('../control.param_access/ctr_rapport.php?grille_Point=true&maClasse=<?= $_GET['maClasse'] ?>&idClasse=<?= $_GET['idClasse'] ?>&idCours=<?= $selCrs['idCours'] ?>&idAnneeSco=<?= $_GET['idAnneeSco'] ?>&idCls=<?= $_GET['idClasse'] ?>','#editLeco','')" data-toggle="modal" href="#infos"> Grille de Points</a></li>
                            <li> <a id="charge" href="#" onmousedown="Orientation('../control.param_access/ctr_rapport.php?grille_ltr=true&maClasse=<?= $_GET['maClasse'] ?>&idClasse=<?= $_GET['idClasse'] ?>&idCours=<?= $selCrs['idCours'] ?>&idAnneeSco=<?= $_GET['idAnneeSco'] ?>&idCls=<?= $_GET['idClasse'] ?>','#editLeco','')"> Grille de Lecteurs </a></li>
                        </ul>
                    </li>
                    <li class="divider"></li>
                    <li> <a data-toggle="modal" href="#coanimation"> Co-Animation </a></li>
                    <li class="divider"></li>

                    <?php
                    if ($_SESSION['crs_cours_supprimer'] == 1) {
                    ?>
                        <li><a href="#" style="color:red" onclick="Orientation('../control.param_access/ctr_cours.php?supCrs=true&maClasse=<?= $_GET['maClasse'] ?>&idAnneeSco=<?= $_GET['idAnneeSco'] ?>&idClasse=<?= $_GET['idClasse'] ?>&idCrs=<?= $selCrs['idCours'] ?>&fct=dir','#editLeco','')">Supprimer</a></i></li>
                        </li>
                    <?php
                    }
                    ?>

                    </ul>


                </td>
                <?php if ($tr >= 4) {
                    $tr = 0;
                    echo "</tr>";
                }
                ?>
            <?php


                $idcours = $selCrs['idCours'];
            }
            ?>
            <!-- </tr> -->
        </tbody>
    </table>

</section>
<div class="heightSous_Fen_compose_B">




    <?php
    if ($_SESSION['doc_bulletin_afficher'] == 1) {
    ?>
        <button class="btn btn-xs btn-default pull-right tailleBtn" style="margin-right:10px; border: 1px solid green" onclick='showme("#leconsgauche","#editLeco","true"); Orientation("../control.param_access/ctr_bulletin.php?form_bulletin=true&info=bulletin01&idClasse=<?= $_GET["idClasse"] ?>&maClasse=<?= $_GET["maClasse"] ?>&idAnneeSco=<?= $_GET["idAnneeSco"] ?>&hgt=700px","#leconsgauche","");  Orientation("../control.param_access/ctr_bulletin.php?pre_bull=true&info=bulletin01&idClasse=<?= $_GET["idClasse"] ?>&maClasse=<?= $_GET["maClasse"] ?>&idAnneeSco=<?= $_GET["idAnneeSco"] ?>&hgt=700px","#editLeco","");'> BULLETINS</button>
    <?php
    }
    if ($_SESSION['doc_carte_eleve_afficher'] == 1) {
    ?>
        <button class="btn btn-xs btn-default pull-right tailleBtn" style="margin-right:10px; border: 1px solid green" onclick='showme("#leconsgauche","#editLeco","true");  Orientation("../control.param_access/ctr_carte_membre.php?pre_carte_mbr=true&idClasse=<?= $_GET["idClasse"] ?>&maClasse=<?= $_GET["maClasse"] ?>&idAnneeSco=<?= $_GET["idAnneeSco"] ?>&hgt=700px","#leconsgauche",""); Orientation("../control.param_access/ctr_carte_membre.php?pre_carte_mbr=true&idClasse=<?= $_GET["idClasse"] ?>&maClasse=<?= $_GET["maClasse"] ?>&idAnneeSco=<?= $_GET["idAnneeSco"] ?>&hgt=700px","#editLeco","");'>CARTES </button>
    <?php
    }
    if ($_SESSION['doc_liste_eleve_afficher'] == 1) {
    ?>
        <button class="btn btn-xs btn-default pull-right tailleBtn" style="margin-right:10px; border: 1px solid green" href="#" onclick=' Orientation("../control.param_access/ctr_classe.php?liste_eleve_cls=true&idClasse=<?= $_GET["idClasse"] ?>&maClasse=<?= $_GET["maClasse"] ?>&idAnneeSco=<?= $_GET["idAnneeSco"] ?>","#editLeco")'> ELEVES</button>
    <?php
    }
    if ($_SESSION['doc_liste_ensegant_afficher'] == 1) {
    ?>
        <button class="btn btn-xs btn-default pull-right tailleBtn" style="margin-right:10px; border: 1px solid green" href="#" onclick='Orientation("../control.param_access/ctr_enseignant.php?liste_ensei=true&idClasse=<?= $_GET["idClasse"] ?>&maClasse=<?= $_GET["maClasse"] ?>&idAnneeSco=<?= $_GET["idAnneeSco"] ?>","#editLeco")'>ENSEIGNANTS</button>
    <?php
    }
    ?>
</div>