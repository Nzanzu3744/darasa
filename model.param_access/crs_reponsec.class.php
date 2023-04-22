<?php
include_once('param_connexion.php');
class crs_reponsec {
    private static  $idReponse;
    private static $idAssertion;
    private static $idUtilisateur;
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        self::$con=con();
    }
    //GETTEURS
    public static function getidReponse(){
        return self::$idReponse;
    }
    //METHODES
    public static function ajouter($idAssertion,$idUtilisateur)
    {

        $idAst= htmlspecialchars($idAssertion);
        $idUtlst = htmlspecialchars($idUtilisateur);
        $req=self::$con->prepare('INSERT INTO  `crs_reponsec` ( idAssertion, idUtilisateur, dateCreation) VALUES (?,?,NOW())');
        if($req->execute(array($idAst,$idUtlst))){
            //je doit revenir ici pour recuperer le dernier ajoute genre mapping
            self::$idAssertion = htmlspecialchars($idAst);
            self::$idUtilisateur = htmlspecialchars($idUtlst);
            $repse = new crs_reponsec();
            $rps=$repse->verification($idAssertion,$idUtlst);
            foreach($rps as $seld){
                 return $TbAE[] = array($seld['idReponse'],$seld['dateCreation']);
            }

         
        }else{
            return "Echec enreg";
        }

    }
    
    public function modifier($idReponse,$idAssertion,$idUtilisateur)
    {
        $idrpsc = htmlspecialchars($idReponse);
        $idastion= htmlspecialchars($idAssertion);
        $idUtlst= htmlspecialchars($idUtilisateur);
        if(self::$con->exec('UPDATE crs_reponsec SET idAssertion="'.$idastion.'",idUtilisateur = "'.$idUtlst.'"WHERE idReponse="'.$idrpsc.'"'))
           {  
            self::$idAssertion =$idastion;
            self::$idUtilisateur =$idUtlst;
            return true;
         }else{
             return false;
    }
    }

    public function supprimer($idReponse){
        $idrpsc = htmlspecialchars($idReponse);
        if(self::$con->exec('DELETE FROM `crs_reponsec` WHERE idReponse="'.$idrpsc.'"')){
            self::$idReponse = '';
            return true;
        }else{
            return false;
        }
    }

    public function selectionner(){
        return  self::$con->query('SELECT * FROM crs_reponsec ORDER BY idReponse ASC');
    }
    public function selectionnerByQst($idQst){
        return  self::$con->query('SELECT * FROM crs_reponsec as ass INNER JOIN crs_question as qst ON ass.idAssertion=qst.idAssertion WHERE ass.idAssertion="'.$idQst.'"');
    }
    public static function selectionnerByQstUti($idQst,$iuti){
        return  self::$con->query('SELECT rep.idUtilisateur, rep.idAssertion, astion.idQuestion, astion.correctAssertion, rep.dateCreation  FROM crs_reponsec as rep INNER JOIN crs_assertion as astion ON astion.idAssertion=rep.idAssertion LEFT JOIN crs_question as qst ON astion.idQuestion=qst.idQuestion WHERE qst.idQuestion='.$idQst.' AND rep.idUtilisateur='.$iuti);
    }
    public function verification($idAst,$idUti){
        return  self::$con->query('SELECT reps.idReponse, reps.dateCreation FROM crs_reponsec as reps INNER JOIN crs_assertion as ass ON reps.idAssertion=ass.idAssertion WHERE reps.idAssertion='.$idAst.' AND reps.idUtilisateur='.$idUti.'  ORDER BY reps.idReponse DESC LIMIT 1');
    }
    public function rechercher($idReponse){
        $idrpsc = htmlspecialchars($idReponse);
        return $var = self::$con->query("SELECT * FROM crs_reponsec WHERE idReponse =".$idrpsc." ORDER BY idReponse ASC");
        // foreach($var as $sel){
        //     self::$idReponse = $sel['idReponse'];
        //     self::$idAssertion = $sel['idAssertion'];
        //     self::$idUtilisateur = $sel['idUtilisateur'];
        //     self::$actif = $sel['actif'];
        // }
        // return $var; 
    }
    //DESTRUCTEUR
    public function __destuct(){
    }
}


