   


<?php
include_once('../model.param_access/org_unite.class.php');
?>
<div class="form-inline  col-sm-12" style="height:100%; border:1px solid #f2f2f2">
    
<center><label> Liste de Classes Possibles</label></center>
<div class="table-responsive" style="height:600px">


<table class="table table-bordered table-striped table-condensed">
        
        <thead>
           
            <tr>
                <th>N</th>
                <th>sel</th>
                <th>Section</th>
                <th>Promotion</th>
                <th>Unite</th>
               
            </tr>
        </thead>
        <tbody>
            <?php
                $units = new org_unite();
                $n=0;
                foreach( $units->selectionner()  as $sel)
                { 
                    $n++;
            ?>
            <tr>
                <td><?=$n?></td>
                <td><input id="<?=$sel['idUnite']?>" name="<?=$sel['idUnite']?>" value="<?=$sel['idUnite']?>" type="checkbox" class="form-control">
                <th><?=($sel['idSection']==1)?$sel['section'].' ere':$sel['section'].' eme'?></th>
                <th><?=strtoupper($sel['promotion'])?></th>
                <th><?=strtoupper($sel['unite'])?></th>               
               
            </tr>
           <?php
                }
           ?>
           
        </tbody>
    </table>

            </div>
</div>

