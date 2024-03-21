<?php
include_once('../model.param_access/prep_verif_connaissence.class.php');
?>
<thead>
    <tr>
        <th>N</th>
        <th>
            <center>REVISION ou VERIFICATION DES CONNAISSENCES</center>
        </th>
        <th>
            <center>REPONSES</center>
        </th>
    </tr>
</thead>
<tbody>
    <?php
    include_once('../model.param_access/prep_exploitation.class.php');
    $exep = new prep_exploitation();
    (isset($_GET['idlc'])) ? $idlc = $_GET['idlc'] : $idlc = 0;
    $exep = $exep->filtrer($idlc)->fetch();
    $rev = new prep_verif_connaissence();
    ($exep) ? $idFex = $exep['idExploitation'] : $idFex = 0;
    $rev = $rev->filtre($idFex);
    $i = 1;
    foreach ($rev as $selrev) {
    ?>
        <tr>
            <td><?= $i++ ?></td>
            <td>
                <p><?= $selrev['question'] ?></p>
            </td>
            <td>
                <p><?= $selrev['reponse'] ?></p>
            </td>
            <td style="height:100%;  background:#f2f2f2">
                <z class="dropdown">
                    <button data-toggle="dropdown"><b class="caret ppull-right"></b></button>
                    <ul class="dropdown-menu pull-right">
                        <li>
                            <a href="#" onclick="Orientation('../control.param_access/ctr_verif_connaissence.php?sup_rev=true&idlc=<?= $_GET['idlc'] ?>&idVerifC=<?= $selrev['idVerifConnaissence'] ?>','#verif_con')">Supprimer</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#" onclick="Encour()">Modifier</a>
                        </li>
                    </ul>
                </z>
            </td>
        </tr>
    <?php
    }
    ?>
</tbody>