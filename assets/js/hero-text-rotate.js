document.addEventListener("DOMContentLoaded", () => {
  const el = document.getElementById("hero-rotating-text");
  if (!el) return;

  const texts = [
    "Fabricación, maquila y reparación de componentes críticos para la industria global con precisión certificada.",
    "Maquinados de precisión para piezas industriales, refacciones y componentes especiales bajo especificación.",
    "Respuesta rápida, control de calidad y amplia experiencia en torno, fresadora, CNC y procesos de manufactura."
  ];

  // ⏱️ Debe coincidir con el fondo
  const BG_INTERVAL = 6500;     // igual que setInterval(swap, 6500)
  const AFTER_BG = 1700;        // espera a que termine el fade del fondo (≈1200ms) + un extra suave

  // ⏱️ Duraciones del texto (para que no se vea rápido)
  const OUT_MS = 950;           // salida
  const GAP_MS = 250;           // pausa mínima antes de entrar
  const IN_MS = 1800;           // entrada

  let i = 0;
  let timer = null;

  const doTextSwap = () => {
    // sale a la derecha suave
    el.style.transition = `opacity ${OUT_MS}ms ease, transform ${OUT_MS}ms ease, filter ${OUT_MS}ms ease`;
    el.style.opacity = "0";
    el.style.transform = "translateX(40px)";
    el.style.filter = "blur(6px)";

    setTimeout(() => {
      i = (i + 1) % texts.length;

      // preparar el nuevo texto entrando desde izquierda (invisible)
      el.textContent = texts[i];
      el.style.transition = "none";
      el.style.opacity = "0";
      el.style.transform = "translateX(-40px)";
      el.style.filter = "blur(6px)";

      void el.offsetHeight; // reflow

      // entra suave desde izquierda
      el.style.transition = `opacity ${IN_MS}ms ease, transform ${IN_MS}ms ease, filter ${IN_MS}ms ease`;
      el.style.opacity = "1";
      el.style.transform = "translateX(0)";
      el.style.filter = "blur(0)";
    }, OUT_MS + GAP_MS);
  };

  const scheduleNext = () => {
    // Cancela por seguridad
    if (timer) clearTimeout(timer);

    // 1) Espera el cambio del fondo (BG_INTERVAL)
    // 2) Luego espera a que termine el fade del fondo (AFTER_BG)
    timer = setTimeout(() => {
      doTextSwap();
      scheduleNext();
    }, BG_INTERVAL + AFTER_BG);
  };

  // ✅ Arranque: primero se ve el fondo + secuencia normal del hero,
  // y ya después empieza a rotar el texto.
  timer = setTimeout(() => {
    doTextSwap();
    scheduleNext();
  }, BG_INTERVAL + AFTER_BG);
});
