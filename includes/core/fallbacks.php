<?php

/**
 * fallbacks.php
 * Datos estáticos centralizados (usados si falla la BD)
 */

// ======================
// EMPRESA (GLOBAL)
// ======================
$fallback_empresa = [
  "nombre"    => "Maquinados y Servicios Industriales",
  "ubicacion" => "20 de Noviembre No.361, Col. Analco, CP 44450, Guadalajara, Jalisco",
  "telefono"  => "01 (33) 3617-5426",
  "whatsapp"  => "5213331576129",
  "facebook_url" => "https://www.facebook.com/profile.php?id=61558371863303&locale=es_LA",
  "correo"    => "contacto@maquinadosyserviciosindustriales.com",
  "horarios"  => "Lunes a Viernes 9:00 AM - 6:30 PM | Sábados 9:00 AM - 2:00 PM",

  "historia" =>
  "Somos una empresa dedicada a la fabricación, maquila, compra venta y reparación de toda clase de artículos para la industria y el sector automotriz.\n\n" .
    "Con una sólida base en ingeniería de precisión, hemos servido a la industria nacional garantizando los más altos estándares de calidad.",

  "mision" =>
  "Proveer soluciones integrales de maquinado y mantenimiento industrial que excedan las expectativas de nuestros clientes, combinando tecnología de punta con la experiencia técnica de nuestro equipo para impulsar la eficiencia productiva de la industria.",

  "vision" =>
  "Consolidarnos como el socio estratégico líder en manufactura de precisión a nivel nacional, siendo reconocidos por nuestra innovación constante, compromiso con la calidad total y el desarrollo técnico de nuestros procesos industriales.",

  "politicas_privacidad" =>
  "La información personal proporcionada por nuestros clientes y usuarios será utilizada únicamente para fines de contacto, atención y prestación de nuestros servicios.\n\n" .
    "Los datos compartidos, como nombre, teléfono o correo electrónico, se utilizan exclusivamente para responder solicitudes, brindar seguimiento y mejorar la atención.\n\n" .
    "Nos comprometemos a proteger la confidencialidad de los datos y a no compartirlos con terceros sin autorización previa, salvo cuando sea requerido por la ley.",

  "politicas_servicio" =>
  "Todos los servicios ofrecidos por la empresa se realizan conforme a las especificaciones acordadas previamente con el cliente.\n\n" .
    "Los tiempos de entrega, costos y alcances se definen en la cotización correspondiente y pueden variar según disponibilidad de materiales o cambios solicitados por el cliente.\n\n" .
    "No nos hacemos responsables por retrasos ocasionados por causas externas o información incompleta proporcionada por el cliente.\n\n" .
    "Cada proyecto se ejecuta bajo estándares de calidad industrial, priorizando cumplimiento, precisión y satisfacción del cliente."


];

