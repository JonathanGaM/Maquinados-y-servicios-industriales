<?php include "includes/header.php"; ?>

<!-- HERO / PORTADA SERVICIOS -->
<section class="relative min-h-[70vh] flex items-center pt-16 pb-10 overflow-hidden">
  <div class="absolute inset-0 z-0">
    <img
      alt="Fondo Industrial"
      class="w-full h-full object-cover grayscale brightness-[0.3]"
      src="https://www.mobil.com.mx/lubricantes/-/media/project/wep/mobil/mobil-mx/blog-industrial/engranes/fs-sm.jpg"
    />
    <div class="absolute inset-0 bg-gradient-to-b from-navy-blue/80 to-deep-black/95"></div>
    <div class="industrial-grid absolute inset-0 opacity-10"></div>
  </div>

  <div class="max-w-7xl mx-auto px-8 relative z-10 w-full">
    <div class="flex flex-col items-center text-center">

      <!-- Badge más compacto -->
      <p class="text-primary-red font-bold tracking-[0.28em] text-xs uppercase mb-3 bg-primary-red/10 px-4 py-1 inline-block border-x border-primary-red/30">
        ¿Buscas un servicio especializado?
      </p>

      <!-- Título más pequeño -->
      <h2 class="text-3xl md:text-5xl font-black uppercase leading-none tracking-tight mb-6 text-white">
        Nuestros <span class="text-primary-red">Servicios</span>
      </h2>

      <!-- Texto más compacto -->
      <p class="text-lg md:text-xl text-gray-300 max-w-4xl mx-auto leading-relaxed font-light mb-10">
        Maquinados y Servicios Industriales es una empresa dedicada al mantenimiento industrial. Ofrecemos soluciones integrales de manufactura con tecnología de vanguardia y personal altamente calificado para cumplir con los estándares más exigentes.
      </p>

      <!-- Stats más pequeñas -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 w-full max-w-4xl border-y border-white/10 py-8">
        <div class="flex flex-col items-center group">
          <span class="text-5xl md:text-6xl font-black text-white tracking-tighter mb-1 group-hover:text-primary-red transition-colors">
            100%
          </span>
          <span class="text-primary-red font-black tracking-[0.45em] text-[11px] uppercase">
            Calidad Garantizada
          </span>
        </div>

        <div class="flex flex-col items-center group">
          <span class="text-5xl md:text-6xl font-black text-white tracking-tighter mb-1 group-hover:text-primary-red transition-colors">
 <?= experience_decade(MSI_START_YEAR); ?>+
          </span>
          <span class="text-primary-red font-black tracking-[0.45em] text-[11px] uppercase">
            Años de Experiencia
          </span>
        </div>
      </div>

      <!-- Botones ancla -->
      <div class="mt-8 flex flex-col sm:flex-row gap-4">
        <a href="#servicios"
           class="px-7 py-3 text-[11px] font-black uppercase tracking-widest border border-white/20 text-white bg-white/0
                  hover:bg-primary-red hover:border-primary-red transition-all">
          Servicios que ofrecemos
        </a>

        <a href="#sectores"
           class="px-7 py-3 text-[11px] font-black uppercase tracking-widest border border-white/20 text-white bg-white/0
                  hover:bg-primary-red hover:border-primary-red transition-all">
          Sectores que atendemos
        </a>

        <a href="#materiales"
           class="px-7 py-3 text-[11px] font-black uppercase tracking-widest border border-white/20 text-white bg-white/0
                  hover:bg-primary-red hover:border-primary-red transition-all">
          Capacidades materiales
        </a>
      </div>

    </div>
  </div>
</section>


