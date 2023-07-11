<?php
 include_once('../model.param_access/param_connexion.php');



class crs_cote_devoirs_trad {
    
    
    private static  $idCoteDevoirTrad;
    private static  $idInscription;
    private static $coteDevoirTrad;


    private static $con;
       //CONSTRUCTEUR
    public function __construct(){
        return self::$con=con();
    }

    public function ajouter($idDevaoirTrad,$idInscription,$coteDevoirTrad)
    {
    
        $idDvoiTrad= htmlspecialchars($idDevaoirTrad);
        $cotObt= htmlspecialchars($coteDevoirTrad);
        $idIns02= htmlspecialchars($idInscription);
        // INSERT INTO `crs_cote_devoirs_trad`(`idDevaoirTrad`,`coteDevoirTrad`, `idInscription`) VALUES (53,15,10)
        if(self::$con->exec('INSERT INTO `crs_cote_devoirs_trad`(`idDevaoirTrad`,`coteDevoirTrad`, `idInscription`) VALUES ("'.$idDvoiTrad.'","'.$cotObt.'","'.$idIns02.'")')){
          return true;
        }else{
            return false;
        }
    }
    public function modifier($idDevaoirTrad,$idInscription,$coteDevoirTrad)
    {
    
        $idDvoiTrad= htmlspecialchars($idDevaoirTrad);
        $cotObt= htmlspecialchars($coteDevoirTrad);
        $idIns02= htmlspecialchars($idInscription);
        // INSERT INTO `crs_cote_devoirs_trad`(`idDevaoirTrad`,`coteDevoirTrad`, `idInscription`) VALUES (53,15,10)
        if(self::$con->exec('UPDATE  crs_cote_devoirs_trad SET coteDevoirTrad="'.$cotObt.'" WHERE  idDevaoirTrad="'.$idDvoiTrad.'" AND idInscription="'.$idIns02.'"')){
          return true;
        }else{
            return false;
        }
    }


    public static function selectionner(){
        return  self::$con->query('SELECT * FROM crs_cote_devoirs_trad ORDER BY idDevaoirTrad ASC');
    }
    public static function filterDevTraEleve($devTra,$idInscEle){
        return  self::$con->query('SELECT * FROM crs_cote_devoirs_trad WHERE idDevaoirTrad="'.$devTra.'" AND idInscription="'.$idInscEle.'"');
    }
  
    public function __destuct(){
    }
}


