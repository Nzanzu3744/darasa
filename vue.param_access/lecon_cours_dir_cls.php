

<?php 
include_once('../model.param_access/crs_lecon.class.php');

?>


         <section class="fenetre " style="height:410px;">
         <?php
         $idC=0;
         if(isset($_GET['idCours'])){
            $idC=$_GET['idCours'];
         }
         ?>
         <input  id="" value="Actualiser" type="button" class="btn btn-default " style="width:120px; padding:6px; width:100%" onclick="Orientation('control.param_access/ctr_lecon.php?maClasse=<?=$_GET['maClasse']?>&leconsgauche_dir&idCours=<?=$idC?>','#leconsgauche','');"  ></input>  
            <div class="table-responsive" style="height:100%" >
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
               <td style="background-color: aliceblue; font-size:12px">[<?=$i;?>] Code : <?=$selLc['idLecon']?><br><center style="color:green">TITRE<br><?=$selLc['titreLecon']?><br><?=$selLc['anneeSco']?><br><a href='#' style='font-size:8px'><?=$selLc['nomUtilisateur'].'  '.$selLc['postnomUtilisateur'].' '.$selLc['prenomUtilisateur']?></a><br> <mark style="color:black"><?=($selLc['actif']!=1)? "LECON DESACTIVE":'ACTIVE'?></mark></center></br></td>
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
                              
                              <li><a href='#' onclick="showme2('#dessoueditLeco'); Orientation('control.param_access/ctr_lecon.php?LireLecon_ense=tue&idPromotion=<?=$_GET['idPromotion']?>&maClasse=<?=$_GET['maClasse']?>&tlecon=<?=$selLc['titreLecon']?>&idCours=<?=$selLc['idCours']?>&cours=<?=$sel_C['cours']?>&idlc=<?=$selLc['idLecon']?>','#editLeco',''); Orientation('control.param_access/ctr_lecon.php?Evalue=tue&idPromotion=<?=$_GET['idPromotion']?>&maClasse=<?=$_GET['maClasse']?>&tlecon=<?=$selLc['titreLecon']?>&idCours=<?=$selLc['idCours']?>&cours=<?=$sel_C['cours']?>&idLecon=<?=$selLc['idLecon']?>','#dessoueditLeco','')">Lire la leçon</a></i></li>
                              <li class="divider"><?=$_GET['idPromotion']?></li>
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
            <div>
           
        </section>
           


<!--  -->
