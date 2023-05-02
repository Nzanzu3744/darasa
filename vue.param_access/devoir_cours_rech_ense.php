<?php 
include_once('../model.param_access/crs_devoirs.class.php');
?>


         <section class="fenetre " style="height:512PX;background-color: transparent">
         <?php
         $idC=0;
         if(isset($_GET['idCours'])){
            $idC=$_GET['idCours'];
         }
         ?>
         <input  id="idx" placeholder="Recherche devoir par index" type="text" class="form-control" style="width:120px; padding:6px; width:100%" onkeyup="Orientation('../control.param_access/ctr_devoirs.php?maClasse=<?=$_GET['maClasse']?>&idCours=<?=$_GET['idCours']?>&cours=<?=$_GET['cours']?>&clerechense_='+$('#idx').val(),'#filtrer','');"  ></input>  
            <div class="table-responsive" style="height:530px">
            <center><i id="resul"></i></center>
            <table id="filtrer"  class="table table-bordered table-striped table-condensed">
                <tbody>
           <?php
           $dv = new crs_devoirs();
           $devoirs = $dv->selectionnerBytitreCrs($_GET['cours']);
           $i=0;
           foreach($devoirs as $seldv){
            $i++;
            ?>
            <tr>
               <td style="background-color: aliceblue">  [<?=$i;?>] Code : <?=$seldv['idDevoir']?><br><center style="color:red">Devoirs de :<br><?=$_GET['cours']?><br><?=$seldv['anneeSco']?><br><a href='#' style='font-size:8px'><?=$seldv['nomUtilisateur'].'  '.$seldv['postnomUtilisateur'].' '.$seldv['prenomUtilisateur']?></a><br><?=$seldv['indexation']?></center></br></td>
                <td style="height:100%;  background:#f2f2f2"> 
                  <z class="dropdown">
                  <button data-toggle="dropdown" style=""><b class="caret ppull-right"></b></button>
                        <ul class="dropdown-menu pull-right">
                        <?php

                        $sel_C = new crs_devoirs();
                       $sel_C=$sel_C->selectionnerByIdCours($seldv['idCours'])->fetch();
                        ?>
                              <li data-toggle="modal" href="#inscri"><a href="#" onclick="Orientation('../control.param_access/ctr_questionnaire.php?Liredevoirs_ense=tue&maClasse=<?=$_GET['maClasse']?>&cours=<?=$sel_C['cours']?>&idcrs=<?=$sel_C['idCours']?>&cours=<?=$sel_C['cours']?>&iddv=<?=$seldv['idDevoir']?>','#editLeco','')">Lire le devoirs</a></i></li>
                              <li data-toggle="modal" href="#inscri"><a href="#" onclick="Orientation('../control.param_access/ctr_devoirs.php?RelierDevoir=true&maClasse=<?=$_GET['maClasse']?>&cours=<?=$sel_C['cours']?>&idCours=<?=$_GET['idCours']?>&cours=<?=$sel_C['cours']?>&idDevoir=<?=$seldv['idDevoir']?>','#resul','')">Rapporter</a></i></li>
                              
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


           

