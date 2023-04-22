<?php
include_once("header_rapport.php");
include_once('../model.param_access/param_utilisateur.Class.php');
include_once('../model.param_access/crs_devoirs.class.php');
include_once('../model.param_access/crs_lecon.class.php');
$editeur = new param_utilisateur();
$editeur = $editeur->selectionnerUtByCrs($_GET['idCours'])->fetch();
?>
<div style="border: 1px solid black; pabing:5px">
    <table class="table table-bordered">

        <center style="background: aliceblue; font-size:20px" class="col-sm-12"><b> RAPPORT SYNTHESE DU COURS</b></center>

    <tbody>
     <tr style="color: white">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
        </tr>
        <tr style="desplay: inline-block; height:20px">
            <td  colspan="7"   STYLE="desplay:inline-block">
                <center class="col-sm-12"><b> TUTULAIRE DU COURS</b></center>
                <div style="margin-top:5px">
                    <ul class="col-sm-7 col-dl-7 col-xs-7 col-lg-7 pull-right">
                            <li class=""> Nom : <b><?=$editeur['nomUtilisateur']?></b></li>
                            <li class=""> Postnom : <b><?=$editeur['postnomUtilisateur']?></b></li>
                            <li class=""> Prenom : <b><?=$editeur['prenomUtilisateur']?></b></li>
                            <li class=""> Tel : : <b><?=$editeur['telUtilisateur']?></b></li>
                            <li class=""> Mail : <?='<a>'.$editeur['mailUtilisateur'].'</a>'?></li>
                            <li class=""> Genre : <b><?=$editeur['genre']?></b></li>
                            
                    </ul>
                <img class="col-sm-1 col-sm-1 col-dl-1 col-xs-1 col-lg-1" src="<?=$editeur['photoUtilisateur']?>" style="width:120px; height:120px"/>
                <div>
            </td>
             <td colspan="4"  class="col-sm-8">
            <center style="font-size: 20px; margin:5%"> <?=$_GET['cours'].'    '.$_GET['maClasse'];?></center>
            </td>
           
            
           
        </tr>
        <!--  -->
        <tr  style="desplay: inline-block; background: aliceblue">
            <td colspan="8"><center class="col-sm-12"><b> LECONS</b></center></td>
            <td colspan="3" style=""> <center class="col-sm-12"><b> DEVOIS</b></center></td>
        </tr>
        <tr  style="desplay: inline-block; ">
        <?php
            $lc = new crs_lecon();
            $lc = $lc->selectionnerByCours($_GET['idCours'])->fetchAll();
            $dv = new crs_devoirs();
            $dv = $dv->selectionnerByCours($_GET['idCours'])->fetchAll();
        ?>
            <td colspan="8">
                  <div style="margin-top:5px">
                    <ul class="">
                        <?php
                        $tur =1;
                        foreach($lc as $selLc){
                        ?>
                            <li id='<?=$selLc['idLecon']?>'> <?=$tur++?>)<b><?=' '.$selLc['titreLecon']?></b></li>
                        <?php
                        include_once('../model.param_access/visite_lecon.class.php');
                        $nvues =new visite_lecon();
                        $nvues = $nvues->vues($selLc['idLecon']);
                        $nb=0;
      
                        foreach($nvues as $selNv ){
                            $nb++;
                         }
                         ?>
                         <div onclick="Orientation('../control.param_access/ctr_visiteLecon.php?idlc=<?=$selLc['idLecon']?>&Lvit','<?='#lv'.$selLc['idLecon']?>','')"> Nombre des vues : <?=$nb?></div>
                         <div id='<?='lv'.$selLc['idLecon']?>'  style="">
                   
                         </div>
                         <?php
                        }
                        ?>
                            
                    </ul>

                <div>

            </td>
           
            <td colspan="3">
                <div style="margin-top:5px">
                    <ul class="">
                            <?php
                        $tur =1;
                        foreach($dv as $selDv){
                        ?>
                            <li id='<?=$selDv['idDevoir']?>'> <?=$tur++?>)<b><?='Devoir code : ['.$selDv['idDevoir'].'] Date de Creation '.$selDv['dateCreation'].'date Remise :'.$selDv['dateRemise'].''?></b></li>
                         <?php
                        include_once('../model.param_access/suivie_remise_devoirs.class.php');
                        $rm = new suivie_remise_devoirs();
                        $rm = $rm->remis($selDv['idDevoir']);
                        $nbrm=0;
                        
                        foreach($rm as $selRm ){
                            $nbrm++;
                         }
                         ?>
                         <div onclick="Orientation('../control.param_access/ctr_devoirs.php?idDevoir=<?=$selDv['idDevoir']?>&Rmis','<?='#Rm'.$selDv['idDevoir']?>','')"> Nombre devoirs remis : <?=$nbrm?></div>
                         <div id='<?='Rm'.$selDv['idDevoir']?>'  style="">
                   
                         </div>
                         <?php
                        }
                        ?>
                            
                    </ul>
                <div>
            
            </td>
        </tr>
       
        <!--  -->
        </tbody>
    </table>
</div>



<?php
echo $_GET['maClasse'];
echo $_GET['cours'];
echo $_GET['idCours'];
echo $_GET['idCls'];
include_once("footer_rapport.php");
?>