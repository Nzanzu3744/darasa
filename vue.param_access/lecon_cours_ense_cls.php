

<?php 
include_once('../model.param_access/crs_lecon.class.php');

?>


         <section class="fenetre " style="height:512PX;background-color: transparent">
         <?php
         $idC=0;
         if(isset($_GET['idCours'])){
            $idC=$_GET['idCours'];
         }
         ?>
         <input  id="" value="Actualiser" type="button" class="btn btn-default " style="width:120px; padding:6px; width:100%" onclick="Orientation('../control.param_access/ctr_lecon.php?maClasse=<?=$_GET['maClasse']?>&leconsgauche_ense&idCours=<?=$idC?>','#leconsgauche','');"  ></input>  
            <table class="table table-bordered table-striped table-condensed">
                <tbody>
           <?php
           $lc = new crs_lecon();
           $lecon = $lc->selectionnerByCours($_GET['idCours']);
           $i=0;
           $tr=1;
           foreach($lecon as $selLc){
            $i++;
            if($tr==1){echo '<tr style="margin:3px">';}
            ?>
               <td style="background-color: aliceblue"> Lecon n: [<?=$i;?>] Code : <?=$selLc['idLecon']?><br><center style="color:red">TITRE<br><?=$selLc['titreLecon']?></center></td>
            <?php
             if($tr>=2){$tr=0; echo "</td>";}
             ?>
                <td style="height:100%;  background:#f2f2f2"> 
                  <z class="dropdown">
                  <button data-toggle="dropdown" style="height:60px; ">Options<b class="caret ppull-right"></b></button>
                        <ul class="dropdown-menu pull-right">
                        <?php

                        $sel_C = new crs_lecon();
                       $sel_C=$sel_C->selectionnerByIdCours($selLc['idCours'])->fetch();
                        ?>
                              <li><a onclick="Orientation('../control.param_access/ctr_lecon.php?LireLecon=tue&maClasse=<?=$_GET['maClasse']?>&tlecon=<?=$selLc['titreLecon']?>&idcrs=<?=$sel_C['idCours']?>&cours=<?=$sel_C['cours']?>&idlc=<?=$selLc['idLecon']?>','#editLeco','')">Lire la leçon</a></i></li>
                              
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
           
        </section>
           


<!--  -->
