<?php
// /includes/metrics.php
declare(strict_types=1);

/**
 * Año actual seguro (fallback si algo falla).
 */
function safe_current_year(int $fallbackYear = 2026): int
{
  try {
    $y = (int) date('Y');
    return ($y >= 2000 && $y <= 2100) ? $y : $fallbackYear;
  } catch (Throwable $e) {
    return $fallbackYear;
  }
}

/**
 * Devuelve el número de "década" a mostrar: 30, 40, 50...
 * - $startYear: año de inicio real (ej. 1994)
 * - $defaultDecade: por defecto 30
 * - $step: tamaño de salto (10 = décadas)
 */
function experience_decade(int $startYear, int $minDecade = 30, int $step = 10, int $fallbackYear = 2026): int
{
  try {
    $currentYear = safe_current_year($fallbackYear);
    $exp = $currentYear - $startYear;

    if ($exp < 0 || $exp > 200) return $minDecade;

    $decade = intdiv($exp, $step) * $step; // 36 => 30, 41 => 40
    if ($decade < $minDecade) $decade = $minDecade;

    return $decade;
  } catch (Throwable $e) {
    return $minDecade;
  }
}
