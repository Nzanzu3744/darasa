<?php
include_once('param_connexion.php');
class crs_correction {
    private static  $idCorrection;
    private static $idReponset;
    private static $idAffectation;
    private static $cote;
    private static $commentaire;
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        self::$con=con();
    }
   
    public static function ajouter($idReponset,$idAff,$cote,$cmt,$pond)
    {

        $idRep= htmlspecialchars($idReponset);
        $idAffectation = htmlspecialchars($idAff);
        $cote= $cote;
        $commentaire= $cmt;

        $correct = new crs_correction();
        $correct=$correct->selectionnerByRep($idRep)->fetch();
        
        if($correct==''){
        $req=self::$con->prepare('INSERT INTO  `crs_correction` ( idReponset, idAffectation,cote,commentaire ) VALUES (?,?,?,?)');
        if($pond>=$cote){
            if($req->execute(array($idRep,$idAffectation,$cote,$commentaire))){
            self::$idReponset =$idRep;
            self::$idAffectation =$idAffectation;
            self::$cote =$cote;
            self::$commentaire =$commentaire;  
            echo "Enregistre";
        }else{
            echo "Echec d'enreg";
        }
        }else{
            echo "Eche d'enreg il ya depassement";
            }
        
        }else{
            
            if($pond>=$cote){
                if($req=self::$con->exec('UPDATE  `crs_correction` SET idReponset='.$idRep.', idAffectation='.$idAffectation.', cote='.$cote.', commentaire="'.$commentaire.'" WHERE idCorrection='.$correct['idCorrection'])){
                    self::$idCorrection =$correct;
                    self::$idReponset =$idRep;
                    self::$idAffectation =$idAffectation;
                    self::$cote =$cote;
                    self::$commentaire =$commentaire;  
                   echo "Modifie";
                }else{
                    echo "Echec de Modification";
                }
        }else{
            echo "Echec de modif il ya depassement";
        }
        }

    }
 
    public function selectionnerByRep($idRep){
        return  self::$con->query('SELECT * FROM crs_correction as cr WHERE idReponset="'.$idRep.'" ORDER BY cr.idCorrection DESC LIMIT 1');
    }
//     public function selectionnerByQstAvecEleve($idQst){
//         return  self::$con->query('SELECT * FROM crs_correction as ret INNER JOIN crs_question as qst ON ret.idReponset=qst.idReponset LEFT JOIN org_inscription as ins ON ret.idAffectation=ins.idAffectation LEFT JOIN param_utilisateur as ut ON ins.idUtilisateur = ut.idUtilisateur LEFT JOIN param_genre as gr ON gr.idGenre=ut.idGenre WHERE ret.idReponset="'.$idQst.'"');
//     }

//     public function selectionnerByQstUti($idQst,$iuti){
//         return  self::$con->query('SELECT rep.idAffectation, rep.reponse, rep.idCorrection, rep.idReponset,  rep.dateCreation FROM crs_correction as rep  LEFT JOIN org_inscription as ins ON rep.idAffectation=ins.idAffectation INNER JOIN crs_question as qst ON rep.idReponset=qst.idReponset WHERE rep.idReponset='.$idQst.' AND ins.idUtilisateur='.$iuti);
//     }
//     // public function selectionnerByQstUti($idQst,$iuti){
//     //     return  self::$con->query('SELECT rep.idUtilisateur, rep.reponse, rep.idCorrection, rep.idReponset,  rep.dateCreation FROM crs_correction as rep INNER JOIN crs_question as qst ON rep.idReponset=qst.idReponset WHERE rep.idReponset='.$idQst.' AND rep.idUtilisateur='.$iuti);
//     // }
//   public function verification($idQst,$idIns){
//         return  self::$con->query('SELECT rt.idCorrection, rt.dateCreation FROM crs_correction as rt INNER JOIN crs_question as qst ON rt.idReponset=qst.idReponset WHERE rt.idReponset='.$idQst.' AND rt.idAffectation='.$idIns.'  ORDER BY rt.idCorrection DESC LIMIT 1');
//     }
//     //
//     public function rechercher($idCorrection){
//         $ididUtlst = htmlspecialchars($idCorrection);
//         return $var = self::$con->query("SELECT * FROM crs_correction WHERE idCorrection =".$ididUtlst." ORDER BY idCorrection ASC");
//     }
    //DESTRUCTEUR
    public function __destuct(){
    }
}


