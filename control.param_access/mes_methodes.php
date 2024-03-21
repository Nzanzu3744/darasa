<?php

function deserialiser($post)
{

    $split_parameters = explode('&', $post);
    $split_complete = array();

    for ($i = 0; $i < count($split_parameters); $i++) {
        $final_split = explode('=', $split_parameters[$i]);
        if (isset($final_split[1])) {
            $split_complete[$final_split[0]] = $final_split[1];
        }
    }
    return $split_complete;
}

// function deserialiserUrlComplet($post)
// {

//     $remove_http = str_replace('http://', '', $url);
//     $split_url = explode('?', $remove_http);
//     $get_page_name = explode('/', $split_url[0]);
//     $page_name = $get_page_name[1];
//     $split_parameters = explode('&', $split_url[1]);
//     for ($i = 0; $i < count($split_parameters); $i++) {
//         $final_split = explode('=', $split_parameters[$i]);
//         $split_complete[$final_split[0]] = $final_split[1];
//     }
//     return $split_complete;
// }
function initialog($nom, $postnom, $prenom)
{

    $part1 = '';
    $part2 = '';
    $part3 = '';

    $tabNom = array();
    $tabPost = array();
    $tabPre = array();
    if ($nom != '') {
        $tabNom = str_split(strtoupper($nom));
        // $taill = count($tabNom);
        $part1 = $tabNom[0];
    }
    if ($postnom != '') {
        $tabPost = str_split(strtoupper($postnom));
        // $taill = count($tabNom);
        $part2 = $tabPost[0];
    }
    if ($prenom != '') {
        $tabPre = str_split(strtoupper($prenom));
        // $taill = count($tabPre);
        $part3 = $tabPre[0];
    }

    return $part1 . $part2 . $part3 . rand(1, 100);
}
function hashagepass($motpass)
{
    $passHash = md5(md5(md5($motpass) . '*607&') . '*607&');
    return $passHash;
}
function str_remplacer($text)
{
    $text = str_replace(' ', '_', $text);
    $text = str_replace('@', '_', $text);
    $text = str_replace('#', '_', $text);
    $text = str_replace('$', '_', $text);
    $text = str_replace('%', '_', $text);
    $text = str_replace('^', '_', $text);
    $text = str_replace('&', '_', $text);
    $text = str_replace('*', '_', $text);
    $text = str_replace('+', '_', $text);
    $text = str_replace('\'', '_', $text);
    $text = str_replace('"', '_', $text);
    $text = str_replace('/', '_', $text);
    $text = str_replace('?', '_', $text);
    $text = str_replace('', '_', $text);
    $text = str_replace(';', '_', $text);
    $text = str_replace(':', '_', $text);


    return $text;
}

function fn_pourcentage($valeurBase, $valeurTotal)
{
    if ($valeurBase > 0) {
        return arrondis($valeurBase * 100 / $valeurTotal);
        // return $valeurBase;
    } else {
        return 0;
    }
}
function arrondis($val)
{
    return round($val, 3);
}
function fn_proclamer($pourcentage)
{
    if ($pourcentage >= 0.0 and $pourcentage < 50.0) {
        return "<span style='color:red;'> L'élève a échoué avec " . $pourcentage . "% </span>";
    } else if ($pourcentage >= 50.0 and $pourcentage <= 100.0) {
        return "<span style='color:green'> L élève a reussi avec " . $pourcentage . '% </span>';
    } else {
        return "<span style='color:red'> Pas de résultat calculé,  veuillez contacté l'école</div>";
    }
}

