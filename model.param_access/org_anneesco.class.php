<?php
include_once('param_connexion.php');
class org_anneesco {
    private static  $idAnneeSco;
    private static  $anneeSco;
    private static $commentaire;
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        return self::$con=con();
    }
    //GETTEURS
    public static function getidAnneeSco(){
        return self::$idAnneeSco;
    }
    public static function getanneeSco(){
        return self::$anneeSco;
    }
    //METHODES
    public static function ajouter($anneeSco,$commentaire)
    {
        $ansco=htmlspecialchars($anneeSco);
        $cmt=htmlspecialchars($commentaire);
        $req=self::$con->prepare('INSERT INTO org_anneesco (anneeSco, commentaire) VALUES (?,?)');
        if($req->execute(array($ansco,$cmt))){
            //je doit revenir ici pour recuperer le dernier ajoute genre mapping
            self::$anneeSco=$ansco;
            self::$commentaire=$cmt;
            return true;
        }else{
            return false;
        }

    }
    
    public function modifier($idAnneeSco,$anneeSco, $commentaire)
    {
        $idAnnee = htmlspecialchars($idAnneeSco);
        $ansco = htmlspecialchars($anneeSco);
        $cmt= htmlspecialchars($commentaire);
        if(self::$con->exec('UPDATE org_anneesco SET anneeSco="'.$ansco.'", commentaire="'.$cmt.'" WHERE idAnneeSco="'.$idAnnee.'"'))
            {
                $idAnnee = htmlspecialchars($idAnneeSco);
                self::$anneeSco=htmlspecialchars($anneeSco);
                self::$commentaire =htmlspecialchars($commentaire);
                echo true;  
            }else{
                echo false;
            }
    }
   
    public static function supprimer($idAnneeSco){
        $idAnnee = htmlspecialchars($idAnneeSco);
        if(self::$con->exec('DELETE FROM `org_anneesco` WHERE idAnneeSco="'.$idAnnee.'"')){
            self::$idAnneeSco = '';
            self::$commentaire = "";
            return true;
        }else{
            return false;
        }
    }

    public static function selectionner(){
        return  self::$con->query('SELECT * FROM org_anneesco ORDER BY idAnneeSco ASC');
    }
    public static function selectionnerDesc(){
        return  self::$con->query('SELECT * FROM org_anneesco ORDER BY idAnneeSco DESC');
    }
    public static function selectionnerDerAn(){
        return  self::$con->query('SELECT * FROM org_anneesco ORDER BY idAnneeSco DESC LIMIT 1 ');
    }
    // public static function selectionnerDerAnAff($idUti){
    //     return  self::$con->query('SELECT * FROM org_anneesco as an LEFT JOIN org_affectation as aff ON an.idAnneeSco=aff.idAnneeSco LEFT JOIN param_utilisateur as ut ON ut.idUtilisateur=aff.idUtilisateur WHERE ut.idUtilisateur='.$idUti.'  ORDER BY an.idAnneeSco DESC LIMIT 1 ');
    // }
     public static function selectionnerDerAnAffCoA($idUti){
        return  self::$con->query('SELECT * FROM (SELECT an.idAnneeSco, an.anneeSco, aff.idUtilisateur FROM org_anneesco as an LEFT JOIN org_affectation as aff ON an.idAnneeSco=aff.idAnneeSco LEFT JOIN param_utilisateur as ut ON ut.idUtilisateur=aff.idUtilisateur UNION SELECT crs.idAnneeSco, an.anneeSco, coa.idUtilisateur  FROM crs_co_animation as coa LEFT JOIN crs_cours as crs ON coa.idCours=crs.idCours  LEFT JOIN org_anneesco as an ON crs.idAnneeSco=an.idAnneeSco) as dafc WHERE  dafc.idUtilisateur='.$idUti.' ORDER BY dafc.idAnneeSco DESC LIMIT 1');
    }
     public static function selectionnerAnAffCoA($idUti){
        return  self::$con->query('SELECT * FROM (SELECT an.idAnneeSco, an.anneeSco, aff.idUtilisateur FROM org_anneesco as an LEFT JOIN org_affectation as aff ON an.idAnneeSco=aff.idAnneeSco LEFT JOIN param_utilisateur as ut ON ut.idUtilisateur=aff.idUtilisateur UNION SELECT crs.idAnneeSco, an.anneeSco, coa.idUtilisateur  FROM crs_co_animation as coa LEFT JOIN crs_cours as crs ON coa.idCours=crs.idCours  LEFT JOIN org_anneesco as an ON crs.idAnneeSco=an.idAnneeSco) as dafc WHERE  dafc.idUtilisateur='.$idUti.' ORDER BY dafc.idAnneeSco DESC');
    }
    
    public static function rechercher($idAnneeSco){
        $idAnnee = htmlspecialchars($idAnneeSco);
        $var = self::$con->query("SELECT * FROM org_anneesco WHERE idAnneeSco ='".$idAnnee."' ORDER BY idAnneeSco ASC LIMIT 1");
        // foreach($var as $sel){
        //     self::$anneeSco = $sel['anneeSco'];
        //     self::$idAnneeSco = $sel['idAnneeSco'];
        //     self::$commentaire = $sel['commentaire'];
        // }
        
        return $var; 
    }
     public static function selectionnerByUtAff($idUt){
        return  self::$con->query('SELECT ansc.idAnneeSco, ansc.anneeSco  FROM `org_anneesco` as ansc INNER JOIN org_affectation as af ON af.idAnneeSco=ansc.idAnneeSco WHERE af.idUtilisateur='.$idUt.' GROUP BY anneeSco ORDER BY ansc.idAnneeSco DESC');
    }
    public function filtrer($anneeSco){
        $ansco=htmlspecialchars($anneeSco);
        $var = self::$con->query("SELECT * FROM org_anneesco WHERE anneeSco like '".$ansco."%' ORDER BY idAnneeSco ASC");
        // foreach($var as $sel){
        //     self::$anneeSco = $sel['anneeSco'];
        //     self::$idAnneeSco = $sel['idAnneeSco'];
        // }
        return $var;
    }
    //DESTRUCTEUR
    public function __destuct(){
    }
}


