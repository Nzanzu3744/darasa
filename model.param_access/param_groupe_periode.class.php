<?php
include_once('param_connexion.php');
class param_groupe_periode {
    private static  $idGroupePeriode;
    private static  $groupePeriode;
    private static $frequence;
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        return self::$con=con();
    }
   
    //METHODES
    public static function ajouter($groupePeriode,$frequence)
    {
        $groupe_p=htmlspecialchars($groupePeriode);
        $fre47=htmlspecialchars($frequence);
        $req=self::$con->prepare('INSERT INTO param_groupe_periode (groupePeriode, frequence) VALUES (?,?)');
        if($req->execute(array($groupe_p,$fre47))){
            return true;
        }else{
            return false;
        }

    }
    
    public function modifier($idGroupePeriode,$groupePeriode,$frequence)
    {
        $idGp = htmlspecialchars($idGroupePeriode);
        $groupe = htmlspecialchars($groupePeriode);
        $fre47= htmlspecialchars($frequence);
        if(self::$con->exec('UPDATE param_groupe_periode SET groupePeriode="'.$groupe.'", frequence="'.$fre47.'" WHERE idGroupePeriode='.$idGp))
            {
                return true;  
            }else{
                return false;
            }
    }
   
    public static function supprimer($idGroupePeriode){
        $idgrouepe = htmlspecialchars($idGroupePeriode);
        if(self::$con->exec('DELETE FROM `param_groupe_periode` WHERE idGroupePeriode="'.$idgrouepe.'"')){
            return true;
        }else{
            return false;
        }
    }

    public static function selectionner(){
        return  self::$con->query('SELECT * FROM param_groupe_periode');
    }
    public static function filtrerbyId($idGp){
            return  self::$con->query('SELECT * FROM param_groupe_periode WHERE idGroupePeriode='.$idGp);
        }

    //DESTRUCTEUR
    public function __destuct(){
    }
}


