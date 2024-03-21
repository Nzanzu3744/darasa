<?php
(empty($_SESSION)) ? session_start() : '';
function con()
{
    try {
        $ordin = 'localhost';
        $user = 'root';
        $base = 'cp2118587p04_bddecole';
        $pass = '';
        $con = new PDO("mysql:host=$ordin;dbname=$base", $user, $pass);
        return $con;
    } catch (Exception $e) {
        header("location:../index.php?db=false");
    }
}
