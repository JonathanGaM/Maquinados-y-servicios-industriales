<?php
include "includes/core/db.php";
include "includes/core/db-safe.php";
include "includes/core/fallbacks.php";
include "includes/ui/header.php";

// 1) Consultar política de servicio (o fallback)
$empresa = db_first_row(
  "SELECT politicas_servicio FROM empresa LIMIT 1",
  [],
  ["politicas_servicio" => $fallback_empresa["politicas_servicio"]]
);

// 2) Separar texto en párrafos (por líneas en blanco)
$texto = trim($empresa["politicas_servicio"] ?? "");
$parrafos = preg_split("/\R{2,}/", $texto);

// 3) Asignar cada párrafo
$p1 = $parrafos[0] ?? '';
$p2 = $parrafos[1] ?? '';
$p3 = $parrafos[2] ?? '';
$p4 = $parrafos[3] ?? '';
?>

<main class="bg-gray-100 min-h-[calc(100vh-89px)] py-16">

  <div class="max-w-4xl mx-auto px-4 sm:px-8">
    <div class="bg-white shadow-xl rounded-sm border border-gray-200 p-6 md:p-8">

      <p class="text-primary-red font-bold text-[10px] uppercase tracking-[0.3em] mb-2">
        Legal
      </p>

      <h1 class="text-gray-900 text-2xl md:text-3xl font-black uppercase tracking-tight mb-4">
        Política de Servicio
      </h1>

      <p class="text-gray-500 text-[11px] mb-6">
        Última actualización: <?php echo date("d/m/Y"); ?>
      </p>

      <div class="space-y-4 text-gray-700 text-[13px] leading-snug">

       <p><?php echo nl2br(htmlspecialchars($p1)); ?></p>


        <h2 class="text-gray-900 font-bold uppercase text-[11px] tracking-widest mt-6">
          Alcance del servicio
        </h2>

       <p><?php echo nl2br(htmlspecialchars($p2)); ?></p>


        <h2 class="text-gray-900 font-bold uppercase text-[11px] tracking-widest mt-6">
          Responsabilidades
        </h2>

       <p><?php echo nl2br(htmlspecialchars($p3)); ?></p>


        <h2 class="text-gray-900 font-bold uppercase text-[11px] tracking-widest mt-6">
          Calidad
        </h2>

        <p><?php echo nl2br(htmlspecialchars($p4)); ?></p>

      </div>

      <div class="mt-8 flex gap-3">
        <a href="index.php"
           class="px-4 py-2 text-[11px] font-bold uppercase tracking-widest bg-navy-blue text-white rounded-sm hover:bg-primary-red transition">
          Inicio
        </a>

        <a href="politicas_privacidad.php"
           class="px-4 py-2 text-[11px] font-bold uppercase tracking-widest border border-gray-300 text-gray-700 rounded-sm hover:border-primary-red hover:text-primary-red transition">
          Política de Privacidad
        </a>
      </div>

    </div>
  </div>

</main>

<?php include "includes/ui/footer.php"; ?>
