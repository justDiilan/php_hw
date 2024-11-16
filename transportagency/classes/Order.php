<?php
class Order {
    public City $from;
    public City $to;
    public float $weight;
    public ?string $preference;
    public ?Transport $transport;

    public function __construct(City $from, City $to, float $weight, ?string $preference = null) {
        $this->from = $from;
        $this->to = $to;
        $this->weight = $weight;
        $this->preference = $preference;
        $this->transport = null;
    }
}
?>
