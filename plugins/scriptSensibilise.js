$(document).ready(function(){
  $('#resultat').hide();


  $('#RechReg').keyup(function(){
      rechecheRegJ($(this).val());
  });
  
  $('#btn_env').click(function(e){
    e.preventDefault();
  });
});

function ajouterJetons(id,nombre){
  $.ajax({
      type:'POST',
      url:'../../C/controljeton.php?idAg='+id+'&Nombrejet='+nombre,
      success:function(s){
        
          $('#resultat').css('color','green').text("Creation Jetons Reusssi !");
          $('#resultat').show();
          $('#jeton').html('');
          $('#jeton').html(s);
          $('#resultat').fadeOut(3000);
          console.log(s);
         recherchejeton('');
      } 
    });
}
//recherche dans la barre de recherche
function recherchejeton(cle){
	$.ajax({
            type : "GET", 
            url : "../../C/recherchejeton.php?RechJeton="+cle,
            success:function(serveur)
            {
              $("#div_tab_jet").html('');
              $("#div_tab_jet").html(serveur);
            }
        });  
}
//selection du client sensibilise
function Sensibilise(cle){
  $.ajax({
    type:'get',
    url:'../../C/controlSensibilise.php?id_Client='+cle,
    success:function(server){
    
        $('#widget').html('');
        $('#widget').html(server);
         // cosnsole.log(server);     
    }
  });
}
//Recherhe et affichage l'agent propri du jeton
function rech_jeton(Num_Jeton){

  $.ajax({
    type:'get',
    url:'../../C/controlSensibilise.php?Num_J='+Num_Jeton,
    success:function(server){
        $('#agent').html('');
        $('#agent').html(server);
         // cosnsole.log(server);     
    }
  });
}
function Enreg_jeton(Client,Num_Jeton){
  idClient=$('#idClient').val();
  $.ajax({
    type:'get',
    url:'../../C/controlSensibilise.php?Num_Jeton='+Num_Jeton+'&Client='+idClient,
    success:function(server){
        alert('Enregistrement Reussi !');
        rechecheRegJ('');
    }
  });
}
function rechecheRegJ(cle){
  $.ajax({
    type:'get',
    url:'../../C/rechercheSensibilise.php?id_agent='+cle,
    success:function(server){
        $('#div_tab_J').html('');
        $('#div_tab_J').html(server);
         // cosnsole.log(server);     
    }
  });
}
function suppri(id){
  $.ajax({
    type:'get',
    url:'../../C/controlSensibilise.php?id_enr='+id,
    success:function(server){
      if (server==true) {
        rechecheRegJ('');
        }else{
          alert('Echec de suppression, Cette information est liee aux payements sensibilisateurs');
        } 
    }
  });
}