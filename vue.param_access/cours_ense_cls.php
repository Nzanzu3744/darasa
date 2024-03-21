<?php
(empty($_SESSION)) ? session_start() : "";
include_once("../model.param_access/crs_cours.class.php");
include_once("../model.param_access/param_groupe.class.php");
?>


<section class="heightSous_Fen_compose_A ">
    <div id="test09" name="test09"></div>
    <table class="table  table-striped table-condensed">
        </thead>
        </thead>
        <tbody>
            <?php
            $crs = new crs_cours();
            $cours = $crs->selectionnerCrsByUtClsAnn($_SESSION["idUtilisateur"], $_GET["idClasse"], $_GET["idAnneeSco"]);
            $i = 1;
            $tr = 0;
            $idcours = 0;
            foreach ($cours as $selCrs) {
                $tr++;
            ?>
                <!--  --->

                <?php if ($tr == 1) {
                    echo "<tr style='margin:3px;'>";
                } ?>
                <!-- <?= $i++ ?> -->
                <td class="dropdown" style="width:250px;">

                    <div role="button" style="width:250px;height:160px" data-toggle="dropdown" onclick='Orientation("../control.param_access/ctr_co_animateur.php?pre_coa&info=coanimation&idClasse=<?= $_GET["idClasse"] ?>&idCours=<?= $selCrs["idCours"] ?>&idAffectation=<?= $_GET["idAffectation"] ?>","#fenetre3");'>
                        <img style=" width:100%;height:100px" id="image" src="../images/<?= $selCrs["url"] ?>">
                        <center><label><?= strtoupper($selCrs["cours"]) . " <i>CODE:[" . $selCrs["idCours"] . "]</i>"; ?></label></center>

                        <center style="font-size:8px; "><?= strtoupper($selCrs["ponderation"]) . " POINTS LA PERIODE" ?><br><?= strtoupper($_GET["maClasse"]) . "<br>" . strtoupper($selCrs["nomUtilisateur"] . " " . $selCrs["postnomUtilisateur"] . " " . $selCrs["prenomUtilisateur"]); ?></center>
                    </div>
                    <ul class="dropdown-menu" style="width:250px; margin-top:-160px">
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Lecon<span class="glyphicon glyphiconlist-alt"></span> </a>
                            <ul class="XYT">
                                <li><a href="#" onclick='showme("#leconsgauche","#editLeco","true"); Orientation("../control.param_access/ctr_lecon.php?premiF&maClasse=<?= $_GET["maClasse"] ?>&idCours=<?= $selCrs["idCours"] ?>&idCls=<?= $_GET["idClasse"] ?>","#editLeco");Orientation("../control.param_access/ctr_lecon.php?leconsgauche_ense&maClasse=<?= $_GET["maClasse"] ?>&idCours=<?= $selCrs["idCours"] ?>&idCls=<?= $_GET["idClasse"] ?>","#leconsgauche");'>Nouvelle Leçon</a></i></li>
                                <li>
                                    <a href="#" onclick='showme("#leconsgauche","#editLeco","true"); Orientation("../control.param_access/ctr_lecon_video.php?importVid&maClasse=<?= $_GET["maClasse"] ?>&idCours=<?= $selCrs["idCours"] ?>&idCls=<?= $_GET["idClasse"] ?>","#editLeco");'>Impoter Video </a></i>
                                </li>
                                <li>
                                    <a href="#" onclick='showme("#leconsgauche","#editLeco","true"); Orientation("../control.param_access/ctr_lecon_pdf.php?importPdf&maClasse=<?= $_GET["maClasse"] ?>&idCours=<?= $selCrs["idCours"] ?>&idCls=<?= $_GET["idClasse"] ?>","#editLeco");'>Impoter PDF </a></i>
                                </li>
                                <li>
                                    <a href="#" onclick='showme("#leconsgauche","#editLeco","true");Orientation("../control.param_access/ctr_blog.php?commentaire_cours&profil=ense&maClasse=<?= $_GET["maClasse"] ?>&idCours=<?= $selCrs["idCours"] ?>&idCls=<?= $_GET["idClasse"] ?>","#leconsgauche"); Orientation("../control.param_access/ctr_lecon_stream.php?stream&maClasse=<?= $_GET["maClasse"] ?>&idCours=<?= $selCrs["idCours"] ?>&idCls=<?= $_GET["idClasse"] ?>","#editLeco");'>Streaming </a></i>
                                </li>

                                <li><a href="#" onclick='showme("#leconsgauche","#editLeco","true"); Orientation("../control.param_access/ctr_lecon.php?rechercheGauche_ense&maClasse=<?= $_GET["maClasse"] ?>&idPrepaCours=<?= $selCrs["idPrepaCours"] ?>&idCours=<?= $selCrs["idCours"] ?>&idCls=<?= $_GET["idClasse"] ?>","#leconsgauche","")'>Recherche autres lecons</a></i></li>
                                <li class="divider"></li>
                                <li><a href="#" onclick='showme("#leconsgauche","#editLeco","true"); Orientation("../control.param_access/ctr_lecon.php?leconsgauche_ense&maClasse=<?= $_GET["maClasse"] ?>&idCours=<?= $selCrs["idCours"] ?>&idCls=<?= $_GET["idClasse"] ?>&idAffectation=<?= $_GET["idAffectation"] ?>","#leconsgauche");'>Liste Leçons</a></i></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#"><span class="glyphicon glyphiconlist-alt"></span> Devoir</a>
                            <ul class="XYT">
                                <li><a href="#" onclick='Orientation("../control.param_access/ctr_devoirs.php?NvDevoi=tue&idAnneeSco=<?= $_GET["idAnneeSco"] ?>&idCls=<?= $_GET["idClasse"] ?>&idAnneeSco=<?= $_GET["idAnneeSco"] ?>&idAffectation=<?= $_GET["idAffectation"] ?>&maClasse=<?= $_GET["maClasse"] ?>&idCours=<?= $selCrs["idCours"] ?>&idAffectation=<?= $_GET["idAffectation"] ?>","#editLeco");'>Nouveau Devoir</a></i></li>
                                <li><a href="#" onclick='showme("#leconsgauche","#editLeco","true"); Orientation("../control.param_access/ctr_devoirs.php?rechercheGauche_ense&maClasse=<?= $_GET["maClasse"] ?>&idPrepaCours=<?= $selCrs["idPrepaCours"] ?>&idCours=<?= $selCrs["idCours"] ?>&idCls=<?= $_GET["idClasse"] ?>&idAnneeSco=<?= $_GET["idAnneeSco"] ?>","#leconsgauche","")'>Recherche autres Devoirs</a></i></li>
                                <li class="divider"></li>
                                <li><a href="#" onclick='showme("#leconsgauche","#editLeco","true"); Orientation("../control.param_access/ctr_devoirs.php?devoirsgauche_ense=true&maClasse=<?= $_GET["maClasse"] ?>&idCours=<?= $selCrs["idCours"] ?>&idAnneeSco=<?= $_GET["idAnneeSco"] ?>&idClasse=<?= $_GET["idClasse"] ?>&idAffectation=<?= $_GET["idAffectation"] ?>","#leconsgauche","")'>Liste Devoirs</a></i></li>
                            </ul>

                        <li class="divider"></li>
                        <li><a href="#" onclick='showme("#leconsgauche","#editLeco","true");Orientation("../control.param_access/ctr_blog.php?commentaire_cours&profil=ense&maClasse=<?= $_GET["maClasse"] ?>&idCours=<?= $selCrs["idCours"] ?>&idCls=<?= $_GET["idClasse"] ?>","#leconsgauche");'>Conversation</a></i></li>
                        <li class="divider"></li>



                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#"><span class="glyphicon glyphiconlist-alt"></span> Rapports</a>
                            <ul class="XYT">
                                <li> <a href="#" onclick='Orientation(" ../control.param_access/ctr_rapport.php?grille_remise=true&maClasse=<?= $_GET["maClasse"] ?>&idClasse=<?= $_GET["idClasse"] ?>&idCours=<?= $selCrs["idCours"] ?>&idAnneeSco=<?= $_GET["idAnneeSco"] ?>&idCls=<?= $_GET["idClasse"] ?>","#editLeco","")'> Grille Remise </a></li>
                                <li> <a href="#" onclick='Orientation(" ../control.param_access/ctr_rapport.php?grille_Point=true&maClasse=<?= $_GET["maClasse"] ?>&idClasse=<?= $_GET["idClasse"] ?>&idCours=<?= $selCrs["idCours"] ?>&idAnneeSco=<?= $_GET["idAnneeSco"] ?>&idCls=<?= $_GET["idClasse"] ?>","#editLeco","")'> Grille de Points </a></li>
                                <li> <a href="#" onclick='Orientation(" ../control.param_access/ctr_rapport.php?grille_ltr=true&maClasse=<?= $_GET["maClasse"] ?>&idClasse=<?= $_GET["idClasse"] ?>&idCours=<?= $selCrs["idCours"] ?>&idAnneeSco=<?= $_GET["idAnneeSco"] ?>&idCls=<?= $_GET["idClasse"] ?>","#editLeco","")'> Grille de Lecteurs </a></li>
                            </ul>

                        <li> <a data-toggle="modal" href="#coanimation"> Co-Animation </a></li>
                        <li class="divider"></li>

                        <?php
                        if ($_SESSION["crs_cours_supprimer"] == 1) {
                        ?>
                            <li><a href="#" style="color:red" onclick='Orientation(" ../control.param_access/ctr_cours.php?supCrs=true&idAffectation=<?= $_GET["idAffectation"] ?>&maClasse=<?= $_GET["maClasse"] ?>&idAnneeSco=<?= $_GET["idAnneeSco"] ?>&idClasse=<?= $_GET["idClasse"] ?>&idCrs=<?= $selCrs["idCours"] ?>&fct=ense","#editLeco","")'>Supprimer</a></i></li>
                        <?php
                        }
                        ?>
                        </li>

                    </ul>


                </td>
                <?php if ($tr >= 4) {
                    $tr = 0;
                    echo "</tr>";
                } ?>
            <?php
                $idcours = $selCrs["idCours"];
            }
            ?>
        </tbody>
    </table>


