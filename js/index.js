document.addEventListener("DOMContentLoaded", function () {
    if (sessionStorage.getItem("tema") == "escuro") {
      document.getElementById("pagina").classList.add("dark-mode");
    }
  
    if (sessionStorage.getItem("fonte") == "aumentada") {
      document.getElementById("pagina").classList.add("aumentou");
      document.getElementById("pagina").classList.remove("diminuiu");
    } else if (sessionStorage.getItem("fonte") == "diminuida") {
      document.getElementById("pagina").classList.add("diminuiu");
      document.getElementById("pagina").classList.remove("aumentou");
    } else {
      document.getElementById("pagina").classList.remove("aumentou");
      document.getElementById("pagina").classList.remove("diminuiu");
    }
  
    const contrast = document.getElementById("contraste");
  
    if (contrast) {
      contrast.addEventListener("click", function contraste() {
        if (document.getElementById("pagina").className.includes("dark-mode")) {
          document.getElementById("pagina").classList.remove("dark-mode");
          document.getElementById("pagina").classList.add("light-mode");
          sessionStorage.removeItem("tema");
        } else {
          document.getElementById("pagina").classList.add("dark-mode");
          document.getElementById("pagina").classList.remove("light-mode");
          sessionStorage.setItem("tema", "escuro");
        }
      });
    }
  
    const contrasteMobile = document.getElementById("contrasteMobile");
  
    if (contrasteMobile) {
      contrasteMobile.addEventListener("click", function cotraste() {
        if (document.getElementById("pagina").className.includes("dark-mode")) {
          document.getElementById("pagina").classList.remove("dark-mode");
          document.getElementById("pagina").classList.add("light-mode");
          sessionStorage.removeItem("tema");
        } else {
          document.getElementById("pagina").classList.add("dark-mode");
          document.getElementById("pagina").classList.remove("light-mode");
          sessionStorage.setItem("tema", "escuro");
        }
      });
    }
  
    function tamanhoFont(tamanho) {
      if (tamanho == "normal") {
        document.getElementById("pagina").classList.remove("diminuiu");
        document.getElementById("pagina").classList.remove("aumentou");
        sessionStorage.removeItem("fonte");
      } else if (tamanho == "sub") {
        document.getElementById("pagina").classList.add("diminuiu");
        document.getElementById("pagina").classList.remove("aumentou");
        sessionStorage.setItem("fonte", "diminuida");
      } else {
        document.getElementById("pagina").classList.add("aumentou");
        document.getElementById("pagina").classList.remove("diminuiu");
        sessionStorage.setItem("fonte", "aumentada");
      }
    }
  
    const sub = document.getElementById("sub");
    if (sub) {
      sub.addEventListener("click", function () {
        tamanhoFont("sub");
      });
    }
  
    const subMobile = document.getElementById("subMobile");
    if (subMobile) {
      subMobile.addEventListener("click", function () {
        tamanhoFont("sub");
      });
    }
  
    const normal = document.getElementById("normal");
    if (normal) {
      normal.addEventListener("click", function () {
        tamanhoFont("normal");
      });
    }
  
    const normalMobile = document.getElementById("normalMobile");
    if (normalMobile) {
      normalMobile.addEventListener("click", function () {
        tamanhoFont("normal");
      });
    }
  
    const soma = document.getElementById("soma");
    if (soma) {
      soma.addEventListener("click", function () {
        tamanhoFont("soma");
      });
    }
  
    const somaMobile = document.getElementById("somaMobile");
    if (somaMobile) {
      somaMobile.addEventListener("click", function () {
        tamanhoFont("soma");
      });
    }
  
    function button_menu(action) {
      switch (action) {
        case "open":
          document.getElementById("menu-mobile").style.display = "block";
          document.getElementById("menu-desktop").style.display = "none";
          break;
        case "close":
          document.getElementById("menu-mobile").style.display = "none";
          document.getElementById("menu-desktop").style.display = "block";
          break;
        default:
          alert("Informe o action");
      }
    }
  
    const open = document.getElementById("open");
    if (open) {
      open.addEventListener("click", function () {
        button_menu("open");
      });
    }
  
    const close = document.getElementById("close");
    if (close) {
      close.addEventListener("click", function () {
        button_menu("close");
      });
    }
});