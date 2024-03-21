<?php
include_once("../model.param_access/org_periode.class.php");
include_once("../model.param_access/crs_cours.class.php");
$idCours = htmlspecialchars($_GET["idCours"]);
$cours = crs_cours::rechercher($idCours)->fetch();

?>
<form role="form" id="frmcrs" name="frmcrs" enctype="multipart/form-data" class="form-inline well" style="width:700px; height:450px ; font-size:12px; margin-left:25%;margin-top:1%; background:white" id="utilisa">
    <center style="margin-left:10px; font-size:20px; background: black; color:white" class="col-sm-12 "> PRE-ELABORATION QUESTIONNAIRE <?= " <b>[ " . $cours["cours"] . "]</b> à  " . $_GET["maClasse"] ?></center>
    <div class="" style="border-bottom: 1px solid red; padding: 20px;height:120px">
        <div class="col-sm-4">

            <label for="prD" class="col-sm-12">Periode du cours ? </label>
            <select id="prD" name="prD" class="form-control" style="width:100%">
                <?php
                $pr2 = new org_periode();
                $pr2 = $pr2->filtreByAnneeCls($_GET["idAnneeSco"], $_GET["idCls"]);
                foreach ($pr2 as $selPr2) {
                ?>
                    <option value="<?= $selPr2["idPeriode"] ?>"><a><?= $selPr2["periode"] ?></a><i style="color: green"><?= " | Fin: " . $selPr2["dateFin"] ?></i> </option>
                <?php

                }
                ?>

            </select>
        </div>
        <div class=" col-sm-4">
            <div>
                <label for="pondGeneral" class="col-sm-12">Ponderation maximale </label>
                <input id="pondGeneral" name="pondGeneral" type="text" style="width:100%" class="form-control" placeholder="Point Total" />
            </div>
        </div>
        <center style="font-size:20px; " id="Enreg" name="Enreg">
            <input type="button" class="btn btn-success pull-right col-sm-2" style="margin-top:10px" onclick='
            Orientation(" ../control.param_access/ctr_devoirs.php?PreTranscript&idAnneeSco=<?= $_GET["idAnneeSco"] ?>&idAffectation=<?= $_GET["idAffectation"] ?>&idClasse=<?= $_GET["idCls"] ?>&maClasse=<?= $_GET["maClasse"] ?>&&idCours=<?= $_GET["idCours"] ?>"+"&prD="+$(" #prD").val()+"&pondGeneral="+$(" #pondGeneral").val(),"#corpsPrequestion"); showme("#leconsgauche","#editLeco","true"); Orientation("../control.param_access/ctr_devoirs.php?devoirsgauche_ense=true&maClasse=<?= $_GET["maClasse"] ?>&idAffectation=<?= $_GET["idAffectation"] ?>&idCours=<?= $_GET["idCours"] ?>&idClasse=<?= $_GET["idCls"] ?>&idAnneeSco=<?= $_GET["idAnneeSco"] ?>","#leconsgauche","");' value="Transcrivez">
        </center>
    </div>
    <div style="margin-top:80px">
        <div class=" col-sm-12" id="corps_prequestion">
            <div class="col-sm-6">
                <label for="nbQT" class="col-sm-12">Question Traditionnelle ? </label>
                <input id="nbQT" style="width:100%" type="text" class="form-control">
            </div>

            <div class="col-sm-6">
                <label for="nbQC" class="col-sm-12">Question choix multiples ? </label>
                <input id="nbQC" style="width:100%" type="text" class="form-control">
            </div>

        </div>
        <div class=" col-sm-12">
            <div class="col-sm-6">
                <label for="nbQT" class="col-sm-12">Date de remise ? </label>
                <input id="dtremise" style="width:100%" type="date" class="form-control">
            </div>
            <div class="col-sm-6">
                <textarea id="idx" style="width:100%; height:55px" type="textarea" placeholder="indexation" class="form-control"></textarea>
            </div>
        </div>
    </div>
    <input id="Enreg" name="Enreg" type="button" onclick='
    Orientation(" ../control.param_access/ctr_devoirs.php?PreEb2&maClasse=<?= $_GET["maClasse"] ?>&idAffectation=<?= $_GET["idAffectation"] ?>&idCours=<?= $_GET["idCours"] ?>&nbQT="+$(" #nbQT").val()+"&nbQC="+$(" #nbQC").val()+"&dtremise="+$(" #dtremise").val()+"&prD="+$(" #prD").val()+"&idx="+$(" #idx").val()+"&pondGeneral="+$(" #pondGeneral").val(),"#editLeco"); showme("#leconsgauche","#editLeco","true"); Orientation("../control.param_access/ctr_devoirs.php?devoirsgauche_ense=true&maClasse=<?= $_GET["maClasse"] ?>&idAffectation=<?= $_GET["idAffectation"] ?>&idCours=<?= $_GET["idCours"] ?>&idClasse=<?= $_GET["idCls"] ?>&idAnneeSco=<?= $_GET["idAnneeSco"] ?>","#leconsgauche",""); ' class=" btn btn-success pull-left col-sm-4" value="OK" />
    <!-- <input onclick="Encour()" class="btn btn-default pull-right  col-sm-4" value="Annuler" type="button" /> -->

</form>