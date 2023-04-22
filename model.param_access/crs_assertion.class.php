<?php
include_once('param_connexion.php');
class crs_assertion {
    private static  $idAssertion;
    private static $idQuestion;
    private static $assertion;
    private static $correctAssertion;
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        self::$con=con();
    }
    //GETTEURS
    public static function getidAssertion(){
        return self::$idAssertion;
    }
    //METHODES
    public static function ajouter($idQuestion,$assertion,$correctAssertion)
    {

        $idQst= htmlspecialchars($idQuestion);
        $asstion = htmlspecialchars($assertion);
        $crctAss= htmlspecialchars($correctAssertion);
        $req=self::$con->prepare('INSERT INTO `crs_assertion`(`idQuestion`, `assertion`, `correctAssertion`) VALUES (?,?,?)');
        if($req->execute(array($idQst,$asstion,$crctAss))){
            //je doit revenir ici pour recuperer le dernier ajoute genre mapping
            self::$idQuestion = htmlspecialchars($idQst);
            self::$assertion = htmlspecialchars($asstion);
            self::$correctAssertion =htmlspecialchars($correctAssertion);

            $assert = new crs_assertion();
            $ass=$assert->verification($idQst);
            foreach($ass as $seld){
                echo $seld['idAssertion'];
            }

           
        }else{
            return null;
        }

    }
    
    public function modifier($idAssertion,$idQuestion,$assertion,$correct)
    {
        $idAsstion = htmlspecialchars($idAssertion);
        $idQst = htmlspecialchars($idQuestion);
        $asstion= htmlspecialchars($assertion);
        $corect = htmlspecialchars($correct);
        if(self::$con->exec('UPDATE crs_assertion SET idQuestion="'.$idQst.'",assertion = "'.$asstion.'" ,correctAssertion = "'.$corect.'" WHERE idAssertion='.$idAsstion))
           {  
            // self::$idQuestion = htmlspecialchars($idQst);
            // self::$assertion = htmlspecialchars($asstion);
            return true;
         }else{
             return false;
    }
    }
   
    public function supprimer($idAssertion){
        $idAsstion = htmlspecialchars($idAssertion);
        if(self::$con->exec('DELETE FROM `crs_assertion` WHERE idAssertion="'.$idAsstion.'"')){
            self::$idAssertion = '';
            return true;
        }else{
            return false;
        }
    }

    public function selectionner(){
        return  self::$con->query('SELECT * FROM crs_assertion ORDER BY idAssertion ASC');
    }
    public function selectionnerByQst($idQst){
        return  self::$con->query('SELECT * FROM crs_assertion as ass INNER JOIN crs_question as qst ON ass.idQuestion=qst.idQuestion WHERE ass.idQuestion="'.$idQst.'"');
    }

     public function verification($idQst){
        return  self::$con->query('SELECT ass.idAssertion FROM crs_assertion as ass INNER JOIN crs_question as qst ON ass.idQuestion=qst.idQuestion WHERE ass.idQuestion="'.$idQst.'" ORDER BY ass.idAssertion DESC LIMIT 1');
    }
    //
    public function rechercher($idAssertion){
        $idAsstion = htmlspecialchars($idAssertion);
        return $var = self::$con->query("SELECT * FROM crs_assertion WHERE idAssertion =".$idAsstion." ORDER BY idAssertion ASC");
        // foreach($var as $sel){
        //     self::$idAssertion = $sel['idAssertion'];
        //     self::$idQuestion = $sel['idQuestion'];
        //     self::$assertion = $sel['assertion'];
        //     self::$actif = $sel['actif'];
        // }
        // return $var; 
    }
    //DESTRUCTEUR
    public function __destuct(){
    }
}


