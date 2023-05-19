<?php
include_once('param_connexion.php');
class suivie_remise_devoirs {
    private static  $idRemise;
    private static  $idDevoir;
    private static  $idInscription;
    private static $dateCreation;
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        return self::$con=con();
    }
  
    public static function ajouter($idDevoir,$idIns)
    {
        $idDev=htmlspecialchars($idDevoir);
        $idIns=htmlspecialchars($idIns);
        include_once('../model.param_access/crs_lecon.class.php');
    
            $ramasse= new suivie_remise_devoirs();
            $ramasse=$ramasse->siRemi($idDev, $idIns);
            echo $ramasse;
            if($ramasse==false){
                  $req=self::$con->prepare('INSERT INTO suivie_remise_devoirs (idDevoir,idInscription) VALUES (?,?)');
                    if($req->execute(array($idDev,$idIns))){
                        self::$idDevoir=$idDev;
                        self::$idInscription=$idIns;               
                    }else{
                        return 'ECHEC AJOUT VUE ';
                    }  
            }
    }
    public static function siRemi($idDevoir, $idIns){
        $remi=self::$con->query('SELECT srd.idRemise  FROM `suivie_remise_devoirs` as srd WHERE srd.idDevoir="'.$idDevoir.'" AND srd.idInscription="'.$idIns.'" LIMIT 1');
        if($remi->fetch()!=null){
            return true; 
        }else {
            return false;
        }
           
    }
    public static function remis($idDevoir){
        return self::$con->query('SELECT * FROM suivie_remise_devoirs as rms INNER JOIN org_inscription as ins ON rms.idInscription = ins.idInscription INNER JOIN param_utilisateur as ut ON ins.idUtilisateur = ut.idUtilisateur  WHERE rms.idDevoir='.$idDevoir);
    }
    // GROUP BY ut.idUtilisateur
    public static function RemisEleveAll(){
        // return self::$con->query('SELECT * FROM suivie_remise_devoirs as rms INNER JOIN org_inscription as ins ON rms.idInscription = ins.idInscription INNER JOIN crs_devoirs as dv ON dv.idDevoir = rms.idDevoir INNER JOIN param_utilisateur as ut ON ins.idUtilisateur = ut.idUtilisateur  WHERE dv.idCours="'.$idCours.'" GROUP BY ut.idUtilisateur ');
        return self::$con->query('SELECT rms.IdRemise, rms.idDevoir, dv.idCours, ut.idUtilisateur, ut.nomUtilisateur, ut.postnomUtilisateur, ut.prenomUtilisateur FROM suivie_remise_devoirs as rms INNER JOIN org_inscription as ins ON rms.idInscription = ins.idInscription INNER JOIN crs_devoirs as dv ON dv.idDevoir = rms.idDevoir INNER JOIN param_utilisateur as ut ON ins.idUtilisateur = ut.idUtilisateur GROUP BY ut.idUtilisateur UNION ALL SELECT rms.IdRemise, rms.idDevoir, dv.idCours, ut.idUtilisateur, ut.nomUtilisateur, ut.postnomUtilisateur, ut.prenomUtilisateur FROM suivie_remise_devoirs as rms INNER JOIN `crs_reler_devoir` as rl ON rl.idDevoir=rms.idDevoir INNER JOIN crs_devoirs as dv ON rl.idDevoir=dv.idDevoir INNER JOIN org_inscription as ins ON rms.idInscription = ins.idInscription INNER JOIN param_utilisateur as ut ON ins.idUtilisateur = ut.idUtilisateur GROUP BY ut.idUtilisateur');
    
    }
    //  ORDER BY  rms.idRemise desc
    public static function remiseDevEleveCours($idutil,$idCours){
        // return self::$con->query('SELECT * FROM suivie_remise_devoirs as rms INNER JOIN org_inscription as ins ON rms.idInscription = ins.idInscription INNER JOIN crs_devoirs as dv ON dv.idDevoir = rms.idDevoir INNER JOIN param_utilisateur as ut ON ins.idUtilisateur = ut.idUtilisateur  WHERE ut.idUtilisateur="'.$idutil.'" AND dv.idCours="'.$idCours.'"');
        return self::$con->query('SELECT rms.IdRemise, dv.idDevoir, ut.idUtilisateur FROM suivie_remise_devoirs as rms INNER JOIN org_inscription as ins ON rms.idInscription = ins.idInscription INNER JOIN crs_devoirs as dv ON dv.idDevoir = rms.idDevoir INNER JOIN param_utilisateur as ut ON ins.idUtilisateur = ut.idUtilisateur  WHERE ut.idUtilisateur="'.$idutil.'" AND dv.idCours="'.$idCours.'"  UNION SELECT rms.IdRemise, dv.idDevoir ,ut.idUtilisateur FROM suivie_remise_devoirs as rms INNER JOIN `crs_reler_devoir` as rl ON rl.idDevoir=rms.idDevoir INNER JOIN crs_devoirs as dv ON rl.idDevoir=dv.idDevoir INNER JOIN org_inscription as ins ON rms.idInscription = ins.idInscription INNER JOIN param_utilisateur as ut ON ins.idUtilisateur = ut.idUtilisateur  WHERE ut.idUtilisateur="'.$idutil.'" AND dv.idCours='.$idCours);
    
    }

    //DESTRUCTEUR
    public function __destuct(){
    }
}


