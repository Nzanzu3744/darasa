<form action="control.param_access/ctr_utilisateur.php" class="form_control" style="margin:20px">
    <div class="rows">
        <label for="quest" class="col-sm-5 col-xs-5 col-lg-5 ">
            QUESTION
            <textarea id="quest" name="quest" class="form-control" placeholder="Question"></textarea>

        </label>
        <label for="repons" class="col-sm-5 col-xs-5 col-lg-5 ">
            REPONSE
            <textarea id="repons" name="repons" class="form-control" placeholder="Reponse"></textarea>
        </label>
        <br>
        <input id="btn_add" name="btn_add" class="btn btn-success col-sm-1 col-xs-1 col-lg-1" type="button" onclick="Orientation('../control.param_access/ctr_verif_connaissence.php?ajouterRev=true&idlc=<?= $_GET['idlc'] ?>&idExpl='+$('#idExpl').val()+'&quest='+$('#quest').val()+'&repons='+$('#repons').val(),'#verif_con')" value="Valider" />
    </div>
    <!--  -->
</form>