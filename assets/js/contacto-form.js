// Evita envíos múltiples del formulario de contacto
document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("contactForm");
  const btn  = document.getElementById("btnSubmit");

  if (!form || !btn) return;

  form.addEventListener("submit", () => {
    btn.disabled = true;
    btn.classList.add("opacity-60", "cursor-not-allowed");
    btn.innerHTML = `Enviando... <span class="material-symbols-outlined text-sm">hourglass_top</span>`;
  });
});
