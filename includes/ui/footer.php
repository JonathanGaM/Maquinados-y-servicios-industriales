<!-- footer.php -->
<?php
include_once __DIR__ . "/../core/db.php";
include_once __DIR__ . "/../core/db-safe.php";
include_once __DIR__ . "/../core/fallbacks.php";

// Traer datos reales o fallback
$empresa = db_first_row(
  "SELECT 
     nombre,
     ubicacion,
     telefono,
     whatsapp,
     facebook_url,
     correo,
     horarios
   FROM empresa
   LIMIT 1",
  [],
  $fallback_empresa
);
$whatsappText = urlencode("Hola, me gustaría solicitar una cotización");
?>



<footer class="bg-deep-black pt-20 pb-10 border-t-4 border-primary-red">

  <div class="max-w-7xl mx-auto px-4 sm:px-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-20 text-center md:text-left">

    <!-- LOGO -->
    <div>
      <div class="flex items-center justify-center md:justify-start gap-3 mb-8">
        <div>
          <?php
          $nombre = trim($empresa['nombre']);
          $partes = preg_split('/\s+y\s+/i', $nombre, 2);
          $titulo = $partes[0] ?? 'Maquinados';
          $sub    = isset($partes[1]) ? 'y ' . $partes[1] : '';
          ?>
          <h4 class="text-lg font-bold leading-none tracking-tight text-white">
            <?php echo htmlspecialchars(strtoupper($titulo)); ?>
          </h4>
          <p class="text-[8px] text-primary-red font-bold tracking-[0.2em] mt-1 uppercase">
            <?php echo htmlspecialchars($sub); ?>
          </p>

        </div>

      </div>

      <p class="text-gray-400 text-sm leading-relaxed mb-8">
        Ingeniería mexicana de alto rendimiento para los sectores más exigentes de la industria automotriz y manufacturera.
      </p>

      <div class="flex gap-4 justify-center md:justify-start">
        <!-- WhatsApp -->
        <a class="w-10 h-10 bg-navy-blue flex items-center justify-center hover:bg-[#25D366] transition-all rounded-sm"
          href="https://wa.me/<?php echo htmlspecialchars($empresa['whatsapp']); ?>?text=<?php echo $whatsappText; ?>"

          target="_blank"
          aria-label="WhatsApp">

          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="w-5 h-5 fill-white">
            <path d="M16.003 3.2c-7.062 0-12.8 5.738-12.8 12.8 0 2.259.59 4.467 1.706 6.417L3.2 28.8l6.55-1.674c1.86 1.016 3.95 1.548 6.253 1.548h.001c7.062 0 12.8-5.738 12.8-12.8S23.065 3.2 16.003 3.2zm0 22.4c-1.95 0-3.86-.52-5.52-1.503l-.395-.234-3.885.994 1.038-3.79-.257-.39c-1.05-1.593-1.606-3.45-1.606-5.378 0-5.507 4.48-9.987 9.987-9.987 5.508 0 9.987 4.48 9.987 9.987 0 5.507-4.48 9.987-9.987 9.987zm5.48-7.36c-.3-.15-1.77-.873-2.045-.973-.275-.1-.475-.15-.675.15-.2.3-.775.973-.95 1.173-.175.2-.35.225-.65.075-.3-.15-1.265-.465-2.41-1.48-.89-.793-1.49-1.77-1.665-2.07-.175-.3-.02-.462.13-.612.135-.135.3-.35.45-.525.15-.175.2-.3.3-.5.1-.2.05-.375-.025-.525-.075-.15-.675-1.63-.925-2.23-.243-.585-.49-.505-.675-.515l-.575-.01c-.2 0-.525.075-.8.375-.275.3-1.05 1.025-1.05 2.5 0 1.475 1.075 2.9 1.225 3.1.15.2 2.115 3.23 5.125 4.53.715.308 1.27.492 1.705.63.717.228 1.37.196 1.885.12.575-.085 1.77-.723 2.02-1.423.25-.7.25-1.3.175-1.423-.075-.123-.275-.2-.575-.35z" />
          </svg>

        </a>


        <!-- Facebook -->
        <a class="w-10 h-10 bg-navy-blue flex items-center justify-center hover:bg-[#1877F2] transition-all rounded-sm"
          href="<?php echo htmlspecialchars($empresa['facebook_url']); ?>"
          target="_blank">
          <svg class="w-5 h-5 fill-white" viewBox="0 0 24 24">
            <path d="M22 12a10 10 0 1 0-11.6 9.9v-7h-2v-3h2V9.8c0-2 1.2-3.1 3-3.1.9 0 1.8.1 1.8.1v2h-1c-1 0-1.3.6-1.3 1.2V12h2.3l-.4 3h-1.9v7A10 10 0 0 0 22 12" />
          </svg>
        </a>
      </div>

    </div>

    <!-- NAVEGACIÓN -->
    <div>
      <h5 class="text-white font-bold uppercase tracking-widest text-xs mb-8 border-b border-primary-red pb-2 inline-block mx-auto md:mx-0">
        Navegación
      </h5>
      <ul class="space-y-4">
        <li><a class="text-gray-400 hover:text-primary-red transition-colors text-sm uppercase font-bold tracking-wider" href="index.php">Inicio</a></li>
        <li><a class="text-gray-400 hover:text-primary-red transition-colors text-sm uppercase font-bold tracking-wider" href="servicios.php">Servicios</a></li>
        <li><a class="text-gray-400 hover:text-primary-red transition-colors text-sm uppercase font-bold tracking-wider" href="servicios.php#servicios">Maquinaria</a></li>
        <li><a class="text-gray-400 hover:text-primary-red transition-colors text-sm uppercase font-bold tracking-wider" href="clientes.php">Clientes</a></li>
        <li><a class="text-gray-400 hover:text-primary-red transition-colors text-sm uppercase font-bold tracking-wider" href="contacto.php">Cotización</a></li>

      </ul>
    </div>

    <!-- CONTACTO + MAPA -->
    <div class="lg:col-span-2">
      <h5 class="text-white font-bold uppercase tracking-widest text-xs mb-8 border-b border-primary-red pb-2 inline-block mx-auto md:mx-0">
        Contacto Directo
      </h5>

      <!-- Info de contacto -->
      <div class="grid md:grid-cols-2 gap-8 mb-8">
        <div class="flex flex-col items-center text-center md:flex-row md:items-start md:text-left gap-4">
          <span class="material-symbols-outlined text-primary-red md:mt-1">location_on</span>
          <div>
            <p class="text-white font-bold text-sm uppercase tracking-wider mb-2">Planta Matriz</p>
            <p class="text-gray-400 text-sm leading-relaxed">
              <?php echo nl2br(htmlspecialchars($empresa['ubicacion'])); ?>

            </p>
          </div>
        </div>

        <div class="flex flex-col items-center text-center md:flex-row md:items-start md:text-left gap-4">
          <span class="material-symbols-outlined text-primary-red md:mt-1">contact_phone</span>

          <div>
            <p class="text-white font-bold text-sm uppercase tracking-wider mb-2">Línea Industrial</p>
            <p class="text-gray-400 text-sm leading-relaxed break-all">
              <?php echo htmlspecialchars($empresa['telefono']); ?><br />
              <?php echo htmlspecialchars($empresa['correo']); ?>
            </p>

          </div>
        </div>
      </div>

      <!-- Mapa -->
      <!-- Mapa -->
      <div class="border border-white/10 rounded-sm overflow-hidden bg-white/5">
        <div class="relative w-full h-64 md:h-56 lg:h-64">
          <iframe
            class="absolute inset-0 w-full h-full"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3732.9970110655!2d-103.34618206122255!3d20.669700600095442!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428b1f6e56c88a3%3A0xfb7138346dfabc73!2sMaquinados%20y%20servicios%20Industriales!5e0!3m2!1ses-419!2smx!4v1769530385803!5m2!1ses-419!2smx"
            style="border:0;"
            allowfullscreen
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
      </div>


      <a
        href="https://www.google.com/maps/search/?api=1&query=Calle+20+de+Noviembre+361,+Analco,+44450+Guadalajara,+Jalisco"

        target="_blank"
        rel="noopener"
        class="inline-flex items-center gap-2 mt-4 text-primary-red font-bold text-[11px] uppercase tracking-widest hover:text-white transition-colors">
        <span class="material-symbols-outlined text-sm">open_in_new</span>
        Ver ubicación en Google Maps
      </a>
    </div>

  </div>

  <!-- BARRA INFERIOR -->
  <div class="max-w-7xl mx-auto px-4 sm:px-8 pt-8 border-t border-white/10 flex flex-col md:flex-row justify-between items-center gap-4 text-center md:text-left">
    <?php
    $fallbackYear = 2026;

    try {
      $year = (int) date("Y"); // año actual del servidor
      if ($year < 2000 || $year > 2100) $year = $fallbackYear; // sanity check
    } catch (Throwable $e) {
      $year = $fallbackYear;
    }
    ?>
    <p class="text-gray-600 text-[10px] uppercase tracking-[0.2em]">
      © <?php echo $year; ?> Maquinados y Servicios Industriales. Calidad que Impulsa la Industria.
    </p>

    <div class="flex flex-col md:flex-row items-center gap-3 md:gap-6">
      <div class="flex items-center gap-4">
        <a href="politicas_privacidad.php"
          class="text-[10px] text-gray-500 uppercase tracking-widest hover:text-primary-red transition-colors">
          Privacidad
        </a>
        <span class="text-gray-700 text-[10px]">|</span>
        <a href="politicas_servicio.php"
          class="text-[10px] text-gray-500 uppercase tracking-widest hover:text-primary-red transition-colors">
          Servicio
        </a>
      </div>

      <div class="hidden md:block w-12 h-[1px] bg-white/10"></div>

      <div class="flex items-center gap-6">
        <span class="text-[10px] text-gray-500 uppercase tracking-widest">Hecho en Mexico</span>
        <div class="w-12 h-[1px] bg-white/10"></div>
        <span class="text-primary-red font-bold text-[10px] tracking-widest">MXN</span>
      </div>
    </div>

