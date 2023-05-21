


<?php 
include_once('../model.param_access/crs_lecon.class.php');
?>


         <section class="fenetre " style="height:410px;background-color: transparent">
         <?php
         $idC=0;
         if(isset($_GET['idCours'])){
            $idC=$_GET['idCours'];
         }
         ?>
         <input  id="" value="Actualiser" type="button" class="form-control " style="width:120px; padding:6px; width:100%" onkeyup="Orientation('../control.param_access/ctr_lecon.php?leconsgauche_eleve&idCours=<?=$idC?>','#leconsgauche');"  ></input>   
            <div class="table-responsive" style="height: 100%" >
            <table class="table table-bordered table-striped table-condensed">
                <tbody>
           <?php
           $lc = new crs_lecon();
           $lecon = $lc->selectionnerByCoursActif($_GET['idCours']);
           $i=0;
           $tr=1;
           foreach($lecon as $selLc){
            $i++;
            if($tr==1){echo '<tr style="margin:3px">';}
            ?>
               <td style="background-color: #f2f2f2"> Lecon n: [<?=$i;?>] Code : <?=$selLc['idLecon']?><br><center style="color:blue">TITRE<br><?=$selLc['titreLecon']?><br></center></td>
            <?php
             if($tr>=2){$tr=0; echo "</td>";}
             ?>
                <td style="height:100%;  background:#f2f2f2"> 
                  <z class="dropdown">
                  <button data-toggle="dropdown" style=""><b class="caret ppull-right"></b></button>
                        <ul class="dropdown-menu pull-right">
                        <?php

                       $sel_C = new crs_lecon();
                       $sel_C=$sel_C->selectionnerByIdCours($selLc['idCours'])->fetch();
                        ?>
                              <li data-toggle="modal" href="#inscri"><a href="#" onclick="Orientation('../control.param_access/ctr_lecon.php?LireLecon_eleve=tue&maClasse=<?=$_GET['maClasse']?>&idIns=<?=$_GET['idIns']?>&tlecon=<?=$selLc['titreLecon']?>&idcrs=<?=$sel_C['idCours']?>&cours=<?=$sel_C['cours']?>&idlc=<?=$selLc['idLecon']?>','#editLeco','')">Lire la leçon</a></i></li>
                              
                              <li class="divider"></li>
                              <li>
                                 <a href="#" onclick="Encour()">Rapport Eleve</a>
                              </li>
                        </ul>
                     </z>                
               </td>
               
                    
                    
            <?php
           }
           ?>
           </tbody>
            </table>
            </div>
           
        </section>
