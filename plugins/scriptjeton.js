$(document).ready(function(){

  $('#jetonenreg').click(function(e){
    e.preventDefault();
  });
  $('#jetonRrg').click(function(e){
    e.preventDefault();
  });
});
//
function creerjeton(id){
  $.ajax({
    type:'get',
    url:'../../C/controljeton.php?id_Agent1='+id,
    success:function(server){
    
        $('#div_tab2').html('');
        $('#div_tab2').html(server);
         console.log(server);     
    }
  });
}


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
function jeton(cle){
  // alert(cle);
  $.ajax({
            type : "GET", 
            url : "../../C/controljeton.php?idprogre="+cle,
            success:function(serveur)
            {
              $("#program").html('');
              $("#program").html(serveur);
            }
        });
}
function ajouterJetons(idag,idprog,nombre){
  // alert(idag);
  // alert(nombre);
  // alert(idprog);
  $.ajax({
      type:'POST',
      url:'../../C/controljeton.php?idAg='+idag+'&idPo='+idprog+'&Nombrejet='+nombre,
      success:function(s){
          $('#div_tab_jet').html('');
          $('#div_tab_jet').html(s);
      } 
    });
}