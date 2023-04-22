<?php
include_once('param_connexion.php');
class visite_lecon {
    private static  $idVisiteLecon;
    private static  $idLecon;
    private static  $idUtilisateur;
    private static $dateCreation;
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        return self::$con=con();
    }
    //GETTEURS
    public static function getidVisiteLecon(){
        return self::$idVisiteLecon;
    }
    public static function getidLecon(){
        return self::$idLecon;
    }
    //METHODES
    public static function ajouter($idLecon,$iduti)
    {
        $idLecn=htmlspecialchars($idLecon);
        $idutil=htmlspecialchars($iduti);
        include_once('../model.param_access/crs_lecon.class.php');
        $editeur= new crs_lecon();
        $editeur=$editeur->getAuteur($idLecon)->fetch();

        if($_SESSION['idUtilisateur']!=$editeur['idUtilisateur']){
            $vue= new visite_lecon();
            $vue=$vue->estvue($idLecon, $idutil);
            if($vue==false){
                  $req=self::$con->prepare('INSERT INTO visite_lecon (idLecon,idUtilisateur) VALUES (?,?)');
                    if($req->execute(array($idLecn,$idutil))){
                        self::$idLecon=$idLecn;
                        self::$idUtilisateur=$idutil;               
                    }else{
                        return 'ECHEC AJOUT VUE ';
                    }  
            }
        }
    }
   
    public static function estvue($idLecon, $idUti){
        $vue = self::$con->query('SELECT idVisiteLecon FROM `visite_lecon` as vlc WHERE vlc.idLecon='.$idLecon.' AND vlc.idUtilisateur='.$idUti);
        if($vue->fetch()!=null){
            return true; 
        }else {
            return false;
        }
           
    }
    public static function vues($idLecon){
        return $vue = self::$con->query('SELECT * FROM `visite_lecon` as vlc INNER JOIN param_utilisateur as ut ON vlc.idUtilisateur = ut.idUtilisateur WHERE vlc.idLecon='.$idLecon);           
    }

    //DESTRUCTEUR
    public function __destuct(){
    }
}


