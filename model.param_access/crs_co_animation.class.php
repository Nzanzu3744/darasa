<?php
include_once('param_connexion.php');
class crs_co_animation {
    private static  $idCoAnimation;
    private static  $idCours;
    private static  $idClasse;
    private static  $idUtilisateur;
    private static  $dateCreationCoA;
    private static  $actif;

    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        return self::$con=con();
    }

    //METHODES
    public static function ajouter($idUtil01,$idCrs,$idCls)
    {
        $idCours=htmlspecialchars($idCrs);
        $idUtilisateur=htmlspecialchars($idUtil01);
        $idClasse=htmlspecialchars($idCls);

                  $req=self::$con->prepare('INSERT INTO `crs_co_animation`(`idUtilisateur`, `idCours`,idClasse) VALUES (?,?,?)');
                    if($req->execute(array($idUtilisateur,$idCours,$idClasse))){
                        return true;              
                    }else{
                        return false;
                    }  
    }
    public static function modifier($idCoa,$idCrs,$idCls,$idUtil01,$idActf){
         $idCoAnimation=htmlspecialchars($idCoa);
         $idCours=htmlspecialchars($idCrs);
         $idClasse=htmlspecialchars($idCls);
        $idUtilisateur=htmlspecialchars($idUtil01);
        $idActif=htmlspecialchars($idActf);
        $req=self::$con->exec("UPDATE `crs_co_animation` SET `idUtilisateur`=".$idUtilisateur.",`idCours`=".$idCours.", idClasse=".$idClasse.", `actif`=".$idActif." WHERE idCoAnimation`=".$idCoA);
    }
     public static function supprimer($idCoAnimation){
        $idCoA = htmlspecialchars($idCoAnimation);
        if(self::$con->exec('DELETE FROM `crs_co_animation` WHERE idCoAnimation="'.$idCoA.'"')){
            return true;
        }else{
            return false;
        }
    }

    public static function selectionner(){
        return  self::$con->query('SELECT * FROM crs_co_animation ORDER BY idCoAnimation ASC');
    }
    public static function liste_co_animateur_crs($idCours){
        return  self::$con->query('SELECT * FROM crs_co_animation as coa  INNER JOIN param_utilisateur as ut ON coa.idUtilisateur=ut.idUtilisateur WHERE coa.idCours='.$idCours);
    }

    //DESACTIVATION
    public static function desactivation($idCoA){
        $idCoAni = htmlspecialchars($idCoA);
        $CAn = crs_co_animation::rechercher($idCoAni);
        $actif=null;
        ($CAn['actif']==1)?$actif=0:$actif=0;
        self::$con->query('UPDATE crs_co_animation SET actif='.$actif.' WHERE idCoAnimation='.$CAn['idCoAnimation']);
        
    }
    //
    public static function rechercher($idCoAnimation){
        $idCoA = htmlspecialchars($idCoAnimation);
        return $var = self::$con->query("SELECT * FROM crs_co_animation WHERE idCoAnimation =".$idCoA." ORDER BY idCoAnimation ASC");
    }
    //DESTRUCTEUR
    public function __destuct(){
    }
}

