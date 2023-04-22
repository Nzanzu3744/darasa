$(document).ready(function(){
  $('#resultat').hide();
  $('#RechClient').keyup(function(){
      rechercheclient($(this).val());
  });
  $('#formclient').click(function(e){
    e.preventDefault();
    
  });
  
  $('#SensClient').click(function(e){
    e.preventDefault();
  });
  
});
function rechercheclient(cle){
// Recherche client
  $.ajax({
            type : "GET", 
            url : "../../C/rechercheclient.php?RechClient="+cle,
            success:function(serveur)
            {
              console.log(serveur);
              $("#div_tab").html('');
              $("#div_tab").html(serveur);
            }
        });  
}
function ModifierClient(id){
  $.ajax({
      type:'POST',
      url:'../../C/controlclient.php',
      data: $('#formclient').serialize(),
      success:function(serveur){
        
        if (serveur==1){
          actualise();
          rechercheclient('');
          $('#resultat').css('color','green').text("L'Modification  réussi !");
          $('#resultat').show();
          $('#resultat').fadeOut(3000);
        }
        if(serveur==0){
          rechercheclient('');
          $('#resultat').css('color','red').text("L'Modification echouée !");
          $('#resultat').show();
        }
      } 
    });
}
function ajouterClient(){
  // alert('fonctionn enregistre mar');
  $.ajax({
      type:'POST',
      url:'../../C/controlclient.php',
      data: $('#formclient').serialize(),
      success:function(serveur){
        
        if(serveur==1){
          rechercheclient('');
          $('#resultat').css('color','green').text("L'enregistrement réussi !");
          $('#resultat').show();
          $('#resultat').fadeOut(3000);
        }else{
          
          $('#resultat').css('color','red').text("L'enregistrement echoué ! Precisez le jeton et l'adresse complet !");
          $('#resultat').show();
        }
       // alert(serveur);
      } 
    });
}
function actualise(){
  // alert('fonctionn enregistre mar');
  $.ajax({
      type:'GET',
      url:'../../C/controlclient.php?Actualise=1',
      success:function(serveur){
        $('#frmclient1').html('');
        $('#frmclient1').html(serveur);
       // alert(serveur);
      } 
    });
}
//REcuperation du fomulaire rempl
function modifierClient(id){
  // alert(id);
  $.ajax({
      type:'get',
      url:'../../C/controlclient.php?idclientMod='+id,
      success:function(serveur){
        // alert(serveur);
        if (serveur!=''){
          $('#frmclient1').html('');
          $('#frmclient1').html(serveur);
          $('#resultat').css('color','green').text("Selection reussi");
          $('#resultat').show();
          $('#resultat').fadeOut(6000);
        }
      } 
    });
}
//Enregistrement
function EnregmodifierClient(id){
  // alert(id);
  $.ajax({
      type:'POST',
      url:'../../C/controlclient.php?EnrgMod='+id,
      data: $('#formclient').serialize(),
      success:function(serveur){
        if(serveur==1){
          rechercheclient('');
          // $('#frmclient1').html('');
          // $('#frmclient1').html(serveur);
          $('#resultat').css('color','green').text("REUSSI !");

          $('#resultat').show();
          $('#resultat').fadeOut(3000);
        }else{
          $('#resultat').show();
          $('#resultat').css('color','red').text("L'Modification echouée ! Precisez le jeton et l'adresse complet !");
          
        }
        // alert(serveur);
      } 
    });
}

function recIDClient(id){
	$.ajax({
		type:'get',
		url:'../../C/controlclient.php?id='+id,
    
    success:function(server){
      if(server == true){
        rechercheclient('');
        console.log(server);
        alert("Suppression réussie !");
      }else{
        console.log(server);
        rechercheclient('');
        alert("Suppression echoué !");
      }
    }
	})
}
function verifierjeton(cle){

    $.ajax({
    type:'get',
    url:'../../C/controlclient.php?idjeton='+cle,
    success:function(server){
      // alert(server);

      if(server==1){     
        $('#Jeton').css('color','green');
        $('#Jeton').css('border-color','green');
      }else{
        $('#Jeton').css('color','red');       
       $('#Jeton').css('border-color','red');       
      }
    }
  })
}