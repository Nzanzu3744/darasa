<div role="form" enctype="multipart/form-data" class="form-inline well" style="width:700px; font-size:12px; margin-left:20%;margin-top:1%; background:white" id="">
    <center style="margin-left:10px" class="col-sm-12" > LISTE D'ENSEIGNANTS PRESTANT A  <?="_".$_GET['maClasse']?></center> 

<div style="margin:30px; padding-top:10px; border-top: 1px solid black">
 <table class="table table-bordered table-striped table-condensed" > 
 
                <thead>
                    <tr>
                        <th>N</th>
                         <th><center>MATRICUL</center></th>
                        <th><center>PHOTO</center></th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?=$i++?></td>
                        <td><label style="color:green"><?=$selensignt['idUtilisateur']?></label></td>
                        <td><img style="width:30px; height:30px" src="<?='images/'.$selensignt['photoUtilisateur']?>"/></td>
                        </tr>
                                                 
                </tbody>
            </table>
    </div>
    </div>

Notre ecole se trouve dans la région de <?=' '.$_SESSION['monEcole']['nomVilleTerritoire']?>, province de <?=' '.$_SESSION['monEcole']['nomProvince']?> en  <?=' '.$_SESSION['monEcole']['nomPays'].' '.$_SESSION['monEcole']['codePays']?>. 
<?=' '.$_SESSION['monEcole']['deviseEcole']?>. Contactez-nous sur <?=' '.$_SESSION['monEcole']['telephoneEcole1']?> ou<?=' '.$_SESSION['monEcole']['telephoneEcole2']?> ou soit le mail ci-après <?=' '.$_SESSION['monEcole']['mailEcole']?>.