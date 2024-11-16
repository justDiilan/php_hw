<?php
abstract class Transport {
    protected string $type;
    protected float $speed; // км/ч
    protected float $costPerUnit; // грн/кг/км
    protected float $accidentProbability; // Вероятность аварии

    public function __construct(string $type, float $speed, float $costPerUnit, float $accidentProbability) {
        $this->type = $type;
        $this->speed = $speed;
        $this->costPerUnit = $costPerUnit;
        $this->accidentProbability = $accidentProbability;
    }

    public function calculateCost(float $weight, float $distance): float {
        return $weight * $distance * $this->costPerUnit;
    }

    public function calculateTime(float $distance): float {
        return $distance / $this->speed; // В часах
    }

    public function isAccident(): bool {
        return rand(0, 100) / 100 < $this->accidentProbability;
    }
}
?>
