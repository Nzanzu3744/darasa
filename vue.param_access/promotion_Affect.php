<?php
    include_once('../model.param_access/dir_directeur.class.php');
   
?>
<div class="col-sm-12 row table-responsive well" style="border: 1px solid #DDDD; height:300px" >
        <table class="table table-bordered table-striped table-condensed">
                    
                    <thead>
                        <tr>
                            <th>N</th>
                            <th>ID</th>
                            <th>Promotion</th>
                            <th>ANNEE SCOLAIRE</th>
                            <th>OPTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            
                            $clas = new dir_directeur();
                            $n=0;

                            foreach( $clas->selectionnerByUtiEcole($_GET['idutil'],$_SESSION['monEcole']['idEcole']) as $sel)
                            { 
                                $n++;
                        ?>
                        <tr>
                            <td><?=$n?></td>
                            <td><?=strtoupper($sel['idDirecteur'])?></td>
                            <td>                          
                                <i id="<?=$sel['idPromotion']?>"> <a><?=strtoupper($sel['promotion']);?></a></i>
                            </td>
                            <td>                          
                                <i id="<?=$sel['idAnneeSco']?>"> <a><?=strtoupper($sel['anneeSco']);?></a></i>
                            </td>
                            <!--  -->
         
                            <td class="dropdown" style="height:9px">
                                <button style="width:100%; height:100%" data-toggle="dropdown" href="#"> Options<b class="caret pull-right"></b></button>
                                <ul class="dropdown-menu pull-right">
                                    <li ><a href="#" onclick='Orientation("../control.param_access/ctr_directeur.php?supAffDir=<?=$sel["idDirecteur"]?>&idGroupe=<?=$_GET["idGroupe"]?>&idutil=<?=$_GET["idutil"]?>","#editLeco")' style="color: red">Supprimer</a></li>
                                </ul>
                            </td>
                        </tr>
                    <?php
                            }
                    ?>
                    </tbody>

                </table>
            
 </div>