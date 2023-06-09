<?php 
(empty($_SESSION))?session_start():'';
include_once('../model.param_access/crs_cours.class.php');
include_once('../model.param_access/param_groupe.class.php');
?>


         <section class="fenetre " style="height:100%;background-color: transparent">
            <table class="table table-bordered table-striped table-condensed">
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

                    <?php if($tr==1){echo '<tr style="margin:3px">';}?>
                                
                            <td style="background-color: blue; color:white"><?=$i++;?></td>
                            <td><?=$selCrs['idCours']?></td>
                            <td style="" ><i class="labelles" >Cours :</i><b><?=":".strtoupper($selCrs['cours']);?><b><i class="labelles" ><br>Classe :</i><?=$_GET['maClasse'] .'['.$_GET['idClasse'].']'?></td>
                            <td style="" ><i class="labelles" >Enseignant : </i><b style='font-size:10px'><?=":".strtoupper($selCrs['nomUtilisateur'].' '.$selCrs['postnomUtilisateur'].' '.$selCrs['prenomUtilisateur']);?></td>
                            
                            <td ><a  onclick="Orientation('control.param_access/ctr_membre.php','#panel','')"><img style="width:70px; height:60px" id="image" src="images/<?=$selCrs['url']?>"></a></td>
                        <?php if($tr>=3){$tr=0; echo "</td>";}?>
            <?php
            ?>
                <!--  -->
                <td style="height:100%;  background:#f2f2f2"> 
                <z class="dropdown">
                <button data-toggle="dropdown" style="height:60px; ">Options<b class="caret ppull-right"></b></button>
                    <ul class="dropdown-menu pull-right">
                        <li data-toggle="modal" href="#inscri"><a href="#" onclick="showme('#leconsgauche','#editLeco','true');  Orientation('control.param_access/ctr_lecon.php?leconsgauche_eleve&maClasse=<?=$_GET['maClasse']?>&idIns=<?=$_GET['idIns']?>&cours=<?=strtoupper($selCrs['cours'])?>&idCours=<?=$selCrs['idCours']?>&idCls=<?=$_GET['idClasse']?>','#leconsgauche','');">Liste Leçons</a></i></li>
                              <li data-toggle="modal" href="#inscri"><a href="#" onclick="showme('#leconsgauche','#editLeco','true'); Orientation('control.param_access/ctr_devoirs.php?devoirsgauche_eleve=true&idIns=<?=$_GET['idIns']?>&maClasse=<?=$_GET['maClasse']?>&cours=<?=strtoupper($selCrs['cours'])?>&idCours=<?=$selCrs['idCours']?>&idClasse=<?=$_GET['idClasse']?>','#leconsgauche','')">Liste Devoir</a></i></li>
                              <li class="divider"></li>
                            <li><a href="#" onclick="showme('#leconsgauche','#editLeco','true');Orientation('control.param_access/ctr_blog.php?commentaire_cours&profil=eleve&maClasse=<?=$_GET['maClasse']?>&cours=<?=strtoupper($selCrs['cours'])?>&idCours=<?=$selCrs['idCours']?>&idCls=<?=$_GET['idClasse']?>','#leconsgauche','');">commentaire_cours</a></i></li>                     
                    </ul>
                </z>                

                </td>
                    
                    
            <?php
           }
           ?>
           </tbody>
            </table>
        </section>
           

