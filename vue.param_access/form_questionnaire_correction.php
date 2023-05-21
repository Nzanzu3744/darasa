<!--  -->
<script src="../jquery/dist/summernote/summernote-bs4.min.js"></script>
<!--  -->
<?php
    include_once('../model.param_access/crs_question.class.php');
    include_once('../model.param_access/crs_devoirs.class.php');
    include_once('../model.param_access/crs_assertion.class.php');
    include_once('../model.param_access/crs_reponset.class.php');
    
    $dev = new crs_devoirs();
    $devv=$dev->rechercherr($_GET['iddv']);

    $seldev=$devv->fetch();
  
    $qst = new crs_question();
    $qst = $qst->selectionnerByIdDevASC($_GET['iddv']);
   
    ?>

    <div role="" enctype="" class=" row well" style="width:100%;margin:1px" id="utilisa">
    <center style="margin-left:10px" class="col-sm-12 titres" > QUESTIONNAIRE <?=" <b>[ ".$_GET['cours']."]</b> à  ".$_GET['maClasse']?>  QUESTIONNAIRE DU DEVOIR ID:<?=$seldev['idDevoir'].'CREE LE<z style=color:green>'.$seldev['dateCreation'].' </z>A REMETTRE LE <z style=color:red>'.$seldev['dateRemise'].'</z>'?> </center> 

    <?php
        $verif = new crs_assertion();
        $nub=1;
        $idasCk1='';
        $idasCk2='';
        $idasCk3='';
        $idasCk4='';
        $idasCk5='';
        $idasCk6='';
    foreach($qst as $selQst){

        $ver = $verif->selectionnerByQst($selQst['idQuestion']);
        $veri =$ver->fetch();
    if(empty($veri['idAssertion'])){
            ?>
          <div>
            <form id=<?='QuestT'.$nub?> nam=<?='QuestT'.$nub?>>
           
                    <labelle for=<?='qstT'.$nub?> class="col-sm-11" style="font-size:20px"> Question :<?=$nub?></labelle>
                    <textarea name=<?='qstT'.$nub?>  class="textarea " cols="140" type="text" ><?=$selQst['question']?></textarea>  
            </form>
        </div>

         <?php
         $rpses = new crs_reponset();
         $rpses = $rpses->selectionnerByQstAvecEleveClass($selQst['idQuestion'],$_GET['idClasse'])->fetchAll();
         ?>
         
         <?php
         $nrep=0;
        foreach($rpses as $selRep){
          $id =$nrep.$selQst['idQuestion'];
          ?>
            <div class="col-sm-12" style="border: 1px solid black;background:white;padding:0px">
          
              <center class="col-sm-1" style="border: 1px solid white; padding:0px; font-size:9px">
 
                            <label class=""> <?=$selRep['nomUtilisateur'].' '.$selRep['postnomUtilisateur'].' '.$selRep['prenomUtilisateur']?></li>
                            <label class=""><?=$selRep['genre']?></label>
                            <img class="col-sm-12" src="<?='../images/'.$selRep['photoUtilisateur']?>">     
              </center>
              <div class="col-sm-10" style="border: 1px solid white;padding:0px; background:white"><?=$selRep['reponse']?></div>
                      <?php
                      include_once('../model.param_access/crs_correction.class.php');
                      $correct = new crs_correction();
                      $correct=$correct->selectionnerByRep($selRep['idReponse'])->fetch();
                      
                      if($correct==''){
                      ?>
                        <center class="col-sm-1" style="border: 1px solid red; padding:0px" id=<?='val'.$id?>>
                          <label style="height:100%; width:100%">
                            <input class="form-control col-sm-2 col-lg-2 col-xs-2" id=<?='cote'.$id?> name='<?='cote'.$id?>' >SUR <?=$selRep['ponderation']?>
                          </label>
                          <textarea class="form-control" id=<?='cmt'.$id?>></textarea>
                          <button class="btn btn-xs btn-danger col-sm-12" onclick="Orientation('../control.param_access/ctr_questionnaire.php?Valide_correction&pond=<?=$selQst['ponderation']?>&idAfft=<?=$_GET['idAfft']?>&idRep=<?=$selRep['idReponse']?>&cote='+$('#<?='cote'.$id?>').val()+'&cmt='+$('#<?='cmt'.$id?>').val(),'#<?='resul'.$id?>','')">OK</button>
                          <div id=<?='resul'.$id?>></div>
                        </center>  
                <?php
                    }else{
                      ?>
                        <center class="col-sm-1" style="border: 1px solid red; padding:0px" id=<?='val'.$id?>>
                          <label style="height:100%; width:100%">
                            <input class="form-control col-sm-2 col-lg-2 col-xs-2" id=<?='cote'.$id?> name='<?='cote'.$id?>' value='<?=$correct['cote']?>' >SUR <?=$selRep['ponderation']?>
                          </label>
                          <textarea class="form-control" id=<?='cmt'.$id?>><?=$correct['commentaire']?></textarea>
                          <button class="btn btn-xs btn-danger col-sm-12" onclick="Orientation('../control.param_access/ctr_questionnaire.php?Valide_correction&pond=<?=$selQst['ponderation']?>&idAfft=<?=$_GET['idAfft']?>&idRep=<?=$selRep['idReponse']?>&cote='+$('#<?='cote'.$id?>').val()+'&cmt='+$('#<?='cmt'.$id?>').val(),'#<?='resul'.$id?>','')">OK</button>
                          <div id=<?='resul'.$id?>></div>
                        </center>  
                      <?php
                    }
                    ?>
                </div>
            <?php
        $nrep++;
        }
        ?>
    </div>
        
        <?php
        $nub++;
    }else{
            ?>
      <div class="col-sm-12  " style="border: 2px dashed rgba(174, 174, 174, 0.4) margin:botton:15px" >
      <div id="clef" name="clef" style="color:white">
      
        <?php
        $asstion = new crs_assertion();
         $Tbasstion = $asstion->selectionnerByQst($selQst['idQuestion']);
         $tura=1;
         foreach($Tbasstion as $selAzioni){
              if($tura==1){
            ?>
              <input style="height:0px; width:0px; border: 0px solid transparent" disabled  id="modif1<?=$nub?>" value='<?=$selAzioni['idAssertion']?>'/>
            <?php
            $tura++;
              }else if($tura==2){
            ?>
              <input style="height:0px; width:0px; border: 0px solid transparent"  disabled  id="modif2<?=$nub?>" value='<?=$selAzioni['idAssertion']?>'/>
            <?php
             $tura++; 
              }else if($tura==3){
            ?>
              <input style="height:0px; width:0px; border: 0px solid transparent"  disabled  id="modif3<?=$nub?>" value='<?=$selAzioni['idAssertion']?>'/>
            <?php
            $tura++;
              }else if($tura==4){
            ?>
              <input style="height:0px; width:0px; border: 0px solid transparent"  disabled  id="modif4<?=$nub?>" value='<?=$selAzioni['idAssertion']?>'/>
            <?php
             $tura++; 
              }else if($tura==5){
            ?>
              <input style="height:0px; width:0px; border: 0px solid transparent"  disabled  id="modif5<?=$nub?>" value='<?=$selAzioni['idAssertion']?>'/>
            <?php
            $tura++;
              }else if($tura==6){
            ?>
              <input style="height:0px; width:0px; border: 0px solid transparent"  disabled  id="modif6<?=$nub?>" value='<?=$selAzioni['idAssertion']?>'/>
            <?php
             $tura++; 
              }

         }

        ?>
        </div>
        <div id=<?='QuestC'.$nub?> name=<?='QuestC'.$nub?> >
                <labelle for=<?='qstC'.$nub?> class="col-sm-12" style="font-size:20px"> Question :<?=$nub?></labelle>
                <form id="<?='fseria'.$nub?>" name="<?='fseria'.$nub?>">
                  <textarea  id=<?='qstC'.$nub?>  name=<?='qstC'.$nub?>  class="textarea"  cols="140"><?=$selQst['question']?></textarea>
                </form>

            <?php
           
            $tur=1;
            ?>

            <?php
             $Tbasstion2 = $asstion->selectionnerByQst($selQst['idQuestion']);
            foreach($Tbasstion2 as $selAss){
               
                if($tur==1){
                    
                ?>
                     <div class="col-sm-4"  style="border: 1px dashed hsl(48, 100%, 41%)">
                        <input id=<?='asCk1'.$nub?> type='checkbox' onclick="$(this).val()=='on'?value='checked':value='on'" value="<?=($selAss['correctAssertion']==1)?'checked':'on';?>" <?=($selAss['correctAssertion']==1)?'checked':'on';?>   />
                        <input id=<?='ass1'.$nub?> type="text" class="form-control" value="<?=$selAss['assertion']?>" />
                    </div>

                <?php
                 $idasCk1=$selAss['idAssertion'];
                $tur++;
                }else  if($tur==2){
                    
                ?>
                      <div class="col-sm-4"   style="border: 1px dashed gray">
                        <input id=<?='asCk2'.$nub?> type='checkbox' onclick="$(this).val()=='on'?value='checked':value='on'" value="<?=($selAss['correctAssertion']==1)?'checked':'on';?>" <?=($selAss['correctAssertion']==1)?'checked':'on';?>   />
                        <input  id=<?='ass2'.$nub?> type="text"  class="form-control" value="<?=$selAss['assertion']?>" />
                    </div>

                <?php
                 $idasCk2=$selAss['idAssertion'];
                $tur++;
                }else  if($tur==3){
                    
                ?>
                      <div class="col-sm-4"  style="border: 1px dashed hsl(48, 100%, 41%)">
                        <input id=<?='asCk3'.$nub?> type='checkbox' onclick="$(this).val()=='on'?value='checked':value='on'" value="<?=($selAss['correctAssertion']==1)?'checked':'on';?>" <?=($selAss['correctAssertion']==1)?'checked':'on';?>   />
                        <input id=<?='ass3'.$nub?> type="text" class="form-control" value="<?=$selAss['assertion']?>" />
                    </div>

                <?php
                 $idasCk3=$selAss['idAssertion'];
                $tur++;
                }else  if($tur==4){
                    
                ?>
                       <div class="col-sm-4"  style="border: 1px dashed hsl(48, 100%, 41%)" >
                        <input id=<?='asCk4'.$nub?> type='checkbox' onclick="$(this).val()=='on'?value='checked':value='on'" value="<?=($selAss['correctAssertion']==1)?'checked':'on';?>" <?=($selAss['correctAssertion']==1)?'checked':'on';?>   />
                        <input id=<?='ass4'.$nub?> type="text"  class="form-control" value="<?=$selAss['assertion']?>" />
                    </div>

                <?php
                 $idasCk4=$selAss['idAssertion'];
                $tur++;
                }else  if($tur==5){
                    
                ?>
                     <div class="col-sm-4"  style="border: 1px dashed hsl(48, 100%, 41%)">
                        <input id=<?='asCk5'.$nub?> type='checkbox' onclick="$(this).val()=='on'?value='checked':value='on'" value="<?=($selAss['correctAssertion']==1)?'checked':'on';?>" <?=($selAss['correctAssertion']==1)?'checked':'on';?>   />
                        <input id=<?='ass5'.$nub?> type="text" class="form-control" value="<?=$selAss['assertion']?>" />
                    </div> 

                <?php
                 $idasCk5=$selAss['idAssertion'];
                $tur++;
                }else  if($tur==6){
                    
                ?>
                      <div class="col-sm-4"  style="border: 1px dashed hsl(48, 100%, 41%)">
                        <input id=<?='asCk6'.$nub?> type='checkbox' onclick="$(this).val()=='on'?value='checked':value='on'" value="<?=($selAss['correctAssertion']==1)?'checked':'on';?>" <?=($selAss['correctAssertion']==1)?'checked':'on';?>   />
                        <input id=<?='ass6'.$nub?> type="text" class="form-control" value="<?=$selAss['assertion']?>" />
                    </div> 

                <?php
                 $idasCk6=$selAss['idAssertion'];
                $tur++;
                }
     }
        
        ?>
        <!-- <input  id=<?='pond'.$nub?> type="text" placeholder="Point" value='<?=$selQst['ponderation']?>'/>
    
          <div class="col-sm-12">
              <button onclick="showme1('#clef');Orientation('../control.param_access/ctr_questionnaire.php?idDev=<?=$_GET['iddv']?>&n=<?=$nub?>&modifQst=<?=$selQst['idQuestion']?>&AjoutQstCh&INTERDIT&idqstC=<?='qstC'.$nub?>&idass1=<?=$idasCk1?>&idass2=<?=$idasCk2?>&idass3=<?=$idasCk3?>&idass4=<?=$idasCk4?>&idass5=<?=$idasCk5?>&idass6=<?=$idasCk6?>&idasCk1=<?=$idasCk1?>&idasCk2=<?=$idasCk2?>&idasCk3=<?=$idasCk3?>&idasCk4=<?=$idasCk4?>&idasCk5=<?=$idasCk5?>&idasCk6=<?=$idasCk6?>&idqst=<?=$selQst['idQuestion']?>&n=<?=$nub?>&form=<?='qstC'.$nub?>&idpond=<?='pond'.$nub?>&pond='+$('#pond'+<?=$nub?>).val()
                +'&asCk1='+$('#asCk1'+<?=$nub?>).val()
                +'&ass1='+$('#ass1'+<?=$nub?>).val()
                +'&asCk2='+$('#asCk2'+<?=$nub?>).val()
                +'&ass2='+$('#ass2'+<?=$nub?>).val()
                +'&ass3='+$('#ass3'+<?=$nub?>).val()
                +'&asCk3='+$('#asCk3'+<?=$nub?>).val()
                +'&asCk4='+$('#asCk4'+<?=$nub?>).val()
                +'&ass4='+$('#ass4'+<?=$nub?>).val()
                +'&asCk5='+$('#asCk5<?=$nub?>').val()
                +'&ass5='+$('#ass5'+<?=$nub?>).val()
                +'&asCk6='+$('#asCk6'+<?=$nub?>).val()
                +'&ass6='+$('#ass6'+<?=$nub?>).val()
                +'&modif1='+$('#modif1<?=$nub?>').val()
                +'&modif2='+$('#modif2<?=$nub?>').val()
                +'&modif3='+$('#modif3<?=$nub?>').val()
                +'&modif4='+$('#modif4<?=$nub?>').val()
                +'&modif5='+$('#modif5<?=$nub?>').val()
                +'&modif6='+$('#modif6<?=$nub?>').val(),'#<?='QuestC'.$nub?>','#<?='fseria'.$nub?>')"  class="btn btn-danger pull-right  col-sm-2 col-lg-2 col-xs-2">Valider Question :<?=$nub?></button>
        </div> -->
      </div>
    </div>
    <table>
     <!--  -->
        <?php
        include_once('../model.param_access/crs_reponsec.class.php');
        $repondi = new crs_reponsec();
        $repondi = $repondi->selectionnerByQstAvecEleveClass($selQst['idQuestion'],$_GET['idClasse']);
        $nrep=0;
        $tour=1;
        foreach($repondi as $selRep){
          $id =$nrep.$selQst['idQuestion'];
          ?>
            <?php
            if($tour==1){ echo '<tr>';}
            ?>
              <td style='width:100px'>
                 <center  style="border: 1px solid white; padding:1px; font-size:9px">
                            <label class=""> <?=$selRep['nomUtilisateur'].' '.$selRep['postnomUtilisateur'].' '.$selRep['prenomUtilisateur']?></li>
                            <label class=""><?=$selRep['genre']?></label>
                            <img class="col-sm-12" src="<?='../images/'.$selRep['photoUtilisateur']?>">     
                  </center>    
                  <center style="height:100%; width:100%; font-size:9px">
                            <?php
                            if($selRep['correctAssertion']==1){
                                ?>
                                  <label>REUSSI : <?=$selRep['assertion']?></label>
                                  <label style="color:green; font-size:19px"><?=$selRep['ponderation'].' sur '.$selRep['ponderation']?></label>
                                  
                                <?php

                            }else{
                              ?>
                              <label>ECHOUE : <?=$selRep['assertion']?></label>
                                  <label style="color:red; font-size:20px"><?='0 SUR '.$selRep['ponderation']?></label>
                            <?php
                            }
                            ?>
                          
                  </center>
               </td>
            <?php
            $tour++;
            if($tour==12){echo '<tr>'; $tour=1;}
            ?>
              
            <?php
        $nrep++;
        }
        ?>
      </table>
  
        <?php
        $nub++;
    }
}   

?>
<script>
$(function () {
$('.textarea').summernote()
})
</script>
