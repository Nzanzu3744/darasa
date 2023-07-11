
<?php
include_once('param_connexion.php');
class org_unite {
    private static  $idUnite;
    private static $unite;
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        self::$con=con();
    }
    //GETTEURS
    public static function getidUnite(){
        return self::$idUnite;
    }
    //METHODES
    public static function ajouter($unite)
    {
        $ute = htmlspecialchars($unite);
        $req=self::$con->prepare('INSERT INTO `org_unite`( `unite`) VALUES (?)');
        if($req->execute(array($ute))){
            //je doit revenir ici pour recuperer le dernier ajoute genre mapping
            self::$unite = htmlspecialchars($ute);
            return true;
        }else{
            return false;
        }

    }
    
    public static function modifier($idUnite,$unite)
    {
        $idUte = htmlspecialchars($idUnite);
        $ute = htmlspecialchars($unite);
        if(self::$con->exec('UPDATE org_unite SET unite = "'.$ute.'" WHERE idUnite="'.$idUte.'"'))
           {  
            self::$idUnite = htmlspecialchars($idUnite);
            self::$unite = htmlspecialchars($unite);
            return true;
         }else{
             return false;
    }
    }
   
    public static function supprimer($idUnite){
        $idUte = htmlspecialchars($idUnite);
        if(self::$con->exec('DELETE FROM `org_unite` WHERE idUnite="'.$idUte.'"')){
            self::$idUnite = '';
            return true;
        }else{
            return false;
        }
    }

    public static function selectionner(){
        return  self::$con->query('SELECT * FROM org_unite ORDER BY idUnite ASC');
    }
    //
    public static function rechercher($idUnite){
        $idUte = htmlspecialchars($idUnite);
        return $var = self::$con->query("SELECT * FROM org_unite WHERE idUnite =".$idUte." ORDER BY idUnite ASC");
    }
    //DESTRUCTEUR
    public function __destuct(){
    }
}


