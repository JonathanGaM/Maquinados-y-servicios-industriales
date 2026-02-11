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
//INDEX//
//CONTENIDO PRINCIPAL//

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
    // ✅ TEXTOS ROTATIVOS DEL HERO (ANTES ESTABAN EN JS)
    "rotating_texts" => [
      "Fabricación, maquila y reparación de componentes industriales con sistemas internos de control de calidad y procesos confiables.",
      "Especialistas en engranes, sinfines y coronas de alta precisión para transmisión de potencia en maquinaria industrial.",
      "Diseño y manufactura de ejes y componentes mecánicos a medida, fabricados con alta precisión y entrega puntual garantizada.",
      "Producción de rodillos industriales, coples y refacciones críticas para mantenimiento confiable y continuidad operativa.",
      "Soluciones en maquinado convencional y CNC para proyectos unitarios o producción en volumen industrial eficiente."
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
    "fresadora_universal" => "https://lh3.googleusercontent.com/aida-public/AB6AXuDdkqm1fznG0VDQM985giOOyg2-RQ32lyT7FhWr0fvgmBDp3sXoshDOSbKs3Bo25lcLbJaUVssfmasKdsTDDVudARrgqAXAYx8QsHDHV-J6jiVsu-Ojuom9flxDOybFNqE_2H3313IB-uLWjEROONEJ9Ctb5jh1XJoiZoKSS3N-2kOxyYNVozcou0tEI7A0kro31o2wtzx7d9yx4cP5Jm7Cj5jhdykJmVQ-9bBNUkf2YmQTFGvQ8t8hLoO6R5uQsB78doe5uUq-U4mx",
  ],
];


// ======================
// IMG NOSOTROS (solo imágenes de nosotros.php)
// ======================
$fallback_img_nosotros = [
  // HERO (fondo superior)
  "hero_bg" => "https://thumbs.dreamstime.com/b/hombre-de-ingenier%C3%ADa-que-lleva-uniforme-trabajadores-seguridad-realizar-el-mantenimiento-en-la-f%C3%A1brica-m%C3%A1quina-torno-metal-216109790.jpg",

  // Imágenes laterales (decorativas) misión/visión (PC)
  "mision_izq" => "assets/img/nosotros/1m.png",
  "vision_der" => "assets/img/nosotros/2m.png",

  // Fondo sección capacidades
  "capacidades_bg" => "assets/img/capacidades.png",
];


