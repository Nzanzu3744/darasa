$(document).ready(function(){
  $('#resultat').hide();
  $('#creejt').click(function(){
  });
  $('#RechAgent').keyup(function(){
      rechercheagent($(this).val());
  });
  $('#SupAgent').click(function(e){
    e.preventDefault();
  });
  $('#formagent').submit(function(e){
    
    e.preventDefault();
    
  });
});

function ajouterAgent(){
 $.ajax({
      type:'POST',
      url:'../../C/controlagent.php?controlAj=1',
      data: $('#formagent').serialize(),
      success:function(serveur){
        // alert(serveur);
        if (serveur==true) {
          $('#resultat').css('color','green').text("La Enregistrement a réussie !");
          $('#resultat').show();
          $('#resultat').fadeOut(3000);
            rechercheagent('');
        }else{
          $('#resultat').css('color','red').text("La Enregistrement a  echouée !");
          $('#resultat').show();
          // console.log(serveur);

        }
      } 
    });
}
//ENREGISTREMENT MODIFICATION 
function EnregmodifierAgent(id){
  $.ajax({
      type:'POST',
      url:'../../C/controlagent.php?idagentModification='+id,
      data: $('#formagent').serialize(),
      success:function(serveur){
        // alert(serveur);
        if (serveur==1) {
          alert(serveur);
          $('#resultat').css('color','green').text("La Modification a réussie !");
          $('#resultat').show();
          $('#resultat').fadeOut(3000);
            rechercheagent('');
        }else{
          $('#resultat').css('color','red').text("La Modification a  echouée !");
          $('#resultat').show();
          // console.log(serveur);

        }
      } 
    });
}

//Recuperation des nos formulaire
function modifiAgent(id){
  // alert(id);
  $.ajax({
      type:'get',
      url:'../../C/controlagent.php?idagentMod='+id,
      success:function(serveur){
        // alert(serveur);
        if (serveur!=''){
          $('#frmagent1').html('');
          $('#frmagent1').html(serveur);
          $('#resultat').css('color','green').text("Selection reussi");
          $('#resultat').show();
          $('#resultat').fadeOut(6000);
        }
      } 
    });
}
//ANNALEMENT DE LA MODIFICATION
function annulerMod(){
  $.ajax({
      type:'get',
      url:'../../C/controlagent.php?AnnalerMod=1',
      success:function(serveur){
          $('#frmagent1').html('');
          $('#frmagent1').html(serveur);
          $('#resultat').css('color','red').text("Annule Modification");
          $('#resultat').show();
          $('#resultat').fadeOut(6000);
        }
      
    });
}
//Rech Agent
function rechercheagent(cle){
// Recherche agent
	$.ajax({
            type : "GET", 
            url : "../../C/rechercheagent.php?RechAgent="+cle,
            success:function(serveur)
            {
              $("#div_tab").html('');
              $("#div_tab").html(serveur);

            }
        });  
}


function recIDagent(id){
  $.ajax({
    type:'get',
    url:'../../C/controlagent.php?id='+id,
    success:function(server){
      if(server == true){
        rechercheagent('');
         // console.log(server);
         alert("Suppression réussie !");
        }else{
         // console.log(server);
         alert("Suppression echoué ! Cette agent est lien a plusieurs autres Informations.");
      }
       
    }
  })
}
