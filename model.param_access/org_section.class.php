<?php
include_once('../model.param_access/param_connexion.php');
class org_section {
    private static  $idSection;
    private static $section;
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        self::$con=con();
    }
    //GETTEURS
    public static function getidsection(){
        return self::$idSection;
    }
    //METHODES
    public static function ajouter($section, $idPromotion)
    {
        $stion = htmlspecialchars($section);
        $idprom = htmlspecialchars($idPromotion);
        $req=self::$con->prepare('INSERT INTO  org_section (section, idPromotion) VALUES (?,?)');
        if($req->execute(array($stion,$idprom ))){
            return true;
        }else{
            return false;
        }

    }
    
    public static function modifier($idSection,$section)
    {
        $idPmt = htmlspecialchars($idSection);
        $stion = htmlspecialchars($section);
        if(self::$con->exec('UPDATE org_section SET section = "'.$stion.'" WHERE idSection="'.$idPmt.'"'))
           {  
            self::$idSection = htmlspecialchars($idSection);
            self::$section = htmlspecialchars($section);
            return true;
         }else{
             return false;
    }
    }
   
    public static function supprimer($idSection){
        $idPmt = htmlspecialchars($idSection);
        if(self::$con->exec('DELETE FROM  org_section  WHERE idSection="'.$idPmt.'"')){
            self::$idSection = '';
            return true;
        }else{
            return false;
        }
    }

    public static function selectionner(){
        return  self::$con->query('SELECT * FROM org_section as st INNER JOIN org_promotion as pm ON pm.idPromotion=st.idPromotion ORDER BY st.idSection ASC');
    }
    //
    public static function rechercher($idSection){
        $idPmt = htmlspecialchars($idSection);
        return $var = self::$con->query("SELECT * FROM org_section WHERE idSection =".$idPmt." ORDER BY idSection ASC");
    }
    //DESTRUCTEUR
    public function __destuct(){
    }
}


