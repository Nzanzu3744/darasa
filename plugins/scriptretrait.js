$(document).ready(function(){
  $('#Retirer').submit(function(){
    e.preventDefault();
  });

});

//PARTIE PREMIERS

function rechversement(cle){
	$.ajax({
            type : "GET", 
            url : "../../C/controlretrait.php?idagentV="+cle,
            success:function(serveur)
            {
              $("#div_versement").html('');
              $("#div_versement").html(serveur);
            }
        });  
}
function rechprog(idag){
  $.ajax({
            type : "GET", 
            url : "../../C/controlretrait.php?numag="+idag,
            success:function(serveur)
            {
              $("#RappoRetetVers").html("");
              $("#RappoRetetVers").html(serveur);
            }
        });  
}
function rechretrait(cle){
  $.ajax({
            type : "GET", 
            url : "../../C/controlretrait.php?idagentR="+cle,
            success:function(serveur)
            {
              $("#div_retrait").html("");
              $("#div_retrait").html(serveur);
            }
        });  
}
function retrirer(mont,idagent,solde){
  if(solde<mont){
    alert('Votre solde est Insuffisant!');
  }
  if(solde>=mont){ 
    $.ajax({
        type:'get',
        url:'../../C/controlretrait.php?Mont='+mont+'&Identagent='+idagent+'&solde='+solde,
        success:function(e){
          if(e==true){ 
            rechretrait(idagent);
            rechretrait(idagent);
            rechprog(1,idagent)
          alert('Reussi');
          }
          if(e==false){
          alert('Echec');
        }
  }
});
}
}
