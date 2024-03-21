<?php
include_once('../model.param_access/param_connexion.php');
class prep_consigne{
    private static  $idExploitation;
    private static  $idConsigne;
    private static  $consigne;
    private static  $applicabilite;
   
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        return self::$con=con();
    }
    //METHODES
    public static function ajouter($idExpl,$consigne,$appl)
    {
        $idExp=htmlspecialchars($idExpl);
        $cons=htmlspecialchars($consigne);
        $appl=htmlspecialchars($appl);
                  $req=self::$con->prepare('INSERT INTO prep_consigne (idExploitation,consigne,applicabilite) VALUES (?,?,?)');
                    if($req->execute(array($idExp,$cons,$appl))){
                        return true;               
                    }else{
                        return false;
                    }  
    }
    public static function selectionner(){
        return $req=self::$con->query('SELECT * FROM prep_consigne');
    }
    public static function filtre($idExp){
        return $req=self::$con->query('SELECT * FROM prep_consigne  WHERE idExploitation='.$idExp);
    }
    public static function supprimer($idCons){
        return $req=self::$con->query('DELETE FROM prep_consigne WHERE idConsigne='.$idCons);
    }
   
    //DESTRUCTEUR
    public function __destuct(){
    }
}


