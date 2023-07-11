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
$idCls=htmlspecialchars($_GET['idClasse']);
$idCrs01 = htmlentities($_GET['idCours']);
$editeur = new param_utilisateur();
$editeur = $editeur->selectionnerUtByCrs($idCrs01)->fetch();
$pondToutDevoir=0.0;
?>
<div style="border: 1px solid black" id='grille_point'>
<!-- <button class="pull-right btn btn-warning" onclick="Orientation('control.param_access/ctr_cours.php?VueCours&idAnneeSco=<?=$_GET['idAnneeSco']?>&idAfft=<?=$_GET['idAfft']?>&maClasse=<?=$_GET['maClasse']?>&idClasse=<?=$_GET['idCls']?>','#editLeco')"> RETOUR</button> -->
<button class="pull-right btn btn-default" onclick="imprimer('grille_point');"> Emprimer</button>
    <!--  -->
    <div class="col-sm-12"  style="">
        <b><center style="font-size:20px ; color:green; margin-left:5%; margin-top:5%"><b>GRILLE DE POINTS AU COURS DE (D') <?=' '.$_GET['cours'].'</b><br>'.$_GET['maClasse'];?></center></b>
    </div>
    <!--  -->
    
    <div style="desplay:inline-block; " class="col-sm-12 col-lg-12">
 <b class="col-lg-12 col-sm-12 pull-left">IDENTITE DE L'ENSEIGNANT(E)</b>
            <img class=" img-circle col-sm-1 col-sm-1 col-dl-1 col-xs-1 col-lg-1" src="images/<?=$editeur['photoUtilisateur']?>" style="width:100px; height:100px"/>
            <div style="margin-top:5px;" class="col-sm-10 col-sm-10 col-dl-10 col-xs-10 col-lg-10">
                    <span class=""> Nom : <b><b><?=$editeur['nomUtilisateur']?></b> Postnom : <b><?=$editeur['postnomUtilisateur']?></b></span><br>
                    <span class=""> Prenom : <b><?=$editeur['prenomUtilisateur']?></b></span>
                    <span class=""> Tel : : <b><?=$editeur['telUtilisateur']?></b></span><br>
                    <span class=""> Mail : <?='<a>'.$editeur['mailUtilisateur'].'</a>'?></span><br>
                    <span class=""> Genre : <b><?=$editeur['genre']?></b></span><br>          
            </div>
    </div>

        <!--  -->
     <div align="center" class="table-responsive" style="width:100%">
    <table class="table-bordered  table-striped table-condensed">
        
            <thead style='font-size:10px'>
                <tr>
                    <th style="background:WHITE" colspan="" >N</th>
                    <th style="color:red" colspan="3" ><center>IDENTITE ELEVE</center></th>                

                <?php
                    $dv = new crs_devoirs();
                    $dv = $dv->selectionnerByCours($idCrs01)->fetchAll();
                    
                    $tourPrev =1;
                    $TablIdDevoirs = array();
                    foreach($dv as $seldv){
                    array_push($TablIdDevoirs,$seldv['idDevoir']);
                    ?>

                       <th class="rotate">
                            <div>
                                <span>
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
                                    $nremis = $nremis->remis($seldv['idDevoir'],$idCrs01,$idCls);
                                    $nbrm=0;
                            
                                    foreach($nremis as $selRm ){
                                        $nbrm++;
                                    }
                                    ?>
                                    <a onclick="Orientation('control.param_access/ctr_devoirs.php?listeRms=true&idDevoir=<?=$seldv['idDevoir']?>&Rmis','<?='#Rm'.$seldv['idDevoir']?>','')"> Remis : <?=$nbrm.'  '?></a> <b style="color:red">Point:<?=$pondDevoir?> </b>
                              </span>
                             </div>
                            </th>  
                    <?php
                    }
                    ?>
                   
                   
                    <th colspan="2" style="font-size:10px; color:red"><center>TOTAL</center></th>
            
                </tr>
            </thead>
            <tbody>
                <?php
                //SI IL NY A PAS DE DEVOIR A CE COUR NE CHECHER PAS
                if($TablIdDevoirs!=null){
                    $grd_tour_remis =new suivie_remise_devoirs();
                    $grd_tour_remis = $grd_tour_remis ->RemisToutEleve($idCls,$idCrs01);
                    $cpt=0;

                    // $cote =new suivie_remise_devoirs();
                    // $cote = $cote ->RemisToutEleve($idCls,$idCrs01);

                     foreach($grd_tour_remis  as $sel_grd_tour_remis){
                        $cpt++;
                        echo '<tr>';
                            echo '<td style="color:red">'.$cpt.'</td>';
                            echo '<td style="color:red"><img style="width:40px; height:40px" src=images/'.$sel_grd_tour_remis['photoUtilisateur'].'></td>';
                            echo '<td>'.$sel_grd_tour_remis['idUtilisateur'].'</td><td style="font-size:11px">'.$sel_grd_tour_remis['nomUtilisateur'].' '.$sel_grd_tour_remis['postnomUtilisateur'].' '.$sel_grd_tour_remis['prenomUtilisateur'].'</td>';
                            $aneeScoCreaCrs = new crs_cours();
                            $aneeScoCreaCrs = $aneeScoCreaCrs->rechercher($idCrs01)->fetch();
                            $grd_tour_remis_encours =new suivie_remise_devoirs();
                            //REMISE DE CETTE ELEVE DANS CETTE CLASSE CETTE ANNEE SCOLAIRE POUR CE COURS.
                            $grd_tour_remis_encours = $grd_tour_remis_encours->remiseEleve($sel_grd_tour_remis['idUtilisateur'],$aneeScoCreaCrs['idClasse'],$aneeScoCreaCrs['idAnneeSco'],$idCrs01);
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
                                                            $repondi = $repondi->selectionnerByQstUtiClass($selQst['idQuestion'],$sel_grd_tour_remis['idUtilisateur'],$idCls);

                                                            $avoirRepo=false;
                                                            
                                                            foreach($repondi as $repondi){
                                                                if( $repondi['idAnneeScoEval']==$repondi['idAnneeScoRep'] AND $repondi['idClasseEval']==$idCls){
                                                                    $avoirRepo=true;
                                                                    $correct = new crs_correction();
                                                                    $correct=$correct->selectionnerByRep($repondi['idReponse'])->fetch();
                                                                    if(is_array($correct)){
                                                                    $coteEleDev=$coteEleDev+$correct['cote'];
                                                                    $coteTotal= $coteTotal+$correct['cote'];
                                                                    }
                                                                    $nbRps++;
                                                                    $infoQRCA= 'Eval='.$repondi['idAnneeScoEval'].'REp'.$repondi['idAnneeScoRep'].'CalssEva='. $repondi['idClasseEval'].'ClasseRep='.$idCls;
                                                                    }

                                                    }  
                                                    $pTotal=$pTotal+$selQst['ponderation'];
                                                    
                                                    $nbQst++;
                                                }else{

                                                
                                                    $asstion = new crs_assertion();
                                                    //selectionner l'assertion choisie encore la bonne 
                                                    $Tbasstion = $asstion->selectionnerByQst($selQst['idQuestion']);
                                                    $tur=1;
                                                    $repondi = new crs_reponsec();
                                                    $repondi = $repondi->selectionnerByQstUtiClss($selQst['idQuestion'],$sel_grd_tour_remis['idUtilisateur'],$idCls);
                                                    $avoirRepo=false;
                                          
                                                    foreach($repondi as $repondi){
                                                        if( $repondi['idAnneeScoEval']==$repondi['idAnneeScoRep'] AND $repondi['idClasseEval']==$idCls){
                                                            $avoirRepo=true;
                                                             foreach($Tbasstion  as $selTbasstion){
                                                                if($selTbasstion['idAssertion']==$repondi['idAssertion'] AND $selTbasstion['correctAssertion']==1){
                                                                    $coteEleDev=$coteEleDev+$selQst['ponderation'];
                                                                    $coteTotal=$coteTotal+$selQst['ponderation'];
                                                                    $nbRps++;;
                                                                    $infoQRCA= 'Eval='.$repondi['idAnneeScoEval'].'REp'.$repondi['idAnneeScoRep'].'CalssEva='. $repondi['idClasseEval'].'ClasseRep='.$idCls;
                                                                }
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
                                                         echo '<td style="color:green; font-size:12px">'.$cote .'</td>';
                                                    }elseif($coteEleDev>=0 AND $coteEleDev<$moyenCote){
                                                         echo '<td style="color:red; font-size:12px">'.$cote .'</td>';
                                                        
                                                    }elseif($coteEleDev<0){
                                                         echo '<td style="color:yellow; font-size:12px">'.$cote .'</td>';

                                                    }elseif($coteEleDev>$pTotal){
                                                         echo '<td style="color:pink; font-size:12px">'.$cote .'</td>';

                                                    }else{
                                                        echo '<td style="color:yellow; font-size:12px">Erreur</span></td>';
                                                    }
                                        
                                      
                                    ///////Fin calcule de point obtenu


                                        echo '</span></td>';
                                    }else{
                                        echo '<td style="color:red; font-size:12px"><span class="glyphicon glyphicon-remove"></span></td>';
                                    }
                                    $pondTotalDevResolu=$pondTotalDevResolu+$pTotal;
                                    $tourRel++;
                                }
                               
                                
                        }
                         if($tourRel<$tourPrev){
                                    $Surp=$tourPrev-$tourRel;
                                        for($u=1;$u<$Surp;$u++){
                                            echo '<td style="color:red; font-size:12px"><span class="glyphicon glyphicon-remove"></span></td>';
                                        }

                                    }
                             
                         $pondToutDevMoyen=($pondToutDevoir/2);
                         $coteToutDevoir=$coteTotal.'/'.$pondToutDevoir;
                        $PourcCoteToutDev=ROUND((($coteTotal*100)/$pondToutDevoir),2);
                        if($coteTotal>$pondToutDevMoyen AND $coteTotal<=$pondToutDevoir){
                                echo '<td style="color:green; font-size:12px">'.$coteToutDevoir.'</span></td>';
                                 echo '<td style="color:green; font-size:12px">'.$PourcCoteToutDev.'%</span></td>';
                        }elseif($coteTotal>=0 AND $coteTotal<=$pondToutDevMoyen){
                                echo '<td style="color:red; font-size:12px">'.$coteToutDevoir.'</span></td>';
                                 echo '<td style="color:red; font-size:12px">'.$PourcCoteToutDev.'%</span></td>';
                            
                        }elseif($coteTotal<0){
                                echo '<td style="color:yellow; font-size:12px">'.$coteToutDevoir.'</span></td>';
                                 echo '<td style="color:pink; font-size:12px">'.$PourcCoteToutDev.'%</span></td>';

                        }elseif($coteTotal>$pondToutDevMoyen){
                                echo '<td style="color:pink; font-size:12px">'.$coteToutDevoir.'</span></td>';
                                 echo '<td style="color:pink; font-size:12px">'.$PourcCoteToutDev.'%</span></td>';

                        }else{
                            echo '<td style="color:yellow; font-size:12px">Erreur'.$coteTotal.'</span></td>';
                             echo '<td style="color:yellow; font-size:12px">'.$PourcCoteToutDev.'%</span></td>';
                        }
                       
                        
                        echo '</tr>';
                        }
                }
                ?>
            </tbody>
        </table>
        </div>
    </div>
    