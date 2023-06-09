<?php
     include_once('../model.param_access/org_promotion.class.php');
?>
<div class="col-sm-12 row table-responsive well" style="border: 1px solid #DDDD; height:300px" >
     
            <table class="table table-bordered table-striped table-condensed">
                    
                    <thead>
                        <tr>
                            <th>N</th>
                            <th>Sel</th>
                            <th>ID</th>
                            <th>Promotion</th>
                            <th>OPTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $prom01 = new org_promotion();
                            $n=0;
                            foreach( $prom01->selectionner() as $selProm)
                            { 
                                $n++;
                        ?>
                        <tr>
                            <td><?=$n?></td>
                            <td><input type="checkbox" onchange="Orientation('control.param_access/ctr_directeur.php?promChk=true&idPromotion=<?=$selProm['idPromotion']?>')"?></td>
                            <td><?=strtoupper($selProm['idPromotion'])?></td>
                            <td>                          
                                <i id="<?=$selProm['idPromotion']?>"><?=strtoupper($selProm['promotion']);?></i>
                          
              
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
