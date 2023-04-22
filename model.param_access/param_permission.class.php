<?php
include_once('param_groupe.class.php');
class param_permission {
    private static  $idPermission;
    private static $nomTable;
    private static $idGroupe;
    private static $ajouter;
    private static $modifier;
    private static $afficher;
    private static $supprimer;
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        self:: $idPermission = "";
        self:: $nomTable = "";
        self:: $idGroupe = "";
        self:: $ajouter = 0;
        self:: $modifier = 0;
        self:: $afficher = 0;
        self:: $supprimer = 0;
        return self::$con=con();
    }
    //GETTEURS
    public static function getidPermission(){
        return self::$idPermission;
    }
    public static function getajouter(){
        return self::$ajouter;
    }
    public static function getmodifier(){
        return self::$modifier;
    }
    public static function getafficher(){
        return self::$afficher;
    }
    public static function getsupprimer(){
        return self::$supprimer;
    }
    //SETTEURS
    public static function setajouter(){
        if(self::$ajouter==0){
            $ajter = 1;
        }else{
            $ajter = 0;
        }
        if(self::$con->exec('UPDATE param_permission SET ajouter = "'.$ajter.'" WHERE idPermission="'.self::$idPermission.'"'))
           {  
            self::$ajouter = htmlspecialchars($ajter);
            return true;
        }else{
            return false;
        }
    }
    public static function setmodifier(){
        if(self::$modifier==0){
            $mfier = 1;
        }else{
            $mfier = 0;
        }
        if(self::$con->exec('UPDATE param_permission SET modifier = "'.$mfier.'" WHERE idPermission="'.self::$idPermission.'"'))
           {  
            self::$modifier = htmlspecialchars($mfier);
            return true;
        }else{
            return false;
        }
    }
    public static function setafficher(){
        if(self::$afficher==0){
            $acher = 1;
        }else{
            $acher = 0;
        }
        if(self::$con->exec('UPDATE param_permission SET afficher = "'.$acher.'" WHERE idPermission="'.self::$idPermission.'"'))
           {  
            self::$afficher = htmlspecialchars($acher);
            return true;
        }else{
            return false;
        }
    }
    public static function setsupprimer(){
        if(self::$supprimer==0){
            $sumer = 1;
        }else{
            $sumer = 0;
        }
        if(self::$con->exec('UPDATE param_permission SET supprimer = "'.$sumer.'" WHERE idPermission="'.self::$idPermission.'"'))
           {  
            self::$supprimer = htmlspecialchars($sumer);
            return true;
        }else{
            return false;
        }
    }

    //METHODES
    public function ajouter($nomTable,$idGroupe,$ajouter,$modifier,$afficher,$supprimer)
    {
        $nomT= $nomTable;
        $idGrp = $idGroupe;
        $ajter = $ajouter;
        $mfier = $modifier;
        $acher = $afficher;
        $sumer = $supprimer;

        $req=self::$con->prepare('INSERT INTO param_permission (nomTable, idGroupe, ajouter, modifier, afficher, supprimer) VALUES (?,?,?,?,?,?)');
        if($req->execute(array($nomT,$idGrp,$ajter,$mfier,$acher,$sumer))){
            //je doit revenir ici pour recuperer le dernier ajoute genre mapping
            self::$nomTable = htmlspecialchars($nomT);
            self::$idGroupe = htmlspecialchars($idGrp);
            self::$ajouter = $ajter;
            self::$modifier = $mfier;
            self::$afficher = $acher;
            self::$supprimer = $sumer;
            return "true";
        }else{
            return "false";
        }

    }
    
    public function modifier($idPermission,$nomTable,$idGroupe,$ajouter,$modifier,$afficher,$supprimer)
    {
        $idPmt =htmlspecialchars($idPermission);
        $nomT= htmlspecialchars($nomTable);
        $idGrp = htmlspecialchars($idGroupe);
        $ajter = htmlspecialchars($ajouter);
        $mfier = htmlspecialchars($modifier);
        $acher = htmlspecialchars($afficher);
        $sumer = htmlspecialchars($supprimer);
        if(self::$con->exec('UPDATE param_permission SET nomTable="'.$nomT.'",idGroupe = "'.$idGrp.'" ,ajouter = "'.$ajter.'",modifier="'.$mfier.'",afficher="'.$acher.'"supprimer="'.$sumer.'" WHERE idPermission="'.$idPmt.'"'))
           {  
            self::$nomTable = htmlspecialchars($nomT);
            self::$idGroupe = htmlspecialchars($idGrp);
            self::$ajouter = htmlspecialchars($ajter);
            self::$modifier = htmlspecialchars($mfier);
            self::$afficher = htmlspecialchars($acher);
            self::$supprimer = htmlspecialchars($sumer);
            return true;
        }else{
            return false;
        }
    }
   
    public function supprimer($idPermission){
        $idPmt = htmlspecialchars($idPermission);
        if(self::$con->exec('DELETE FROM `param_permission` WHERE idPermission="'.$idPmt.'"')){
            self::$idPermission = '';
            return true;
        }else{
            return false;
        }
    }

    public function selectionner(){
        return  self::$con->query('SELECT * FROM param_permission ORDER BY idPermission ASC');
    }
    //
    public function rechercher($idPermission){
        $idPmt = htmlspecialchars($idPermission);
        $var = self::$con->query("SELECT * FROM param_permission WHERE idPermission ='".$idPmt."' ORDER BY idPermission ASC");
        foreach($var as $sel){
            self::$idPermission = $sel['idPermission'];
            self::$nomTable = $sel['nomTable'];
            self::$idGroupe = $sel['idGroupe'];
            self::$ajouter = $sel['ajouter'];
            self::$modifier = $sel['modifier'];
            self::$afficher = $sel['afficher'];
            self::$supprimer = $sel['supprimer'];
        }
        return $var; 
    }

    public function rechercheByIdGroupe($idGpe){
        $idGp = htmlspecialchars($idGpe);
        return $var = self::$con->query("SELECT * FROM param_permission WHERE idGroupe ='".$idGp."' ORDER BY idPermission ASC");
    }
    //DESTRUCTEUR
    public function __destuct(){
    }
}


