<!-- index.php-->

<?php include "includes/header.php"; ?>

<!-- ✅ SECUENCIA HERO (FONDO -> TITULO -> TEXTO+BOTONES) -->
<link rel="stylesheet" href="assets/css/hero-animacione.css">
<link rel="stylesheet" href="assets/css/hero-estilos.css">
<section id="hero" class="relative min-h-[90vh] flex items-center overflow-hidden bg-deep-black">
  <!-- FONDO -->
  <div id="hero-bg-wrap" class="absolute inset-0 z-0">
    <div class="absolute inset-0 z-10 bg-gradient-to-r from-black/100 via-black/80 to-transparent"></div>
    <!-- Capa actual -->
    <img
      id="hero-bg-a"
      class="hero-bg-layer is-active"
      alt="Industrial background"
      src="https://miro.medium.com/v2/resize:fit:720/format:webp/1*E_NfoODmC-93DOwzsS5e4Q.jpeg" />
    <!-- Capa siguiente (arranca invisible) -->
    <img
      id="hero-bg-b"
      class="hero-bg-layer"
      alt=""
      src="" />
  </div>
  <!-- CONTENIDO -->
  <div class="relative z-20 max-w-7xl mx-auto px-8 w-full">
    <div class="max-w-3xl">

      <div class="inline-flex items-center gap-3 mb-6">
        <div class="h-[2px] w-12 bg-primary-red"></div>
        <span class="text-white font-bold tracking-[0.3em] text-xs uppercase">
          Estándar Industrial de Excelencia
        </span>
      </div>

      <!-- ✅ TITULO (misma animación, pero se activa después del fondo) -->
      <h1 class="hero-title text-5xl md:text-6xl font-bold uppercase leading-[0.95] tracking-tight mb-8 text-royal-blue">
        <span class="hero-line" data-text="Maquinados y">Maquinados y</span><br />
        <span class="hero-line" data-text="Servicios">Servicios</span><br />
        <span class="hero-line" data-text="Industriales">Industriales</span>

      </h1>

      <!-- ✅ TEXTO + BOTONES (aparecen al final juntos) -->
      <div class="hero-surround">

        <!-- ✅ Texto que cambiará -->
        <p id="hero-rotating-text"
          class="text-xl text-gray-300 mb-10 max-w-xl font-light leading-relaxed border-l-4 border-primary-red pl-6">
          Fabricación, maquila y reparación de componentes críticos para la industria global con precisión certificada.
        </p>

        <!-- ✅ Botones -->
        <div class="flex flex-wrap gap-4">
          <a href="servicios.php"
            class="hero-cta bg-primary-red hover:bg-red-700 px-8 py-4 text-sm font-bold uppercase tracking-widest rounded-sm
              flex items-center gap-3 text-white transition-all shadow-xl shadow-red-900/40">
            NUESTROS SERVICIOS
            <span class="material-symbols-outlined text-sm">arrow_forward</span>
          </a>

          <a href="#infraestructura"
            class="hero-cta border-2 border-white hover:bg-white hover:text-navy-blue px-8 py-4 text-sm font-bold
              uppercase tracking-widest rounded-sm transition-all text-white inline-block">
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

