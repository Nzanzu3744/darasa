<form action="control.param_access/ctr_utilisateur.php" class="form_control" style="margin:20px">
    <div class="rows" style="">
        <label for="mot" class="col-sm-5 col-xs-5 col-lg-5 ">
        MOTIVATIONS
             <textarea id="mot" name="mot" class="form-control" placeholder="Motivation"></textarea>
            
        </label>
        <label for="comp" class="col-sm-5 col-xs-5 col-lg-5 ">
        COMPREHENSION DE LA SITUATION
            <textarea id="comp" name="comp" class="form-control" placeholder="comprehesione"></textarea>
        </label>
        <br>
        <input id="btn_add" name="btn_add" class="btn btn-success col-sm-1 col-xs-1 col-lg-1" type="button" onclick="Orientation('control.param_access/ctr_motivation.php?ajouterMot=true&idlc=<?=$_GET['idlc']?>&idExpl='+$('#idExpl').val()+'&mot='+$('#mot').val()+'&comp='+$('#comp').val(),'#motivation')" value="Valider"/>
    </div>       
<!--  --> 
</form>