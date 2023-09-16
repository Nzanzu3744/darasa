<?php
include_once('param_connexion.php');
class crs_lecon {
    private static  $idLecon;
    private static  $idCours;
    private static $lecon;
    private static $titreLecon;
    private static  $idUtilisateur;
    private static $actif;
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        return self::$con=con();
    }
    //GETTEURS
    public static function getidLecon(){
        return self::$idLecon;
    }
    public static function getidCours(){
        return self::$idCours;
    }
    //METHODES
    public static function ajouter($idCours,$titreL,$lecon,$iduti)
    {
        $idCrs=htmlspecialchars($idCours);
        $lecon=$lecon;

        $idutil=htmlspecialchars($iduti);
        $titreLecon=htmlspecialchars($titreL);
        $actif=1;
        $req=self::$con->prepare('INSERT INTO crs_lecon (idCours, titreLecon, lecon, idUtilisateur, actif) VALUES (?,?,?,?,?)');
        if($req->execute(array($idCrs,$titreLecon,$lecon,$idutil,$actif))){
            self::$idCours=$idCours;
            self::$lecon=$lecon;
            self::$idUtilisateur=$idutil;
            self::$actif=$actif;
            $lc = new crs_lecon();
            $lc=$lc->selectionnerDerByCours($idCrs);
            foreach($lc as $selc){
                echo $selc['idLecon'];
            }
            
        }else{
            return false;
        }

    }
    
    public static function modifier($idLe,$idCours,$titreL, $lecon, $idUti)
    {
        $idLecon = htmlspecialchars($idLe);
        $idCrs = htmlspecialchars($idCours);
        $titreLec=htmlspecialchars($titreL);
        $lecon=$lecon;
        $idUtr= htmlspecialchars($idUti);
        $req=self::$con->prepare('UPDATE crs_lecon SET idCours=?,titreLecon=?,lecon=?, idUtilisateur=?  WHERE idLecon=?');
           if($req->execute(array($idCrs,$titreLec,$lecon,$idUtr,$idLecon))) {
                $idLecon = htmlspecialchars($idLecon);
                self::$idCours=htmlspecialchars($idCours);
                self::$lecon =$lecon;
                self::$titreLecon= htmlspecialchars($titreL);
                // echo true;  
            }else{
                echo false;
            }
    }
    public static function activer($idLe,$val)
    {
        $idLecon = htmlspecialchars($idLe);
        $value = htmlspecialchars($val);
        $req=self::$con->prepare('UPDATE crs_lecon SET actif=? WHERE idLecon=?');
           if($req->execute(array($value,$idLecon))) {
                self::$actif = $value;
                self::$idLecon=$idLecon;
                echo true;  
            }else{
                echo false;
            }
    }
    public function supprimer($idLecon){
        $idLecon = htmlspecialchars($idLecon);
        if(self::$con->exec('DELETE FROM `crs_lecon` WHERE idLecon="'.$idLecon.'"')){
            self::$idLecon = '';
            self::$lecon = "";
            return true;
        }else{
            return false;
        }
    }

    public static function selectionner(){
        return  self::$con->query('SELECT * FROM crs_lecon ORDER BY idLecon ASC');
    }
      public static function selectionnerByIdCours(){
        return  self::$con->query('SELECT * FROM `crs_lecon` as lc INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN org_Affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco LIMIT 1');
    }
     public static function selectionnerBytitreCrs($cours){
        return  self::$con->query('SELECT lc.actif, lc.idLecon, lc.titreLecon, cr.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco  FROM `crs_lecon` as lc INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN org_Affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco WHERE lc.actif=1 AND cr.cours LIKE "%'.$cours.'%" ORDER BY lc.idLecon DESC');
    }
    public static function selectionnerBytitrelC($cours,$titrelc){
        return  self::$con->query('SELECT lc.actif, lc.idLecon, lc.titreLecon, cr.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco FROM `crs_lecon` as lc INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN org_Affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco WHERE lc.actif=1 AND lc.titreLecon like "%'.$titrelc.'%" AND cr.cours LIKE "%'.$cours.'%" ORDER BY lc.idLecon DESC');
    }
    
    public function selectionnerDerByCours($idCrs){
        return  self::$con->query('SELECT * FROM crs_lecon WHERE idCours='.$idCrs.'  ORDER BY idLecon DESC LIMIT 1');
    }
    public function selectionnerDerByLec($idlc){
        return  self::$con->query('SELECT * FROM crs_lecon WHERE idLecon='.$idlc.' ORDER BY idLecon DESC LIMIT 1');
    }
    public static function selectionnerByCours($idCours){
        return  self::$con->query('SELECT * FROM (SELECT lc.actif, lc.idLecon, lc.titreLecon, cr.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco FROM `crs_lecon` as lc INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN org_Affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco WHERE cr.idCours='.$idCours.' UNION SELECT lc.actif, lc.idLecon, lc.titreLecon, cr.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco FROM `crs_reler_lecon` as rl INNER JOIN crs_lecon as lc ON rl.idLecon=lc.idLecon INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN org_Affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco WHERE rl.idCours='.$idCours.') AS lcvisit ORDER BY lcvisit.idLecon ASC');
    }
    public static function selectionnerByCoursActif($idCours){
        return  self::$con->query('SELECT lc.idLecon, lc.actif, lc.titreLecon, cr.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco FROM `crs_lecon` as lc INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN org_Affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco WHERE cr.idCours='.$idCours.' AND lc.actif=1 UNION SELECT lc.idLecon, lc.actif, lc.titreLecon,cr.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco FROM `crs_reler_lecon` as rl INNER JOIN crs_lecon as lc ON rl.idLecon=lc.idLecon INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN org_Affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco WHERE rl.idCours='.$idCours.' AND lc.actif=1');
    }
    
    public static function getAuteur($idLecon){
        $idLecon = htmlspecialchars($idLecon);
        $var = self::$con->query("SELECT idUtilisateur FROM crs_lecon WHERE idLecon =".$idLecon);
        return $var; 
    }  
    public static function rechercher($idLecon){
        $idLecon = htmlspecialchars($idLecon);
        $var = self::$con->query("SELECT * FROM crs_lecon WHERE idLecon =".$idLecon);
        return $var; 
    }
    public static function filtrer($idCours){
        $idCrs=htmlspecialchars($idCours);
        $var = self::$con->query("SELECT * FROM crs_lecon WHERE idCours like '".$idCrs."%' ORDER BY idLecon ASC");
        return $var;
    }
 
    //DESTRUCTEUR
    public function __destuct(){
    }
}


