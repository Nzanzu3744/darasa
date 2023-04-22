$(document).ready(function(){
  $('#resultat').hide();
  $('#formconsom').submit(function(e){
    e.preventDefault();
  })
});
function ajouterConsom(Quant,Pu,idpres,cons){
 $.ajax({
      type:'GET',
      url:'../../C/consommation.php?Quant='+Quant+'&Pu='+Pu+'&idpres='+idpres+'&cons='+cons,
      success:function(serveur){
          $('#factedit').html(serveur);
          rechercheFact('');
      } 
    });
}
function recidpresc(id){
  // alert(id);
  $.ajax({
      type:'GET',
      url:'../../C/consommation.php?Prescrid='+id,
      success:function(serveur){
        // alert(serveur);
          // $('#idpres').html('');
          // $('#idpres').hide('');
          // $('#factedit').html('');
          $('#facture').show();
          $('#factedit').html(serveur);
      } 
    });
}
function modifierfact(idpres){
  $.ajax({
      type:'GET',
      url:'../../C/consommation.php?Prescrid='+idpres,
      success:function(serveur){
          $('#factedit').html(serveur);
          Rechprescri('');
          alert('Vous Modifier facture N:'+idfact+'.');
      } 
    });
}
function suprimerconso(idpres,idconso){
  $.ajax({
      type:'GET',
      url:'../../C/consommation.php?idconso='+idconso+'&idpres='+idpres,
      success:function(serveur){
        if (serveur!='') {
          alert('Suppression Reussie !');
          $('#factedit').html(serveur);
          rechercheFact('');
          Rechprescri('');
        }else{
          alert('Suppression Echouée, cette consommation est liée une Recu !');
        }
      } 
    });
}
function rechercheFact(id){
   $.ajax({
                type : "GET", 
                url : "../../C/recherchefacture.php?var="+id,
                success:function(serveur)
                {
                  console.log(serveur);
                  $("#div_tab1").html('');
                  $("#div_tab1").html(serveur);
                }
            });
}
function Rechprescri(id){
   $.ajax({
                type : "GET", 
                url : "../../C/rechercheprescri.php?idfact="+id,
                success:function(serveur)
                {
                  // rechercheFact('');
                  // console.log(serveur);
                  $("#div_tab").html('');
                  $("#div_tab").html(serveur);
                }
            });
}
function valider(){
  Rechprescri('');
  $('#factedit').html('');
}
