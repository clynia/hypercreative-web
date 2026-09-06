<?php
declare(strict_types=1);

/**
 * Zonas y mapa de calor.
 *
 * Una nota no es un punto, es una mancha. Nadie apunta el versiculo exacto, y
 * sobre todo: la confusion se declara aguas abajo de su causa. Si alguien se
 * pierde en el 751, el problema suele estar unos versiculos antes. Por eso el
 * nucleo es ASIMETRICO y reparte mas peso hacia atras que hacia delante.
 *
 * Tres notas en 749, 750 y 751 se suman en un solo pico en vez de quedar como
 * tres avisos sueltos que nadie relaciona.
 */

/** [versiculos hacia atras, versiculos hacia delante] por dimension. */
const NUCLEOS = [
    'claridad'   => [8, 2],   // el que se pierde lo dice tarde, casi nunca pronto
    'estructura' => [6, 3],   // el ritmo se juzga sobre un tramo, no sobre una linea
    'utilidad'   => [4, 3],
    'rigor'      => [3, 2],
    'voz'        => [2, 2],
    'erratas'    => [1, 1],   // aqui el lector si es exacto
    ''           => [5, 3],   // sin clasificar todavia
];

/** En claridad el peso NO premia al experto: el que se pierde es el lector real. */
function peso_efectivo(array $pesos, ?string $dimension): float
{
    $d = $dimension ?: '';
    if ($d === 'claridad' || $d === '') {
        return 1.0;
    }
    return max(0.0, (float)($pesos[$d] ?? 1)) ;
}

/**
 * Curva de calor sobre todo el libro.
 * @return array{curva: float[], zonas: array, maximo: float}
 */
function calcular_calor(array $notas, array $pesosPorEjemplar, int $totalVersiculos): array
{
    $curva   = array_fill(1, max($totalVersiculos, 1), 0.0);
    $lectores = [];   // versiculo => [ejemplar_id => true]

    foreach ($notas as $nota) {
        $v = $nota['versiculo'] === null ? null : (int)$nota['versiculo'];
        if ($v === null || $v < 1 || $v > $totalVersiculos) {
            continue;   // las notas generales no manchan el mapa
        }
        $dim   = $nota['dimension'] ?? '';
        [$atras, $delante] = NUCLEOS[$dim] ?? NUCLEOS[''];
        $peso  = peso_efectivo($pesosPorEjemplar[(int)$nota['ejemplar_id']] ?? [], $dim);
        if ($peso <= 0) {
            continue;
        }
        for ($d = 0; $d <= $atras; $d++) {
            $n = $v - $d;
            if ($n >= 1) {
                $curva[$n] += $peso * (1.0 - $d / ($atras + 1));
                $lectores[$n][(int)$nota['ejemplar_id']] = true;
            }
        }
        for ($d = 1; $d <= $delante; $d++) {
            $n = $v + $d;
            if ($n <= $totalVersiculos) {
                $curva[$n] += $peso * (1.0 - $d / ($delante + 1));
                $lectores[$n][(int)$nota['ejemplar_id']] = true;
            }
        }
    }

    $maximo = $curva ? max($curva) : 0.0;
    $umbral = $maximo * 0.20;
    $zonas  = [];
    $abierta = null;

    for ($n = 1; $n <= $totalVersiculos; $n++) {
        $caliente = $maximo > 0 && $curva[$n] >= $umbral && $umbral > 0;
        if ($caliente) {
            if ($abierta === null) {
                $abierta = ['desde' => $n, 'hasta' => $n, 'pico' => 0.0, 'pico_en' => $n, 'lectores' => []];
            }
            $abierta['hasta'] = $n;
            if ($curva[$n] > $abierta['pico']) {
                $abierta['pico'] = $curva[$n];
                $abierta['pico_en'] = $n;
            }
            foreach (array_keys($lectores[$n] ?? []) as $id) {
                $abierta['lectores'][$id] = true;
            }
        } elseif ($abierta !== null) {
            $zonas[] = cerrar_zona($abierta);
            $abierta = null;
        }
    }
    if ($abierta !== null) {
        $zonas[] = cerrar_zona($abierta);
    }

    // El consenso manda sobre el peso: primero cuanta gente lo dice, luego quien.
    usort($zonas, function (array $a, array $b): int {
        return [$b['lectores'], $b['pico']] <=> [$a['lectores'], $a['pico']];
    });

    return ['curva' => array_values($curva), 'zonas' => $zonas, 'maximo' => $maximo];
}

function cerrar_zona(array $z): array
{
    return [
        'desde'    => $z['desde'],
        'hasta'    => $z['hasta'],
        'pico_en'  => $z['pico_en'],
        'pico'     => round($z['pico'], 3),
        'lectores' => count($z['lectores']),
    ];
}
