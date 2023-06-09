<?php
                                        //////Debut Calcul de point Obtenu
                                        $dev = new crs_devoirs();
                                        $devv=$dev->rechercherr($sel_grd_tour_remis_encours['idDevoir']);

                                        $seldev=$devv->fetch();
                                    
                                        $qst = new crs_question();
                                        $qst = $qst->selectionnerByIdDevASC($sel_grd_tour_remis_encours['idDevoir']);
                                    
                                        $verif = new crs_assertion();
                                        $Cpt=1;
                                        foreach($qst as $selQst){
                                            
                                            $ver = $verif->verification($selQst['idQuestion']);
                                            $veri =$ver->fetch();
                                                if(empty($veri['idAssertion'])){

                                                            $repondi = new crs_reponset();
                                                            $repondi = $repondi->selectionnerByQstUti($selQst['idQuestion'],$_SESSION['idUtilisateur'])->fetchAll();

                                                            $avoirRepo=false;
                                                            $totapointobtenu=0.0;
                                                            foreach($repondi as $repondi){
                                                                if( $repondi['idAnneeScoEval']==$repondi['idAnneeScoRep'] AND $repondi['idClasseEval']==$_GET['idClasse']){
                                                                    $avoirRepo=true;
                                                                    $correct = new crs_correction();
                                                                    $correct=$correct->selectionnerByRep($repondi['idReponse'])->fetch();
                                                                    $totapointobtenu=$totapointobtenu+$correct['cote'];

                                                    }

                                                    }
                                                    $pTotal=$pTotal+$selQst['ponderation'];
                                                    $Cpt++;
                                                }else{

                                                
                                                    $asstion = new crs_assertion();
                                                    //selectionner l'assertion choisie encore la bonne 
                                                    $Tbasstion = $asstion->selectionnerByQst($selQst['idQuestion'])->fetch();
                                                    $tur=1;
                                                    $repondi = new crs_reponsec();
                                                    $repondi = $repondi->selectionnerByQstUti($selQst['idQuestion'],$_SESSION['idUtilisateur'])->fetchAll();
                                                    $avoirRepo=false;
                                                    $idAssertion;
                                                    foreach($repondi as $repondi){
                                                        if( $repondi['idAnneeScoEval']==$repondi['idAnneeScoRep'] AND $repondi['idClasseEval']==$_GET['idClasse']){
                                                            $avoirRepo=true;
                                                            $idAssertion=$repondi['idAssertion'];
                                                                        if($Tbasstion['idAssertion']==$idAssertion){
                                                                                    $totapointobtenu=$totapointobtenu+$selQst['ponderation'];
                                                                        }

                                                        }

                                                    }
                                                                $pTotal=$pTotal+$selQst['ponderation'];
                                                                $Cpt++;
                                                    }
                                                    echo '<td style="color:green; font-size:18px"><span class="glyphicon glyphicon-ok">Tur=';
                                                    echo "Obt=".$totapointobtenu.'  Sur='.$pTotal;
                                                    echo "Tour=".$cote."|Index=".$key;
                                                    echo '</span></td>';
                                        
                                    }   
                                    ///////Fin calcule de point obtenu
                                    ?>