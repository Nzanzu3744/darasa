<?php
    include_once('../model.param_access/org_section.class.php');
?>
<table class="table table-bordered table-striped table-condensed">
        
        <thead>
           
            <tr>
                <th>N</th>
                <th>Sel</th>
                <th>Section</th>
                <th>Promotion</th>
                
              
            </tr>
        </thead>
        <tbody>
            <?php
                $sect = new org_section();
                $n=0;
                foreach( $sect->selectionner()  as $sel)
                { 
                    $n++;
            ?>
            <tr>
                <td><?=$n?></td>
                <td><input id="<?=$sel['idSection']?>" name="<?=$sel['idSection']?>" value="<?=$sel['idSection']?>" type="checkbox"></td>
                <th><?=($sel['idSection']==1)?$sel['section'].' ere':$sel['section'].' eme'?></th>
                <td><?=strtoupper($sel['promotion'])?></td>
                              
               
            </tr>
           <?php
                }
           ?>
           
        </tbody>
    </table>