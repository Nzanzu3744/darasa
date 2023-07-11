<?php 
include_once('../model.param_access/prep_motivation.class.php');
?>         
            <thead>
                <tr style="">
                    <th>N</th>
                    <th><center>MOTIVATION</center></th>
                    <th> <center>COMPREHENSION DE LA SITUATION</center></th>
                </tr>
            </thead>
            <tbody>
                 <?php
                    include_once('../model.param_access/prep_exploitation.class.php');
                    $exep = new prep_exploitation();
                    (isset($_GET['idlc']))?$idlc=$_GET['idlc']:$idlc=0;
                    $exep = $exep->filtrer($idlc)->fetch(); 
                     ($exep)?$idFex=$exep['idExploitation']:$idFex=0;
                    $mot = new prep_motivation();
                    $mot = $mot->filtre($idFex);
                    $i=1;
                    foreach($mot as $selMot){
                        ?>
                        <tr>
                            <td><?=$i++?></td>
                            <td><p><?=$selMot['motivation']?></p></td>
                            <td><p><?=$selMot['comprehension']?></p></td>
                            <td style="height:100%;  background:#f2f2f2"> 
                                <z class="dropdown">
                                <button data-toggle="dropdown" style=""><b class="caret ppull-right"></b></button>
                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                <a href="#" onclick="Orientation('control.param_access/ctr_motivation.php?sup_mot=true&idlc=<?=$_GET['idlc']?>&idMot=<?=$selMot['idSituation']?>','#motivation')">Supprimer</a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="#" onclick="Encour()">Modifier</a>
                                            </li>
                                    </ul>
                                </z>                
                            </td>                          
                        </tr>
                        <?php
                        }
                        ?>
            </tbody>
       
       