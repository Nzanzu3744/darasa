$(document).ready(function(){
  
  // $('#Rrecu').keyup(function(){
  //   rechercherecu($(this).val());
  //});
  $('#AjouterMt').click(function(e){
    e.preventDefault();
    rechercheR('');
  });
  $('#jetonenreg').click(function(e){
    e.preventDefault();
  });
});
//PARTIE PREMIERS

function rechercheR(cle){
	$.ajax({
            type : "GET", 
            url : "../../C/rechercherecu.php?idpay="+cle,
            success:function(serveur)
            {
              $("#div_t").html('');
              $("#div_t").html(serveur);
            }
        });  
}

// Recuperation de la facture
function recupfact(idfact){
  $.ajax({
      type:'GET',
      url:'../../C/controlrecu.php?idfacture='+idfact,
      success:function(serveur){
          $('#recu').html(serveur);
          // alert('Vous Payer la consommation N:'+idfact+'.');afficherecu
          afficherecu(idfact)
      } 
    });
}
function rechercheFact(id){
   $.ajax({
                type : "GET", 
                url : "../../C/recherchefacture_caisse.php?var="+id,
                success:function(serveur)
                {
                  console.log(serveur);
                  $("#div_tab1").html('');
                  $("#div_tab1").html(serveur);
                }
            });
}
function comparer(mt,reste,cons,devise){
  // alert(devise);
  $.ajax({
    type:'get',
    url:'../../C/controlrecu.php?idconso='+cons+'&mont='+mt+'&reste='+reste+'&devise='+devise,
    success:function(s){
      $("#alerter").show();
      $("#alerter").html('');
      $("#alerter").html(s);
      $("#alerter").css('color','red');
      $("#alerter").fadeOut(7000);
      recupfact(cons);
      rechercheR('');
      // alert(s);
    }
  });
}
function afficherecu(id){
  $.ajax({
    type:'get',
    url:'../../C/controlrecu.php?idcon2='+id,
    success:function(s){
      $('#ajouterrecu').show();
      $('#ajouterrecu').html(s);
    }
  });
}
function supprimerpay(idp,idc){
  $.ajax({
    type:'get',
    url:'../../C/controlrecu.php?idP_sup='+idp,
    success:function(s){
      if(s==true){
        alert("Sppression reussie !");
        recupfact(idc);
        rechercheR('');
      }
      if(s==false){
        alert('Suppression echoué; car il est probable que ce payement soit liée à une operation');
      }
    }
  });
}
function actual_LF_RC(){
  rechercheR('');
  rechercheFact('');
  $('#ajouterrecu').html('');
  $('#recu').html('');
}
