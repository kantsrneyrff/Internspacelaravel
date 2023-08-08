$("#cep-btn").on("click", function() {
    var numcep = $("#cep").val();
    var url = "https://viacep.com.br/ws/" + numcep + "/json/"; // Adicione "https://" antes da URL
  
    $.ajax({
      url: url,
      type: "GET",
      dataType: "json",
  
      success: function(dados) {
        console.log(dados);
        $("#uf").val(dados.uf);
        $("#cidade").val(dados.localidade);
        $("#endereco").val(dados.logradouro);
        $("#bairro").val(dados.bairro);
      }
    });
  });
  