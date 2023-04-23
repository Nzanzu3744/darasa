<?php
     include_once('../model.param_access/org_classe.class.php');
     include_once('../model.param_access/org_promotion.class.php');
     include_once('../model.param_access/org_section.class.php');
     include_once('../model.param_access/org_unite.class.php');
     include_once('../model.param_access/org_inscription.class.php');
     include_once('../model.param_access/org_affectation.class.php');
     include_once('../model.param_access/crs_cours.class.php');
     include_once('../model.param_access/crs_lecon.class.php');
     include_once('../model.param_access/crs_devoirs.class.php');

?>
<div class="col-sm-12 row table-responsive well" style="border: 1px solid #DDDD; height:100%" >
     
            <table class="table table-bordered table-striped table-condensed">
                    
                    <thead>
                        <tr>
                            <th>N</th>
                            <th>CLASSES</th>
                            <th>ELEVES</th>
                            <th>ENSEIGNANT</th>
                            <th>COURS</th>
                            <th>LECONS</th>
                            <th>DEVOIRS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            



                            $clas = new org_classe();
                            $n=0;
                            foreach( $clas->selectionner() as $sel)
                            { 
                                $n++;
                        ?>
                        <tr>
                            <td><?=$n?></td>
                            <!--  -->
                                       
                            <td>                          
                                <?php
                                     $sel_P=new org_promotion();
                                     $sel_P=$sel_P->rechercher($sel['idPromotion'])->fetch();?>
                                <i id="<?=$sel_P['idPromotion']?>"><?=strtoupper($sel_P['promotion']);?></i>
                                                     
                                <?php
                                     $sel_S=new org_section();
                                     $sel_S=$sel_S->rechercher($sel['idSection'])->fetch();?>
                                <i id="<?=$sel_S['idSection']?>"><?=' '.strtoupper($sel_S['section']);?></i>
                                                     
                                <?php
                                     $sel_U=new org_unite();
                                     $sel_U=$sel_U->rechercher($sel['idUnite'])->fetch();?>
                                <i id="<?=$sel_U['idUnite']?>"><?=' '.strtoupper($sel_U['unite']);?></i>
                            </td>
                            <!--ELEVES  -->
                            <td>
                            <ol>
                            <?php
                                $inscritp = new org_inscription();
                                $inscritp =$inscritp->selectionner();
                                foreach( $inscritp as $selEleve){
                                    ?>
                                    <!--  -->
                                   
                                        <li><?=$selEleve['idInscription']?></li>
                                    
                                    <!--  -->
                                    <?php
                                }
                            ?>
                            <ol>
                            </td>
                            
                            <!-- ENSEIGNANT  -->
                            <td>
                            <ol>
                            <?php
                                $affect = new org_affectation();
                                $affect =$affect->selectionner();
                                foreach( $affect as $selEns){
                                    ?>
                                    <!--  -->
                                   
                                        <li><?=$selEns['idAffectation']?></li>
                                    
                                    <!--  -->
                                    <?php
                                }
                            ?>
                            <ol>
                            </td>
                            <!-- COURS -->
                              <td>
                            <ol>
                            <?php
                                $crs = new crs_cours();
                                $crs =$crs->selectionner();
                                foreach( $crs as $selcrs){
                                    ?>
                                    <!--  -->
                                   
                                        <li><?=$selcrs['cours']?></li>
                                    
                                    <!--  -->
                                    <?php
                                }
                            ?>
                            <ol>
                            </td>
                             <!-- LECONS -->
                              <td>
                            <ol>
                            <?php
                                $lcs = new crs_lecon();
                                $lcs =$lcs->selectionner();
                                foreach( $lcs as $sellcs){
                                    ?>
                                    <!--  -->
                                   
                                        <li><?=$sellcs['titreLecon']?></li>
                                    
                                    <!--  -->
                                    <?php
                                }
                            ?>
                            <ol>
                            </td>
                             <!-- DEVOIRS -->
                              <td>
                            <ol>
                            <?php
                                $dvoir = new crs_devoirs();
                                $dvoir =$dvoir->selectionner();
                                foreach( $dvoir as $seldvoir){
                                    ?>
                                    <!--  -->
                                   
                                        <li><?='Code :'.$seldvoir['idDevoir']?></li>
                                    
                                    <!--  -->
                                    <?php
                                }
                            ?>
                            <ol>
                            </td>
                            <!--  -->
                        </tr>
                    <?php

                            }
                    ?>
                    
                    </tbody>

                </table>

            
 </div>
