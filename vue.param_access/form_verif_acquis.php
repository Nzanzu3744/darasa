<form action="control.param_access/ctr_utilisateur.php" class="form_control" style="margin:20px">
    <center> VERIFICATION DES ACQUIS</center>
    <div class="rows">
        <label for="qst" class="col-sm-5 col-xs-5 col-lg-5 ">
            QUESTION
            <textarea id="qst" name="qst" class="form-control" placeholder="QUESTION "></textarea>

        </label>
        <label for="repo" class="col-sm-5 col-xs-5 col-lg-5 ">
            REPONSES
            <textarea id="repo" name="repo" class="form-control" placeholder="REPONSE"></textarea>
        </label>
        <br>
        <input id="btn_add" name="btn_add" class="btn btn-success col-sm-1 col-xs-1 col-lg-1" type="button" onclick="Orientation('../control.param_access/ctr_verif_acquis.php?ajouterVerifAcqui=true&idlc=<?= $_GET['idlc'] ?>&idExpl='+$('#idExpl').val()+'&qst='+$('#qst').val()+'&repo='+$('#repo').val(),'#verif_acquis')" value="Valider" />
    </div>
    <!--  -->
</form>