<!-- GRID SERVICIOS -->
<section id="servicios" class="py-32 bg-deep-black">

  <div class="max-w-7xl mx-auto px-8">

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">

      <!-- CARD: Rectificado -->
      <div class="group relative h-[520px] overflow-hidden border border-white/10 bg-navy-blue shadow-2xl">
        <img
          alt="Servicio de Rectificado"
          class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
          src="https://www.rapiddirect.com/wp-content/uploads/2022/08/CNC-turning-basics.webp"
        />
        <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-navy-blue/70 to-navy-blue/30"></div>

        <div class="absolute inset-0 p-10 flex flex-col justify-end">
          <span class="material-symbols-outlined text-primary-red text-4xl mb-6">architecture</span>
          <h3 class="text-2xl font-black text-white uppercase mb-4 leading-tight">
            Servicio de <br/><span class="text-primary-red">Rectificado</span>
          </h3>
          <p class="text-gray-300 text-sm leading-relaxed mb-8">
            Precisión milimétrica en superficies planas y cilíndricas para acabados de alta calidad y tolerancias críticas.
          </p>
          <a href="contacto.php" class="bg-primary-red hover:bg-white hover:text-navy-blue transition-all text-white font-black text-[10px] tracking-widest uppercase py-4 px-8 self-start rounded-sm">
            Cotizar
          </a>
        </div>
      </div>

      <!-- CARD: Cepillo -->
      <div class="group relative h-[520px] overflow-hidden border border-white/10 bg-navy-blue shadow-2xl">
        <img
          alt="Servicio de Cepillo"
          class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
          src="https://umesal.com/wp-content/uploads/2019/06/C%C3%B3mo-funciona-el-proceso-de-mecanizado.jpg"
        />
        <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-navy-blue/70 to-navy-blue/30"></div>

        <div class="absolute inset-0 p-10 flex flex-col justify-end">
          <span class="material-symbols-outlined text-primary-red text-4xl mb-6">hardware</span>
          <h3 class="text-2xl font-black text-white uppercase mb-4 leading-tight">
            Servicio de <br/><span class="text-primary-red">Cepillo</span>
          </h3>
          <p class="text-gray-300 text-sm leading-relaxed mb-8">
            Maquinado de piezas de gran tamaño y superficies planas con alta remoción y precisión estructural.
          </p>
          <a href="contacto.php" class="bg-primary-red hover:bg-white hover:text-navy-blue transition-all text-white font-black text-[10px] tracking-widest uppercase py-4 px-8 self-start rounded-sm">
            Cotizar
          </a>
        </div>
      </div>

      <!-- CARD: Soldadura -->
      <div class="group relative h-[520px] overflow-hidden border border-white/10 bg-navy-blue shadow-2xl">
         <img
          alt="Tornos CNC"
          class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
          src="https://www.metalmecanica.com/uploads/news-pictures/pphoto-3769.png"
        />
        <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-navy-blue/70 to-navy-blue/30"></div>

        <div class="absolute inset-0 p-10 flex flex-col justify-end">
          <span class="material-symbols-outlined text-primary-red text-4xl mb-6">smart_toy</span>
          <h3 class="text-2xl font-black text-white uppercase mb-4 leading-tight">
            <span class="text-primary-red">Tornos</span><br/>CNC
          </h3>
          <p class="text-gray-300 text-sm leading-relaxed mb-8">
            Producción en serie y piezas de alta complejidad técnica mediante control numérico computarizado.
          </p>
          <a href="contacto.php" class="bg-primary-red hover:bg-white hover:text-navy-blue transition-all text-white font-black text-[10px] tracking-widest uppercase py-4 px-8 self-start rounded-sm">
            Cotizar
          </a>
        </div>
      </div>

      <!-- CARD: Engranes -->
      <div class="group relative h-[520px] overflow-hidden border border-white/10 bg-navy-blue shadow-2xl">
        <img
          alt="Fabricación de Engranes"
          class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
          src="https://acerostorices.com/wp-content/uploads/2024/01/imagen-de-diversos-engranajes.jpg"
        />
        <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-navy-blue/70 to-navy-blue/30"></div>

        <div class="absolute inset-0 p-10 flex flex-col justify-end">
          <span class="material-symbols-outlined text-primary-red text-4xl mb-6">settings_suggest</span>
          <h3 class="text-2xl font-black text-white uppercase mb-4 leading-tight">
            Fabricación de <br/><span class="text-primary-red">Engranes</span>
          </h3>
          <p class="text-gray-300 text-sm leading-relaxed mb-8">
            Diseño y manufactura de piñones, coronas y engranajes rectos o helicoidales bajo plano o muestra.
          </p>
          <a href="contacto.php" class="bg-primary-red hover:bg-white hover:text-navy-blue transition-all text-white font-black text-[10px] tracking-widest uppercase py-4 px-8 self-start rounded-sm">
            Cotizar
          </a>
        </div>
      </div>

      <!-- CARD: Torno -->
      <div class="group relative h-[520px] overflow-hidden border border-white/10 bg-navy-blue shadow-2xl">
        <img
          alt="Servicio de Torno"
          class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
          src="https://jlmetalmecanica.com/wp-content/uploads/2023/09/SERVICIO-DE-TORNO.jpg"
        />
        <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-navy-blue/70 to-navy-blue/30"></div>

        <div class="absolute inset-0 p-10 flex flex-col justify-end">
          <span class="material-symbols-outlined text-primary-red text-4xl mb-6">build_circle</span>
          <h3 class="text-2xl font-black text-white uppercase mb-4 leading-tight">
            Servicio de <br/><span class="text-primary-red">Torno</span>
          </h3>
          <p class="text-gray-300 text-sm leading-relaxed mb-8">
            Fabricación de ejes, bujes y piezas cilíndricas con acabados técnicos y precisión dimensional.
          </p>
          <a href="contacto.php" class="bg-primary-red hover:bg-white hover:text-navy-blue transition-all text-white font-black text-[10px] tracking-widest uppercase py-4 px-8 self-start rounded-sm">
            Cotizar
          </a>
        </div>
      </div>

      <!-- CARD: Fresadora -->
      <div class="group relative h-[520px] overflow-hidden border border-white/10 bg-navy-blue shadow-2xl">
        <img
          alt="Servicio de Fresadora"
          class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
          src="https://lh3.googleusercontent.com/aida-public/AB6AXuAJNVjBzyAR1abkbPp9sjxuQogGh1wMillxRuMEcg8XC6Qma00Fm9k3o5LZpoGngB3tbvENoo1FNVsV-6wcOUbud_kfvk997cbtwV_Vm-05BAbTIadRMthj4LaBTAqyDomzWbkPl7a3OJFOk1398T7OWqF8rLkH8oYNSyuYiKExV2GYw5wf3vunK1V-HlllCaiQROibu2P0A91qeOums1HSeijA9FY_r5mgJA-p4rJhbuSh0f4v42THqaSvlZXI3wUx-_qeJfRcAvSv"
        />
        <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-navy-blue/70 to-navy-blue/30"></div>

        <div class="absolute inset-0 p-10 flex flex-col justify-end">
          <span class="material-symbols-outlined text-primary-red text-4xl mb-6">category</span>
          <h3 class="text-2xl font-black text-white uppercase mb-4 leading-tight">
            Servicio de <br/><span class="text-primary-red">Fresadora</span>
          </h3>
          <p class="text-gray-300 text-sm leading-relaxed mb-8">
            Mecanizado para chaveteros, cajas y componentes geométricos complejos con alta repetibilidad.
          </p>
          <a href="contacto.php" class="bg-primary-red hover:bg-white hover:text-navy-blue transition-all text-white font-black text-[10px] tracking-widest uppercase py-4 px-8 self-start rounded-sm">
            Cotizar
          </a>
        </div>
      </div>

    </div>

   

  </div>
  