// ======================
// SERVICIOS (MÓDULO)
// ======================
$fallback_hero_servicios = [
  "carousel" => [
    "assets/img/capacidades.png",
    "assets/img/engrane.png",
    "assets/img/estandares-industriales.png",
    "assets/img/fon1.png",
    "assets/img/fon2.png",
    "assets/img/engrane.png",
  ]
];
$fallback_servicios = [
  [
    "nombre" => "Servicio de Rectificado",
    "imagen" => "https://www.rapiddirect.com/wp-content/uploads/2022/08/CNC-turning-basics.webp",
    "carousel" => [
      "assets/img/engrane.png",
      "assets/img/capacidades.png",
      "assets/img/engrane.png",
      "assets/img/estandares-industriales.png",
      "assets/img/fon1.png",
    ],
    "descripcion" => "Rectificado industrial de alta precisión para superficies planas y cilíndricas.",
    "descripcion_larga" => "El servicio de rectificado industrial permite obtener acabados de alta precisión y tolerancias cerradas en piezas mecánicas. Se utiliza para rectificado plano y cilíndrico en componentes que requieren exactitud dimensional, paralelismo y concentricidad. Es una solución ideal para mantenimiento industrial, recuperación de piezas desgastadas, ajuste de componentes críticos y fabricación de refacciones industriales que trabajan bajo condiciones exigentes.",
    "video" => "assets/img/vid/retificado.mp4"
  ],
  [
    "nombre" => "Servicio de Cepillo",
    "imagen" => "https://umesal.com/wp-content/uploads/2019/06/C%C3%B3mo-funciona-el-proceso-de-mecanizado.jpg",
    "carousel" => [
      "assets/img/capacidades.png",
      "assets/img/engrane.png",
      "assets/img/estandares-industriales.png",
      "assets/img/fon1.png",
      "assets/img/engrane.png",
    ],

    "descripcion" => "Maquinado de superficies planas en piezas industriales de gran tamaño.",
    "descripcion_larga" => "El servicio de cepillo industrial está enfocado en el mecanizado de superficies planas en piezas de grandes dimensiones como bases, guías, bancadas y estructuras metálicas. Este proceso es ideal para corrección geométrica, alineación de superficies y fabricación de componentes industriales robustos. Se utiliza comúnmente en mantenimiento industrial, reparación de maquinaria pesada y fabricación de refacciones donde se requiere estabilidad estructural y precisión.",
    "video" => "assets/img/vid/retificado.mp4"
  ],
  [
    "nombre" => "Tornos CNC",
    "imagen" => "https://www.metalmecanica.com/uploads/news-pictures/pphoto-3769.png",
    "carousel" => [
      "assets/img/capacidades.png",
      "assets/img/engrane.png",
      "assets/img/estandares-industriales.png",
      "assets/img/fon1.png",
      "assets/img/engrane.png",
    ],
    "descripcion" => "Mecanizado CNC de piezas cilíndricas con alta precisión y repetibilidad.",
    "descripcion_larga" => "El servicio de torno CNC permite la fabricación de piezas cilíndricas con alta precisión, repetibilidad y control dimensional. Es ideal para producción en serie, prototipos industriales y fabricación de refacciones mecánicas. Mediante mecanizado CNC se logran acabados uniformes, tolerancias exactas y procesos eficientes para componentes utilizados en maquinaria industrial, sistemas mecánicos y equipos de producción.",
    "video" => "assets/img/vid/prue.mp4"
  ],
  [
    "nombre" => "Fabricación de Engranes",
    "imagen" => "assets/img/servicios/engrane.jpeg",
    "carousel" => [
      "assets/img/capacidades.png",
      "assets/img/engrane.png",
      "assets/img/estandares-industriales.png",
      "assets/img/fon1.png",
      "assets/img/engrane.png",
    ],
    "descripcion" => "Fabricación de engranes industriales para transmisión de potencia.",
    "descripcion_larga" => "La fabricación de engranes industriales incluye el diseño y mecanizado de piñones, coronas, engranes rectos, helicoidales y sinfines. Este servicio está orientado a sistemas de transmisión de potencia utilizados en maquinaria industrial. Los engranes se fabrican bajo plano o muestra, asegurando correcto perfil, paso y alineación. Es una solución ideal para mantenimiento industrial, reemplazo de refacciones y optimización del rendimiento mecánico.",
    "video" => "assets/img/vid/engranev.mp4"
  ],
  [
    "nombre" => "Servicio de Torno Convencional",
    "imagen" => "https://jlmetalmecanica.com/wp-content/uploads/2023/09/SERVICIO-DE-TORNO.jpg",
    "carousel" => [
      "assets/img/tornoconvencional.jpeg",
      "assets/img/engrane.png",
      "assets/img/estandares-industriales.png",
      "assets/img/fon1.png",
      "assets/img/engrane.png",
    ],
    "descripcion" => "Fabricación y reparación de piezas cilíndricas para uso industrial.",
    "descripcion_larga" => "El servicio de torno convencional se utiliza para la fabricación y reparación de ejes, bujes, flechas y piezas cilíndricas. Es ideal para mantenimiento correctivo, ajustes mecánicos y fabricación de refacciones industriales. Permite trabajar con distintos materiales y obtener dimensiones precisas para ensambles mecánicos, contribuyendo a la continuidad operativa de maquinaria industrial.",
    "video" => "assets/img/vid/prue.mp4"
  ],
  [
    "nombre" => "Servicio de Fresadora",
    "imagen" => "https://lh3.googleusercontent.com/aida-public/AB6AXuAJNVjBzyAR1abkbPp9sjxuQogGh1wMillxRuMEcg8XC6Qma00Fm9k3o5LZpoGngB3tbvENoo1FNVsV-6wcOUbud_kfvk997cbtwV_Vm-05BAbTIadRMthj4LaBTAqyDomzWbkPl7a3OJFOk1398T7OWqF8rLkH8oYNSyuYiKExV2GYw5wf3vunK1V-HlllCaiQROibu2P0A91qeOums1HSeijA9FY_r5mgJA-p4rJhbuSh0f4v42THqaSvlZXI3wUx-_qeJfRcAvSv",
    "carousel" => [
      "assets/img/capacidades.png",
      "assets/img/engrane.png",
      "assets/img/estandares-industriales.png",
      "assets/img/fon1.png",
      "assets/img/engrane.png",
    ],
    "descripcion" => "Mecanizado de ranuras, chaveteros y geometrías complejas.",
    "descripcion_larga" => "El servicio de fresadora industrial permite el mecanizado de chaveteros, ranuras, cajas, alojamientos y geometrías complejas. Es ideal para la fabricación de componentes mecánicos, adaptación de piezas especiales y mantenimiento industrial. Este proceso garantiza precisión geométrica, buen acabado superficial y compatibilidad exacta en ensambles mecánicos utilizados en maquinaria y equipos industriales.",
    "video" => "assets/img/vid/fresadora.mp4"
  ],


];
// ======================
// SERVICIOS – CONTENIDO (HERO + SECTORES + MATERIALES)
// ======================
$fallback_servicios_contenido = [

  // HERO DE SERVICIOS
  "hero" => [
    "imagen" => "https://www.mobil.com.mx/lubricantes/-/media/project/wep/mobil/mobil-mx/blog-industrial/engranes/fs-sm.jpg",
    "descripcion" =>
    "Maquinados y Servicios Industriales es una empresa dedicada al maquinado y mantenimiento de maquinaria industrial, especializada en la fabricación y reparación de engranes, sinfines, coronas, flechas y componentes críticos. Ofrecemos soluciones de manufactura mediante procesos convencionales y CNC, orientadas a sectores agroindustrial y manufacturero, cumpliendo con altos estándares de precisión, confiabilidad operativa y entregas en tiempo."
  ],

  // SECTORES ATENDIDOS
  "sectores" => [
    [
      "titulo" => "Automotriz",
      "imagen" => "https://cdn.club-magazin.autodoc.de/uploads/sites/11/2020/12/motor-de-combustion-interna-de-un-automovil.jpg",
      "descripcion" => "Fabricación y reparación de componentes para líneas de producción automotriz."
    ],
    [
      "titulo" => "Aeronáutica",
      "imagen" => "https://us.123rf.com/450wm/andose24/andose241709/andose24170900011/86109270-tren-de-aterrizaje.jpg?ver=6",
      "descripcion" => "Maquinados de alta precisión para componentes críticos aeronáuticos."
    ],
    [
      "titulo" => "Metal-Mecánica",
      "imagen" => "https://www.rapiddirect.com/wp-content/uploads/2023/10/5-axis-cnc-machining-process.webp",
      "descripcion" => "Soluciones de maquinado CNC y convencional para la industria metalmecánica."
    ],
    [
      "titulo" => "Alimenticia",
      "imagen" => "https://www.rrhhdigital.com/wp-content/uploads/userfiles/fabrica-alimentacion-comida.jpg",
      "descripcion" => "Fabricación y mantenimiento de piezas para maquinaria de proceso y empaque."
    ],
    [
      "titulo" => "Agrícola",
      "imagen" => "https://www.spmas.es/wp-content/uploads/2023/03/Post-3-PRL-Sector-Agricola.jpg",
      "descripcion" => "Manufactura y reparación de componentes para maquinaria agrícola."
    ],
    [
      "titulo" => "Electrónica",
      "imagen" => "https://www.vencoel.com/wp-content/uploads/2023/11/normativas-electronica.jpg",
      "descripcion" => "Componentes de precisión para equipos y ensambles electrónicos industriales."
    ],
  ],

  // MATERIALES
  "materiales" => [
    "imagen" => "https://www.zintilon.com/wp-content/uploads/2024/07/ferrous-metals-vs-non-ferrous-metals-880x608.png"
  ],
];


