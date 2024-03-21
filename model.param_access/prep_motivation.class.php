<?php
include_once('../model.param_access/param_connexion.php');
class prep_motivation{
    private static  $idExploitation;
    private static  $idRevision;
    private static  $motivation;
    private static  $comprehension;
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        return self::$con=con();
    }

    //METHODES
    public static function ajouter($idExpl,$motivation,$repc)
    {
        $idExp=htmlspecialchars($idExpl);
        $quest=htmlspecialchars($motivation);
        $rep=htmlspecialchars($repc);
                  $req=self::$con->prepare('INSERT INTO prep_motivation (idExploitation,motivation,comprehension) VALUES (?,?,?)');
                    if($req->execute(array($idExp,$quest,$rep))){
                        return true;               
                    }else{
                        return false;
                    }  
    }
    public static function selectionner(){
        return $req=self::$con->query('SELECT * FROM prep_motivation');
    }
    public static function filtre($idExp){
        return $req=self::$con->query('SELECT * FROM prep_motivation  WHERE idExploitation='.$idExp);
    }
    public static function supprimer($idMot){
        return $req=self::$con->query('DELETE FROM `prep_motivation` WHERE idSituation='.$idMot);
    }
   
    //DESTRUCTEUR
    public function __destuct(){
    }
}


