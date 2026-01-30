(function () {
  const cards = document.querySelectorAll(".service-card");
  if (!cards.length) return;

  const isTouch =
    "ontouchstart" in window ||
    navigator.maxTouchPoints > 0 ||
    window.matchMedia("(pointer: coarse)").matches;

  const canHover = !isTouch && window.matchMedia("(hover: hover)").matches;

  // ✅ SOLO 1 ACTIVO EN MÓVIL
  let activeCard = null;
  let activeVideo = null;

  function ensureSrc(video) {
    if (!video) return false;
    if (!video.src) {
      const src = video.dataset.src;
      if (src) video.src = src;
    }
    return !!video.src;
  }

  async function playVideo(video) {
    if (!video) return;
    const ok = ensureSrc(video);
    if (!ok) return;

    video.classList.add("opacity-100");
    try {
      await video.play();
    } catch (e) {}
  }

  function stopVideo(video) {
    if (!video) return;
    video.pause();
    video.classList.remove("opacity-100");
  }

  function closeActive() {
    if (activeVideo) stopVideo(activeVideo);
    if (activeCard) activeCard.classList.remove("is-open");
    activeCard = null;
    activeVideo = null;
  }

  cards.forEach((card) => {
    const video = card.querySelector(".service-video");
    if (!video) return;

    if (canHover) {
      card.addEventListener("mouseenter", () => playVideo(video));
      card.addEventListener("mouseleave", () => stopVideo(video));
      card.addEventListener("focusin", () => playVideo(video));
      card.addEventListener("focusout", () => stopVideo(video));
    } else {
      card.addEventListener(
        "touchstart",
        () => {
          ensureSrc(video);

          // ✅ Si toco otro card distinto, cierro el anterior
          if (activeCard && activeCard !== card) {
            closeActive();
          }

          // Toggle del mismo card
          if (video.paused) {
            card.classList.add("is-open");
            playVideo(video);
            activeCard = card;
            activeVideo = video;
          } else {
            card.classList.remove("is-open");
            stopVideo(video);
            activeCard = null;
            activeVideo = null;
          }
        },
        { passive: true },
      );
    }
  });

  // (Opcional pro) Si cambias de pestaña/ocultas pantalla, apaga el activo
  document.addEventListener("visibilitychange", () => {
    if (document.hidden) closeActive();
  });
})();
