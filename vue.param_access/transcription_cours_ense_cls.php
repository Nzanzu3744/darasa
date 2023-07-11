<?php 
include_once('../model.param_access/crs_devoirs_trad.class.php');
include_once('../model.param_access/crs_devoirs.class.php');
?>


         <section class="fenetre " style="background-color: transparent; height:410px;">
         <?php
         $idC=htmlspecialchars($_GET['idCours']);
         ?>
         <input  id="" value="Actualiser" type="button" class="btn btn-default " style="width:120px; padding:6px; width:100%" onclick=""  ></input>  
            <div class="table-responsive" style="height:100%">
            <table class="table table-bordered table-striped table-condensed">
                <tbody>
           <?php
           $dv = new crs_devoirs_trad();
           $devoirsTrad = $dv->selectionnerByCours($idC);
           $i=0;
           $tr=1;
           foreach($devoirsTrad as $seldv){
            $i++;
            if($tr==1){echo '<tr style="margin:3px">';}
            ?>
               <td style="background-color: aliceblue">  [<?=$i;?>] Code : <?=$seldv['idDevaoirTrad']?><br><center style="color:red">Transcription de :<br><?=$_GET['cours']?><br><?=$seldv['anneeSco']?><br><a href='#' style='font-size:8px'><?=$seldv['nomUtilisateur'].'  '.$seldv['postnomUtilisateur'].' '.$seldv['prenomUtilisateur']?></a><br><?=$seldv['indexation']?></center></br></td>
            <?php
             if($tr>=2){$tr=0; echo "</td>";}
             ?>
                <td style="height:100%;  background:#f2f2f2"> 
                  <z class="dropdown">
                  <button data-toggle="dropdown" onclick="Orientation('control.param_access/ctr_devoirs_trad.php?TranscriptCote=tue&info=transcript_mod&hgt=700px&idDevaoirTrad=<?=$seldv['idDevaoirTrad']?>&idClasse=<?=$_GET['idClasse']?>&idAnneeSco=<?=$_GET['idAnneeSco']?>&idCls=<?=$_GET['idClasse']?>&maClasse=<?=$_GET['maClasse']?>&cours=<?=$_GET['cours']?>&idAffectation=<?=$_GET['idAffectation']?>&idCours=<?=$_GET['idCours']?>','#fenetre9');" style=""><b class="caret ppull-right"></b></button>
                        <ul class="dropdown-menu pull-right">
                        <?php

                        $sel_C = new crs_devoirs();
                       $sel_C=$sel_C->selectionnerByCours($seldv['idCours'])->fetch();
                        ?>
                              <li > <a data-toggle="modal" href="#transcript_mod">Lire Transcition Cote</a></li>
                              
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


           

