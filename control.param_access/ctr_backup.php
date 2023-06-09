<?php
if(isset($_GET['pukcab'])){
    $databases = ["darasa"];
    $user="root";
    $pass="";
    $host="localhost";

    // date_default_timezone_set("American/Chicago");
    if(!file_exists("C:/Users/SAVE_MUM/Documents/database_darasa")){
        mkdir("C:/Users/SAVE_MUM/Documents/database_darasa");

    }
    foreach($databases as $database){
         if(!file_exists("C:/Users/SAVE_MUM/Documents/database_darasa/$database")){
        mkdir("C:/Users/SAVE_MUM/Documents/database_darasa/$database");
    }
    $filename = $database."_".date("f_d_y")."@".date("g_ia").uniqid("_", false);
    $folder = "C:/Users/SAVE_MUM/Documents/database_darasa/$database/".$filename.".sql";

    exec("C:/xampp1/mysql/bin/mysqldump --user={$user} --password={$pass} --host={$host} {$database} --result-file={$folder}", $output);
    // print_r($output);
    }
    include_once("../vue.param_access/header_fenetre.php");
    echo "FIN DE L\'OPERATION D\' EXPORTATION DE DONNEES";
    include_once("../vue.param_access/footer_fenetre.php");
}

?>