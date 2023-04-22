<?php
    include_once('../model.param_access/org_affectation.class.php');
     include_once('../model.param_access/org_classe.class.php');
     include_once('../model.param_access/org_promotion.class.php');
     include_once('../model.param_access/org_section.class.php');
     include_once('../model.param_access/org_unite.class.php');
     

?>
<div class="col-sm-12 row table-responsive well" style="border: 1px solid #DDDD; height:300px" >
        <table class="table table-bordered table-striped table-condensed">
                    
                    <thead>
                        <tr>
                            <th>N</th>
                            <th>Sel</th>
                            <th>ID</th>
                            <th>Promotion</th>
                            <th>Section</th>
                            <th>Unite</th>
                            <th>OPTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            



                            $clas = new org_affectation();
                            $n=0;

                            foreach( $clas->rechercherByUti($_GET['idutil']) as $sel)
                            { 
                                $n++;
                        ?>
                        <tr>
                            <td><?=$n?></td>
                            <td><input type="checkbox" onchange=""?></td>
                            <td><?=strtoupper($sel['idClasse'])?></td>
                            <td>                          
                                <?php $sel_P=org_promotion::rechercher($sel['idPromotion'])->fetch();?>
                                <i id="<?=$sel_P['idPromotion']?>"> <a><?=strtoupper($sel_P['promotion']);?></a></i>
                            </td>
                            <!--  -->
                            <td>                          
                                <?php $sel_S=org_section::rechercher($sel['idSection'])->fetch();?>
                                <i id="<?=$sel_S['idSection']?>"> <a><?=strtoupper($sel_S['section']);?></a></i>
                            </td>
                            <!--  -->
                            <td>                          
                                <?php $sel_U=org_unite::rechercher($sel['idUnite'])->fetch();?>
                                <i id="<?=$sel_U['idUnite']?>"> <a><?=strtoupper($sel_U['unite']);?></a></i>
                            </td>
                            <!--  -->
              
                            <td class="dropdown" style="height:9px">
                                <button style="width:100%; height:100%" data-toggle="dropdown" href="#"> Options<b class="caret pull-right"></b></button>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="#" onclick="Encour()">Modifier</a></li>
                                    <li><a href="#" onclick="Encour()">Supprimer</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Rapport de Class</a></li>

                                </ul>
                            </td>
                        </tr>
                    <?php
                            }
                    ?>
                    
                    </tbody>

                </table>
            
 </div>