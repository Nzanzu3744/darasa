<!--  -->
<script src="../jquery/dist/summernote/summernote-bs4.min.js"></script>
<!--  -->
<?php
(empty($_SESSION))?session_start():'';
    include_once('../model.param_access/crs_question.class.php');
    include_once('../model.param_access/crs_devoirs.class.php');
    include_once('../model.param_access/crs_assertion.class.php');
    include_once('../model.param_access/crs_reponset.class.php');
    include_once('../model.param_access/crs_reponsec.class.php');
    $pTotal=0;
    $dev = new crs_devoirs();
    $devv=$dev->rechercherr($_GET['iddv']);

    $seldev=$devv->fetch();
  
    $qst = new crs_question();
    $qst = $qst->selectionnerByIdDevASC($_GET['iddv']);
   
    ?>
     <center class="col-sm-12 titres" style="font-size:20px; margin-bottom:10px" >QUESTIONNAIRE DEVOIR DU COURS <?=" <b>[ ".$_GET['cours']."]</b> à  ".$_GET['maClasse']?> (COTE ELEVE) ID DEVOIR:<?="" .$seldev['idDevoir'].' CREER LE <b>'.$seldev['dateCreation'].' </b>A REMETRE LE <b>'.$seldev['dateRemise'].'</b>'?></center>

