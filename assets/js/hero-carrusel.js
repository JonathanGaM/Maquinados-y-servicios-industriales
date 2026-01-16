document.addEventListener("DOMContentLoaded", () => {
  const heroImages = [
    "https://brr.mx/wp-content/uploads/2024/01/image-19.png",
    "https://www.boyiprototyping.com/wp-content/uploads/2024/07/what-is-a-lathe-1024x577.webp",
    "https://lh3.googleusercontent.com/aida-public/AB6AXuClbVtyJae0malhxuUoC3raax3boT7IqjdA0Wo6oBPQsoUBOaVoY_Tfr4sgz5mh4cI6P6HDdgL_hf9TRAiHXF1OnrNc951RrJVkrSYnqacgx7nCsuYFDTMgcUTf4TmtOLAmfHlPTEknJ9Pg5SwbD_6Yx7UYWNEq9FEmpMi-v0McZco4Yr_5Ijb09hwbu_IspTJR-ArEmwoNnGiFXOBjIHi5CT8KVkJndU4i3wtxk9bNrnyJrI6otW37r1rag69yP4oprKeEbQZ17pec",
    "https://lh3.googleusercontent.com/aida-public/AB6AXuDdkqm1fznG0VDQM985giOOyg2-RQ32lyT7FhWr0fvgmBDp3sXoshDOSbKs3Bo25lcLbJaUVssfmasKdsTDDVudARrgqAXAYx8QsHDHV-J6jiVsu-Ojuom9flxDOybFNqE_2H3313IB-uLWjEROONEJ9Ctb5jh1XJoiZoKSS3N-2kOxyYNVozcou0tEI7A0kro31o2wtzx7d9yx4cP5Jm7Cj5jhdykJmVQ-9bBNUkf2YmQTFGvQ8t8hLoO6R5uQsB78doe5uUq-U4mx"
  ];

  const hero = document.getElementById("hero");
  const a = document.getElementById("hero-bg-a");
  const b = document.getElementById("hero-bg-b");
  if (!hero || !a || !b) return;

  let index = 0;
  let active = a;
  let next = b;

  active.classList.add("is-active");

  const preload = (url) =>
    new Promise((resolve) => {
      const img = new Image();
      img.onload = () => resolve(true);
      img.onerror = () => resolve(false);
      img.src = url;
    });

  const swap = async () => {
    for (let tries = 0; tries < heroImages.length; tries++) {
      const nextIndex = (index + 1) % heroImages.length;
      const url = heroImages[nextIndex];

      const ok = await preload(url);
      index = nextIndex;

      if (!ok) continue;

      next.src = url;
      next.getBoundingClientRect();

      next.classList.add("is-active");
      active.classList.remove("is-active");

      const temp = active;
      active = next;
      next = temp;

      return;
    }
  };

  // ✅ Solo la animación que ya tenías: título y luego texto/botones
  const runSequence = () => {
    hero.classList.add("run-title");
    setTimeout(() => hero.classList.add("show-surround"), 1450);
  };

  // Arranca la secuencia apenas cargue la imagen inicial (o fallback)
  if (active.complete) {
    runSequence();
  } else {
    active.addEventListener("load", runSequence, { once: true });
    setTimeout(() => {
      if (!hero.classList.contains("run-title")) runSequence();
    }, 900);
  }

  setInterval(swap, 6500);
});
