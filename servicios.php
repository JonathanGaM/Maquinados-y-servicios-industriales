<?php
require_once __DIR__ . "/includes/core/fallbacks.php";
require_once __DIR__ . "/includes/core/db.php";

$servicios = [];

/* Escape helper */
function e(string $v): string
{
  return htmlspecialchars($v, ENT_QUOTES, "UTF-8");
}

// 1) Traer texto desde BD (solo nombre/descripcion)
if ($pdo instanceof PDO) {
  try {
    $stmt = $pdo->query("SELECT nombre, descripcion FROM servicios ORDER BY id ASC");
    $servicios = $stmt->fetchAll(PDO::FETCH_ASSOC);
  } catch (Throwable $ex) {
    $servicios = [];
  }
}

// 2) Si BD falla → usar fallback completo (incluye imagen/video si lo agregas)
if (empty($servicios)) {
  $servicios = $fallback_servicios;
} else {
  // 3) BD OK → asignar imagen/video por ORDEN (índice)
  foreach ($servicios as $i => &$s) {
    $s["imagen"] = $fallback_servicios[$i]["imagen"] ?? ($fallback_servicios[0]["imagen"] ?? "");
    $s["video"]  = $fallback_servicios[$i]["video"] ?? ""; // <-- video por orden (si existe)
  }
  unset($s);
}

include "includes/ui/header.php";
?>


<section id="hero-servicios"
  class="scroll-mt-28 sm:scroll-mt-32 relative min-h-[60vh] sm:min-h-[70vh] flex items-center pt-10 pb-24 sm:pb-32 overflow-hidden">


  <div class="absolute inset-0 z-0">
    <img
      id="hero-bg-img"
      alt="Fondo Industrial"
      class="w-full h-full object-cover grayscale brightness-[0.5]"
      src="https://www.mobil.com.mx/lubricantes/-/media/project/wep/mobil/mobil-mx/blog-industrial/engranes/fs-sm.jpg" />

    <div class="absolute inset-0 bg-gradient-to-b from-navy-blue/75 to-deep-black/65"></div>
    <div class="industrial-grid absolute inset-0 opacity-10"></div>
  </div>

  <div class="reveal zoom-text max-w-7xl mx-auto px-5 sm:px-8 relative z-10 w-full">
    <div class="flex flex-col items-center text-center">

      <p id="hero-badge"
        class="text-primary-red font-bold tracking-[0.28em] text-xs uppercase mb-3
         bg-primary-red/10 px-4 py-1 inline-block border-x border-primary-red/30">
        ¿Buscas un servicio especializado?
      </p>


      <h2 id="hero-title" class="text-3xl md:text-5xl font-black uppercase leading-none tracking-tight mb-6 text-white">
        Nuestros <span class="text-primary-red">Servicios</span>
      </h2>

      <p id="hero-desc" class="text-base sm:text-lg md:text-xl text-gray-300 max-w-4xl mx-auto leading-relaxed font-light mb-10">
Maquinados y Servicios Industriales es una empresa dedicada al maquinado y mantenimiento de maquinaria industrial, especializada en la fabricación y reparación de engranes, sinfines, coronas, flechas y componentes críticos. Ofrecemos soluciones de manufactura mediante procesos convencionales y CNC, orientadas a sectores agroindustrial y manufacturero, cumpliendo con altos estándares de precisión, confiabilidad operativa y entregas en tiempo.
      </p>
      <div id="hero-stats"
        class="grid grid-cols-1 md:grid-cols-2 gap-8 w-full max-w-4xl border-y border-white/10 py-4">

        <!-- 100% -->
        <div class="flex flex-col items-center group">
          <span class="text-3xl sm:text-4xl md:text-5xl font-black text-white tracking-tight mb-0
                 group-hover:text-primary-red transition-colors">
            100%
          </span>
          <span class="text-primary-red font-black tracking-[0.45em] text-[11px] uppercase">
            Calidad Garantizada
          </span>
        </div>

        <!-- AÑOS -->
        <div class="flex flex-col items-center group">
          <span class="text-3xl sm:text-4xl md:text-5xl font-black text-white tracking-tight mb-0
                 group-hover:text-primary-red transition-colors">
            <?= experience_decade(MSI_START_YEAR); ?>+
          </span>
          <span class="text-primary-red font-black tracking-[0.45em] text-[11px] uppercase">
            Años de Experiencia
          </span>
        </div>

      </div>
    </div>
  </div>
</section>

