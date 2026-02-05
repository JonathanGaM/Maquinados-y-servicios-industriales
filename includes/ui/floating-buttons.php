<?php
include_once __DIR__ . "/../core/db.php";
include_once __DIR__ . "/../core/db-safe.php";
include_once __DIR__ . "/../core/fallbacks.php";

// Traer datos reales o fallback
$empresa = db_first_row(
  "SELECT whatsapp FROM empresa LIMIT 1",
  [],
  ["whatsapp" => $fallback_empresa["whatsapp"]]
);
$whatsappText = urlencode("Hola, me gustaría solicitar una cotización");
?>
<!-- BOTONES FLOTANTES (GLOBAL) -->
<div id="floatingButtons" class="fixed bottom-4 right-4 sm:bottom-6 sm:right-6 z-[9999] flex flex-col gap-2 sm:gap-3">

  <!-- WhatsApp -->
  <a
    href="https://wa.me/<?php echo htmlspecialchars($empresa['whatsapp']); ?>?text=<?php echo $whatsappText; ?>"
    target="_blank"
    class="group flex items-center gap-2 sm:gap-3
           bg-[#25D366]/95 hover:bg-[#1ebe5d]/95
           backdrop-blur-sm
           px-3 py-3 sm:px-5 sm:py-3 rounded-md
           shadow-md shadow-black/30
           transition-all duration-300">

    <svg class="w-6 h-6 fill-white group-hover:scale-110 transition-transform duration-300"
      viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
      <path d="M16.003 3.2c-7.062 0-12.8 5.738-12.8 12.8 0 2.259.59 4.467 1.706 6.417L3.2 28.8l6.55-1.674c1.86 1.016 3.95 1.548 6.253 1.548h.001c7.062 0 12.8-5.738 12.8-12.8S23.065 3.2 16.003 3.2zm0 22.4c-1.95 0-3.86-.52-5.52-1.503l-.395-.234-3.885.994 1.038-3.79-.257-.39c-1.05-1.593-1.606-3.45-1.606-5.378 0-5.507 4.48-9.987 9.987-9.987 5.508 0 9.987 4.48 9.987 9.987 0 5.507-4.48 9.987-9.987 9.987zm5.48-7.36c-.3-.15-1.77-.873-2.045-.973-.275-.1-.475-.15-.675.15-.2.3-.775.973-.95 1.173-.175.2-.35.225-.65.075-.3-.15-1.265-.465-2.41-1.48-.89-.793-1.49-1.77-1.665-2.07-.175-.3-.02-.462.13-.612.135-.135.3-.35.45-.525.15-.175.2-.3.3-.5.1-.2.05-.375-.025-.525-.075-.15-.675-1.63-.925-2.23-.243-.585-.49-.505-.675-.515l-.575-.01c-.2 0-.525.075-.8.375-.275.3-1.05 1.025-1.05 2.5 0 1.475 1.075 2.9 1.225 3.1.15.2 2.115 3.23 5.125 4.53.715.308 1.27.492 1.705.63.717.228 1.37.196 1.885.12.575-.085 1.77-.723 2.02-1.423.25-.7.25-1.3.175-1.423-.075-.123-.275-.2-.575-.35z"/>
    </svg>

    <span class="hidden sm:inline text-xs font-black uppercase tracking-widest text-white">
      WhatsApp
    </span>
  </a>

  <!-- Cotización -->
  <a
    href="contacto.php"
   class="group flex items-center gap-2 sm:gap-3
       bg-[rgb(35_120_236/95%)] hover:bg-[rgb(28_100_205/95%)]
       backdrop-blur-sm
       px-3 py-3 sm:px-5 sm:py-3 rounded-md
       shadow-md shadow-black/30
       transition-all duration-300
       animate-float-delayed">


    <span class="material-symbols-outlined text-white text-lg sm:text-xl
                 group-hover:scale-110 transition-transform duration-300">
      mail
    </span>

    <span class="hidden sm:inline text-xs font-black uppercase tracking-widest text-white">
      Cotización
    </span>

  </a>

</div>

