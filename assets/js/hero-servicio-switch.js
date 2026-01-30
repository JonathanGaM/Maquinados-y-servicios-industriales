(() => {
  const hero = document.getElementById("hero-servicios");
  const bgImg = document.getElementById("hero-bg-img");
  const title = document.getElementById("hero-title");
  const desc = document.getElementById("hero-desc");
  const badge = document.getElementById("hero-badge");
  const stats = document.getElementById("hero-stats");

  if (!hero || !bgImg || !title || !desc || !badge || !stats) return;

  // Estado del HERO PRINCIPAL
  const defaultState = {
    img: bgImg.getAttribute("src") || "",
    titleHtml: title.innerHTML,
    descText: desc.textContent || "",
    badgeText: badge.textContent || ""
  };

  function setServiceHero({ img, titleText, descText, badgeText }) {
    if (img) bgImg.setAttribute("src", img);

    // ❌ Sin "Servicio:" — solo el nombre en rojo
const words = titleText.trim().split(/\s+/);

const firstWord = words.shift() || "";
const restWords = words.join(" ");

title.innerHTML = `
  <span class="text-white">${escapeHtml(firstWord)}</span>
  ${restWords ? `<span class="text-primary-red"> ${escapeHtml(restWords)}</span>` : ""}
`;

    desc.textContent = descText || "";
    badge.textContent = badgeText || "";

    // ❌ Ocultar 100% y 30+ en servicios
    stats.style.display = "none";
  }

  function setDefaultHero() {
    bgImg.setAttribute("src", defaultState.img);
    title.innerHTML = defaultState.titleHtml;
    desc.textContent = defaultState.descText;
    badge.textContent = defaultState.badgeText;

    // ✅ Mostrar stats solo en hero principal
    stats.style.display = "";
  }

  document.addEventListener("click", (ev) => {
    const a = ev.target.closest("a.js-hero-service");
    if (!a) return;

    ev.preventDefault();

    setServiceHero({
      img: a.dataset.heroImg || "",
      titleText: a.dataset.heroTitle || "",
      descText: a.dataset.heroDesc || "",
      badgeText: a.dataset.heroBadge || ""
    });

    hero.scrollIntoView({ behavior: "smooth", block: "start" });
    history.replaceState(null, "", "#hero-servicios");
  });

  // Al recargar, volver al hero principal (con stats visibles)
  window.addEventListener("load", setDefaultHero);

  function escapeHtml(str) {
    return String(str)
      .replaceAll("&", "&amp;")
      .replaceAll("<", "&lt;")
      .replaceAll(">", "&gt;")
      .replaceAll('"', "&quot;")
      .replaceAll("'", "&#039;");
  }
})();
