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

  <section class="relative overflow-hidden">

    <!-- HERO CON IMAGEN DE FONDO -->
    <div class="relative min-h-[26vh] sm:min-h-[28vh] flex items-center justify-center text-center">



      <!-- IMAGEN -->
      <img
        src="<?= htmlspecialchars(($fallback_img_nosotros["hero_bg"] ?? ""), ENT_QUOTES, "UTF-8"); ?>"
        alt="Taller industrial de alta precisión"
        class="absolute inset-0 w-full h-full object-cover brightness-[0.9] contrast-[1.05]" />

      <!-- OVERLAY -->
      <div class="absolute inset-0 bg-gradient-to-b from-navy-blue/40 via-navy-blue/65 to-navy-blue/90"></div>

      <!-- TEXTO SOBRE IMAGEN -->
      <div class="relative z-10 px-6 sm:px-10 max-w-3xl py-2">

        <p class="text-primary-red font-black tracking-[0.35em] text-[10px] uppercase mb-2">
          Trayectoria de Excelencia
        </p>

        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black uppercase leading-[1.05] tracking-tighter text-white">
          Nuestra Historia <br />
          & <span class="text-primary-red">Experiencia</span>
        </h1>
      </div>
    </div>

    <!-- BLOQUE BLANCO INFERIOR -->
    <div class="bg-white py-5 sm:py-6">
      <div class="max-w-3xl mx-auto px-6 sm:px-10 text-center">
        <blockquote class="relative text-navy-blue text-sm sm:text-base leading-snug font-medium text-justify italic px-6">
          <span class="absolute left-0 top-0 text-primary-red text-3xl leading-none">“</span>

          Somos una empresa dedicada a la fabricación, maquila, compra venta y reparación de toda clase de artículos para la industria y el sector automotriz.
          Con una sólida base en ingeniería de precisión, hemos servido a la industria nacional garantizando los más altos estándares de calidad.

          <span class="absolute right-0 bottom-0 text-primary-red text-3xl leading-none">”</span>
        </blockquote>

      </div>
    </div>

  </section>






  <!-- MISIÓN / VISIÓN (RESPONSIVE: móvil = cards blancas, pc = split con imágenes) -->
  <section class="relative overflow-hidden">

    <!-- =======================
       ✅ MÓVIL (hasta lg-1)
       ======================= -->
    <div class="lg:hidden relative py-16 bg-gradient-to-b from-white via-white to-slate-50 overflow-hidden">

      <!-- Fondo técnico decorativo -->
      <div class="absolute inset-0 blueprint-overlay opacity-5"></div>

      <div class="relative max-w-7xl mx-auto px-5 sm:px-8 grid grid-cols-1 gap-10 z-10">

        <!-- MISIÓN -->
        <article class="relative bg-white border border-border-navy/20
                      p-6 sm:p-10
                      rounded-sm shadow-2xl">

          <span class="absolute -top-5 left-6
                     bg-primary-red text-white text-[10px]
                     font-black uppercase tracking-widest px-4 py-1">
            Nuestro Propósito
          </span>

          <h3 class="text-2xl sm:text-3xl font-black uppercase text-navy-blue mb-5 leading-tight">
            Misión
          </h3>

          <p class="text-navy-blue/80 text-sm sm:text-base leading-relaxed font-medium text-justify">
            <?php echo nl2br(htmlspecialchars($empresa["mision"] ?? "")); ?>
          </p>

          <div class="mt-8 h-1 w-20 bg-primary-red"></div>
        </article>

        <!-- VISIÓN -->
        <article class="relative bg-white border border-border-navy/20
                      p-6 sm:p-10
                      rounded-sm shadow-2xl">

          <span class="absolute -top-5 left-6
                     bg-primary-red text-white text-[10px]
                     font-black uppercase tracking-widest px-4 py-1">
            Nuestra Meta
          </span>

          <h3 class="text-2xl sm:text-3xl font-black uppercase text-navy-blue mb-5 leading-tight">
            Visión
          </h3>

          <p class="text-navy-blue/80 text-sm sm:text-base leading-relaxed font-medium text-justify">
            <?php echo nl2br(htmlspecialchars($empresa["vision"] ?? "")); ?>
          </p>

          <div class="mt-8 h-1 w-20 bg-primary-red"></div>
        </article>

      </div>
    </div>


    <!-- =======================
       ✅ PC (lg+)
       ======================= -->
    <div class="hidden lg:block">

      <!-- FRANJA SUPERIOR BLANCA -->
      <div class="h-2 bg-white"></div>

      <div class="relative">

        <!-- FONDOS -->
        <div class="absolute inset-0 grid grid-rows-1 grid-cols-2">
          <div class="bg-navy-blue"></div>
          <div class="bg-slate-300"></div>
        </div>

        <img
         src="<?= htmlspecialchars(($fallback_img_nosotros["mision_izq"] ?? ""), ENT_QUOTES, "UTF-8"); ?>"
          class="absolute -left-4 top-[45%] -translate-y-1/2
         h-[300px] object-contain z-20 pointer-events-none" />

        <img
         src="<?= htmlspecialchars(($fallback_img_nosotros["vision_der"] ?? ""), ENT_QUOTES, "UTF-8"); ?>"
          class="absolute -right-4 top-[45%] -translate-y-1/2
         h-[300px] object-contain z-20 pointer-events-none" />



        <!-- CONTENIDO -->
        <div class="relative max-w-7xl mx-auto
                  px-28 grid grid-cols-2 gap-12
                  py-8 z-10">

          <!-- MISIÓN -->
          <!-- MISIÓN -->
          <article class="text-white text-right pr-10 my-0 lg:mt-0 lg:mb-12">


            <h3 class="text-xl md:text-3xl font-black uppercase mb-2">
              Misión
            </h3>

            <!-- LÍNEA AZUL CLARO -->
            <div class="ml-auto mb-4 h-[3px] w-14 bg-blue-300"></div>

            <p class="text-white/85 text-[16px] leading-snug
             max-w-[38ch]
              ml-auto text-justify">
              <?php echo nl2br(htmlspecialchars($empresa["mision"] ?? "")); ?>
            </p>
          </article>


          <!-- VISIÓN -->
          <article class="text-navy-blue text-left pl-10 my-0 lg:mt-0 lg:mb-12">

            <h3 class="text-xl md:text-3xl font-black uppercase mb-2">
              Visión
            </h3>

            <!-- LÍNEA AZUL MARINO -->
            <div class="mr-auto mb-4 h-[3px] w-14 bg-navy-blue"></div>

            <p class="text-navy-blue/80 text-[16px] leading-snug
         max-w-[38ch]
         mr-auto text-justify">
              <?php echo nl2br(htmlspecialchars($empresa["vision"] ?? "")); ?>
            </p>
          </article>


        </div>
      </div>
    </div>

  </section>
  <section class="relative py-6 sm:py-8 overflow-hidden">

  <!-- FONDO RESPONSIVE -->
