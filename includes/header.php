
<?php
  $currentPage = basename($_SERVER['PHP_SELF']);
?>

<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title> MSI Maquinados y Servicios Industriales</title>

  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link rel="stylesheet" href="assets/css/loader.css">
  <link rel="stylesheet" href="assets/css/global.css">

  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            "primary-red": "#E31B23",
            "navy-blue": "#0A192F",
            "deep-black": "#020617",
            "royal-blue": "#0047AB",
            "industrial-white": "#FFFFFF",
            "border-navy": "#1E293B"
          },
          fontFamily: {
            display: ["Space Grotesk", "sans-serif"]
          }
        }
      }
    }
  </script>
  <script>
  // Apaga el loader ANTES de renderizar (evita el flash)
  if (sessionStorage.getItem("pageLoaded") === "true") {
    document.documentElement.classList.add("loader-off");
  }
</script>
</head>

<body class="bg-industrial-white font-display text-navy-blue selection:bg-primary-red selection:text-white">


 <div id="pageLoader" class="page-loader">
  <div class="loader-circle-37">
    <img src="assets/img/logoMSI.png" class="loader-logo" alt="Logo MSI">
  </div>
</div>
  <!-- TOP BAR (AJUSTADO PARA CENTRAR COMO EL HEADER) -->
  <div class="hidden lg:flex w-full bg-deep-black border-b border-white/10">
    <div class="max-w-7xl mx-auto w-full px-8 py-2 flex items-center text-[11px] uppercase tracking-widest text-gray-400">
      <div class="flex flex-wrap items-center gap-x-8 gap-y-2 text-white/80">
        <span class="flex items-center gap-2">
          <span class="material-symbols-outlined text-primary-red text-sm">location_on</span>
          20 de Noviembre No.361, Col. Analco, Gdl
        </span>

        <span class="flex items-center gap-2">
          <span class="material-symbols-outlined text-primary-red text-sm">call</span>
          01 (33) 3617-5426
        </span>

        <span class="flex items-center gap-2">
          <span class="material-symbols-outlined text-primary-red text-sm">mail</span>
          contacto@maquinadosyserviciosindustriales.com
        </span>
      </div>
    </div>
  </div>

  <!-- HEADER (BLANCO) -->
  <header class="sticky top-0 z-50 bg-white border-b border-border-navy/20 px-8 py-2 h-28">
    <div class="max-w-7xl mx-auto flex justify-between items-center h-full">

      <!-- LOGO + TEXTO -->
      <a href="index.php" class="flex items-center h-full gap-4">
        <img
          src="assets/img/logoMSI.png"
          alt="MSI - Maquinados y Servicios Industriales"
          class="h-full max-h-[120px] w-auto object-contain"
        />

        <div class="leading-tight">
          <p class="text-royal-blue font-black text-lg uppercase tracking-wide">Maquinados y servicios</p>
          <p class="text-royal-blue font-black text-lg uppercase tracking-wide">Industriales</p>
        </div>
      </a>

      <!-- MENU -->
      <nav class="hidden md:flex gap-10 text-[15px] font-bold uppercase">
  <a href="index.php"
     class="<?= $currentPage == 'index.php' ? 'text-primary-red' : 'text-navy-blue hover:text-primary-red transition-colors' ?>">
     Inicio
  </a>

  <a href="nosotros.php"
     class="<?= $currentPage == 'nosotros.php' ? 'text-primary-red' : 'text-navy-blue hover:text-primary-red transition-colors' ?>">
     Nosotros
  </a>

  <a href="servicios.php"
     class="<?= $currentPage == 'servicios.php' ? 'text-primary-red' : 'text-navy-blue hover:text-primary-red transition-colors' ?>">
     Servicios
  </a>

 

  <a href="clientes.php"
     class="<?= $currentPage == 'clientes.php' ? 'text-primary-red' : 'text-navy-blue hover:text-primary-red transition-colors' ?>">
     Clientes
  </a>

  <a href="contacto.php"
     class="<?= $currentPage == 'contacto.php' ? 'text-primary-red' : 'text-navy-blue hover:text-primary-red transition-colors' ?>">
     Contacto
  </a>
</nav>
    </div>
  </header>
 

