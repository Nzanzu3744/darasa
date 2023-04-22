function recherchepresnonfact(client){
if (client=='') {
document.location.href='AjouterFacture.php';
}else{
    $.ajax({
                type : "GET", 
                url : "../../C/recherprescriptnomfact.php?var="+client,
                success:function(serveur)
                {
                  if(serveur){
                     console.log(serveur);
                  $("#div_tab").html('');
                  $("#div_tab").html(serveur);
                  }
                }
            }); 
} 
}

function recPrescript(idpres){
        document.location.href='../pages/ajouterFact.php?idpres='+idpres;
  }