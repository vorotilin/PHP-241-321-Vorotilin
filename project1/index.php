<?php
class Cat {
    public $name;
    public $weihgt; 
    public $color;

    public function sayMau() {
        return "Mau. I'm " . $this->name;
    }

    public function setName(string $name) {
        $this->name = $name;
    }
}
class Lion extends Cat {
    public function canRoar() {
        return "..rrrRoar";
    }
}

$cat1 = new Cat;
$cat1->setName("Kolya");

echo $cat1->sayMau();
echo "<BR>";

$lion1 = new Lion;
$lion1->setName("Leva");
echo $lion1->sayMau();
echo $lion1->canRoar();
echo "<BR>";

var_dump($cat1);