function echec_controleur($fichier)
{
    die("
        <center class='col-sm-12 well' style='font-size: 9px; color:red; margin-top:10%'>
            <b>
                ECHEC [" . $fichier . "]
            </b>
        </center>");
}

function entete_doc($etab, $logo, $bp, $t1, $t2, $editer)
{

?>
    <center style="margin:40px;height:600px;  border: 1px solid black;" class="">
        <label style="font-size:18px; margin-top:35px "> REPUBLIQUE DEMOCRATIQUE DU CONGO<br> MINISTERE DE L’ENSEIGNEMENT PRIMAIRE, SECONDAIRE ET PROFESSIONNEL</label><br>
        <label>
            <bolder style="font-size:18px; margin-top:35px "><?= $etab ?></bolder>
        </label><br>

        <img style=" width:250px; height:100px" id="image" src="<?= $logo ?>" /></br>
        <label>
            <bolder style="font-size:18px; margin-top:35px "><?= $bp ?></bolder>
        </label><br>
        <label style="font-size:40px; margin-top:10px; height:150px;">
            <bolder><?= $t1 ?></bolder><br>
            <bolder class="pull-right" style="font-size:14px; "><?= $t2 ?></bolder>
        </label><br>
        <?php
        if ($editer != '') {
        ?>
            <label style="font-size:18px; margin-top:120px "> TENU PAR <bolder> <?= $editer[0] . ' ' . $editer[1] . ' ' . $editer[2] . ' ' ?></bolder></label>
        <?php

        } else {
        ?>
            <label style="font-size:28px; margin-top:120px "> - </bolder></label>
        <?php
        }
        ?>

        <span class="col-sm-12">
            <i class="pull-left" style="color:gray">Imprimé par <?= strtoupper(' agent ID [' . $_SESSION['idUtilisateur'] . '] ' . $_SESSION['nom'] . ' ' . $_SESSION['postnom'] . ' ' . $_SESSION['prenom']) ?> </i> <i class="pull-right" style="color:gray">Genere par e-ecole à date du <?= date("Y-m-d h:i:s") ?></i>
        </span>
    </center>


<?php
}



function  mini_entete_doc($idU, $nomU, $postnomU, $prenomU, $phU, $tel, $mail, $genre, $idEco, $nomEco, $sigleEco, $bpEco, $nomVT, $lg)
{
?>
    <div class="col-sm-12" style="height:200px;margin-top:40PX">
        <div class="col-sm-5" style="border: 1px solid #f2f2f2;">
            <div class="col-sm-4" style="margin:0px;padding:0px;">
                <img src="<?= '../images/' . $phU ?>" style="width:110px; height:140px;margin:3px">
            </div>
            <div class="col-sm-8" style="height:140px">
                <div class="text-left" style="margin-left:17px;margin-top:5px">
                    <?= (trim($idU) != '') ? $idU : 'AUCUN ID' ?></br>
                    <?= (trim($nomU) != '') ? $nomU : 'AUCUN NOM' ?></br>
                    <?= (trim($postnomU != '')) ? $postnomU : 'AUCUN POSTNOM' ?>/
                    <?= (trim($prenomU) != '') ? $prenomU : 'AUCUN PRENOM' ?></br>
                    <?= (trim($tel) != '') ? $tel : 'AUCUN NUM' ?></br>
                    <?= (trim($mail != '')) ? $mail : 'AUCUN MAIL' ?></br>
                    <?= (trim($genre) != '') ? $genre : 'AUCUNNE GENRE' ?></br>
                </div>
            </div>
        </div>
        <div class="col-sm-2" style="height:60px;margin:0px;padding:0px">

        </div>
        <div class="col-sm-5" style="margin:0px;padding:0px; border: 1px solid #f2f2f2;">

            <div class="col-sm-8" style="height:140px">
                <div class="text-right" style="margin-right:10px;margin-top:0px">
                    <?= (trim($idEco) != '') ? $idEco  : 'AUCUN ID /' ?></br>
                    <?= (trim($nomEco) != '') ? $nomEco . '[' . $sigleEco . ']' : 'AUCUN RS' ?></br>
                    <?= (trim($bpEco) != '') ? $bpEco . '/' . $nomVT  : 'AUCUN BP' ?></br>

                </div>
            </div>
            <div class="col-sm-4" style="margin:0px;padding:0px;">
                <img src="<?= $lg ?>" style="width:110px; height:140px;margin:3px" />
            </div>

        </div>
    </div>
<?php
}

function mini_footer_doc()
{
?>
    <div style="margin:0px; padding:0px;background-color:rgba(53, 141, 224, 0.851);" class="contenaire">
        <div class="col-sm-3" style="height:100%;margin:0px;padding:0px; border-top: 3px solid blue"></div>
        <div class="col-sm-6" style="height:100%;margin:0px;padding:0px;border-top: 3px solid red"></div>
        <div class="col-sm-3" style="height:100%;margin:0px;padding:0px; border-top: 3px solid yellow"></div>
    </div>
<?php
}
function calcul_age($dateNais)
{
    $diff = date_diff(date_create($dateNais), date_create(date("Y-m-d")));
    return $diff->format('%y');
}
function dateJour()
{
    return date("Y-m-d");
}
function formDate($date)
{
    return $date;
}
?>