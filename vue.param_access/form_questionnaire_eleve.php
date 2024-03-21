<!-- onkeyup='verifierchamps("../control.param_access/ctr_questionnaire.php?verif=true&idClasse=<?= $_GET["idCls"] ?>&idAnneeSco=<?= $_GET["idAnneeSco"] ?>&idCours=<?= $_GET["idCours"] ?>", "#Enreg", "#frmcrs");' -->
<?php
(empty($_SESSION)) ? session_start() : '';
include_once('../model.param_access/crs_question.class.php');
include_once('../model.param_access/crs_devoirs.class.php');
include_once('../model.param_access/crs_assertion.class.php');
include_once('../model.param_access/crs_reponset.class.php');
include_once('../model.param_access/crs_reponsec.class.php');
$pTotal = 0;
$idCls = $_GET['idClasse'];
$dev = new crs_devoirs();
$devv = $dev->rechercherr($_GET['iddv']);

$seldev = $devv->fetch();

$qst = new crs_question();
$qst = $qst->selectionnerByIdDevASC($_GET['iddv']);

?>
<div class=" table-responsive" style="height:100%">
    <div class="col-sm-12 rubaBoutonDoc">
        <input value="Imprimer" type="button" class="btn btn-xs btn-default col-sm-1 " onclick="imprimer('lcons')" />
    </div>
    <div class="form-group text-align: center; " style="width:80%; height:80%; margin:10%" id="lcons">
        <?php
        include_once('../vue.param_access/enteteDL.php');
        ?>
        <center style="width:100%; height:30px; font-size:18px;text-align:center;margin-bottom:30px;margin-top:40px;border-bottom: 1px solid black;">
            QUESTIONNAIRE DEVOIR NUMERON-----------COURS XXXXXXXXXXXXXXXXX
        </center>
        <!-- <center style="font-size:18px">COMPLEXE SCOLAIRE NOTRE DAME DE GRACES</center>
        <center>
        B.P. 923 BUNIA
        DEVOIR DE (D' ) <?= $_GET['cours'] ?> N° <?= ' ' . $seldev['idDevoir'] ?> DU <?= ' ' . $seldev['dateCreation'] ?> A REMETTRE LE <?= $seldev['dateRemise'] ?>
        </center> -->
        <!--  -->


        <?php
        $verif = new crs_assertion();
        $Cpt = 1;
        foreach ($qst as $selQst) {

            $ver = $verif->verification($selQst['idQuestion']);
            $veri = $ver->fetch();
            if (empty($veri['idAssertion'])) {

        ?>
                <form class="" id="<?= 'reponsT' . $Cpt ?>" name="<?= 'reponsT' . $Cpt ?>">
                    <div class="col-sm-12">
                        <div style="height:100%; display: flex;">
                            <div style="margin:1px; padding:5px">
                                <div style="height:60px; width:60px; border-radius: 45% 45% 45% 45%; border: 1px solid gray; font-size:14px; background:yellow; color:black; padding-left:4px;padding-top:4px;text-align: center;">
                                    Question<br>
                                    <spans>
                                        <?= $Cpt ?>
                                        </span>

                                </div>
                                <div style="font-size:30px;height:60px; width:60px;">
                                    <?= $selQst['ponderation'] ?>Pts
                                </div>
                            </div>
                            <div style="border: 1px solid rgba(145, 145, 145, 0.388);border-radius: 10% 10% 0% 0%; padding:12px;width:100%;">
                                <?= html_entity_decode($selQst['question']); ?>
                            </div>
                        </div>

                        <?php


                        $repondi = new crs_reponset();
                        $repondi = $repondi->selectionnerByQstUtiClass($selQst['idQuestion'], $_SESSION['idUtilisateur'], $idCls)->fetchAll();

                        $avoirRepo = false;
                        $reponse = '';
                        foreach ($repondi as $repondi) {
                            if ($repondi['idAnneeScoEval'] == $repondi['idAnneeScoRep'] and $repondi['idClasseEval'] == $idCls) {
                                $avoirRepo = true;
                                $reponse = $repondi['reponse'];
                            }
                        }
                        if ($avoirRepo == true) {
                        ?>

                            <div style="height:100%;">
                                <b style="color:green">REPONSE : <?= $Cpt ?> </b>
                                <div style=" padding:12px;width:100%;border-left: 10px solid green;">
                                    <?= html_entity_decode($reponse) ?>
                                    <div disabled style=" color:green"> Reponse envoyée le <?= ' ' . $repondi['dateCreation'] ?></div>
                                </div>


                            </div>
                    </div>
                    <?php
                    ?>
                </form>

            <?php
                        } else {

            ?>
                <div id=<?= 'reponsesssT' . $Cpt ?>>
                    <a style='color:red'>Veuillez repondre à la Question .<?= " " . $Cpt ?>. ci-haut.</a>
                    <textarea class="textarea" id="<?= 'repT' . $Cpt ?>" name="<?= 'repT' . $Cpt ?>"></textarea>
                    <div class="col-sm-12">
                        <input type="button" onclick="Orientation('../control.param_access/ctr_reponse.php?n=<?= $Cpt ?>&idCours=<?= $_GET['idcrs'] ?>&idIns=<?= $_GET['idIns'] ?>&idDevoir=<?= $seldev['idDevoir'] ?>&modifrep='+$('#modifrep<?= $Cpt ?>').val()+'&idQst=<?= $selQst['idQuestion'] ?>&iddv=<?= $_GET['iddv'] ?>&AjouterRepTr=true','<?= '#reponsesssT' . $Cpt ?>','<?= '#reponsT' . $Cpt ?>')" class="btn btn-success pull-right  col-sm-1" value='Valider' />
                    </div>
                </div>
                </form>
            <?php
                        }
            ?>
        <?php
                $pTotal = $pTotal + $selQst['ponderation'];
                $Cpt++;
            } else {
        ?>
            <!--  -->
            <div class="col-sm-12">
                <div style="height:100%; display: flex;">
                    <div style="margin:1px; padding:5px">
                        <div style="height:60px; width:60px; border-radius: 45% 45% 45% 45%; border: 1px solid gray; font-size:14px; background:yellow; color:black; padding-left:4px;padding-top:4px;text-align: center;">
                            Question</br>
                            <span>
                                <?= $Cpt ?>
                            </span>

                        </div>
                        <div style="font-size:30px;height:60px; width:60px;">
                            <?= $selQst['ponderation'] ?>Pts
                        </div>
                    </div>
                    <div style="border: 1px solid rgba(145, 145, 145, 0.388);border-radius: 10% 10% 0% 0%; padding:12px; width:90%;">
                        <?= html_entity_decode($selQst['question']); ?>
                    </div>
                </div>

                <!--  -->

                <?php

                $asstion = new crs_assertion();
                $Tbasstion = $asstion->selectionnerByQst($selQst['idQuestion']);
                $tur = 1;
                $repondi = new crs_reponsec();
                $repondi = $repondi->selectionnerByQstUtiClss($selQst['idQuestion'], $_SESSION['idUtilisateur'], $idCls)->fetchAll();
                $avoirRepo = false;
                $idAssertion;
                foreach ($repondi as $repondi) {
                    if ($repondi['idAnneeScoEval'] == $repondi['idAnneeScoRep'] and $repondi['idClasseEval'] == $idCls) {
                        $avoirRepo = true;
                        $idAssertion = $repondi['idAssertion'];
                    }
                }
                if ($avoirRepo == true) {
                ?>
                    <b style="color:green">REPONSE : <?= $Cpt ?> </b>
                    <div class="col-sm-12" style="padding:5px;width:100%;border-left: 10px solid green;">


                        <?php
                        foreach ($Tbasstion as $selAss) {
                            if ($tur == 1) {
                        ?>
                                <div class="col-sm-4 col-xs-4 col-lg-4 col-md-4" style="padding:0px;margin:0px">
                                    <input disabled id=<?= 'asCk1' . $Cpt ?> type="checkbox" <?= ($selAss['idAssertion'] == $idAssertion) ? 'checked' : ''; ?> />
                                    <label disabled style="width:100%" id=<?= 'ass1' . $Cpt ?> type="text" class="form-control"><?= $selAss['assertion'] ?></label>
                                </div>

                            <?php
                                $tur++;
                            } else  if ($tur == 2) {
                            ?>
                                <div class="col-sm-4 col-xs-4 col-lg-4 col-md-4" style="padding:0px;margin:0px">
                                    <input disabled id=<?= 'asCk2' . $Cpt ?> type="checkbox" <?= ($selAss['idAssertion'] == $idAssertion) ? 'checked' : ''; ?> />
                                    <label disabled style="width:100%" id=<?= 'ass2' . $Cpt ?> type="text" class="form-control"><?= $selAss['assertion'] ?></label>
                                </div>

                            <?php
                                $tur++;
                            } else  if ($tur == 3) {
                            ?>
                                <div class="col-sm-4 col-xs-4 col-lg-4 col-md-4" style="padding:0px;margin:0px">
                                    <input disabled id=<?= 'asCk3' . $Cpt ?> type="checkbox" <?= ($selAss['idAssertion'] == $idAssertion) ? 'checked' : ''; ?> />
                                    <label disabled style="width:100%" id=<?= 'ass3' . $Cpt ?> type="text" class="form-control"> <?= $selAss['assertion'] ?></label>
                                </div>

                            <?php
                                $tur++;
                            } else  if ($tur == 4) {
                            ?>
                                <div class="col-sm-4 col-xs-4 col-lg-4 col-md-4" style="padding:0px;margin:0px">
                                    <input disabled id=<?= 'asCk4' . $Cpt ?> type="checkbox" <?= ($selAss['idAssertion'] == $idAssertion) ? 'checked' : ''; ?> />
                                    <label disabled style="width:100%" id=<?= 'ass4' . $Cpt ?> type="text" class="form-control"><?= $selAss['assertion'] ?></label>
                                </div>

                            <?php
                                $tur++;
                            } else  if ($tur == 5) {
                            ?>
                                <div class="col-sm-4 col-xs-4 col-lg-4 col-md-4" style="padding:0px;margin:0px">
                                    <input disabled id=<?= 'asCk5' . $Cpt ?> type="checkbox" <?= ($selAss['idAssertion'] == $idAssertion) ? 'checked' : ''; ?> />
                                    <label disabled style="width:100%" id=<?= 'ass5' . $Cpt ?> type="text" class="form-control"><?= $selAss['assertion'] ?></label>
                                </div>

                            <?php
                                $tur++;
                            } else  if ($tur == 6) {
                            ?>
                                <div class="col-sm-4 col-xs-4 col-lg-4 col-md-4" style="padding:0px;margin:0px">
                                    <input disabled id=<?= 'asCk6' . $Cpt ?> type="checkbox" <?= ($selAss['idAssertion'] == $idAssertion) ? 'checked' : ''; ?> />
                                    <label disabled style="width:100%" id=<?= 'ass6' . $Cpt ?> type="text" class="form-control"><?= $selAss['assertion'] ?></label>
                                </div>

                        <?php
                                $tur++;
                            }
                        }
                        ?>
                        <div>
                            <label disabled style="color:green">Reponse envoyée le <?= ' ' . $repondi['dateCreation'] ?></label>
                        </div>
                    </div>
                    <?php
                } else {
                    echo "<div id='reponsesssCh" . $Cpt . "' name='reponsesssCh" . $Cpt . "'> ";
                    echo "<div class='col-sm-12' style='color:red'>Veuillez repondre à la Question " . $Cpt . " ci-haut en cochant la case au dessus de la bonne réponse.</div>";
                    foreach ($Tbasstion as $selAss) {

                        if ($tur == 1) {
                    ?>
                            <div class="col-sm-4 col-xs-4 col-lg-4 col-md-4" style="padding:0px;margin:0px">
                                <input onclick=" Orientation('../control.param_access/ctr_reponse.php?n=<?= $Cpt ?>&idCours=<?= $_GET['idcrs'] ?>&idIns=<?= $_GET['idIns'] ?>&idDevoir=<?= $seldev['idDevoir'] ?>&modifrep='+$('#modAss1<?= $Cpt ?>').val()+'&idQst=<?= $selQst['idQuestion'] ?>&AjouterRepCh=true&assertion=<?= $tur ?>&IdAss=<?= $selAss['idAssertion'] ?>','<?= '#reponsesssCh' . $Cpt ?>','')" id=<?= 'asCk1' . $Cpt ?> type="checkbox" />
                                <label disabled style="width:100%" id=<?= 'ass1' . $Cpt ?> type="text" class="form-control"> <?= $selAss['assertion'] ?></label>
                            </div>

                        <?php
                            $tur++;
                        } else  if ($tur == 2) {
                        ?>
                            <div class="col-sm-4 col-xs-4 col-lg-4 col-md-4" style="padding:0px;margin:0px">
                                <input onclick=" Orientation('../control.param_access/ctr_reponse.php?n=<?= $Cpt ?>&idCours=<?= $_GET['idcrs'] ?>&idIns=<?= $_GET['idIns'] ?>&idDevoir=<?= $seldev['idDevoir'] ?>&modifrep='+$('#modAss2<?= $Cpt ?>').val()+'&idQst=<?= $selQst['idQuestion'] ?>&AjouterRepCh=true&assertion=<?= $tur ?>&IdAss=<?= $selAss['idAssertion'] ?>','<?= '#reponsesssCh' . $Cpt ?>','')" id=<?= 'asCk2' . $Cpt ?> type="checkbox" />
                                <label disabled style="width:100%" id=<?= 'ass2' . $Cpt ?> type="text" class="form-control"><?= $selAss['assertion'] ?> </label>
                            </div>

                        <?php
                            $tur++;
                        } else  if ($tur == 3) {
                        ?>
                            <div class="col-sm-4 col-xs-4 col-lg-4 col-md-4" style="padding:0px;margin:0px">
                                <input onclick=" Orientation('../control.param_access/ctr_reponse.php?n=<?= $Cpt ?>&idCours=<?= $_GET['idcrs'] ?>&idIns=<?= $_GET['idIns'] ?>&idDevoir=<?= $seldev['idDevoir'] ?>&modifrep='+$('#modAss3<?= $Cpt ?>').val()+'&idQst=<?= $selQst['idQuestion'] ?>&AjouterRepCh=true&assertion=<?= $tur ?>&IdAss=<?= $selAss['idAssertion'] ?>','<?= '#reponsesssCh' . $Cpt ?>','')" id=<?= 'asCk3' . $Cpt ?> type="checkbox" />
                                <label disabled style="width:100%" id=<?= 'ass3' . $Cpt ?> type="text" class="form-control"> <?= $selAss['assertion'] ?></label>
                            </div>

                        <?php
                            $tur++;
                        } else  if ($tur == 4) {
                        ?>
                            <div class="col-sm-4 col-xs-4 col-lg-4 col-md-4" style="padding:0px;margin:0px">
                                <input onclick=" Orientation('../control.param_access/ctr_reponse.php?n=<?= $Cpt ?>&idCours=<?= $_GET['idcrs'] ?>&idIns=<?= $_GET['idIns'] ?>&idDevoir=<?= $seldev['idDevoir'] ?>&modifrep='+$('#modAss4<?= $Cpt ?>').val()+'&idQst=<?= $selQst['idQuestion'] ?>&AjouterRepCh=true&assertion=<?= $tur ?>&IdAss=<?= $selAss['idAssertion'] ?>','<?= '#reponsesssCh' . $Cpt ?>','')" id=<?= 'asCk4' . $Cpt ?> type="checkbox" />
                                <label disabled style="width:100%" id=<?= 'ass4' . $Cpt ?> type="text" class="form-control"><?= $selAss['assertion'] ?></label>
                            </div>

                        <?php
                            $tur++;
                        } else  if ($tur == 5) {
                        ?>
                            <div class="col-sm-4 col-xs-4 col-lg-4 col-md-4" style="padding:0px;margin:0px">
                                <input onclick=" Orientation('../control.param_access/ctr_reponse.php?n=<?= $Cpt ?>&idCours=<?= $_GET['idcrs'] ?>&idIns=<?= $_GET['idIns'] ?>&idDevoir=<?= $seldev['idDevoir'] ?>&modifrep='+$('#modAss5<?= $Cpt ?>').val()+'&idQst=<?= $selQst['idQuestion'] ?>&AjouterRepCh=true&assertion=<?= $tur ?>&IdAss=<?= $selAss['idAssertion'] ?>','<?= '#reponsesssCh' . $Cpt ?>','')" id=<?= 'asCk5' . $Cpt ?> type="checkbox" />
                                <label disabled style="width:100%" id=<?= 'ass5' . $Cpt ?> type="text" class="form-control"><?= $selAss['assertion'] ?></label>
                            </div>

                        <?php
                            $tur++;
                        } else  if ($tur == 6) {
                        ?>
                            <div class="col-sm-4 col-xs-4 col-lg-4 col-md-4" style="padding:0px;margin:0px">
                                <input onclick=" Orientation('../control.param_access/ctr_reponse.php?n=<?= $Cpt ?>&idCours=<?= $_GET['idcrs'] ?>&idIns=<?= $_GET['idIns'] ?>&idDevoir=<?= $seldev['idDevoir'] ?>&modifrep='+$('#modAss6<?= $Cpt ?>').val()+'&idQst=<?= $selQst['idQuestion'] ?>&AjouterRepCh=true&assertion=<?= $tur ?>&IdAss=<?= $selAss['idAssertion'] ?>','<?= '#reponsesssCh' . $Cpt ?>','')" id=<?= 'asCk6' . $Cpt ?> type="checkbox" />
                                <label disabled style="width:100%" id=<?= 'ass6' . $Cpt ?> type="text" class="form-control"><?= $selAss['assertion'] ?></label>
                            </div>

                <?php
                            $tur++;
                        }
                    }

                    echo '</div>';
                }
                $pTotal = $pTotal + $selQst['ponderation'];
                ?>
                <div class="col-sm-12">
                    <hr style="background:4px solid red">
                </div>
            </div>
    </div>
<?php
                $Cpt++;
            }
        }
?>
<div class="col-sm-12" style="background-color: gray;">
    <mark> NB :<i>La Validation est authomatique après selection de l'assertion</i></mark><br>
    <mark>Ponderation Total : <?= $pTotal ?>_Point(s)</mark>
</div>

<script>
    $(function() {
        $('.textarea').summernote()
    })
</script>