<form role="form" enctype="multipart/form-data" class="form-inline" style="background:white" id="utilisa">
    <center style="margin-left:10px; margin-bottom:10px" class="col-sm-12 titres" > ANNEE SCOLAIRE</center>
    <input id="anneesco" type="text" class="form-control" placeholder="Annee Scolaire">
    <input id="description" type="text" class="form-control" placeholder="Description (Commentaire)" />
    <button onclick="Orientation('control.param_access/ctr_anneesco.php?AjouteAnnee&anneesco='+$('#anneesco').val()+'&description='+$('#description').val(),'#panel','');Orientation('control.param_access/ctr_anneesco.php?AfficheAnnee=true','#panel')"  class="btn btn-success pull-right col-sm-3">ENREGISTRER</button>
</form>
