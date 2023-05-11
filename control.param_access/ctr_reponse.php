<?php
(empty($_SESSION))?session_start():'';
include('../model.param_access/crs_reponset.class.php');
include('../model.param_access/crs_reponsec.class.php');
include('../model.param_access/crs_assertion.class.php');
include('../model.param_access/crs_question.class.php');

$rpses = new crs_reponset();
$rpsesChoix = new crs_reponsec();
$asstion = new crs_assertion();
if(isset($_GET['AjouterRepCh'])){
    include('../model.param_access/suivie_remise_devoirs.class.php');
    $rms =new suivie_remise_devoirs();
    $rms->ajouter($_GET['idDevoir'],$_GET['idIns']);


    if($_GET['modifrep']=="undefined"){
        $Tbasstion = $asstion->selectionnerByQst($_GET['idQst']);
        $tur=1;
        // echo $_GET['idQst']."_".$_GET['IdAss']."_".$_GET['idIns'];
        $TbAE=$rpsesChoix->ajouter($_GET['IdAss'],$_GET['idIns']);

        echo " <div class='col-sm-12' style='color:green'>Vous avez repondi à la Question : ".$_GET['n']." Brovon! Reponse Validée :</div>";
         
        foreach($Tbasstion as $selAss){
        
            if($tur==1){
            ?>
                <div class="col-sm-4"  style="border: 1px dashed hsl(48, 100%, 41%)">
                    <input disabled id=<?='asCk1'.$_GET['n']?> type="checkbox" <?=($selAss['idAssertion']==$_GET['IdAss'])?'checked':'';?> />
                    <labelle disabled style="width:100%"  id=<?='ass1'.$_GET['n']?> type="text" class="form-control" ><?=$selAss['assertion']?></labelle>
                </div>

            <?php
            $tur++;
            }else  if($tur==2){
            ?>
                <div class="col-sm-4"   style="border: 1px dashed gray">
                    <input disabled id=<?='asCk2'.$_GET['n']?> type="checkbox" <?=($selAss['idAssertion']==$_GET['IdAss'])?'checked':'';?>  />
                    <labelle disabled style="width:100%"  id=<?='ass2'.$_GET['n']?> type="text"  class="form-control"><?=$selAss['assertion']?></labelle>
                </div>

            <?php
            $tur++;
            }else  if($tur==3){
            ?>
                <div class="col-sm-4"  style="border: 1px dashed hsl(48, 100%, 41%)">
                    <input disabled id=<?='asCk3'.$_GET['n']?> type="checkbox" <?=($selAss['idAssertion']==$_GET['IdAss'])?'checked':'';?>  />
                    <labelle disabled style="width:100%"  id=<?='ass3'.$_GET['n']?> type="text" class="form-control"> <?=$selAss['assertion']?></labelle>
                </div>

            <?php
            $tur++;
            }else  if($tur==4){
            ?>
                <div class="col-sm-4"  style="border: 1px dashed hsl(48, 100%, 41%)" >
                    <input disabled id=<?='asCk4'.$_GET['n']?> type="checkbox" <?=($selAss['idAssertion']==$_GET['IdAss'])?'checked':'';?>  />
                    <labelle disabled style="width:100%"  id=<?='ass4'.$_GET['n']?> type="text"  class="form-control"><?=$selAss['assertion']?></labelle>
                </div>

            <?php
            $tur++;
            }else  if($tur==5){
            ?>
                <div class="col-sm-4"  style="border: 1px dashed hsl(48, 100%, 41%)">
                    <input disabled id=<?='asCk5'.$_GET['n']?> type="checkbox" <?=($selAss['idAssertion']==$_GET['IdAss'])?'checked':'';?>  />
                    <labelle disabled style="width:100%"  id=<?='ass5'.$_GET['n']?> type="text" class="form-control"><?=$selAss['assertion']?></labelle>
                </div> 

            <?php
            $tur++;
            }else  if($tur==6){
            ?>
                <div class="col-sm-4"  style="border: 1px dashed hsl(48, 100%, 41%)">
                    <input disabled id=<?='asCk6'.$_GET['n']?> type="checkbox" <?=($selAss['idAssertion']==$_GET['IdAss'])?'checked':'';?>  />
                    <labelle disabled style="width:100%" id=<?='ass6'.$_GET['n']?> type="text" class="form-control"><?=$selAss['assertion']?></labelle>
                </div> 

            <?php
            $tur++;
            }
        }
        ?>   
         <labelle disabled style="color:green" > Reponse envoyée le <?=' '.$TbAE[1]?></labelle>
             <div style="height:8px"></div>    
        <?php     
    }else{
            echo "Autres action que soumission  lors de la validation n'es pas authorisee (ex: La modification) ";
    }

}else if(isset($_GET['AjouterRepTr'])){
     include('../model.param_access/suivie_remise_devoirs.class.php');
    $rms =new suivie_remise_devoirs();
    $rms->ajouter($_GET['idDevoir'],$_GET['idIns']);
     echo " <a style='color:green'>Brovon! Vous avez repondi à la Question [".$_GET['n']."].</a>";
    $rep='repT'.$_GET['n'];
    echo $_POST[$rep];
     if($_GET['modifrep']=="undefined"){
        $TbAE=$rpses->ajouter($_GET['idQst'],$_GET['idIns'],$_POST[$rep]);
         ?>
             <labelle disabled style="color:green" > Reponse envoyée le <?=' '.$TbAE[1]?></labelle>
             <div style="height:8px"></div>
         <?php
         
        }else{
       echo "Autres action que soumitre  lors de la validation ne sont pas encore eleborees";
    }
}else{
    echo "ECHEC QUESTIONNAIRE";
}


?>