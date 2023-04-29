<?php
include_once('param_connexion.php');
class crs_cours {
    private static  $idCours;
    private static $idAffectation;
    private static $idAnneesco;
    private static $cours;
    private static $url;
    private static $commentaire;
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        self::$con=con();
    }
    //GETTEURS
    public static function getidCours(){
        return self::$idCours;
    }
    //METHODES
    public function ajouter($idAffectation, $idAnneesco,$cours,$url,$comt)
    {

        $idAft= htmlspecialchars($idAffectation);
        $idAn= htmlspecialchars($idAnneesco);
        $crs = htmlspecialchars($cours);
        $url1 = htmlspecialchars($url);
        $comnt = htmlspecialchars($comt);
        $req=self::$con->prepare('INSERT INTO crs_cours (`idAffectation`, `idAnneeSco`, `cours`, `url`, `commentaire`) VALUES (?,?,?,?,?)');
        if($req->execute(array($idAft,$idAn,$crs,$url1,$comnt))){
            //je doit revenir ici pour recuperer le dernier ajoute genre mapping
            self::$idAnneesco = $idAn;
            self::$idAffectation = $idAft;
            self::$cours = $crs;
            self::$url = $url1;
            self::$commentaire = $comnt;
            return 1;
        }else{
            return 0;
        }

    }
    
    public function modifier($idCours,$idAffectation, $idAnneesco,$cours)
    {
        $idCrs = htmlspecialchars($idCours);
        $crs= htmlspecialchars($cours);
        $idAff = htmlspecialchars($idAffectation);
        $idAn = htmlspecialchars($idAnneesco);
        if(self::$con->exec('UPDATE crs_cours SET idAffectation='.$idAff.',idAnneeSco='.$idAn.',cours="'.$crs.'" WHERE idCours='.$idCrs))
           {  
            self::$idCours = $idCrs;
            self::$idAffectation = $idAff;
            self::$cours = $crs;
            self::$idAnneesco = $idAn;
            return "true";
         }else{
             return "false";
    }
    }
   
    public function supprimer($idCours){
        $idIns = htmlspecialchars($idCours);
        if(self::$con->exec('DELETE FROM `crs_cours` WHERE idCours="'.$idIns.'"')){
            self::$idCours = '';
            return true;
        }else{
            return false;
        }
    }

    public function selectionner(){
        return  self::$con->query('SELECT * FROM crs_cours ORDER BY idCours ASC');
    }
    public function selectionnerCrsByUtClsAnn($idUt,$cls,$ann){
        return  self::$con->query('SELECT * FROM `crs_cours`  as crs INNER JOIN org_affectation as af ON crs.idAffectation=af.idAffectation INNER JOIN param_utilisateur as ut ON ut.idUtilisateur=af.idUtilisateur WHERE ut.idUtilisateur='.$idUt.' AND af.idAnneeSco='.$ann.' AND af.idClasse='.$cls );
    }
    
     public function selectionnerCrsEleveByCls($cls,$ann){
        return  self::$con->query('SELECT * FROM `crs_cours`  as crs  INNER JOIN org_affectation as af ON crs.idAffectation=af.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=af.idUtilisateur  INNER JOIN org_classe as cls ON cls.idClasse=af.idClasse WHERE af.idAnneeSco='.$ann.' AND af.idClasse='.$cls );
    }

    //
    public function rechercher($idCours){
        $idIns = htmlspecialchars($idCours);
        return $var = self::$con->query("SELECT * FROM crs_cours WHERE idCours =".$idIns);
        // foreach($var as $sel){
        //     self::$idCours = $sel['idCours'];
        //     self::$idCours = $sel['idCours'];
        //     self::$cours = $sel['cours'];
        //     self::$actif = $sel['actif'];
        // }
        // return $var; 
    }
    //DESTRUCTEUR
    public function __destuct(){
    }
}


