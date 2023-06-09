<?php
include_once('param_connexion.php');
class org_promotion {
    private static  $idPromotion;
    private static $promotion;
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        self::$con=con();
    }
    //GETTEURS
    public static function getidpromotion(){
        return self::$idPromotion;
    }
    //METHODES
    public function ajouter($promotion)
    {
        $pmtion = htmlspecialchars($promotion);
        $req=self::$con->prepare('INSERT INTO `org_promotion`( `promotion`) VALUES (?)');
        if($req->execute(array($pmtion))){
            //je doit revenir ici pour recuperer le dernier ajoute genre mapping
            self::$promotion = htmlspecialchars($pmtion);
            return true;
        }else{
            return false;
        }

    }
    
    public static function modifier($idPromotion,$promotion)
    {
        $idPmt = htmlspecialchars($idPromotion);
        $pmtion = htmlspecialchars($promotion);
        if(self::$con->exec('UPDATE org_promotion SET promotion = "'.$pmtion.'" WHERE idPromotion="'.$idPmt.'"'))
           {  
            self::$idPromotion = htmlspecialchars($idPromotion);
            self::$promotion = htmlspecialchars($promotion);
            return true;
         }else{
             return false;
    }
    }
   
    public static function supprimer($idPromotion){
        $idPmt = htmlspecialchars($idPromotion);
        if(self::$con->exec('DELETE FROM `org_promotion` WHERE idPromotion="'.$idPmt.'"')){
            self::$idPromotion = '';
            return true;
        }else{
            return false;
        }
    }

    public static function selectionner(){
        return  self::$con->query('SELECT * FROM org_promotion ORDER BY idPromotion ASC');
    }
    //
    public static function rechercher($idPromotion){
        $idPmt = htmlspecialchars($idPromotion);
        return $var = self::$con->query("SELECT * FROM org_promotion WHERE idPromotion =".$idPmt." LIMIT 1");
    }
    public static function rechercherDer(){
        return $var = self::$con->query("SELECT * FROM org_promotion ORDER BY idPromotion DESC LIMIT 1");
    } 
    
    //DESTRUCTEUR
    public function __destuct(){
    }
}


