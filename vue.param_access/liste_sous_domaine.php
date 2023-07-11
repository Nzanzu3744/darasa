<?php 
include_once('../model.param_access/prep_sous_domaine.class.php');
?>
    <table class="table table-bordered table-striped table-condensed">
        <thead>
        <tr>
            <th>N</th>
            <th>SOUS DOMAINE</th>
        </tr>
        </thead>
        <tbody>
           <?php
           $sd = new prep_sous_domaine();
           $sd  = $sd->selectionner();
           $i=0;
           foreach($sd as $selsd){
            ?>
            <tr>
                <td><?=$i++?></td>
                <td><?=$selsd['sousDomaine']?></td>
                
            </tr>
            <?php
            }
            ?>
               
               
           </tbody>
    </table>

           

