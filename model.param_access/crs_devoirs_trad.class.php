<?php
include_once('../model.param_access/param_connexion.php');

class crs_devoirs_trad {
    private static  $idDevoir;
    private static $idCours;
    private static $idPeriode;
    private static $poderation;
    private static $indexation;
    private static $con;
       //CONSTRUCTEUR
    public function __construct(){
        return self::$con=con();
    }

    public function ajouter($idCours,$idPer,$idAff,$podration,$idxE)
    {
        $idCrs= htmlspecialchars($idCours);
        $idPer2= htmlspecialchars($idPer);
        $idAffe= htmlspecialchars($idAff);
        $pdration= htmlspecialchars($podration);
        $idx = htmlspecialchars($idxE);
        if(self::$con->exec('INSERT INTO crs_devoirs_trad (idCours, idPeriode, idAffectation, poderation, indexation) VALUES ("'.$idCrs.'","'.$idPer2.'","'.$idAffe.'","'.$pdration.'","'.$idx.'")')){
            //je doit revenir ici pour recuperer le dernier ajoute genre mapping
            self::$idCours = $idCrs;
            self::$idPeriode = $idPer2;
            self::$poderation = $pdration;
            self::$indexation = $idx;

            $devoirstrad = new crs_devoirs_trad();
            $devoirstrad=$devoirstrad->selectionnerByIdCoursCrslimt($idCrs);
            foreach($devoirstrad as $seld){
                return $seld['idDevaoirTrad'];
            }

        }else{
            return null;
        }
    }
      public function modifier($idDevoirTrad,$idCours,$idPer,$idAff,$podration,$idxE)
    {
        $idDvrTrad = htmlspecialchars($idDevoirTrad);
        $idCrs= htmlspecialchars($idCours);
        $idPer2= htmlspecialchars($idPer);
        $idAffe= htmlspecialchars($idAff);
        $pdration= htmlspecialchars($podration);
        $idx = htmlspecialchars($idxE);
        if(self::$con->exec('UPDATE `crs_devoirs_trad` SET `idCours`="'.$idCrs.'",`idPeriode`="'.$idPer2.'",`idAffectation`="'. $idAffe.'",`indexation`="'.$idx.'", `poderation`="'.$pdration.'" WHERE `idDevaoirTrad`='.$idDvrTrad))
           {  
            return "true";
         }else{
             return "false";
    }
    }

      public static function selectionnerByIdCoursCrslimt($idCours){
        return  self::$con->query('SELECT * FROM `crs_devoirs_trad`  WHERE idCours='.$idCours.' ORDER BY idDevaoirTrad DESC LIMIT 1');
    } public static function selectionnerByIdDevTrad($iddevTrad){
        return  self::$con->query('SELECT * FROM `crs_devoirs_trad`  WHERE idDevaoirTrad='.$iddevTrad);
    }
    public static function selectionnerByCours($idCours){
        return  self::$con->query('SELECT * FROM `crs_devoirs_trad` as dvtrad INNER JOIN crs_cours as cr ON dvtrad.idCours=cr.idCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco WHERE dvtrad.idCours='.$idCours.' ORDER BY dvtrad.idDevaoirTrad ASC');
    }
    public static function selectionnerByCoursPeriode($idP02,$idCours){
        return  self::$con->query('SELECT dv.idDevaoirTrad,dv.actif, dv.dateCreation, dv.idPeriode, dv.poderation, prepacour.cours,an.anneeSco,dv.indexation, dv.idCours, uti.nomUtilisateur, uti.postnomUtilisateur, uti.prenomUtilisateur FROM `crs_devoirs_trad` as dv INNER JOIN crs_cours as cr ON dv.idCours=cr.idCours INNER JOIN crs_prepacours as prepacour ON prepacour.idPrepaCours=cr.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco WHERE dv.idCours='.$idCours.' AND dv.idPeriode='.$idP02);
    }

    public static function selectionner(){
        return  self::$con->query('SELECT * FROM crs_devoirs_trad ORDER BY idDevaoirTrad ASC');
    }
  
    public function __destuct(){
    }
}


