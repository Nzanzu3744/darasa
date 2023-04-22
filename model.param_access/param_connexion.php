<?php
function con(){
try
{
    $ordin="localhost";
    $user="root";
    $base="darasa";
    $pass="";
    $con = new PDO("mysql:host=$ordin;dbname=$base",$user,$pass);
    return $con;
}catch(Exception $e)
{
die('Connexion à la base d\'access a echoué');
}
}