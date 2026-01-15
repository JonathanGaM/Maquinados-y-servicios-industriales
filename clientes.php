
<?php include "includes/header.php"; ?>

<!-- HERO CLIENTES -->
<section class="relative h-[60vh] flex items-center overflow-hidden bg-deep-black">
  <img
    alt="Fondo Industrial"
    class="absolute inset-0 w-full h-full object-cover opacity-60 saturate-0 brightness-[0.35]"
    src="https://mspcorp.ca/wp-content/uploads/2021/12/MSPC-Blog-12-22-21-Blog.jpg"
  />
  <div class="absolute inset-0 bg-navy-blue/85"></div>
  <div class="absolute inset-0 industrial-grid opacity-10"></div>

  <div class="relative max-w-7xl mx-auto px-8 md:px-12 w-full">
    <div class="max-w-3xl">
      <div class="inline-flex items-center gap-4 mb-6">
        <div class="h-[3px] w-12 bg-primary-red"></div>
        <span class="text-primary-red font-black tracking-[0.4em] text-xs uppercase">
          Portafolio de Confianza
        </span>
      </div>

      <h2 class="text-5xl md:text-7xl font-black uppercase leading-[0.9] tracking-tighter mb-8 text-white">
        NUESTROS <br/><span class="text-primary-red">CLIENTES</span>
      </h2>

      <p class="text-xl text-gray-300 leading-relaxed font-light">
        Aliados estratégicos que confían en nuestra precisión técnica para el mantenimiento industrial y la fabricación de componentes críticos en sus procesos productivos.
      </p>
    </div>
  </div>
</section>

<!-- STATS -->
<section class="bg-white border-b border-gray-100 py-12 relative z-10 shadow-sm">
  <div class="max-w-7xl mx-auto px-8 md:px-12">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
      <div class="flex items-center gap-6">
        <span class="text-7xl font-black text-primary-red">30+</span>
        <div>
          <h3 class="text-2xl font-black text-navy-blue uppercase tracking-tight">Años de Experiencia</h3>
          <p class="text-sm font-bold text-gray-400 uppercase tracking-widest">Trayectoria comprobada en el mercado</p>
        </div>
      </div>

      <div class="flex items-center gap-6 md:justify-end">
        <div class="text-right">
          <h3 class="text-2xl font-black text-navy-blue uppercase tracking-tight">100% Calidad</h3>
          <p class="text-sm font-bold text-gray-400 uppercase tracking-widest">SATISFACCIÓN DEL CLIENTE GARANTIZADA</p>
        </div>
        <span class="material-symbols-outlined text-primary-red text-6xl">verified</span>
      </div>
    </div>
  </div>
</section>

