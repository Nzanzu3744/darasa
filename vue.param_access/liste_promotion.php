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
                            <td><input id="<?=$selProm['idPromotion']?>" name="<?=$selProm['idPromotion']?>" value="<?=$selProm['idPromotion']?>" type="checkbox"?></td>
                            <td><?=strtoupper($selProm['idPromotion'])?></td>
                            <td>                          
                                <i id="<?=$selProm['idPromotion']?>"><?=strtoupper($selProm['promotion']);?></i>
                            </td>
                        </tr>
                    <?php
                            }
                    ?>
                    
                    </tbody>

                </table>

            
 </div>
