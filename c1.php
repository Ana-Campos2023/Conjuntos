<?php
class conjuntos {
    private $tamano;
    private $datos = [];
    public function __construct($tamano) {
        $this->tamano = $tamano;
        $this->datos = array();
        for ($i = 0; $i < $tamano; $i++) {
            $this->datos[] = rand(1, 15);
        }
    }

    public function interseccion($otroConjunto) {
        $resultado = [];
        for ($i = 0; $i < $this->tamano; $i++) {
            for ($j = 0; $j < count($otroConjunto->datos); $j++) {
                if ($this->datos[$i] == $otroConjunto->datos[$j]) {
                    $resultado[] = $this->datos[$i];
                    break;
                }
            }
        }
        return array_unique($resultado);
    }

    public function union($otroConjunto) {
        $resultado = $this->datos;
        for ($i = 0; $i < count($otroConjunto->datos); $i++) {
            $existe = false;
            for ($j = 0; $j < $this->tamano; $j++) {
                if ($otroConjunto->datos[$i] == $this->datos[$j]) {
                    $existe = true;
                    break;
                }
            }
            if (!$existe) {
                $resultado[] = $otroConjunto->datos[$i];
            }
        }
        return array_unique($resultado);
    }

    public function diferencia($otroConjunto) {
        $resultado = [];
        for ($i = 0; $i < $this->tamano; $i++) {
            $existe = false;
            for ($j = 0; $j < count($otroConjunto->datos); $j++) {
                if ($this->datos[$i] == $otroConjunto->datos[$j]) {
                    $existe = true;
                    break;
                }
            }
            if (!$existe) {
                $resultado[] = $this->datos[$i];
            }
        }
        return array_unique($resultado);
    }

    public function escribe() {
        echo "Números: ";
        foreach ($this->datos as $datos) {
            echo "$datos ";
        }
        echo "<br>";
    }
}
?>
