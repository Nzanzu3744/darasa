<?php
include_once('../model.param_access/param_connexion.php');
class crs_correction {
    private static  $idCorrection;
    private static $idReponset;
    private static $idUtilisateur;
    private static $cote;
    private static $commentaire;
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        self::$con=con();
    }
   
    public static function ajouter($idReponset,$idUti,$cote,$cmt,$pond)
    {

        $idRep= htmlspecialchars($idReponset);
        $idUtilisateur = htmlspecialchars($idUti);
        $cote= $cote;
        $commentaire= $cmt;

        
        $correct=self::selectionnerByRep($idRep)->fetch();

    
        
        if($correct==''){
        $req=self::$con->prepare('INSERT INTO  `crs_correction` ( idReponset, idUtilisateur,cote,commentaire ) VALUES (?,?,?,?)');
        if($pond>=$cote){
            if($req->execute(array($idRep,$idUtilisateur,$cote,$commentaire))){
            self::$idReponset =$idRep;
            self::$idUtilisateur =$idUtilisateur;
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
                if($req=self::$con->exec('UPDATE  `crs_correction` SET idReponset='.$idRep.', idUtilisateur='.$idUtilisateur.', cote='.$cote.', commentaire="'.$commentaire.'" WHERE idCorrection='.$correct['idCorrection'])){
                    self::$idCorrection =$correct;
                    self::$idReponset =$idRep;
                    self::$idUtilisateur =$idUtilisateur;
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
 
    public static function selectionnerByRep($idRep){
        return  self::$con->query('SELECT * FROM crs_correction as cr WHERE idReponset="'.$idRep.'" ORDER BY cr.idCorrection DESC LIMIT 1');
    }
    //DESTRUCTEUR
    public function __destuct(){
    }
}