<!-- GRID CLIENTES -->
<section class="py-24 bg-gray-50 industrial-grid">
  <div class="max-w-7xl mx-auto px-8 md:px-12">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

      <!-- CARD 1 -->
      <div class="client-card bg-white group border border-gray-200 hover:border-primary-red transition-all duration-300 overflow-hidden flex flex-col">
        <div class="h-48 overflow-hidden relative">
          <img
            alt="Corporación de Occidente"
            class="client-card-img w-full h-full object-cover"
            src="https://lh3.googleusercontent.com/aida-public/AB6AXuCpBC-_JhMzhwyZgRsVWCV5tZwyK604FHISyE23Uf-OBHdppoNB6OhEC9JwqeKCy0OF8OyEzA4wKXZYbcNjrNsGwiOCbNwo0nkcNAZWqpLGN6jCO-3Ip7eKjHYKs1VNqUuGXxbBHum2a_AAc3qHmHShdcPcwpy9O5HvLR9X0h2m4OpmA0DbtIhbTj6Yd7dUw6v0tR2copVTBftA-uWUYULDjjjo7l6MCZsmyj5b-LulT_AH15Jg9Srst3F2MAVsAba3-LSvHz7VAArF"
          />
          <div class="absolute inset-0 bg-navy-blue/20 group-hover:bg-transparent transition-colors"></div>
        </div>

        <div class="p-8 flex flex-col flex-grow">
          <h4 class="text-lg font-black text-navy-blue uppercase mb-3 tracking-tight">CORPORACIÓN DE OCCIDENTE</h4>
          <p class="text-gray-600 text-sm leading-relaxed mb-6">
            Líderes en manufactura pesada y logística, requieren componentes de alta resistencia para su flota operativa.
          </p>
          <div class="mt-auto pt-6 border-t border-gray-100">
            <span class="text-[10px] font-bold text-primary-red uppercase tracking-[0.2em]">Socio desde 2010</span>
          </div>
        </div>
      </div>

      <!-- CARD 2 -->
      <div class="client-card bg-white group border border-gray-200 hover:border-primary-red transition-all duration-300 overflow-hidden flex flex-col">
        <div class="h-48 overflow-hidden relative">
          <img
            alt="BSM"
            class="client-card-img w-full h-full object-cover"
            src="assets/img/bsm.png"
          />
          <div class="absolute inset-0 bg-navy-blue/20 group-hover:bg-transparent transition-colors"></div>
        </div>

        <div class="p-8 flex flex-col flex-grow">
          <h4 class="text-lg font-black text-navy-blue uppercase mb-3 tracking-tight">BSM</h4>
          <p class="text-gray-600 text-sm leading-relaxed mb-6">
            Especialistas en la industria azucarera, confían en nuestra reparación de sinfines y coronas de gran escala.
          </p>
          <div class="mt-auto pt-6 border-t border-gray-100">
            <span class="text-[10px] font-bold text-primary-red uppercase tracking-[0.2em]">Mantenimiento Crítico</span>
          </div>
        </div>
      </div>

      <!-- CARD 3 -->
      <div class="client-card bg-white group border border-gray-200 hover:border-primary-red transition-all duration-300 overflow-hidden flex flex-col">
        <div class="h-48 overflow-hidden relative">
          <img
            alt="Carey"
            class="client-card-img w-full h-full object-cover"
            src="assets/img/carey.png"
          />
          <div class="absolute inset-0 bg-navy-blue/20 group-hover:bg-transparent transition-colors"></div>
        </div>

        <div class="p-8 flex flex-col flex-grow">
          <h4 class="text-lg font-black text-navy-blue uppercase mb-3 tracking-tight">CAREY</h4>
          <p class="text-gray-600 text-sm leading-relaxed mb-6">
            Empresa del sector agroindustrial que utiliza nuestra tecnología CNC para la fabricación de herramentales especializados.
          </p>
          <div class="mt-auto pt-6 border-t border-gray-100">
            <span class="text-[10px] font-bold text-primary-red uppercase tracking-[0.2em]">Precisión Agrícola</span>
          </div>
        </div>
      </div>

      <!-- CARD 4 -->
      <div class="client-card bg-white group border border-gray-200 hover:border-primary-red transition-all duration-300 overflow-hidden flex flex-col">
        <div class="h-48 overflow-hidden relative">
          <img
            alt="Latex Mexicana"
            class="client-card-img w-full h-full object-cover"
            src="https://lh3.googleusercontent.com/aida-public/AB6AXuCZ09B5wv6uIk2tIImsniQwNSKL3RsG6zE9aDP0OI2azXEa9oKdGmQPLjJ_j-KfT3HhwC0UCUm6SnX_N41epgELXa4xkG8qN7acqhHDn2ZZcc6gACYU50o4uKxTZW8KRoAD0_v-H6VD3Bc1MVytmHUIUodZW9lXmY8ngdjXlEBhB76zKPkticwvb4vO0yBzt8Wo_nzCH5PltzEeaFDoruFUXYmCq7EGARySgpX03HbBzBuDTSZkvo934twn95UpmNfpDdPu7byO4nS4"
          />
          <div class="absolute inset-0 bg-navy-blue/20 group-hover:bg-transparent transition-colors"></div>
        </div>

        <div class="p-8 flex flex-col flex-grow">
          <h4 class="text-lg font-black text-navy-blue uppercase mb-3 tracking-tight">LATEX MEXICANA</h4>
          <p class="text-gray-600 text-sm leading-relaxed mb-6">
            Principales productores de derivados del látex, requieren piezas de acero inoxidable con acabados sanitarios de alta precisión.
          </p>
          <div class="mt-auto pt-6 border-t border-gray-100">
            <span class="text-[10px] font-bold text-primary-red uppercase tracking-[0.2em]">Materiales Especiales</span>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- CTA -->
<section class="py-24 bg-navy-blue text-white overflow-hidden relative">
  <div class="max-w-7xl mx-auto px-8 md:px-12 text-center relative z-10">
    <h3 class="text-4xl md:text-5xl font-black uppercase mb-8 tracking-tight">
      ¿Listo para elevar sus <span class="text-primary-red">estándares industriales?</span>
    </h3>
    <p class="text-xl text-gray-400 mb-12 max-w-2xl mx-auto font-light leading-relaxed">
      Únase a nuestro portafolio de clientes satisfechos y descubra por qué somos el referente en maquinados de precisión.
    </p>
    <div class="flex flex-col md:flex-row items-center justify-center gap-6">
     
      <a href="servicios.php"
             class="bg-primary-red hover:bg-red-700 text-white px-12 py-4 text-sm font-black uppercase tracking-widest transition-all">
            Ver servicios 
            <span class="material-symbols-outlined text-sm">arrow_forward</span>
          </a>
     <a href="contacto.php"
             class="border border-white/20 hover:bg-white hover:text-navy-blue text-white px-12 py-4 text-sm font-black uppercase tracking-widest transition-all">
             Contáctanos
           
          </a>
     
    </div>
  </div>
</section>

<?php include "includes/footer.php"; ?>

