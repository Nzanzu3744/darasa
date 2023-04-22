$(document).ready(function(){
  $('#resultat').hide();
  $('#formfiche').submit(function(e){
    e.preventDefault();
  })
});

function ajouterFiche(id){
  $.ajax({
      type:'POST',
      url:'../../C/controlfiche.php?idCli='+id,
      data: $('#formfiche').serialize(),
      success:function(serveur){
        if (serveur==true) {
          recherchefiche(id,'');
          actualiseform(id);
          $('#resultat').css('color','green').text("L'enregistrement réussi !");
          $('#resultat').show();
          $('#resultat').fadeOut(3000);
          console.log(serveur);
        }else{
          $('#resultat').css('color','red').text("L'enregistrement echoué !");
          $('#resultat').show();
          $('#resultat').fadeOut(20000);
          console.log(serveur);

        }
      } 
    });
}
// Recuperation pour modification
function modifFiche(idf,idcl){
       $.ajax({
      type:'POST',
      url:'../../C/controlfiche.php?idfiche0202='+idf+'&idClient0202='+idcl,
      success:function(serveur){
        $('#frmfiche102').html('');
        $('#frmfiche102').html(serveur);
        }
      });
}
//MODIFICATION 
function Modifierfiche(idsigM,idcli){
  // alert(idsigM);
  // alert(idcli);
  $.ajax({
      type:'POST',
      url:'../../C/controlfiche.php?idsigM='+idsigM,
      data: $('#formfiche').serialize(),
      success:function(serveur){
        // alert(serveur);
        if (serveur==true) {
          recherchefiche(idcli,'');
          actualiseform(idcli);
          $('#resultat').css('color','green').text("Modification réussi !");
          $('#resultat').show();
          $('#resultat').fadeOut(3000);
          // console.log(serveur);
        }else{
          $('#resultat').css('color','red').text("Modification echoué !");
          $('#resultat').show();
          $('#resultat').fadeOut(20000);
          // console.log(serveur);

        }
      } 
    });
}
function actualiseform(idcl){
       $.ajax({
      type:'get',
      url:'../../C/controlfiche.php?Actualise009='+idcl,
      success:function(serveur){
        $('#frmfiche102').html('');
        $('#frmfiche102').html(serveur);
        }
      });
}
function recherchefiche(idcli,idfic){

    $.ajax({
                type : "GET", 
                url : "../../C/recherchefiche.php?idfic="+idfic+"&idCli="+idcli,
                success:function(serveur)
                {
                  console.log(serveur);
                  $("#div-tab").html('');
                  $("#div-tab").html(serveur);
                }
            }); 
}

function recIDFiche(idfiche,idclie){
  $.ajax({
    type:'get',
    url:'../../C/controlfiche.php?idfiche='+idfiche,
    success:function(server){
      if(server == true){
        recherchefiche(idclie,'');
        console.log(server);
        alert("Suppression réussie !");
        }else{
        alert("Suppression echoué !");
      }
    }
  })
}
