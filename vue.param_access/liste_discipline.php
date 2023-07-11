<?php 
include_once('../model.param_access/prep_discipline.class.php');
?>
    <table class="table table-bordered table-striped table-condensed">
        <thead>
        <tr>
            <th>N</th>
            <th>SOUS DOMAINE</th>
            <th>DISCIPLINE</th>
        </tr>
        </thead>
        <tbody>
           <?php
           $ds = new prep_discipline();
           $ds = $ds->selectionner();
           $i=0;
           foreach($ds as $selds){
            ?>
            <tr>
                <td><?=$i++?></td>
                <td><?=$selds['sousDomaine']?></td>
                <td><?=$selds['discipline']?></td>
                
            </tr>
            <?php
            }
            ?>
               
               
           </tbody>
    </table>

           

