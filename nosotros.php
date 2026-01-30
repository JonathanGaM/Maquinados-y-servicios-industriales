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
  <!-- HERO / HISTORIA -->
  <section class="relative overflow-hidden border-b border-white/10">

    <div class="relative w-full lg:flex lg:min-h-[58vh]">

      <!-- IMAGEN (en móvil: fondo) -->
      <div class="relative w-full lg:w-1/2 min-h-[58vh] lg:min-h-[58vh] overflow-hidden">

        <img
          src="https://thumbs.dreamstime.com/b/hombre-de-ingenier%C3%ADa-que-lleva-uniforme-trabajadores-seguridad-realizar-el-mantenimiento-en-la-f%C3%A1brica-m%C3%A1quina-torno-metal-216109790.jpg"
          alt="Taller industrial de alta precisión"
          class="absolute inset-0 w-full h-full object-cover brightness-[0.9] contrast-[1.05]" />

        <!-- overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-navy-blue/25 via-navy-blue/55 to-navy-blue/95 lg:bg-gradient-to-r lg:from-navy-blue/50 lg:to-navy-blue"></div>

        <!-- ✅ MÓVIL: contenido NORMAL (ya no absolute) -->
        <div class="relative z-10 lg:hidden px-5 pt-10 pb-24">
          <div class="max-w-xl">
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

        <!-- ✅ BADGE: siempre abajo sin chocar (porque dejamos espacio con pb-24 arriba) -->
        <div class="absolute inset-x-0 bottom-5 flex justify-center lg:justify-startlg:left-10 lg:bottom-12 z-20">
          <div class="reveal from-left bg-primary-red/90 backdrop-blur-md
            px-4 py-3 sm:px-5 sm:py-4
            rounded-sm inline-block text-center lg:text-left">

            <p class="text-white font-black
            text-sm sm:text-xl lg:text-2xl
            uppercase leading-none">
              Desde 1994
            </p>

            <p class="text-white/80
            text-[9px] sm:text-[11px]
            font-bold uppercase tracking-widest mt-1">
              Liderazgo Industrial
            </p>
          </div>

        </div>

      </div>

      <!-- DESKTOP -->
      <div class="hidden lg:flex reveal from-right w-full lg:w-[55%] bg-navy-blue px-14 py-8">
        <div class="w-full max-w-2xl mx-auto flex flex-col justify-center">
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

          <p class="text-lg text-gray-300 leading-relaxed font-light max-w-2xl">
            <?php echo nl2br(htmlspecialchars($historiaTxt)); ?>
          </p>
        </div>
      </div>

    </div>
  </section>



  <!-- AÑOS DE EXPERIENCIA (COMPACTO) -->
  <section class="py-6 sm:py-8 bg-navy-blue border-b border-white/10 lg:pr-52">


    <div class="max-w-7xl mx-auto px-5 sm:px-8 lg:px-12">

      <div class="flex flex-col md:flex-row items-center justify-between gap-5 md:gap-6">

        <!-- BLOQUE IZQUIERDO -->
        <div class="reveal w-full md:w-auto flex flex-col sm:flex-row items-center sm:items-start md:items-center gap-3 sm:gap-5 text-center sm:text-left">

          <!-- NÚMERO GRANDE (más compacto) -->
          <span class="text-4xl sm:text-5xl lg:text-6xl font-black select-none
              bg-gradient-to-b from-white/35 via-white/20 to-white/5
              bg-clip-text text-transparent
              drop-shadow-[0_4px_14px_rgba(255,255,255,0.12)]
              opacity-80">
            <?= experience_decade(MSI_START_YEAR); ?>+
          </span>

          <!-- TEXTO -->
          <div class="relative sm:border-l-4 sm:border-primary-red sm:pl-4">

            <div class="sm:hidden mx-auto mb-1 h-[3px] w-12 bg-primary-red"></div>

            <h3 class="text-xl sm:text-2xl font-black uppercase leading-tight tracking-tight text-white">
              Más de <?= experience_decade(MSI_START_YEAR); ?> años
            </h3>

            <p class="mt-0.5 text-[11px] sm:text-xs font-bold text-gray-300 uppercase tracking-widest leading-relaxed">
              liderando la industria de precisión
            </p>
          </div>
        </div>

        <!-- BLOQUE DERECHO (tarjeta compacta) -->
        <div class="reveal w-full md:w-auto md:pr-16 lg:pr-24">
          <div class="flex items-center justify-center md:justify-start gap-3
              bg-deep-black/55 border border-white/10
              py-2.5 sm:py-3 px-4 sm:px-6
              rounded-sm w-full md:w-auto">


            <span class="material-symbols-outlined text-primary-red text-3xl leading-none">
              verified_user
            </span>

            <div class="text-center md:text-left">
              <p class="text-[9px] font-black text-primary-red uppercase tracking-[0.22em] mb-0.5">
                Control de Calidad Interno
              </p>
              <p class="text-xs sm:text-sm font-bold text-white uppercase tracking-wider leading-snug">
                Precisión & Confiabilidad <br />Operativa
              </p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- MISIÓN / VISIÓN -->
  <section class="relative py-20 sm:py-24 bg-gradient-to-b from-white via-white to-slate-50 overflow-hidden">

    <!-- Fondo técnico decorativo -->
    <div class="absolute inset-0 blueprint-overlay opacity-5"></div>

    <div class="relative max-w-7xl mx-auto px-5 sm:px-8 lg:px-12 grid lg:grid-cols-2 gap-8 lg:gap-12 z-10">

      <!-- MISIÓN -->
      <article class="reveal from-left relative bg-white border border-border-navy/20
               p-6 sm:p-10 lg:p-16
               rounded-sm shadow-2xl">

        <span class="absolute -top-5 left-6 sm:left-10
               bg-primary-red text-white text-[10px]
               font-black uppercase tracking-widest px-4 py-1">
          Nuestro Propósito
        </span>

        <h3 class="text-2xl sm:text-3xl md:text-5xl
             font-black uppercase text-navy-blue
             mb-6 sm:mb-8 leading-tight">
          Misión
        </h3>

        <p class="text-navy-blue/80
            text-sm sm:text-base lg:text-lg
            leading-relaxed font-medium max-w-none">
          <?php echo nl2br(htmlspecialchars($empresa["mision"] ?? "")); ?>
        </p>

        <div class="mt-8 sm:mt-10 h-1 w-20 bg-primary-red"></div>
      </article>


      <article class="reveal from-left relative bg-white border border-border-navy/20
               p-6 sm:p-10 lg:p-16
               rounded-sm shadow-2xl">

        <span class="absolute -top-5 left-6 sm:left-10
               bg-primary-red text-white text-[10px]
               font-black uppercase tracking-widest px-4 py-1">
          Nuestra Meta

        </span>

        <h3 class="text-2xl sm:text-3xl md:text-5xl
             font-black uppercase text-navy-blue
             mb-6 sm:mb-8 leading-tight">
          Visión
        </h3>

        <p class="text-navy-blue/80
            text-sm sm:text-base lg:text-lg
            leading-relaxed font-medium max-w-none">
          <?php echo nl2br(htmlspecialchars($empresa["vision"] ?? "")); ?>
        </p>

        <div class="mt-8 sm:mt-10 h-1 w-20 bg-primary-red"></div>
      </article>

    </div>
  </section>

  <!-- CAPACIDADES -->
  <!-- CAPACIDADES -->