// ======================
// SERVICIOS (MÓDULO)
// ======================
$fallback_servicios = [
  [
    "nombre" => "Servicio de Rectificado",
    "imagen" => "https://www.rapiddirect.com/wp-content/uploads/2022/08/CNC-turning-basics.webp",
    "descripcion" => "Precisión milimétrica en superficies planas y cilíndricas para acabados de alta calidad y tolerancias críticas.",
    "video" => "assets/img/prue.mp4"
  ],
  [
    "nombre" => "Servicio de Cepillo",
    "imagen" => "https://umesal.com/wp-content/uploads/2019/06/C%C3%B3mo-funciona-el-proceso-de-mecanizado.jpg",
    "descripcion" => "Maquinado de piezas de gran tamaño y superficies planas con alta remoción y precisión estructural.",
    "video" => "assets/img/prue.mp4"

  ],
  [
    "nombre" => "Tornos CNC",
    "imagen" => "https://www.metalmecanica.com/uploads/news-pictures/pphoto-3769.png",
    "descripcion" => "Producción en serie y piezas de alta complejidad técnica mediante control numérico computarizado.",
    "video" => "assets/img/prue.mp4"
  ],
  [
    "nombre" => "Fabricación de Engranes",
    "imagen" => "https://acerostorices.com/wp-content/uploads/2024/01/imagen-de-diversos-engranajes.jpg",
    "descripcion" => "Diseño y manufactura de piñones, coronas y engranajes rectos o helicoidales bajo plano o muestra.",
    "video" => "assets/img/prue.mp4"
  ],
  [
    "nombre" => "Servicio de Torno",
    "imagen" => "https://jlmetalmecanica.com/wp-content/uploads/2023/09/SERVICIO-DE-TORNO.jpg",
    "descripcion" => "Fabricación de ejes, bujes y piezas cilíndricas con acabados técnicos y precisión dimensional.",
    "video" => "assets/img/prue.mp4"
  ],
  [
    "nombre" => "Servicio de Fresadora",
    "imagen" => "https://lh3.googleusercontent.com/aida-public/AB6AXuAJNVjBzyAR1abkbPp9sjxuQogGh1wMillxRuMEcg8XC6Qma00Fm9k3o5LZpoGngB3tbvENoo1FNVsV-6wcOUbud_kfvk997cbtwV_Vm-05BAbTIadRMthj4LaBTAqyDomzWbkPl7a3OJFOk1398T7OWqF8rLkH8oYNSyuYiKExV2GYw5wf3vunK1V-HlllCaiQROibu2P0A91qeOums1HSeijA9FY_r5mgJA-p4rJhbuSh0f4v42THqaSvlZXI3wUx-_qeJfRcAvSv",
    "descripcion" => "Mecanizado para chaveteros, cajas y componentes geométricos complejos con alta repetibilidad.",
    "video" => "assets/img/prue.mp4"
  ],
];
// ======================
// CLIENTES (MÓDULO)
// ======================
$fallback_clientes = [
 
  [
    "nombre" => "BSM",
    "descripcion" => "Especialistas en la industria azucarera, confían en nuestra reparación de sinfines y coronas de gran escala.",
    "imagen" => "assets/img/bsm.png",
    "tag" => "Mantenimiento Crítico"
  ],
  [
    "nombre" => "CAREY",
    "descripcion" => "Empresa del sector agroindustrial que utiliza nuestra tecnología CNC para la fabricación de herramentales especializados.",
    "imagen" => "assets/img/carey.png",
    "tag" => "Precisión Agrícola"
  ],
  [
    "nombre" => "LATEX MEXICANA",
    "descripcion" => "Principales productores de derivados del látex, requieren piezas de acero inoxidable con acabados sanitarios de alta precisión.",
    "imagen" => "assets/img/latex_mexicana.png",
    "tag" => "Materiales Especiales"
  ],
  [
    "nombre" => "SERVICIOS ELECTROMECÁNICOS",
    "descripcion" => "Empresa vanguardista en equipos electromecánicos con más de 40 años de experiencia en México, enfocada en mantenimiento preventivo y correctivo con respuesta rápida.",
    "imagen" => "assets/img/SER.png",
    "tag" => "40+ años de experiencia"
  ],
  [
    "nombre" => "INDOLEA",
    "descripcion" => "Empresa 100% mexicana en Guadalajara con más de 50 años en compra, venta, fabricación y distribución de oleaginosas para el mercado nacional e internacional.",
    "imagen" => "assets/img/indolea.png",
    "tag" => "50+ años"
  ],
  [
    "nombre" => "VALO",
    "descripcion" => "Líder global en producción y suministro de huevos para vacunas y medios de cultivo, aportando a la salud humana y animal desde finales de los 60.",
    "imagen" => "assets/img/valo.jpeg",
    "tag" => "BioMedia"
  ],
  [
    "nombre" => "FLEXITEK",
    "descripcion" => "Proveedor de empaque flexible en Guadalajara desde 1986, con materias primas que cumplen normas FDA y UE y certificación HACCP.",
    "imagen" => "assets/img/flexitek.jpg",
    "tag" => "Desde 1986"
  ],
  [
    "nombre" => "AVIATION TECHNICAL SERVICES GDL",
    "descripcion" => "Taller aeronáutico mexicano fundado en 2016 en Jalisco, especializado en reparación y overhaul de frenos, ruedas y baterías con alta calidad y menor costo.",
    "imagen" => "assets/img/aviation.jpg",
    "tag" => "MRO Aeronáutico"
  ],

];
$fallback_media = [
  "hero" => [
    // La imagen inicial del HERO (la que va en hero-bg-a)

    // Carrusel HERO (las que antes estaban en hero-carrucel.js)
    "carousel" => [
      "assets/img/engrane.png",
      "assets/img/contacto.png",
      "https://artservices.com.mx/_astro/default-hero-2.CKNHaXvA_Z23prV5.webp",
      "assets/img/fon1.png",
      "assets/img/fon2.png",
    ],
  ],

  "home" => [
    // Imagen del bloque "Años de Liderazgo"
    "liderazgo" => "https://imagedelivery.net/xaKlCos5cTg_1RWzIu_h-A/b3832b78-7ebb-4f53-cf2c-fcb63464ab00/public",
  ],

  "infraestructura" => [
    "torno_convencional" => "https://lh3.googleusercontent.com/aida-public/AB6AXuClbVtyJae0malhxuUoC3raax3boT7IqjdA0Wo6oBPQsoUBOaVoY_Tfr4sgz5mh4cI6P6HDdgL_hf9TRAiHXF1OnrNc951RrJVkrSYnqacgx7nCsuYFDTMgcUTf4TmtOLAmfHlPTEknJ9Pg5SwbD_6Yx7UYWNEq9FEmpMi-v0McZco4Yr_5Ijb09hwbu_IspTJR-ArEmwoNnGiFXOBjIHi5CT8KVkJndU4i3wtxk9bNrnyJrI6otW37r1rag69yP4oprKeEbQZ17pec",
    "maquinado_cnc"      => "https://lh3.googleusercontent.com/aida-public/AB6AXuCJEza7qoBxigNuWEPZsFZ1m0r_eIiwY34PwTHsGLlJ-6WK27s66_jEBVT7ihONYxD1axxpXDfB5FBABfcXSgxpIzQZ8VIzZtBUfymCtqFbDEDlEBJ1D5DZCffrBfpAtiCSXKRraQH4KMwM6cu4uvhmhLy7SK9X7-0ov5yGIiI7Je1BD_Pifv3lU1xP34HXZatVhCgwQ24RnuQ9SbITgZEKxUXnDMdDbHIVSqcmE9QTu1RXIbJdwNiGDikdnFWN7zcASEnuX5b6jaZa",
    "retificado"         => "https://www.mgrectificadora.com.ar/wp-content/uploads/2018/11/que-significa-rectificar-el-motor-de-mi-vehiculo-idnoticia_21-w700-h400-m1.jpg",
    "fresadora_universal"=> "https://lh3.googleusercontent.com/aida-public/AB6AXuDdkqm1fznG0VDQM985giOOyg2-RQ32lyT7FhWr0fvgmBDp3sXoshDOSbKs3Bo25lcLbJaUVssfmasKdsTDDVudARrgqAXAYx8QsHDHV-J6jiVsu-Ojuom9flxDOybFNqE_2H3313IB-uLWjEROONEJ9Ctb5jh1XJoiZoKSS3N-2kOxyYNVozcou0tEI7A0kro31o2wtzx7d9yx4cP5Jm7Cj5jhdykJmVQ-9bBNUkf2YmQTFGvQ8t8hLoO6R5uQsB78doe5uUq-U4mx",
  ],
];

