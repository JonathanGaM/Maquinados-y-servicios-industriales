document.addEventListener("DOMContentLoaded", () => {
  const media = window.MSI_MEDIA || {};
  const heroImages = (media.hero && Array.isArray(media.hero.carousel))
    ? media.hero.carousel
    : [];

  const hero = document.getElementById("hero");
  const a = document.getElementById("hero-bg-a");
  const b = document.getElementById("hero-bg-b");
  if (!hero || !a || !b) return;

  // Si no hay imágenes, no corremos carrusel (pero sí animación)
  let index = 0;
  let active = a;
  let next = b;

  active.classList.add("is-active");

  const preload = (url) =>
    new Promise((resolve) => {
      const img = new Image();
      img.onload = () => resolve(true);
      img.onerror = () => resolve(false);
      img.src = url;
    });

  const swap = async () => {
    if (!heroImages.length) return;

    for (let tries = 0; tries < heroImages.length; tries++) {
      const nextIndex = (index + 1) % heroImages.length;
      const url = heroImages[nextIndex];

      const ok = await preload(url);
      index = nextIndex;

      if (!ok) continue;

      next.src = url;
      next.getBoundingClientRect();

      next.classList.add("is-active");
      active.classList.remove("is-active");

      const temp = active;
      active = next;
      next = temp;

      return;
    }
  };

  const runSequence = () => {
    hero.classList.add("run-title");
    setTimeout(() => hero.classList.add("show-surround"), 1450);
  };

  if (active.complete) runSequence();
  else {
    active.addEventListener("load", runSequence, { once: true });
    setTimeout(() => {
      if (!hero.classList.contains("run-title")) runSequence();
    }, 900);
  }

  setInterval(swap, 6500);
});
