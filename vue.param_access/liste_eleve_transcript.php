<?php
     include_once('../model.param_access/crs_devoirs_trad.class.php');
     include_once('../model.param_access/org_periode.class.php');
?>
<div class="form-inline well" style="width:850px; font-size:12px; margin-left:15%;margin-top:1%; background:white">
    <?php
    $idDevaoirTrad='undefined';
    if(isset($_GET['idDevaoirTrad'])){
       $idDevaoirTrad= htmlspecialchars($_GET['idDevaoirTrad']); 
    ?>
     <center style="margin-left:10px" class="col-sm-12" ><label> MODIFICATION DE COTES TRANSCIPT A<?=" ".$_GET['cours'].' CLASSE :'.$_GET['maClasse']?></label></center> 
        <span style="paddind-top:10px; border-top: 1px solid black"> CODE TRANSCRIPTION : <input disabled id="idDevaoirTrad"  name="idDevaoirTrad" style="width:50px; height:10px; color:green;" name="idDevaoirTrad" type="text" class="btn-xs form-control" value="<?=$idDevaoirTrad?>"/></span>
    <?php
    $dvTrad= new crs_devoirs_trad();
    $dvTrad = $dvTrad->selectionnerByIdDevTrad($idDevaoirTrad)->fetch();
    }else{
        ?>
        
         <center style="margin-left:10px" class="col-sm-12" ><label> TRANSCIPTION DE COTE  <?=" ".$_GET['cours']." CLASSE :".$_GET['maClasse']?></label></center> 
        <?php
    }
    ?>
    <div class=" col-sm-12 well"  style="padding-top:10px; ">
        <div class=" col-sm-5" style=" border-top: 1px solid red">
            <div style="" >
                    <label for="prD" class="col-sm-12">Periode du cours ? </label>
                    <select id="prD" name="prD" class="form-control" style="width:100%">
                    <?php
                        if($idDevaoirTrad!='undefined'){
                            $pr1 = new org_periode();
                            $pr1 = $pr1->filtreByPeriode($dvTrad['idPeriode']);
                            foreach($pr1 as $selPr2){
                        ?>
                            <option  style="color: green" value="<?=$selPr2['idPeriode']?>"><a ><?=$selPr2['periode']?></a><i><?=' | Fin: '.$selPr2['dateFin']?></i> </option>
                        <?php

                            }
                                
                        }
                    ?>
                    <?php
                        $pr2 = new org_periode();
                        $pr2 = $pr2->filtreByAnneeCls($_GET['idAnneeSco'],$_GET['idCls']);
                        foreach($pr2 as $selPr2){
                            if($idDevaoirTrad!='undefined'){
                                if($dvTrad['idPeriode']!=$selPr2['idPeriode']){
                    ?>
                        <option value="<?=$selPr2['idPeriode']?>"><a ><?=$selPr2['periode']?></a><i style="color: green"><?=' | Fin: '.$selPr2['dateFin']?></i> </option>
                    <?php

                            }
                        }else{
                            ?>
                        <option value="<?=$selPr2['idPeriode']?>"><a ><?=$selPr2['periode']?></a><i style="color: green"><?=' | Fin: '.$selPr2['dateFin']?></i> </option>
                        <?php
                        }
                        }
                    ?>

                    </select>
            </div>
            <div style="margin-top:10px">
             <label for="prD" class="col-sm-12">Ponderation maximale </label>
                <input id="pond" name="pond" type="text" style="width:100%" class="form-control" <?=($idDevaoirTrad!='undefined')?"value=".$dvTrad['poderation']:''?> placeholder="Point Total"/>
            </div>
        </div>
        <div class="col-sm-7" style=" border-top: 1px solid green">
            <label for="prD" class="col-sm-12">Indexe</label>
            <textarea id="idx" name="idx" style="width:100%; height:100px" type="textarea" placeholder="indexation" class="form-control"><?=($idDevaoirTrad!='undefined')?$dvTrad['indexation']:''?> </textarea>
        </div>
    </div>
         
 
<form  id="lstEleve" name="lstEleve" enctype="multipart/form-data">
 <table class="table table-bordered table-striped table-condensed" > 
                <thead>
                    <tr>
                        <th>N</th>
                        <th><center>MATRICUL</center></th>
                        <th><center>PHOTO</center></th>
                        <th><center>NOM</center></th>
                        <th><center>POST-NOM</center></th>
                        <th><center>PRENOM</center></th>
                        <th><center>GENRE</center></th>
                        <th><center>POINT</center></th>
                        
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                    include_once('../model.param_access/org_inscription.class.php');
                    $eleve = new org_inscription();
                    $idCls=$_GET['idClasse'];
                    $idAnn=$_GET['idAnneeSco'];
                    $eleve = $eleve->rechercherByClAnnee($idCls, $idAnn);
                    $i=1;

                     $cote02 = new crs_cote_devoirs_trad();

                    foreach($eleve as $selEleve){
                        $cote='';
                        if($idDevaoirTrad!='undefined'){
                             $cote = $cote02->filterDevTraEleve($idDevaoirTrad,$selEleve['idInscription'])->fetch();
                        }
                    ?>
                    <tr>
                        <td><?=$i?></td>
                        <!-- width:0px;height:0px;border: 0px solid white -->
                        <td style="display:none"><input  id="<?=$i?>" name="<?=$i?>" style="width:50px;" type="hidden" class="form-control" value="<?=$selEleve['idInscription']?>"/></td>
                        <td><label style="color:green"><?=$selEleve['idUtilisateur']?></label></td>
                        <td><img style="width:30px; height:30px" src="<?='images/'.$selEleve['photoUtilisateur']?>"/></td>
                       <td><?=$selEleve['nomUtilisateur']?></td>
                       <td><?=$selEleve['postnomUtilisateur']?></td>
                       <td><?=$selEleve['prenomUtilisateur']?></td>
                       <td><?=$selEleve['genre']?></td>
                        <td><input id="ct<?=$selEleve['idInscription']?>" name="ct<?=$selEleve['idInscription']?>" style="width:50px" <?=($idDevaoirTrad!='undefined' AND $cote==TRUE)?"value=".$cote['coteDevoirTrad']:''?>  type="text" class="form-control"></td>

                       </tr>
                        <?php
                        $i++;
                        
                    }
                        ?>           
                </tbody>
            </table>
            
    <div style="padding: 10px" >
       <input data-toggle="modal"  id="enrg" type="button" onclick="Orientation2('control.param_access/ctr_devoirs_trad.php?ajouterDT=ture&idClasse=<?=$_GET['idClasse']?>&idAnneeSco=<?=$_GET['idAnneeSco']?>&maClasse=<?=$_GET['maClasse']?>&cours=<?=$_GET['cours']?>&idAffectation=<?=$_GET['idAffectation']?>&idCours=<?=$_GET['idCours']?>&idDevaoirTrad=<?=$idDevaoirTrad?>&prD='+$('#prD').val()+'&pond='+$('#pond').val()+'&idx='+$('#idx').val(),'#leconsgauche','#lstEleve');showme('#leconsgauche','#editLeco','true'); "  class="btn btn-xs btn-success pull-left col-sm-3 " value="Envoyer"/>
        
        <button onclick="Encour()"  class="btn btn-xs btn-default pull-right  col-sm-3">Annuler</button>
    </div>
</div>
</form>
