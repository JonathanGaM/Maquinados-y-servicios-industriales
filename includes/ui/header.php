<?php
//---- años de experiencia dinamicas 
require_once __DIR__ . "/../core/metrics.php";

if (!defined("MSI_START_YEAR")) {
  define("MSI_START_YEAR", 1994);
}

$currentPage = basename($_SERVER['PHP_SELF']);

// ✅ BD + helpers + fallbacks (igual que footer)
include_once __DIR__ . "/../core/db.php";
include_once __DIR__ . "/../core/db-safe.php";
include_once __DIR__ . "/../core/fallbacks.php";

// ✅ Traer datos necesarios para el header (o fallback)
// ✅ Traer datos necesarios para el header (o fallback)
// Solo consultar si $empresa NO viene precargada desde la página (ej. contacto.php)
if (!isset($empresa) || !is_array($empresa) || empty($empresa)) {
  $empresa = db_first_row(
    "SELECT nombre, ubicacion, telefono, whatsapp, correo, horarios
     FROM empresa
     LIMIT 1",
    [],
    $fallback_empresa
  );
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MSI Maquinados y Servicios Industriales</title>
  <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">


  <!-- ✅ Anti-flash: fondo base inmediato (antes de que cargue Tailwind/CSS) -->
  <style>
    html,
    body {
      background: #020617;
    }

    /* deep-black */
  </style>

  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

  <!-- CSS (tu estructura original) -->
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
    // ✅ Si ya visitaste: no renderizar loader (evita flash al navegar)
    if (sessionStorage.getItem("pageLoaded") === "true") {
      document.documentElement.classList.add("loader-off");
    }
  </script>

  <!-- ✅ Anti-flash extra: forzar overlay oscuro del loader sin tocar tu loader.css -->
  <style>
    .page-loader {
      background: rgba(2, 6, 23, 0.75) !important;
      /* deep-black */
      backdrop-filter: blur(6px);
      -webkit-backdrop-filter: blur(6px);
    }

    /* Forzar cierre del dropdown aunque el mouse siga encima */
    #navServicios.dropdown-force-close .js-servicios-dropdown {
      opacity: 0 !important;
      visibility: hidden !important;
      pointer-events: none !important;
      transform: translateY(-4px);
    }
  </style>
</head>

