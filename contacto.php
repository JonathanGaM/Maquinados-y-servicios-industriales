  <?php
  require_once __DIR__ . "/includes/core/db.php";
  require_once __DIR__ . "/includes/core/db-safe.php";
  require_once __DIR__ . "/includes/core/fallbacks.php";

  /* =========================
    EMPRESA (BD → fallback)
    ========================= */
  $empresa = db_first_row(
    "SELECT nombre, ubicacion, telefono, whatsapp, correo, horarios
    FROM empresa
    LIMIT 1",
    [],
    $fallback_empresa
  );

  /* =========================
    SERVICIOS PARA COMBOBOX
    (solo nombre)
    ========================= */
  $serviciosForm = [];

  if ($pdo instanceof PDO) {
    try {
      $stmt = $pdo->query("SELECT nombre FROM servicios ORDER BY id ASC");
      $serviciosForm = $stmt->fetchAll(PDO::FETCH_COLUMN);
    } catch (Throwable $e) {
      $serviciosForm = [];
    }
  }

  /* Si BD falla → fallback */
  if (empty($serviciosForm)) {
    $serviciosForm = array_map(
      fn($s) => $s["nombre"],
      $fallback_servicios
    );
  }

  /* Escape helper */
  function e(string $v): string
  {
    return htmlspecialchars($v, ENT_QUOTES, "UTF-8");
  }

  /* WhatsApp limpio */
  $waRaw = (string)($empresa["whatsapp"] ?? "");
  $waDigits = preg_replace("/\D+/", "", $waRaw);

  $hideTopBar = true;
  include "includes/ui/header.php";
  ?>


  <main class="relative overflow-hidden">
    <!-- FONDO -->
    <div class="absolute inset-0 z-0 overflow-hidden">
      <img
        alt="Industrial Background"
        class="parallax-bg absolute inset-0 w-full h-full object-cover"
        src="assets/img/contacto.png" />
      <div class="absolute inset-0 bg-black/70"></div>
      <div class="absolute inset-0 industrial-grid opacity-10"></div>
    </div>

    <!-- CONTENIDO -->
<div class="relative z-10 max-w-7xl mx-auto w-full 
px-5 sm:px-6 lg:px-12 
pt-4 sm:pt-6 lg:pt-8 
pb-10 sm:pb-14 lg:pb-16">
      <div class="grid lg:grid-cols-2 gap-10 lg:gap-20 items-start lg:items-center">

        <!-- INFO -->
        <div class="space-y-6 sm:space-y-8 text-center lg:text-left reveal zoom-text">

          <div>
            <div class="inline-flex items-center gap-4 mb-6 justify-center lg:justify-start">
              <div class="h-[3px] w-12 bg-primary-red"></div>
              <span class="text-primary-red font-black tracking-[0.4em] text-[10px] sm:text-xs uppercase">
                Establecer Conexión
              </span>
            </div>

            <h2 class="text-2xl sm:text-3xl md:text-5xl font-black uppercase leading-[0.95] tracking-tight mb-4 text-white">
              HABLEMOS DE <br /><span class="text-primary-red">SU PROYECTO</span>
            </h2>


            <p class="text-sm sm:text-base md:text-lg text-gray-300 leading-relaxed font-light mx-auto lg:mx-0 max-w-xl">
              Contamos con la infraestructura y experiencia necesaria para materializar sus requerimientos de maquinado más exigentes.
            </p>
          </div>

          <div class="space-y-4 sm:space-y-5 max-w-xl mx-auto lg:mx-0 text-left">
            <div class="flex items-start gap-4 sm:gap-6">
              <div class="w-11 h-11 sm:w-12 sm:h-12 bg-white/5 border border-white/10 rounded-sm flex items-center justify-center text-primary-red shrink-0 transition-transform hover:scale-110">
                <span class="material-symbols-outlined text-2xl">location_on</span>
              </div>
              <div class="min-w-0">
                <h4 class="text-[10px] sm:text-xs font-black uppercase tracking-widest text-primary-red mb-1">Ubicación Planta</h4>
                <p class="text-gray-200 text-sm leading-relaxed break-words">
                  <?= e((string)($empresa["ubicacion"] ?? "")); ?>
                </p>
              </div>
            </div>

            <div class="flex items-start gap-4 sm:gap-6">
              <div class="w-11 h-11 sm:w-12 sm:h-12 bg-white/5 border border-white/10 rounded-sm flex items-center justify-center text-primary-red shrink-0 transition-transform hover:scale-110">
                <span class="material-symbols-outlined text-2xl">call</span>
              </div>
              <div class="min-w-0">
                <h4 class="text-[10px] sm:text-xs font-black uppercase tracking-widest text-primary-red mb-1">Línea Directa</h4>
                <p class="text-gray-200 text-sm leading-relaxed break-words">
                  <?= e((string)($empresa["telefono"] ?? "")); ?>
                </p>
              </div>
            </div>

            <div class="flex items-start gap-4 sm:gap-6">
              <div class="w-11 h-11 sm:w-12 sm:h-12 bg-white/5 border border-white/10 rounded-sm flex items-center justify-center text-primary-red shrink-0 transition-transform hover:scale-110">
                <span class="material-symbols-outlined text-2xl">chat</span>
              </div>
              <div class="min-w-0">
                <h4 class="text-[10px] sm:text-xs font-black uppercase tracking-widest text-primary-red mb-1">WhatsApp Business</h4>

                <?php if ($waDigits !== ""): ?>
                  <a
                    class="text-gray-200 text-sm leading-relaxed break-words hover:text-primary-red transition-colors inline-flex items-center gap-2"
                    href="https://wa.me/<?= e($waDigits); ?>"
                    target="_blank"
                    rel="noopener">
                    <?= e($waRaw); ?>
                    <span class="material-symbols-outlined text-[18px]">open_in_new</span>
                  </a>
                <?php else: ?>
                  <p class="text-gray-200 text-sm leading-relaxed break-words">
                    <?= e($waRaw); ?>
                  </p>
                <?php endif; ?>
              </div>
            </div>

            <div class="flex items-start gap-4 sm:gap-6">
              <div class="w-11 h-11 sm:w-12 sm:h-12 bg-white/5 border border-white/10 rounded-sm flex items-center justify-center text-primary-red shrink-0 transition-transform hover:scale-110">
                <span class="material-symbols-outlined text-2xl">mail</span>
              </div>
              <div class="min-w-0">
                <h4 class="text-[10px] sm:text-xs font-black uppercase tracking-widest text-primary-red mb-1">Correo Electrónico</h4>
                <p class="text-gray-200 text-sm leading-relaxed break-all">
                  <?= e((string)($empresa["correo"] ?? "")); ?>
                </p>

              </div>
            </div>

            <div class="pt-6 border-t border-white/10">
              <div class="flex items-start gap-3">
                <span class="material-symbols-outlined text-primary-red text-sm mt-[1px] shrink-0">schedule</span>
                <p class="min-w-0 text-gray-400 text-[11px] font-bold uppercase tracking-widest leading-relaxed break-words">
                  Horario de Atención: <?= e((string)($empresa["horarios"] ?? "")); ?>
                </p>
              </div>
            </div>

          </div>
        </div>

        <!-- FORM (NO tocar lógica) -->
        <div class="w-full flex justify-center lg:justify-end mt-4 sm:mt-6 lg:mt-0">
