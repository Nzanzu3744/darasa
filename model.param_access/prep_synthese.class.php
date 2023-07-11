<?php
include_once('param_connexion.php');
class prep_synthese{
    private static  $idExploitation;
    private static  $educateur;
    private static  $eleve;
   
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        return self::$con=con();
    }

    //METHODES
    public static function ajouter($idExpl,$educ,$eleve)
    {
        $idExp=htmlspecialchars($idExpl);
        $edu=htmlspecialchars($educ);
        $elev=htmlspecialchars($eleve);
                  $req=self::$con->prepare('INSERT INTO prep_synthese (idExploitation,educateur,eleve) VALUES (?,?,?)');
                    if($req->execute(array($idExp,$edu,$elev))){
                        return true;               
                    }else{
                        return false;
                    }  
    }
    public static function selectionner(){
        return $req=self::$con->query('SELECT * FROM prep_synthese');
    }
    public static function filtre($idExp){
        return $req=self::$con->query('SELECT * FROM prep_synthese  WHERE idExploitation='.$idExp);
    }
    public static function supprimer($idObj){
        return $req=self::$con->query('DELETE FROM `prep_synthese` WHERE idSynthese='.$idObj);
    }
   
    //DESTRUCTEUR
    public function __destuct(){
    }
}


