<?php
include "includes/db.php";        // conexión (crea $pdo)
include "includes/db-safe.php";   // helpers seguros
include "includes/fallbacks.php"; // datos estáticos
include "includes/header.php"; ?>
<?php
// 1) Traer el texto desde BD (o fallback)
$empresa = db_first_row(
  "SELECT politicas_privacidad FROM empresa LIMIT 1",
  [],
  ["politicas_privacidad" => $fallback_empresa["politicas_privacidad"]]
);

// 2) Separar el texto en párrafos (por líneas en blanco)
$texto = trim($empresa["politicas_privacidad"]);
$parrafos = preg_split("/\R{2,}/", $texto);

// 3) Guardar cada párrafo
$p1 = $parrafos[0] ?? '';
$p2 = $parrafos[1] ?? '';
$p3 = $parrafos[2] ?? '';
?>


<main class="bg-gray-100 min-h-[calc(100vh-89px)] py-16">

  <div class="max-w-4xl mx-auto px-4 sm:px-8">
    <div class="bg-white shadow-xl rounded-sm border border-gray-200 p-6 md:p-8">

      <p class="text-primary-red font-bold text-[10px] uppercase tracking-[0.3em] mb-2">
        Legal
      </p>

      <h1 class="text-gray-900 text-2xl md:text-3xl font-black uppercase tracking-tight mb-4">
        Política de Privacidad
      </h1>

      <p class="text-gray-500 text-[11px] mb-6">
        Última actualización: <?php echo date("d/m/Y"); ?>
      </p>

      <div class="space-y-4 text-gray-700 text-[13px] leading-snug">

        <p><?php echo nl2br(htmlspecialchars($p1)); ?></p>


        <h2 class="text-gray-900 font-bold uppercase text-[11px] tracking-widest mt-6">
          Uso de la información
        </h2>

        <p><?php echo nl2br(htmlspecialchars($p2)); ?></p>


        <h2 class="text-gray-900 font-bold uppercase text-[11px] tracking-widest mt-6">
          Confidencialidad
        </h2>

       <p><?php echo nl2br(htmlspecialchars($p3)); ?></p>


        <h2 class="text-gray-900 font-bold uppercase text-[11px] tracking-widest mt-6">
          Contacto
        </h2>

        <p>
          Para cualquier duda relacionada con esta política, puedes comunicarte mediante la sección de
          <a href="contacto.php" class="text-primary-red font-semibold hover:underline">Contacto</a>.
        </p>

      </div>

      <div class="mt-8 flex gap-3">
        <a href="index.php"
           class="px-4 py-2 text-[11px] font-bold uppercase tracking-widest bg-navy-blue text-white rounded-sm hover:bg-primary-red transition">
          Inicio
        </a>

        <a href="politicas_servicio.php"
           class="px-4 py-2 text-[11px] font-bold uppercase tracking-widest border border-gray-300 text-gray-700 rounded-sm hover:border-primary-red hover:text-primary-red transition">
          Política de Servicio
        </a>
      </div>

    </div>
  </div>

</main>

<?php include "includes/footer.php"; ?>
