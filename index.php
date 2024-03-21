<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/dist/css/monstyle.css" rel=stylesheet>
    <script src="jquery/dist/jquery.min.js"></script>
    <script src="plugins/stream/stream.js"></script>
    <script src="plugins/stream/stream-min.js"></script>
    <script src="jquery/dist/summernote/summernote-bs4.min.js"></script>
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="moncss.css">
    <title>E-ecole</title>
</head>

<!-- <body class="formbody" id="app" > -->

<body id="app">
    <?php
    include_once('vue.param_access/login.php');
    ?> <center style="color:red; background-color:rgbs(0,0,0,0,0); height:30px">
        <h4>
            <?php
            if (isset($_GET['incorrect'])) {
                echo 'MOT DEPASSE OU NOM UTILISATEUR INCORRECT';
            } else if (isset($_GET['cnx'])) {
                echo 'MERCI DE VERIFIER VOTRE CONNEXION AVANT DE REESSAYER';
            } else if (isset($_GET['mbr'])) {
                echo 'DESOLE, VOUS ETES MEMBRE DANS AUCUNE ECOLE';
            } elseif (isset($_GET['db'])) {
                echo 'ECHEC DE CONNEXION A LA BASE DE DONNEES';
            }
            ?>
        </h4>
    </center>
</body>

</html>

<script src="bootstrap/dist/js/bootstrap.min.js"></script>
<script src="vue.param_access/script.js"></script>