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
                            <th>Sel</th>
                            <th>OPTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            



                            $clas = new dir_directeur();
                            $n=0;

                            foreach( $clas->selectionnerByUti($_GET['idutil']) as $sel)
                            { 
                                $n++;
                        ?>
                        <tr>
                            <td><?=$n?></td>
                            
                            <td><?=strtoupper($sel['idDirecteur'])?></td>
                            <td>                          
                                <i id="<?=$sel['idPromotion']?>"> <a><?=strtoupper($sel['promotion']);?></a></i>
                            </td>
                            <!--  -->
                               <td><input type="checkbox" <?=($sel['idDirecteur']==1)?'cheched':''?> onchange="Encour()"?></td>
                            
                                        
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