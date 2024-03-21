<?php
(empty($_SESSION)) ? session_start() : '';
include_once('../model.param_access/param_groupe.class.php');
include_once('../model.param_access/param_genre.class.php');
?>
<form id="frmUtis" name="frmUtis" class="form-group well" style="width:400px; height:600px;" method="POST" enctype="multipart/form-data" class="form_control">
    <center style="font-size:20px; margin-bottom:6px; color:white">FORMULAIRE MEMBRE</center>
    <label for="nom" class=" col-sm-12" style="margin:0px;"> Nom * :
        <input id="nom" name="nom" style="width:100%" style="width:100%" type="text" class="form-control " placeholder="Nom de l'utilisateur">
    </label>
    <label for="postnom" class=" col-sm-6" style="margin:0px;">
        Postnom * :
        <input id="postnom" name="postnom" style="width:100%" type="text" class="form-control" placeholder="Postnom de l'utilisateur">
    </label>

    <label for="prenom" class=" col-sm-6" style="margin:0px;">
        Prenom * :
        <input id="prenom" name="prenom" style="width:100%" type="text" class="form-control" placeholder="Prenom de l'utilisateur">
    </label>
    <label for="genre" class=" col-sm-6" style="margin:0px;">Genre * :
        <select id="genre" name="genre" class="form-control col-sm-12 col-lg-12 col-xs-12">
            <?php
            $genre = new param_genre();
            $ger = $genre->selectionner();
            $u = 0;
            foreach ($ger as $sel) {
            ?>
                <option value="<?= $sel['idGenre'] ?>"><?= $sel['idGenre'] . " : " . strtoupper($sel['genre']); ?></option>
            <?php
            }
            ?>
        </select>
    </label>

    <label for="groupe1" class=" col-sm-6" style="margin:0px;">Groupe * :
        <select id="groupe1" name="groupe1" class="form-control col-sm-12">
            <?php
            $groupe = new param_groupe();
            $grp = $groupe->selectionnerByEcole($_SESSION['monEcole']['idEcole']);
            $u = 0;
            include_once('../model.param_access/param_role.class.php');
            $role = new param_role();
            $role = $role->selectionnerDerRoleUti($_SESSION['idUtilisateur'])->fetch();
            foreach ($grp as $sel) {
                if ($role['idUtilisateur'] <= 0 and $sel['idGroupe'] <= 0) {
            ?>
                    <option value="<?= $sel['idGroupe'] ?>"><?= $sel['idGroupe'] . " : " . strtoupper($sel['groupe']) ?></option>

                <?php
                } else if ($sel['idGroupe'] > 0) {
                ?>
                    <option value="<?= $sel['idGroupe'] ?>"><?= $sel['idGroupe'] . " : " . strtoupper($sel['groupe']); ?></option>
            <?php
                }
            }
            ?>
        </select>
    </label>
    <?php
    include_once("../vue.param_access/frm_adresse.php");
    ?>

    <label for="dateNais" class=" col-sm-6" style="margin:0px;"> Date de naissance :
        <input id="dateNais" name="dateNais" type="date" class="col-sm-12 form-control">
    </label>
    <label for="lieuNais" class=" col-sm-6" style="margin:0px;">Lieu
        <input id="lieuNais" name="lieuNais" type="text" class="col-sm-12 form-control" placeholder="Lieu de naissance ">
    </label>
    <label for="nompere" class=" col-sm-6" style="margin:0px;">
        Nom du Père :
        <input id="nompere" name="nompere" style="width:100%" type="text" class="form-control" placeholder="Nom du Père">
    </label>

    <label for=" nommere" class=" col-sm-6" style="margin:0px;">
        Nom de la mère :
        <input id="nommere" name="nommere" style="width:100%" type="text" class="form-control" placeholder=" Nom de la mère :">
    </label>





    <label for="tel" class=" col-sm-6" style="margin:0px;">Télephone :
        <input style="width:100%" id="tel" name="tel" type="txt" class="form-control" placeholder="Tel de l'élève/parent">
    </label>
    <label for="mail" class=" col-sm-6" style="margin:0px;">Mail :
        <input style="width:100%" id="mail" name="mail" type="mail" class="form-control" placeholder="Mail de l'élève/parent">
    </label>
    <label for="photo" class=" col-sm-6" style="margin:0px;">Photo :
        <input style="width:100%" id="image" name="image" type="file" class=" form-control">
    </label>
    <label for="adresse" class=" col-sm-6" style="margin:0px;">Adresse :
        <input style="width:100%" id="adresse" name="adresse" type="txt" class="form-control" placeholder="Adresse">
    </label>
    <label for="nnCarteElect" class=" col-sm-6" style="margin:0px;">NN Carte electeur :
        <input style="width:100%" id="nnCarteElect" name="nnCarteElect" class="form-control" placeholder="NN Carte electeur">
    </label>

    <label for="" class=" col-sm-6" style="margin:0px;">
        <input type="submit" style="width:100%; margin-top:20px" class="btn btn-success pull-left col-sm-12" value="ENREGISTRER" />
    </label>
    <div class="col-sm-12" id="err" name="err" style='color:red'>

    </div>
</form>


<script>
    $(document).ready(function(e) {
        $("#frmUtis").on('submit', (function(e) {
            e.preventDefault();
            $.ajax({
                url: "../control.param_access/ctr_utilisateur.php?ajouterU=true&idGroupe=" + $("#groupe1").val(),
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
                        $("#frmUtis")[0].reset();
                    }
                },
                error: function(e) {
                    $("#err").html(e).fadeIn();
                }
            });
        }));
    });
</script>