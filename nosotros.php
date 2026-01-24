<?php
include_once "includes/core/db.php";
include_once "includes/core/db-safe.php";
include_once "includes/core/fallbacks.php";
include "includes/ui/header.php";

$empresa = db_first_row(
  "SELECT historia,mision,vision
   FROM empresa
   LIMIT 1",
  [],
  $fallback_empresa
);
$historiaTxt = $empresa["historia"] ?? $fallback_empresa["historia"] ?? "";
?>

<!-- WRAPPER OSCURO PARA SOBRESCRIBIR EL BODY BLANCO DEL HEADER -->
<div class="bg-navy-blue text-white">

  <!-- HERO / HISTORIA -->
  <section class="relative min-h-[80vh] flex items-center overflow-hidden border-b border-white/10">
    <div class="flex flex-col lg:flex-row w-full min-h-[80vh]">

      <!-- IMAGEN -->
      <div class="w-full lg:w-1/2 relative h-96 lg:h-auto overflow-hidden">
        <img
          src="https://thumbs.dreamstime.com/b/hombre-de-ingenier%C3%ADa-que-lleva-uniforme-trabajadores-seguridad-realizar-el-mantenimiento-en-la-f%C3%A1brica-m%C3%A1quina-torno-metal-216109790.jpg"
          alt="Taller industrial de alta precisión"
          class="nosotros-hero-img absolute inset-0 w-full h-full object-cover brightness-[0.9] contrast-[1.05]" />
        <div class="absolute inset-0 bg-gradient-to-r from-navy-blue/50 to-navy-blue"></div>

        <!-- BADGE (SUBIDO MÁS ARRIBA) -->
        <div class="absolute bottom-6 left-5 right-5 sm:bottom-12 sm:left-10 sm:right-10 md:bottom-24 md:left-12 md:right-12">
  <div class="reveal from-left bg-primary-red/90 backdrop-blur-md p-4 sm:p-5 inline-block rounded-sm">
  <p class="text-white font-black text-xl sm:text-2xl uppercase leading-none">Desde 1994</p>

            <p class="text-white/80 text-[11px] font-bold uppercase tracking-widest mt-1">
              Liderazgo Industrial
            </p>
          </div>
        </div>
      </div>

      <!-- TEXTO -->
      <div class="reveal from-right w-full lg:w-1/2 bg-navy-blue px-6 py-10 sm:px-10 sm:py-14 md:px-12 md:py-16 lg:px-20 lg:py-20 flex flex-col justify-center">


        <div class="flex items-center gap-4 mb-6">
          <div class="h-[3px] w-14 bg-primary-red"></div>
          <span class="text-primary-red font-black tracking-[0.35em] text-[10px] uppercase">
            Trayectoria de Excelencia
          </span>
        </div>

        <h1 class="text-2xl sm:text-3xl md:text-5xl font-black uppercase leading-[1.05] sm:leading-[0.95] tracking-tighter mb-5 sm:mb-6">
          Nuestra Historia <br />
          & <span class="text-primary-red">Experiencia</span>
        </h1>
        <p class="text-base md:text-lg text-gray-300 leading-relaxed font-light max-w-xl">
          <?php echo nl2br(htmlspecialchars($historiaTxt)); ?>
        </p>
      </div>
    </div>
  </section>

  <!-- AÑOS DE EXPERIENCIA (DINÁMICO POR DÉCADAS) -->
  <section class="py-16 bg-navy-blue border-b border-white/10">
    <div class="max-w-7xl mx-auto px-5 sm:px-8 lg:px-12 flex flex-col md:flex-row items-start md:items-center justify-between gap-12">

      <div class="reveal flex items-center gap-8">
        <span class="text-6xl sm:text-7xl lg:text-8xl font-black select-none
               bg-gradient-to-b from-white/40 via-white/20 to-white/5
               bg-clip-text text-transparent
               drop-shadow-[0_6px_20px_rgba(255,255,255,0.15)]">
          <?= experience_decade(MSI_START_YEAR); ?>+
        </span>

        <div class="border-l-4 border-primary-red pl-6">
          <h3 class="text-4xl font-black uppercase leading-tight tracking-tight text-white">
            Más de <?= experience_decade(MSI_START_YEAR); ?> años
          </h3>

          <p class="text-sm font-bold text-gray-300 uppercase tracking-widest mt-2">
            liderando la industria de precisión
          </p>
        </div>
      </div>

        <div class="reveal flex items-center gap-4 sm:gap-6 bg-deep-black/50 border border-white/10 py-5 sm:py-6 px-6 sm:px-10 rounded-sm w-full md:w-auto">


