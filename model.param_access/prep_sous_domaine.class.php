<?php
include_once('param_connexion.php');
class prep_sous_domaine{
    private static  $idSousDomaine;
    private static  $sousDomaine;
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        return self::$con=con();
    }

    //METHODES
    public static function ajouter($sous_d)
    {
        $sousDomaine=htmlspecialchars($sous_d);
                  $req=self::$con->prepare('INSERT INTO prep_sous_domaine (sousDomaine) VALUES (?)');
                    if($req->execute(array($sousDomaine))){
                        return true;               
                    }else{
                        return false;
                    }  
    }
    public static function selectionner(){
        return $req=self::$con->query('SELECT * FROM prep_sous_domaine');
    }
    public static function filtre($idSd){
        return $req=self::$con->query('SELECT * FROM prep_sous_domaine  WHERE idSousDomaine='.$idSd);
    }
   
    //DESTRUCTEUR
    public function __destuct(){
    }
}


