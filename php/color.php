<?php
    class Color {

        // Atributos privados (encapsulamiento)
        private $color = array(
                                "r" => "", 
                                "g" => "", 
                                "b" => ""
                            );        

        // Constructores

        public function __construct() {
            $this->color["r"] = "";
            $this->color["g"] = "";
            $this->color["b"] = "";
        }

        // Métodos Get.

        public function getColor() {
            return $this->color;
        }
               
        // Métodos Set.

        public function setColorRed($r) {
            $this->color["r"] = $r;
        }

        public function setColorGreen($g) {
            $this->color["g"] = $g;
        }

        public function setColorBlue($b) {
            $this->color["b"] = $b;
        }

        // Otras funciones.

        public function hexToRgb($color_hex) {

            // Comprobamos que el color está en el formato hexadecimal correcto.

            if (strlen($color_hex) == 7) {
                if(substr($color_hex, 0, 1) == "#") {

                    // Comprobamos que sean valores válidos (Entre 00 y FF);
                    if ($this->validarHex($color_hex)) {
                        // Extraemos los valores separados y los asignamos.
                        $this->setColorRed(hexdec(substr($color_hex, 1, 2)));
                        $this->setColorGreen(hexdec(substr($color_hex, 3, 2)));
                        $this->setColorBlue(hexdec(substr($color_hex, 5, 2)));
                        return $this->color; 
                    } else {
                        return("ERROR");
                    };
                } else {
                    return ("ERROR");
                };
            } else {
                return ("ERROR");
            };
        }


        public function validarHex($valor_hex) {
            $valido = true;
            $valor_validar = substr($valor_hex, 1);
            for($i=0; $i<strlen($valor_validar); $i++) {
                if ($valor_validar[$i] >= "0" && $valor_validar[$i] <= "9") {
                    $valido = true;
                } else if ($valor_validar[$i] >= "A" && $valor_validar[$i] <= "F") {                    
                    $valido = true;
                } else {
                    $valido = false;
                };
                
                // Si encontramos un valor no válido forzamos salida del bucle.
                if ($valido == false){
                    $i=strlen($valor_validar);
                };
            };
            
            return $valido;
        }

    };
?>