<body class="bg-deep-black font-display text-white selection:bg-primary-red selection:text-white">

  <!-- LOADER -->
  <div id="pageLoader" class="page-loader">
    <div class="loader-circle-37">
      <img src="assets/img/logoMSI.png" class="loader-logo" alt="Logo MSI">
    </div>
  </div>

  <!-- ✅ TOP BAR + HEADER (FIJOS ARRIBA SIEMPRE) -->
  <div class="fixed top-0 left-0 right-0 z-[9999]">

    <!-- TOP BAR (SOLO ESCRITORIO) -->
    <?php if (!($hideTopBar ?? false)): ?>

      <div class="hidden lg:flex w-full bg-deep-black border-b border-white/10">
        <div class="max-w-7xl mx-auto w-full px-8 h-10 flex items-center text-[13px] tracking-wide text-white/90 normal-case">
          <div class="flex flex-wrap items-center gap-x-8 gap-y-2 text-white/80">
            <span class="flex items-center gap-2">
              <span class="material-symbols-outlined text-primary-red text-sm">location_on</span>
              <?php echo htmlspecialchars($empresa["ubicacion"] ?? "", ENT_QUOTES, "UTF-8"); ?>
            </span>

            <span class="flex items-center gap-2">
              <span class="material-symbols-outlined text-primary-red text-sm">call</span>
              <?php echo htmlspecialchars($empresa["telefono"] ?? "", ENT_QUOTES, "UTF-8"); ?>
            </span>

            <span class="flex items-center gap-2">
              <span class="material-symbols-outlined text-primary-red text-sm">mail</span>
              <?php echo htmlspecialchars($empresa["correo"] ?? "", ENT_QUOTES, "UTF-8"); ?>
            </span>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <!-- ✅ HEADER (FIJO) -->
    <header class="bg-white border-b border-border-navy/20 shadow-[0_6px_12px_-8px_rgba(2,6,23,0.35)] px-4 sm:px-6 lg:px-8 h-[72px] sm:h-[84px] lg:h-[96px]">
      <div class="max-w-7xl mx-auto flex justify-between items-center h-full">

        <!-- LOGO -->
        <a href="index.php" class="flex items-center h-full gap-4">
          <img
            src="assets/img/logoMSI.png"
            alt="MSI - Maquinados y Servicios Industriales"
            class="h-11 sm:h-12 lg:h-full max-h-[96px] w-auto object-contain" />


          <div class="leading-tight">
            <?php
            $nombre = trim((string)($empresa['nombre'] ?? ''));
            $partes = explode(' ', $nombre, 2);
            $linea1 = $partes[0] ?? '';
            $linea2 = $partes[1] ?? '';
            ?>

            <p class="text-royal-blue font-black uppercase tracking-wide text-[11px] sm:text-[13px] lg:text-[17px]">
              <?php echo htmlspecialchars($linea1, ENT_QUOTES, "UTF-8"); ?>
            </p>

            <p class="text-royal-blue font-black uppercase tracking-wide text-[11px] sm:text-[13px] lg:text-[17px]">
              <?php echo htmlspecialchars($linea2, ENT_QUOTES, "UTF-8"); ?>
            </p>
          </div>
        </a>

        <!-- MENU (escritorio) -->
        <nav class="hidden md:flex ml-auto gap-8 text-[14px] font-bold uppercase">
          <a href="index.php"
            class="<?= $currentPage == 'index.php' ? 'text-primary-red' : 'text-navy-blue hover:text-primary-red transition-colors' ?>">
            Inicio
          </a>

          <a href="nosotros.php"
            class="<?= $currentPage == 'nosotros.php' ? 'text-primary-red' : 'text-navy-blue hover:text-primary-red transition-colors' ?>">
            Nosotros
          </a>

          <?php
          // ✅ Submenú (usa los 6 servicios del fallback)
          // Recomendación: asegúrate de que en $fallback_servicios existan 6 elementos.
          $serviciosMenu = array_slice($fallback_servicios ?? [], 0, 6);

          // slug simple (sirve para anchors: #maquinado-cnc, etc.)
          function slugify(string $t): string
          {
            $t = mb_strtolower(trim($t), 'UTF-8');
            $t = preg_replace('/[^\p{L}\p{N}\s-]+/u', '', $t);
            $t = preg_replace('/[\s-]+/', '-', $t);
            return trim($t, '-');
          }
          ?>

          <div id="navServicios" class="relative group">
            <!-- ✅ El link principal sigue siendo clickeable -->
            <a href="servicios.php"
              class="<?= $currentPage == 'servicios.php'
                        ? 'text-primary-red'
                        : 'text-navy-blue hover:text-primary-red transition-colors' ?> flex items-center gap-1">
              Servicios
              <span class="material-symbols-outlined text-[17px] leading-none translate-y-[1px] opacity-80 group-hover:opacity-100">
                keyboard_arrow_down
              </span>
            </a>

            <!-- ✅ Dropdown -->
            <div class="js-servicios-dropdown absolute left-0 top-full pt-4 opacity-0 invisible
  group-hover:opacity-100 group-hover:visible
  transition-all duration-200">

              <div class="w-72 bg-white border border-border-navy/20 shadow-2xl rounded-sm overflow-hidden">


                <div class="py-2">
                  <?php $isServiciosPage = ($currentPage === 'servicios.php'); ?>

                <?php foreach ($serviciosMenu as $srv): ?>
  <?php
    $titulo = (string)($srv['nombre'] ?? '');
    $descL  = (string)($srv['descripcion_larga'] ?? ($srv['descripcion'] ?? ''));
    $imgL   = (string)($srv['imagen'] ?? '');
    $slug   = slugify($titulo);
    $carousel = $srv["carousel"] ?? [];
  ?>

  <a
    href="<?= $isServiciosPage ? '#hero-servicios' : 'servicios.php?srv=' . $slug . '#hero-servicios'; ?>"
    class="<?= $isServiciosPage ? 'js-hero-service' : '' ?> block px-4 py-3
           text-navy-blue font-bold text-[13px]
           hover:bg-primary-red hover:text-white transition-colors"
    <?php if ($isServiciosPage): ?>
      data-hero-slug="<?= htmlspecialchars($slug, ENT_QUOTES, 'UTF-8'); ?>"
      data-hero-title="<?= htmlspecialchars($titulo, ENT_QUOTES, 'UTF-8'); ?>"
      data-hero-desc="<?= htmlspecialchars($descL, ENT_QUOTES, 'UTF-8'); ?>"
      data-hero-img="<?= htmlspecialchars($imgL, ENT_QUOTES, 'UTF-8'); ?>"
      data-hero-badge="Soluciones de alta precisión"
      data-hero-carousel='<?= htmlspecialchars(json_encode($carousel, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE), ENT_QUOTES, "UTF-8"); ?>'
    <?php endif; ?>
  >
    <?= htmlspecialchars($titulo, ENT_QUOTES, 'UTF-8'); ?>
  </a>
