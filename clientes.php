<?php
require_once __DIR__ . "/includes/core/db.php";
require_once __DIR__ . "/includes/core/db-safe.php";
require_once __DIR__ . "/includes/core/fallbacks.php";

// helper seguro
function e(string $v): string
{
  return htmlspecialchars($v, ENT_QUOTES, "UTF-8");
}

// 1) Traer texto de clientes desde BD (solo nombre/descripcion)
$clientes = [];
if ($pdo instanceof PDO) {
  try {
    $stmt = $pdo->query("SELECT nombre, descripcion FROM clientes ORDER BY id ASC");
    $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
  } catch (Throwable $e) {
    $clientes = [];
  }
}

// 2) Si BD falla → fallback completo
if (empty($clientes)) {
  $clientes = $fallback_clientes;
} else {
  // 3) BD OK → inyectar imagen/tag por ORDEN (no por nombre)
  foreach ($clientes as $i => &$c) {
    $c["imagen"] = $fallback_clientes[$i]["imagen"] ?? "";
    $c["tag"]    = $fallback_clientes[$i]["tag"] ?? "";
  }
  unset($c);
}

include "includes/ui/header.php";
?>

<!-- HERO CLIENTES -->
<section class="relative h-[50vh] sm:h-[55vh] flex items-center overflow-hidden bg-deep-black">
  <!-- FONDO -->
  <div class="absolute inset-0 z-0">
    <img
      alt="Fondo Industrial"
      class="w-full h-full object-cover brightness-[0.9] contrast-[1.05]"
      src="https://mspcorp.ca/wp-content/uploads/2021/12/MSPC-Blog-12-22-21-Blog.jpg" />

    <!-- Oscurecido elegante -->
    <div class="absolute inset-0 bg-gradient-to-b from-navy-blue/80 via-deep-black/60 to-deep-black/95"></div>

    <div class="industrial-grid absolute inset-0 opacity-10"></div>
  </div>

  <!-- CONTENIDO -->
  <div class="relative max-w-7xl mx-auto px-5 sm:px-8 md:px-12 w-full z-10">
    <div class="max-w-3xl reveal zoom-text">
      <div class="inline-flex items-center gap-4 mb-5 sm:mb-6">
        <div class="h-[3px ] w-10 sm:w-12 bg-primary-red"></div>
        <span class="text-primary-red font-black tracking-[0.35em] sm:tracking-[0.4em] text-[10px] sm:text-xs uppercase">
          Portafolio de Confianza
        </span>
      </div>

      <h2 class="text-3xl sm:text-5xl md:text-7xl font-black uppercase leading-[0.95] md:leading-[0.9] tracking-tighter mb-6 sm:mb-8 text-white">
        NUESTROS <br /><span class="text-primary-red">CLIENTES</span>
      </h2>

      <p class="text-base sm:text-lg md:text-xl text-gray-300 leading-relaxed font-light">
        Aliados estratégicos que confían en nuestra precisión técnica para el mantenimiento industrial y la fabricación de componentes críticos en sus procesos productivos.
      </p>
    </div>
  </div>
</section>

<!-- STATS -->
<section class="bg-white border-b border-gray-100 py-10 sm:py-12 relative z-10 shadow-sm">
  <div class="max-w-7xl mx-auto px-5 sm:px-8 md:px-12">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-12 items-center text-center md:text-left reveal zoom-text">

      <div class="flex items-center justify-center md:justify-start gap-5 sm:gap-6">
        <span class="text-5xl sm:text-6xl md:text-7xl font-black text-primary-red">
          <?= experience_decade(MSI_START_YEAR); ?>+
        </span>
        <div>
          <h3 class="text-xl sm:text-2xl font-black text-navy-blue uppercase tracking-tight">
            Años de Experiencia
          </h3>
          <p class="text-[11px] sm:text-sm font-bold text-gray-400 uppercase tracking-widest">
            Trayectoria comprobada en el mercado
          </p>
        </div>
      </div>
      <div class="flex items-center justify-center md:justify-end gap-5 sm:gap-6">
        <div class="text-center md:text-right">
          <h3 class="text-xl sm:text-2xl font-black text-navy-blue uppercase tracking-tight">
            100% Calidad
          </h3>
          <p class="text-[11px] sm:text-sm font-bold text-gray-400 uppercase tracking-widest">
            SATISFACCIÓN DEL CLIENTE GARANTIZADA
          </p>
        </div>
        <span class="material-symbols-outlined text-primary-red text-5xl sm:text-6xl">verified</span>
      </div>

    </div>
  </div>