<section class="py-24 bg-navy-blue industrial-grid relative overflow-hidden">

  <div class="max-w-7xl mx-auto px-8 relative z-10">
    <div class="grid lg:grid-cols-2 gap-20 items-center">

      <!-- ✅ IZQUIERDA: imagen + años (entra desde la izquierda) -->
      <div class="relative reveal from-left">
        <div class="absolute -top-10 -left-10 w-40 h-40 border-t-2 border-l-2 border-primary-red/50"></div>

        <div class="bg-deep-black border border-white/10 p-4 rounded-sm relative z-10 shadow-2xl">
          <img alt="Team of engineers collaboratively working on a complex industrial system"
            class="rounded-sm grayscale hover:grayscale-0 transition-all duration-700 aspect-[4/3] object-cover"
            src="https://imagedelivery.net/xaKlCos5cTg_1RWzIu_h-A/b3832b78-7ebb-4f53-cf2c-fcb63464ab00/public" />

          <div class="absolute -bottom-6 -right-6 bg-primary-red p-8 rounded-sm shadow-2xl skew-box">
            <div class="skew-box-inner text-center text-white">
              <span class="block text-4xl font-black">
                <?= experience_decade(MSI_START_YEAR); ?>+
              </span>
              <span class="text-[10px] uppercase tracking-widest font-bold">
                Años de Liderazgo
              </span>
            </div>
          </div>
        </div>
      </div>

      <!-- ✅ DERECHA: texto (entra desde la derecha) -->
      <div class="reveal from-right">
        <h2 class="text-4xl md:text-5xl font-black uppercase mb-8 leading-tight text-white">
          Mantenimiento <br /><span class="text-primary-red">Industrial</span> de Elite
        </h2>

        <p class="text-gray-300 text-lg mb-8 leading-relaxed">
          Ofrecemos soluciones integrales en mantenimiento y fabricación industrial con los más altos estándares. Nuestra planta en Guadalajara está equipada con tecnología de vanguardia para garantizar la confiabilidad operativa.
        </p>

        <div class="grid grid-cols-2 gap-8 mb-10">
          <div class="space-y-3">
            <span class="material-symbols-outlined text-primary-red text-4xl">verified_user</span>
            <h4 class="font-bold uppercase text-sm tracking-wider text-white">Calidad Comprobada</h4>
            <p class="text-xs text-gray-400">Procesos supervisados y atención al detalle que aseguran resultados confiables en cada entrega.</p>
          </div>

          <div class="space-y-3">
            <span class="material-symbols-outlined text-primary-red text-4xl">speed</span>
            <h4 class="font-bold uppercase text-sm tracking-wider text-white">Respuesta Rápida</h4>
            <p class="text-xs text-gray-400">Logística optimizada para reducir tiempos muertos de producción.</p>
          </div>
        </div>

        <a href="nosotros.php"
          class="bg-primary-red hover:bg-red-700 px-10 py-4 text-sm font-bold uppercase tracking-widest rounded-sm
                  inline-flex items-center gap-3 text-white transition-all">
          CONOCER MÁS
          <span class="material-symbols-outlined text-sm">read_more</span>
        </a>
      </div>

    </div>
  </div>
</section>


