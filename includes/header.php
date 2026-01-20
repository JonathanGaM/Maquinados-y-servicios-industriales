<?php
//---- años de experiencia dinamicas 
require_once __DIR__ . "/metrics.php";

if (!defined("MSI_START_YEAR")) {
  define("MSI_START_YEAR", 1994);
}
$currentPage = basename($_SERVER['PHP_SELF']);
// ✅ BD + helpers + fallbacks (igual que footer)
include_once __DIR__ . "/db.php";
include_once __DIR__ . "/db-safe.php";
include_once __DIR__ . "/fallbacks.php";

// ✅ Traer datos necesarios para el header (o fallback)
$empresa = db_first_row(
  "SELECT nombre, ubicacion, telefono, correo
   FROM empresa
   LIMIT 1",
  [],
  $fallback_empresa
);

?>


<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title> MSI Maquinados y Servicios Industriales</title>

  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  <link rel="stylesheet" href="assets/css/loader.css">
  <link rel="stylesheet" href="assets/css/global.css">
  <link rel="stylesheet" href="assets/css/reveal.css">

  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />

  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            "primary-red": "#E31B23",
            "navy-blue": "#0A192F",
            "deep-black": "#020617",
            "royal-blue": "#0047AB",
            "industrial-white": "#FFFFFF",
            "border-navy": "#1E293B"
          },
          fontFamily: {
            display: ["Space Grotesk", "sans-serif"]
          }
        }
      }
    }
  </script>
  <script>
    // Apaga el loader ANTES de renderizar (evita el flash)
    if (sessionStorage.getItem("pageLoaded") === "true") {
      document.documentElement.classList.add("loader-off");
    }
  </script>
</head>

<body class="bg-industrial-white font-display text-navy-blue selection:bg-primary-red selection:text-white">

  <div id="pageLoader" class="page-loader">
    <div class="loader-circle-37">
      <img src="assets/img/logoMSI.png" class="loader-logo" alt="Logo MSI">
    </div>
  </div>
  <!-- TOP BAR (AJUSTADO PARA CENTRAR COMO EL HEADER) -->
  <!-- ✅ TOP BAR + HEADER (FIJOS ARRIBA SIEMPRE) -->
  <div class="fixed top-0 left-0 right-0 z-[9999]">

    <!-- TOP BAR (SOLO ESCRITORIO) -->
    <div class="hidden lg:flex w-full bg-deep-black border-b border-white/10">
      <div class="max-w-7xl mx-auto w-full px-8 py-2 flex items-center text-[11px] uppercase tracking-widest text-gray-400">
        <div class="flex flex-wrap items-center gap-x-8 gap-y-2 text-white/80">
          <span class="flex items-center gap-2">
            <span class="material-symbols-outlined text-primary-red text-sm">location_on</span>
            <?php echo htmlspecialchars($empresa["ubicacion"]); ?>
          </span>

          <span class="flex items-center gap-2">
            <span class="material-symbols-outlined text-primary-red text-sm">call</span>
            <?php echo htmlspecialchars($empresa["telefono"]); ?>
          </span>

          <span class="flex items-center gap-2">
            <span class="material-symbols-outlined text-primary-red text-sm">mail</span>
            <?php echo htmlspecialchars($empresa["correo"]); ?>
          </span>

        </div>
      </div>
    </div>

    <!-- ✅ HEADER (FIJO) -->
    <header class="bg-white border-b border-border-navy/20 px-4 sm:px-6 lg:px-8 py-2 h-20 sm:h-24 lg:h-28">
      <div class="max-w-7xl mx-auto flex justify-between items-center h-full">

        <!-- LOGO + TEXTO (siempre a la izquierda en escritorio) -->
        <a href="index.php" class="flex items-center h-full gap-4">
          <img
            src="assets/img/logoMSI.png"
            alt="MSI - Maquinados y Servicios Industriales"
            class="h-12 sm:h-14 lg:h-full max-h-[120px] w-auto object-contain" />
         <div class="leading-tight">
  <?php
    // Partir el nombre en dos líneas (simple y seguro)
    $nombre = trim($empresa['nombre'] ?? '');
    $partes = explode(' ', $nombre, 2);

    $linea1 = $partes[0] ?? '';
    $linea2 = $partes[1] ?? '';
  ?>

  <p class="text-royal-blue font-black uppercase tracking-wide text-[12px] sm:text-sm lg:text-lg">
    <?php echo htmlspecialchars($linea1); ?>
  </p>

  <p class="text-royal-blue font-black uppercase tracking-wide text-[12px] sm:text-sm lg:text-lg">
    <?php echo htmlspecialchars($linea2); ?>
  </p>
