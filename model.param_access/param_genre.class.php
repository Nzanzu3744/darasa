<?php
include_once('param_connexion.php');
class param_genre {
    private static  $idGenre;
    private static  $genre;
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        return self::$con=con();
    }
    //GETTEURS
    public static function getidGenre(){
        return self::$idGenre;
    }
    public static function getgenre(){
        return self::$genre;
    }
    //METHODES
    public function ajouter($genre)
    {
        $grp=htmlspecialchars($genre);
        $req=self::$con->prepare('INSERT INTO param_genre (genre) VALUES (?)');
        if($req->execute(array($grp))){
            //je doit revenir ici pour recuperer le dernier ajoute genre mapping
            self::$genre=$genre;
            return true;
        }else{
            return false;
        }

    }
    
    public function modifier($idGenre,$genre)
    {
        $IdGr = htmlspecialchars($idGenre);
        $gre = htmlspecialchars($genre);
        if(self::$con->exec('UPDATE param_genre SET genre="'.$gre.'"WHERE idGenre="'.$IdGr.'"'))
            {
                self::$genre=htmlspecialchars($genre);
                echo true;  
            }else{
                echo false;
            }
    }
   
    public function supprimer($idGenre){
        $IdGr = htmlspecialchars($idGenre);
        if(self::$con->exec('DELETE FROM `param_genre` WHERE idGenre="'.$IdGr.'"')){
            self::$idGenre = '';
            return true;
        }else{
            return false;
        }
    }

    public function selectionner(){
        return  self::$con->query('SELECT * FROM param_genre ORDER BY idGenre ASC');
    }
    
    public static function rechercher($idGenre){
        $IdGr = htmlspecialchars($idGenre);
        $var = self::$con->query("SELECT * FROM `param_genre` WHERE idGenre=".$IdGr);
        return $var; 
    }
    public function filtrer($genre){
        $gpe=htmlspecialchars($genre);
        $var = self::$con->query("SELECT * FROM param_genre WHERE genre like '".$gpe."%' ORDER BY idGenre ASC");
        foreach($var as $sel){
            self::$genre = $sel['genre'];
            self::$idGenre = $sel['idGenre'];
        }
        return $var;
    }
    //DESTRUCTEUR
    public function __destuct(){
    }
}


