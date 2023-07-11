<?php 
(empty($_SESSION))?session_start():'';
include_once('../model.param_access/crs_cours.class.php');
include_once('../model.param_access/param_groupe.class.php');
?>


         <section class="fenetre " style="height:100%;background-color: transparent">
            <table class="table-bordered table-striped table-condensed">
                 </thead>
                </thead>
                <tbody>
           <?php
           $crs = new crs_cours();
           $cours = $crs->selectionnerCrsEleveByCls($_GET['idClasse'],$_GET['idAnneeSco']);
           $i=1;
           $tr =0;
           foreach($cours as $selCrs){
            $tr++;
            ?>
               <!--  --->

                    <?php if($tr==1){echo '<tr style="margin:3px;">';}?>
                           <!-- <?=$i++?> -->
                            <td class="dropdown" style="width:250px;x">
                            
                                <div role="button" style="width:100%;height:150px border; 1px solid black" data-toggle="dropdown">
                                    <img style=" width:100%;height:100px" id="image" src="images/<?=$selCrs['url']?>">
                                    <center><label><?=strtoupper($selCrs['cours']).' <i>CODE:['.$selCrs['idCours'].']</i>';?></label></center>
                                    <center style="font-size:8px;"><?=strtoupper($_GET['maClasse']).'<br>'.strtoupper($selCrs['nomUtilisateur'].' '.$selCrs['postnomUtilisateur'].' '.$selCrs['prenomUtilisateur']);?></center>
                                
                                
                                </div>
                                <ul class="dropdown-menu pull-right">
                                    <li data-toggle="modal" href="#inscri"><a href="#" onclick="showme('#leconsgauche','#editLeco','true');  Orientation('control.param_access/ctr_lecon.php?leconsgauche_eleve&maClasse=<?=$_GET['maClasse']?>&idIns=<?=$_GET['idIns']?>&cours=<?=strtoupper($selCrs['cours'])?>&idCours=<?=$selCrs['idCours']?>&idCls=<?=$_GET['idClasse']?>','#leconsgauche','');">Liste Leçons</a></i></li>
                                        <li data-toggle="modal" href="#inscri"><a href="#" onclick="showme('#leconsgauche','#editLeco','true'); Orientation('control.param_access/ctr_devoirs.php?devoirsgauche_eleve=true&idIns=<?=$_GET['idIns']?>&maClasse=<?=$_GET['maClasse']?>&cours=<?=strtoupper($selCrs['cours'])?>&idCours=<?=$selCrs['idCours']?>&idClasse=<?=$_GET['idClasse']?>','#leconsgauche','')">Liste Devoir</a></i></li>
                                        <li class="divider"></li>
                                        <li><a href="#" onclick="showme('#leconsgauche','#editLeco','true');Orientation('control.param_access/ctr_blog.php?commentaire_cours&profil=eleve&maClasse=<?=$_GET['maClasse']?>&cours=<?=strtoupper($selCrs['cours'])?>&idCours=<?=$selCrs['idCours']?>&idCls=<?=$_GET['idClasse']?>','#leconsgauche','');">commentaire_cours</a></i></li>                     
                                </ul>
                            </td>
                        <?php if($tr>=5){$tr=0; echo "</tr>";}?>
            <?php
          
           }
           ?>
           </tbody>
            </table>
        </section>
<button class="btn btn-xs btn-default pull-right col-sm-1" style="margin-right:10px; border: 1px solid blue" data-toggle="modal" href="#bulletin01"> BULLETIN</button>
 <button class="btn btn-xs btn-default pull-right col-sm-1" style="margin-right:10px; border: 1px solid blue" data-toggle="modal" href="#liste_eleve"> COLLEGUE</button>
 <button class="btn btn-xs btn-default pull-right col-sm-1" style="margin-right:10px; border: 1px solid blue" data-toggle="modal" href="#listeEnsi"> ENSEIGNANTS</button>

