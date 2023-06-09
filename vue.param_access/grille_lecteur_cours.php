<?php

include_once('../model.param_access/param_utilisateur.Class.php');
include_once('../model.param_access/crs_devoirs.class.php');
include_once('../model.param_access/crs_lecon.class.php');
 include_once('../model.param_access/visite_lecon.class.php');
$editeur = new param_utilisateur();
$editeur = $editeur->selectionnerUtByCrs($_GET['idCours'])->fetch();
?>
<div style="border: 1px solid black; padding:10px; font: size 12px; margin:10px; background:white" class="col-sm-12">
<!-- <button class="pull-right btn btn-warning" onclick="Orientation('control.param_access/ctr_cours.php?VueCours&idAnneeSco=<?=$_GET['idAnneeSco']?>&idAfft=<?=$_GET['idAfft']?>&maClasse=<?=$_GET['maClasse']?>&idClasse=<?=$_GET['idCls']?>','#editLeco')"> RETOUR</button> -->
<button class="pull-right btn btn-default" onclick="Encour()"> Emprimer</button>
    <!-- <div style="desplay:inline-block  " class="col-sm-12 col-lg-12">
        <img class="col-sm-1 col-sm-1 col-dl-1 col-xs-1 col-lg-1" src="images/lgndg.PNG" style="width:200px; height:100px"/>
            <div style="margin-top:5px;" class="col-sm-10 col-sm-10 col-dl-10 col-xs-10 col-lg-10">
                    <span class=""><b>COMPLEXE SCOLAIRE NOTRE DAME DE GRACES</b></span><br>
                    <span class=""><b>DEVISE</b></span><br>
                    <span class="">  <b>BUNIA POLICE DE FRONTIERE</b></span><br>
                    <span class="">  <b>REPUBLIQUE DEMOCRATIQUE DU CONGO</b></span><br>
                    <span class=""><b> BP : 380/Bunia</b></span><br>          
                    <span class=""><b>Tel : 081XXXXXXXX</b></span><br>
                    <span class="">Mail "<?='<a>'.$editeur['mailUtilisateur'].'</a>'?></span><br>
            </div>
    </div> -->
   
    <!--  -->
    <div class="col-sm-12" style="">
        <b><center style="font-size:20px ; color:green; margin-left:5%; margin-top:5%"><b>GRILLE DE LECTEURS DU COURS DE (D') <?=' '.$_GET['cours'].'</b><br>'.$_GET['maClasse'];?></center></b>
    </div>
    <!--  -->
    
 <div style="desplay:inline-block; " class="col-sm-12 col-lg-12">
 <b class="col-lg-12 col-sm-12 pull-left">IDENTITE DE L'ENSEIGNANT(E)</b>
            <img class="col-sm-1 col-sm-1 col-dl-1 col-xs-1 col-lg-1" src="images/<?=$editeur['photoUtilisateur']?>" style="width:120px; height:100px"/>
            <div style="margin-top:5px;" class="col-sm-10 col-sm-10 col-dl-10 col-xs-10 col-lg-10">
                    <span class=""> Nom : <b><b><?=$editeur['nomUtilisateur']?></b> Postnom : <b><?=$editeur['postnomUtilisateur']?></b></span><br>
                    <span class=""> Prenom : <b><?=$editeur['prenomUtilisateur']?></b></span>
                    <span class=""> Tel : : <b><?=$editeur['telUtilisateur']?></b></span><br>
                    <span class=""> Mail : <?='<a>'.$editeur['mailUtilisateur'].'</a>'?></span><br>
                    <span class=""> Genre : <b><?=$editeur['genre']?></b></span><br>          
            </div>
    </div>

        <!--  -->
    <table class="table table-bordered table-striped table-condensed">
        
            <thead>
                <tr style="font-size:10px">
                    <th style="background:WHITE" colspan="" >N</th>
                    <th style="background:WHITE; color:red" colspan="3" ><center>IDENTITE ELEVE<center></th> 

                

                <?php
                    $lc = new crs_lecon();
                    $lc = $lc->selectionnerByCours($_GET['idCours'])->fetchAll();

                    $tourPrev =1;
                    $TabIdLecon = array();
       
                    foreach($lc as $selLc){
                    array_push($TabIdLecon,$selLc['idLecon']);
                    ?>

                        <th>
                            <?php 
                                echo strtoupper($tourPrev++.') '.$selLc['titreLecon'].' ['.$selLc['idLecon'].'] cours= '.$_GET['idCours'].'class='.$_GET['idClasse']);
                                $nvues =new visite_lecon();
                                $nvues = $nvues->vues($selLc['idLecon'],$_GET['idCours'],$_GET['idClasse']);
                                $nblec=0;

                               foreach($nvues as $selNv ){
                                $nblec++;
                                    }
                                    ?>
                                    <a href="#" onclick="Orientation('control.param_access/ctr_visiteLecon.php?idlc=<?=$selLc['idLecon']?>&Lvit','<?='#lv'.$selLc['idLecon']?>','')">Vues : <?=$nblec?></a>  
                            <?php
                                }   
                            ?>
                        </th>
                </tr>
            </thead>
        <tbody>
                <?php
                //SI IL NY A PAS DE DEVOIR A CE COUR NE CHECHER PAS
                if($TabIdLecon!=null){
                    $grd_tour_vis =new visite_lecon();
                    $grd_tour_vis= $grd_tour_vis ->visiteToutEleve($_GET['idClasse'],$_GET['idCours']);
                    $cpt=0;
                     foreach($grd_tour_vis  as $sel_grd_tour_vis){
                        $cpt++;
                        echo '<tr style="font-size:10px" ><td style="color:red">'.$cpt.'</td>';
                        echo '<td style="color:red"><img style="width:40px; height:40px" src=images/'.$sel_grd_tour_vis['photoUtilisateur'].'></td>';
                        echo '<td>'.$sel_grd_tour_vis['idUtilisateur'].'</td><td>'.$sel_grd_tour_vis['nomUtilisateur'].' '.$sel_grd_tour_vis['postnomUtilisateur'].' '.$sel_grd_tour_vis['prenomUtilisateur'].'</td>';
                            $tour_visite_lc_pres =new visite_lecon();
                            $tour_visite_lc_pres = $tour_visite_lc_pres->visiteUtilCours($sel_grd_tour_vis['idUtilisateur'],$_GET['idCours'],$_GET['idClasse']);
                            $tourRel=0;
                            foreach($tour_visite_lc_pres as $sel_tour_visite_lc_pres){
                                $key=array_search($sel_tour_visite_lc_pres['idLecon'],$TabIdLecon)-$tourRel;
                                
                                for($i=0; $i<=$key;$i++){
                        
                                    if($i==$key){
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
                    }
                ?>
        </tbody>
    </div>
         <?php