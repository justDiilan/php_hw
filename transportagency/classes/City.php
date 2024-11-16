<?php
class City {
    public string $name;
    public bool $isMajor;
    public bool $weatherGood;

    public function __construct(string $name, bool $isMajor) {
        $this->name = $name;
        $this->isMajor = $isMajor;
        $this->weatherGood = (bool)rand(0, 1);
    }
}
?>
