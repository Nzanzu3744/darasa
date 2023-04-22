$(document).ready(function(){
  $('#resultat').hide();
  
  $('#formpresc').submit(function(e){
    e.preventDefault();
  })
});

function ajouterPrescription(idF,pres){
  $.ajax({
      type:'GET',
      url:'../../C/controlprescription.php?idFiche='+idF+'&Pres='+pres,
      success:function(serveur){
       
          $('#resultat').css('color','green').text("L'enregistrement réussi !");
          $('#resultat').show();
          $('#resultat').fadeOut(3000);
          console.log(serveur);
          document.location.href='AjouterPrescription.php?idF='+idF;
       
      } 
    });
}
///Recup pour la mod
function modifierpre(idpre,idf){
  //alert(idpre);
  $.ajax({
    type:'get',
    url:'../../C/controlprescription.php?idpremode='+idpre+'&Idfiche='+idf,
    success:function(serveur){
     // alert(serveur);
     $('#prescrptions').html('');
     $('#prescrptions').html(serveur);
    }

  });
}
//Modifaction prop
function modifiermaint(idpre,idfiche,prescrip){
  // alert(prescrip);
  $.ajax({
    type:'GET',
    //http://localhost/ops/C/controlprescription.php?Prescription=hhh&idpres=8
    url:'../../C/controlprescription.php?Prescription='+prescrip+'&idpres='+idpre,
    success:function(server){
      // alert(server);
        alert("Modification réussie !");
        document.location.href='ajouterPrescription.php?idF='+idfiche;
        // alert("Modification réussie !");
      
    }
  })

}
function recIDPrescript(id,idF){
	$.ajax({
		type:'GET',
		url:'../../C/controlprescription.php?idPres='+id,
    success:function(server){
      if(server == true){
        document.location.href='ajouterPrescription.php?idF='+idF;
        console.log(server);
        alert("Suppression réussie !");
      }else{
        console.log(server);
        alert("Suppression echoué, votre Prescription est joie a une facture!");

      }
    }
	})
}