<!-- GRID SERVICIOS -->
<section id="servicios" class="pt-14 pb-16 sm:pt-18 sm:pb-20 bg-white relative overflow-hidden">

  <!-- overlays suaves -->
  <div class="absolute inset-0 bg-[radial-gradient(circle_at_1px_1px,rgba(2,6,23,0.05)_1px,transparent_0)] [background-size:40px_40px]"></div>
  <div class="absolute inset-0 bg-gradient-to-b from-white via-white to-white/95"></div>

  <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-8">

    <!-- TITULO -->
    <div class="text-center mb-8 sm:mb-10 reveal zoom-text">
      <span class="text-primary-red font-black tracking-[0.4em] text-[10px] uppercase">
        Servicios Especializados
      </span>

      <h3 class="text-4xl md:text-5xl font-black text-navy-blue uppercase mt-4">
        Servicios que Ofrecemos
      </h3>

      <div class="w-24 h-[2px] bg-primary-red mx-auto mt-6"></div>
    </div>

    <!-- GRID -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">


      <?php foreach ($servicios as $s): ?>
        <?php
        $nombre = (string)($s["nombre"] ?? "");
        $heroDesc = (string)($s["descripcion_larga"] ?? $s["descripcion"] ?? "");
        $img    = (string)($s["imagen"] ?? "");
        $vid    = trim((string)($s["video"] ?? ""));
        ?>


        <div
          class="service-card reveal from-bottom group relative
         h-[420px] sm:h-[460px]
         overflow-hidden border border-slate-200
         bg-deep-black
       rounded-[5px]
shadow-[0_8px_12px_-4px_rgba(0,0,0,0.65)]
">


          <!-- IMAGEN -->
          <img
            alt="<?= e((string)($s["nombre"] ?? "")); ?>"
            src="<?= e((string)($s["imagen"] ?? "")); ?>"
            class="absolute inset-0 w-full h-full object-cover
             transition-transform duration-700
             group-hover:scale-110" />

          <!-- VIDEO -->
          <?php if ($vid !== ""): ?>
            <video
              class="service-video absolute inset-0 w-full h-full object-cover
           opacity-0 pointer-events-none
           transition-opacity duration-300"
              muted
              loop
              playsinline
              preload="none"
              data-src="<?= e($vid); ?>">
            </video>
          <?php endif; ?>


          <!-- OVERLAY -->
          <div class="absolute inset-0 bg-gradient-to-t
            from-deep-black/85
            via-deep-black/35
            to-transparent"></div>


          <!-- CONTENIDO -->


          <div class="absolute inset-0 px-3 py-6 sm:px-4 sm:py-8 flex flex-col justify-end">

            <!-- TEXTO (con espacio reservado para botones) -->
            <!-- TEXTO (pegado abajo pero con espacio para botones) -->
            <div class="pr-2 pb-16 sm:pb-20">
              <div class="service-head transform transition-all duration-500 ease-out
    translate-y-20 group-hover:translate-y-0 group-focus-within:translate-y-0">

                <span class="material-symbols-outlined text-primary-red text-3xl mb-3">
                  precision_manufacturing
                </span>

                <h3 class="text-xl font-black text-white uppercase leading-tight">
                  <?= e((string)($s["nombre"] ?? "")); ?>
                </h3>
              </div>

              <p class="service-desc mt-6 group-hover:mt-2 text-gray-200 text-sm leading-relaxed
    opacity-0 translate-y-3 transition-all duration-500 ease-out
    group-hover:opacity-100 group-hover:translate-y-0
    group-focus-within:opacity-100 group-focus-within:translate-y-0">
                <?= e((string)($s["descripcion"] ?? "")); ?>
              </p>
            </div>


            <!-- BOTONES FIJOS ABAJO -->
            <div class="service-cta absolute left-3 right-3 bottom-5 sm:left-4 sm:right-4 sm:bottom-6
  flex items-center gap-3 flex-wrap">


              <!-- VER SERVICIO -->
              <a href="#hero-servicios"
                class="js-hero-service border border-white/60 text-white hover:bg-white hover:text-navy-blue transition-all font-black text-[10px]
         tracking-widest uppercase py-3 px-6 rounded-sm"
                data-hero-title="<?= e($nombre); ?>"
                data-hero-desc="<?= e($heroDesc); ?>"
                data-hero-img="<?= e($img); ?>"
                data-hero-badge="Soluciones de alta precisión para <?= e($nombre); ?>">
                Ver servicio
              </a>


              <!-- COTIZAR -->
              <a href="contacto.php"
                class="bg-primary-red
           hover:bg-white hover:text-navy-blue
           transition-all
           text-white font-black text-[10px]
           tracking-widest uppercase
           py-3 px-6 rounded-sm">
                Cotizar
              </a>

              <!-- FLECHA -->
              <span
                class="service-arrow material-symbols-outlined
           text-white/70 text-xl
           animate-bounce
           transition-all duration-300
           group-hover:animate-none group-hover:opacity-80">
                expand_less
              </span>

            </div>


          </div>

        </div>
      <?php endforeach; ?>


    </div>
  </div>
