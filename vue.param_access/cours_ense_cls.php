<?php 
(empty($_SESSION))?session_start():'';
include_once('../model.param_access/crs_cours.class.php');
include_once('../model.param_access/param_groupe.class.php');
?>


         <section class="fenetre " style="height:93%;background-color: transparent">
          <div id='test09' name='test09'></div>
            <table class=" table-bordered table-striped table-condensed">
                 </thead>
                </thead>
                <tbody>
           <?php
           $crs = new crs_cours();
           $cours = $crs->selectionnerCrsByUtClsAnn($_SESSION['idUtilisateur'],$_GET['idClasse'],$_GET['idAnneeSco']);
           $i=1;
           $tr =0;
           $idcours=0;
           foreach($cours as $selCrs){
            $tr++;
            ?>
               <!--  --->
              

            <?php if($tr==1){echo '<tr style="margin:3px;">';}?>
                           <!-- <?=$i++?> -->
                            <td class="dropdown" style="width:250px;x">
                            
                                <div role="button" style="width:100%;height:150px border; 1px solid black" data-toggle="dropdown" onclick="Orientation('control.param_access/ctr_co_animateur.php?pre_coa&info=coanimation&idClasse=<?=$_GET['idClasse']?>&idCours=<?=$selCrs['idCours']?>&cours=<?=$selCrs['cours']?>&idAffectation=<?=$_GET['idAffectation']?>','#fenetre3');Orientation('control.param_access/ctr_devoirs_trad.php?TranscriptCote=tue&info=transcript&hgt=700px&idClasse=<?=$_GET['idClasse']?>&idCours=<?=$selCrs['idCours']?>&idAnneeSco=<?=$_GET['idAnneeSco']?>&idCls=<?=$_GET['idClasse']?>&maClasse=<?=$_GET['maClasse']?>&cours=<?=$selCrs['cours']?>&idCours=<?=$selCrs['idCours']?>&idAffectation=<?=$_GET['idAffectation']?>','#fenetre9');">
                                    <img style=" width:100%;height:100px" id="image" src="images/<?=$selCrs['url']?>">
                                    <center><label><?=strtoupper($selCrs['cours']).' <i>CODE:['.$selCrs['idCours'].']</i>';?></label></center>
                                    <center style="font-size:8px; color:red; "><?=strtoupper($_GET['maClasse']).'<br>'.strtoupper($selCrs['nomUtilisateur'].' '.$selCrs['postnomUtilisateur'].' '.$selCrs['prenomUtilisateur']);?></center>
                                
                                
                                </div>
                                <ul class="dropdown-menu">
                                    <li class="divider"></li>
                                        <li><a href="#" onclick="showme('#leconsgauche','#editLeco','true'); Orientation('control.param_access/ctr_lecon.php?premiF&maClasse=<?=$_GET['maClasse']?>&cours=<?=strtoupper($selCrs['cours'])?>&idCours=<?=$selCrs['idCours']?>&idCls=<?=$_GET['idClasse']?>','#editLeco','');Orientation('control.param_access/ctr_lecon.php?leconsgauche_ense&maClasse=<?=$_GET['maClasse']?>&cours=<?=strtoupper($selCrs['cours'])?>&idCours=<?=$selCrs['idCours']?>&idCls=<?=$_GET['idClasse']?>','#leconsgauche','');">Nouvelle Leçon</a></i></li>
                                        <li><a href="#" onclick="showme('#leconsgauche','#editLeco','true'); Orientation('control.param_access/ctr_devoirs.php?NvDevoi=tue&idAnneeSco=<?=$_GET['idAnneeSco']?>&idCls=<?=$_GET['idClasse']?>&maClasse=<?=$_GET['maClasse']?>&cours=<?=$selCrs['cours']?>&idCours=<?=$selCrs['idCours']?>','#editLeco',''); Orientation('control.param_access/ctr_devoirs.php?devoirsgauche_ense=true&maClasse=<?=$_GET['maClasse']?>&cours=<?=strtoupper($selCrs['cours'])?>&idCours=<?=$selCrs['idCours']?>&idCls=<?=$_GET['idClasse']?>','#leconsgauche','')">Nouveau Devoir</a></i></li>
                                        <li><a  data-toggle="modal" href="#transcript">Transcription Cote</a></i></li>
                                        <li class="divider"></li>
                                        <li ><a href="#" onclick="showme('#leconsgauche','#editLeco','true'); Orientation('control.param_access/ctr_lecon.php?leconsgauche_ense&maClasse=<?=$_GET['maClasse']?>&cours=<?=strtoupper($selCrs['cours'])?>&idCours=<?=$selCrs['idCours']?>&idCls=<?=$_GET['idClasse']?>','#leconsgauche','');">Liste Leçons</a></i></li>
                                        <li ><a href="#" onclick="showme('#leconsgauche','#editLeco','true'); Orientation('control.param_access/ctr_devoirs.php?devoirsgauche_ense=true&maClasse=<?=$_GET['maClasse']?>&cours=<?=strtoupper($selCrs['cours'])?>&idCours=<?=$selCrs['idCours']?>&idAnneeSco=<?=$_GET['idAnneeSco']?>&idClasse=<?=$_GET['idClasse']?>','#leconsgauche','')">Liste Devoirs</a></i></li>
                                        <li ><a href="#" onclick="showme('#leconsgauche','#editLeco','true'); Orientation('control.param_access/ctr_devoirs_trad.php?devoirsTrangauche_ense=true&maClasse=<?=$_GET['maClasse']?>&cours=<?=strtoupper($selCrs['cours'])?>&idAffectation=<?=$_GET['idAffectation']?>&idCours=<?=$selCrs['idCours']?>&idAnneeSco=<?=$_GET['idAnneeSco']?>&idClasse=<?=$_GET['idClasse']?>','#leconsgauche','')">Liste Transcrition</a></i></li>

                                        <li class="divider"></li> 
                                        <li><a href="#" onclick="showme('#leconsgauche','#editLeco','true');Orientation('control.param_access/ctr_blog.php?commentaire_cours&profil=ense&maClasse=<?=$_GET['maClasse']?>&cours=<?=strtoupper($selCrs['cours'])?>&idCours=<?=$selCrs['idCours']?>&idCls=<?=$_GET['idClasse']?>','#leconsgauche','');">Conversation</a></i></li>
                                        <li class="divider"></li>
                                        
                                        <li ><a href="#" onclick="showme('#leconsgauche','#editLeco','true'); Orientation('control.param_access/ctr_devoirs.php?rechercheGauche_ense&maClasse=<?=$_GET['maClasse']?>&cours=<?=strtoupper($selCrs['cours'])?>&idCours=<?=$selCrs['idCours']?>&idCls=<?=$_GET['idClasse']?>&idAnneeSco=<?=$_GET['idAnneeSco']?>','#leconsgauche','')">Recherche autres Devoirs</a></i></li>
                                        <li ><a href="#" onclick="showme('#leconsgauche','#editLeco','true'); Orientation('control.param_access/ctr_lecon.php?rechercheGauche_ense&maClasse=<?=$_GET['maClasse']?>&cours=<?=strtoupper($selCrs['cours'])?>&idCours=<?=$selCrs['idCours']?>&idCls=<?=$_GET['idClasse']?>','#leconsgauche','')">Recherche autres lecons</a></i></li>
                                        <li class="divider"></li>
                                        <li> <a href="#" onclick="Orientation('control.param_access/ctr_rapport.php?grille_remise=true&maClasse=<?=$_GET['maClasse']?>&idClasse=<?=$_GET['idClasse']?>&cours=<?=strtoupper($selCrs['cours'])?>&idCours=<?=$selCrs['idCours']?>&idAnneeSco=<?=$_GET['idAnneeSco']?>&idCls=<?=$_GET['idClasse']?>','#editLeco','')" > Grille Remise </a> 
                                        <li> <a href="#"  onclick="Orientation('control.param_access/ctr_rapport.php?grille_Point=true&maClasse=<?=$_GET['maClasse']?>&idClasse=<?=$_GET['idClasse']?>&cours=<?=strtoupper($selCrs['cours'])?>&idCours=<?=$selCrs['idCours']?>&idAnneeSco=<?=$_GET['idAnneeSco']?>&idCls=<?=$_GET['idClasse']?>','#editLeco','')" > Grille de Points  </a> 
                                        <li> <a href="#" onclick="Orientation('control.param_access/ctr_rapport.php?grille_ltr=true&maClasse=<?=$_GET['maClasse']?>&idClasse=<?=$_GET['idClasse']?>&cours=<?=strtoupper($selCrs['cours'])?>&idCours=<?=$selCrs['idCours']?>&idAnneeSco=<?=$_GET['idAnneeSco']?>&idCls=<?=$_GET['idClasse']?>','#editLeco','')"> Grille de Lecteurs </a>
                                        <li> <a data-toggle="modal" href="#coanimation"> Co-Animation </a>
                                        <li class="divider"></li>
                                        <li><a href="#" onclick="showme('#leconsgauche','#editLeco','true'); Orientation('control.param_access/ctr_lecon.php?premiF&maClasse=<?=$_GET['maClasse']?>&cours=<?=strtoupper($selCrs['cours'])?>&idCours=<?=$selCrs['idCours']?>&idCls=<?=$_GET['idClasse']?>','#editLeco','');Orientation('control.param_access/ctr_lecon.php?leconsgauche_ense&maClasse=<?=$_GET['maClasse']?>&cours=<?=strtoupper($selCrs['cours'])?>&idCours=<?=$selCrs['idCours']?>&idCls=<?=$_GET['idClasse']?>','#leconsgauche','');">Modifier</a></i></li>
                                        <li ><a href="#" onclick="Encour()" >Supprimer</a></i></li>

                                    </li>

                                </ul>
                                              
                            
                            </td>
                        <?php if($tr>=5){$tr=0; echo "</tr>";}?>   
            <?php
            $idcours=$selCrs['idCours'];
           }
           ?>
           </tbody>
            </table>
            
           
</section>

 <button class="btn btn-xs btn-default pull-right col-sm-1" style="margin-right:10px; border: 1px solid red" onclick="showme('#leconsgauche','#editLeco','true'); Orientation('control.param_access/ctr_cours.php?idClasse=<?=$_GET['idClasse']?>&idCours=<?=$idcours?>&idAnneeSco=<?=$_GET['idAnneeSco']?>&maClasse=<?=$_GET['maClasse']?>&courssgauche','#leconsgauche')"> NOUVEAU COURS</button>
 <button class="btn btn-xs btn-default pull-right col-sm-1" style="margin-right:10px; border: 1px solid red" data-toggle="modal" href="#bulletin01"> BULLETIN</button>
 <button class="btn btn-xs btn-default pull-right col-sm-1" style="margin-right:10px; border: 1px solid red" data-toggle="modal" href="#liste_eleve"> ELEVE</button>
 <button class="btn btn-xs btn-default pull-right col-sm-1" style="margin-right:10px; border: 1px solid red" data-toggle="modal" href="#listeEnsi">ENSEIGNANTS</button>

