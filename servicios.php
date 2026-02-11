<?php
require_once __DIR__ . "/includes/core/fallbacks.php";
require_once __DIR__ . "/includes/core/db.php";
require_once __DIR__ . "/includes/core/db-safe.php";


$servicios = [];

/* Escape helper */
function e(string $v): string
{
  return htmlspecialchars($v, ENT_QUOTES, "UTF-8");
}
// 1) Traer texto desde BD (solo nombre/descripcion/descripcion larga)
if ($pdo instanceof PDO) {
  try {
    $stmt = $pdo->query("
      SELECT nombre, descripcion, descripcion_larga
      FROM servicios
      ORDER BY id ASC
    ");
    $servicios = $stmt->fetchAll(PDO::FETCH_ASSOC);
  } catch (Throwable $ex) {
    $servicios = [];
  }
}
// 2) Si BD falla → usar fallback completo (incluye imagen/video si lo agregas)
if (empty($servicios)) {
  $servicios = $fallback_servicios;
} else {
  foreach ($servicios as $i => &$s) {
    $s["imagen"]   = $fallback_servicios[$i]["imagen"]   ?? ($fallback_servicios[0]["imagen"] ?? "");
    $s["video"]    = $fallback_servicios[$i]["video"]    ?? "";
    $s["carousel"] = $fallback_servicios[$i]["carousel"] ?? [];
  }
  unset($s);
}
// ====== HERO SERVICIOS: descripcion (BD -> fallback) ======
$heroServiciosDesc = "";

if ($pdo instanceof PDO) {
  try {
    $stmt = $pdo->prepare("
      SELECT valor
      FROM contenidos
      WHERE pagina='servicios' AND seccion='hero' AND clave='hero_descripcion'
      ORDER BY orden ASC
      LIMIT 1
    ");
    $stmt->execute();
    $heroServiciosDesc = (string)($stmt->fetchColumn() ?: "");
  } catch (Throwable $e) {
    $heroServiciosDesc = "";
  }
}

if ($heroServiciosDesc === "") {
  $heroServiciosDesc = (string)($fallback_servicios_contenido["hero"]["descripcion"] ?? "");
}



include "includes/ui/header.php";

?>
<script>
  window.HERO_DEFAULT_CAROUSEL = <?= json_encode($fallback_hero_servicios["carousel"] ?? [], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>;
</script>

<!-- =========================================================
     HERO SERVICIOS (3 FONDOS)
     1) Imagen + badge + titulo
     2) Fondo claro: carrusel 3D (izq) + descripción larga (der)
     3) CTA
========================================================== -->

<!-- ✅ Fondo 1: SOLO imagen + badge + título -->
<section id="hero-servicios"
  data-srv="<?= htmlspecialchars($_GET['srv'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
  class="scroll-mt-[170px] sm:scroll-mt-[190px] relative overflow-hidden">

  <!-- ✅ Fondo 1: más compacto -->
  <div class="relative min-h-[20vh] sm:min-h-[28vh] flex items-center">
    <div class="absolute inset-0 z-0">
      <img
        id="hero-bg-img"
        alt="Fondo Industrial"
        class="w-full h-full object-cover brightness-[0.55]"
        src="<?= e($fallback_servicios_contenido["hero"]["imagen"] ?? ""); ?>" />
      <div class="absolute inset-0 bg-gradient-to-b from-navy-blue/75 to-deep-black/55"></div>
      <div class="industrial-grid absolute inset-0 opacity-10"></div>
    </div>

    <div class="relative z-10 w-full">
      <div class="max-w-7xl mx-auto px-5 sm:px-8 text-center reveal zoom-text py-5 sm:py-6">
        <p id="hero-badge"
          class="text-primary-red font-black tracking-[0.28em] text-[10px] sm:text-xs uppercase mb-2
                 bg-primary-red/10 px-4 py-1 inline-block border-x border-primary-red/30">
          Soluciones de alta precisión
        </p>

        <h2 id="hero-title"
          class="text-3xl sm:text-4xl md:text-5xl font-black uppercase leading-tight tracking-tight text-white">
          Nuestros <span class="text-primary-red">Servicios</span>
        </h2>
      </div>
    </div>
  </div>

  <div class="bg-[rgb(10_25_47)] border-t border-white/10 text-white">
    <div class="max-w-7xl mx-auto px-5 sm:px-8 py-8 sm:py-10">

      <!-- ✅ ESTE GRID ES EL QUE TE FALTA -->
      <div class="grid lg:grid-cols-[0.4fr_0.6fr] gap-10 lg:gap-14 items-start">

        <!-- IZQUIERDA -->
        <div class="reveal from-left lg:-ml-12">
          <div class="mx-auto w-full max-w-md">
            <div class="carousel3d-wrap">
              <div class="carousel3d" id="hero-carousel3d" aria-label="Carrusel 3D del servicio"></div>
            </div>
          </div>
        </div>

        <!-- DERECHA -->
        <div class="reveal from-right">

          <p id="hero-desc"
            class="text-white/90 text-[15px] sm:text-[17px] leading-[1.55] -mt-1"
            style="text-align: justify;">
