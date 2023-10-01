<?php

    class Nutrients {
        public $name;
        public $caloriesPerGram;
        public $type;

        public function __construct($name, $caloriesPerGram, $type){
            $this->name = $name;
            $this->caloriesPerGram = $caloriesPerGram;
            $this->type = $type;
        }
    }


    class Food {
        public $name;
        public $description;
        public $price;
        public $nutrients;

        public function __construct($name, $description, $price, $nutrients){
            $this->name = $name;
            $this->description = $description;
            $this->price = $price;
            $this->nutrients = $nutrients;
        }
        public function calculateCalories($grams){
            $calories = $this->nutrients->caloriesPerGram*$grams;
            return $calories;
        }
    }
    
    $NutrientesPollo = new Nutrients("Pollo",3.5,"Proteines");

    $PolloAsado = new Food("Pollo Asado","Delicioso Pollo",99.9,$NutrientesPollo);

    $CaloriasPollo = $PolloAsado->calculateCalories(250);

    echo "La comida es: {$PolloAsado->name}.\n";
    echo "Su descripción: {$PolloAsado->description}.\n";
    echo "Su precio: \${$PolloAsado->price}.\n";
    echo "{$PolloAsado->name} tiene {$CaloriasPollo} calorías.\n";
    
?>