<!--  -->
<div class=" table-responsive well" style="height:600px">

    <?php
    $verif = new crs_assertion();
    $Cpt=1;
    foreach($qst as $selQst){

            $ver = $verif->verification($selQst['idQuestion']);
            $veri =$ver->fetch();
                if(empty($veri['idAssertion'])){
                    ?>
                    <form class="form-inline col-sm-12" id="<?='reponsT'.$Cpt?>" name="<?='reponsT'.$Cpt?>">
                            <labelle for=<?='qstT'.$Cpt?> class="col-sm-12 titres" style="font-size:20px"> Question :<?=$Cpt?> [Sur <?=$selQst['ponderation']?>_point(s)]</labelle>
                            <div class="col-sm-12" style="font-size:20px">
                            <?php
                            echo html_entity_decode($selQst['question']);
                            $repondi = new crs_reponset();
                            $repondi = $repondi->selectionnerByQstUti($selQst['idQuestion'],$_SESSION['idUtilisateur'])->fetch();
                            if($repondi==true){
                                echo " <a style='color:green'>Vous avez repondi à la Question ".$Cpt." Brovon! Reponse Validée :</a>";
                                echo html_entity_decode($repondi['reponse']);
                                ?>
                            </form>
                             <div disabled style="color:green" > Reponse envoyée le <?=' '.$repondi['dateCreation']?></div>
                            <?php
                            }else{
                                 
                            ?>
                            <div id=<?='reponsesssT'.$Cpt?>>
                                <a style='color:red'>Veuillez repondre à la Question .<?=" ".$Cpt?>. ci-haut.</a>
                                <textarea class="textarea " name="<?='repT'.$Cpt?>"  ></textarea>
                              
                
                            <div class="col-sm-12">
                                <input onclick="Orientation('../control.param_access/ctr_reponse.php?n=<?=$Cpt?>&idDevoir=<?=$seldev['idDevoir']?>&modifrep='+$('#modifrep<?=$Cpt?>').val()+'&idQst=<?=$selQst['idQuestion']?>&iddv=<?=$_GET['iddv']?>&AjouterRepTr=true','<?='#reponsesssT'.$Cpt?>','<?='#reponsT'.$Cpt?>')"  class="btn btn-success pull-right  col-sm-1" value='Valider'/>
                            </div>
                    </div>   
                    
                    <?php
                    }
                    ?>
                    <?php
                    $pTotal=$pTotal+$selQst['ponderation'];
                    $Cpt++;
                }else{
                    ?>

                    <labelle for=<?='qstT'.$Cpt?> class="col-sm-12 titres" style="font-size:40px"> Question :<?=$Cpt?> [Sur <?=$selQst['ponderation']?>_point(s)]</labelle>
                        <div class="col-sm-12" style="font-size:20px">
                            <?php
                            echo html_entity_decode($selQst['question']);
                            ?>
                        </div>

                    <?php

                    $asstion = new crs_assertion();
                    $Tbasstion = $asstion->selectionnerByQst($selQst['idQuestion']);
                    $tur=1;
                    $repondi = new crs_reponsec();
                    $repondi = $repondi->selectionnerByQstUti($selQst['idQuestion'],$_SESSION['idUtilisateur'])->fetch();
                    if($repondi==true){
                        echo " <div class='col-sm-12' style='color:green'>Vous avez repondi à la Question : ".$Cpt." Brovon! Reponse Validée :</div>";

                        foreach($Tbasstion as $selAss){
                        
                            if($tur==1){
                            ?>
                                <div class="col-sm-4"  style="border: 1px dashed hsl(48, 100%, 41%)">
                                    <input disabled id=<?='asCk1'.$Cpt?> type="checkbox" <?=($selAss['idAssertion']==$repondi['idAssertion'])?'checked':'';?> />
                                    <labelle disabled style="width:100%"  id=<?='ass1'.$Cpt?> type="text" class="form-control" ><?=$selAss['assertion']?></labelle>
                                </div>

                            <?php
                            $tur++;
                            }else  if($tur==2){
                            ?>
                                <div class="col-sm-4"   style="border: 1px dashed gray">
                                    <input disabled id=<?='asCk2'.$Cpt?> type="checkbox" <?=($selAss['idAssertion']==$repondi['idAssertion'])?'checked':'';?>  />
                                    <labelle disabled style="width:100%"  id=<?='ass2'.$Cpt?> type="text"  class="form-control"><?=$selAss['assertion']?></labelle>
                                </div>

                            <?php
                            $tur++;
                            }else  if($tur==3){
                            ?>
                                <div class="col-sm-4"  style="border: 1px dashed hsl(48, 100%, 41%)">
                                    <input disabled id=<?='asCk3'.$Cpt?> type="checkbox" <?=($selAss['idAssertion']==$repondi['idAssertion'])?'checked':'';?>  />
                                    <labelle disabled style="width:100%"  id=<?='ass3'.$Cpt?> type="text" class="form-control"> <?=$selAss['assertion']?></labelle>
                                </div>

                            <?php
                            $tur++;
                            }else  if($tur==4){
                            ?>
                                <div class="col-sm-4"  style="border: 1px dashed hsl(48, 100%, 41%)" >
                                    <input disabled id=<?='asCk4'.$Cpt?> type="checkbox" <?=($selAss['idAssertion']==$repondi['idAssertion'])?'checked':'';?>  />
                                    <labelle disabled style="width:100%"  id=<?='ass4'.$Cpt?> type="text"  class="form-control"><?=$selAss['assertion']?></labelle>
                                </div>

                            <?php
                            $tur++;
                            }else  if($tur==5){
                            ?>
                                <div class="col-sm-4"  style="border: 1px dashed hsl(48, 100%, 41%)">
                                    <input disabled id=<?='asCk5'.$Cpt?> type="checkbox" <?=($selAss['idAssertion']==$repondi['idAssertion'])?'checked':'';?>  />
                                    <labelle disabled style="width:100%"  id=<?='ass5'.$Cpt?> type="text" class="form-control"><?=$selAss['assertion']?></labelle>
                                </div> 

                            <?php
                            $tur++;
                            }else  if($tur==6){
                            ?>
                                <div class="col-sm-4"  style="border: 1px dashed hsl(48, 100%, 41%)">
                                    <input disabled id=<?='asCk6'.$Cpt?> type="checkbox" <?=($selAss['idAssertion']==$repondi['idAssertion'])?'checked':'';?>  />
                                    <labelle disabled style="width:100%" id=<?='ass6'.$Cpt?> type="text" class="form-control"><?=$selAss['assertion']?></labelle>
                                </div> 

                            <?php
                            $tur++;
                            }
                        }
                        ?>
                         <div><labelle disabled style="color:green" >Assertion selectionnée le<?=' '.$repondi['dateCreation']?></div>
                         <?php

                        }else{
                        echo "<div id='reponsesssCh".$Cpt."' name='reponsesssCh".$Cpt."'> ";
                            echo "<div class='col-sm-12' style='color:red'>Veuillez repondre à la Question ".$Cpt." ci-haut en cochant la case au dessus de la bonne réponse.</div>";
                            foreach($Tbasstion as $selAss){
                            
                                if($tur==1){
                                ?>
                                    <div class="col-sm-4"  style="border: 1px dashed hsl(48, 100%, 41%)">
                                        <input onclick=" Orientation('../control.param_access/ctr_reponse.php?n=<?=$Cpt?>&idDevoir=<?=$seldev['idDevoir']?>&modifrep='+$('#modAss1<?=$Cpt?>').val()+'&idQst=<?=$selQst['idQuestion']?>&AjouterRepCh=true&assertion=<?=$tur?>&IdAss=<?=$selAss['idAssertion']?>','<?='#reponsesssCh'.$Cpt?>','')"  id=<?='asCk1'.$Cpt?> type="checkbox"/>
                                        <labelle disabled style="width:100%" id=<?='ass1'.$Cpt?> type="text" class="form-control"> <?=$selAss['assertion']?></labelle>                                   </div>

                                <?php
                                $tur++;
                                }else  if($tur==2){
                                ?>
                                    <div class="col-sm-4"   style="border: 1px dashed gray">
                                        <input onclick=" Orientation('../control.param_access/ctr_reponse.php?n=<?=$Cpt?>&idDevoir=<?=$seldev['idDevoir']?>&modifrep='+$('#modAss2<?=$Cpt?>').val()+'&idQst=<?=$selQst['idQuestion']?>&AjouterRepCh=true&assertion=<?=$tur?>&IdAss=<?=$selAss['idAssertion']?>','<?='#reponsesssCh'.$Cpt?>','')"   id=<?='asCk2'.$Cpt?> type="checkbox" />
                                        <labelle disabled  style="width:100%" id=<?='ass2'.$Cpt?> type="text"  class="form-control" ><?=$selAss['assertion']?> </labelle>
                                    </div>

                                <?php
                                $tur++;
                                }else  if($tur==3){
                                ?>
                                    <div class="col-sm-4"  style="border: 1px dashed hsl(48, 100%, 41%)">
                                        <input onclick=" Orientation('../control.param_access/ctr_reponse.php?n=<?=$Cpt?>&idDevoir=<?=$seldev['idDevoir']?>&modifrep='+$('#modAss3<?=$Cpt?>').val()+'&idQst=<?=$selQst['idQuestion']?>&AjouterRepCh=true&assertion=<?=$tur?>&IdAss=<?=$selAss['idAssertion']?>','<?='#reponsesssCh'.$Cpt?>','')"   id=<?='asCk3'.$Cpt?> type="checkbox" />
                                        <labelle disabled style="width:100%" id=<?='ass3'.$Cpt?> type="text" class="form-control" value="<?=$selAss['assertion']?>" /></labelle>                                   </div>

                                <?php
                                $tur++;
                                }else  if($tur==4){
                                ?>
                                    <div class="col-sm-4"  style="border: 1px dashed hsl(48, 100%, 41%)" >
                                        <input  onclick=" Orientation('../control.param_access/ctr_reponse.php?n=<?=$Cpt?>&idDevoir=<?=$seldev['idDevoir']?>&modifrep='+$('#modAss4<?=$Cpt?>').val()+'&idQst=<?=$selQst['idQuestion']?>&AjouterRepCh=true&assertion=<?=$tur?>&IdAss=<?=$selAss['idAssertion']?>','<?='#reponsesssCh'.$Cpt?>','')"   id=<?='asCk4'.$Cpt?> type="checkbox"  />
                                        <labelle disabled style="width:100%" id=<?='ass4'.$Cpt?> type="text"  class="form-control"><?=$selAss['assertion']?></labelle>                                    </div>

                                <?php
                                $tur++;
                                }else  if($tur==5){
                                ?>
                                    <div class="col-sm-4"  style="border: 1px dashed hsl(48, 100%, 41%)">
                                        <input onclick=" Orientation('../control.param_access/ctr_reponse.php?n=<?=$Cpt?>&idDevoir=<?=$seldev['idDevoir']?>&modifrep='+$('#modAss5<?=$Cpt?>').val()+'&idQst=<?=$selQst['idQuestion']?>&AjouterRepCh=true&assertion=<?=$tur?>&IdAss=<?=$selAss['idAssertion']?>','<?='#reponsesssCh'.$Cpt?>','')"   id=<?='asCk5'.$Cpt?> type="checkbox"/>
                                        <labelle disabled style="width:100%" id=<?='ass5'.$Cpt?> type="text" class="form-control"><?=$selAss['assertion']?></labelle>                                   </div> 

                                <?php
                                $tur++;
                                }else  if($tur==6){
                                ?>
                                    <div class="col-sm-4"  style="border: 1px dashed hsl(48, 100%, 41%)">
                                        <input onclick=" Orientation('../control.param_access/ctr_reponse.php?n=<?=$Cpt?>&idDevoir=<?=$seldev['idDevoir']?>&modifrep='+$('#modAss6<?=$Cpt?>').val()+'&idQst=<?=$selQst['idQuestion']?>&AjouterRepCh=true&assertion=<?=$tur?>&IdAss=<?=$selAss['idAssertion']?>','<?='#reponsesssCh'.$Cpt?>','')"   id=<?='asCk6'.$Cpt?> type="checkbox"/>
                                        <labelle disabled style="width:100%" id=<?='ass6'.$Cpt?> type="text" class="form-control"><?=$selAss['assertion']?></labelle>                                   </div> 

                                <?php
                                $tur++;
                                    }
                            }
                           
                            echo '</div>';
                        }
                                $pTotal=$pTotal+$selQst['ponderation'];
                                ?>
                                <div class="col-sm-12">
                                <hr style="background:4px solid red">
                                </div>
                                </div>
                                <?php
                                $Cpt++;
                    }
        
    }   
?>
<mark> NB :<i>La Validation est authomatique après selection de l'assertion</i></mark><br>
<mark>Ponderation Total : <?=$pTotal?>_Point(s)</mark>
<script>
$(function () {
$('.textarea').summernote()
})
</script>