</section>
<section id="sectores" class="py-24 bg-navy-blue relative overflow-hidden">

  <!-- overlays (todo inline) -->
  <div class="absolute inset-0 bg-[radial-gradient(circle_at_1px_1px,rgba(255,255,255,0.08)_1px,transparent_0)] [background-size:40px_40px] opacity-20"></div>
  <div class="absolute inset-0 bg-gradient-to-b from-navy-blue/70 via-navy-blue/60 to-deep-black/90"></div>

  <div class="max-w-7xl mx-auto px-8 relative z-10">
    <div class="text-center mb-16">
      <span class="text-primary-red font-black tracking-[0.4em] text-[10px] uppercase">
        Mercados Atendidos
      </span>
      <h3 class="text-4xl md:text-5xl font-black text-white uppercase mt-4">
        Sectores que Atendemos
      </h3>
      <div class="w-24 h-[2px] bg-primary-red mx-auto mt-6"></div>
    </div>

    <div class="grid grid-cols-2 lg:grid-cols-3 gap-6">

      <!-- Automotriz -->
      <div class="relative h-64 overflow-hidden group border border-white/10 bg-deep-black">
        <img
          alt="Automotriz"
          class="absolute inset-0 w-full h-full object-cover grayscale brightness-[0.45] transition-all duration-700 group-hover:scale-110 group-hover:grayscale-0"
          src="https://cdn.club-magazin.autodoc.de/uploads/sites/11/2020/12/motor-de-combustion-interna-de-un-automovil.jpg"
        />
        <div class="absolute inset-0 bg-deep-black/70 group-hover:bg-deep-black/20 transition-all duration-500 flex flex-col items-center justify-center p-6">
          <span class="material-symbols-outlined text-4xl mb-4 text-white">directions_car</span>
          <h5 class="text-white font-black uppercase tracking-widest text-lg">Automotriz</h5>
        </div>
      </div>

      <!-- Aeronáutica -->
      <div class="relative h-64 overflow-hidden group border border-white/10 bg-deep-black">
        <img
          alt="Aeronáutica"
          class="absolute inset-0 w-full h-full object-cover grayscale brightness-[0.45] transition-all duration-700 group-hover:scale-110 group-hover:grayscale-0"
          src="https://storage.googleapis.com/medium-feed.appspot.com/images%2F9353691196%2F15628bee6d866-1716899179_604_7-principais-materiais-usados-%25E2%2580%258B%25E2%2580%258Bem-motores-de-aeronaves-um-guia.jpg"
        />
        <div class="absolute inset-0 bg-deep-black/70 group-hover:bg-deep-black/20
 transition-all duration-500 flex flex-col items-center justify-center p-6">
          <span class="material-symbols-outlined text-4xl mb-4 text-white">flight</span>
          <h5 class="text-white font-black uppercase tracking-widest text-lg">Aeronáutica</h5>
        </div>
      </div>

      <!-- Metal-Mecánica -->
      <div class="relative h-64 overflow-hidden group border border-white/10 bg-deep-black">
        <img
          alt="Metal-Mecánica"
          class="absolute inset-0 w-full h-full object-cover grayscale brightness-[0.45] transition-all duration-700 group-hover:scale-110 group-hover:grayscale-0"
          src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQtSTCbbFwtoOuDTFm4wtTfdsFb_TTA8NWY-Q&s"
        />
        <div class="absolute inset-0 bg-deep-black/70 group-hover:bg-deep-black/20
 transition-all duration-500 flex flex-col items-center justify-center p-6">
          <span class="material-symbols-outlined text-4xl mb-4 text-white">factory</span>
          <h5 class="text-white font-black uppercase tracking-widest text-lg">Metal-Mecánica</h5>
        </div>
      </div>

      <!-- Alimenticia -->
      <div class="relative h-64 overflow-hidden group border border-white/10 bg-deep-black">
        <img
          alt="Alimenticia"
          class="absolute inset-0 w-full h-full object-cover grayscale brightness-[0.45] transition-all duration-700 group-hover:scale-110 group-hover:grayscale-0"
          src="https://www.rrhhdigital.com/wp-content/uploads/userfiles/fabrica-alimentacion-comida.jpg"
        />
        <div class="absolute inset-0 bg-deep-black/70 group-hover:bg-deep-black/20
 transition-all duration-500 flex flex-col items-center justify-center p-6">
          <span class="material-symbols-outlined text-4xl mb-4 text-white">restaurant</span>
          <h5 class="text-white font-black uppercase tracking-widest text-lg">Alimenticia</h5>
        </div>
      </div>

      <!-- Agrícola -->
      <div class="relative h-64 overflow-hidden group border border-white/10 bg-deep-black">
        <img
          alt="Agrícola"
          class="absolute inset-0 w-full h-full object-cover grayscale brightness-[0.45] transition-all duration-700 group-hover:scale-110 group-hover:grayscale-0"
          src="https://www.spmas.es/wp-content/uploads/2023/03/Post-3-PRL-Sector-Agricola.jpg"
        />
        <div class="absolute inset-0 bg-deep-black/70 group-hover:bg-deep-black/20
 transition-all duration-500 flex flex-col items-center justify-center p-6">
          <span class="material-symbols-outlined text-4xl mb-4 text-white">agriculture</span>
          <h5 class="text-white font-black uppercase tracking-widest text-lg">Agrícola</h5>
        </div>
      </div>

      <!-- Electrónica -->
      <div class="relative h-64 overflow-hidden group border border-white/10 bg-deep-black">
        <img
          alt="Electrónica"
          class="absolute inset-0 w-full h-full object-cover grayscale brightness-[0.45] transition-all duration-700 group-hover:scale-110 group-hover:grayscale-0"
          src="https://www.vencoel.com/wp-content/uploads/2023/11/normativas-electronica.jpg"
        />
        <div class="absolute inset-0 bg-deep-black/70 group-hover:bg-deep-black/20
 transition-all duration-500 flex flex-col items-center justify-center p-6">
          <span class="material-symbols-outlined text-4xl mb-4 text-white">memory</span>
          <h5 class="text-white font-black uppercase tracking-widest text-lg">Electrónica</h5>
        </div>
      </div>

    </div>
  </div>