</footer>
<!-- BOTÓN VOLVER ARRIBA -->
<button id="backToTop"
  class="fixed left-6 bottom-8 z-50 w-12 h-12 rounded-full bg-primary-red text-white
         flex items-center justify-center shadow-xl opacity-0 pointer-events-none
         transition-all duration-300 hover:scale-110">
  <span class="material-symbols-outlined text-lg">keyboard_arrow_up</span>
</button>


<?php
$currentPage = basename($_SERVER['PHP_SELF']);

if ($currentPage !== "contacto.php") {
  include __DIR__ . "/floating-buttons.php";
}
?>

<script src="assets/js/loader.js"></script>
<script src="assets/js/reveal.js" defer></script>


<script>
  const backToTop = document.getElementById("backToTop");

  function toggleBackToTop() {
    const y = window.scrollY || document.documentElement.scrollTop;
    if (y > 80) {
      backToTop.classList.remove("opacity-0", "pointer-events-none");
      backToTop.classList.add("opacity-100");
    } else {
      backToTop.classList.add("opacity-0", "pointer-events-none");
      backToTop.classList.remove("opacity-100");
    }
  }
  window.addEventListener("scroll", toggleBackToTop, {
    passive: true
  });
  document.addEventListener("DOMContentLoaded", toggleBackToTop);
  backToTop.addEventListener("click", () => window.scrollTo({
    top: 0,
    behavior: "smooth"
  }));
</script>

<?php
// ✅ Solo cargar el carrusel del hero en index.php
if ($currentPage === "index.php") {
  echo '<script src="assets/js/hero-carrusel.js"></script>';
  echo '<script src="assets/js/hero-text-rotate.js"></script>';
}
?>

</body>

</html>