<form role="form" enctype="multipart/form-data" class="form-inline well" style="width:800px; height:500px ;margin-left:20%;margin-top:1%; background:white" id="utilisa">
    <center style="margin-left:10px" class="col-sm-12 titres" > PRE-ELABORATION QUESTIONNAIRE <?=" <b>[ ".$_GET['cours']."]</b> à  ".$_GET['maClasse']?></center> 
    <div class="form-group" style="padding:15px">
    <div class="row">
            <div class="col-sm-6" style="border: 1px solid rgba(174, 174, 174, 0.4); margin:2%;padding:2%" >
                <center for="nbQT" class="col-sm-12" style="font-size:20px">A. Combien des questions traditionnelle ? </center>
                <input id="nbQT" style="width:300px" type="text" class="form-control col-sm" placeholder="Nombre, Ex:2">
            </div>
            <div class="col-sm-5" style="border: 1px solid rgba(174, 174, 174, 0.4); margin:2%;padding:2%" >
                <center for="nbQC" class="col-sm-12" style="font-size:20px">B. Combien des questions aux choix multiples ? </center>
                <input id="nbQC" style="width:300px" type="text" class="form-control" placeholder="Nombre, Ex:1">
            </div>
    </div>
           <div class="row">
            <div class="col-sm-6" style="border: 1px solid rgba(174, 174, 174, 0.4); margin:2%;padding:2%" >
                <center for="nbQT" class="col-sm-12" style="font-size:20px">C. Date de remise ? </center>
                <input id="dtremise" style="width:300px" type="date" class="form-control col-sm" placeholder="Nombre, Ex:2">
            </div>
            <div class="col-sm-5" style="border: 1px solid rgba(174, 174, 174, 0.4); margin:2%;padding:2%" >
              
                <textarea id="idx" style="width:300px; height:100px" type="textarea" placeholder="indexation" class="form-control"></textarea>
            </div>
    </div>
          
    </div>

    <div style="padding: 10px" >
    <button id="enrg" onclick="showme('#leconsgauche','#editLeco','true'); Orientation('../control.param_access/ctr_devoirs.php?PreEb2&maClasse=<?=$_GET['maClasse']?>&cours<?=$_GET['cours']?>&idCours=<?=$_GET['idCours']?>&nbQT='+$('#nbQT').val()+'&nbQC='+$('#nbQC').val()+'&dtremise='+$('#dtremise').val()+'&idx='+$('#idx').val(),'#editLeco','');Orientation('../control.param_access/ctr_devoirs.php?devoirsgauche_ense&maClasse=<?=$_GET['maClasse']?>&cours=<?=$_GET['cours']?>&idCours=<?=$_GET['idCours']?>','#leconsgauche','');"  class="btn btn-success pull-left col-sm-6">OK</button>
    <button onclick="Encour()"  class="btn btn-default pull-right  col-sm-6">Annuler</button>
</form>
