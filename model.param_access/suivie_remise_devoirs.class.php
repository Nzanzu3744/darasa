<?php
include_once('param_connexion.php');
class suivie_remise_devoirs {
    private static  $idRemise;
    private static  $idDevoir;
    private static  $idCous;
    private static  $idInscription;
    private static $dateCreation;
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        return self::$con=con();
    }
  
    public static function ajouter($idDevoir,$idCrs,$idIns)
    {
        $idDev=htmlspecialchars($idDevoir);
        $idCrs=htmlspecialchars($idCrs);
        $idIns=htmlspecialchars($idIns);
        include_once('../model.param_access/crs_lecon.class.php');
    
            $ramasse= new suivie_remise_devoirs();
            $ramasse=$ramasse->siRemi($idDev,$idIns);
            echo $ramasse;
            if($ramasse==false){
                  $req=self::$con->prepare('INSERT INTO suivie_remise_devoirs (idDevoir,idCours,idInscription) VALUES (?,?,?)');
                    if($req->execute(array($idDev,$idCrs,$idIns))){
                        self::$idDevoir=$idDev;
                        self::$idCous=$idCrs;
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
    public static function remis($idDevoir,$idCours,$idClasse){
        return self::$con->query('SELECT * FROM suivie_remise_devoirs as rms INNER JOIN org_inscription as ins ON rms.idInscription = ins.idInscription INNER JOIN param_utilisateur as ut ON ins.idUtilisateur = ut.idUtilisateur  WHERE rms.idDevoir="'.$idDevoir.'" AND rms.idCours="'.$idCours.'" AND ins.idClasse="'.$idClasse.'" GROUP BY ins.idUtilisateur ASC' );
    }
    public static function RemisToutEleve($idClasse,$idCours){
        return self::$con->query('SELECT ins.idInscription,ut.idUtilisateur, ut.nomUtilisateur, ut.photoUtilisateur,ut.postnomUtilisateur, ut.prenomUtilisateur FROM `suivie_remise_devoirs` as rms  INNER JOIN org_inscription as ins ON rms.idInscription = ins.idInscription INNER JOIN param_utilisateur as ut ON ins.idUtilisateur = ut.idUtilisateur WHERE ins.idClasse='.$idClasse.' AND rms.idCours='.$idCours.' GROUP BY ut.idUtilisateur ORDER BY ut.nomUtilisateur ASC');
    
    }
    //  ORDER BY  rms.idRemise desc
    public static function remiseEleve($idUt,$class,$idAn,$idCours){
        return self::$con->query('SELECT ut.idUtilisateur, ut.nomUtilisateur,ut.postnomUtilisateur, ut.prenomUtilisateur, rms.idDevoir FROM `suivie_remise_devoirs` as rms INNER JOIN org_inscription as ins ON rms.idInscription = ins.idInscription INNER JOIN param_utilisateur as ut ON ins.idUtilisateur = ut.idUtilisateur WHERE ut.idUtilisateur='.$idUt.' AND ins.idAnneeSco='.$idAn.' AND ins.idClasse='.$class.' AND rms.idCours='.$idCours.' ORDER BY rms.idDevoir ASC');
    
    }

    //DESTRUCTEUR
    public function __destuct(){
    }
}


