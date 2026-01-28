document.addEventListener("DOMContentLoaded", () => {
  const el = document.getElementById("hero-rotating-text");
  if (!el) return;

  const texts = [
    "Fabricación, maquila y reparación de componentes industriales con sistemas internos de control de calidad y procesos confiables.",
    "Especialistas en engranes, sinfines y coronas para transmisión de potencia en maquinaria industrial.",
    "Diseño y manufactura de ejes y componentes mecánicos a medida, fabricados con alta precisión y entrega puntual.",
    "Producción de rodillos industriales, coples y refacciones críticas para mantenimiento y continuidad operativa.",
    "Soluciones en maquinado convencional y CNC para proyectos unitarios o producción en volumen."
  ];

  const BG_INTERVAL = 6500;
  const AFTER_BG = 1700;

  const OUT_MS = 950;
  const GAP_MS = 250;
  const IN_MS = 1800;

  let i = 0;
  let timer = null;

  // ✅ Siempre mostrar el primer texto
  el.textContent = texts[i];
  el.style.opacity = "1";
  el.style.transform = "translateX(0)";
  el.style.filter = "blur(0)";

  const doTextSwap = () => {
    el.style.transition = `opacity ${OUT_MS}ms ease, transform ${OUT_MS}ms ease, filter ${OUT_MS}ms ease`;
    el.style.opacity = "0";
    el.style.transform = "translateX(40px)";
    el.style.filter = "blur(6px)";

    setTimeout(() => {
      i = (i + 1) % texts.length;

      el.textContent = texts[i];
      el.style.transition = "none";
      el.style.opacity = "0";
      el.style.transform = "translateX(-40px)";
      el.style.filter = "blur(6px)";

      void el.offsetHeight;

      el.style.transition = `opacity ${IN_MS}ms ease, transform ${IN_MS}ms ease, filter ${IN_MS}ms ease`;
      el.style.opacity = "1";
      el.style.transform = "translateX(0)";
      el.style.filter = "blur(0)";
    }, OUT_MS + GAP_MS);
  };

  const scheduleNext = () => {
    if (timer) clearTimeout(timer);

    timer = setTimeout(() => {
      doTextSwap();
      scheduleNext();
    }, BG_INTERVAL + AFTER_BG);
  };

  // ✅ Arranca la rotación (sin duplicar timers)
  scheduleNext();
});
