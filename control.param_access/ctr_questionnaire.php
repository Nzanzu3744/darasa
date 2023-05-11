<?php
include('../model.param_access/crs_question.class.php');
include('../model.param_access/crs_assertion.class.php');
$qst = new crs_question();

if(isset($_GET['AjoutQstCh'])){
    // $_GET['modifQst'] = (isset($_GET['modifQst']))?$_GET['modifQst']:;
    if(!isset($_GET['INTERDIT'])){
        $idQest=$qst->ajouter($_GET['idDev'],$_POST['qstC'.$_GET['n']],$_GET['pond']);
        ?>
        <div id="clef" name="clef" style="color:white">
        
        <input disabled style="color:green" id="modifQst<?=$_GET['n']?>" value='<?=$idQest?>'/>
        <?php
          $ass = new crs_assertion();
                    if(!empty($_GET['ass1'])){
                    ?>
                    <input disabled  id="modif1<?=$_GET['n']?>" value='<?=$ass->ajouter($idQest,$_GET['ass1'],($_GET['asCk1']=='on')?0:1)?>'/>
                    <?php
                    }
                    if(!empty($_GET['ass2'])){
                      ?>
                    <input disabled  id="modif2<?=$_GET['n']?>" value='<?=$ass->ajouter($idQest,$_GET['ass2'],($_GET['asCk2']=='checked')?1:0)?>'/>
                    <?php
                    }
                    if(!empty($_GET['ass3'])){
                        ?>
                    <input disabled  id="modif3<?=$_GET['n']?>" value='<?=$ass->ajouter($idQest,$_GET['ass3'],($_GET['asCk3']=='checked')?1:0)?>'/>
                    <?php
                    }
                    if(!empty($_GET['ass4'])){
                         ?>
                    <input disabled  id="modif4<?=$_GET['n']?>" value='<?=$ass->ajouter($idQest,$_GET['ass4'],($_GET['asCk4']=='checked')?1:0)?>'/>
                    <?php
                    }
                    if(!empty($_GET['ass5'])){
                         ?>
                    <input disabled  id="modif5<?=$_GET['n']?>" value='<?=$ass->ajouter($idQest,$_GET['ass5'],($_GET['asCk5']=='checked')?1:0)?>'/>
                    <?php
                    }
                    if(!empty($_GET['ass6'])){
                         ?>
                    <input disabled  id="modif6<?=$_GET['n']?>" value='<?=$ass->ajouter($idQest,$_GET['ass6'],($_GET['asCk6']=='checked')?1:0)?>'/>
            </div> 
                    <?php
                    }        
    }else{
           $idQest=$qst->modifier($_GET['modifQst'],$_GET['idDev'],$_POST['qstC'.$_GET['n']],$_GET['pond']);                
     ?>
     <div id="clef" name="clef" style="color:white">
     
            <input disabled  id="modifQst<?=$_GET['n']?>" value='<?=$_GET['modifQst']?>'/>
            <?php
                    
                        
                        $ass = new crs_assertion();
                     
                         
                            if(!empty($_GET['ass1'])){
                                 $ass->modifier($_GET['modif1'],$_GET['modifQst'],$_GET['ass1'],($_GET['asCk1']=='on')?0:1);
                            }
                                ?>
                                <input disabled  id="modif1<?=$_GET['n']?>" value='<?=$_GET['modif1']?>'/>
                                <?php
                            
                        
                       
                            if(!empty($_GET['ass2'])){
                             $ass->modifier($_GET['modif2'],$_GET['modifQst'],$_GET['ass2'],($_GET['asCk2']=='on')?0:1);
                            }
                                ?>
                                <input disabled  id="modif2<?=$_GET['n']?>" value='<?=$_GET['modif2']?>'/>
                                <?php
                                
                            
                        
                       
                            if(!empty($_GET['ass3'])){
                                 $ass->modifier($_GET['modif3'],$_GET['modifQst'],$_GET['ass3'],($_GET['asCk3']=='on')?0:1);
                            }
                                ?>
                                <input disabled  id="modif3<?=$_GET['n']?>" value='<?=$_GET['modif3']?>'/>
                                <?php
                            
                        
                        
                            if(!empty($_GET['ass4'])){
                             $ass->modifier($_GET['modif4'],$_GET['modifQst'],$_GET['ass4'],($_GET['asCk4']=='on')?0:1);
                            }
                                ?>
                                <input disabled  id="modif4<?=$_GET['n']?>" value='<?=$_GET['modif4']?>'/>
                                <?php
                            
                       

                       
                            if(!empty($_GET['ass5'])){
                                 $ass->modifier($_GET['modif5'],$_GET['modifQst'],$_GET['ass5'],($_GET['asCk5']=='on')?0:1);
                            }
                                ?>
                                <input disabled  id="modif5<?=$_GET['n']?>" value='<?=$_GET['modif5']?>'/>
                                <?php
                            
                        

                      

                        if(!empty($_GET['ass6'])){
                           $ass->modifier($_GET['modif6'],$_GET['modifQst'],$_GET['ass6'],($_GET['asCk6']=='on')?0:1);
                        }
                               ?>
                            <input disabled  id="modif6<?=$_GET['n']?>" value='<?=$_GET['modif6']?>'/>
                 </div>
                 <?php                       
                    
    }
    include_once('../vue.param_access/form_questionnaire_valide.php');

}else if(isset($_GET['AjoutQstTr'])){
    // $_GET['modifQst'] = (isset($_GET['modifQst']))?$_GET['modifQst']:$_GET['idQt'];
     if(!isset($_GET['INTERDIT'])){
        $idQest = $qst->ajouter($_GET['idDev'],$_POST['qstT'.$_GET['n']],$_GET['pond']);   
         ?>
            <input disabled style="color:green" id="modifQst<?=$_GET['n']?>" value='<?=$idQest?>'/>
        <?php
         
        }else{
            //idDev difficile a explique la reseau detre Ouups!
            $iddev = ($_GET['idDev']!='undefined')?$_GET['idDev']:$_GET['idvv'];
           
        echo $qst->modifier($_GET['modifQst'],$iddev ,$_POST['qstT'.$_GET['n']],$_GET['pond']);   
         ?>
            <input disabled style="color:green" id="modifQst<?=$_GET['n']?>" value='<?=$_GET['modifQst']?>'/>
        <?php
    }
    include_once('../vue.param_access/form_questionnaire_valide.php');
}else if(isset($_GET['Liredevoirs_ense'])){
        include_once('../vue.param_access/form_questionnaire_mod.php');
 }else if(isset($_GET['Correctdevoirs_ense'])){
        include_once('../vue.param_access/form_questionnaire_correction.php');
 }else if(isset($_GET['Valide_correction'])){
    include('../model.param_access/crs_correction.class.php');
    $correct = new crs_correction();
    return $correct->ajouter($_GET['idRep'],$_GET['idAfft'],$_GET['cote'],$_GET['cmt'],$_GET['pond']); 
 }else{
    echo "ECHEC QUESTIONNAIRE";
}





?>

