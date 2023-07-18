document.addEventListener('DOMContentLoaded', function () {

  // Definindo o tempo inicial em minutos
  let div = document.querySelector("#temporizador");
  if (div) {
    let tempo = parseInt(localStorage.getItem('tempo'));
    // Função para exibir o tempo restante
    function exibirTempoRestante() {
      // Calculando os minutos e segundos restantes
      let minutos = Math.floor(tempo / 60);
      let segundos = tempo % 60;

      // Formatando a saída para exibir sempre 2 dígitos para os minutos e segundos
      minutos = minutos < 10 ? "0" + minutos : minutos;
      segundos = segundos < 10 ? "0" + segundos : segundos;
      contagem = minutos + ":" + segundos;
      div.textContent = "Sessão expira em: " + contagem;

      if (tempo === 15) {
        div.style.color = "red";
      }
    }

    // Função para decrementar o tempo
    function decrementarTempo() {
      // Verificando se o tempo chegou a 0
      if (parseInt(localStorage.getItem('tempo')) === 0) {
        // Se o tempo chegou a 0, podemos parar o contador
        clearInterval(intervalId);
        localStorage.removeItem('tempo');
        window.location.href = "logout";
      } else {
        // Se o tempo não chegou a 0, decrementamos 1 segundo
        tempo--;
        localStorage.setItem('tempo', tempo.toString());
        exibirTempoRestante();
      }
    }
    exibirTempoRestante();
    const intervalId = setInterval(decrementarTempo, 1000);
  }
});