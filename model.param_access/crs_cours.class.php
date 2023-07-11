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
        $idCrs = htmlspecialchars($idCours);
        if(self::$con->exec('DELETE FROM `crs_cours` WHERE idCours="'.$idCrs.'"')){
            self::$idCours = '';
            return true;
        }else{
            return false;
        }
    }

    public function selectionner(){
        return  self::$con->query('SELECT * FROM crs_cours ORDER BY idCours ASC');
    }
    public function selectionnerCrsByUtClsAnn($idUt,$cls,$idAn){
        return  self::$con->query('
        SELECT * FROM (SELECT crs.idCours, af.idUtilisateur,af.idClasse, crs.idAnneeSco, crs.cours, crs.url, crs.commentaire, ut.nomUtilisateur, ut.postnomUtilisateur , ut.prenomUtilisateur, ut.telUtilisateur, ut.mailUtilisateur, ut.idGenre, ut.photoUtilisateur FROM `crs_cours` as crs INNER JOIN org_affectation as af ON crs.idAffectation=af.idAffectation INNER JOIN param_utilisateur as ut ON ut.idUtilisateur=af.idUtilisateur

        UNION 

        SELECT crs.idCours, coa.idUtilisateur, coa.idClasse, crs.idAnneeSco, crs.cours, crs.url, crs.commentaire, ut.nomUtilisateur, ut.postnomUtilisateur, ut.prenomUtilisateur, ut.telUtilisateur, ut.mailUtilisateur, ut.idGenre, ut.photoUtilisateur FROM crs_co_animation as coa INNER JOIN crs_cours as crs ON coa.idCours=crs.idCours INNER JOIN org_affectation as af ON crs.idAffectation=crs.idAffectation INNER JOIN param_utilisateur as ut ON af.idUtilisateur=ut.idUtilisateur) AS sel WHERE sel.idUtilisateur='.$idUt.' AND sel.idAnneeSco='.$idAn.' AND sel.idClasse='.$cls.' GROUP BY sel.idCours
        ');
    }
    public function selectionnerCrsByClsAnn($cls,$ann){
        return  self::$con->query('SELECT * FROM `crs_cours`  as crs LEFT JOIN org_affectation as af ON crs.idAffectation=af.idAffectation LEFT JOIN param_utilisateur as ut ON ut.idUtilisateur=af.idUtilisateur WHERE crs.idAnneeSco='.$ann.' AND af.idClasse='.$cls );
    }
    
    
     public function selectionnerCrsEleveByCls($cls,$ann){
        return  self::$con->query('SELECT * FROM `crs_cours`  as crs  INNER JOIN org_affectation as af ON crs.idAffectation=af.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=af.idUtilisateur  INNER JOIN org_classe as cls ON cls.idClasse=af.idClasse WHERE af.idAnneeSco='.$ann.' AND af.idClasse='.$cls );
    }

    //
    public static function rechercher($idCours){
        $idCrs1 = htmlspecialchars($idCours);
        return self::$con->query('SELECT * FROM crs_cours as crs INNER JOIN org_affectation as ins ON ins.idAffectation=crs.idAffectation WHERE idCours ="'.$idCrs1.'"');
    }

    //DESTRUCTEUR
    public function __destuct(){
    }
}


