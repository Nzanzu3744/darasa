<?php

include_once('../model.param_access/param_utilisateur.Class.php');
include_once('../model.param_access/crs_devoirs.class.php');
include_once('../model.param_access/crs_cours.class.php');
include_once('../model.param_access/suivie_remise_devoirs.class.php');
$editeur = new param_utilisateur();
$editeur = $editeur->selectionnerUtByCrs($_GET['idCours'])->fetch();
?>
<div style="border: 1px solid red;" id='grille_remise'>
<!-- <button class="pull-right btn btn-warning" onclick="Orientation('control.param_access/ctr_cours.php?VueCours&idAnneeSco=<?=$_GET['idAnneeSco']?>&idAfft=<?=$_GET['idAfft']?>&maClasse=<?=$_GET['maClasse']?>&idClasse=<?=$_GET['idCls']?>','#editLeco')"> RETOUR</button> -->
<button class="pull-right btn btn-default" onclick="imprimer('grille_remise')"> Emprimer</button>  
    <!--  -->
    <div class="col-sm-12" style="">
        <b><center style="font-size:20px ; color:green; margin-left:5%; margin-top:5%"><b>GRILLE DE REMISES DEVOIRS AU COURS DE (D') <?=' '.$_GET['cours'].'</b><br>'.$_GET['maClasse'];?></center></b>
    </div>
    <!--  -->
    
 <div style="desplay:inline-block; " class="col-sm-12 col-lg-12">
 <b class="col-lg-12 col-sm-12 pull-left">IDENTITE DE L'ENSEIGNANT(E)</b>
            <img class=" img-circle col-sm-1 col-sm-1 col-dl-1 col-xs-1 col-lg-1" src="images/<?=$editeur['photoUtilisateur']?>" style="width:100px; height:100px"/>
            <div style="margin-top:5px;" class="col-sm-10 col-sm-10 col-dl-10 col-xs-10 col-lg-10">
                    <span class=""> Nom : <b><b><?=$editeur['nomUtilisateur']?></b> Postnom : <b><?=$editeur['postnomUtilisateur']?></b></span><br>
                    <span class=""> Prenom : <b><?=$editeur['prenomUtilisateur']?></b></span>
                    <span class=""> Tel : : <b><?=$editeur['telUtilisateur']?></b></span><br>
                    <span class=""> Mail : <?='<a>'.$editeur['mailUtilisateur'].'</a>'?></span><br>
                    <span class=""> Genre : <b><?=$editeur['genre']?></b></span><br>          
            </div>
    </div>

        <!--  -->
    <div class="table-responsive" style="width:100%" align="center">
    <table class="table-bordered  table-striped table-condensed" style="">
        
            <thead style="font-size:10px">
                <tr>
                    <th style="background:WHITE" colspan="" >N</th>
                    <th style="background:WHITE; color:red" colspan="3" ><center>IDENTITE ELEVE</center></th>                
                <?php
                    $dv = new crs_devoirs();
                    $dv = $dv->selectionnerByCours($_GET['idCours'])->fetchAll();

                    $tourPrev =1;
                    $TablIdDevoirs = array();
                    foreach($dv as $seldv){
                    array_push($TablIdDevoirs,$seldv['idDevoir']);
                    ?>

                        <th class="rotate">
                            <div>
                                <span>
                                    <?php 
                                    echo strtoupper($tourPrev++.') '.$seldv['indexation'].' ['.$seldv['idDevoir'].'] ');
                                    $nremis =new suivie_remise_devoirs();
                                    $nremis = $nremis->remis($seldv['idDevoir'],$_GET['idCours'],$_GET['idClasse']);
                                    $nbrm=0;
                            
                                    foreach($nremis as $selRm ){
                                        $nbrm++;
                                    }
                                    ?>
                                    <a onclick="Orientation('control.param_access/ctr_devoirs.php?listeRms=true&idDevoir=<?=$seldv['idDevoir']?>&Rmis','<?='#Rm'.$seldv['idDevoir']?>','')"> Remis : <?=$nbrm?></a>
                                </span>
                            </div>
                        </th>
                                    <?php
                                    }
                                ?>
                               
                </tr>
            </thead>
        <tbody>
                <?php
                //SI IL NY A PAS DE DEVOIR A CE COUR NE CHECHER PAS
                if($TablIdDevoirs!=null){
                    $grd_tour_remis =new suivie_remise_devoirs();
                    $grd_tour_remis = $grd_tour_remis ->RemisToutEleve($_GET['idClasse'],$_GET['idCours']);
                    $cpt=0;
                     foreach($grd_tour_remis  as $sel_grd_tour_remis){
                        $cpt++;
                        echo '<tr style="font-size:10px"><td style="color:red">'.$cpt.'</td>';
                        echo '<td style="color:red"><img style="width:40px; height:40px" src=images/'.$sel_grd_tour_remis['photoUtilisateur'].'></td>';
                        echo '<td>'.$sel_grd_tour_remis['idUtilisateur'].'</td><td style="font-size:11px">'.$sel_grd_tour_remis['nomUtilisateur'].' '.$sel_grd_tour_remis['postnomUtilisateur'].' '.$sel_grd_tour_remis['prenomUtilisateur'].'</td>';
                            $aneeScoCreaCrs = new crs_cours();
                            $aneeScoCreaCrs = $aneeScoCreaCrs->rechercher($_GET['idCours'])->fetch();
                            $grd_tour_remis_encours =new suivie_remise_devoirs();
                            //REMISE DE CETTE ELEVE DANS CETTE CLASSE CETTE ANNEE SCOLAIRE POUR CE COURS.
                            $grd_tour_remis_encours = $grd_tour_remis_encours->remiseEleve($sel_grd_tour_remis['idUtilisateur'],$aneeScoCreaCrs['idClasse'],$aneeScoCreaCrs['idAnneeSco'],$_GET['idCours']);
                            $tourRel=0;
                            foreach($grd_tour_remis_encours as $sel_grd_tour_remis_encours){
                                $key=array_search($sel_grd_tour_remis_encours['idDevoir'],$TablIdDevoirs)-$tourRel;
                                
                                for($i=0; $i<=$key;$i++){
                        //ici bleme
                                    if($i===$key){
                                        echo '<td style="color:green; font-size:12px"><span class="glyphicon glyphicon-ok"></span></td>';
                                    }else{
                                        echo '<td style="color:red; font-size:12px"><span class="glyphicon glyphicon-remove"></span></td>';
                                    }
                                    $tourRel++;
                                }
                               
                                
                        }
                         if($tourRel<$tourPrev){
                                    $Surp=$tourPrev-$tourRel;
                                        for($u=1;$u<$Surp;$u++){
                                            echo '<td style="color:red; font-size:12px"><span class="glyphicon glyphicon-remove"></span></td>';
                                        }

                                    }
                        echo '</tr>';
                        }

                        // <th class="bc-browser bc-browser-chrome"><div class="bc-head-txt-label bc-head-icon-chrome">Chrome</div><div class="bc-head-icon-symbol icon icon-chrome"></div></th>
                }
                ?>
        </tbody>
    </table>
    </div>
</div>