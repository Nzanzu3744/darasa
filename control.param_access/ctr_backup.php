<?php
if(isset($_GET['pukcab'])){
    $databases = ["darasa"];
    $user="root";
    $pass="";
    $host="localhost";

    // date_default_timezone_set("American/Chicago");
    if(!file_exists("C:/mes-sites/csndg_educ/database")){
        mkdir("C:/mes-sites/csndg_educ/database");

    }
    foreach($databases as $database){
         if(!file_exists("C:/mes-sites/csndg_educ/database/")){
        mkdir("C:/mes-sites/csndg_educ/database/");
    }
    $filename = $database."_".date("m_d_y")."@".date("g_ia").uniqid("_", false);
    $folder = "C:/mes-sites/csndg_educ/database/".$filename.".sql";

    exec("C:/xampp1/mysql/bin/mysqldump --user={$user} --password={$pass} --host={$host} {$database} --result-file={$folder}", $output);
    print_r($output);
    }
}

?>