</section>
<div class="heightSous_Fen_compose_B">
    <?php
    if ($_SESSION["crs_cours_ajouter"] == 1) {
    ?>
        <button class="btn btn-xs btn-default pull-right tailleBtn" style="margin-right:10px; border: 1px solid red" onclick='showme("#leconsgauche","#editLeco","true"); Orientation("../control.param_access/ctr_cours.php?idClasse=<?= $_GET["idClasse"] ?>&idCours=<?= $idcours ?>&idAnneeSco=<?= $_GET["idAnneeSco"] ?>&idAffectation=<?= $_GET["idAffectation"] ?>&maClasse=<?= $_GET["maClasse"] ?>&courssgauche","#leconsgauche")'> NOUVEAU COURS</button>

    <?php
    }
    if ($_SESSION["doc_bulletin_afficher"] == 1) {
    ?>
        <button class="btn btn-xs btn-default pull-right tailleBtn" style="margin-right:10px; border: 1px solid red" href="#" onclick='showme("#leconsgauche","#editLeco","true"); Orientation("../control.param_access/ctr_bulletin.php?form_bulletin=true&info=bulletin01&idClasse=<?= $_GET["idClasse"] ?>&maClasse=<?= $_GET["maClasse"] ?>&idAnneeSco=<?= $_GET["idAnneeSco"] ?>&hgt=700px","#leconsgauche","");Orientation("../control.param_access/ctr_bulletin.php?pre_bull=true&info=bulletin01&idClasse=<?= $_GET["idClasse"] ?>&maClasse=<?= $_GET["maClasse"] ?>&idAnneeSco=<?= $_GET["idAnneeSco"] ?>&hgt=800px&idAffectation=<?= $_GET["idAffectation"] ?>","#editLeco");'> BULLETINS</button>
    <?php
    }
    if ($_SESSION["doc_carte_eleve_afficher"] == 1) {
    ?>
        <button class="btn btn-xs btn-default pull-right tailleBtn" style="margin-right:10px; border: 1px solid red" href="#" onclick=' showme("#leconsgauche","#editLeco","true"); Orientation("../control.param_access/ctr_carte_membre.php?pre_carte_mbr=true&idClasse=<?= $_GET["idClasse"] ?>&maClasse=<?= $_GET["maClasse"] ?>&idAnneeSco=<?= $_GET["idAnneeSco"] ?>&hgt=800px&idAffectation=<?= $_GET["idAffectation"] ?>","#editLeco");Orientation("../control.param_access/ctr_carte_membre.php?form_carte_mbr=true&idClasse=<?= $_GET["idClasse"] ?>&maClasse=<?= $_GET["maClasse"] ?>&idAnneeSco=<?= $_GET["idAnneeSco"] ?>&hgt=800px&idAffectation=<?= $_GET["idAffectation"] ?>","#leconsgauche");''> CARTES</button>
    <?php
    }
    if ($_SESSION["doc_liste_eleve_afficher"] == 1) {
    ?>
        <button class="btn btn-xs btn-default pull-right tailleBtn" style="margin-right:10px; border: 1px solid red" href="#" onclick=' Orientation(" ../control.param_access/ctr_classe.php?liste_eleve_cls=true&idClasse=<?= $_GET["idClasse"] ?>&maClasse=<?= $_GET["maClasse"] ?>&idAnneeSco=<?= $_GET["idAnneeSco"] ?>&idAffectation=<?= $_GET["idAffectation"] ?>","#editLeco")'> ELEVES</button>
    <?php
    }
    if ($_SESSION["doc_liste_ensegant_afficher"] == 1) {
    ?>
        <button class="btn btn-xs btn-default pull-right tailleBtn" style="margin-right:10px; border: 1px solid red" href="#" onclick='Orientation(" ../control.param_access/ctr_enseignant.php?liste_ensei=true&idClasse=<?= $_GET["idClasse"] ?>&maClasse=<?= $_GET["maClasse"] ?>&idAnneeSco=<?= $_GET["idAnneeSco"] ?>&idAffectation=<?= $_GET["idAffectation"] ?>","#editLeco")'>ENSEIGNANTS</button>
    <?php
    }
    ?>
</div>