<?php
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
    
    public function modifier($idPromotion,$promotion)
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
   
    public function supprimer($idPromotion){
        $idPmt = htmlspecialchars($idPromotion);
        if(self::$con->exec('DELETE FROM `org_promotion` WHERE idPromotion="'.$idPmt.'"')){
            self::$idPromotion = '';
            return true;
        }else{
            return false;
        }
    }

    public function selectionner(){
        return  self::$con->query('SELECT * FROM org_promotion ORDER BY idPromotion ASC');
    }
    //
    public function rechercher($idPromotion){
        $idPmt = htmlspecialchars($idPromotion);
        return $var = self::$con->query("SELECT * FROM org_promotion WHERE idPromotion =".$idPmt." LIMIT 1");
        // foreach($var as $sel){
        //     self::$idPromotion = $sel['idPromotion'];
        //     self::$idPromotion = $sel['idPromotion'];
        //     self::$promotion = $sel['promotion'];
        //     self::$actif = $sel['actif'];
        // }
        // return $var; 
    }
    //DESTRUCTEUR
    public function __destuct(){
    }
}


