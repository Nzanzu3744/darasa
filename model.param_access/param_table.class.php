<?php
include_once('param_connexion.php');
class param_table {
    private static  $nomTable;
    private static  $commentaire;
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        return self::$con=con();
    }
    //GETTEURS
    public static function getNomTable(){
        return self::$nomTable;
    }
    public static function getCommentaire(){
        return self::$commentaire;
    }
    //METHODES
    public function ajouter($nomTable,$commentaire)
    {
        $nomT=htmlspecialchars($nomTable);
        $comt=htmlspecialchars($commentaire);
        $req=self::$con->prepare('INSERT INTO param_table (nomTable,commentaire) VALUES (?,?)');
        if($req->execute(array($nomT,self::$comt))){
            //je doit revenir ici pour recuperer le dernier ajoute genre mapping
            self::$nomTable=htmlspecialchars($nomTable);
            self::$commentaire=htmlspecialchars($commentaire);
            return true;
        }else{
            return false;
        }

    }
    
    public function modifier($nomTable,$commentaire)
    {
        $nomT = htmlspecialchars($nomTable);
        $cmt = htmlspecialchars($commentaire);
        if(self::$con->exec('UPDATE param_table SET commentaire="'.$cmt.'"WHERE nomTable="'.$nomT.'"'))
            {
                self::$commentaire=htmlspecialchars($commentaire);
                echo true;  
            }else{
                echo false;
            }
    }
   
    public function supprimer($nomTable){
        $nomT = htmlspecialchars($nomTable);
        if(self::$con->exec('DELETE FROM `param_table` WHERE nomTable="'.$nomT.'"')){
            self::$nomTable = '';
            return true;
        }else{
            return false;
        }
    }

    public function selectionner(){
        return  self::$con->query('SELECT * FROM param_table ORDER BY nomTable ASC');
    }
    
    public function rechercher($nomTable){
        $nomT = htmlspecialchars($nomTable);
        return self::$con->query("SELECT * FROM param_table WHERE nomTable ='".$nomT."' ORDER BY nomTable ASC");
    }
    public function filtrer($nomTable){
        $nomT=htmlspecialchars($nomTable);
        return self::$con->query("SELECT * FROM param_table WHERE nomTable like '".$nomT."%' ORDER BY nomTable ASC");
    }
    //DESTRUCTEUR
    public function __destuct(){
    }
}