</section>

<section id="sectores" class="pt-14 pb-16 sm:pt-18 sm:pb-20 bg-white relative overflow-hidden">

  <!-- overlays -->
  <div class="absolute inset-0 bg-[radial-gradient(circle_at_1px_1px,rgba(2,6,23,0.06)_1px,transparent_0)] [background-size:40px_40px]"></div>
  <div class="absolute inset-0 bg-gradient-to-b from-white via-white to-white/95"></div>

  <div class="max-w-7xl mx-auto px-5 sm:px-8 relative z-10">

    <!-- TITULO -->
    <div class="text-center mb-8 sm:mb-10">
      <span class="text-primary-red font-black tracking-[0.4em] text-[10px] uppercase">
        Mercados Atendidos
      </span>
      <h3 class="text-4xl md:text-5xl font-black text-navy-blue uppercase mt-4">
        Sectores que Atendemos
      </h3>
      <div class="w-24 h-[2px] bg-primary-red mx-auto mt-6"></div>
    </div>

    <!-- GRID -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

      <!-- AUTOMOTRIZ -->
      <div class="reveal from-bottom relative h-64 overflow-hidden group border border-slate-200 bg-deep-black">
        <img
          src="https://cdn.club-magazin.autodoc.de/uploads/sites/11/2020/12/motor-de-combustion-interna-de-un-automovil.jpg"
          alt="Automotriz"
          class="absolute inset-0 w-full h-full object-cover grayscale brightness-[0.45]
                 transition-all duration-700 group-hover:scale-110 group-hover:grayscale-0" />

        <div class="absolute inset-0 bg-deep-black/70 group-hover:bg-deep-black/25
                    transition-all duration-500
                    flex flex-col items-center justify-center p-6 text-center">

          <span class="material-symbols-outlined text-4xl mb-3 text-white
                       transform transition-transform duration-500
                       group-hover:-translate-y-4">
            directions_car
          </span>

          <h5 class="text-white font-black uppercase tracking-widest text-base sm:text-lg
                     transform transition-transform duration-500
                     group-hover:-translate-y-4">
            Automotriz
          </h5>

          <p class="mt-3 text-white/85 text-xs leading-relaxed max-w-xs
                    opacity-0 translate-y-2
                    transition-all duration-500
                    group-hover:opacity-100 group-hover:translate-y-0">
            Fabricación y reparación de componentes para líneas de producción automotriz.
          </p>
        </div>
      </div>

      <!-- AERONÁUTICA -->
      <div class="reveal from-bottom relative h-64 overflow-hidden group border border-slate-200 bg-deep-black">
        <img
          src="https://us.123rf.com/450wm/andose24/andose241709/andose24170900011/86109270-tren-de-aterrizaje.jpg?ver=6"
          alt="Aeronáutica"
          class="absolute inset-0 w-full h-full object-cover grayscale brightness-[0.45]
                 transition-all duration-700 group-hover:scale-110 group-hover:grayscale-0" />

        <div class="absolute inset-0 bg-deep-black/70 group-hover:bg-deep-black/25
                    transition-all duration-500
                    flex flex-col items-center justify-center p-6 text-center">

          <span class="material-symbols-outlined text-4xl mb-3 text-white
                       transform transition-transform duration-500
                       group-hover:-translate-y-4">
            flight
          </span>

          <h5 class="text-white font-black uppercase tracking-widest text-base sm:text-lg
                     transform transition-transform duration-500
                     group-hover:-translate-y-4">
            Aeronáutica
          </h5>

          <p class="mt-3 text-white/85 text-xs leading-relaxed max-w-xs
                    opacity-0 translate-y-2
                    transition-all duration-500
                    group-hover:opacity-100 group-hover:translate-y-0">
            Maquinados de alta precisión para componentes críticos aeronáuticos.
          </p>
        </div>
      </div>

      <!-- METAL-MECÁNICA -->
      <div class="reveal from-bottom relative h-64 overflow-hidden group border border-slate-200 bg-deep-black">
        <img
          src="https://www.rapiddirect.com/wp-content/uploads/2023/10/5-axis-cnc-machining-process.webp"
          alt="Metal-Mecánica"
          class="absolute inset-0 w-full h-full object-cover grayscale brightness-[0.45]
                 transition-all duration-700 group-hover:scale-110 group-hover:grayscale-0" />

        <div class="absolute inset-0 bg-deep-black/70 group-hover:bg-deep-black/25
                    transition-all duration-500
                    flex flex-col items-center justify-center p-6 text-center">

          <span class="material-symbols-outlined text-4xl mb-3 text-white
                       transform transition-transform duration-500
                       group-hover:-translate-y-4">
            factory
          </span>

          <h5 class="text-white font-black uppercase tracking-widest text-base sm:text-lg
                     transform transition-transform duration-500
                     group-hover:-translate-y-4">
            Metal-Mecánica
          </h5>

          <p class="mt-3 text-white/85 text-xs leading-relaxed max-w-xs
                    opacity-0 translate-y-2
                    transition-all duration-500
                    group-hover:opacity-100 group-hover:translate-y-0">
            Soluciones de maquinado CNC y convencional para la industria metalmecánica.
          </p>
        </div>
      </div>

      <!-- ALIMENTICIA -->
      <div class="reveal from-bottom relative h-64 overflow-hidden group border border-slate-200 bg-deep-black">
        <img
          src="https://www.rrhhdigital.com/wp-content/uploads/userfiles/fabrica-alimentacion-comida.jpg"
          alt="Alimenticia"
          class="absolute inset-0 w-full h-full object-cover grayscale brightness-[0.45]
                 transition-all duration-700 group-hover:scale-110 group-hover:grayscale-0" />

        <div class="absolute inset-0 bg-deep-black/70 group-hover:bg-deep-black/25
                    transition-all duration-500
                    flex flex-col items-center justify-center p-6 text-center">

          <span class="material-symbols-outlined text-4xl mb-3 text-white
                       transform transition-transform duration-500
                       group-hover:-translate-y-4">
            restaurant
          </span>

          <h5 class="text-white font-black uppercase tracking-widest text-base sm:text-lg
                     transform transition-transform duration-500
                     group-hover:-translate-y-4">
            Alimenticia
          </h5>

          <p class="mt-3 text-white/85 text-xs leading-relaxed max-w-xs
                    opacity-0 translate-y-2
                    transition-all duration-500
                    group-hover:opacity-100 group-hover:translate-y-0">
            Fabricación y mantenimiento de piezas para maquinaria de proceso y empaque.
          </p>
        </div>
      </div>

      <!-- AGRÍCOLA -->
      <div class="reveal from-bottom relative h-64 overflow-hidden group border border-slate-200 bg-deep-black">
        <img
          src="https://www.spmas.es/wp-content/uploads/2023/03/Post-3-PRL-Sector-Agricola.jpg"
          alt="Agrícola"
          class="absolute inset-0 w-full h-full object-cover grayscale brightness-[0.45]
                 transition-all duration-700 group-hover:scale-110 group-hover:grayscale-0" />

        <div class="absolute inset-0 bg-deep-black/70 group-hover:bg-deep-black/25
                    transition-all duration-500
                    flex flex-col items-center justify-center p-6 text-center">

          <span class="material-symbols-outlined text-4xl mb-3 text-white
                       transform transition-transform duration-500
                       group-hover:-translate-y-4">
            agriculture
          </span>

          <h5 class="text-white font-black uppercase tracking-widest text-base sm:text-lg
                     transform transition-transform duration-500
                     group-hover:-translate-y-4">
            Agrícola
          </h5>

          <p class="mt-3 text-white/85 text-xs leading-relaxed max-w-xs
                    opacity-0 translate-y-2
                    transition-all duration-500
                    group-hover:opacity-100 group-hover:translate-y-0">
            Manufactura y reparación de componentes para maquinaria agrícola.
          </p>
        </div>
      </div>

      <!-- ELECTRÓNICA -->
      <div class="reveal from-bottom relative h-64 overflow-hidden group border border-slate-200 bg-deep-black">
        <img
          src="https://www.vencoel.com/wp-content/uploads/2023/11/normativas-electronica.jpg"
          alt="Electrónica"
          class="absolute inset-0 w-full h-full object-cover grayscale brightness-[0.45]
                 transition-all duration-700 group-hover:scale-110 group-hover:grayscale-0" />

        <div class="absolute inset-0 bg-deep-black/70 group-hover:bg-deep-black/25
                    transition-all duration-500
                    flex flex-col items-center justify-center p-6 text-center">

          <span class="material-symbols-outlined text-4xl mb-3 text-white
                       transform transition-transform duration-500
                       group-hover:-translate-y-4">
            memory
          </span>

          <h5 class="text-white font-black uppercase tracking-widest text-base sm:text-lg
                     transform transition-transform duration-500
                     group-hover:-translate-y-4">
            Electrónica
          </h5>

          <p class="mt-3 text-white/85 text-xs leading-relaxed max-w-xs
                    opacity-0 translate-y-2
                    transition-all duration-500
                    group-hover:opacity-100 group-hover:translate-y-0">
            Componentes de precisión para equipos y ensambles electrónicos industriales.
          </p>
        </div>
      </div>

    </div>
  </div>
