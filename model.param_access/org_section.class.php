<?php
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
    public static function ajouter($section)
    {
        $stion = htmlspecialchars($section);
        $req=self::$con->prepare('INSERT INTO `org_section`( `section`) VALUES (?)');
        if($req->execute(array($stion))){
            //je doit revenir ici pour recuperer le dernier ajoute genre mapping
            self::$section = htmlspecialchars($stion);
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
        if(self::$con->exec('DELETE FROM `org_section` WHERE idSection="'.$idPmt.'"')){
            self::$idSection = '';
            return true;
        }else{
            return false;
        }
    }

    public static function selectionner(){
        return  self::$con->query('SELECT * FROM org_section ORDER BY idSection ASC');
    }
    //
    public static function rechercher($idSection){
        $idPmt = htmlspecialchars($idSection);
        return $var = self::$con->query("SELECT * FROM org_section WHERE idSection =".$idPmt." ORDER BY idSection ASC");
        // foreach($var as $sel){
        //     self::$idSection = $sel['idSection'];
        //     self::$idSection = $sel['idSection'];
        //     self::$section = $sel['section'];
        //     self::$actif = $sel['actif'];
        // }
        // return $var; 
    }
    //DESTRUCTEUR
    public function __destuct(){
    }
}