</section>

<!-- GRID CLIENTES -->
<section class="py-20 sm:py-24 bg-gray-50 industrial-grid">
  <div class="max-w-7xl mx-auto px-5 sm:px-8 md:px-12">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8">
      <?php foreach ($clientes as $c): ?>
        <div class="client-card reveal from-bottom bg-white group border border-gray-200 hover:border-primary-red transition-all duration-300 overflow-hidden flex flex-col">
          <div class="h-44 sm:h-48 overflow-hidden relative bg-white">
            <img
              alt="<?= e((string)($c["nombre"] ?? "")); ?>"
              class="client-card-img w-full h-full object-cover"
              src="<?= e((string)($c["imagen"] ?? "")); ?>" />
            <div class="absolute inset-0 bg-navy-blue/20 group-hover:bg-transparent transition-colors"></div>
          </div>
          <div class="p-6 sm:p-8 flex flex-col flex-grow">
            <h4 class="text-base sm:text-lg font-black text-navy-blue uppercase mb-3 tracking-tight">
              <?= e((string)($c["nombre"] ?? "")); ?>
            </h4>
            <p class="text-gray-600 text-sm leading-relaxed mb-6">
              <?= e((string)($c["descripcion"] ?? "")); ?>
            </p>
            <div class="mt-auto pt-5 sm:pt-6 border-t border-gray-100">
              <span class="text-[10px] font-bold text-primary-red uppercase tracking-[0.2em]">
                <?= e((string)($c["tag"] ?? "")); ?>
              </span>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<!-- CTA (MEJORADA con imagen de fondo “estándares industriales”) -->
<section class="relative py-20 sm:py-24 text-white overflow-hidden">
  <!-- FONDO -->
  <div class="absolute inset-0 z-0">
    <img
      src="assets/img/estandares-industriales.png"
      alt="Estándares industriales y control de calidad"
      class="w-full h-full object-cover brightness-[0.85] contrast-[1.05]"
      loading="lazy"
      decoding="async"
    />
    <!-- Oscurecido elegante -->
    <div class="absolute inset-0 bg-gradient-to-b from-navy-blue/85 via-deep-black/70 to-deep-black/95"></div>

    <!-- Grid técnico -->
    <div class="industrial-grid absolute inset-0 opacity-10"></div>

    <!-- Detalles sutiles (no afectan estilo global) -->
    <div class="absolute -top-24 -left-24 w-72 h-72 bg-primary-red/10 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-24 -right-24 w-72 h-72 bg-white/5 rounded-full blur-3xl"></div>

    <!-- Línea inferior roja tipo “precision” -->
    <div class="absolute bottom-0 left-0 right-0 h-[3px] bg-primary-red/90"></div>
  </div>

  <!-- CONTENIDO -->
  <div class="max-w-7xl mx-auto px-5 sm:px-8 md:px-12 text-center relative z-10 reveal zoom-text">
    <h3 class="text-3xl sm:text-4xl md:text-5xl font-black uppercase mb-6 sm:mb-8 tracking-tight">
      ¿Listo para elevar sus <span class="text-primary-red">estándares industriales?</span>
    </h3>

    <p class="text-base sm:text-lg md:text-xl text-gray-200/80 mb-10 sm:mb-12 max-w-2xl mx-auto font-light leading-relaxed">
      Únase a nuestro portafolio de clientes satisfechos y descubra por qué somos el referente en maquinados de precisión.
    </p>

    <div class="flex flex-col md:flex-row items-center justify-center gap-4 sm:gap-6">
      <a href="servicios.php"
        class="w-full md:w-auto bg-primary-red hover:bg-red-700 text-white px-10 sm:px-12 py-3.5 sm:py-4 text-sm font-black uppercase tracking-widest transition-all inline-flex items-center justify-center gap-2">
        Ver servicios
        <span class="material-symbols-outlined text-sm">arrow_forward</span>
      </a>

      <a href="contacto.php"
        class="w-full md:w-auto border border-white/25 hover:bg-white hover:text-navy-blue text-white px-10 sm:px-12 py-3.5 sm:py-4 text-sm font-black uppercase tracking-widest transition-all text-center">
        Contáctanos
      </a>
    </div>
  </div>
</section>


<?php include "includes/ui/footer.php"; ?>