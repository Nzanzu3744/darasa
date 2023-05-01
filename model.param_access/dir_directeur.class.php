<?php
include_once('param_connexion.php');
class dir_directeur {
    private static  $idDirection;
    private static  $idPromotion;
    private static  $idUtilisateur;
    private static  $dateCreation;
    private static  $actif;
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        return self::$con=con();
    }
    //METHODES
    public static function ajouter($idPro,$idU, $act)
    {
        $idPromo=htmlspecialchars($idPro);
        $idUtil=htmlspecialchars($idU);
        $actif=htmlspecialchars($act);
       
                  $req=self::$con->prepare('INSERT INTO dir_directeur (idPromotion, idUtilisateur, actif) VALUES (?,?,?)');
                    if($req->execute(array($idPromo,$idUtil,$actif))){
                        self::$idPromotion=$idPromo;
                        self::$idUtilisateur=$idUtil;
                        self::$actif=$actif;
                        return true;               
                    }else{
                        return false;
                    }  
    }
   
    //DESTRUCTEUR
    public function __destuct(){
    }
}


