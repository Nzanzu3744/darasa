<?php 
include_once('../model.param_access/crs_devoirs.class.php');
?>


         <section class="fenetre " style="background-color: transparent; height:440px;">
         <?php
         $idC=0;
         if(isset($_GET['idCours'])){
            $idC=$_GET['idCours'];
         }
         ?>
         <input  id="" value="Actualiser" type="button" class="btn btn-default " style="width:120px; padding:6px; width:100%" onclick="Orientation('control.param_access/ctr_devoirs.php?devoirssgauche&idCours=<?=$idC?>','#devoirssgauche');"  ></input>  
           <div class="table-responsive" style="height:100%" >
           <table class="table table-bordered table-striped table-condensed">
                <tbody>
           <?php
           $dv = new crs_devoirs();
           $devoirs = $dv->selectionnerByIdCoursActif($_GET['idCours']);
           $i=0;
           $tr=1;
           foreach($devoirs as $seldv){
            $i++;
            if($tr==1){echo '<tr style="margin:3px">';}
            ?>
               <td style="background-color: aliceblue"> Devoirs n : [<?=$i;?>] Code : <?=$seldv['idDevoir']?><br><center style="color:blue">COURS :<br><?=$_GET['cours']?></center></td>
            <?php
             if($tr>=2){$tr=0; echo "</td>";}
             ?>
                <td style="height:100%;  background:#f2f2f2"> 
                  <z class="dropdown">
                  <button data-toggle="dropdown" style=""><b class="caret ppull-right"></b></button>
                        <ul class="dropdown-menu pull-right">
                        <?php
                        $sel_C = new crs_devoirs();
                        $sel_C=$sel_C->selectionnerByCours($seldv['idCours'])->fetch();
                        ?>
                              <li data-toggle="modal" href="#inscri"><a href="#" onclick="Orientation('control.param_access/ctr_devoirs.php?Liredevoirs_eleve=tue&idIns=<?=$_GET['idIns']?>&maClasse=<?=$_GET['maClasse']?>&idClasse=<?=$_GET['idClasse']?>&cours=<?=$sel_C['cours']?>&idcrs=<?=$sel_C['idCours']?>&cours=<?=$sel_C['cours']?>&iddv=<?=$seldv['idDevoir']?>','#editLeco')">Lire le devoirs</a></i></li>
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
           <div>
        </section>


           

