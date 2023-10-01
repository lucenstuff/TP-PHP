<?php
    class Saludador {
        public function saludar($nombre = ""){
            if ($nombre === ""){
                echo "Hola, Mundo.";
           }else {
            echo "Hola, " . $nombre;
           }    
           echo "<br>";    
        }
    }    
    $s = new Saludador();
    $s->saludar("Pepe");
    $s->saludar("");
?>

