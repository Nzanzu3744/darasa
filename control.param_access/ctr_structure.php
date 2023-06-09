
 <!-- <script src="../bootstrap/dist/js/bootstrap.min.js"></script> -->

<?php
include_once('../model.param_access/param_connexion.php');
include_once('../model.param_access/org_promotion.class.php');
include_once('../model.param_access/org_section.class.php');
include_once('../model.param_access/org_unite.class.php');


if(isset($_GET['ajouterPm']))
{
        $prom =new org_promotion();
        $prom->ajouter(htmlspecialchars($_GET['Promtn']));
        include("../vue.param_access/form_promotion.php");

}else if(isset($_GET['ajouterS']))
{
    $sect =new org_section();
     $sect->ajouter(htmlspecialchars($_GET['Sectn']));
     include("../vue.param_access/form_section.php");

}else if(isset($_GET['ajouterU']))
{
    $unit =new org_unite();
    $unit->ajouter(htmlspecialchars($_GET['Unit']));
    include("../vue.param_access/form_unite.php");  

}else if(isset($_GET['promoChk'])){
  
    if(!isset($_COOKIE['promotion'])){    
        $table=array($_GET['idPromotion']);
        $tbjsonP=json_encode($table);
        setcookie('promotion',$tbjsonP, (time()+360*10));
    }else{
        $table = json_decode($_COOKIE['promotion']);
        array_push($table,$_GET['idPromotion']);
        $tbjsonP=json_encode($table);
        setcookie('promotion',$tbjsonP, (time()+360*10));
    }
}else if(isset($_GET['sectionChk'])){
 
    if(!isset($_COOKIE['section'])){    
        $table=array($_GET['idSection']);
        $tbjsonP=json_encode($table);
        setcookie('section',$tbjsonP, (time()+360*10));
    }else{
        $table = json_decode($_COOKIE['section']);
        array_push($table,$_GET['idSection']);
        $tbjsonP=json_encode($table);
        setcookie('section',$tbjsonP, (time()+360*10));
    }
}else if(isset($_GET['uniteChk'])){
    $table=array();

    if(!isset($_COOKIE['unite'])){    
        $table=array($_GET['idUnite']);
        $tbjsonP=json_encode($table);
        setcookie('unite',$tbjsonP, (time()+360*10));
    }else{
        $table = json_decode($_COOKIE['unite']);
        array_push($table,$_GET['idUnite']);
        $tbjsonP=json_encode($table);
        setcookie('unite',$tbjsonP, (time()+360*10));
    }
}else if(isset($_GET['val'])){
    if(isset($_COOKIE['promotion'])AND isset($_COOKIE['section']) AND isset($_COOKIE['unite'])){
       
            $tbP=json_decode($_COOKIE['promotion']);
            $tbS=json_decode($_COOKIE['section']);
            $tbU=json_decode($_COOKIE['unite']);
            include_once("../model.param_access/param_connexion.php");
            include_once("../model.param_access/org_classe.class.php");
            $cl = new org_classe();

            foreach($tbP as $tp){
                foreach($tbS as $ts){
                    foreach($tbU as $tu){
                        $cl->ajouter($tp,$ts,$tu,"");
                    }

                }    

            }
            setcookie('promotion','', (time()));
            setcookie('section','', (time()));
            setcookie('unite','', (time()));
        include_once("../vue.param_access/structuration.php");


    }else{
        echo '<center class="col-sm-12" style="color:red">VEUILLEZ SELECTINNER LA PROMOTION, SECTION ET UNITE POUR LA CREATION D\'UNE CLASSE <center> <button class="btn btn-warning pull-right" style="height:40px; margin-top:13px;" onclick=Orientation("structuration.php","#panel")>Returner</button>';
    }
   
}else if(isset($_GET['actu'])) {
    if(setcookie('promotion')){
        setcookie('promotion','', (time()));
    }
    if(setcookie('section')){
        setcookie('section','', (time()));
    }
    if(setcookie('unite')){
        setcookie('unite','', (time()));
    }
    include_once("../vue.param_access/structuration.php");
}else {
    echo "ECHEC SCRIPT SELECT";
   }

?>

