<?php
(empty($_SESSION))?session_start():'';
?>
<section>
    <img src="../images/info.webp" style="width:98%; height:70%">
    <div>
        <center style="font-size: 14px;">
        Notre histoire<br>

Notre ecole se trouve dans la région de <?=' '.$_SESSION['monEcole']['nomVilleTerritoire']?>, province de <?=' '.$_SESSION['monEcole']['nomProvince']?> en  <?=' '.$_SESSION['monEcole']['nomPays'].' '.$_SESSION['monEcole']['codePays']?>. 
<?=' '.$_SESSION['monEcole']['deviseEcole']?>. Contactez-nous sur <?=' '.$_SESSION['monEcole']['telephoneEcole1']?> ou<?=' '.$_SESSION['monEcole']['telephoneEcole2']?> ou soit le mail ci-après <?=' '.$_SESSION['monEcole']['mailEcole']?>.
        </center>
    </div>
</section>