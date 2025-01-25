<?php

class Matrix {
    private array $matrix;
    private int $rows;
    private int $cols;

    public function __construct(array $matrix) {
        if (empty($matrix) || !is_array($matrix) || !is_array($matrix[0])) {
            throw new InvalidArgumentException("Invalid matrix format.");
        }

        $this->rows = count($matrix);
        $this->cols = count($matrix[0]);

        foreach ($matrix as $row) {
            if (count($row) !== $this->cols) {
                throw new InvalidArgumentException("All rows must have the same number of columns.");
            }
        }

        $this->matrix = $matrix;
    }

    public function getMatrix(): array {
        return $this->matrix;
    }

    public function add(Matrix $other): Matrix {
        $this->validateSameDimensions($other);

        $result = [];
        for ($i = 0; $i < $this->rows; $i++) {
            $row = [];
            for ($j = 0; $j < $this->cols; $j++) {
                $row[] = $this->matrix[$i][$j] + $other->matrix[$i][$j];
            }
            $result[] = $row;
        }

        return new Matrix($result);
    }

    public function subtract(Matrix $other): Matrix {
        $this->validateSameDimensions($other);

        $result = [];
        for ($i = 0; $i < $this->rows; $i++) {
            $row = [];
            for ($j = 0; $j < $this->cols; $j++) {
                $row[] = $this->matrix[$i][$j] - $other->matrix[$i][$j];
            }
            $result[] = $row;
        }

        return new Matrix($result);
    }

    private function validateSameDimensions(Matrix $other): void {
        if ($this->rows !== $other->rows || $this->cols !== $other->cols) {
            throw new InvalidArgumentException("Matrices must have the same dimensions.");
        }
    }

    public function __toString(): string {
        $output = "";
        foreach ($this->matrix as $row) {
            $output .= implode("\t", $row) . PHP_EOL;
        }
        return $output;
    }
}
