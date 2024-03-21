<?php
if (!isset($_GET['bkp'])) {
    include_once("../control.param_access/mes_methodes.php");
    echec_controleur('BACKUP');
}
// echo $date = date("Y-m-d h:i:s");
//mysql:host=91.234.195.212;dbname=c1839973c_etablissements','c1839973c','hEr8ckUZVgcs8J9'
$mysqlUserName = "root";
$mysqlPassword = "";
$mysqlHostName      = "localhost";
$DbName             = "cp2118587p04_bddecole";
$backup_name        = "mybackup.sql";


Export_Database($mysqlHostName, $mysqlUserName, $mysqlPassword, $DbName,  $tables = false, $backup_name = false);

function Export_Database($host, $user, $pass, $name,  $tables = false, $backup_name = false)
{
    $mysqli = new mysqli($host, $user, $pass, $name);
    $mysqli->select_db($name);
    $mysqli->query("SET NAMES 'utf8'");

    $queryTables    = $mysqli->query('SHOW TABLES');
    while ($row = $queryTables->fetch_row()) {
        $target_tables[] = $row[0];
    }
    if ($tables !== false) {
        $target_tables = array_intersect($target_tables, $tables);
    }
    foreach ($target_tables as $table) {
        $result         =   $mysqli->query('SELECT * FROM ' . $table);
        $fields_amount  =   $result->field_count;
        $rows_num = $mysqli->affected_rows;
        $res            =   $mysqli->query('SHOW CREATE TABLE ' . $table);
        $TableMLine     =   $res->fetch_row();
        $content        = (!isset($content) ?  '' : $content) . "\n\n" . $TableMLine[1] . ";\n\n";

        for ($i = 0, $st_counter = 0; $i < $fields_amount; $i++, $st_counter = 0) {
            while ($row = $result->fetch_row()) { //when started (and every after 100 command cycle):
                if ($st_counter % 100 == 0 || $st_counter == 0) {
                    $content .= "\nINSERT INTO " . $table . " VALUES";
                }
                $content .= "\n(";
                for ($j = 0; $j < $fields_amount; $j++) {
                    $row[$j] = str_replace("\n", "\\n", addslashes($row[$j]));
                    if (isset($row[$j])) {
                        $content .= '"' . $row[$j] . '"';
                    } else {
                        $content .= '""';
                    }
                    if ($j < ($fields_amount - 1)) {
                        $content .= ',';
                    }
                }
                $content .= ")";
                //every after 100 command cycle [or at last line] ....p.s. but should be inserted 1 cycle eariler
                if ((($st_counter + 1) % 100 == 0 && $st_counter != 0) || $st_counter + 1 == $rows_num) {
                    $content .= ";";
                } else {
                    $content .= ",";
                }
                $st_counter = $st_counter + 1;
            }
        }
        $content .= "\n\n\n";
    }
    //$backup_name = $backup_name ? $backup_name : $name."___(".date('H-i-s')."_".date('d-m-Y').")__rand".rand(1,11111111).".sql";
    $date = date("Y-m-d H:i:s");
    $name = 'Backup_du_';
    // $date = date("Y-m-d");
    $backup_name = $backup_name ? $backup_name : $name . ".$date.sql";
    header('Content-Type: application/octet-stream');
    header("Content-Transfer-Encoding: Binary");
    header("Content-disposition: attachment; filename=\"" . $backup_name . "\"");
    echo $content;
    exit;
}

?>







<?php
/*if(isset($_GET['pukcab'])){
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
}*/

?>