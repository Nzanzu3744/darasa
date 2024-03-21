<?php
include_once('../model.param_access/param_groupe.class.php');
include_once('../model.param_access/crs_cours.class.php');
include_once('../model.param_access/crs_prepacours.class.php');
?>
<div class="">
    <form id="frmcrs" name="frmcrs" action="../control.param_access/ctr_cours.php?ajouter.php" method="POST" enctype="multipart/form-data" class="form_control">

        <div>
            <labelle for="idPrepaCours" class=" col-sm-12"> Nom du Cours </labelle>

            <select style="width:100%" style="width:100%" id="idPrepaCours" name="idPrepaCours" type="text" class="form-control " placeholder="Nom du cours">
                <?php
                $prepacrs = new crs_prepacours();
                $prepacrs = $prepacrs->selectionner();
                $u = 0;
                foreach ($prepacrs as $sel) {
                ?>
                    <option value="<?= $sel['idPrepaCours'] ?>"><?= $sel['idPrepaCours'] . " : " . strtoupper($sel['cours']) ?></option>
                <?php
                }
                ?>
            </select>
            <labelle for="image" class=" col-sm-12">Icon</labelle>
            <input style="width:100%" id="image" name="image" accept="image/*" type="file" class=" form-control">



            <labelle for="ponderat" class=" col-sm-12">Ponderation Période</labelle>
            <input style="width:100%" id="ponderat" name="ponderat" type="text" class=" form-control">
            <p>

                <labelle for="CmtC" class=" col-sm-12"> Commentaire </labelle>
                <textarea style="width:100%; height:200px" id="CmtC" name="CmtC" type="textarea" class="form-control" placeholder="Commentair"></textarea>

        </div>

        <div style="padding-top:10px">
            <input type="submit" id="Enreg" value="Enregistre" class="btn btn-xs btn-success col-sm-5" onclick='showme("#leconsgauche","#editLeco","true");' />

        </div>
        <div id="err" name="err" style='color:red'>

        </div>

    </form>


</div>

<script>
    $(document).ready(function(e) {
        $("#frmcrs").on('submit', (function(e) {
            e.preventDefault();
            $.ajax({
                url: "../control.param_access/ctr_cours.php?avecImage=true&maClasse=<?= $_GET["maClasse"] ?>&idAnneeSco=<?= $_GET["idAnneeSco"] ?>&idAffectation=<?= $_GET["idAffectation"] ?>&idClasse=<?= $_GET["idClasse"] ?>",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {

                    $("#err").fadeOut();
                },
                success: function(data) {
                    if (data == 'invalid') {
                        // invalid file format.
                        $("#err").html("Format fichier invalide !").fadeIn();
                    } else if (data == 'champsVide') {
                        $("#err").html("Merci de completer les champs").fadeIn();
                    } else {

                        $("#editLeco").html(data).fadeIn();
                        $("#frmcrs")[0].reset();
                    }
                },
                error: function(e) {
                    $("#err").html(e).fadeIn();
                }
            });
        }));
    });
</script>