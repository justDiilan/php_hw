<?php
class Route {
    public City $from;
    public City $to;
    public bool $isHighway;
    public float $distance;

    public function __construct(City $from, City $to, float $distance, bool $isHighway) {
        $this->from = $from;
        $this->to = $to;
        $this->distance = $distance;
        $this->isHighway = $isHighway;
    }
}
?>
