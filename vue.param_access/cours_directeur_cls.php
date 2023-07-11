<?php 
(empty($_SESSION))?session_start():'';
include_once('../model.param_access/crs_cours.class.php');
include_once('../model.param_access/param_groupe.class.php');
?>


         <section class="fenetre " style="height:92%;background-color: transparent">
          <div id='test09' name='test09'></div>
            <table class=" table-bordered table-striped table-condensed">
                 </thead>
                </thead>
                <tbody>
           <?php
           $crs = new crs_cours();
           $cours = $crs->selectionnerCrsByClsAnn($_GET['idClasse'],$_GET['idAnneeSco']);
           $i=1;
           $tr =0;
           $idcours=0;
           foreach($cours as $selCrs){
            $tr++;
            ?>
            <?php if($tr==1){echo '<tr style="margin:3px;">';}?>
                           <!-- <?=$i++?> -->
                            <td class="dropdown" style="width:250px;x">
                                <div role="button" style="width:100%;height:150px border; 1px solid black" data-toggle="dropdown" onclick="Orientation('control.param_access/ctr_co_animateur.php?pre_coa&info=coanimation&idClasse=<?=$_GET['idClasse']?>&idCours=<?=$selCrs['idCours']?>','#fenetre3')">                          
                                    <img style=" width:100%;height:100px" id="image" src="images/<?=$selCrs['url']?>">
                                    <center><label><?=strtoupper($selCrs['cours']).' <i>CODE:['.$selCrs['idCours'].']</i>';?></label></center>
                                    <center style="font-size:8px "><?=strtoupper($_GET['maClasse']).'<br>'.strtoupper($selCrs['nomUtilisateur'].' '.$selCrs['postnomUtilisateur'].' '.$selCrs['prenomUtilisateur']);?></center>

                                
                                </div>

                                    <ul class="dropdown-menu pull-center">
                                        <li ><a href="#" onclick="showme('#leconsgauche','#editLeco','true'); Orientation('control.param_access/ctr_lecon.php?leconsgauche_dir&idPromotion=<?=$_GET['idPromotion']?>&maClasse=<?=$_GET['maClasse']?>&cours=<?=strtoupper($selCrs['cours'])?>&idCours=<?=$selCrs['idCours']?>&idCls=<?=$_GET['idClasse']?>','#leconsgauche','');">Liste Leçons</a></i></li>
                                        <li ><a href="#" onclick="showme('#leconsgauche','#editLeco','true'); Orientation('control.param_access/ctr_devoirs.php?devoirsgauche_dir=true&idPromotion=<?=$_GET['idPromotion']?>&maClasse=<?=$_GET['maClasse']?>&cours=<?=strtoupper($selCrs['cours'])?>&idCours=<?=$selCrs['idCours']?>&idCls=<?=$_GET['idClasse']?>','#leconsgauche','')">Liste Devoir</a></i></li>
                                        <li class="divider"></li>
                                        <li ><a href="#" onclick="showme('#leconsgauche','#editLeco','true'); Orientation('control.param_access/ctr_lecon.php?rechercheGauche_dir&idPromotion=<?=$_GET['idPromotion']?>&maClasse=<?=$_GET['maClasse']?>&cours=<?=strtoupper($selCrs['cours'])?>&idCours=<?=$selCrs['idCours']?>&idCls=<?=$_GET['idClasse']?>','#leconsgauche','')">Recherche autres lecons</a></i></li>
                                        <li ><a href="#" onclick="showme('#leconsgauche','#editLeco','true'); Orientation('control.param_access/ctr_devoirs.php?rechercheGauche_dir&idPromotion=<?=$_GET['idPromotion']?>&maClasse=<?=$_GET['maClasse']?>&cours=<?=strtoupper($selCrs['cours'])?>&idCours=<?=$selCrs['idCours']?>&idCls=<?=$_GET['idClasse']?>','#leconsgauche','')">Recherche autres Devoirs</a></i></li>
                                        <li class="divider"></li>
                                        <li><a href="#" onclick="showme('#leconsgauche','#editLeco','true');Orientation('control.param_access/ctr_blog.php?commentaire_cours&profil=direct&maClasse=<?=$_GET['maClasse']?>&cours=<?=strtoupper($selCrs['cours'])?>&idCours=<?=$selCrs['idCours']?>&idCls=<?=$_GET['idClasse']?>','#leconsgauche','');">commentaire_cours</a></i></li>
                                        <li class="divider"></li>
                                        <li> <a id="charge" href="#"  onmousedown="Orientation('control.param_access/ctr_rapport.php?grille_remise=true&maClasse=<?=$_GET['maClasse']?>&idClasse=<?=$_GET['idClasse']?>&cours=<?=strtoupper($selCrs['cours'])?>&idCours=<?=$selCrs['idCours']?>&idAnneeSco=<?=$_GET['idAnneeSco']?>&idCls=<?=$_GET['idClasse']?>','#editLeco','')" data-toggle="modal" href="#infos" > Grille Remise </a> 
                                        <li> <a id="charge" href="#"  onmousedown="Orientation('control.param_access/ctr_rapport.php?grille_Point=true&maClasse=<?=$_GET['maClasse']?>&idClasse=<?=$_GET['idClasse']?>&cours=<?=strtoupper($selCrs['cours'])?>&idCours=<?=$selCrs['idCours']?>&idAnneeSco=<?=$_GET['idAnneeSco']?>&idCls=<?=$_GET['idClasse']?>','#editLeco','')" data-toggle="modal" href="#infos" > Grille de Points</a> 
                                        <li> <a id="charge" href="#"  onmousedown="Orientation('control.param_access/ctr_rapport.php?grille_ltr=true&maClasse=<?=$_GET['maClasse']?>&idClasse=<?=$_GET['idClasse']?>&cours=<?=strtoupper($selCrs['cours'])?>&idCours=<?=$selCrs['idCours']?>&idAnneeSco=<?=$_GET['idAnneeSco']?>&idCls=<?=$_GET['idClasse']?>','#editLeco','')"> Grille de Lecteurs </a> 
                                        <li> <a data-toggle="modal" href="#coanimation"> Co-Animation </a>
                                        <li class="divider"></li>
                                        <li ><a href="#" onclick="Encour()" >Supprimer</a></i></li>
                                        </li>

                                    </ul>
                                              
                            
                            </td>
                        <?php if($tr>=6){$tr=0; echo "</tr>";}?>   
            <?php


            $idcours=$selCrs['idCours'];
           }
           ?>
           </tbody>
            </table>
           
        </section>