<span class="material-symbols-outlined text-primary-red text-4xl sm:text-5xl">verified_user</span>
        <div>
          <p class="text-xs font-black text-primary-red uppercase tracking-[0.2em] mb-1">
            Certificación Total
          </p>
          <p class="text-base font-bold text-white uppercase tracking-wider">
            Confianza & Calidad <br />Garantizada
          </p>
        </div>
      </div>

    </div>
  </section>

  <!-- MISIÓN / VISIÓN -->
  <section class="relative py-28 bg-white overflow-hidden">

    <!-- Fondo técnico decorativo -->
    <div class="absolute inset-0 blueprint-overlay opacity-5"></div>

    <div class="relative max-w-7xl mx-auto px-5 sm:px-8 lg:px-12 grid lg:grid-cols-2 gap-10 lg:gap-20 z-10">

      <!-- MISIÓN -->
      <!-- MISIÓN -->
      <article class="reveal from-left relative bg-white border border-border-navy/20 p-16 rounded-sm shadow-2xl">


        <span class="absolute -top-5 left-10 bg-primary-red text-white text-[10px] font-black uppercase tracking-widest px-4 py-1">
          Nuestro Propósito
        </span>

        <!-- ✅ corregido -->
        <h3 class="text-3xl sm:text-4xl md:text-5xl  font-black uppercase text-navy-blue mb-8 leading-tight">
          Misión
        </h3>

        <p class="text-navy-blue/80 text-base sm:text-lg leading-relaxed font-medium">
          <?php echo nl2br(htmlspecialchars($empresa["mision"] ?? "")); ?>
        </p>
        <div class="mt-10 h-1 w-20 bg-primary-red"></div>
      </article>
      <!-- VISIÓN -->
      <article class="reveal from-right relative bg-white border border-border-navy/20 p-16 rounded-sm shadow-2xl">
        <span class="absolute -top-5 left-10 bg-primary-red text-white text-[10px] font-black uppercase tracking-widest px-4 py-1">
          Nuestra Meta
        </span>
        <!-- ✅ corregido -->
        <h3 class="text-3xl sm:text-4xl md:text-5xl  font-black uppercase text-navy-blue mb-8 leading-tight">
          Visión
        </h3>

        <p class="text-navy-blue/80 text-base sm:text-lg leading-relaxed font-medium">
          <?php echo nl2br(htmlspecialchars($empresa["vision"] ?? "")); ?>
        </p>


        <div class="mt-10 h-1 w-20 bg-primary-red"></div>
      </article>

    </div>
  </section>

  <!-- CAPACIDADES -->
  <section class="py-24 bg-navy-blue border-t border-white/10">
    <div class="max-w-7xl mx-auto px-5 sm:px-8 lg:px-12 grid lg:grid-cols-2 gap-10 lg:gap-20">

      <!-- BLOQUE IZQUIERDO (ZOOM) -->
      <div class="reveal zoom-text">
<h2 class="text-3xl sm:text-4xl lg:text-5xl font-black uppercase mb-6 sm:mb-10 text-white">
          Capacidades de <span class="text-primary-red">Ingeniería Avanzada</span>
        </h2>
<p class="text-base sm:text-lg lg:text-xl text-gray-300">
          Infraestructura para fabricar componentes complejos con tolerancias mínimas.
        </p>
      </div>

      <!-- BLOQUE DERECHO (ZOOM) -->
      <div class="reveal zoom-text bg-deep-black/50 border border-white/10 p-12 rounded-sm border-t-4 border-primary-red">
        <h4 class="text-primary-red font-black uppercase tracking-widest mb-8">
          Portafolio de Componentes
        </h4>
        <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4 text-xs sm:text-sm uppercase font-bold text-gray-300">

          <li>Sinfines y Coronas</li>
          <li>Piñones</li>
          <li>Engranes Rectos</li>
          <li>Engranes Helicoidales</li>
          <li>Ejes y Flechas</li>
          <li>Rodillos Industriales</li>
          <li>Coples y Bridas</li>
          <li>Pernos Especiales</li>
          <li>Herramentales</li>
          <li>Refacciones a Medida</li>
        </ul>
      </div>

    </div>
  </section>
</div>
<?php include "includes/ui/footer.php"; ?>