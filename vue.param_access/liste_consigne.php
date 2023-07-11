<?php 
include_once('../model.param_access/prep_consigne.class.php');
?>         
            <thead>
                <tr style="">
                    <th>N</th>
                    <th><center>ORGANISATION DE LA SALLE/ CONSIGNE</center></th>
                    <th> <center>OBSERVATION DES CONSIGNES</center></th>
                </tr>
            </thead>
            <tbody>
                 <?php
                    include_once('../model.param_access/prep_exploitation.class.php');
                    $exep = new prep_exploitation();
                    (isset($_GET['idlc']))?$idlc=$_GET['idlc']:$idlc=0;
                    $exep = $exep->filtrer($idlc)->fetch(); 
                    $consig01 = new prep_consigne();
                     ($exep)?$idFex=$exep['idExploitation']:$idFex=0;
                    $consig01 = $consig01->filtre($idFex);
                    $i=1;
                    foreach($consig01 as $selconsig01){
                        ?>
                        <tr>
                            <td><?=$i++?></td>
                            <td><p><?=$selconsig01['consigne']?></p></td>
                            <td><p><?=$selconsig01['applicabilite']?></p></td>
                            <td style="height:100%;  background:#f2f2f2"> 
                                <z class="dropdown">
                                <button data-toggle="dropdown" style=""><b class="caret ppull-right"></b></button>
                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                <a href="#" onclick="Orientation('control.param_access/ctr_consigne.php?sup_consig=true&idlc=<?=$_GET['idlc']?>&idConsig=<?=$selconsig01['idConsigne']?>','#consigne')">Supprimer</a>
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
       
       