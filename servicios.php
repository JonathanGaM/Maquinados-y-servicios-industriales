

<?php
require_once __DIR__ . "/includes/core/fallbacks.php";
require_once __DIR__ . "/includes/core/db.php";

$servicios = [];

/* Escape helper */
function e(string $v): string {
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

<!-- HERO / PORTADA SERVICIOS -->
<section class="relative min-h-[60vh] sm:min-h-[70vh] flex items-center pt-16 pb-24 sm:pb-32 overflow-hidden">

  <div class="absolute inset-0 z-0">
    <img
      alt="Fondo Industrial"
      class="w-full h-full object-cover grayscale brightness-[0.3]"
      src="https://www.mobil.com.mx/lubricantes/-/media/project/wep/mobil/mobil-mx/blog-industrial/engranes/fs-sm.jpg" />
    <div class="absolute inset-0 bg-gradient-to-b from-navy-blue/80 to-deep-black/95"></div>
    <div class="industrial-grid absolute inset-0 opacity-10"></div>
  </div>

  <div class="reveal zoom-text max-w-7xl mx-auto px-5 sm:px-8 relative z-10 w-full">
    <div class="flex flex-col items-center text-center">

      <p class="text-primary-red font-bold tracking-[0.28em] text-xs uppercase mb-3 bg-primary-red/10 px-4 py-1 inline-block border-x border-primary-red/30">
        ¿Buscas un servicio especializado?
      </p>

      <h2 class="text-3xl md:text-5xl font-black uppercase leading-none tracking-tight mb-6 text-white">
        Nuestros <span class="text-primary-red">Servicios</span>
      </h2>

      <p class="text-base sm:text-lg md:text-xl text-gray-300 max-w-4xl mx-auto leading-relaxed font-light mb-10">
        Maquinados y Servicios Industriales es una empresa dedicada al mantenimiento industrial. Ofrecemos soluciones integrales de manufactura con tecnología de vanguardia y personal altamente calificado para cumplir con los estándares más exigentes.
      </p>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 w-full max-w-4xl border-y border-white/10 py-4">
        <div class="flex flex-col items-center group">
          <span class="text-3xl sm:text-4xl md:text-5xl font-black text-white tracking-tight mb-0 group-hover:text-primary-red transition-colors">
            100%
          </span>
          <span class="text-primary-red font-black tracking-[0.45em] text-[11px] uppercase">
            Calidad Garantizada
          </span>
        </div>

        <div class="flex flex-col items-center group">
          <span class="text-3xl sm:text-4xl md:text-5xl font-black text-white tracking-tight mb-0 group-hover:text-primary-red transition-colors">
            <?= experience_decade(MSI_START_YEAR); ?>+
          </span>
          <span class="text-primary-red font-black tracking-[0.45em] text-[11px] uppercase">
            Años de Experiencia
          </span>
        </div>
      </div>

      <div class="mt-8 flex flex-col sm:flex-row gap-4">
        <a href="#servicios"
          class="px-7 py-3 text-[11px] font-black uppercase tracking-widest border border-white/20 text-white bg-white/0
                 hover:bg-primary-red hover:border-primary-red transition-all w-full sm:w-auto text-center">
          Servicios que ofrecemos
        </a>

        <a href="#sectores"
          class="px-7 py-3 text-[11px] font-black uppercase tracking-widest border border-white/20 text-white bg-white/0
                 hover:bg-primary-red hover:border-primary-red transition-all w-full sm:w-auto text-center">
          Sectores que atendemos
        </a>

        <a href="#materiales"
          class="px-7 py-3 text-[11px] font-black uppercase tracking-widest border border-white/20 text-white bg-white/0
                 hover:bg-primary-red hover:border-primary-red transition-all w-full sm:w-auto text-center">
          Capacidades materiales
        </a>
      </div>

    </div>
  </div>
</section>

<!-- GRID SERVICIOS -->
<section id="servicios" class="py-24 sm:py-32 bg-navy-blue relative overflow-hidden">

  <div class="absolute inset-0 industrial-grid opacity-10"></div>
  <div class="absolute inset-0 bg-gradient-to-b from-navy-blue via-navy-blue/95 to-deep-black/90"></div>

  <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-8">

    <div class="text-center mb-16 reveal zoom-text">
      <span class="text-primary-red font-black tracking-[0.4em] text-[10px] uppercase">
        Servicios Especializados
      </span>

      <h3 class="text-4xl md:text-5xl font-black text-white uppercase mt-4">
        Servicios que Ofrecemos
      </h3>

      <div class="w-24 h-[2px] bg-primary-red mx-auto mt-6"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

      <?php foreach ($servicios as $s): ?>
        <?php $videoSrc = trim((string)($s["video"] ?? "")); ?>

        <div
          class="service-card reveal from-bottom group relative h-[460px] sm:h-[520px] overflow-hidden
                 border border-white/10 bg-deep-black shadow-2xl">

          <!-- IMAGEN (fallback) -->
          <img
            alt="<?= e((string)($s["nombre"] ?? "")); ?>"
            class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
            src="<?= e((string)($s["imagen"] ?? "")); ?>" />

          <?php if ($videoSrc !== ""): ?>
            <!-- VIDEO (hover) -->
          <video
  class="service-video absolute inset-0 w-full h-full object-cover opacity-0 pointer-events-none transition-opacity duration-300"
  muted
  loop
  playsinline
  preload="none"
  data-src="<?= e($videoSrc); ?>">
</video>

          <?php endif; ?>

          <!-- OVERLAY -->
          <div class="absolute inset-0 bg-gradient-to-t from-deep-black/95 via-navy-blue/70 to-navy-blue/30"></div>

          <!-- CONTENIDO -->
          <div class="absolute inset-0 p-6 sm:p-10 flex flex-col justify-end">
            <span class="material-symbols-outlined text-primary-red text-4xl mb-6">
              precision_manufacturing
            </span>

            <h3 class="text-2xl font-black text-white uppercase mb-4 leading-tight">
              <?= e((string)($s["nombre"] ?? "")); ?>
            </h3>

            <p class="text-gray-300 text-sm leading-relaxed mb-8">
              <?= e((string)($s["descripcion"] ?? "")); ?>
            </p>

            <a href="contacto.php"
              class="bg-primary-red hover:bg-white hover:text-navy-blue transition-all
                     text-white font-black text-[10px] tracking-widest uppercase
                     py-3 px-6 sm:py-4 sm:px-8 self-start rounded-sm">
              Cotizar
            </a>
          </div>
        </div>
      <?php endforeach; ?>

    </div>
  </div>
</section>
<section id="sectores" class="py-24 bg-white relative overflow-hidden">

  <!-- overlays (todo inline) -->
  <div class="absolute inset-0 bg-[radial-gradient(circle_at_1px_1px,rgba(2,6,23,0.06)_1px,transparent_0)] [background-size:40px_40px]"></div>
  <div class="absolute inset-0 bg-gradient-to-b from-white via-white to-white/95"></div>


  <div class="max-w-7xl mx-auto px-5 sm:px-8 relative z-10">
    <div class="text-center mb-16">
      <span class="text-primary-red font-black tracking-[0.4em] text-[10px] uppercase">
        Mercados Atendidos
      </span>
      <h3 class="text-4xl md:text-5xl font-black text-navy-blue uppercase mt-4">
        Sectores que Atendemos
      </h3>
      <div class="w-24 h-[2px] bg-primary-red mx-auto mt-6"></div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

      <!-- Automotriz -->
      <div class="reveal from-bottom relative h-64 overflow-hidden group border border-slate-200 bg-deep-black">
        <img
          alt="Automotriz"
          class="absolute inset-0 w-full h-full object-cover grayscale brightness-[0.45] transition-all duration-700 group-hover:scale-110 group-hover:grayscale-0"
          src="https://cdn.club-magazin.autodoc.de/uploads/sites/11/2020/12/motor-de-combustion-interna-de-un-automovil.jpg" />
        <div class="absolute inset-0 bg-deep-black/70 group-hover:bg-deep-black/20 transition-all duration-500 flex flex-col items-center justify-center p-6">
          <span class="material-symbols-outlined text-4xl mb-4 text-white">directions_car</span>
          <h5 class="text-white font-black uppercase tracking-widest text-base sm:text-lg">Automotriz</h5>
        </div>
      </div>

      <!-- Aeronáutica -->
      <div class="reveal from-bottom relative h-64 overflow-hidden group border border-slate-200 bg-deep-black">
        <img
          alt="Aeronáutica"
          class="absolute inset-0 w-full h-full object-cover grayscale brightness-[0.45] transition-all duration-700 group-hover:scale-110 group-hover:grayscale-0"
          src="https://us.123rf.com/450wm/andose24/andose241709/andose24170900011/86109270-tren-de-aterrizaje.jpg?ver=6" />
        <div class="absolute inset-0 bg-deep-black/70 group-hover:bg-deep-black/20 transition-all duration-500 flex flex-col items-center justify-center p-6">
          <span class="material-symbols-outlined text-4xl mb-4 text-white">flight</span>
          <h5 class="text-white font-black uppercase tracking-widest text-base sm:text-lg">Aeronáutica</h5>
        </div>
      </div>

      <!-- Metal-Mecánica -->
      <div class="reveal from-bottom relative h-64 overflow-hidden group border border-slate-200 bg-deep-black">
        <img
          alt="Metal-Mecánica"
          class="absolute inset-0 w-full h-full object-cover grayscale brightness-[0.45] transition-all duration-700 group-hover:scale-110 group-hover:grayscale-0"
          src="https://www.rapiddirect.com/wp-content/uploads/2023/10/5-axis-cnc-machining-process.webp" />
        <div class="absolute inset-0 bg-deep-black/70 group-hover:bg-deep-black/20 transition-all duration-500 flex flex-col items-center justify-center p-6">
          <span class="material-symbols-outlined text-4xl mb-4 text-white">factory</span>
          <h5 class="text-white font-black uppercase tracking-widest text-base sm:text-lg">Metal-Mecánica</h5>
        </div>
      </div>

      <!-- Alimenticia -->
      <div class="reveal from-bottom relative h-64 overflow-hidden group border border-slate-200 bg-deep-black">
        <img
          alt="Alimenticia"
          class="absolute inset-0 w-full h-full object-cover grayscale brightness-[0.45] transition-all duration-700 group-hover:scale-110 group-hover:grayscale-0"
          src="https://www.rrhhdigital.com/wp-content/uploads/userfiles/fabrica-alimentacion-comida.jpg" />
        <div class="absolute inset-0 bg-deep-black/70 group-hover:bg-deep-black/20 transition-all duration-500 flex flex-col items-center justify-center p-6">
          <span class="material-symbols-outlined text-4xl mb-4 text-white">restaurant</span>
          <h5 class="text-white font-black uppercase tracking-widest text-base sm:text-lg">Alimenticia</h5>
        </div>
      </div>

      <!-- Agrícola -->
      <div class="reveal from-bottom relative h-64 overflow-hidden group border border-slate-200 bg-deep-black">
        <img
          alt="Agrícola"
          class="absolute inset-0 w-full h-full object-cover grayscale brightness-[0.45] transition-all duration-700 group-hover:scale-110 group-hover:grayscale-0"
          src="https://www.spmas.es/wp-content/uploads/2023/03/Post-3-PRL-Sector-Agricola.jpg" />
        <div class="absolute inset-0 bg-deep-black/70 group-hover:bg-deep-black/20 transition-all duration-500 flex flex-col items-center justify-center p-6">
          <span class="material-symbols-outlined text-4xl mb-4 text-white">agriculture</span>
          <h5 class="text-white font-black uppercase tracking-widest text-base sm:text-lg">Agrícola</h5>
        </div>
      </div>
     
      <!-- Electrónica -->
      <div class="reveal from-bottom relative h-64 overflow-hidden group border border-slate-200 bg-deep-black">
        <img
          alt="Electrónica"
          class="absolute inset-0 w-full h-full object-cover grayscale brightness-[0.45] transition-all duration-700 group-hover:scale-110 group-hover:grayscale-0"
          src="https://www.vencoel.com/wp-content/uploads/2023/11/normativas-electronica.jpg" />
        <div class="absolute inset-0 bg-deep-black/70 group-hover:bg-deep-black/20 transition-all duration-500 flex flex-col items-center justify-center p-6">
          <span class="material-symbols-outlined text-4xl mb-4 text-white">memory</span>
          <h5 class="text-white font-black uppercase tracking-widest text-base sm:text-lg">Electrónica</h5>
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


<?php include "includes/ui/footer.php"; ?>
