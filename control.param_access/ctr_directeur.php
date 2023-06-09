<?php

if(isset($_GET['promChk'])){
    $table=array();
    if(!isset($_COOKIE['promSel'])){    
        $table=array($_GET['idPromotion']);
        $tbjsonC=json_encode($table);
        setcookie('promSel',$tbjsonC, (time()+360*10));
    }else{
        $table = json_decode($_COOKIE['classeSel']);
        array_push($table,$_GET['idPromotion']);
        $tbjsonC=json_encode($table);
        setcookie('promSel',$tbjsonC, (time()+360*10));
    }
}else if(isset($_GET['annul'])){
    session_start();
    setcookie('promSel',"", (time()-1));
    include("../vue.param_access/profil_Directeur.php");

}else if(isset($_GET['Valide'])){
    
    if(isset($_COOKIE['promSel'])){
        $tbAff=array();
        $tbAff=json_decode($_COOKIE['promSel']);
        include_once("../model.param_access/dir_directeur.class.php");

        $affe = new dir_directeur();
            foreach($tbAff as $tbAff){
                    $affe->ajouter($tbAff,$_GET['idutil'],'1');
            }
        setcookie('promSel','', (time()-1));
        include("../vue.param_access/profil_Directeur.php");
        

    }else {
        echo '<center class="col-sm-12" style="color:red">VEUILLEZ SELECTINNER UNE CLASSE POUR L\'INSCRIPTION<center> <button class="btn btn-warning pull-right" style="height:40px; margin-top:13px;" onclick=Orientation("../control.param_access/ctr_membre.php?rtn=true&idGroupe='.$_GET['idGroupe'].'","#corps")>Returner</button>'; 
    }
}else if(isset($_GET['idutil']) AND isset($_GET['directeur']) AND isset($_GET['idGroupe'])){ 
    session_start();
   include("../vue.param_access/profil_Directeur.php");
}else if(isset($_GET['rtn']) AND isset($_GET['idGroupe'])){
   include_once("../vue.param_access/liste_role.php");
}else{
  echo "ECHEC LISTE AFFECTATION DIRECTEUR";
}
?>