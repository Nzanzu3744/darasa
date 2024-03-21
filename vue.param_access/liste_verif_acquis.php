<?php
include_once('../model.param_access/prep_verif_acquis.class.php');
?>
<thead>
    <tr>
        <th>N</th>
        <th>
            <center>VERIFICATION DES CONNAISSENCES ACQUIS</center>
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
    $acquis01 = new prep_verif_acquis();
    ($exep) ? $idFex = $exep['idExploitation'] : $idFex = 0;
    $acquis01 = $acquis01->filtre($idFex);
    $i = 1;
    foreach ($acquis01 as $selAcquis) {
    ?>
        <tr>
            <td><?= $i++ ?></td>
            <td>
                <p><?= $selAcquis['question'] ?></p>
            </td>
            <td>
                <p><?= $selAcquis['reponse'] ?></p>
            </td>
            <td style="height:100%;  background:#f2f2f2">
                <z class="dropdown">
                    <button data-toggle="dropdown"><b class="caret ppull-right"></b></button>
                    <ul class="dropdown-menu pull-right">
                        <li>
                            <a href="#" onclick="Orientation('../control.param_access/ctr_verif_acquis.php?sup_acquis=true&idlc=<?= $_GET['idlc'] ?>&idVerif_acq=<?= $selAcquis['idVerifAcquis'] ?>','#verif_acquis')">Supprimer</a>
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