<?php
    require_once "GestorBD.php";

        try {
            $manager = new GestorBD("localhost", "root", "", "ejemplo");

                $Insertvalores = ["name" => "Juan", "surname" => "Caballero"];
                $manager->escribir("user", $Insertvalores);

            // SELECT
                $criteria = ["name" => "Juan"];
                $result = $manager->leer("user", $criteria);

                echo "Registros encontrados:<br>";
                foreach ($result as $resultado) {
                    echo "name: " . $resultado["name"] . ", surname: " . $resultado["surname"] . "<br>";
                }

            // UPDATE
                $valoresUpdate = ["name" => "Pepe"];
                $manager->editar("user", $valoresUpdate, $criteria);

            // DELETE
                $manager->borrar("user", $criteria);
                        echo "Operaciones realizadas exitosamente.";
                    } catch (Exception $e) {
                        echo $e->getMessage();
                    }

?>