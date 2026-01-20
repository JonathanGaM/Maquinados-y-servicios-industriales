document.addEventListener("DOMContentLoaded", () => {
  const items = document.querySelectorAll(".reveal");
  if (!items.length) return;

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        // Repetible: entra = visible, sale = se reinicia
        if (entry.isIntersecting) entry.target.classList.add("is-visible");
        else entry.target.classList.remove("is-visible");
      });
    },
    { threshold: 0.25, rootMargin: "0px 0px -10% 0px" }
  );

  items.forEach((el) => observer.observe(el));
});
