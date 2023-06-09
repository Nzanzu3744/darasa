<?php
(empty($_SESSION))?session_start():'';
include_once('../model.param_access/crs_question.class.php');
include_once('../model.param_access/crs_devoirs.class.php');
include_once('../model.param_access/crs_assertion.class.php');
include_once('../model.param_access/crs_reponset.class.php');
include_once('../model.param_access/crs_reponsec.class.php');
include_once('../model.param_access/crs_correction.class.php');
include_once('../model.param_access/param_utilisateur.Class.php');
include_once('../model.param_access/crs_cours.class.php');
include_once('../model.param_access/suivie_remise_devoirs.class.php');

$editeur = new param_utilisateur();
$editeur = $editeur->selectionnerUtByCrs($_GET['idCours'])->fetch();
$pondToutDevoir=0.0;
?>
<div style="border: 1px solid black; padding:10px; font: size 12px; margin:10px; background:white" class="col-sm-12">
<!-- <button class="pull-right btn btn-warning" onclick="Orientation('../control.param_access/ctr_cours.php?VueCours&idAnneeSco=<?=$_GET['idAnneeSco']?>&idAfft=<?=$_GET['idAfft']?>&maClasse=<?=$_GET['maClasse']?>&idClasse=<?=$_GET['idCls']?>','#editLeco')"> RETOUR</button>
<button class="pull-right btn btn-default" onclick="Encour()"> Emprimer</button> -->
    <div style="desplay:inline-block  " class="col-sm-12 col-lg-12">
        <!-- <img class="col-sm-1 col-sm-1 col-dl-1 col-xs-1 col-lg-1" src="../images/lgndg.PNG" style="width:200px; height:100px"/> -->
            <div style="margin-top:5px;" class="col-sm-10 col-sm-10 col-dl-10 col-xs-10 col-lg-10">
                    <span class=""><b>COMPLEXE SCOLAIRE NOTRE DAME DE GRACES</b></span><br>
                    <span class=""><b>DEVISE</b></span><br>
                    <span class="">  <b>BUNIA POLICE DE FRONTIERE</b></span><br>
                    <span class="">  <b>REPUBLIQUE DEMOCRATIQUE DU CONGO</b></span><br>
                    <span class=""><b> BP : 380/Bunia</b></span><br>          
                    <span class=""><b>Tel : 081XXXXXXXX</b></span><br>
                    <span class="">Mail "<?='<a>'.$editeur['mailUtilisateur'].'</a>'?></span><br>
            </div>
    </div>
   
    <!--  -->
    <div class="col-sm-12" style="">
        <b><center style="font-size:20px ; color:green; margin-left:5%; margin-top:5%"><b>GRILLE DE COTES DU COURS DE (D') <?=' '.$_GET['cours'].'</b><br>'.$_GET['maClasse'];?></center></b>
    </div>
    <!--  -->
    
 <div style="desplay:inline-block; " class="col-sm-12 col-lg-12">
 <b class="col-lg-12 col-sm-12 pull-left"> IDENTITE DE L'ENSEIGNANT(E)</b>
            <img class="col-sm-1 col-sm-1 col-dl-1 col-xs-1 col-lg-1" src="../images/<?=$editeur['photoUtilisateur']?>" style="width:120px; height:100px"/>
            <div style="margin-top:5px;" class="col-sm-10 col-sm-10 col-dl-10 col-xs-10 col-lg-10">
                    <span class=""> Nom : <b><b><?=$editeur['nomUtilisateur']?></b> Postnom : <b><?=$editeur['postnomUtilisateur']?></b></span><br>
                    <span class=""> Prenom : <b><?=$editeur['prenomUtilisateur']?></b></span>
                    <span class=""> Tel : : <b><?=$editeur['telUtilisateur']?></b></span><br>
                    <span class=""> Mail : <?='<a>'.$editeur['mailUtilisateur'].'</a>'?></span><br>
                    <span class=""> Genre : <b><?=$editeur['genre']?></b></span><br>          
            </div>
    </div>

        <!--  -->
    <table class="table table-bordered table-striped table-condensed">
        
            <thead>
                <tr>
                    <th style="background:WHITE" colspan="" >N</th>
                    <th style="background:WHITE; color:red" colspan="2" ><center>IDENTITE ELEVE<center></th>                

                <?php
                    $dv = new crs_devoirs();
                    $dv = $dv->selectionnerByCours($_GET['idCours'])->fetchAll();
                    
                    $tourPrev =1;
                    $TablIdDevoirs = array();
                    foreach($dv as $seldv){
                    array_push($TablIdDevoirs,$seldv['idDevoir']);
                    ?>

                        <th>
                            <?php 
                                $qstion = new crs_question();
                                $qstion = $qstion->selectionnerByIdDevASC($seldv['idDevoir']);
                                $pondDevoir=0.0;
                                foreach($qstion as $selqstion){
                                    $pondToutDevoir=$pondToutDevoir+$selqstion['ponderation'];
                                    $pondDevoir=$pondDevoir+$selqstion['ponderation'];

                                }
                                echo strtoupper($tourPrev++.') '.$seldv['indexation'].' ['.$seldv['idDevoir'].'] ');
                                $nremis =new suivie_remise_devoirs();
                                $nremis = $nremis->remis($seldv['idDevoir'],$_GET['idCours'],$_GET['idClasse']);
                                $nbrm=0;
                        
                                foreach($nremis as $selRm ){
                                    $nbrm++;
                                }
                                ?>
                                <center onclick="Orientation('../control.param_access/ctr_devoirs.php?listeRms=true&idDevoir=<?=$seldv['idDevoir']?>&Rmis','<?='#Rm'.$seldv['idDevoir']?>','')"> Remis : <?=$nbrm.' Point:'.$pondDevoir?> </center>

                    <?php
                    }
                    ?>
                    <td colspan="2">TOTAL SUR RESOLUTION</td>
                    <td colspan="2">TOTAL SUR TOUT LE DEVOIR</td>
                        </th>
                </tr>
            </thead>
        <tbody>
                <?php
                //SI IL NY A PAS DE DEVOIR A CE COUR NE CHECHER PAS
                if($TablIdDevoirs!=null){
                    $grd_tour_remis =new suivie_remise_devoirs();
                    $grd_tour_remis = $grd_tour_remis ->RemisToutEleve($_GET['idClasse'],$_GET['idCours']);
                    $cpt=0;

                    // $cote =new suivie_remise_devoirs();
                    // $cote = $cote ->RemisToutEleve($_GET['idClasse'],$_GET['idCours']);

                     foreach($grd_tour_remis  as $sel_grd_tour_remis){
                        $cpt++;
                        echo '<tr>';
                            echo '<td style="color:red">'.$cpt.'</td><td>'.$sel_grd_tour_remis['idUtilisateur'].'</td><td>'.$sel_grd_tour_remis['nomUtilisateur'].' '.$sel_grd_tour_remis['postnomUtilisateur'].' '.$sel_grd_tour_remis['prenomUtilisateur'].'</td>';
                            $aneeScoCreaCrs = new crs_cours();
                            $aneeScoCreaCrs = $aneeScoCreaCrs->rechercher($_GET['idCours'])->fetch();
                            $grd_tour_remis_encours =new suivie_remise_devoirs();
                            //REMISE DE CETTE ELEVE DANS CETTE CLASSE CETTE ANNEE SCOLAIRE POUR CE COURS.
                            $grd_tour_remis_encours = $grd_tour_remis_encours->remiseEleve($sel_grd_tour_remis['idUtilisateur'],$aneeScoCreaCrs['idClasse'],$aneeScoCreaCrs['idAnneeSco'],$_GET['idCours']);
                            $tourRel=0;
                            $coteTotal=0.0;
                            $pondTotalDevResolu=0.0;
                            
                            foreach($grd_tour_remis_encours as $sel_grd_tour_remis_encours){
                                // ICI ON TOURNE POUR COMPARAIS LES LECONS PAR RAPORT AUX REMISE DES ELEVES
                                $key=array_search($sel_grd_tour_remis_encours['idDevoir'],$TablIdDevoirs)-$tourRel;
                                
                                for($i=0; $i<=$key;$i++){
                                    $pTotal=0.0;
                                   
                                     // VERIFI SI LA REMISE EST LE POINT DE RELATION ENTRE LE DEVOIR ET L'ELEVE.
                                    if($i===$key){
                                       //////Debut Calcul de point Obtenu
                                        
                                        $qst = new crs_question();
                                        $qst = $qst->selectionnerByIdDevASC($sel_grd_tour_remis_encours['idDevoir']);
                                        $nbQst=0;
                                        $nbRps=0;
                                        $coteEleDev=0.0;
                                        foreach($qst as $selQst){
                                             $verif = new crs_assertion();
                                            $ver = $verif->verification($selQst['idQuestion']);
                                            $veri =$ver->fetch();
                                            $infoQRCA='';
                                                if(empty($veri['idAssertion'])){
                                                            $repondi = new crs_reponset();
                                                            $repondi = $repondi->selectionnerByQstUti($selQst['idQuestion'],$sel_grd_tour_remis['idUtilisateur']);

                                                            $avoirRepo=false;
                                                            
                                                            foreach($repondi as $repondi){
                                                                if( $repondi['idAnneeScoEval']==$repondi['idAnneeScoRep'] AND $repondi['idClasseEval']==$_GET['idClasse']){
                                                                    $avoirRepo=true;
                                                                    $correct = new crs_correction();
                                                                    $correct=$correct->selectionnerByRep($repondi['idReponse'])->fetch();
                                                                    if(is_array($correct)){
                                                                    $coteEleDev=$coteEleDev+$correct['cote'];
                                                                    $coteTotal= $coteTotal+$correct['cote'];
                                                                    }
                                                                    $nbRps++;
                                                                    $infoQRCA= 'Eval='.$repondi['idAnneeScoEval'].'REp'.$repondi['idAnneeScoRep'].'CalssEva='. $repondi['idClasseEval'].'ClasseRep='.$_GET['idClasse'];
                                                                    }

                                                    }  
                                                    $pTotal=$pTotal+$selQst['ponderation'];
                                                    
                                                    $nbQst++;
                                                }else{

                                                
                                                    $asstion = new crs_assertion();
                                                    //selectionner l'assertion choisie encore la bonne 
                                                    $Tbasstion = $asstion->selectionnerByQst($selQst['idQuestion'])->fetch();
                                                    $tur=1;
                                                    $repondi = new crs_reponsec();
                                                    $repondi = $repondi->selectionnerByQstUti($selQst['idQuestion'],$sel_grd_tour_remis['idUtilisateur']);
                                                    $avoirRepo=false;
                                          
                                                    foreach($repondi as $repondi){
                                                        if( $repondi['idAnneeScoEval']==$repondi['idAnneeScoRep'] AND $repondi['idClasseEval']==$_GET['idClasse']){
                                                            $avoirRepo=true;
                                              
                                                                if($Tbasstion['idAssertion']==$repondi['idAssertion']){
                                                                    $coteEleDev=$coteEleDev+$selQst['ponderation'];
                                                                    $coteTotal=$coteTotal+$selQst['ponderation'];
                                                                    $nbRps++;;
                                                                    $infoQRCA= 'Eval='.$repondi['idAnneeScoEval'].'REp'.$repondi['idAnneeScoRep'].'CalssEva='. $repondi['idClasseEval'].'ClasseRep='.$_GET['idClasse'];
                                                                }

                                                        }

                                                    }
                                                                $pTotal=$pTotal+$selQst['ponderation'];
                                                                
                                                                $nbQst++;
                                                    }
                                                     
                                                    
                                        }
                                        
                                        
                                                   $moyenCote=($pTotal/2);
                                                   $cote =$coteEleDev.'/'.$pTotal;
                                                    if($coteEleDev>=$moyenCote AND $coteEleDev<=$pTotal){
                                                         echo '<td style="color:green; font-size:18px">'.$cote .'</td>';
                                                    }elseif($coteEleDev>=0 AND $coteEleDev<$moyenCote){
                                                         echo '<td style="color:red; font-size:18px">'.$cote .'</td>';
                                                        
                                                    }elseif($coteEleDev<0){
                                                         echo '<td style="color:yellow; font-size:18px">'.$cote .'</td>';

                                                    }elseif($coteEleDev>$pTotal){
                                                         echo '<td style="color:pink; font-size:18px">'.$cote .'</td>';

                                                    }else{
                                                        echo '<td style="color:yellow; font-size:18px">Erreur</span></td>';
                                                    }
                                        
                                      
                                    ///////Fin calcule de point obtenu


                                        echo '</span></td>';
                                    }else{
                                        echo '<td style="color:red; font-size:18px"><span class="glyphicon glyphicon-remove"></span></td>';
                                    }
                                    $pondTotalDevResolu=$pondTotalDevResolu+$pTotal;
                                    $tourRel++;
                                }
                               
                                
                        }
                         if($tourRel<$tourPrev){
                                    $Surp=$tourPrev-$tourRel;
                                        for($u=1;$u<$Surp;$u++){
                                            echo '<td style="color:red; font-size:18px"><span class="glyphicon glyphicon-remove"></span></td>';
                                        }

                                    }
                                    // 
                         $pondTotalDevResoluMoyen=($pondTotalDevResolu/2);
                         $coteResol=$coteTotal.'/'.$pondTotalDevResolu;
                         $PourcCoteResol=ROUND((($coteTotal*100)/$pondTotalDevResolu),2);
                        if($coteTotal>$pondTotalDevResoluMoyen AND $coteTotal<=$pondTotalDevResolu){
                                echo '<td style="color:green; font-size:18px">'.$coteResol.'</span></td>';
                                 echo '<td style="color:green; font-size:18px">'.$PourcCoteResol.'%</span></td>';
                        }elseif($coteTotal>=0 AND $coteTotal<=$pondTotalDevResoluMoyen){
                                echo '<td style="color:red; font-size:18px">'.$coteResol.'</span></td>';
                                 echo '<td style="color:red; font-size:18px">'.$PourcCoteResol.'%</span></td>';
                            
                        }elseif($coteTotal<0){
                                echo '<td style="color:yellow; font-size:18px">'.$coteResol.'</span></td>';
                                 echo '<td style="color:pink; font-size:18px">'.$PourcCoteResol.'%</span></td>';

                        }elseif($coteTotal>$pondTotalDevResolu){
                                echo '<td style="color:pink; font-size:18px">'.$coteResol.'</span></td>';
                                 echo '<td style="color:pink; font-size:18px">'.$PourcCoteResol.'%</span></td>';

                        }else{
                            echo '<td style="color:yellow; font-size:18px">Erreur'.$coteTotal.'</span></td>';
                             echo '<td style="color:yellow; font-size:18px">'.$PourcCoteResol.'%</span></td>';
                        }
                        // 
                         $pondToutDevMoyen=($pondToutDevoir/2);
                         $coteToutDevoir=$coteTotal.'/'.$pondToutDevoir;
                        $PourcCoteToutDev=ROUND((($coteTotal*100)/$pondToutDevoir),2);
                        if($coteTotal>$pondToutDevMoyen AND $coteTotal<=$pondToutDevoir){
                                echo '<td style="color:green; font-size:18px">'.$coteToutDevoir.'</span></td>';
                                 echo '<td style="color:green; font-size:18px">'.$PourcCoteToutDev.'%</span></td>';
                        }elseif($coteTotal>=0 AND $coteTotal<=$pondToutDevMoyen){
                                echo '<td style="color:red; font-size:18px">'.$coteToutDevoir.'</span></td>';
                                 echo '<td style="color:red; font-size:18px">'.$PourcCoteToutDev.'%</span></td>';
                            
                        }elseif($coteTotal<0){
                                echo '<td style="color:yellow; font-size:18px">'.$coteToutDevoir.'</span></td>';
                                 echo '<td style="color:pink; font-size:18px">'.$PourcCoteToutDev.'%</span></td>';

                        }elseif($coteTotal>$pondToutDevMoyen){
                                echo '<td style="color:pink; font-size:18px">'.$coteToutDevoir.'</span></td>';
                                 echo '<td style="color:pink; font-size:18px">'.$PourcCoteToutDev.'%</span></td>';

                        }else{
                            echo '<td style="color:yellow; font-size:18px">Erreur'.$coteTotal.'</span></td>';
                             echo '<td style="color:yellow; font-size:18px">'.$PourcCoteToutDev.'%</span></td>';
                        }
                       
                        
                        echo '</tr>';
                        }
                }
                ?>
        </tbody>
    </div>