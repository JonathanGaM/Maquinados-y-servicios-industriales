<?php
/**
 * db-safe.php
 * Helpers reutilizables para consultar BD sin romper la página.
 */

function db_ok(): bool {
  return isset($GLOBALS['pdo']) && ($GLOBALS['pdo'] instanceof PDO);
}

/**
 * Devuelve la primera fila de un SELECT.
 * Si falla la BD o no hay datos, devuelve el fallback.
 */
function db_first_row(string $sql, array $params = [], array $fallback = []): array {
  try {
    if (!db_ok()) return $fallback;

    $stmt = $GLOBALS['pdo']->prepare($sql);
    $stmt->execute($params);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row ?: $fallback;
  } catch (Throwable $e) {
    return $fallback;
  }
}

/**
 * Devuelve todas las filas de un SELECT.
 * Si falla la BD, devuelve el fallback.
 */
function db_all_rows(string $sql, array $params = [], array $fallback = []): array {
  try {
    if (!db_ok()) return $fallback;

    $stmt = $GLOBALS['pdo']->prepare($sql);
    $stmt->execute($params);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $rows ?: $fallback;
  } catch (Throwable $e) {
    return $fallback;
  }
}
