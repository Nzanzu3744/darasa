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

    public function ajouter($idDevoir,$idInscription,$coteDevoirTrad)
    {

        $idDevoir= htmlspecialchars($idDevoir);
        $cotObt= htmlspecialchars($coteDevoirTrad);
        $idIns02= htmlspecialchars($idInscription);
        
        if(self::$con->exec('INSERT INTO `crs_cote_devoirs_trad`(`idDevoir`,`coteDevoirTrad`, `idInscription`) VALUES ("'.$idDevoir.'","'.$cotObt.'","'.$idIns02.'")')){
          return true;
        }else{
            return false;
        }
    }
    public function modifier($idDevoir,$idInscription,$coteDevoirTrad)
    {
    
        $idDevoir= htmlspecialchars($idDevoir);
        $cotObt= htmlspecialchars($coteDevoirTrad);
        $idIns02= htmlspecialchars($idInscription);

        if(self::$con->exec('UPDATE  crs_cote_devoirs_trad SET coteDevoirTrad="'.$cotObt.'" WHERE  idDevoir="'.$idDevoir.'" AND idInscription="'.$idIns02.'"')){
          return true;
        }else{
            return false;
        }
    }


    public static function selectionner(){
        return  self::$con->query('SELECT * FROM crs_cote_devoirs_trad ORDER BY idDevoir ASC');
    }
    public static function filterDevTraEleve($devTra,$idInscEle){
        return  self::$con->query('SELECT * FROM crs_cote_devoirs_trad as cd INNER JOIN crs_devoirs as dv ON cd.idDevoir = dv.idDevoir WHERE cd.idDevoir="'.$devTra.'" AND cd.idInscription="'.$idInscEle.'"');
    }
  
    public function __destuct(){
    }
}