<div class="absolute inset-0">
  <!-- MÓVIL: fondo único gris azulado -->
  <div class="absolute inset-0 bg-slate-300 md:hidden"></div>

  <!-- DESKTOP: fondo partido -->
  <div class="hidden md:grid md:grid-cols-2 absolute inset-0">
    <div class="bg-navy-blue"></div>
    <div class="bg-slate-300"></div>
  </div>
</div>


    <!-- CONTENIDO -->
    <div class="relative max-w-7xl mx-auto px-5 sm:px-8 lg:px-12 z-10">

      <div class="flex flex-col md:flex-row items-center md:items-stretch gap-5 md:gap-8">

        <!-- BLOQUE IZQUIERDO -->
        <div class="reveal w-full md:w-1/3 flex items-center justify-center md:justify-start">
          <div class="bg-slate-800/95 border border-white/10
              rounded-sm px-5 py-4 sm:px-6 sm:py-5
              shadow-sm
              flex flex-col sm:flex-row items-center sm:items-start md:items-center
              gap-3 sm:gap-5 text-center sm:text-left">
            <div class="relative sm:border-l-4 sm:border-primary-red sm:pl-4">
              <div class="sm:hidden mx-auto mb-1 h-[3px] w-12 bg-primary-red"></div>

              <h3 class="text-xl sm:text-2xl font-black uppercase leading-tight tracking-tight text-white">
                Más de <?= experience_decade(MSI_START_YEAR); ?> años
              </h3>
              <p class="mt-0.5 text-[11px] sm:text-xs font-bold text-white/70 uppercase tracking-widest leading-relaxed">
                liderando la industria de precisión
              </p>
            </div>
          </div>
        </div>


        <!-- BADGE CENTRO -->
        <div class="reveal w-full md:w-1/3 flex items-center justify-center">
          <div class="bg-slate-700/95 px-4 py-3 sm:px-5 sm:py-4 rounded-sm inline-block text-center">
            <p class="text-white font-black text-sm sm:text-xl lg:text-2xl uppercase leading-none">
              Desde <?= MSI_START_YEAR; ?>
            </p>
            <p class="text-white/80 text-[9px] sm:text-[11px] font-bold uppercase tracking-widest mt-1">
              Liderazgo Industrial
            </p>
          </div>
        </div>

        <!-- BLOQUE DERECHO -->
        <div class="reveal w-full md:w-1/3 flex items-center justify-center md:justify-end">
          <div class="flex items-center justify-center md:justify-start gap-3
                    bg-white/90 border border-border-navy/20
                    py-2.5 sm:py-3 px-4 sm:px-6
                    rounded-sm w-full md:w-auto
                    shadow-sm">

            <span class="material-symbols-outlined text-primary-red text-3xl leading-none">
              verified_user
            </span>

            <div class="text-center md:text-left">
              <p class="text-[9px] font-black text-primary-red uppercase tracking-[0.22em] mb-0.5">
                Control de Calidad Interno
              </p>
              <p class="text-xs sm:text-sm font-bold text-navy-blue uppercase tracking-wider leading-snug">
                Precisión & Confiabilidad <br />Operativa
              </p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>


  <!-- CAPACIDADES (más compacto) -->
  <section class="relative py-8 sm:py-10 lg:py-12 text-white overflow-hidden border-t border-white/10">
    <!-- FONDO (mismo look que el CTA) -->
    <div class="absolute inset-0 z-0">
      <img
      src="<?= htmlspecialchars(($fallback_img_nosotros["capacidades_bg"] ?? ""), ENT_QUOTES, "UTF-8"); ?>"
        alt="Manufactura de precisión"
        class="w-full h-full object-cover brightness-[0.85] contrast-[1.05]"
        loading="lazy"
        decoding="async" />

      <div class="absolute inset-0 bg-gradient-to-b from-navy-blue/75 via-deep-black/70 to-deep-black/85"></div>
      <div class="industrial-grid absolute inset-0 opacity-10"></div>

      <div class="absolute -top-24 -left-24 w-72 h-72 bg-primary-red/10 rounded-full blur-3xl"></div>
      <div class="absolute -bottom-24 -right-24 w-72 h-72 bg-white/5 rounded-full blur-3xl"></div>

      <div class="absolute bottom-0 left-0 right-0 h-[3px] bg-primary-red/90"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-8 lg:px-12 grid lg:grid-cols-2 gap-6 lg:gap-10 items-start">

      <!-- BLOQUE IZQUIERDO -->
      <div class="reveal zoom-text">
        <h2 class="text-2xl sm:text-4xl lg:text-5xl font-black uppercase mb-3 sm:mb-4 text-white leading-tight">
          Capacidades de <span class="text-primary-red">Ingeniería Avanzada</span>
        </h2>

        <div class="h-[3px] w-16 bg-primary-red mb-4"></div>

        <p class="text-base sm:text-lg lg:text-lg text-white/90 max-w-xl leading-snug font-medium">
          Infraestructura especializada para fabricar componentes complejos con tolerancias mínimas y alto desempeño industrial.
        </p>

        <p class="mt-2 text-[11px] sm:text-xs font-medium uppercase tracking-wider text-white/80">
          precisión • repetibilidad • control dimensional • ingeniería avanzada • confiabilidad operativa
        </p>


      </div>

      <!-- BLOQUE DERECHO (CARD más compacto) -->
      <div class="reveal zoom-text rounded-sm p-4 sm:p-6 lg:p-7 border border-white/10 bg-deep-black/55 backdrop-blur-sm
          shadow-2xl shadow-black/40 relative overflow-hidden">

        <div class="pointer-events-none absolute -top-16 -right-16 w-64 h-64 bg-primary-red/10 blur-3xl"></div>

        <h4 class="text-primary-red font-black uppercase tracking-[0.25em] mb-4 text-xs sm:text-sm">
          Portafolio de Componentes
        </h4>

        <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2 sm:gap-3 
            text-[11px] sm:text-xs 
            font-medium uppercase tracking-wider 
            text-white/75">
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

        <!-- CTA (más pegado, y fuera del <ul> para HTML válido) -->
        <div class="mt-5">
          <a href="servicios.php#servicios"
            class="inline-block px-7 py-2.5 text-[11px] sm:text-xs font-black uppercase tracking-widest
                border border-primary-red text-primary-red hover:bg-primary-red hover:text-white
                transition-all duration-300 rounded-md">
            Ver nuestros servicios
          </a>
        </div>

        <div class="mt-6 h-[2px] w-24 bg-primary-red"></div>
      </div>

    </div>
  </section>
  <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2 sm:gap-3 text-[11px] sm:text-sm uppercase font-bold text-white/80">




</div>
<?php include "includes/ui/footer.php"; ?>