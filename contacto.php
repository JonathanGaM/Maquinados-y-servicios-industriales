<?php include "includes/header.php"; ?>

<main class="relative overflow-hidden">
  <!-- FONDO -->
  <div class="absolute inset-0 z-0 overflow-hidden">
    <img
      alt="Industrial Background"
      class="parallax-bg absolute inset-0 w-full h-full object-cover"
      src="https://img.freepik.com/fotos-premium/trabajador-uniforme-casco-trabaja-torno-planta-produccion-industrial-ingenieria-metalurgica-fabricacion-maquinas-electricas_266732-23652.jpg" />
    <div class="absolute inset-0 bg-black/70"></div>
    <div class="absolute inset-0 industrial-grid opacity-10"></div>
  </div>

  <!-- CONTENIDO -->
  <div class="relative z-10 max-w-7xl mx-auto w-full px-5 sm:px-6 lg:px-12 py-14 sm:py-20 lg:py-24">
    <div class="grid lg:grid-cols-2 gap-10 lg:gap-20 items-start lg:items-center">

      <!-- INFO -->
      <div class="space-y-10 sm:space-y-12">
        <div>
          <div class="inline-flex items-center gap-4 mb-6">
            <div class="h-[3px] w-12 bg-primary-red"></div>
            <span class="text-primary-red font-black tracking-[0.4em] text-xs uppercase">Establecer Conexión</span>
          </div>

          <h2 class="text-4xl md:text-6xl font-black uppercase leading-[0.95] tracking-tight mb-6 text-white">
            HABLEMOS DE <br /><span class="text-primary-red">SU PROYECTO</span>
          </h2>

          <p class="text-base sm:text-lg text-gray-300 leading-relaxed font-light max-w-[95%] sm:max-w-md">
            Contamos con la infraestructura y experiencia necesaria para materializar sus requerimientos de maquinado más exigentes.
          </p>
        </div>

        <div class="space-y-7 sm:space-y-8">
          <div class="flex items-start gap-5 sm:gap-6">
            <div class="w-12 h-12 bg-white/5 border border-white/10 rounded-sm flex items-center justify-center text-primary-red shrink-0 transition-transform hover:scale-110">
              <span class="material-symbols-outlined text-2xl">location_on</span>
            </div>
            <div class="min-w-0">
              <h4 class="text-xs font-black uppercase tracking-widest text-primary-red mb-1">Ubicación Planta</h4>
              <p class="text-gray-200 text-sm leading-relaxed break-words">
                20 de Noviembre No.361,<br />Col. Zona Centro, Gdl, Jal.
              </p>
            </div>
          </div>

          <div class="flex items-start gap-5 sm:gap-6">
            <div class="w-12 h-12 bg-white/5 border border-white/10 rounded-sm flex items-center justify-center text-primary-red shrink-0 transition-transform hover:scale-110">
              <span class="material-symbols-outlined text-2xl">call</span>
            </div>
            <div>
              <h4 class="text-xs font-black uppercase tracking-widest text-primary-red mb-1">Línea Directa</h4>
              <p class="text-gray-200 text-sm leading-relaxed">01 33 3617-5426</p>
            </div>
          </div>

          <div class="flex items-start gap-5 sm:gap-6">
            <div class="w-12 h-12 bg-white/5 border border-white/10 rounded-sm flex items-center justify-center text-primary-red shrink-0 transition-transform hover:scale-110">
              <span class="material-symbols-outlined text-2xl">chat</span>
            </div>
            <div class="min-w-0">

              <h4 class="text-xs font-black uppercase tracking-widest text-primary-red mb-1">WhatsApp Business</h4>
              <p class="text-gray-200 text-sm leading-relaxed">+52 13 33157-6129</p>
            </div>
          </div>

          <div class="flex items-start gap-5 sm:gap-6">
            <div class="w-12 h-12 bg-white/5 border border-white/10 rounded-sm flex items-center justify-center text-primary-red shrink-0 transition-transform hover:scale-110">
              <span class="material-symbols-outlined text-2xl">mail</span>
            </div>
            <div class="min-w-0">
              <h4 class="text-xs font-black uppercase tracking-widest text-primary-red mb-1">Correo Electrónico</h4>
              <p class="text-gray-200 text-sm leading-relaxed break-all">
                contacto@maquinadosyserviciosindustriales.com
              </p>
            </div>
          </div>

          <div class="pt-6 border-t border-white/10">
            <div class="flex items-start gap-3">
              <span class="material-symbols-outlined text-primary-red text-sm mt-[1px] shrink-0">schedule</span>

              <p class="min-w-0 text-gray-400 text-[11px] font-bold uppercase tracking-widest leading-relaxed break-words">
                Horario de Atención: Lunes a Viernes, 9:00 AM - 6:30 PM y Sabados, 9:00 AM - 2:00 PM
              </p>
            </div>
          </div>

        </div>
      </div>

      <!-- FORM -->
      <div class="w-full flex justify-center lg:justify-end mt-8 lg:mt-0">
        <div class="glass-morphism w-full max-w-xl p-6 sm:p-10 md:p-14 rounded-sm shadow-2xl relative overflow-hidden">
          <div class="absolute top-0 right-0 w-32 h-32 bg-primary-red/10 rounded-full blur-3xl -mr-16 -mt-16"></div>

          <h3 class="text-2xl font-black uppercase tracking-tight text-white mb-8 flex items-center gap-3">
            <span class="w-2 h-2 bg-primary-red"></span>
            Solicitar Cotización
          </h3>

          <form action="includes/send_mail.php" method="POST" class="space-y-6">
            <div class="grid md:grid-cols-2 gap-6">
              <div class="space-y-2">
                <label class="text-[10px] font-black uppercase tracking-widest text-gray-400">Nombre Completo</label>
                <input name="nombre" type="text" required placeholder="Ej. Juan Pérez"
                  class="w-full bg-white/5 border border-white/10 focus:border-primary-red focus:ring-0 text-white placeholder-gray-500 transition-colors py-3 px-4 text-sm" />
              </div>

              <div class="space-y-2">
                <label class="text-[10px] font-black uppercase tracking-widest text-gray-400">Correo Electrónico</label>
                <input name="email" type="email" required placeholder="email@empresa.com"
                  class="w-full bg-white/5 border border-white/10 focus:border-primary-red focus:ring-0 text-white placeholder-gray-500 transition-colors py-3 px-4 text-sm" />
              </div>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
              <div class="space-y-2">
                <label class="text-[10px] font-black uppercase tracking-widest text-gray-400">Teléfono / WhatsApp</label>
                <input name="telefono" type="tel" required placeholder="10 dígitos"
                  class="w-full bg-white/5 border border-white/10 focus:border-primary-red focus:ring-0 text-white placeholder-gray-500 transition-colors py-3 px-4 text-sm" />
              </div>

              <div class="space-y-2">
                <label class="text-[10px] font-black uppercase tracking-widest text-gray-400">Servicio de Interés</label>
                <select name="servicio" required
                  class="w-full bg-white/5 border border-white/10 focus:border-primary-red focus:ring-0 text-white transition-colors py-3 px-4 text-sm appearance-none">
                  <option class="bg-navy-blue" value="">Seleccione una opción</option>
                  <option class="bg-navy-blue" value="Maquinado de Precisión">Maquinado de Precisión</option>
                  <option class="bg-navy-blue" value="Mantenimiento Industrial">Mantenimiento Industrial</option>
                  <option class="bg-navy-blue" value="Maquinado CNC">Maquinado CNC</option>
                  <option class="bg-navy-blue" value="Proyectos Especiales">Proyectos Especiales</option>
                </select>
              </div>
            </div>

            <div class="space-y-2">
              <label class="text-[10px] font-black uppercase tracking-widest text-gray-400">Mensaje / Detalles del Proyecto</label>
              <textarea name="mensaje" required
                class="w-full bg-white/5 border border-white/10 focus:border-primary-red focus:ring-0 text-white placeholder-gray-500 transition-colors py-3 px-4 text-sm h-32"
                placeholder="Describa brevemente su requerimiento..."></textarea>
            </div>

            <button class="btn-sweep w-full bg-primary-red hover:bg-red-700 text-white py-4 px-8 text-xs font-black uppercase tracking-[0.2em] transition-all flex items-center justify-center gap-3">
              Enviar Requerimiento
              <span class="material-symbols-outlined text-sm">send</span>
            </button>
          </form>
        </div>
      </div>

    </div>
  </div>
</main>

<?php include "includes/footer.php"; ?>


<?php if (isset($_GET["ok"])): ?>
  <div id="msgSuccess" class="fixed inset-0 z-[999] flex items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="bg-deep-black border border-primary-red/40 rounded-sm px-8 py-6 text-center shadow-2xl animate-fade-in max-w-sm">
      <span class="material-symbols-outlined text-primary-red text-4xl mb-3 block">check_circle</span>
      <h3 class="text-sm font-black uppercase tracking-widest mb-2 text-white">
        Mensaje enviado
      </h3>
      <p class="text-gray-400 text-xs leading-relaxed">
        Gracias por contactarnos.
      </p>
    </div>
  </div>

  <script>
    setTimeout(() => {
      const box = document.getElementById("msgSuccess");
      box.style.opacity = "0";
      setTimeout(() => {
        box.remove();
        history.replaceState(null, null, location.pathname);
      }, 400);
    }, 3500);
  </script>

  <style>
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: scale(.9)
      }

      to {
        opacity: 1;
        transform: scale(1)
      }
    }

    .animate-fade-in {
      animation: fadeIn .3s ease-out;
    }
  </style>
<?php endif; ?>