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

    //DESTRUCTEUR
    public function __destuct(){
    }
}


