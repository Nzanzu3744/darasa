<?php
include_once('../model.param_access/param_connexion.php');
class crs_annexedevoir {
    private static  $idAnnexeDevoir;
    private static  $idDevoir;
    private static $url;
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        return self::$con=con();
    }
    //GETTEURS
    public static function getidAnnexeDevoir(){
        return self::$idAnnexeDevoir;
    }
    public static function getidDevoir(){
        return self::$idDevoir;
    }
    //METHODES
    public function ajouter($idDevoir,$url)
    {
        $idDv=htmlspecialchars($idDevoir);
        $url=htmlspecialchars($url);
        $req=self::$con->prepare('INSERT INTO crs_annexedevoir (idDevoir, url) VALUES (?,?)');
        if($req->execute(array($idDv,$url))){
            //je doit revenir ici pour recuperer le dernier ajoute genre mapping
            self::$idDevoir=$idDv;
            self::$url=$url;
            return true;
        }else{
            return false;
        }

    }
    
    public function modifier($idAnnexeDevoir,$idDevoir, $url)
    {
        $idAnnexeDv = htmlspecialchars($idAnnexeDevoir);
        $idDv = htmlspecialchars($idDevoir);
        $url= htmlspecialchars($url);
        if(self::$con->exec('UPDATE crs_annexedevoir SET idDevoir="'.$idDv.'", url="'.$url.'" WHERE idAnnexeDevoir="'.$idAnnexeDv.'"'))
            {
                $idAnnexeDv = htmlspecialchars($idAnnexeDevoir);
                self::$idDevoir=htmlspecialchars($idDevoir);
                self::$url =htmlspecialchars($url);
                echo true;  
            }else{
                echo false;
            }
    }
   
    public function supprimer($idAnnexeDevoir){
        $idAnnexeDv = htmlspecialchars($idAnnexeDevoir);
        if(self::$con->exec('DELETE FROM `crs_annexedevoir` WHERE idAnnexeDevoir="'.$idAnnexeDv.'"')){
            self::$idAnnexeDevoir = '';
            self::$url = "";
            return true;
        }else{
            return false;
        }
    }

    public function selectionner(){
        return  self::$con->query('SELECT * FROM crs_annexedevoir ORDER BY idAnnexeDevoir ASC');
    }
    
    public function rechercher($idAnnexeDevoir){
        $idAnnexeDv = htmlspecialchars($idAnnexeDevoir);
        $var = self::$con->query("SELECT * FROM crs_annexedevoir WHERE idAnnexeDevoir ='".$idAnnexeDv."' ORDER BY idAnnexeDevoir ASC");
        // foreach($var as $sel){
        //     self::$idDevoir = $sel['idDevoir'];
        //     self::$idAnnexeDevoir = $sel['idAnnexeDevoir'];
        //     self::$url = $sel['url'];
        // }
        return $var; 
    }
    public function filtrer($idDevoir){
        $idDv=htmlspecialchars($idDevoir);
        $var = self::$con->query("SELECT * FROM crs_annexedevoir WHERE idDevoir like '".$idDv."%' ORDER BY idAnnexeDevoir ASC");
        // foreach($var as $sel){
        //     self::$idDevoir = $sel['idDevoir'];
        //     self::$idAnnexeDevoir = $sel['idAnnexeDevoir'];
        // }
        return $var;
    }
    //DESTRUCTEUR
    public function __destuct(){
    }
}


