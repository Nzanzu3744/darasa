//Adresse
  function pays1(id){
  $.ajax({
    type: 'get',
    url:'../../C/adresse.php?Idpay='+id,
    success:function(serveur){
      $('#prov').html('');
      $('#prov').html(serveur);
    }
  });
}


function prov1(id){
 
  $.ajax({
    type: 'get',
    url:'../../C/adresse.php?Idprov='+id,
    success:function(serveur){
      $('#ville').html('');
      $('#ville').html(serveur);
      // console.log(serveur);
    }
  });
}

function ville1(id){

  $.ajax({
    type: 'get',
    url:'../../C/adresse.php?Idville='+id,
    success:function(serveur){
      $('#quart').html('');
      $('#quart').html(serveur);
      console.log(serveur);
    }
  });
}