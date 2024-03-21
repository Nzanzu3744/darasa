<?php
include_once('../model.param_access/param_groupe.class.php');
?>
<div class="heightContSous_Fen">

    <!-- <center class="col-sm-12 titres" style="font-size:20px">REDACTION D'UNE LECON <?= " <b>[ " . $_GET['cours'] . "]</b> à  " . $_GET['maClasse'] ?> (COTE ENSEIGNANT) XXXXXXXXXXXXXXX</center> -->


    <form class="form-inline" style="width:100%; height:100%" id="lecon1">
        <div class="col-sm-12 rubaBoutonDoc">

            <input class="btn btn-xs btn-default pull-left col-sm-1" value="Nouv. lecon" type="button" onclick='Orientation("../control.param_access/ctr_lecon.php?premiF&maClasse=<?= $_GET["maClasse"] ?>&idCours=<?= $_GET["idCours"] ?>","#editLeco","");Orientation("../control.param_access/ctr_lecon.php?leconsgauche_ense&maClasse=<?= $_GET["maClasse"] ?>&idCours=<?= $_GET["idCours"] ?>","#leconsgauche","");' />
            <input id="btn_enreg_lecon" value="Enregistrer" type="button" class="btn btn-xs btn-default pull-left  col-sm-1" onclick='Orientation("../control.param_access/ctr_lecon.php?ajouterL=true&LireLecon_ense=true&maClasse=<?= $_GET["maClasse"] ?>&type=1&idCours=<?= $_GET["idCours"] ?>&","#editLeco","#lecon1");Orientation("../control.param_access/ctr_lecon.php?leconsgauche_ense&maClasse=<?= $_GET["maClasse"] ?>&idCours=<?= $_GET["idCours"] ?>","#leconsgauche","");' />

            <!-- <input value="Fiche d'Exploi.." type="button" class="btn btn-xs btn-default pull-left  col-sm-2" onclick="
        Orientation('../control.param_access/ctr_lecon.php?maClasse=<?= $_GET['maClasse'] ?>&tlecon='+$('#tlecon').val()+'&idlc='+$('#idlc').val()+'&cours=<?= $_GET['cours'] ?>&idCours=<?= $_GET['idCours'] ?>&ajouterL=true','#iddelalecon','#lecon');
        Orientation('../control.param_access/ctr_exploitation.php?sous_dmn=true&info=sous_dmn','#fenetre2');
        Orientation('../control.param_access/ctr_exploitation.php?dsc=true&info=dsc','#fenetre3');
        Orientation('../control.param_access/ctr_exploitation.php?FicheExp=true&maClasse=<?= $_GET['maClasse'] ?>&tlecon='+$('#tlecon').val()+'&idCours=<?= $_GET['idCours'] ?>&cours=<?= $_GET['cours'] ?>&idlc='+$('#idlc').val(),'#editLeco');" /> -->
        </div>
        <div class="form-group text-align: center;" style="width:100%; height:100%; padding:50px" id="maLc">
            <?php
            include_once('../vue.param_access/enteteDL.php');
            ?>
            <input id="tlecon" name="tlecon" type="text" class="titreLecon" placeholder="Titre de la lecon" />
            <div class="form-group text-align: center;" style="width:100%; height:100%">
                <textarea id="lcn" name="lcn" class="textarea" style="width:9%; height:500px"></textarea>
            </div>
        </div>
    </form>
</div>
<script>
    $(function() {
        $('.textarea').summernote()
    })
</script>