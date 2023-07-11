<?php
    include_once('../model.param_access/org_periode.class.php');
?>
<div class="form-inline well" style="width:100%x; height:300px ; font-size:12px; background:white">
    <center style="margin-left:10px" class="col-sm-12 titres" > DEVOIR DU COURS <?=" <b>[ ".$_GET['cours']."]</b> RAPPORTE A  ".$_GET['maClasse']?></center> 
    <center style="margin-left:10px" class="col-sm-12 titres" > Devoir Id:  <?=" <b>[ ".$_GET['idDevoir']."]</b> indexe :  ".$_GET['index']?></center> 
        <div class=" col-sm-12">
               
                <div class="col-sm-6" style="" >
                
                    <label for="idPr02" class="col-sm-12">Periode du cours ? </label>
                    <select id="idPr02" name="idPr02" class="form-control" style="width:100%">
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
       
                <div class="col-sm-6" style="; height:100px" >
                    <label for="dateRm" class="col-sm-12">Date de remise ? </label>
                    <input id="dateRm" style="width:100%" type="date" class="form-control">
                </div>
               
        </div>

    <div style="margin-top:100px" >
        <input id="enrg" type="button" onclick="Orientation('control.param_access/ctr_devoirs.php?RelierDevoir=true&idAnneeSco=<?=$_GET['idAnneeSco']?>&idCls=<?=$_GET['idCls']?>&maClasse=<?=$_GET['maClasse']?>&cours=<?=$_GET['cours']?>&idCours=<?=$_GET['idCours']?>&idDevoir=<?=$_GET['idDevoir']?>&dateRm='+$('#dateRm').val()+'&idPr02='+$('#idPr02').val(),'#leconsgauche')"  class="btn btn-success pull-left col-sm-4" value="OK"/>
        <button onclick="Encour()"  class="btn btn-default pull-right  col-sm-4">Annuler</button>
    </div>
</div>
