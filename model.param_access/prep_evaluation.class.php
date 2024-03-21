<?php
include_once('../model.param_access/param_connexion.php');
class prep_evaluation{
    private static  $idExploitation;
    private static  $idRevision;
    private static  $question;
    private static  $reponse;
   
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        return self::$con=con();
    }

    //METHODES
    public static function ajouter($idExpl,$question,$repc)
    {
        $idExp=htmlspecialchars($idExpl);
        $quest=htmlspecialchars($question);
        $rep=htmlspecialchars($repc);
                  $req=self::$con->prepare('INSERT INTO prep_evaluation (idExploitation,question,reponse) VALUES (?,?,?)');
                    if($req->execute(array($idExp,$quest,$rep))){
                        return true;               
                    }else{
                        return false;
                    }  
    }
    public static function selectionner(){
        return $req=self::$con->query('SELECT * FROM prep_evaluation');
    }
    public static function filtre($idExp){
        return $req=self::$con->query('SELECT * FROM prep_evaluation  WHERE idExploitation='.$idExp);
    }
    public static function supprimer($idVerif){
        return $req=self::$con->query('DELETE FROM `prep_evaluation` WHERE idEvaluation='.$idVerif);
    }
   
    //DESTRUCTEUR
    public function __destuct(){
    }
}