</section>

<section id="materiales" class="py-24 bg-deep-black">

  <div class="max-w-7xl mx-auto px-5 sm:px-8 reveal zoom-text">

    <div class="border border-white/10 p-6 sm:p-8 md:p-12 flex flex-col lg:flex-row items-center gap-16 bg-navy-blue/60 relative overflow-hidden">

      <!-- Grid tipo blueprint inline -->
      <div class="absolute inset-0 bg-[linear-gradient(rgba(255,255,255,0.06)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.06)_1px,transparent_1px)] [background-size:22px_22px] opacity-30"></div>
      <div class="absolute inset-0 bg-gradient-to-r from-deep-black/40 via-transparent to-deep-black/20"></div>

      <div class="lg:w-1/2 relative z-10 reveal from-left">
        <span class="text-primary-red font-black tracking-[0.4em] text-[10px] uppercase">Capacidades de Material</span>
        <h3 class="text-4xl font-black text-white uppercase mt-4 mb-8">Expertos en Materiales Especiales</h3>

        <p class="text-gray-300 text-base sm:text-lg leading-relaxed mb-8">
          Contamos con la experiencia y herramientas para el maquinado de todo tipo de aceros ferrosos y no ferrosos:
        </p>

        <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">

          <li class="flex items-center gap-3 text-sm font-bold uppercase tracking-wider text-gray-300">
            <span class="w-2 h-2 bg-primary-red"></span> Acero Inoxidable
          </li>
          <li class="flex items-center gap-3 text-sm font-bold uppercase tracking-wider text-gray-300">
            <span class="w-2 h-2 bg-primary-red"></span> Bronce y Latón
          </li>
          <li class="flex items-center gap-3 text-sm font-bold uppercase tracking-wider text-gray-300">
            <span class="w-2 h-2 bg-primary-red"></span> Aluminio
          </li>
          <li class="flex items-center gap-3 text-sm font-bold uppercase tracking-wider text-gray-300">
            <span class="w-2 h-2 bg-primary-red"></span> Aceros Tratados (4140, D2)
          </li>
          <li class="flex items-center gap-3 text-sm font-bold uppercase tracking-wider text-gray-300">
            <span class="w-2 h-2 bg-primary-red"></span> Plásticos de Ingeniería
          </li>
          <li class="flex items-center gap-3 text-sm font-bold uppercase tracking-wider text-gray-300">
            <span class="w-2 h-2 bg-primary-red"></span> Hierro Vaciado
          </li>
        </ul>
      </div>

      <div class="lg:w-1/2 relative w-full z-10">
        <div class="relative bg-navy-blue p-4 border border-white/10 shadow-2xl">
          <img
            alt="Materiales / Plano Técnico"
            class="w-full object-cover contrast-105 saturate-110"
            src="https://www.zintilon.com/wp-content/uploads/2024/07/ferrous-metals-vs-non-ferrous-metals-880x608.png" />
        </div>
        <div class="absolute -bottom-4 -right-4 sm:-bottom-6 sm:-right-6 w-full h-full border-2 border-primary-red/20 -z-0"></div>

      </div>
    </div>
  </div>
</section>

<!-- (EL RESTO DE TU ARCHIVO: sectores + materiales) LO DEJAS IGUAL -->
<!-- ... pega aquí tus secciones #sectores y #materiales tal cual las tienes ... -->
<script src="assets/js/service-hover-video.js"></script>
<script src="assets/js/hero-servicio-switch.js"></script>

<style>
  /* Cuando el card está abierto (móvil), mostrar descripción */
  /* =========================
   MÓVIL: mostrar todo fijo
   ========================= */
  html {
    scroll-behavior: smooth;
  }

  @media (hover: none) and (pointer: coarse) {

    /* Descripción SIEMPRE visible */
    .service-desc {
      opacity: 1 !important;
      transform: translateY(0) !important;
      pointer-events: auto !important;
    }

    /* Quitar animación de entrada del título */
    .service-head {
      transform: translateY(0) !important;
    }

    /* Ocultar flecha en móvil */
    .service-arrow {
      display: none !important;
    }
  }
</style>

<?php include "includes/ui/footer.php"; ?>