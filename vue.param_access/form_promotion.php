
<?php

include_once('../model.param_access/org_promotion.class.php');
?>
<div class="form-inline  col-sm-12" style="height:300px;">
    
    <div class="form-inline well col-sm-5" style="padding: 1px; height:270px">
        <label for="prm"  class="col-sm-12"> PROMOTION </label>
           
        <input id="prm" type="text" class="form-control col-sm-12"  placeholder="Promotion ici">
        <span style="height:170px" class="col-sm-12"></span>
        <input id="" type="button" style="margin-top:10px; width:70px" onclick='Orientation("../control.param_access/ctr_promotion.php?ajouterPm=true&Promtn="+$("#prm").val(),"#promotion01"); Orientation("../control.param_access/ctr_classe.php?actual_section_sect=true","#sect")'  class="btn btn-xs btn-success col-sm-6" value="Valider">
    </div>

<center > <label>Liste Promotions</label></center>
<div class="table-responsive  col-sm-7" style="height:250px">
<table class="table table-bordered table-striped table-condensed">
        
        <thead>
           
            <tr>
                <th>N</th>
                <th>ID</th>
                <th>Promotion</th>
                <th>Option</th>
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
                <th><?=strtoupper($sel['promotion'])?></th>               
                <td class="dropdown active pull-right" >
                    <button data-toggle="dropdown" href="#">Option<b class="caret pull-right"></b></button>
                    <ul class="dropdown-menu">
                       
                        <li><a href="#" style="color:red" onclick='Orientation("../control.param_access/ctr_promotion.php?SuprPrm=true&idPromtn=<?=$sel["idPromotion"]?>","#promotion01"); Orientation("../control.param_access/ctr_classe.php?actual_section_sect=true","#sect")'>Supprimer</a></li>

                    </ul>
                </td>
            </tr>
           <?php
                }
           ?>
           
        </tbody>
    </table>

    </div>

</div>
<!--MA PARTIE DES SCRIPTE -->


