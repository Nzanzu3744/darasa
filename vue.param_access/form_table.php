<form role="form" enctype="multipart/form-data" class="form-inline well" style="width:241px; height:590px" id="utilisa">
    <div class="form-group">
            <labelle for="nomT"> Nom de la Table </labelle>
            <input id="nomT" type="text" class="form-control" placeholder="Nom de la table">
            
            <labelle for="commentaire"> Commentaire </labelle>
            <textarea id="commentaire" type="textarea" class="form-control" rows="16" cols="22" row-max="25" cols-max="16"></textarea>
            <p class="help-block">Vous pouvez agrandir la fenêtre</p>
          
    </div>

    <div style="padding: 10px" >
    <button id="enrg" onclick="Ctr_ajout()"  class="btn btn-success pullright col-sm-6">Valider</button>
    <button onclick="Encour()"  class="btn btn-primary pullleft col-sm-6">Annuler</button>
    </div>
        <div id="ec" class="alert alert-block alert-danger" style="display:none">
        <h4>Erreur !</h4>
        Les champs nom et post nom doivent etre prea lablement remplis !
    </div>
    <div id="sc" class="alert alert-block alert-success" style="display:none">
        <h4>Reussite !</h4>
        Enregistrement reussi.
    </div>
</form>

<script>
    function Ctr_ajout(){
    $.ajax({
        type : 'GET',
        url : '../control.param_access/ctr_role.php?ajouterU=true&nom='+$("#nom").val()+'&postnom='+$("#postnom").val()+'&prenom='+$("#prenom").val()+'&mail='+$("#mail").val()+' & photo='+$("#photo").val()+'&groupe1='+$("#groupe1").val(),
            success:function(serveur){
                if(serveur==1){
                    $("div.form-group").addClass("has-success");
                    $("#sc").show("slow").delay(3000).hide("slow");
                    Orientation('role.php','#panel');
                }
                if(serveur==0){
                    $("div.form-group").addClass("has-error");
                    $("#ec").show("slow").delay(3000).hide("slow");
                }                                                  
            } 
    });
}


function charge_Image(){
    $("#image01").show("slow");
    $("#image01").addClass("has-success");
    $("#image01").html('<img style="height:90%; widht:80%" id="image" src="../images/img.jpg">');
    
}
</script>
<script src="../bootstrap/dist/js/bootstrap.min.js"></script>