<?php include "includes/header.php"; ?>

<!-- WRAPPER OSCURO PARA SOBRESCRIBIR EL BODY BLANCO DEL HEADER -->
<div class="bg-navy-blue text-white">

  <!-- HERO / HISTORIA -->
<!-- HERO / HISTORIA -->
<section class="relative min-h-[80vh] flex items-center overflow-hidden border-b border-white/10">
  <div class="flex flex-col lg:flex-row w-full min-h-[80vh]">

    <!-- IMAGEN -->
    <div class="w-full lg:w-1/2 relative h-96 lg:h-auto overflow-hidden">
      <img
        src="https://thumbs.dreamstime.com/b/hombre-de-ingenier%C3%ADa-que-lleva-uniforme-trabajadores-seguridad-realizar-el-mantenimiento-en-la-f%C3%A1brica-m%C3%A1quina-torno-metal-216109790.jpg"
        alt="Taller industrial de alta precisión"
        class="absolute inset-0 w-full h-full object-cover grayscale opacity-60 hover:scale-105 transition-transform duration-700"
      />
      <div class="absolute inset-0 bg-gradient-to-r from-navy-blue/50 to-navy-blue"></div>

      <!-- BADGE (SUBIDO MÁS ARRIBA) -->
      <div class="absolute bottom-20 left-10 right-10 md:bottom-24 md:left-12 md:right-12">
        <div class="bg-primary-red/90 backdrop-blur-md p-5 inline-block rounded-sm">
          <p class="text-white font-black text-2xl uppercase leading-none">Desde 1994</p>
          <p class="text-white/80 text-[11px] font-bold uppercase tracking-widest mt-1">
            Liderazgo Industrial
          </p>
        </div>
      </div>
    </div>

    <!-- TEXTO -->
    <div class="w-full lg:w-1/2 bg-navy-blue px-10 py-14 md:px-12 md:py-16 lg:px-20 lg:py-20 flex flex-col justify-center">

      <div class="flex items-center gap-4 mb-6">
        <div class="h-[3px] w-14 bg-primary-red"></div>
        <span class="text-primary-red font-black tracking-[0.35em] text-[10px] uppercase">
          Trayectoria de Excelencia
        </span>
      </div>

      <!-- TITULO MÁS PEQUEÑO + MENOS ESPACIO -->
      <h1 class="text-3xl md:text-5xl font-black uppercase leading-[0.95] tracking-tighter mb-6">
        Nuestra Historia <br />
        & <span class="text-primary-red">Experiencia</span>
      </h1>

      <!-- PÁRRAFO MÁS COMPACTO -->
      <p class="text-base md:text-lg text-gray-300 mb-6 leading-relaxed font-light max-w-xl">
        Somos una empresa dedicada a la fabricación, maquila, compra venta y reparación de toda clase
        de artículos para la industria y el sector automotriz.
      </p>

      <p class="text-base md:text-lg text-gray-300 leading-relaxed font-light max-w-xl">
        Con una sólida base en ingeniería de precisión, hemos servido a la industria nacional garantizando
        los más altos estándares de calidad.
      </p>

      <!-- (SE ELIMINÓ EL BLOQUE DE: Engranes / CNC / Fresadora / Soldadura) -->

    </div>

  </div>
</section>


  <!-- AÑOS DE EXPERIENCIA (DINÁMICO POR DÉCADAS) -->
<section class="py-16 bg-navy-blue border-b border-white/10">
  <div class="max-w-7xl mx-auto px-12 flex flex-col md:flex-row items-start md:items-center justify-between gap-12">
    
    <div class="flex items-center gap-8">
      <!-- NÚMERO GRANDE -->
      <span class="text-8xl font-black select-none
             bg-gradient-to-b from-white/40 via-white/20 to-white/5
             bg-clip-text text-transparent
             drop-shadow-[0_6px_20px_rgba(255,255,255,0.15)]">
  <?= experience_decade(MSI_START_YEAR); ?>+
</span>

      <div class="border-l-4 border-primary-red pl-6">
        <!-- TEXTO PRINCIPAL -->
        <h3 class="text-4xl font-black uppercase leading-tight tracking-tight text-white">
          Más de <?= experience_decade(MSI_START_YEAR); ?> años
        </h3>

        <p class="text-sm font-bold text-gray-300 uppercase tracking-widest mt-2">
          liderando la industria de precisión
        </p>
      </div>
    </div>

    <div class="flex items-center gap-6 bg-deep-black/50 border border-white/10 py-6 px-10 rounded-sm">
      <span class="material-symbols-outlined text-primary-red text-5xl">verified_user</span>
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
<!-- MISIÓN / VISIÓN PREMIUM BLANCO -->
<section class="relative py-28 bg-white overflow-hidden">

  <!-- Fondo técnico decorativo -->
  <div class="absolute inset-0 blueprint-overlay opacity-5"></div>

  <div class="relative max-w-7xl mx-auto px-12 grid lg:grid-cols-2 gap-20 z-10">

    <!-- MISIÓN -->
    <article class="relative bg-white border border-border-navy/20 p-16 rounded-sm shadow-2xl">

      <span class="absolute -top-5 left-10 bg-primary-red text-white text-[10px] font-black uppercase tracking-widest px-4 py-1">
        Nuestro Propósito
      </span>

      <h призн class="text-4xl md:text-5xl font-black uppercase text-navy-blue mb-8 leading-tight">
        Misión
      </h>

      <p class="text-navy-blue/80 text-lg leading-relaxed font-medium">
        Proveer soluciones integrales de maquinado y mantenimiento industrial que excedan las expectativas
        de nuestros clientes, combinando tecnología de punta con la experiencia técnica de nuestro equipo
        para impulsar la eficiencia productiva de la industria.
      </p>

      <div class="mt-10 h-1 w-20 bg-primary-red"></div>
    </article>

    <!-- VISIÓN -->
    <article class="relative bg-white border border-border-navy/20 p-16 rounded-sm shadow-2xl">

      <span class="absolute -top-5 left-10 bg-primary-red text-white text-[10px] font-black uppercase tracking-widest px-4 py-1">
        Nuestra Meta
      </span>

      <h class="text-4xl md:text-5xl font-black uppercase text-navy-blue mb-8 leading-tight">
        Visión
      </h>

      <p class="text-navy-blue/80 text-lg leading-relaxed font-medium">
        Consolidarnos como el socio estratégico líder en manufactura de precisión a nivel nacional,
        siendo reconocidos por nuestra innovación constante, compromiso con la calidad total y el
        desarrollo técnico de nuestros procesos industriales.
      </p>

      <div class="mt-10 h-1 w-20 bg-primary-red"></div>
    </article>

  </div>
</section>


  <!-- CAPACIDADES -->
  <section class="py-24 bg-navy-blue border-t border-white/10">
    <div class="max-w-7xl mx-auto px-12 grid lg:grid-cols-2 gap-20">

      <div>
        <h2 class="text-5xl font-black uppercase mb-10 text-white">
          Capacidades de <span class="text-primary-red">Ingeniería Avanzada</span>
        </h2>
        <p class="text-xl text-gray-300">
          Infraestructura para fabricar componentes complejos con tolerancias mínimas.
        </p>
      </div>

      <div class="bg-deep-black/50 border border-white/10 p-12 rounded-sm border-t-4 border-primary-red">
        <h4 class="text-primary-red font-black uppercase tracking-widest mb-8">
          Portafolio de Componentes
        </h4>
        <ul class="grid grid-cols-2 gap-4 text-sm uppercase font-bold text-gray-300">
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

<?php include "includes/footer.php"; ?>