<section class="relative py-14 sm:py-20 lg:py-24 bg-navy-blue border-t border-white/10 overflow-hidden">
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
          <h2 class="text-2xl sm:text-4xl lg:text-5xl font-black uppercase mb-5 sm:mb-8 text-white leading-tight">

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
      <div class="reveal zoom-text rounded-sm p-6 sm:p-10 lg:p-12 border border-white/10 bg-deep-black/55 backdrop-blur-sm
            shadow-2xl shadow-black/40 relative overflow-hidden">

        <!-- glow rojo sutil -->
        <div class="pointer-events-none absolute -top-16 -right-16 w-64 h-64 bg-primary-red/10 blur-3xl"></div>

        <h4 class="text-primary-red font-black uppercase tracking-[0.25em] mb-8 text-xs sm:text-sm">
          Portafolio de Componentes
        </h4>

        <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 sm:gap-4 text-[11px] sm:text-sm uppercase font-bold text-white/80">
          <!-- CTA A SERVICIOS -->
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
          <div class="mt-12">
  <a href="servicios.php#servicios"
     class="inline-block
            px-8 py-3
            text-[11px] sm:text-xs
            font-black uppercase tracking-widest
            border border-primary-red
            text-primary-red
            hover:bg-primary-red hover:text-white
            transition-all duration-300
            rounded-sm">
    Ver nuestros servicios
  </a>
</div>
        </ul>

        <!-- línea roja fina abajo -->
        <div class="mt-10 h-[2px] w-24 bg-primary-red"></div>
      </div>

    </div>
  </section>

</div>
<?php include "includes/ui/footer.php"; ?>