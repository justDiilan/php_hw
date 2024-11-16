<?php
class TransportAgency {
    private string $name;
    private array $cities = [];
    private array $routes = [];
    private array $orders = [];
    private float $revenue = 0;
    private float $losses = 0;

    public function __construct(string $name, array $cities) {
        $this->name = $name;
        $this->cities = $cities;
    }

    public function initializeRoutes() {
        foreach ($this->cities as $cityA) {
            foreach ($this->cities as $cityB) {
                if ($cityA !== $cityB) {
                    $this->routes[] = new Route($cityA, $cityB, rand(100, 1000), (bool)rand(0, 1));
                }
            }
        }
    }

    public function createOrderInteractive() {
    }

    public function showStatistics() {
    }
}
?>
