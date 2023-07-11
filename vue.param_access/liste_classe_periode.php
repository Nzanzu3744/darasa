<?php
(empty($_SESSION))?session_start():'';
     include_once('../model.param_access/org_classe.class.php');
     include_once('../model.param_access/org_promotion.class.php');
     include_once('../model.param_access/org_section.class.php');
     include_once('../model.param_access/org_unite.class.php');
     include_once('../model.param_access/org_anneesco.class.php');
     include_once('../model.param_access/dir_directeur.class.php');

?>     
            <table class="table table-bordered table-striped table-condensed">
                    
                    <thead>
                        <tr>
                            <th>N</th>
                            <th>Sel</th>
                            <th>Id_Classe</th>
                            <th>Promotion</th>
                            <th>Section</th>
                            <th>Unite</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                        <?php
                        $ann= new org_anneesco();
                        $ann = $ann->selectionnerDerAn()->fetch();
                        $idnn = $ann['idAnneeSco'];
                        if(isset($_GET['idann'])){
                            $idnn=$_GET['idann'];
                        }

                            
                            $Attridir= new dir_directeur();
                            $Attridir = $Attridir->selectionnerByUtiAnnDescLimit($_SESSION['idUtilisateur'],$idnn)->fetch();
                            $idPromot01=0;
                            if($Attridir==true){
                               $idPromot01 = $Attridir['idPromotion'];
                            }
        
                            if(isset($_GET['idProm'])){
                                $idPromot01=$_GET['idProm'];
                            }

                            $clas = new org_classe();
                            $n=0;
                        
                                foreach( $clas->selectionnerByProm($idPromot01) as $sel)
                                { 
                                    $n++;
                            ?>
                            
                                <td><?=$n?></td>
                                <td><input type="checkbox" style="width:20px; height:20px" class="form-control" onchange="Orientation('control.param_access/ctr_periode.php?clssChk=true&idClassSel=<?=$sel['idClasse']?>')"?></td>
                                <td><?=strtoupper($sel['idClasse'])?></td>
                                <td>                          
                                    <?php
                                        $sel_P=new org_promotion();
                                        $sel_P=$sel_P->rechercher($sel['idPromotion'])->fetch();?>
                                    <i id="<?=$sel_P['idPromotion']?>"><?=strtoupper($sel_P['promotion']);?></i>
                                </td>
                                <td>                          
                                    <?php
                                        $sel_S=new org_section();
                                        $sel_S=$sel_S->rechercher($sel['idSection'])->fetch();?>
                                    <i id="<?=$sel_S['idSection']?>"><?=strtoupper($sel_S['section']);?></i>
                                </td>
                                <td>                          
                                    <?php
                                        $sel_U=new org_unite();
                                        $sel_U=$sel_U->rechercher($sel['idUnite'])->fetch();?>
                                    <i id="<?=$sel_U['idUnite']?>"><?=strtoupper($sel_U['unite']);?></i>
                                </td>
                            </tr>
                        <?php
                                }
                            
                    ?>
                    
                    </tbody>

                </table>
