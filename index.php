<?php

require_once 'Matrix.php';

try {
    // Создаем две матрицы
    $matrixA = new Matrix([
        [1, 2, 3],
        [4, 5, 6],
        [7, 8, 9],
    ]);

    $matrixB = new Matrix([
        [9, 8, 7],
        [6, 5, 4],
        [3, 2, 1],
    ]);

    // Сложение матриц
    $sumMatrix = $matrixA->add($matrixB);
    echo "Сумма матриц:\n";
    echo $sumMatrix;

    // Вычитание матриц
    $differenceMatrix = $matrixA->subtract($matrixB);
    echo "Разность матриц:\n";
    echo $differenceMatrix;

} catch (Exception $e) {
    echo "Ошибка: " . $e->getMessage();
}
