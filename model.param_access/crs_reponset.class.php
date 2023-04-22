<?php
include_once('param_connexion.php');
class crs_reponset {
    private static  $idReponse;
    private static $idQuestion;
    private static $idUtilisateur;
    private static $reponse;
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
    public static function ajouter($idQuestion,$idUtilisateur,$reponse)
    {

        $idQst= htmlspecialchars($idQuestion);
        $idUtlst = htmlspecialchars($idUtilisateur);
        $rept= $reponse;
        $req=self::$con->prepare('INSERT INTO  `crs_reponset` ( `idQuestion`, `idUtilisateur`, `reponse`, dateCreation ) VALUES (?,?,?,NOW())');
        if($req->execute(array($idQst,$idUtlst,$rept))){
            //je doit revenir ici pour recuperer le dernier ajoute genre mapping
            self::$idQuestion = htmlspecialchars($idQst);
            self::$idUtilisateur = htmlspecialchars($idUtlst);
            self::$reponse =$rept;

            $repse = new crs_reponset();
            $rps=$repse->verification($idQst,$idUtlst);
            foreach($rps as $seld){
                return $TbAE[] = array($seld['idReponse'],$seld['dateCreation']);
            }

           
        }else{
            return "Echec enreg";
        }

    }
 
    public function selectionnerByQst($idQst){
        return  self::$con->query('SELECT * FROM crs_reponset as ass INNER JOIN crs_question as qst ON ass.idQuestion=qst.idQuestion WHERE ass.idQuestion="'.$idQst.'"');
    }

    public function selectionnerByQstUti($idQst,$iuti){
        return  self::$con->query('SELECT rep.idUtilisateur, rep.reponse, rep.idReponse, rep.idQuestion,  rep.dateCreation FROM crs_reponset as rep INNER JOIN crs_question as qst ON rep.idQuestion=qst.idQuestion WHERE rep.idQuestion='.$idQst.' AND rep.idUtilisateur='.$iuti);
    }
    // public function selectionnerByQstUti($idQst,$iuti){
    //     return  self::$con->query('SELECT rep.idUtilisateur, rep.reponse, rep.idReponse, rep.idQuestion,  rep.dateCreation FROM crs_reponset as rep INNER JOIN crs_question as qst ON rep.idQuestion=qst.idQuestion WHERE rep.idQuestion='.$idQst.' AND rep.idUtilisateur='.$iuti);
    // }
  public function verification($idQst,$idUti){
        return  self::$con->query('SELECT ass.idReponse, ass.dateCreation FROM crs_reponset as ass INNER JOIN crs_question as qst ON ass.idQuestion=qst.idQuestion WHERE ass.idQuestion='.$idQst.' AND ass.idUtilisateur='.$idUti.'  ORDER BY ass.idReponse DESC LIMIT 1');
    }
    //
    public function rechercher($idReponse){
        $ididUtlst = htmlspecialchars($idReponse);
        return $var = self::$con->query("SELECT * FROM crs_reponset WHERE idReponse =".$ididUtlst." ORDER BY idReponse ASC");
        // foreach($var as $sel){
        //     self::$idReponse = $sel['idReponse'];
        //     self::$idQuestion = $sel['idQuestion'];
        //     self::$idUtilisateur = $sel['idUtilisateur'];
        //     self::$actif = $sel['actif'];
        // }
        // return $var; 
    }
    //DESTRUCTEUR
    public function __destuct(){
    }
}


