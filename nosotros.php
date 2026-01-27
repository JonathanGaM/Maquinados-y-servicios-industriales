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
  <!-- HERO / HISTORIA -->
  <section class="relative overflow-hidden border-b border-white/10">
    <div class="relative w-full lg:flex lg:min-h-[80vh]">

      <!-- IMAGEN -->
      <div class="relative w-full lg:w-1/2 min-h-[86vh] lg:min-h-[80vh] overflow-hidden">
        <img
          src="https://thumbs.dreamstime.com/b/hombre-de-ingenier%C3%ADa-que-lleva-uniforme-trabajadores-seguridad-realizar-el-mantenimiento-en-la-f%C3%A1brica-m%C3%A1quina-torno-metal-216109790.jpg"
          alt="Taller industrial de alta precisión"
          class="absolute inset-0 w-full h-full object-cover brightness-[0.9] contrast-[1.05]" />

        <!-- overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-navy-blue/25 via-navy-blue/55 to-navy-blue/95 lg:bg-gradient-to-r lg:from-navy-blue/50 lg:to-navy-blue"></div>

        <!-- ✅ TEXTO EN MÓVIL (YA NO bottom, ahora top + panel) -->
        <div class="lg:hidden absolute inset-x-0 top-[28%] px-5 z-10">

          <div class="max-w-xl">
            <!-- panel para legibilidad -->
            <div class="bg-deep-black/55 backdrop-blur-sm border border-white/10 rounded-sm p-5">
              <div class="flex items-center gap-3 mb-3">
                <div class="h-[2px] w-10 bg-primary-red"></div>
                <span class="text-primary-red font-black tracking-[0.35em] text-[10px] uppercase">
                  Trayectoria de Excelencia
                </span>
              </div>

              <h1 class="text-3xl font-black uppercase leading-[1.05] tracking-tighter mb-3 text-white">
                Nuestra Historia <br />
                & <span class="text-primary-red">Experiencia</span>
              </h1>

              <p class="text-sm text-gray-200 leading-relaxed font-light">
                <?php echo nl2br(htmlspecialchars($historiaTxt)); ?>
              </p>
            </div>
          </div>
        </div>

        <!-- ✅ BADGE (encima del panel y sin choque) -->
        <div class="absolute left-5 right-5 bottom-5 sm:left-8 sm:right-8 sm:bottom-8 lg:left-10 lg:right-10 lg:bottom-12 z-20">
          <div class="reveal from-left bg-primary-red/90 backdrop-blur-md p-4 sm:p-5 inline-block rounded-sm">
            <p class="text-white font-black text-xl sm:text-2xl uppercase leading-none">Desde 1994</p>
            <p class="text-white/80 text-[11px] font-bold uppercase tracking-widest mt-1">
              Liderazgo Industrial
            </p>
          </div>
        </div>
      </div>

      <!-- DESKTOP (igual que antes) -->
      <div class="hidden lg:flex reveal from-right w-full lg:w-1/2 bg-navy-blue px-20 py-20 flex-col justify-center">
        <div class="flex items-center gap-4 mb-6">
          <div class="h-[3px] w-14 bg-primary-red"></div>
          <span class="text-primary-red font-black tracking-[0.35em] text-[10px] uppercase">
            Trayectoria de Excelencia
          </span>
        </div>

        <h1 class="text-5xl font-black uppercase leading-[0.95] tracking-tighter mb-6">
          Nuestra Historia <br />
          & <span class="text-primary-red">Experiencia</span>
        </h1>

        <p class="text-lg text-gray-300 leading-relaxed font-light max-w-xl">
          <?php echo nl2br(htmlspecialchars($historiaTxt)); ?>
        </p>
      </div>

    </div>
  </section>

  
  <!-- AÑOS DE EXPERIENCIA (DINÁMICO POR DÉCADAS) -->