<?= e($heroServiciosDesc); ?>
          </p>

          <div id="hero-stats"
            class="mt-6 grid grid-cols-2 gap-6 w-full max-w-xl border-y border-white/15 py-4">
            <div class="flex flex-col items-start">
              <span class="text-3xl sm:text-4xl font-black text-white tracking-tight">100%</span>
              <span class="text-primary-red font-black tracking-[0.35em] text-[10px] uppercase">Calidad Garantizada</span>
            </div>

            <div class="flex flex-col items-start">
              <span class="text-3xl sm:text-4xl font-black text-white tracking-tight">
                <?= experience_decade(MSI_START_YEAR); ?>+
              </span>
              <span class="text-primary-red font-black tracking-[0.35em] text-[10px] uppercase">Años de Experiencia</span>
            </div>
          </div>

        </div>
      </div><!-- /grid -->
    </div>
  </div>
  
</section>

<!-- GRID SERVICIOS -->
<section id="servicios" class="pt-8 pb-10 sm:pt-10 sm:pb-14 bg-white relative overflow-hidden">


  <!-- overlays suaves -->
  <div class="absolute inset-0 bg-[radial-gradient(circle_at_1px_1px,rgba(2,6,23,0.05)_1px,transparent_0)] [background-size:40px_40px]"></div>
  <div class="absolute inset-0 bg-gradient-to-b from-white via-white to-white/95"></div>

  <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-8">

    <!-- TITULO -->
    <div class="text-center mb-6 sm:mb-8 reveal zoom-text">
      <span class="text-primary-red font-black tracking-[0.4em] text-[10px] uppercase">
        Servicios Especializados
      </span>

      <h3 class="text-3xl md:text-4xl font-black text-navy-blue uppercase mt-3">
        Servicios que Ofrecemos
      </h3>

      <div class="w-20 h-[2px] bg-primary-red mx-auto mt-4"></div>
    </div>
    <!-- GRID -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5">


      <?php foreach ($servicios as $s): ?>
        <?php $carousel = $s["carousel"] ?? []; ?>

        <?php
        $nombre = (string)($s["nombre"] ?? "");
        $slug = slugify($nombre);
        $heroDesc = (string)($s["descripcion_larga"] ?? $s["descripcion"] ?? "");
        $img    = (string)($s["imagen"] ?? "");
        $vid    = trim((string)($s["video"] ?? ""));
        ?>

        <div
          class="service-card reveal from-bottom group relative
         h-[380px] sm:h-[420px]
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
<div class="absolute inset-0 px-3 py-4 sm:px-4 sm:py-5 flex flex-col justify-end">

            <!-- TEXTO (espacio reservado para botones) -->
            <div class="pr-2 pb-12 sm:pb-14">
              <div class="service-head transform transition-all duration-500 ease-out
    translate-y-16 group-hover:translate-y-0 group-focus-within:translate-y-0">
                <h3 class="text-lg font-black text-white uppercase leading-tight">
                  <?= e((string)($s["nombre"] ?? "")); ?>
                </h3>
              </div>

              <p class="service-desc mt-5 group-hover:mt-2 text-gray-200 text-sm leading-relaxed
    opacity-0 translate-y-3 transition-all duration-500 ease-out
    group-hover:opacity-100 group-hover:translate-y-0
    group-focus-within:opacity-100 group-focus-within:translate-y-0">
                <?= e((string)($s["descripcion"] ?? "")); ?>
              </p>
            </div>

            <!-- BOTONES FIJOS ABAJO -->
            <div class="service-cta absolute left-3 right-3 bottom-4 sm:left-4 sm:right-4 sm:bottom-5
  flex items-center gap-3 flex-wrap">

              <!-- VER SERVICIO -->
              <a href="#hero-servicios"
                class="js-hero-service border border-white/60 text-white hover:bg-white hover:text-navy-blue transition-all font-black text-[10px]
         tracking-widest uppercase py-3 px-6 rounded-sm"
                data-hero-slug="<?= e($slug); ?>"
                data-hero-title="<?= e($nombre); ?>"
                data-hero-desc="<?= e($heroDesc); ?>"
                data-hero-img="<?= e($img); ?>"
                data-hero-badge="Soluciones de alta precisión para <?= e($nombre); ?>"
                data-hero-carousel='<?= e(json_encode($carousel, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)); ?>'>
                Ver servicio
              </a>

              <!-- COTIZAR -->
              <a href="contacto.php"
                data-mobile-href="contacto.php#cotizacion-form"

                class="bg-primary-red
           hover:bg-white hover:text-navy-blue
           transition-all
           text-white font-black text-[10px]
           tracking-widest uppercase
           py-3 px-6 rounded-sm">
                Cotizar
              </a>
              <!-- FLECHA -->

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

      <?php foreach (($fallback_servicios_contenido["sectores"] ?? []) as $sec): ?>

        <div class="reveal from-bottom relative h-64 overflow-hidden group border border-slate-200 bg-deep-black">

          <img
            src="<?= e($sec["imagen"] ?? ""); ?>"
            alt="<?= e($sec["titulo"] ?? ""); ?>"
            class="absolute inset-0 w-full h-full object-cover grayscale brightness-[0.45]
                   transition-all duration-700 group-hover:scale-110 group-hover:grayscale-0" />

          <div class="absolute inset-0 bg-deep-black/70 group-hover:bg-deep-black/25
                      transition-all duration-500
                      flex flex-col items-center justify-center p-6 text-center">

            <h5 class="text-white font-black uppercase tracking-widest text-base sm:text-lg
                       transform transition-transform duration-500
                       group-hover:-translate-y-4">
              <?= e($sec["titulo"] ?? ""); ?>
            </h5>

            <p class="mt-3 text-white/85 text-xs leading-relaxed max-w-xs
                      opacity-0 translate-y-2
                      transition-all duration-500
                      group-hover:opacity-100 group-hover:translate-y-0">
              <?= e($sec["descripcion"] ?? ""); ?>
            </p>
          </div>

        </div>

      <?php endforeach; ?>

    </div>
  </div>
