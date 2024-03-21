
<?php
    include_once('../model.param_access/org_promotion.class.php');
?>
<div class="col-sm-12 row table-responsive " style="border: 1px solid #f2f2f2; height:320px" >

    <table class="table table-bordered table-striped table-condensed">

        <thead>
            <tr>
                <th>N</th>
                <th>ID</th>
                <th>Sel</th>
                <th>Promotion</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $grps = new org_promotion();
                $n=0;
                foreach( $grps->selectionner()  as $sel)
                { 
                    $n++;
            ?>
            <tr>
                <td><?=$n?></td>
                <td><?=strtoupper($sel['idPromotion'])?></td>
                <td><input id="<?=$sel['idPromotion']?>" name="<?=$sel['idPromotion']?>" value="<?=$sel['idPromotion']?>" type="checkbox" class="form-control">
                <td><?=strtoupper($sel['promotion'])?></td>               
               
            </tr>
           <?php
                }
           ?>
           
        </tbody>
    </table>
</div>