<section class="py-14 sm:py-16 bg-navy-blue border-b border-white/10">
  <div class="max-w-7xl mx-auto px-5 sm:px-8 lg:px-12">

    <!-- WRAPPER: en móvil centrado / en md en fila -->
    <div class="flex flex-col md:flex-row items-center md:items-center justify-between gap-10 md:gap-12">

      <!-- BLOQUE IZQUIERDO -->
      <div class="reveal w-full md:w-auto flex flex-col sm:flex-row items-center sm:items-start md:items-center gap-6 sm:gap-8 text-center sm:text-left">

        <!-- NÚMERO GRANDE (más sutil en móvil) -->
        <span class="text-6xl sm:text-7xl lg:text-8xl font-black select-none
              bg-gradient-to-b from-white/35 via-white/20 to-white/5
              bg-clip-text text-transparent
              drop-shadow-[0_6px_18px_rgba(255,255,255,0.12)]
              opacity-70 sm:opacity-100">
          <?= experience_decade(MSI_START_YEAR); ?>+
        </span>

        <!-- TEXTO -->
        <div class="relative sm:border-l-4 sm:border-primary-red sm:pl-6">

          <!-- Línea roja en móvil (debajo) para mantener identidad sin cargar -->
          <div class="sm:hidden mx-auto mb-3 h-[3px] w-16 bg-primary-red"></div>

          <h3 class="text-3xl sm:text-4xl font-black uppercase leading-tight tracking-tight text-white">
            Más de <?= experience_decade(MSI_START_YEAR); ?> años
          </h3>

          <p class="mt-2 text-sm sm:text-[0.95rem] font-bold text-gray-200 uppercase tracking-widest leading-relaxed">
            liderando la industria de precisión
          </p>
        </div>
      </div>

      <!-- BLOQUE DERECHO (tarjeta) -->
      <div class="reveal w-full md:w-auto">
        <div class="flex items-center justify-center md:justify-start gap-4 sm:gap-6
                    bg-deep-black/55 border border-white/10
                    py-5 sm:py-6 px-6 sm:px-10
                    rounded-md sm:rounded-sm
                    w-full md:w-auto">

          <span class="material-symbols-outlined text-primary-red text-5xl sm:text-5xl leading-none">
            verified_user
          </span>

          <div class="text-center md:text-left">
            <p class="text-xs font-black text-primary-red uppercase tracking-[0.22em] mb-1">
              Certificación Total
            </p>
            <p class="text-base font-bold text-white uppercase tracking-wider leading-snug">
              Confianza & Calidad <br />Garantizada
            </p>
          </div>
        </div>
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
  <!-- CAPACIDADES -->
  <section class="relative py-24 bg-navy-blue border-t border-white/10 overflow-hidden">
    <!-- Fondo técnico (imagen) -->
    <div class="absolute inset-0 z-0">
      <img
        src="assets/img/capacidades.png"
        alt="Manufactura de precisión"
        class="w-full h-full object-cover opacity-25 saturate-0"
        loading="lazy"
        decoding="async" />
      <div class="absolute inset-0 bg-gradient-to-r from-navy-blue via-navy-blue/90 to-navy-blue/70"></div>
      <div class="absolute inset-0 industrial-grid opacity-10"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-8 lg:px-12 grid lg:grid-cols-2 gap-10 lg:gap-20 items-start">

      <!-- BLOQUE IZQUIERDO (ZOOM) -->
      <div class="reveal zoom-text">
        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black uppercase mb-6 sm:mb-8 text-white leading-tight">
          Capacidades de <span class="text-primary-red">Ingeniería Avanzada</span>
        </h2>

        <div class="h-[3px] w-16 bg-primary-red mb-6"></div>

        <p class="text-base sm:text-lg lg:text-xl text-gray-200/90 max-w-xl leading-relaxed">
          Infraestructura para fabricar componentes complejos con tolerancias mínimas.
        </p>

        <!-- mini detalle (opcional, suma mucho) -->
        <p class="mt-5 text-[11px] sm:text-xs font-black uppercase tracking-[0.25em] text-white/60">
          precisión • repetibilidad • control dimensional
        </p>
      </div>

      <!-- BLOQUE DERECHO (ENTRA PREMIUM) -->
      <div class="reveal zoom-text rounded-sm p-10 sm:p-12 border border-white/10 bg-deep-black/55 backdrop-blur-sm
                shadow-2xl shadow-black/40 relative overflow-hidden">
        <!-- glow rojo sutil -->
        <div class="pointer-events-none absolute -top-16 -right-16 w-64 h-64 bg-primary-red/10 blur-3xl"></div>

        <h4 class="text-primary-red font-black uppercase tracking-[0.25em] mb-8 text-xs sm:text-sm">
          Portafolio de Componentes
        </h4>

        <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4 text-xs sm:text-sm uppercase font-bold text-white/80">
          <li class="flex items-center gap-2"><span class="text-primary-red">▸</span> Sinfines y Coronas</li>
          <li class="flex items-center gap-2"><span class="text-primary-red">▸</span> Piñones</li>
          <li class="flex items-center gap-2"><span class="text-primary-red">▸</span> Engranes Rectos</li>
          <li class="flex items-center gap-2"><span class="text-primary-red">▸</span> Engranes Helicoidales</li>
          <li class="flex items-center gap-2"><span class="text-primary-red">▸</span> Ejes y Flechas</li>
          <li class="flex items-center gap-2"><span class="text-primary-red">▸</span> Rodillos Industriales</li>
          <li class="flex items-center gap-2"><span class="text-primary-red">▸</span> Coples y Bridas</li>
          <li class="flex items-center gap-2"><span class="text-primary-red">▸</span> Pernos Especiales</li>
          <li class="flex items-center gap-2"><span class="text-primary-red">▸</span> Herramentales</li>
          <li class="flex items-center gap-2"><span class="text-primary-red">▸</span> Refacciones a Medida</li>
        </ul>

        <!-- línea roja fina abajo -->
        <div class="mt-10 h-[2px] w-24 bg-primary-red"></div>
      </div>

    </div>
  </section>

</div>
<?php include "includes/ui/footer.php"; ?>