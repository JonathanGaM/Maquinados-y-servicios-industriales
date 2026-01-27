(function () {
  const cards = document.querySelectorAll(".service-card");
  if (!cards.length) return;

  const isTouch =
    "ontouchstart" in window ||
    navigator.maxTouchPoints > 0 ||
    window.matchMedia("(pointer: coarse)").matches;

  // Si es móvil/touch: NO autoplay por hover (evita descargas inútiles)
  // Si quieres que sí funcione con toque, lo dejamos en touchstart abajo.
  const canHover = !isTouch && window.matchMedia("(hover: hover)").matches;

  function ensureSrc(video) {
    if (!video) return false;
    if (!video.src) {
      const src = video.dataset.src;
      if (src) {
        video.src = src;
        // fuerza a "preparar" sin descargar de golpe todo el sitio
        // (al hacer play, ya arranca)
      }
    }
    return !!video.src;
  }

  async function playVideo(video) {
    if (!video) return;

    const ok = ensureSrc(video);
    if (!ok) return;

    video.classList.add("opacity-100");

    try {
      // No reiniciamos: se ve más pro
      await video.play();
    } catch (e) {
      // Si el navegador bloquea, al menos queda visible
    }
  }

  function stopVideo(video) {
    if (!video) return;
    video.pause();
    video.classList.remove("opacity-100");
    // NO reiniciar currentTime (más fluido)
  }

  cards.forEach((card) => {
    const video = card.querySelector(".service-video");
    if (!video) return;

    if (canHover) {
      card.addEventListener("mouseenter", () => playVideo(video));
      card.addEventListener("mouseleave", () => stopVideo(video));

      // teclado (accesibilidad)
      card.addEventListener("focusin", () => playVideo(video));
      card.addEventListener("focusout", () => stopVideo(video));
    } else {
      // Touch: tocar reproduce / volver a tocar pausa
      card.addEventListener(
        "touchstart",
        () => {
          ensureSrc(video);
          if (video.paused) playVideo(video);
          else stopVideo(video);
        },
        { passive: true }
      );
    }
  });
})();