<section id="infraestructura" class="py-24 bg-industrial-white">
  <div class="max-w-7xl mx-auto px-8">

    <div class="flex flex-col md:flex-row justify-between items-baseline mb-16 border-b-2 border-navy-blue pb-6">
      <div>
        <h2 class="text-primary-red font-black tracking-[0.3em] text-xs uppercase mb-2">INFRAESTRUCTURA TÉCNICA</h2>
        <h3 class="text-5xl font-black uppercase text-navy-blue">Ingeniería de Precisión</h3>
      </div>
      <p class="text-navy-blue/60 font-medium uppercase tracking-widest text-xs md:text-sm mt-4 md:mt-0">Maquinaria de última generación</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-12 gap-6">

      <div class="md:col-span-8 group relative overflow-hidden bg-navy-blue min-h-[450px]">
        <img alt="Operator carefully performing tasks on a conventional lathe"
          class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000"
          src="https://lh3.googleusercontent.com/aida-public/AB6AXuClbVtyJae0malhxuUoC3raax3boT7IqjdA0Wo6oBPQsoUBOaVoY_Tfr4sgz5mh4cI6P6HDdgL_hf9TRAiHXF1OnrNc951RrJVkrSYnqacgx7nCsuYFDTMgcUTf4TmtOLAmfHlPTEknJ9Pg5SwbD_6Yx7UYWNEq9FEmpMi-v0McZco4Yr_5Ijb09hwbu_IspTJR-ArEmwoNnGiFXOBjIHi5CT8KVkJndU4i3wtxk9bNrnyJrI6otW37r1rag69yP4oprKeEbQZ17pec" />
        <div class="absolute inset-0 bg-navy-blue/40 group-hover:bg-navy-blue/20 transition-colors"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-deep-black via-transparent to-transparent"></div>
        <div class="absolute bottom-0 left-0 p-10">
          <span class="bg-primary-red text-white px-3 py-1 font-bold text-[10px] tracking-widest uppercase mb-4 inline-block">Manufactura Robusta</span>
          <h4 class="text-4xl font-black uppercase text-white mb-4">Torno Convencional</h4>
          <p class="text-gray-200 max-w-md opacity-0 group-hover:opacity-100 transition-opacity duration-500">
            Maquinados de gran escala con precisión micrométrica para ejes y componentes estructurales.
          </p>
        </div>
      </div>

      <div class="md:col-span-4 group relative overflow-hidden bg-navy-blue min-h-[450px]">
        <img alt="Operator carefully performing tasks on a CNC machining center"
          class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000"
          src="https://lh3.googleusercontent.com/aida-public/AB6AXuCJEza7qoBxigNuWEPZsFZ1m0r_eIiwY34PwTHsGLlJ-6WK27s66_jEBVT7ihONYxD1axxpXDfB5FBABfcXSgxpIzQZ8VIzZtBUfymCtqFbDEDlEBJ1D5DZCffrBfpAtiCSXKRraQH4KMwM6cu4uvhmhLy7SK9X7-0ov5yGIiI7Je1BD_Pifv3lU1xP34HXZatVhCgwQ24RnuQ9SbITgZEKxUXnDMdDbHIVSqcmE9QTu1RXIbJdwNiGDikdnFWN7zcASEnuX5b6jaZa" />
        <div class="absolute inset-0 bg-navy-blue/40"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-deep-black via-transparent to-transparent"></div>
        <div class="absolute bottom-0 left-0 p-10">
          <span class="bg-primary-red text-white px-3 py-1 font-bold text-[10px] tracking-widest uppercase mb-4 inline-block">Tecnología CNC</span>
          <h4 class="text-4xl font-black uppercase text-white mb-4">Maquinado CNC</h4>
        </div>
      </div>

      <div class="md:col-span-4 group relative overflow-hidden bg-navy-blue min-h-[450px]">
        <img alt="Welder actively joining large metal components with sparks"
          class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000"
          src="https://www.mgrectificadora.com.ar/wp-content/uploads/2018/11/que-significa-rectificar-el-motor-de-mi-vehiculo-idnoticia_21-w700-h400-m1.jpg" />
        <div class="absolute inset-0 bg-navy-blue/40"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-deep-black via-transparent to-transparent"></div>
        <div class="absolute bottom-0 left-0 p-10">
          <span class="bg-primary-red text-white px-3 py-1 font-bold text-[10px] tracking-widest uppercase mb-4 inline-block">Alta Precisión</span>
          <h4 class="text-4xl font-black uppercase text-white mb-4">Retificado</h4>
        </div>
      </div>

      <div class="md:col-span-8 group relative overflow-hidden bg-navy-blue min-h-[450px]">
        <img alt="Precision engineer overseeing intricate work on a milling machine"
          class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000"
          src="https://lh3.googleusercontent.com/aida-public/AB6AXuDdkqm1fznG0VDQM985giOOyg2-RQ32lyT7FhWr0fvgmBDp3sXoshDOSbKs3Bo25lcLbJaUVssfmasKdsTDDVudARrgqAXAYx8QsHDHV-J6jiVsu-Ojuom9flxDOybFNqE_2H3313IB-uLWjEROONEJ9Ctb5jh1XJoiZoKSS3N-2kOxyYNVozcou0tEI7A0kro31o2wtzx7d9yx4cP5Jm7Cj5jhdykJmVQ-9bBNUkf2YmQTFGvQ8t8hLoO6R5uQsB78doe5uUq-U4mx" />
        <div class="absolute inset-0 bg-navy-blue/40"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-deep-black via-transparent to-transparent"></div>
        <div class="absolute bottom-0 left-0 p-10">
          <span class="bg-primary-red text-white px-3 py-1 font-bold text-[10px] tracking-widest uppercase mb-4 inline-block">Corte de Alta Precisión</span>
          <h4 class="text-4xl font-black uppercase text-white mb-4">Fresadora Universal</h4>
          <p class="text-gray-200 max-w-md opacity-0 group-hover:opacity-100 transition-opacity duration-500">
            Capacidad para tallado de engranes y superficies complejas en todo tipo de aleaciones.
          </p>

          <a href="servicios.php#servicios"
            class="flex items-center gap-3 text-primary-red font-black text-sm md:text-base uppercase tracking-widest hover:text-white transition-colors">
            <span>Ver más</span>
            <span class="material-symbols-outlined text-base md:text-lg">arrow_forward</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-20 bg-deep-black border-y border-white/5 overflow-hidden">
  <div class="max-w-7xl mx-auto px-8 mb-12">
    <h4 class="text-center text-primary-red font-bold text-xs uppercase tracking-[0.5em]">
      Socios Estratégicos
    </h4>
  </div>

  <div class="relative w-full overflow-hidden">
    <div class="flex items-center gap-32 animate-logo-scroll px-10 hover:opacity-100">

      <img src="assets/img/bsm.png" class="h-12 object-contain" alt="bsm">
      <img src="assets/img/carey.png" class="h-12 object-contain" alt="carey">
      <img src="assets/img/logoMSI.png" class="h-12 object-contain" alt="MSI">
      <img src="assets/img/bsm.png" class="h-12 object-contain" alt="bsm">

      <img src="assets/img/bsm.png" class="h-12 object-contain" alt="">
      <img src="assets/img/carey.png" class="h-12 object-contain" alt="">
      <img src="assets/img/logoMSI.png" class="h-12 object-contain" alt="">
      <img src="assets/img/bsm.png" class="h-12 object-contain" alt="">
    </div>
  </div>
</section>


<?php include "includes/footer.php"; ?>