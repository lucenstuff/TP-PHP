<?php
    class GestorBD {
        private $conection;

        public function __construct($host, $user, $password, $data_base)
        {
            try {
                $this->conection = new PDO("mysql:host=$host;dbname=$data_base", $user, $password);
    
                if (!$this->conection) {    
                    throw new Exception("Error de conexión a la base de datos.");
                }
            } catch (Exception $e) {
                throw $e;
            }
        }
        public function __destruct()
        {

            $this->conection = null;
        }

        public function escribir($tabla, $valores)
        {
            $columns = implode(', ', array_map(function($keys) {
                return "`$keys`";
            }, array_keys($valores)));
        
            $valoresEscapados = array_map(function($valor) {
                return $this->conection->quote($valor);
            }, $valores);
        
            $valores = implode(', ', $valoresEscapados);
        
            $sentence = "INSERT INTO `$tabla` ($columns) VALUES ($valores)";
        
            $result = $this->conection->query($sentence);
        
            if (!$result) {
                throw new Exception("Error al insertar datos");
            }
        
            return true;
        }

        public function leer($tabla, $criterio)
        {
            try {
                $columnas = implode(', ', array_map(function($clave) {
                    return "`$clave`";
                }, array_keys($criterio)));
    
                $valores = array_map(function($valor) {
                    return $this->conection->quote($valor);
                }, $criterio);
    
                $clauses = [];
                foreach ($criterio as $clave => $valor) {
                    $clauses[] = "`$clave` = " . $this->conection->quote($valor);
                }
    
                $where = implode(' AND ', $clauses);
    
                $sentence = "SELECT $columnas FROM `$tabla` WHERE $where";
    
                $result = $this->conection->query($sentence);
    
                if (!$result) {
                    throw new Exception("Error al realizar la consulta SELECT");
                }
    
                return $result->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                throw $e;
            }
        }

        public function editar($tabla, $valores, $criterio)
        {
            try {
                $updates = [];
                foreach ($valores as $clave => $valor) {
                    $updates[] = "`$clave` = " . $this->conection->quote($valor);
                }
                $set = implode(', ', $updates);
    
                $clauses = [];
                foreach ($criterio as $clave => $valor) {
                    $clauses[] = "`$clave` = " . $this->conection->quote($valor);
                }
                $where = implode(' AND ', $clauses);
    
                $sentence = "UPDATE `$tabla` SET $set WHERE $where";
    
                $result = $this->conection->query($sentence);
    
                if (!$result) {
                    throw new Exception("Error al realizar la consulta UPDATE");
                }
    
                return true;
            } catch (Exception $e) {
                throw $e;
            }
        }

        public function borrar($tabla, $criterio)
        {
            try {
                $clauses = [];
                foreach ($criterio as $clave => $valor) {
                    $clauses[] = "`$clave` = " . $this->conection->quote($valor);
                }
                $where = implode(' AND ', $clauses);
    
                $sentence = "DELETE FROM `$tabla` WHERE $where";
    
                $result = $this->conection->query($sentence);
    
                if (!$result) {
                    throw new Exception("Error al realizar la consulta DELETE");
                }
    
                return true;
            } catch (Exception $e) {
                throw $e;
            }
        }
    }
    

?>
