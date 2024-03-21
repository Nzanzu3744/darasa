<?php

function genererqr($idqr, $message, $ds)
{
  include_once("qrlib.php");


  $dossier_qr = $ds;

  if (is_dir($dossier_qr) == false) {
    mkdir($dossier_qr);
  }

  $filename =  $dossier_qr . $idqr . '.png';

  QRcode::png($message, $filename, $idqr, 5, 2);

  return $dossier_qr . basename($filename);
}
