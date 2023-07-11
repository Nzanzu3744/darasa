<?php
include_once('param_connexion.php');
class org_periode {
    private static  $idPeriode;
    private static  $idClasse;
    private static $ididGroupePeriode;
    private static $idAnneeSco;
    private static $periode;
    private static $dateDebit;
    private static $dateFin;
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        return self::$con=con();
    }

    //METHODES
    public static function ajouter($idClasse, $idGroupePeriode, $idAnneeSco, $periode, $dateDebit, $dateFin)
    {
        $idCl47=htmlspecialchars($idClasse);
        $idgroupe_p=htmlspecialchars($idGroupePeriode);
        $idAn=htmlspecialchars($idAnneeSco);
        $perio2=htmlspecialchars($periode);
        $dtDb=htmlspecialchars($dateDebit);
        $dtFn=htmlspecialchars($dateFin);
        $req=self::$con->prepare('INSERT INTO org_periode (idClasse, idGroupePeriode, idAnneeSco, periode, dateDebit, dateFin) VALUES (?,?,?,?,?,?)');
        if($req->execute(array($idCl47,$idgroupe_p,$idAn, $perio2,$dtDb,$dtFn))){
            return true;
        }else{
            return false;
        }

    }
    
    public function modifierpartiele($idPeriode, $idAnneeSco, $periode, $dateDebit, $dateFin)
    {
         $idPer=htmlspecialchars($idPeriode);
        $idAn=htmlspecialchars($idAnneeSco);
        $perio2=htmlspecialchars($periode);
        $dtDb=htmlspecialchars($dateDebit);
        $dtFn=htmlspecialchars($dateFin);
        if(self::$con->exec('UPDATE org_periode SET idAnneeSco="'.$idAn.'", periode="'.$perio2.'", dateDebit="'.$dtDb.'", dateFin="'.$dtFn.'" WHERE idPeriode='.$idPer))
            {
                return true;  
            }else{
                return false;
            }
    }
    public function modifier($idPeriode,$idClasse, $idGroupePeriode, $idAnneeSco, $periode, $dateDebit, $dateFin)
    {
         $idPer=htmlspecialchars($idPeriode);
         $idCl47=htmlspecialchars($idClasse);
        $idgroupe_p=htmlspecialchars($idGroupePeriode);
        $idAn=htmlspecialchars($idAnneeSco);
        $perio2=htmlspecialchars($periode);
        $dtDb=htmlspecialchars($dateDebit);
        $dtFn=htmlspecialchars($dateFin);
        if(self::$con->exec('UPDATE org_periode SET  idClasse="'.$idCl47.'", idGroupePeriode="'.$idgroupe_p.'",idAnneeSco="'.$idAn.'",`periode`="'.$perio2.'",`dateDebit`="'.$dtDb.'", dateFin`="'.$dtFn.'" WHERE idPeriode='.$idPer))
            {
                return true;  
            }else{
                return false;
            }
    }
   
    public static function supprimer($idPerio2){
        $idPer = htmlspecialchars($idPerio2);
        if(self::$con->exec('DELETE FROM `org_periode` WHERE idPeriode="'.$idPer.'"')){
            return true;
        }else{
            return false;
        }
    }

    public static function selectionner(){
        return  self::$con->query('SELECT * FROM org_periode as pr2 INNER JOIN org_anneesco as an ON pr2.idAnneeSco=an.idAnneeSco INNER JOIN param_groupe_periode as gp ON pr2.idGroupePeriode=gp.idGroupePeriode INNER JOIN org_classe as cl ON pr2.idClasse=cl.idClasse LEFT JOIN org_promotion as pr ON cl.idPromotion=pr.idPromotion LEFT JOIN org_section as sct ON sct.idSection=cl.idSection LEFT JOIN org_unite as unt  ON unt.idUnite=cl.idUnite ORDER BY pr2.idPeriode ASC');
    }
     public static function filtreByAnneePromo($idAn,$idPro){
        return  self::$con->query('SELECT * FROM org_periode as pr2 INNER JOIN org_anneesco as an ON pr2.idAnneeSco=an.idAnneeSco INNER JOIN param_groupe_periode as gp ON pr2.idGroupePeriode=gp.idGroupePeriode INNER JOIN org_classe as cl ON pr2.idClasse=cl.idClasse LEFT JOIN org_promotion as pr ON cl.idPromotion=pr.idPromotion LEFT JOIN org_section as sct ON sct.idSection=cl.idSection LEFT JOIN org_unite as unt  ON unt.idUnite=cl.idUnite WHERE pr2.idAnneeSco="'.$idAn.'" AND pr.idPromotion="'.$idPro.'" ORDER BY pr2.idPeriode ASC');
    }
    public static function filtreByAnneeCls($idAn,$idCl){
        return  self::$con->query('SELECT * FROM org_periode as pr2 INNER JOIN org_anneesco as an ON pr2.idAnneeSco=an.idAnneeSco INNER JOIN param_groupe_periode as gp ON pr2.idGroupePeriode=gp.idGroupePeriode INNER JOIN org_classe as cl ON pr2.idClasse=cl.idClasse LEFT JOIN org_promotion as pr ON cl.idPromotion=pr.idPromotion LEFT JOIN org_section as sct ON sct.idSection=cl.idSection LEFT JOIN org_unite as unt  ON unt.idUnite=cl.idUnite WHERE pr2.idAnneeSco="'.$idAn.'" AND pr2.idClasse="'.$idCl.'" ORDER BY pr2.idPeriode ASC');
    }public static function filtreByPeriode($idPeriode){
        return  self::$con->query('SELECT * FROM org_periode as pr2 INNER JOIN org_anneesco as an ON pr2.idAnneeSco=an.idAnneeSco INNER JOIN param_groupe_periode as gp ON pr2.idGroupePeriode=gp.idGroupePeriode INNER JOIN org_classe as cl ON pr2.idClasse=cl.idClasse LEFT JOIN org_promotion as pr ON cl.idPromotion=pr.idPromotion LEFT JOIN org_section as sct ON sct.idSection=cl.idSection LEFT JOIN org_unite as unt  ON unt.idUnite=cl.idUnite WHERE pr2.idPeriode="'.$idPeriode.'"');
    }
    // public static function filtreByAnnee($idAn){
    //     return  self::$con->query('SELECT * FROM org_periode as pr2 INNER JOIN org_anneesco as an ON pr2.idAnneeSco=an.idAnneeSco INNER JOIN param_groupe_periode as gp ON pr2.idGroupePeriode=gp.idGroupePeriode INNER JOIN org_classe as cl ON pr2.idClasse=cl.idClasse LEFT JOIN org_promotion as pr ON cl.idPromotion=pr.idPromotion LEFT JOIN org_section as sct ON sct.idSection=cl.idSection LEFT JOIN org_unite as unt  ON unt.idUnite=cl.idUnite WHERE pr2.idAnneeSco="'.$idAn.'" AND pr.idPromotion="'.$idPro.'" ORDER BY pr2.idPeriode ASC');
    // }
  

    //DESTRUCTEUR
    public function __destuct(){
    }
}


