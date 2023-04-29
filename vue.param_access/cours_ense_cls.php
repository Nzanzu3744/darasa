<?php 
(empty($_SESSION))?session_start():'';
include_once('../model.param_access/crs_cours.class.php');
include_once('../model.param_access/param_groupe.class.php');
?>


         <section class="fenetre " style="height:512px;background-color: transparent">
          <div id='test09' name='test09'></div>
            <table class="table table-bordered table-striped table-condensed">
                 </thead>
                </thead>
                <tbody>
           <?php
           $crs = new crs_cours();
           $cours = $crs->selectionnerCrsByUtClsAnn($_SESSION['idUtilisateur'],$_GET['idClasse'],$_GET['idAnneeSco']);
           $i=0;
           $tr =0;
           $idcours=0;
           foreach($cours as $selCrs){
            $tr++;
            ?>
               <!--  --->
              

                    <?php if($tr==1){echo '<tr style="margin:3px">';}?>
                                
                            <td style="background-color: aliceblue"><?=$i++;?></td>
                            <td><?=$selCrs['idCours']?></td>
                            <td style="" ><i class="labelles" >Cours : </i><b><?=":".strtoupper($selCrs['cours']);?><b><i class="labelles" ><br>Classe</i><?=":<z style=font-size:10px".strtoupper($_GET['maClasse'])?></z></td>
                            
                            <td ><a  onclick="Orientation('../control.param_access/ctr_membre.php','#panel','')"><img style="width:70px; height:60px" id="image" src="<?=$selCrs['url']?>"></a></td>
                        <?php if($tr>=3){$tr=0; echo "</td>";}?>
            <?php
            ?>
                <!--  -->
                <td style="height:100%;  background:#f2f2f2">
                
                <z class="dropdown">
                <button data-toggle="dropdown" style="height:60px; ">Options<b class="caret ppull-right"></b></button>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="#" onclick="showme('#leconsgauche','#editLeco','true'); Orientation('../control.param_access/ctr_lecon.php?premiF&maClasse=<?=$_GET['maClasse']?>&cours=<?=strtoupper($selCrs['cours'])?>&idcrs=<?=$selCrs['idCours']?>&idCls=<?=$_GET['idClasse']?>','#editLeco','');Orientation('../control.param_access/ctr_lecon.php?leconsgauche_ense&maClasse=<?=$_GET['maClasse']?>&cours=<?=strtoupper($selCrs['cours'])?>&idCours=<?=$selCrs['idCours']?>&idCls=<?=$_GET['idClasse']?>','#leconsgauche','');">Nouvelle Leçon</a></i></li>
                        <li><a href="#" onclick="showme('#leconsgauche','#editLeco','true'); Orientation('../control.param_access/ctr_devoirs.php?NvDevoi=tue&maClasse=<?=$_GET['maClasse']?>&cours=<?=$selCrs['cours']?>&idCours=<?=$selCrs['idCours']?>','#editLeco',''); Orientation('../control.param_access/ctr_devoirs.php?devoirsgauche_ense=true&maClasse=<?=$_GET['maClasse']?>&cours=<?=strtoupper($selCrs['cours'])?>&idCours=<?=$selCrs['idCours']?>&idCls=<?=$_GET['idClasse']?>','#leconsgauche','')">Nouveau Devoir</a></i></li>
                        <li ><a href="#" onclick="showme('#leconsgauche','#editLeco','true'); Orientation('../control.param_access/ctr_lecon.php?leconsgauche_ense&maClasse=<?=$_GET['maClasse']?>&cours=<?=strtoupper($selCrs['cours'])?>&idCours=<?=$selCrs['idCours']?>&idCls=<?=$_GET['idClasse']?>','#leconsgauche','');">Liste Leçons</a></i></li>
                        <li ><a href="#" onclick="showme('#leconsgauche','#editLeco','true'); Orientation('../control.param_access/ctr_devoirs.php?devoirsgauche_ense=true&maClasse=<?=$_GET['maClasse']?>&cours=<?=strtoupper($selCrs['cours'])?>&idCours=<?=$selCrs['idCours']?>&idCls=<?=$_GET['idClasse']?>','#leconsgauche','')">Liste Devoir</a></i></li>
                        <li ><a href="#" onclick="showme('#leconsgauche','#editLeco','true'); Orientation('../control.param_access/ctr_devoirs.php?rechercheGauche&maClasse=<?=$_GET['maClasse']?>&cours=<?=strtoupper($selCrs['cours'])?>&idCours=<?=$selCrs['idCours']?>&idCls=<?=$_GET['idClasse']?>','#leconsgauche','')">Recherche autres Devoirs</a></i></li>
                        <li ><a href="#" onclick="showme('#leconsgauche','#editLeco','true'); Orientation('../control.param_access/ctr_lecon.php?rechercheGauche&maClasse=<?=$_GET['maClasse']?>&cours=<?=strtoupper($selCrs['cours'])?>&idCours=<?=$selCrs['idCours']?>&idCls=<?=$_GET['idClasse']?>','#leconsgauche','')">Recherche autres lecons</a></i></li>
                        <li ><a href="#" onclick="Encour()" >Supprimer</a></i></li>
                        <li class="divider"></li>
                        <li>
                             <a id="charge"   onmousedown="Orientation('../control.param_access/ctr_rapport.php?rptCours_ense=true&maClasse=<?=$_GET['maClasse']?>&cours=<?=strtoupper($selCrs['cours'])?>&idCours=<?=$selCrs['idCours']?>&idAnneeSco=<?=$_GET['idAnneeSco']?>&idAfft=<?=$_GET['idAfft']?>&idCls=<?=$_GET['idClasse']?>','#editLeco','')" data-toggle="modal" href="#infos" > Rapport </a> 
                        </li>

                    </ul>
                </z>                

                </td>
                    
                    
            <?php
            $idcours=$selCrs['idCours'];
           }
           ?>
           </tbody>
            </table>
           
        </section>

 <button class="btn btn-default pull-left col-sm-2" onclick="showme('#leconsgauche','#editLeco','true'); Orientation('../control.param_access/ctr_cours.php?idClasse=<?=$_GET['idClasse']?>&idCours=<?=$idcours?>&idAnneeSco=<?=$_GET['idAnneeSco']?>&maClasse=<?=$_GET['maClasse']?>&idAfft=<?=$_GET['idAfft']?>&courssgauche','#leconsgauche')"> NOUVEAU COURS</button>

