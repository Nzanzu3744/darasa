<script src="../vue.param_access/script.js"></script>
<?php

if(isset($_GET['annul'])){
    (empty($_SESSION))?session_start():'';
    setcookie('classeSel',"", (time()-1));
    include("../vue.param_access/profil_Eleve.php");

}else if(isset($_GET['Valide'])){
    
    if(isset($_COOKIE['classeSel'])){
        $tbIns=array();
        $tbIns=json_decode($_COOKIE['classeSel']);
        include_once("../model.param_access/param_connexion.php");
        include_once("../model.param_access/org_inscription.class.php");
        include_once("../model.param_access/org_anneesco.class.php");
        $Ins = new org_inscription();
        $sel_A=new org_anneesco();
        $sel_A=$sel_A->selectionnerDerAn()->fetch();
            foreach($tbIns as $inscr){
                    $Ins->ajouter($inscr,$sel_A['idAnneeSco'],$_GET['idutil']);
            }
        setcookie('classeSel','', (time()-1));
        // (empty($_SESSION))?session_start():'';
        include("../vue.param_access/profil_Eleve.php");
        

    }else {
        echo '<center class="col-sm-12" style="color:red">VEUILLEZ SELECTINNER UNE CLASSE POUR L\'INSCRIPTION<center> <button class="btn btn-warning pull-right" style="height:40px; margin-top:13px;" onclick=Orientation("../control.param_access/ctr_membre.php?rtn=true&idGroupe='.$_GET['idGroupe'].'","#corps")>Returner</button>'; 
    }
}else if(isset($_GET['idutil']) AND isset($_GET['eleve'])){ 
    // (empty($_SESSION))?session_start():'';
    include("../vue.param_access/profil_Eleve.php");


    
 }else if(isset($_GET['rtn']) AND isset($_GET['idGroupe'])){
    include_once("../vue.param_access/liste_role.php");
 }else{
   echo "ECHEC LISTE INSCRIPTION";
}

?>