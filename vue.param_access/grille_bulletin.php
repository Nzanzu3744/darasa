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
include_once('../model.param_access/param_groupe_periode.class.php');
include_once('../model.param_access/org_periode.class.php');
include_once('../model.param_access/org_inscription.class.php');
include_once('../model.param_access/crs_devoirs_trad.class.php');
include_once('../model.param_access/crs_cote_devoirs_trad.class.php');
?>

<?php 
  
    $idCls=$_GET['idClasse'];
    $idAnn=$_GET['idAnneeSco'];
    $cptDoc=1;
    include_once('../control.param_access/mes_methodes.php');
    $ListeEle=deserialiser($_POST['data1']);
    // print_r($ListeEle);
    foreach($ListeEle as $idEle){
        // echo $idEle;
        $eleve = new org_inscription();
        $el = $eleve->rechercherByClAnneeEleve($idCls, $idAnn, $idEle);
        if($el==false){
                 $el = $eleve->rechercherByClAnnee($idCls, $idAnn);
        }
        $i=1;
        foreach($el as $selEleve){
    ?>
    <!-- LISTE ELEVE -->
            <div class="well" style="border: 1px solid pink; margin:10px" id='bulletin00'>
            <?php
                echo "<center  style=''><i class='img-circle' style='color:red; font-size:15px; background: #DDDD'>". $cptDoc++."</i></center>";
            ?>
                <div class="col-sm-12"  style="">
                    <b><center style="font-size:15px ; color:green; margin-left:5%; margin-top:5%"><b>BULLETIN </b><br><?=' '.$_GET['maClasse'];?></center></b>
                </div>
                <div style="desplay:inline-block; margin:10px" class="col-sm-12 col-lg-12">
                    <b class="col-lg-12 col-sm-12 pull-left">IDENTITE DE L'ELEVE</b>
                        <img class=" img-circle col-sm-1 col-sm-1 col-dl-1 col-xs-1 col-lg-1" src="images/<?=$selEleve['photoUtilisateur']?>" style="width:90px; height:90px"/>
                        <div style="margin-top:5px;" class="col-sm-10 col-sm-10 col-dl-10 col-xs-10 col-lg-10">
                                <span class=""> Nom : <b><b><?=$selEleve['nomUtilisateur']?></b> Postnom : <b><?=$selEleve['postnomUtilisateur']?></b></span><br>
                                <span class=""> Prenom : <b><?=$selEleve['prenomUtilisateur']?></b></span>
                                <span class=""> Tel : : <b><?=$selEleve['telUtilisateur']?></b></span><br>
                                <span class=""> Mail : <?='<a>'.$selEleve['mailUtilisateur'].'</a>'?></span><br>
                                <span class=""> Genre : <b><?=$selEleve['genre']?></b></span><br>          
                        </div>
                </div>
                <!-- DEBIT CORPS BULLETIN -->
                <center class="table-responsive" style="width:100%; padding:20px">
                    <table class="table-bordered  table-striped table-condensed">
                    
                        <thead style='font-size:10px'>
                        <tr>
                                <th>
                                    <?php
                                        $pr2 = new org_periode();
                                        $pr2 = $pr2->filtreByAnneeCls($idAnn,$idCls)->fetch();
                                        (is_array($pr2))?$idGp = $pr2['idGroupePeriode']:$idGp=0;
                                        $gp2 = new param_groupe_periode();
                                        $gp2 = $gp2->filtrerbyId($idGp)->fetch();
                                        if($gp2){
                                            for($t=1; $t<=$gp2['frequence']; $t++){
                                                ?>
                                                        <th style="" colspan="4" ><center><?=(($t==1)?$t.' ér ':$t.' éme ').$gp2['groupePeriode']?></center></th>
                                                <?php
                                            }
                                        }
                                        
                                    ?>      
                                </th>
                            </tr>
                            <!--  -->
                            <tr>
                                <th>
                                    <?php
                                $pr2 = new org_periode();
                                $pr2 = $pr2->filtreByAnneeCls($idAnn,$idCls);
                                $tr=0;
                                $trTotaut=0;
                                foreach($pr2 as $selpr2){
                                    $trTotaut++;
                                    $tr++;
                                    ?>
                                            <th class="" ><div><span><?=$selpr2['periode']?></span></div></th>
                                    <?php
                                    if($tr==3){
                                        $trTotaut++;
                                        $tr=0;
                                        ?>
                                            <th class="" style="color:red"><center><span>TOTAL</span></center></th>
                                        <?php
                                        if(($trTotaut/$gp2['frequence'])==4){
                                            ?>
                                                    <th class="" style="color:red" ><center><span>TOTAL GENERAL</span></center></th>
                                                    <th class="" style="color:red" ><center><span>POURCENTAGE</span></center></th>
                                            <?php

                                        }
                                    }
                                }
                                
                            ?>      
                                </th>
                            </tr>
                        </thead>
                        <tbody> 
                        
                        <?php  
                        // <!-- BOUCLE COURS -->     
                        $crs = new crs_cours();
                                $crs = $crs->selectionnerCrsEleveByCls($idCls,$idAnn);
                                foreach($crs as $selcrs){
                                    ?>
                                    <tr>
                                        <td><?=$selcrs['cours']?>
                                            <?php
                                                // BOUCLE PERIODE
                                                $pr2 = new org_periode();
                                                $pr2 = $pr2->filtreByAnneeCls($idAnn,$idCls);
                                                //Total
                                                $coteTotal=0.0;
                                                //Total
                                                $pondeTotal=0.0;
                                                //Totaux General du cours
                                                $coteTG=0.0;
                                                //Ponderation Totaux General du cours
                                                $pondeTG=0.0;
                                                //Tour avant l'Affichage du total
                                                $tr=0;
                                                //Tour avant l'Affichage du totaux
                                                $trTotaut=0;
                                                foreach($pr2 as $selpr2){
                                                    $trTotaut++;
                                                    $tr++;
                                                    //Cote obtenu par periode
                                                    $CotePeriode=0.0;
                                
                                                    $pondePeriod=0.0;

                                                    //xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
                                                    // BOUCLE DEVOIR
                                                    $dv = new crs_devoirs();
                                                    $dv = $dv->selectionnerByCoursPeriode($selpr2['idPeriode'],$selcrs['idCours']);
                                                    $nbQst=0;
                                                    $nbRps=0;                                             
                                                    //DEBIT DE LA BOUCLE TOUR DE DEVOIR PAR PERIODE
                                                    foreach($dv as $selDv){
                                                    





                                                                
                                                            
                                                            $qst = new crs_question();
                                                            $qst = $qst->selectionnerByIdDevASC($selDv['idDevoir']);
                                                            //Cote Par Devoir
                                                            $coteEleDev=0.0;
                                                            
                                                            //DEBIT DE LA BOUCLE TOUR QUESTION PAR DEVOIR
                                                            foreach($qst as $selQst){
                                                                $verif = new crs_assertion();
                                                                $ver = $verif->verification($selQst['idQuestion']);
                                                                $veri =$ver->fetch();
                                                                //NB:  La variable $infoQRCA nous tur un resume l'annee de l'evaluation laclasse et si c'est raporte l'annee initial l'annee de rapport et classe initial , classe de rapport
                                                                $infoQRCA='';
                                                                
                                                                    //SI ET SEULEMENT SI LA QUESTION EST TRADITIONNELE
                                                                    if(empty($veri['idAssertion'])){
                                                                                $repondi = new crs_reponset();
                                                                                $repondi = $repondi->selectionnerByQstUtiClass($selQst['idQuestion'],$selEleve['idUtilisateur'],$idCls);

                                                                                $avoirRepo=false;
                                                                                
                                                                                foreach($repondi as $repondi){
                                                                                    if( $repondi['idAnneeScoEval']==$repondi['idAnneeScoRep'] AND $repondi['idClasseEval']==$_GET['idClasse']){
                                                                                        $avoirRepo=true;
                                                                                        $correct = new crs_correction();
                                                                                        $correct=$correct->selectionnerByRep($repondi['idReponse'])->fetch();
                                                                                        
                                                                                        if(is_array($correct)){
                                                                                            $coteEleDev+=$correct['cote'];
                                                                                            $CotePeriode+=$correct['cote'];
                                                                                            $coteTotal +=$correct['cote'];
                                                                                            $coteTG+=$correct['cote'];
                                                                                        }
                                                                                        $nbRps++;
                                                                                        $infoQRCA= 'Eval='.$repondi['idAnneeScoEval'].'REp'.$repondi['idAnneeScoRep'].'CalssEva='. $repondi['idClasseEval'].'ClasseRep='.$_GET['idClasse'];
                                                                                        }

                                                                        }  
                                                                        
                                                                        $nbQst++;
                                                                    // SI EST SEULEMENT SI LA QUESTION EST A CHOIX MULTIPLE   
                                                                    }else{

                                                                    
                                                                        $asstion = new crs_assertion();
                                                                        //Selectionner les assertions de la question
                                                                        $Tbasstion = $asstion->selectionnerByQst($selQst['idQuestion']);
                                                                        //Selectionner la reponse ou assertion choisie
                                                                        $repondi = new crs_reponsec();
                                                                       
                                                                        $repondi = $repondi->selectionnerByQstUtiClss($selQst['idQuestion'],$selEleve['idUtilisateur'],$idCls);
                                                                        $avoirRepo=false;
                                                            
                                                                        foreach($repondi as $repondi){
                                                                            if( $repondi['idAnneeScoEval']==$repondi['idAnneeScoRep'] AND $repondi['idClasseEval']==$_GET['idClasse']){
                                                                                $avoirRepo=true;
                                                                                foreach($Tbasstion  as $selTbasstion){
                                                                                     if($selTbasstion['idAssertion']==$repondi['idAssertion'] AND $selTbasstion['correctAssertion']==1){
                                                                                        $coteEleDev+=$selQst['ponderation'];
                                                                                        $CotePeriode+=$selQst['ponderation'];
                                                                                        $coteTotal+=$selQst['ponderation'];
                                                                                        $coteTG+=$selQst['ponderation'];
                                                                                        
                                                                                        $nbRps++;
                                                                                        $infoQRCA= 'Eval='.$repondi['idAnneeScoEval'].'REp'.$repondi['idAnneeScoRep'].'CalssEva='. $repondi['idClasseEval'].'ClasseRep='.$_GET['idClasse'];
                                                                                    }
                                                                                }

                                                                            }

                                                                        }
                                                                                    
                                                                                    
                                                                                    $nbQst++;
                                                                        }
                                                                        $pondePeriod+=$selQst['ponderation'];
                                                                        $pondeTotal+=$selQst['ponderation'];
                                                                        $pondeTG+=$selQst['ponderation'];
                                                            //FIN DE LA BOUCLE TOUR QUESTION PAR DEVOIR  
                                                            }









                                                        //FIN DE LA BOUCLE TOUR DEVOIR PAR PERIODE
                                                    }
                                                    ///xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
                                                    $dvTrad2 = new crs_devoirs_trad();
                                                    $dvTrad2 = $dvTrad2->selectionnerByCoursPeriode($selpr2['idPeriode'],$selcrs['idCours'])->fetchAll();
                                                                                                    
                                                    foreach($dvTrad2 as $seldvTrad2){
                                                        $coteEleDev=0.0;
                                                        $coteTrat = new crs_cote_devoirs_trad();
                                                        $coteTrat = $coteTrat->filterDevTraEleve($seldvTrad2['idDevaoirTrad'],$selEleve['idInscription'])->fetch();
                                                    
                                                        $coteEleDev+=$coteTrat['coteDevoirTrad'];
                                                        $CotePeriode+=$coteTrat['coteDevoirTrad'];
                                                        $coteTotal+=$coteTrat['coteDevoirTrad'];
                                                        $coteTG+=$coteTrat['coteDevoirTrad'];
                                                     
                                                   
                                                            
                                                    $pondePeriod+=$seldvTrad2['poderation'];
                                                    $pondeTotal+=$seldvTrad2['poderation'];
                                                    $pondeTG+=$seldvTrad2['poderation'];           
                                                    }
                                                 
                                                   ///xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->

                                                    $moyenCP = $pondePeriod/2;
                                                    if($CotePeriode>=$moyenCP AND $pondePeriod!=0 ){
                                                    ?>
                                                    <td style="color:green"><?=$CotePeriode.'|'.$pondePeriod?></td>
                                                    <?php
                                                    }elseif($CotePeriode<$moyenCP AND $pondePeriod!=0){
                                                       ?>
                                                    <td style="color:red"><?=$CotePeriode.'|'.$pondePeriod?></td>
                                                    <?php 
                                                    }else{
                                                       ?>
                                                    <td style="color:black">-</td>
                                                    <?php 
                                                    }

                                                        if($tr==3){
                                                            $moyenTT=$pondeTotal/2;
                                                            $trTotaut++;
                                                            $tr=0;
                                                            if($coteTotal>=$moyenTT AND $pondeTotal!=0){
                                                            ?>
                                                                <th class="" style="color:green"><center><span><?=$coteTotal.'|'.$pondeTotal?></span></center></th>
                                                            <?php
                                                            }else if($coteTotal<$moyenTT AND $pondeTotal!=0){
                                                            ?>
                                                                <th class="" style="color:red"><center><span><?=$coteTotal.'|'.$pondeTotal?></span></center></th>
                                                            <?php
                                                            }else{
                                                            ?>
                                                            <td style="color:black">-</td>
                                                            <?php 
                                                            }
                                                            $coteTotal=0.0;
                                                            $pondeTotal=0.0;
                                                            $pondePeriod=0.0;
                                                            $moyenTG=$pondeTG/2;
                                                            if(($trTotaut/$gp2['frequence'])==4){
                                                                if($coteTG>=$moyenTG AND $pondeTG!=0){
                                                                ?>
                                                                        <th class="" style="color:green" ><center><span><?=$coteTG.'|'.$pondeTG?></span></center></th>
                                                                        <th class="" style="color:green" ><center><span><?=ROUND((($coteTG*100)/$pondeTG),3).'%'?></span></center></th>

                                                                <?php
                                                                }elseif($coteTG<$moyenTG AND $pondeTG!=0){
                                                                ?>
                                                                        <th class="" style="color:red" ><center><span><?=$coteTG.'|'.$pondeTG?></span></center></th>
                                                                        <th class="" style="color:red" ><center><span><?=ROUND((($coteTG*100)/$pondeTG),3).'%'?></span></center></th>
                                                                <?php  
                                                                }else{
                                                                ?>
                                                                <td style="color:black">-</td>
                                                                <?php 
                                                                }
                                                                $coteTG=0.0;
                                                                $pondeTG=0.0;

                                                            }
                                                        }
                                                    
                                                }
                                                // FIN BOUCLE PERIODE
                                            ?> 
                                        </td>
                                    </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table> 
                </center>
            </div>
            <!-- FIN LISTE BULLETIN -->
            <?php
            }
    }
            ?>
