(() => {
  const KEY = "pageLoaded";

  // Si ya cargaste en esta pestaña, apaga el loader ANTES de que se pinte (evita flash)
  if (sessionStorage.getItem(KEY) === "true") {
    document.documentElement.classList.add("loader-off");
  }

  window.addEventListener("DOMContentLoaded", () => {
    const loader = document.getElementById("pageLoader");
    if (!loader) return;

    const alreadyLoaded = sessionStorage.getItem(KEY) === "true";

    if (alreadyLoaded) {
      loader.classList.add("is-hidden");
      return;
    }

    // Primera vez en esta pestaña
    sessionStorage.setItem(KEY, "true");

    window.addEventListener("load", () => {
      setTimeout(() => loader.classList.add("is-hidden"), 700);
    });
  });
})();
