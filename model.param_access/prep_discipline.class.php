<?php
include_once('../model.param_access/param_connexion.php');
class prep_discipline{
    private static  $idSousDomaine;
    private static  $sousDomaine;
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        return self::$con=con();
    }

    //METHODES
    public static function ajouter($sous_d, $dscipline)
    {
        $sousDomaine=htmlspecialchars($sous_d);
        $dscipline=htmlspecialchars($dscipline);
                  $req=self::$con->prepare('INSERT INTO prep_discipline(idSousDomaine,discipline) VALUES (?,?)');
                    if($req->execute(array($sousDomaine,$dscipline))){
                        return true;               
                    }else{
                        return false;
                    }  
    }
    public static function selectionner(){
        return $req=self::$con->query('SELECT * FROM prep_discipline as ds INNER JOIN prep_sous_domaine as sd ON sd.idSousDomaine=ds.idSousDomaine');
    }
    public static function filtrer($idSd){
        return $req=self::$con->query('SELECT * FROM prep_discipline as ds INNER JOIN prep_sous_domaine as sd ON sd.idSousDomaine=ds.idSousDomaine WHERE ds.idSousDomaine='.$idSd);
    }
    public static function filtrerDscip($idDs){
        return $req=self::$con->query('SELECT * FROM prep_discipline as ds INNER JOIN prep_sous_domaine as sd ON sd.idSousDomaine=ds.idSousDomaine WHERE ds.idDiscipline='.$idDs);
    }
   
    //DESTRUCTEUR
    public function __destuct(){
    }
}


