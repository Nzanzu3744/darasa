<?php
include_once('../model.param_access/param_utilisateur.class.php');

$util = new param_utilisateur();
$util = $util->rechercher($_GET["idutil"]);

?>


<center class="col-sm-12">
    <img style="height:65px; width:130px;" id="image" src="../images/<?= $util["photoUtilisateur"] ?>" class="img-rounded"><br>

    <span style="margin-top:0px" id="modalTitre" class="modal-title"><?= strtoupper($util['nomUtilisateur'] . ' ' . $util['postnomUtilisateur'] . ' ' . $util['prenomUtilisateur']) ?> </span>
</center>




<div class="col-sm-12 row">
    <div class="col-sm-5" style="padding:0px; margin:0px">
        <center style="font-size:20px;" class="col-sm-12">FORMULAIRE AFFECTATION GROUPE</center>

        <form id="frm_affect" name="frm_affect" style="padding:10px;margin:10px">
            <?php
            include_once("liste_groupe_ecole.php");
            ?>
        </form>
    </div>
    <div class="col-sm-2">
        <button class="btn btn-success col-sm-12" style="height:30px; margin-top:50%" onclick='Orientation2("../control.param_access/ctr_groupe.php?changeGP=true&idutil=<?= $util["idUtilisateur"] ?>","#editLeco","#frm_affect");'><span class="glyphicon glyphicon-share-alt"></span></button>
        <input class="btn btn-default col-sm-12" style="height:30px; margin-top:10%" type="button" onclick='Orientation("../control.param_access/ctr_groupe.php?nvgroupe&idutil=<?= $_GET["idutil"] ?>","#editLeco")' value="Annuler">
    </div>

    <div class="col-sm-5" style="padding:0px">
        <center style="font-size:20px; " class="col-sm-12">LISTE DE CLASSES FREQUANTEES</center>
        <div id="" style="padding:10px;margin:10px">
            <?php
            include_once("liste_groupe_aff.php");
            ?>
        </div>
    </div>
</div>