// ======================
// CLIENTES (HERO + CTA)
// ======================
$fallback_clientes_media = [
  "hero" => [
    "bg" => "https://mspcorp.ca/wp-content/uploads/2021/12/MSPC-Blog-12-22-21-Blog.jpg",
    "descripcion" => "Aliados estratégicos que confían en nuestra precisión técnica para el mantenimiento industrial y la fabricación de componentes críticos en sus procesos productivos.",
  ],
  "cta" => [
    "bg" => "assets/img/estandares-industriales.png",
  ],
];

// ======================
// CLIENTES (MÓDULO)
// ======================
$fallback_clientes = [

  [
    "nombre" => "BSM",
    "descripcion" => "Especialistas en la industria azucarera, confían en nuestra reparación de sinfines y coronas de gran escala.",
    "imagen" => "assets/img/clientes/bsm.png",
    "tag" => "Mantenimiento Crítico"
  ],
  [
    "nombre" => "CAREY",
    "descripcion" => "Empresa del sector agroindustrial que utiliza nuestra tecnología CNC para la fabricación de herramentales especializados.",
    "imagen" => "assets/img/clientes/carey.png",
    "tag" => "Precisión Agrícola"
  ],
  [
    "nombre" => "LATEX MEXICANA",
    "descripcion" => "Principales productores de derivados del látex, requieren piezas de acero inoxidable con acabados sanitarios de alta precisión.",
    "imagen" => "assets/img/clientes/latex_mexicana.png",
    "tag" => "Materiales Especiales"
  ],
  [
    "nombre" => "SERVICIOS ELECTROMECÁNICOS",
    "descripcion" => "Empresa de mantenimiento electromecánico que necesita fabricación y reparación de componentes para respuesta rápida en campo.",
    "imagen" => "assets/img/clientes/SER.png",
    "tag" => "Mantenimiento Crítico"
  ],
  [
    "nombre" => "INDOLEA",
    "descripcion" => "Empresa dedicada a oleaginosas que requiere refacciones y componentes industriales para líneas de proceso y manejo de producto.",
    "imagen" => "assets/img/clientes/indolea.png",
    "tag" => "Refacciones a Medida"
  ],
  [
    "nombre" => "VALO",
    "descripcion" => "Empresa del sector biomédico que demanda componentes de alta precisión para procesos críticos en salud humana y animal.",
    "imagen" => "assets/img/clientes/valo.jpeg",
    "tag" => "Alta Precisión"
  ],
  [
    "nombre" => "FLEXITEK",
    "descripcion" => "Fabricante de empaque flexible que requiere componentes mecánicos precisos para maquinaria de producción y conversión.",
    "imagen" => "assets/img/clientes/flexitek.jpg",
    "tag" => "Producción Continua"
  ],
  [
    "nombre" => "AVIATION TECHNICAL SERVICES GDL",
    "descripcion" => "Taller aeronáutico que necesita maquinados de alta precisión para reparación y overhaul de componentes críticos.",
    "imagen" => "assets/img/clientes/aviation.jpg",
    "tag" => "Componentes Críticos"
  ],

];





// ======================
// IMG CONTACTO
// ======================
$fallback_contacto_media = [
  "hero_bg" => "assets/img/contacto.png",
];
