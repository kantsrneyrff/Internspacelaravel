window.addEventListener('DOMContentLoaded', event => {

  // Alternar a navegação lateral
  const sidebarToggle = document.body.querySelector('#sidebarToggle');
  if (sidebarToggle) {

    sidebarToggle.addEventListener('click', event => {
      event.preventDefault();
      document.body.classList.toggle('sb-sidenav-toggled');
      localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
    });
  }
  function moverElemento() {
    var temporizador = document.getElementById("temporizador");
    var divDestino = document.getElementById("sidebar-footer");
    divDestino.appendChild(temporizador);
  }// Função para verificar o tamanho da tela e chamar a função moverElemento se necessário
  
  function moverElementoDeVolta() {
    var temporizador = document.getElementById("temporizador");
    var divOriginal = document.getElementById("navbar-temporizador");
    divOriginal.appendChild(temporizador);
  }
  function verificarTamanhoTela() {
    if (window.matchMedia("(max-width: 600px)").matches) {
      moverElemento();
    } else {
      moverElementoDeVolta();
    }
  }
  

  // Verifica o tamanho da tela quando a página é carregada
  verificarTamanhoTela();

  // Verifica o tamanho da tela quando a janela é redimensionada
  window.addEventListener("resize",verificarTamanhoTela);
});
