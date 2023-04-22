<script src="../vue.param_access/script.js"></script>
<?php

if(isset($_GET['annul'])){
    session_start();
    setcookie('classeSel',"", (time()-1));
    include("../vue.param_access/profil_Enseignant.php");

}else if(isset($_GET['Valide'])){
    
    if(isset($_COOKIE['classeSel'])){
        $tbAff=array();
        $tbAff=json_decode($_COOKIE['classeSel']);
        include_once("../model.param_access/param_connexion.php");
        include_once("../model.param_access/org_affectation.class.php");
        include_once("../model.param_access/org_anneesco.class.php");
        $Ins = new org_affectation();
        $sel_A=new org_anneesco();
        $sel_A=$sel_A->selectionnerDerAn()->fetch();
        $act=1;
            foreach($tbAff as $affect){
                   $Ins->ajouter($affect,$sel_A['idAnneeSco'],$_GET['idutil'],$act);
            }
            
            setcookie('classeSel','', (time()-1));
            session_start();
            include("../vue.param_access/profil_Enseignant.php");

        

    }else {
        echo '<center class="col-sm-12" style="color:red">VEUILLEZ SELECTINNER UNE CLASSE POUR L\'INSCRIPTION<center> <button class="btn btn-warning pull-right" style="height:40px; margin-top:13px;" onclick=Orientation("../control.param_access/ctr_membre.php?rtn=true&idGroupe='.$_GET['idGroupe'].'","#corps")>Returner</button>'; 
    }
}else if(isset($_GET['idutil']) AND isset($_GET['enseigna']) AND isset($_GET['idGroupe'])){ 
    session_start();
   include("../vue.param_access/profil_Enseignant.php");
}else if(isset($_GET['rtn']) AND isset($_GET['idGroupe'])){
   include_once("../vue.param_access/liste_role.php");
}else{
  echo "ECHEC LISTE INSCRIPTION";
}
?>