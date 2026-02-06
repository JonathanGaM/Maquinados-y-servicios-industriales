(() => {
  const hero = document.getElementById("hero-servicios");
  const bgImg = document.getElementById("hero-bg-img");
  const title = document.getElementById("hero-title");
  const desc = document.getElementById("hero-desc");
  const badge = document.getElementById("hero-badge");
  const stats = document.getElementById("hero-stats");
  const carouselEl = document.getElementById("hero-carousel3d");

  if (!hero || !bgImg || !title || !desc || !badge || !stats || !carouselEl) return;

  const defaultCarousel = Array.isArray(window.HERO_DEFAULT_CAROUSEL) ? window.HERO_DEFAULT_CAROUSEL : [];

  const initialSrv = (hero.dataset.srv || "").trim();
  if (initialSrv) {
    hero.classList.add("hero-pending");
    stats.style.display = "";
  }

  const defaultState = {
    img: bgImg.getAttribute("src") || "",
    titleHtml: title.innerHTML,
    descText: desc.textContent || "",
    badgeText: badge.textContent || ""
  };

  function escapeHtml(str) {
    return String(str)
      .replaceAll("&", "&amp;")
      .replaceAll("<", "&lt;")
      .replaceAll(">", "&gt;")
      .replaceAll('"', "&quot;")
      .replaceAll("'", "&#039;");
  }

  function parseCarousel(datasetValue) {
    try {
      const arr = JSON.parse(datasetValue || "[]");
      return Array.isArray(arr) ? arr : [];
    } catch {
      return [];
    }
  }

  // ✅ Carrusel dinámico (4/6/lo que sea)
  function updateCarousel(images) {
    const imgs = Array.isArray(images) ? images.filter(Boolean) : [];
    const list = imgs.length ? imgs : defaultCarousel;

    const count = list.length || 1;
    carouselEl.style.setProperty("--count", String(count));

    carouselEl.innerHTML = list
      .map((src, i) => `<figure style="--i:${i}"><img src="${src}" alt="Imagen ${i + 1}"></figure>`)
      .join("");
carouselEl.style.scrollBehavior = "auto";
carouselEl.scrollLeft = 0;
carouselEl.style.scrollBehavior = "";

  }

  function setServiceHero({ img, titleText, descText, badgeText, carouselImgs }) {
    if (img) bgImg.setAttribute("src", img);

    const words = (titleText || "").trim().split(/\s+/);
    const firstWord = words.shift() || "";
    const restWords = words.join(" ");

    title.innerHTML = `
      <span class="text-white">${escapeHtml(firstWord)}</span>
      ${restWords ? `<span class="text-primary-red"> ${escapeHtml(restWords)}</span>` : ""}
    `;

    desc.textContent = descText || "";
    badge.textContent = badgeText || "";

    stats.style.display = "";
    updateCarousel(carouselImgs);
  }

  function setDefaultHero() {
    bgImg.setAttribute("src", defaultState.img);
    title.innerHTML = defaultState.titleHtml;
    desc.textContent = defaultState.descText;
    badge.textContent = defaultState.badgeText;
    stats.style.display = "";
    updateCarousel(defaultCarousel);
  }

  function applyHeroFromUrl() {
    const srv = (hero.dataset.srv || "").trim();
    if (!srv) return false;

    const match = document.querySelector(`a.js-hero-service[data-hero-slug="${srv}"]`);
    if (!match) return false;

    const newSrc = match.dataset.heroImg || "";
    const tmp = new Image();

    tmp.onload = () => {
      setServiceHero({
        img: newSrc,
        titleText: match.dataset.heroTitle || "",
        descText: match.dataset.heroDesc || "",
        badgeText: match.dataset.heroBadge || "",
        carouselImgs: parseCarousel(match.dataset.heroCarousel)
      });

      hero.classList.remove("hero-pending");
      hero.scrollIntoView({ behavior: "auto", block: "start" });
    };

    tmp.onerror = () => {
      setDefaultHero();
      hero.classList.remove("hero-pending");
    };

    tmp.src = newSrc;
    return true;
  }

  // ====== AUTO CARRUSEL EN MÓVIL (sin arrastrar) ======
  let autoTimer = null;

  function isMobile() {
    return window.matchMedia("(max-width: 768px)").matches;
  }

  function stopAutoCarousel() {
    if (autoTimer) {
      clearInterval(autoTimer);
      autoTimer = null;
    }
  }

 function startAutoCarousel() {
  stopAutoCarousel();
  if (!isMobile()) return;

  const slides = carouselEl.querySelectorAll("figure");
  if (!slides.length) return;

  // ancho real de “una página” (mejor que figure.width)
  const slideWidth = () => carouselEl.clientWidth;

  // índice actual basado en scroll actual (evita que se descontrole)
  let i = Math.round(carouselEl.scrollLeft / slideWidth());

  const jumpTo = (x) => {
    const prev = carouselEl.style.scrollBehavior;
    carouselEl.style.scrollBehavior = "auto";
    carouselEl.scrollLeft = x;
    carouselEl.style.scrollBehavior = prev || "";
  };

  const smoothTo = (x) => {
    carouselEl.scrollTo({ left: x, behavior: "smooth" });
  };

  autoTimer = setInterval(() => {
    const w = slideWidth();
    const last = slides.length - 1;

    // ✅ Si ya estamos en la última, NO hagas smooth hacia 0 (eso se ve como rebobinado)
    // Mejor: salto instantáneo a 0 y el siguiente tick avanza a 1 con smooth.
    if (i >= last) {
      jumpTo(0);
      i = 0;
      return;
    }

    i++;
    smoothTo(i * w);
  }, 2800);
}



  // 🔁 Hook: cada que se actualiza el carrusel, reinicia autoplay
  const _oldUpdateCarousel = updateCarousel;
  updateCarousel = function(images) {
    _oldUpdateCarousel(images);
    startAutoCarousel();
  };

  document.addEventListener("DOMContentLoaded", () => {
    updateCarousel(defaultCarousel);

    if (!applyHeroFromUrl()) {
      hero.classList.remove("hero-pending");
    }

    startAutoCarousel();
  });

  window.addEventListener("resize", () => {
    startAutoCarousel();
  });

  document.addEventListener("click", (ev) => {
    const a = ev.target.closest("a.js-hero-service");
    if (!a) return;

    ev.preventDefault();

    const newSrc = a.dataset.heroImg || "";
    const tmp = new Image();

    tmp.onload = () => {
      setServiceHero({
        img: newSrc,
        titleText: a.dataset.heroTitle || "",
        descText: a.dataset.heroDesc || "",
        badgeText: a.dataset.heroBadge || "",
        carouselImgs: parseCarousel(a.dataset.heroCarousel)
      });

      hero.classList.remove("hero-pending");
      hero.scrollIntoView({ behavior: "smooth", block: "start" });
      history.replaceState(null, "", "#hero-servicios");
    };

    tmp.onerror = () => {
      hero.classList.remove("hero-pending");
    };

    tmp.src = newSrc;
  });
})();