</section>


<section id="materiales" class="py-24 bg-[rgb(10_25_47)]">

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
    <span class="w-2 h-2 bg-primary-red"></span> Acero grado herramienta
  </li>

  <li class="flex items-center gap-3 text-sm font-bold uppercase tracking-wider text-gray-300">
    <span class="w-2 h-2 bg-primary-red"></span> Acero al carbón
  </li>

  <li class="flex items-center gap-3 text-sm font-bold uppercase tracking-wider text-gray-300">
    <span class="w-2 h-2 bg-primary-red"></span> Acero inoxidable
  </li>

  <li class="flex items-center gap-3 text-sm font-bold uppercase tracking-wider text-gray-300">
    <span class="w-2 h-2 bg-primary-red"></span> Acero aleado
  </li>

  <li class="flex items-center gap-3 text-sm font-bold uppercase tracking-wider text-gray-300">
    <span class="w-2 h-2 bg-primary-red"></span> Bronce y latón
  </li>

  <li class="flex items-center gap-3 text-sm font-bold uppercase tracking-wider text-gray-300">
    <span class="w-2 h-2 bg-primary-red"></span> Aluminio
  </li>

  <li class="flex items-center gap-3 text-sm font-bold uppercase tracking-wider text-gray-300">
    <span class="w-2 h-2 bg-primary-red"></span> Plásticos de ingeniería
  </li>

  <li class="flex items-center gap-3 text-sm font-bold uppercase tracking-wider text-gray-300">
    <span class="w-2 h-2 bg-primary-red"></span> Hierro vaciado
  </li>

