<?php
 include_once('../model.param_access/param_connexion.php');
class crs_devoirs {
    private static  $idDevoir;
    private static $idCours;
    private static $dateCreation;
    private static $dateRemise;
    private static $description;
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        self::$con=con();
    }
    //GETTEURS
    public static function getidDevoir(){
        return self::$idDevoir;
    }
    //METHODES
    public function ajouter($idCours,$dateRemise,$idx)
    {
        $idCrs= htmlspecialchars($idCours);
        $dtRms = htmlspecialchars($dateRemise);
        $idx = htmlspecialchars($idx);
        if(self::$con->exec('INSERT INTO crs_devoirs (idCours, dateCreation, dateRemise, indexation) VALUES ('.$idCrs.',now(),"'.$dtRms.'","'.$idx.'")')){
            //je doit revenir ici pour recuperer le dernier ajoute genre mapping
            self::$idCours = $idCrs;
            self::$dateRemise = $dtRms;
            self::$description = $Dscri;

              $dvoir = new crs_devoirs();
            $dvoir=$dvoir->selectionnerByIdCours($idCrs);
            foreach($dvoir as $seld){
                echo $seld['idDevoir'];
            }

        }else{
            return null;
        }
    }
   public static function selectionnerByCours($idCours){
        return  self::$con->query('SELECT * FROM `crs_devoirs` as dv INNER JOIN crs_cours as cr ON dv.idCours=cr.idCours INNER JOIN org_Affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco WHERE cr.idCours='.$idCours);
    }
      public static function selectionnerByIdCours($idCours){
        return  self::$con->query('SELECT * FROM `crs_devoirs`as dv INNER JOIN crs_cours AS cr ON dv.idCours=cr.idCours WHERE dv.idCours='.$idCours.' ORDER BY dv.idDevoir DESC LIMIT 1');
    }

    
    // ID AFFECTATION DOIT ETRE AJOUTE !!!!!!!ICI BAS
    public function modifier($idDevoir,$idCours, $dateCreation,$dateRemise,$descri)
    {
        $idDvr = htmlspecialchars($idDevoir);
        $dtRms= htmlspecialchars($dateRemise);
        $idCrs = htmlspecialchars($idCours);
        $dtCrea = htmlspecialchars($dateCreation);
        $desc = htmlspecialchars($descri);
        if(self::$con->exec('UPDATE crs_devoirs SET idCours='.$idCrs.',dateCreation="'.$dtCrea.'",dateRemise="'.$dtRms.'", description="'.$desc.'" WHERE idDevoir='.$idCrs))
           {  
            self::$idDevoir = $idDvr;
            self::$idCours = $idCrs;
            self::$dateRemise = $crs;
            self::$dateCreation = $dtCrea;
            self::$description = $desc;
            return "true";
         }else{
             return "false";
    }
    }
   
    public function supprimer($idDevoir){
        $idDvs = htmlspecialchars($idDevoir);
        if(self::$con->exec('DELETE FROM `crs_devoirs` WHERE idDevoir="'.$idDvs.'"')){
            self::$idDevoir = '';
            return true;
        }else{
            return false;
        }
    }

    public static function selectionner(){
        return  self::$con->query('SELECT * FROM crs_devoirs ORDER BY idDevoir ASC');
    }
    public static function selectionnerBytitreDev($cours,$idx){
        return  self::$con->query('SELECT * FROM `crs_devoirs` as dv INNER JOIN crs_cours as cr ON dv.idCours=cr.idCours INNER JOIN org_Affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco WHERE dv.indexation like "%'.$idx.'%" AND cr.cours LIKE "%'.$cours.'%" ORDER BY dv.idDevoir DESC');
    }
    public static function selectionnerBytitreCrs($cours){
        return  self::$con->query('SELECT * FROM `crs_devoirs` as dv INNER JOIN crs_cours as cr ON dv.idCours=cr.idCours INNER JOIN org_Affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco WHERE cr.cours LIKE "%'.$cours.'%" ORDER BY dv.idDevoir DESC');
    }


    public static function remisC($idDevoir, $idUtil){
        return  self::$con->query('SELECT dv.idDevoir,repc.idUtilisateur FROM crs_devoirs as dv LEFT JOIN crs_question as qst ON dv.idDevoir=qst.idDevoir LEFT JOIN crs_assertion as ass ON qst.idQuestion = ass.idQuestion LEFT JOIN crs_reponsec as repc ON ass.idAssertion=repc.idAssertion WHERE dv.idDevoir=317 and repc.idReponse=9 LIMIT 1');
    }
     public static function remisT($idDevoir, $idUtil){
        return  self::$con->query(' SELECT dv.idDevoir,rept.idUtilisateur FROM crs_devoirs as dv LEFT JOIN crs_question as qst ON dv.idDevoir=qst.idDevoir LEFT JOIN crs_reponset as rept ON qst.idQuestion=rept.idQuestion WHERE dv.idDevoir=317 AND rept.idReponse=9 LIMIT 1');
    }
    //
    public static function rechercherr($idDevoir){
        $idDvs = htmlspecialchars($idDevoir);
        return $var = self::$con->query("SELECT * FROM crs_devoirs WHERE idDevoir ='".$idDvs."'");
        // foreach($var as $sel){
        //     self::$idDevoir = $sel['idDevoir'];
        //     self::$idDevoir = $sel['idDevoir'];
        //     self::$dateRemise = $sel['dateRemise'];
        //     self::$actif = $sel['actif'];
        // }
        // return $var; 
    }
    //DESTRUCTEUR
    public function __destuct(){
    }
}


