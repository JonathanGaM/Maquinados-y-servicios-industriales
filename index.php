<!-- index.php-->

<?php
require_once __DIR__ . "/includes/core/fallbacks.php";
require_once __DIR__ . "/includes/ui/header.php";

// ✅ Inyectamos el “diccionario” de imágenes para JS
$MEDIA = $fallback_media ?? [];

?>
<script>
  window.MSI_MEDIA = <?= json_encode($MEDIA, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>;
</script>



<!-- ✅ SECUENCIA HERO (FONDO -> TITULO -> TEXTO+BOTONES) -->
<link rel="stylesheet" href="assets/css/hero-animacione.css">
<link rel="stylesheet" href="assets/css/hero-estilos.css">
<section id="hero" class="relative min-h-[90vh] flex items-center overflow-hidden bg-deep-black">
  <!-- FONDO -->
  <div id="hero-bg-wrap" class="absolute inset-0 z-0">

    <div class="absolute inset-0 z-10 bg-gradient-to-r from-black/75 via-black/60 to-transparent"></div>

    <!-- Capa actual (imagen inicial del carrusel) -->
    <img
      id="hero-bg-a"
      class="hero-bg-layer is-active"
      alt="Industrial background"
      src="<?= htmlspecialchars(($fallback_media['hero']['carousel'][0] ?? ''), ENT_QUOTES, 'UTF-8') ?>" />

    <!-- Capa siguiente (arranca invisible) -->
    <img
      id="hero-bg-b"
      class="hero-bg-layer"
      alt=""
      src="" />

  </div>

  <!-- CONTENIDO -->
  <div class="relative z-20 max-w-7xl mx-auto px-5 sm:px-8 w-full">
    <div class="max-w-3xl text-left -mt-12 sm:-mt-10">
      <div class="inline-flex items-center gap-3 mb-6 justify-start">
        <div class="h-[2px] w-12 bg-primary-red"></div>
        <span class="text-white font-bold tracking-[0.28em] text-xs sm:text-sm uppercase">
          Estándar Industrial de Excelencia
        </span>

      </div>
      <?php
      function e(string $v): string
      {
        return htmlspecialchars($v, ENT_QUOTES, "UTF-8");
      }

      $nombre = trim((string)($empresa['nombre'] ?? $fallback_empresa['nombre']));

      // ✅ si empieza con "Maquinados y " entonces forzamos 2 líneas bonitas
      if (stripos($nombre, 'Maquinados y ') === 0) {
        $linea1 = 'Maquinados y';
        $linea2 = trim(substr($nombre, strlen('Maquinados y ')));
      } else {
        // ✅ igual que el header: 2 líneas por espacio
        $partes = explode(' ', $nombre, 2);
        $linea1 = $partes[0] ?? '';
        $linea2 = $partes[1] ?? '';
      }
      ?>
      <h1 class="font-extrabold uppercase leading-tight tracking-tight mb-6
           text-3xl sm:text-4xl md:text-6xl lg:text-7xl">
        <span class="text-white">SOLUCIONES DE</span>
        <span class="text-primary-red"> PRECISIÓN INDUSTRIAL</span>
      </h1>




      <!-- ✅ TEXTO + BOTONES (aparecen al final juntos) -->
      <div class="hero-surround">

        <!-- ✅ Texto que cambiará -->

        <p
          id="hero-rotating-text"
          class="text-sm sm:text-base md:text-xl text-gray-200 mb-6 sm:mb-10 max-w-xl font-medium leading-relaxed">
        </p>

        <!-- ✅ Botones -->
        <div class="flex flex-col sm:flex-row flex-wrap gap-3 sm:gap-4 justify-start">
          <a href="servicios.php"
            class="hero-cta bg-primary-red hover:bg-red-700
px-5 py-3 sm:px-8 sm:py-4
text-xs sm:text-sm
font-bold uppercase tracking-widest rounded-sm
flex items-center justify-center gap-2
text-white transition-all shadow-xl shadow-red-900/40
w-full sm:w-auto">
            NUESTROS SERVICIOS
            <span class="material-symbols-outlined text-sm">arrow_forward</span>
          </a>

          <a href="#infraestructura"
            class="hero-cta border-2 border-white hover:bg-white hover:text-navy-blue
px-5 py-3 sm:px-8 sm:py-4
text-xs sm:text-sm
font-bold uppercase tracking-widest rounded-sm
transition-all text-white inline-flex justify-center
w-full sm:w-auto">
            Ver Catálogo
          </a>
        </div>
      </div>
    </div>
  </div>
  </div>

  <!-- DETALLE DECORATIVO -->
  <div class="absolute bottom-10 right-10 hidden xl:block">
    <div class="flex items-end gap-2 text-primary-red">
      <div class="w-1.5 h-16 bg-primary-red"></div>
      <div class="w-1.5 h-10 bg-primary-red/60"></div>
      <div class="w-1.5 h-6 bg-primary-red/30"></div>
      <span class="text-[12px] uppercase tracking-[0.5em] font-black ml-4 text-white/50 rotate-90 origin-left">
        PRECISION CORE
      </span>
    </div>
  </div>
</section>
<section class="py-16 sm:py-20 lg:py-24 bg-gray-50 relative">
  <div class="max-w-7xl mx-auto px-5 sm:px-8 relative z-10">

    <!-- GRID PRINCIPAL -->
    <div class="grid lg:grid-cols-[0.9fr_1.1fr] gap-10 lg:gap-16 items-start lg:min-h-[110vh]">

      <!-- IZQUIERDA -->
      <div class="relative reveal from-left lg:sticky lg:top-32 self-start">

        <!-- Marco decorativo -->
        <div class="absolute -top-8 -left-8 w-40 h-40 border-t-4 border-l-4 border-gray-300"></div>

        <!-- Imagen con marco -->
        <div class="border-4 border-gray-300 p-2 bg-white shadow-lg">
          <img
            alt="Equipo técnico trabajando en maquinado de precisión"
            class="aspect-[4/3] object-cover w-full"
            src="<?= htmlspecialchars(($fallback_media['home']['liderazgo'] ?? ''), ENT_QUOTES, 'UTF-8') ?>" />
        </div>

        <!-- CUADRO ROJO -->
<!-- CUADRO ROJO -->
<div class="
  absolute
  bottom-[-2.5rem] sm:-bottom-4
  right-3 sm:-right-6
  bg-primary-red
  p-2 sm:p-4
  shadow-xl
">
          <div class="text-center text-white">
<span class="block text-xl sm:text-3xl font-black leading-none">
              <?= experience_decade(MSI_START_YEAR); ?>+
            </span>
            <span class="text-[10px] sm:text-[11px] uppercase tracking-widest font-bold leading-tight">
              Años liderando la industria<br class="hidden sm:block" /> de precisión en GDL
            </span>
          </div>
        </div>
      </div>

      <!-- DERECHA -->
<div class="reveal from-right mt-6 sm:mt-0">

        <h2 class="text-3xl sm:text-4xl md:text-5xl font-black uppercase mb-5 leading-tight text-navy-blue">
          ¿Por qué <span class="text-primary-red">elegirnos?</span>
        </h2>

        <p class="text-gray-700 text-base sm:text-lg mb-8 leading-relaxed max-w-2xl">
          Combinamos experiencia técnica y precisión para entregar piezas críticas con calidad comprobada,
          asegurando continuidad operativa y resultados confiables.
        </p>

        <!-- CARDS -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-10">

          <!-- Card -->
          <div class="bg-gray-100 border border-gray-200 p-5 space-y-3">
            <h4 class="flex items-center gap-3 font-bold uppercase text-[15px] tracking-wider text-navy-blue">
              <span>Calidad Comprobada</span>
              <span class="material-symbols-outlined text-primary-red text-2xl ml-auto">engineering</span>
            </h4>
            <p class="text-sm text-gray-700 leading-relaxed">
              Procesos controlados y enfoque en detalles para resultados confiables.
            </p>
          </div>

          <div class="bg-gray-100 border border-gray-200 p-5 space-y-3">
            <h4 class="flex items-center gap-3 font-bold uppercase text-[15px] tracking-wider text-navy-blue">
              <span>Respuesta Rápida</span>
              <span class="material-symbols-outlined text-primary-red text-2xl ml-auto">bolt</span>
            </h4>
            <p class="text-sm text-gray-700 leading-relaxed">
              Atención ágil para mantener la operación en marcha.
            </p>
          </div>

          <div class="bg-gray-100 border border-gray-200 p-5 space-y-3">
            <h4 class="flex items-center gap-3 font-bold uppercase text-[15px] tracking-wider text-navy-blue">
              <span>Herramientas de Calidad</span>
              <span class="material-symbols-outlined text-primary-red text-2xl ml-auto">construction</span>
            </h4>
            <p class="text-sm text-gray-700 leading-relaxed">
              Maquinaria confiable para acabados profesionales.
            </p>
          </div>

          <div class="bg-gray-100 border border-gray-200 p-5 space-y-3">
            <h4 class="flex items-center gap-3 font-bold uppercase text-[15px] tracking-wider text-navy-blue">
              <span>Atención Personalizada</span>
              <span class="material-symbols-outlined text-primary-red text-2xl ml-auto">support_agent</span>
            </h4>
            <p class="text-sm text-gray-700 leading-relaxed">
              Acompañamiento técnico de inicio a fin.
            </p>
          </div>

          <div class="bg-gray-100 border border-gray-200 p-5 space-y-3">
            <h4 class="flex items-center gap-3 font-bold uppercase text-[15px] tracking-wider text-navy-blue">
              <span>Precisión Milimétrica</span>
              <span class="material-symbols-outlined text-primary-red text-2xl ml-auto">straighten</span>
            </h4>
            <p class="text-sm text-gray-700 leading-relaxed">
              Tolerancias exactas para componentes críticos.
            </p>
          </div>

          <div class="bg-gray-100 border border-gray-200 p-5 space-y-3">
            <h4 class="flex items-center gap-3 font-bold uppercase text-[15px] tracking-wider text-navy-blue">
              <span>Sectores y Metales</span>
              <span class="material-symbols-outlined text-primary-red text-2xl ml-auto">factory</span>
            </h4>
            <p class="text-sm text-gray-700 leading-relaxed">
              Experiencia en múltiples industrias y materiales.
            </p>
          </div>

        </div>

        <!-- CTA -->
        <a href="nosotros.php"
          class="inline-flex items-center gap-2 border-2 border-navy-blue
                 px-6 py-3 text-sm font-bold uppercase tracking-widest
                 text-navy-blue hover:bg-navy-blue hover:text-white
                 transition-all">
          Conocer más
          <span class="material-symbols-outlined text-sm">read_more</span>
        </a>

      </div>
    </div>
  </div>
</section>





<section id="infraestructura" class="py-24 bg-industrial-white">
  <div class="max-w-7xl mx-auto px-5 sm:px-8">

    <div class="flex flex-col md:flex-row justify-between md:items-baseline mb-10 md:mb-16 border-b-2 border-navy-blue pb-5 md:pb-6">
      <div>
        <h2 class="text-primary-red font-black tracking-[0.3em] text-xs uppercase mb-2">INFRAESTRUCTURA TÉCNICA</h2>
      </div>
      <p class="text-navy-blue/60 font-medium uppercase tracking-widest text-[10px] sm:text-xs md:text-sm mt-3 md:mt-0">Maquinaria de última generación</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-12 gap-6">

      <div class="md:col-span-8 group relative overflow-hidden bg-navy-blue min-h-[450px]">
        <img alt="Operator carefully performing tasks on a conventional lathe"
          class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000"
          src="<?= htmlspecialchars(($fallback_media['infraestructura']['torno_convencional'] ?? ''), ENT_QUOTES, 'UTF-8') ?>" />
        <div class="absolute inset-0 bg-navy-blue/40 group-hover:bg-navy-blue/20 transition-colors"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-deep-black via-transparent to-transparent"></div>
        <div class="absolute bottom-0 left-0 p-6 sm:p-8 md:p-10">
          <span class="bg-primary-red text-white px-3 py-1 font-bold text-[10px] tracking-widest uppercase mb-4 inline-block">Manufactura Robusta</span>
          <h4 class="text-2xl sm:text-3xl md:text-4xl font-black uppercase text-white mb-3 sm:mb-4">
            Torno Convencional</h4>
          <p class="text-gray-200 max-w-md opacity-100 sm:opacity-0 sm:group-hover:opacity-100 transition-opacity duration-500 text-sm sm:text-base">
            Maquinados de gran escala con precisión micrométrica para ejes y componentes estructurales.
          </p>
        </div>
      </div>

      <div class="md:col-span-4 group relative overflow-hidden bg-navy-blue min-h-[450px]">
        <img alt="Operator carefully performing tasks on a CNC machining center"
          class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000"
          src="<?= htmlspecialchars(($fallback_media['infraestructura']['maquinado_cnc'] ?? ''), ENT_QUOTES, 'UTF-8') ?>" />
        <div class="absolute inset-0 bg-navy-blue/40"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-deep-black via-transparent to-transparent"></div>
        <div class="absolute bottom-0 left-0 p-6 sm:p-8 md:p-10">
          <span class="bg-primary-red text-white px-3 py-1 font-bold text-[10px] tracking-widest uppercase mb-4 inline-block">Tecnología CNC</span>
          <h4 class="text-2xl sm:text-3xl md:text-4xl font-black uppercase text-white mb-3 sm:mb-4">
            Maquinado CNC</h4>
        </div>
      </div>

      <div class="md:col-span-4 group relative overflow-hidden bg-navy-blue min-h-[450px]">
        <img alt="Welder actively joining large metal components with sparks"
          class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000"
          src="<?= htmlspecialchars(($fallback_media['infraestructura']['retificado'] ?? ''), ENT_QUOTES, 'UTF-8') ?>" />
        <div class="absolute inset-0 bg-navy-blue/40"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-deep-black via-transparent to-transparent"></div>
        <div class="absolute bottom-0 left-0 p-6 sm:p-8 md:p-10">
          <span class="bg-primary-red text-white px-3 py-1 font-bold text-[10px] tracking-widest uppercase mb-4 inline-block">Alta Precisión</span>
          <h4 class="text-2xl sm:text-3xl md:text-4xl font-black uppercase text-white mb-3 sm:mb-4">
            Retificado</h4>
        </div>
      </div>

      <div class="md:col-span-8 group relative overflow-hidden bg-navy-blue min-h-[450px]">
        <img alt="Precision engineer overseeing intricate work on a milling machine"
          class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000"
          src="<?= htmlspecialchars(($fallback_media['infraestructura']['fresadora_universal'] ?? ''), ENT_QUOTES, 'UTF-8') ?>" />
        <div class="absolute inset-0 bg-navy-blue/40"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-deep-black via-transparent to-transparent"></div>
        <div class="absolute bottom-0 left-0 p-6 sm:p-8 md:p-10">
          <span class="bg-primary-red text-white px-3 py-1 font-bold text-[10px] tracking-widest uppercase mb-4 inline-block">Corte de Alta Precisión</span>
          <h4 class="text-2xl sm:text-3xl md:text-4xl font-black uppercase text-white mb-3 sm:mb-4">
            Fresadora Universal</h4>
          <p class="text-gray-200 max-w-md opacity-100 sm:opacity-0 sm:group-hover:opacity-100 transition-opacity duration-500 text-sm sm:text-base">
            Capacidad para tallado de engranes y superficies complejas en todo tipo de aleaciones.
          </p>

          <a href="servicios.php#servicios"
            class="flex items-center gap-2 sm:gap-3 text-primary-red font-black text-xs sm:text-sm md:text-base uppercase tracking-widest hover:text-white transition-colors mt-3">
            <span>Ver más</span>
            <span class="material-symbols-outlined text-base md:text-lg">arrow_forward</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-20 bg-white border-y border-gray-200 overflow-hidden">
  <div class="max-w-7xl mx-auto px-5 sm:px-8 mb-10 sm:mb-12">
    <h4 class="text-center text-primary-red font-bold text-sm uppercase tracking-[0.45em]">
      Socios Estratégicos
    </h4>
  </div>

  <div class="relative w-full overflow-hidden">
    <div class="flex items-center gap-14 sm:gap-24 lg:gap-32 animate-logo-scroll px-6 sm:px-10">

      <?php
      // ✅ SOLO CLIENTES (fallback) — sin BD
      $logos = [];

      foreach (($fallback_clientes ?? []) as $c) {
        $img = trim((string)($c['imagen'] ?? ''));
        if ($img !== '') $logos[] = $img;
      }

      // ✅ duplicamos para scroll infinito
      $logos = array_merge($logos, $logos);

      foreach ($logos as $src):
      ?>
        <img
          src="<?= htmlspecialchars($src, ENT_QUOTES, 'UTF-8') ?>"
          class="h-10 sm:h-12 object-contain transition"

          alt=""
          loading="lazy"
          decoding="async" />
      <?php endforeach; ?>

    </div>
  </div>
</section>

<?php include "includes/ui/footer.php"; ?>