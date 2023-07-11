<form action="" class="form_control" style="margin:20px">
    <div class="rows" style="">
        <label for="Monconsig" class="col-sm-5 col-xs-5 col-lg-5 ">
        ORGANISATION DE LA SALLE/ CONSIGNE
             <textarea id="Monconsig" name="Monconsig" class="form-control" placeholder="Consigne"></textarea>
            
        </label>
        <label for="appl" class="col-sm-5 col-xs-5 col-lg-5 ">
       OBSERVATION DES CONSIGNES
            <textarea id="appli" name="appli" class="form-control" placeholder="applicabilite"></textarea>
        </label>
        <br>
        <input id="btn_add" name="btn_add" class="btn btn-success col-sm-1 col-xs-1 col-lg-1" type="button" onclick="Orientation('control.param_access/ctr_consigne.php?ajouterConsig=true&idlc=<?=$_GET['idlc']?>&idExpl='+$('#idExpl').val()+'&Monconsig='+$('#Monconsig').val()+'&appli='+$('#appli').val(),'#consigne')" value="Valider"/>
    </div>       
<!--  --> 
</form>