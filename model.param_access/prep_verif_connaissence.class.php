<?php
include_once('param_connexion.php');
class prep_verif_connaissence{
    private static  $idExploitation;
    private static  $idVerifConnaissence;
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
                  $req=self::$con->prepare('INSERT INTO prep_verif_connaissence (idExploitation,question,reponse) VALUES (?,?,?)');
                    if($req->execute(array($idExp,$quest,$rep))){
                        return true;               
                    }else{
                        return false;
                    }  
    }
    public static function selectionner(){
        return $req=self::$con->query('SELECT * FROM prep_verif_connaissence');
    }
    public static function filtre($idExp){
        return $req=self::$con->query('SELECT * FROM prep_verif_connaissence  WHERE idExploitation='.$idExp);
    }
    public static function supprimer($idVerif){
        return $req=self::$con->query('DELETE FROM `prep_verif_connaissence` WHERE idVerifConnaissence='.$idVerif);
    }
   
    //DESTRUCTEUR
    public function __destuct(){
    }
}