</section>
<section id="materiales" class="py-24 bg-deep-black">

  <div class="max-w-7xl mx-auto px-8">

    <div class="border border-white/10 p-10 md:p-12 flex flex-col lg:flex-row items-center gap-16
                bg-navy-blue/60 relative overflow-hidden">

      <!-- Grid tipo blueprint inline -->
      <div class="absolute inset-0 bg-[linear-gradient(rgba(255,255,255,0.06)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.06)_1px,transparent_1px)] [background-size:22px_22px] opacity-30"></div>
      <div class="absolute inset-0 bg-gradient-to-r from-deep-black/40 via-transparent to-deep-black/20"></div>

      <div class="lg:w-1/2 relative z-10">
        <span class="text-primary-red font-black tracking-[0.4em] text-[10px] uppercase">Capacidades de Material</span>
        <h3 class="text-4xl font-black text-white uppercase mt-4 mb-8">Expertos en Materiales Especiales</h3>

        <p class="text-gray-300 text-lg leading-relaxed mb-8">
          Contamos con la experiencia y herramientas para el maquinado de todo tipo de aceros ferrosos y no ferrosos:
        </p>

        <ul class="grid grid-cols-2 gap-4">
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
  src="https://www.zintilon.com/wp-content/uploads/2024/07/ferrous-metals-vs-non-ferrous-metals-880x608.png"
/>

          
        </div>

        <div class="absolute -bottom-6 -right-6 w-full h-full border-2 border-primary-red/20 -z-0"></div>
      </div>

    </div>

  </div>
</section>

<?php include "includes/footer.php"; ?>
