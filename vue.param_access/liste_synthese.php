<?php
include_once('../model.param_access/prep_synthese.class.php');
?>
<thead>
    <tr>
        <th>N</th>
        <th>
            <center>SYNTESE DE L'ENSEIGNE</center>
        </th>
        <th>
            <center>SYNTESE DES ELEVES</center>
        </th>
    </tr>
</thead>
<tbody>
    <?php
    include_once('../model.param_access/prep_exploitation.class.php');
    $exep = new prep_exploitation();
    (isset($_GET['idlc'])) ? $idlc = $_GET['idlc'] : $idlc = 0;
    $exep = $exep->filtrer($idlc)->fetch();
    $synthez = new prep_synthese();
    ($exep) ? $idFex = $exep['idExploitation'] : $idFex = 0;
    $synthez = $synthez->filtre($idFex);
    $i = 1;
    foreach ($synthez as $selSynth) {
    ?>
        <tr>
            <td><?= $i++ ?></td>
            <td>
                <p><?= $selSynth['educateur'] ?></p>
            </td>
            <td>
                <p><?= $selSynth['eleve'] ?></p>
            </td>
            <td style="height:100%;  background:#f2f2f2">
                <z class="dropdown">
                    <button data-toggle="dropdown"><b class="caret ppull-right"></b></button>
                    <ul class="dropdown-menu pull-right">
                        <li>
                            <a href="#" onclick="Orientation('../control.param_access/ctr_synthese.php?sup_synth=true&idlc=<?= $_GET['idlc'] ?>&idSynth=<?= $selSynth['idSynthese'] ?>','#synthese')">Supprimer</a>
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