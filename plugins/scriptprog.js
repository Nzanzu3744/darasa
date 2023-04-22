$(document).ready(function(){
  $('#resultat').hide();
  $('#RechClient').keyup(function(){
      rechercheclient($(this).val());
  });
  $('#ajouteprog').click(function(e){
    e.preventDefault();
    ajouterProg();
  });

  $('#SensClient').click(function(e){
    e.preventDefault();
  });
  
});

function ajouterProg(){
  $.ajax({
      type:'POST',
      url:'../../C/controlprog.php',
      data: $('#formprog').serialize(),
      success:function(serveur){
        if (serveur==1) {
          rech_prog('');
          $('#resultat').css('color','green').text("L'enregistrement réussi !");
          $('#resultat').show();
          $('#resultat').fadeOut(3000);
        }else{
          rech_prog('');
          $('#resultat').css('color','red').text("L'enregistrement echoué !");
          $('#resultat').show();
        }
      } 
    });
}
function rech_prog(id){
  //alert(id);
  $.ajax({
    type:'get',
    url:'../../C/controlprog.php?idpro_rech='+id,
    success:function(server){
        $('#div_tabprog').html('');
        $('#div_tabprog').html(server);      
    }
  });
}
function valider01(id){
  // alert(id);
  $.ajax({
    type:'get',
    url:'../../C/controlprog.php?id_val='+id,
    success:function(server){
      // alert(server);
      if(server==1){
        alert("Validation Reussi !");
        Rec_Prog_Non_Valide('');
      }else{
        alert("Validation echoué !");
      }
    }
  })
}
//Recherche Pro Non Valide
function Rec_Prog_Non_Valide(id){
  // alert(id);
  $.ajax({
    type:'get',
    url:'../../C/controlprog.php?idproNon_rech='+id,
    success:function(server){
      // alert(server);
        $('#tab_programmeNV').html('');
        $('#tab_programmeNV').html(server);      
    }
  });
}

function sup_prog(id){
	$.ajax({
		type:'get',
		url:'../../C/controlprog.php?id_sup='+id,
    success:function(server){
      if(server==1){
      rech_prog('');
        alert("Suppression réussie !");
      }else{
        rech_prog('');
        alert("Suppression echoué Il est probable que ce programme soit lieu aux jetons !");
      }
    }
	})
}
//Selection
function ModifProg(id){
    $.ajax({
    type:'get',
    url:'../../C/controlprog.php?id_ModProg='+id,
    success:function(server){
      // alert(server);
    $('#fprogramme').html('');
    $('#fprogramme').html(server);
    }
  })
}
//formprog
function modifierprog(id){
  // alert(id);
   $.ajax({
      type:'POST',
      url:'../../C/controlprog.php?idModiF='+id,
      data: $('#formprog').serialize(),
      success:function(serveur){
        // alert(serveur);
        if (serveur==1) {
          rech_prog('');
          $('#resultat').css('color','green').text("Modification Réussi !");
          $('#resultat').show();
          $('#resultat').fadeOut(3000);
        }else{
          rech_prog('');
          $('#resultat').css('color','red').text("Modification echoué !");
          $('#resultat').show();
        }
      } 
    });
}