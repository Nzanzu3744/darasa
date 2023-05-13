

<?php 
include_once('../model.param_access/crs_lecon.class.php');

?>


         <section  class="fenetre " style="background-color: transparent; height:410px;">
         <input  id="rechleco" placeholder="Recherche lecon par titre"   type="text" class="form-control" style="width:120px; padding:6px; width:100%" onkeyup="Orientation('../control.param_access/ctr_lecon.php?maClasse=<?=$_GET['maClasse']?>&idCours=<?=$_GET['idCours']?>&cours=<?=$_GET['cours']?>&clerech_ense='+$('#rechleco').val(),'#filtrer','');"  ></input>  
         <div class="table-responsive" style="height:100%" >
         <center><i id="resul"></i></center>
            <table id="filtrer"  class="table table-bordered table-striped table-condensed ">
                <tbody>
           <?php
           
           $lc = new crs_lecon();
           $lecon;
           $lecon = $lc->selectionnerBytitreCrs($_GET['cours']);       
           $i=0;
           foreach($lecon as $selLc){
            $i++;
          ?>
          <tr style="margin:3px">
          <?php
            ?>
               <td style="background-color: aliceblue; font-size:12px">[<?=$i;?>] Code : <?=$selLc['idLecon']?><br><center style="color:red">TITRE<br><?=$selLc['titreLecon']?><br><?=$selLc['anneeSco']?><br><a href='#' style='font-size:8px'><?=$selLc['nomUtilisateur'].'  '.$selLc['postnomUtilisateur'].' '.$selLc['prenomUtilisateur']?></a><br> <mark style="color:black"><?=($selLc['actif']!=1)? "LECON DESACTIVE":'ACTIVE'?></mark></center></br></td>
                <td style="height:100%;  background:#f2f2f2"> 
                  <z class="dropdown">
                  <button data-toggle="dropdown" style=""><b class="caret ppull-right"></b></button>
                        <ul class="dropdown-menu pull-right">
                        <?php

                        $sel_C = new crs_lecon();
                       $sel_C=$sel_C->selectionnerByIdCours($selLc['idCours'])->fetch();
                        ?>
                              <li><a href="#" onclick="Orientation('../control.param_access/ctr_lecon.php?LireLecon=tue&maClasse=<?=$_GET['maClasse']?>&tlecon=<?=$selLc['titreLecon']?>&idcrs=<?=$sel_C['idCours']?>&cours=<?=$sel_C['cours']?>&idlc=<?=$selLc['idLecon']?>','#editLeco','')">Lire la leçon</a></i></li>
                              <li><a href="#" onclick="Orientation('../control.param_access/ctr_lecon.php?RelierLecon=tue&maClasse=<?=$_GET['maClasse']?>&tlecon=<?=$selLc['titreLecon']?>&idCours=<?=$_GET['idCours']?>&cours=<?=$sel_C['cours']?>&idlc=<?=$selLc['idLecon']?>','#resul','')">Rapporter</a></li>
                              <li class="divider"></li>
                              <li>
                                 <a href="#" onclick="Encour()">Rapport Eleve</a>
                              </li>
                        </ul>
                     </z>                
               </td>
               </tr>
                    
                    
            <?php
           }
           ?>
           </tbody>
           
            </table>
            
          </div> 
        </section>
        
           


<!--  -->
