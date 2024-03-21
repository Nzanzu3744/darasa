<?php
     include_once('../model.param_access/org_classe.class.php');
     include_once('../model.param_access/org_promotion.class.php');
     include_once('../model.param_access/org_section.class.php');
     include_once('../model.param_access/org_unite.class.php');

?>
<div class="col-sm-12 row table-responsive well" style="border: 1px solid #DDDD; height:600px" >
<center><label> Liste de Classes Organisées</label></center>
     
     
            <table class="table table-bordered table-striped table-condensed">
                    
                    <thead>
                        <tr>
                            <th>N</th>
                            <th>ID</th>
                            <th>Promotion</th>
                            <th>Section</th>
                            <th>Unite</th>
                            <th>OPTIONS</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            



                            $clas = new org_classe();
                            $n=0;
                            foreach( $clas->selectionnerByEcole($_SESSION['monEcole']['idEcole']) as $sel)
                            { 
                                $n++;
                        ?>
                        <tr>
                            <td><?=$n?></td>
                            <td><?=strtoupper($sel['idClasse'])?></td>
                            <td><?=strtoupper($sel['promotion'])?></td>
                            <td><?=strtoupper($sel['section'])?></td>
                            <td><?=strtoupper($sel['unite'])?></td>
              
                            <td class="dropdown" style="height:9px">
                                <button style="width:100%; height:100%" data-toggle="dropdown" href="#"> Options<b class="caret pull-right"></b></button>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="#" onclick="Encour()">Modifier</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#" onclick="Encour()" style="color:red">Supprimer</a></li>
                                    
                               </ul>
                            </td>
                        </tr>
                    <?php
                            }
                    ?>
                    
                    </tbody>

                </table>

            
 </div>
