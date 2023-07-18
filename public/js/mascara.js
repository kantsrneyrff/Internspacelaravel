$(document).ready(function () {
  // CPF
  $('input[name="cpf"]').mask("000.000.000-00", { reverse: true });

  // Documento
  $('input[name="documento"]').mask("00.000.000/0000-00", { reverse: true });

  // Telefone
  $('input[name="telefone"]').mask("(00) 00000-0000");

  // CEP
  $('input[name="cep"]').mask("00000-000");
  // Função para permitir somente números nos campos de entrada
  function permitirSomenteNumeros(event) {
    // Obtém o valor do evento de entrada
    var valor = String.fromCharCode(event.which);

    // Verifica se o valor é um número
    if (!/^[0-9]+$/.test(valor)) {
      // Se não for um número, cancela a entrada
      event.preventDefault();
    }
  }
});
