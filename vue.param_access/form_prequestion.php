<?php
    include_once('../model.param_access/org_periode.class.php');
?>
<form role="form" enctype="multipart/form-data" class="form-inline well" style="width:700px; height:400px ; font-size:12px; margin-left:20%;margin-top:1%; background:white" id="utilisa">
    <center style="margin-left:10px" class="col-sm-12 titres" > PRE-ELABORATION QUESTIONNAIRE <?=" <b>[ ".$_GET['cours']."]</b> à  ".$_GET['maClasse']?></center> 
    <div style="padding:15px">
        <div class=" col-sm-12">
                <div class="col-sm-6" style="" >
                    <label for="nbQT" class="col-sm-12">Question Traditionnelle ? </label>
                    <input id="nbQT" style="width:100%" type="text" class="form-control" >
                </div>
                <div class="col-sm-6" style="" >
                    <label for="nbQC" class="col-sm-12">Question choix multiples ? </label>
                    <input id="nbQC" style="width:100%" type="text" class="form-control">
                </div>
                <div class="col-sm-6" style="" >
                
                    <label for="prD" class="col-sm-12">Periode du cours ? </label>
                    <select id="prD" name="prD" class="form-control" style="width:100%">
                    <?php
                        $pr2 = new org_periode();
                        $pr2 = $pr2->filtreByAnneeCls($_GET['idAnneeSco'],$_GET['idCls']);
                        foreach($pr2 as $selPr2){
                    ?>
                        <option value="<?=$selPr2['idPeriode']?>"><a ><?=$selPr2['periode']?></a><i style="color: green"><?=' | Fin: '.$selPr2['dateFin']?></i> </option>
                    <?php

                        }
                    ?>

                    </select>
                </div>
        </div>
            <div class=" col-sm-12">
                <div class="col-sm-6" style="; height:120px" >
                    <label for="nbQT" class="col-sm-12">Date de remise ? </label>
                    <input id="dtremise" style="width:100%" type="date" class="form-control">
                </div>
                <div class="col-sm-6" style="" >
                    <textarea id="idx" style="width:100%; height:100px" type="textarea" placeholder="indexation" class="form-control"></textarea>
                </div>
        </div>  
    </div>

    <div style="padding: 10px" >
    <input id="enrg" type="button" onclick="Orientation('control.param_access/ctr_devoirs.php?PreEb2&maClasse=<?=$_GET['maClasse']?>&cours<?=$_GET['cours']?>&idCours=<?=$_GET['idCours']?>&nbQT='+$('#nbQT').val()+'&nbQC='+$('#nbQC').val()+'&dtremise='+$('#dtremise').val()+'&prD='+$('#prD').val()+'&idx='+$('#idx').val(),'#editLeco')"  class="btn btn-success pull-left col-sm-4" value="OK"/>
    <button onclick="Encour()"  class="btn btn-default pull-right  col-sm-4">Annuler</button>
</form>
