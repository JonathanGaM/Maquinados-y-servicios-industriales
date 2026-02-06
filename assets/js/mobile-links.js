// assets/js/mobile-links.js
(function () {
  const MOBILE_MAX = 768;

  function isMobile() {
    return window.matchMedia(`(max-width: ${MOBILE_MAX}px)`).matches;
  }

  function applyMobileLinks() {
    if (!isMobile()) return;

    document.querySelectorAll("[data-mobile-href]").forEach(el => {
      const mobileHref = el.getAttribute("data-mobile-href");
      if (!mobileHref) return;

      // Guardar href original una sola vez
      if (!el.dataset.desktopHref) {
        el.dataset.desktopHref = el.getAttribute("href") || "";
      }

      el.setAttribute("href", mobileHref);
    });
  }

  function restoreDesktopLinks() {
    if (isMobile()) return;

    document.querySelectorAll("[data-mobile-href][data-desktop-href]").forEach(el => {
      el.setAttribute("href", el.dataset.desktopHref);
    });
  }

  document.addEventListener("DOMContentLoaded", () => {
    applyMobileLinks();
    restoreDesktopLinks();
  });

  window.addEventListener("resize", () => {
    applyMobileLinks();
    restoreDesktopLinks();
  });
})();
