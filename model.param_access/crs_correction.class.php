<?php
include_once('param_connexion.php');
class crs_correction {
    private static  $idCorrection;
    private static $idReponset;
    private static $idAffectation;
    private static $cote;
    private static $commentaire;
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        self::$con=con();
    }
   
    public static function ajouter($idReponset,$idAff,$cote,$cmt,$pond)
    {

        $idRep= htmlspecialchars($idReponset);
        $idAffectation = htmlspecialchars($idAff);
        $cote= $cote;
        $commentaire= $cmt;

        $correct = new crs_correction();
        $correct=$correct->selectionnerByRep($idRep)->fetch();
        
        if($correct==''){
        $req=self::$con->prepare('INSERT INTO  `crs_correction` ( idReponset, idAffectation,cote,commentaire ) VALUES (?,?,?,?)');
        if($pond>=$cote){
            if($req->execute(array($idRep,$idAffectation,$cote,$commentaire))){
            self::$idReponset =$idRep;
            self::$idAffectation =$idAffectation;
            self::$cote =$cote;
            self::$commentaire =$commentaire;  
            echo "Enregistre";
        }else{
            echo "Echec d'enreg";
        }
        }else{
            echo "Eche d'enreg il ya depassement";
            }
        
        }else{
            
            if($pond>=$cote){
                if($req=self::$con->exec('UPDATE  `crs_correction` SET idReponset='.$idRep.', idAffectation='.$idAffectation.', cote='.$cote.', commentaire="'.$commentaire.'" WHERE idCorrection='.$correct['idCorrection'])){
                    self::$idCorrection =$correct;
                    self::$idReponset =$idRep;
                    self::$idAffectation =$idAffectation;
                    self::$cote =$cote;
                    self::$commentaire =$commentaire;  
                   echo "Modifie";
                }else{
                    echo "Echec de Modification";
                }
        }else{
            echo "Echec de modif il ya depassement";
        }
        }

    }
 
    public function selectionnerByRep($idRep){
        return  self::$con->query('SELECT * FROM crs_correction as cr WHERE idReponset="'.$idRep.'" ORDER BY cr.idCorrection DESC LIMIT 1');
    }
    //DESTRUCTEUR
    public function __destuct(){
    }
}


