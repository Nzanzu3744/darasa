<form action="" class="form_control" id="frm_synthese" name="frm_synthese" style="margin:20px">
<center> SYNTHESE</center>
    <div class="rows" style="">
        <label for="syntEns" class="col-sm-6">
        EDUCATEUR
             <textarea id="synthEns" name="synthEns" class="textarea form-control" placeholder="Synthese Enseignant"></textarea>
            
        </label>
        <label for="synthEle" class="col-sm-6">
        ELEVE
             <textarea id="synthEle" name="synthEle" class="textarea form-control" placeholder="Synthese Elève "></textarea>
            
        </label>
        <br>
        <input id="btn_add" name="btn_add" class="btn btn-success col-sm-1 col-xs-1 col-lg-1" type="button" onclick="Orientation('control.param_access/ctr_synthese.php?ajouterSynth=true&idlc=<?=$_GET['idlc']?>&idExpl='+$('#idExpl').val(),'#synthese','#frm_synthese')" value="Valider"/>
    </div>       
<!--  --> 
</form> 