<div class="glass-morphism w-full max-w-xl 
p-5 sm:p-7 md:p-9 lg:p-10 
rounded-sm shadow-2xl relative overflow-hidden reveal zoom-text">
            <div class="absolute top-0 right-0 w-32 h-32 bg-primary-red/10 rounded-full blur-3xl -mr-16 -mt-16"></div>

            <h3 class="text-xl sm:text-2xl font-black uppercase tracking-tight text-white mb-6 sm:mb-8 flex items-center gap-3">
              <span class="w-2 h-2 bg-primary-red"></span>
              Solicitar Cotización
            </h3>

           <form action="/enviar.php" method="POST" class="space-y-5 sm:space-y-6">
              <div class="grid grid-cols-1 md:grid-cols-2 gap-5 sm:gap-6">
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

              <div class="grid grid-cols-1 md:grid-cols-2 gap-5 sm:gap-6">
                <div class="space-y-2">
                  <label class="text-[10px] font-black uppercase tracking-widest text-gray-400">Teléfono / WhatsApp</label>
                  <input name="telefono" type="tel" required placeholder="10 dígitos"
                    class="w-full bg-white/5 border border-white/10 focus:border-primary-red focus:ring-0 text-white placeholder-gray-500 transition-colors py-3 px-4 text-sm" />
                </div>

                <div class="space-y-2">
                  <label class="text-[10px] font-black uppercase tracking-widest text-gray-400">Servicio de Interés</label>
                  <select name="servicio" required
                    class="w-full bg-white/5 border border-white/10 focus:border-primary-red focus:ring-0 text-white transition-colors py-3 px-4 text-sm appearance-none">

                    <option value="">Seleccione una opción</option>

                    <?php foreach ($serviciosForm as $nombreServicio): ?>
                      <option value="<?= e($nombreServicio); ?>" style="color:#0A192F;">
                        <?= e($nombreServicio); ?>
                      </option>
                    <?php endforeach; ?>

                    <option value="Proyecto Especial" style="color:#0A192F;">
                      Proyecto Especial
                    </option>
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

  <?php include "includes/ui/footer.php"; ?>

  <?php if (isset($_GET["ok"])): ?>
    <div id="msgSuccess" class="fixed inset-0 z-[999] flex items-center justify-center bg-black/60 backdrop-blur-sm px-5">
      <div class="bg-deep-black border border-primary-red/40 rounded-sm px-7 sm:px-8 py-6 text-center shadow-2xl animate-fade-in w-full max-w-sm">
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