<?php endforeach; ?>

                </div>

              </div>
            </div>
          </div>

          <a href="clientes.php"
            class="<?= $currentPage == 'clientes.php' ? 'text-primary-red' : 'text-navy-blue hover:text-primary-red transition-colors' ?>">
            Clientes
          </a>

          <a href="contacto.php"
            class="<?= $currentPage == 'contacto.php' ? 'text-primary-red' : 'text-navy-blue hover:text-primary-red transition-colors' ?>">
            Contacto
          </a>
        </nav>

        <!-- BOTON HAMBURGUESA (MÓVIL) -->
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

  <!-- ✅ ESPACIADOR para header fijo -->
  <div class="<?= ($hideTopBar ?? false)
                ? 'h-[72px] sm:h-[84px] lg:h-[96px]'
                : 'h-[72px] sm:h-[84px] lg:h-[136px]' ?>">
  </div>
  <!-- MENU MÓVIL -->
  <div id="mobileMenu"
    class="md:hidden fixed left-0 right-0 top-[72px] sm:top-[84px] lg:top-[96px] z-50 pointer-events-none">
    <div
      id="mobileMenuPanel"
      class="bg-white border-b border-border-navy/20 shadow-xl
             transform -translate-y-6 opacity-0
             transition-all duration-300 ease-out
             pointer-events-none"
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

  <!-- ✅ JS menú móvil (misma lógica, sin cambios de funcionalidad) -->
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

        panel.classList.remove("pointer-events-none");
        panel.classList.add("pointer-events-auto");

        iconOpen.classList.add("hidden");
        iconClose.classList.remove("hidden");
        btn.setAttribute("aria-expanded", "true");
        panel.setAttribute("aria-hidden", "false");
      }

      function closeMenu() {
        panel.classList.add("-translate-y-6", "opacity-0");
        panel.classList.remove("translate-y-0", "opacity-100");

        panel.classList.add("pointer-events-none");
        panel.classList.remove("pointer-events-auto");

        iconOpen.classList.remove("hidden");
        iconClose.classList.add("hidden");
        btn.setAttribute("aria-expanded", "false");
        panel.setAttribute("aria-hidden", "true");

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

      window.addEventListener("resize", () => {
        if (window.innerWidth >= 768) closeMenu();
      });

      panel.addEventListener("click", (e) => {
        if (e.target && e.target.tagName === "A") closeMenu();
      });
    })();
  </script>

  <!-- ✅ Loader JS (si tú ya lo tienes en otro archivo, puedes quitar este bloque) -->
  <script>
    window.addEventListener("load", () => {
      sessionStorage.setItem("pageLoaded", "true");
      const loader = document.getElementById("pageLoader");
      if (!loader) return;
      loader.classList.add("is-hidden");
      setTimeout(() => loader.remove(), 650);
    });
  </script>
  <script>
    (function() {
      const nav = document.getElementById("navServicios");
      if (!nav) return;

      // Links dentro del dropdown de Servicios (escritorio)
      const dropdownLinks = nav.querySelectorAll(".js-servicios-dropdown a");
      if (!dropdownLinks.length) return;

      function forceCloseDropdown() {
        // Truco: quitamos el "hover" visual forzando una clase que anula el group-hover
        nav.classList.add("dropdown-force-close");

        // Opcional: quitar focus del link (se siente más "cerrado")
        if (document.activeElement) document.activeElement.blur();

        // Quitar la clase después de un momento (para permitir reabrir normal)
        setTimeout(() => nav.classList.remove("dropdown-force-close"), 250);
      }

      dropdownLinks.forEach(a => {
        a.addEventListener("click", () => {
          forceCloseDropdown();
        });
      });
    })();
  </script>