</ul>

      </div>

      <div class="lg:w-1/2 relative w-full z-10">
        <div class="relative bg-navy-blue p-4 border border-white/10 shadow-2xl">
          <img
            alt="Materiales / Plano Técnico"
            class="w-full object-cover contrast-105 saturate-110"
            src="<?= e($fallback_servicios_contenido["materiales"]["imagen"] ?? ""); ?>" />
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
  /* =========================
   DESKTOP: Carrusel 3D
   ========================= */
  .carousel3d-wrap {
    perspective: 900px;
    height: 230px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .carousel3d {
    position: relative;
    width: 220px;
    height: 160px;
    transform-style: preserve-3d;
    animation: spin3d 26s linear infinite;

    --count: 4;
    --z: 190px;
  }

  .carousel3d figure {
    position: absolute;
    inset: 0;
    margin: 0;
    border-radius: 6px;
    overflow: hidden;
    border: 2px solid rgba(255, 255, 255, 0.12);
    box-shadow: 0 10px 20px -10px rgba(0, 0, 0, 0.25);
    background: transparent;

    transform: rotateY(calc((360deg / var(--count)) * var(--i))) translateZ(var(--z));
  }

  .carousel3d img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
  }

  @keyframes spin3d {
    from {
      transform: rotateY(0deg);
    }

    to {
      transform: rotateY(360deg);
    }
  }

  /* =========================
   MÓVIL: Carrusel normal auto (sin 3D)
   ========================= */
  @media (max-width: 768px) {
    

    .carousel3d-wrap {
      perspective: none;
      height: auto;
      justify-content: flex-start;
      margin-top: 4px;
      margin-bottom: 10px;
    }

    .carousel3d {
      width: 100%;
      height: auto;
      transform: none;
      transform-style: flat;
      animation: none;
      display: flex;
      gap: 0;
      padding: 0;
      overflow-x: auto;
      /* ✅ necesario para que scrollTo funcione */
      overflow-y: hidden;
      touch-action: pan-y;
      /* ✅ bloquea el swipe horizontal */
      scrollbar-width: none;
      scroll-snap-type: x mandatory;
      scroll-behavior: smooth;
      /* Firefox */
    }

    .carousel3d figure {
      position: relative;
      inset: auto;
      flex: 0 0 100%;
      max-width: 100%;
      height: 150px;
      transform: none;
      scroll-snap-align: start;

    }

    .carousel3d img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }

    .carousel3d::-webkit-scrollbar {
      display: none;
    }

    /* Chrome/Safari */
  }

 
  

  /* Cuando el card está abierto (móvil), mostrar descripción */
  /* =========================
   MÓVIL: mostrar todo fijo
   ========================= */
  html {
    scroll-behavior: smooth;
  }

  #hero-servicios.hero-pending #hero-content {
    opacity: 0;
    transform: none;
  }


  #hero-servicios #hero-content {
    transition: opacity .18s ease, transform .18s ease;
  }

  /* ✅ Mientras viene ?srv=... NO mostrar la imagen default */
  #hero-servicios.hero-pending #hero-bg-img {
    opacity: 0;
  }

  #hero-bg-img {
    transition: opacity .18s ease;
  }

  /* Si viene ?srv=... ocultamos TODO el hero al inicio */
  #hero-servicios.hero-pending {
    visibility: hidden;
    /* no se ve nada */
  }

  /* Fondo seguro para que no quede blanco */
  #hero-servicios.hero-pending::before {
    content: "";
    position: absolute;
    inset: 0;
    background: #020617;
    /* deep-black */
    visibility: visible;
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