</div>

        </a>

        <!-- MENU (escritorio) -->
        <nav class="hidden md:flex ml-auto gap-10 text-[15px] font-bold uppercase">
          <a href="index.php"
            class="<?= $currentPage == 'index.php' ? 'text-primary-red' : 'text-navy-blue hover:text-primary-red transition-colors' ?>">
            Inicio
          </a>

          <a href="nosotros.php"
            class="<?= $currentPage == 'nosotros.php' ? 'text-primary-red' : 'text-navy-blue hover:text-primary-red transition-colors' ?>">
            Nosotros
          </a>

          <a href="servicios.php"
            class="<?= $currentPage == 'servicios.php' ? 'text-primary-red' : 'text-navy-blue hover:text-primary-red transition-colors' ?>">
            Servicios
          </a>

          <a href="clientes.php"
            class="<?= $currentPage == 'clientes.php' ? 'text-primary-red' : 'text-navy-blue hover:text-primary-red transition-colors' ?>">
            Clientes
          </a>

          <a href="contacto.php"
            class="<?= $currentPage == 'contacto.php' ? 'text-primary-red' : 'text-navy-blue hover:text-primary-red transition-colors' ?>">
            Contacto
          </a>
        </nav>

        <!-- BOTON HAMBURGUESA (MÓVIL) - a la derecha -->
        <button
          id="btnMobileMenu"
          class="md:hidden inline-flex items-center justify-center w-11 h-11 border border-border-navy/30 rounded-sm text-navy-blue hover:text-primary-red hover:border-primary-red transition"
          aria-label="Abrir menú"
          aria-expanded="false"
          aria-controls="mobileMenu"
          type="button">
          <span id="iconOpen" class="material-symbols-outlined text-[26px]">menu</span>
          <span id="iconClose" class="material-symbols-outlined text-[26px] hidden">close</span>
        </button>

      </div>
    </header>

  </div>

  <!-- ✅ ESPACIADOR (obligatorio) para que el contenido NO quede debajo del header fijo -->
  <div class="h-20 sm:h-24 lg:h-[152px]"></div>

  <!-- MENU MÓVIL -->
  <div id="mobileMenu" class="md:hidden fixed left-0 right-0 top-20 sm:top-24 z-50 pointer-events-none">
    <div
      id="mobileMenuPanel"
      class="bg-white border-b border-border-navy/20 shadow-xl
           transform -translate-y-6 opacity-0
           transition-all duration-300 ease-out
           pointer-events-auto"
      aria-hidden="true">
      <nav class="max-w-7xl mx-auto px-4 sm:px-6 py-4 flex flex-col gap-3 text-sm font-black uppercase max-h-[60vh] overflow-auto">
        <a href="index.php"
          class="<?= $currentPage == 'index.php' ? 'text-primary-red' : 'text-navy-blue hover:text-primary-red transition-colors' ?>">
          Inicio
        </a>

        <a href="nosotros.php"
          class="<?= $currentPage == 'nosotros.php' ? 'text-primary-red' : 'text-navy-blue hover:text-primary-red transition-colors' ?>">
          Nosotros
        </a>

        <a href="servicios.php"
          class="<?= $currentPage == 'servicios.php' ? 'text-primary-red' : 'text-navy-blue hover:text-primary-red transition-colors' ?>">
          Servicios
        </a>

        <a href="clientes.php"
          class="<?= $currentPage == 'clientes.php' ? 'text-primary-red' : 'text-navy-blue hover:text-primary-red transition-colors' ?>">
          Clientes
        </a>

        <a href="contacto.php"
          class="<?= $currentPage == 'contacto.php' ? 'text-primary-red' : 'text-navy-blue hover:text-primary-red transition-colors' ?>">
          Contacto
        </a>
      </nav>
    </div>
  </div>

  <script>
    (function() {
      const btn = document.getElementById("btnMobileMenu");
      const wrap = document.getElementById("mobileMenu");
      const panel = document.getElementById("mobileMenuPanel");
      const iconOpen = document.getElementById("iconOpen");
      const iconClose = document.getElementById("iconClose");

      if (!btn || !wrap || !panel || !iconOpen || !iconClose) return;

      function openMenu() {
        wrap.classList.remove("pointer-events-none");
        panel.classList.remove("-translate-y-6", "opacity-0");
        panel.classList.add("translate-y-0", "opacity-100");
        iconOpen.classList.add("hidden");
        iconClose.classList.remove("hidden");
        btn.setAttribute("aria-expanded", "true");
        panel.setAttribute("aria-hidden", "false");
      }

      function closeMenu() {
        panel.classList.add("-translate-y-6", "opacity-0");
        panel.classList.remove("translate-y-0", "opacity-100");
        iconOpen.classList.remove("hidden");
        iconClose.classList.add("hidden");
        btn.setAttribute("aria-expanded", "false");
        panel.setAttribute("aria-hidden", "true");

        // Espera a que termine la animación y luego desactiva clicks
        setTimeout(() => {
          if (btn.getAttribute("aria-expanded") === "false") {
            wrap.classList.add("pointer-events-none");
          }
        }, 300);
      }

      btn.addEventListener("click", () => {
        const isOpen = btn.getAttribute("aria-expanded") === "true";
        isOpen ? closeMenu() : openMenu();
      });

      // Cierra si pasas a escritorio
      window.addEventListener("resize", () => {
        if (window.innerWidth >= 768) closeMenu();
      });

      // Cierra cuando das click a un link del menú
      panel.addEventListener("click", (e) => {
        if (e.target.tagName === "A") closeMenu();
      });
    })();
  </script>