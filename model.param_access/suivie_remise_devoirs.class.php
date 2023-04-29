<?php
include_once('param_connexion.php');
class suivie_remise_devoirs {
    private static  $idRemise;
    private static  $idDevoir;
    private static  $idUtilisateur;
    private static $dateCreation;
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        return self::$con=con();
    }
  
    public static function ajouter($idDevoir,$iduti)
    {
        $idDev=htmlspecialchars($idDevoir);
        $idutil=htmlspecialchars($iduti);
        include_once('../model.param_access/crs_lecon.class.php');
    
            $ramasse= new suivie_remise_devoirs();
            $ramasse=$ramasse->siRemi($idDev, $idutil);
            echo $ramasse;
            if($ramasse==false){
                  $req=self::$con->prepare('INSERT INTO suivie_remise_devoirs (idDevoir,idUtilisateur) VALUES (?,?)');
                    if($req->execute(array($idDev,$idutil))){
                        self::$idDevoir=$idDev;
                        self::$idUtilisateur=$idutil;               
                    }else{
                        return 'ECHEC AJOUT VUE ';
                    }  
            }
    }
    public static function siRemi($idDevoir, $idUti){
        $remi=self::$con->query('SELECT srd.idRemise  FROM `suivie_remise_devoirs` as srd WHERE srd.idDevoir="'.$idDevoir.'" AND srd.idUtilisateur="'.$idUti.'" LIMIT 1');
        if($remi->fetch()!=null){
            return true; 
        }else {
            return false;
        }
           
    }
    public static function remis($idDevoir){
        return self::$con->query('SELECT * FROM suivie_remise_devoirs as rms INNER JOIN param_utilisateur as ut  WHERE rms.idDevoir='.$idDevoir);
    }

    //DESTRUCTEUR
    public function __destuct(){
    }
}


